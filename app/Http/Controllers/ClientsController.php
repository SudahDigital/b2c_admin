<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

use App\Mail\SendMail;
use App\Mail\SendMailBilling;

use App\Clients;

class ClientsController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-banner')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = \App\Clients::get();

        return view('clients.index', ['client'=>$client]);
    }

    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('client_name');
        $slug = $request->get('client_slug');
        $email_billing = $request->get('email_billing');
        $email_verify = $request->get('email_verify');
        $newClient = new \App\Clients;
        $newClient->client_name = $name;
        $newClient->client_slug = $slug;
        $newClient->client_email_billing = $email_billing;
        $newClient->client_email_verify = $email_verify;
        $newClient->save();

        $filebilling = $request->file('attach_email');

        $email_encrypt = Crypt::encrypt($email_verify);
        $data = array('email_verify'=>$email_encrypt);
        $databilling = array('file'=>$filebilling);

	    \Mail::to($email_verify)->send(New SendMail($data));
	    \Mail::to($email_billing)->send(New SendMailBilling($databilling));

        return redirect()->route('clients.create')->with('status','New Client Succesfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client_edit = DB::select("SELECT * FROM clients WHERE client_id = '".$id."'");

        $data['client_id'] = $client_edit[0]->client_id;
        $data['client_name'] = $client_edit[0]->client_name;
        $data['client_slug'] = $client_edit[0]->client_slug;
        $data['client_email_billing'] = $client_edit[0]->client_email_billing;
        $data['client_email_verify'] = $client_edit[0]->client_email_verify;

        return view('clients.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->get('client_id');
        $name = $request->get('client_name');
        $slug = $request->get('client_slug');
        $email_billing = $request->get('email_billing');
        $email_verify = $request->get('email_verify');

        $sql = DB::select("SELECT client_email_billing, client_email_verify FROM Clients WHERE client_id = '".$id."'");

        foreach ($sql as $key => $val) {
        	$old_email_billing = $val->client_email_billing;
        	$old_email_verify = $val->client_email_verify;

        	$sts = false;
        	if($old_email_verify != $email_verify){
        		$sts .= true;

        		$email_encrypt = Crypt::encrypt($email_verify);
	        	$data = array('email_verify'=>$email_encrypt);

		    	\Mail::to($email_verify)->send(New SendMail($data));
	        }

	        if($old_email_billing != $email_billing){
	        	$sts .= true;

	        	$filebilling = $request->file('attach_email');
		        $databilling = array('file'=>$filebilling);

		    	\Mail::to($email_billing)->send(New SendMailBilling($databilling));
	        }
        }

        $Client = \App\Clients::where('client_id', $id)
			        ->update([
			        	'client_name'=>$name,
			        	'client_slug'=>$slug,
			        	'client_email_billing'=>$email_billing,
			        	'client_email_verify'=>$email_verify
			        ]);

		if($sts && $Client){
			return redirect()->route('clients.edit', [$id])->with('status','Client Succsessfully Updated');
		}

        return redirect()->route('clients.edit', [$id])->with('status','Client Failed Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = \App\Clients::where('client_id',$id)->delete();
        return redirect()->route('clients.index')
        ->with('status', 'Client successfully Deleted');
    }

    public function savePassword(Request $request){
    	$email = $request->email_client;
    	$email_decrypt = Crypt::decrypt($email);
    	$password = $request->password_client;
    	$password_encrypt = Crypt::encrypt($password);

    	$new_user = new \App\User;
        $new_user->name = 'Super Admin';
        $new_user->email = $email_decrypt;
        $new_user->password = $password_encrypt;
        $new_user->roles = '["SUPERADMIN"]';

        $sql = DB::select("SELECT client_id FROM clients WHERE client_email_verify = '".$email_decrypt."'");
        foreach ($sql as $key => $value) {
        	$new_user->client_id = $value->client_id;
        }

        $categories = \App\Category::get();

        $new_user->save();
        if ( $new_user->save()){
            return view('auth.notif_password',['categories'=>$categories])->with('status','User Succsessfully Created');
        }else{
            return view('auth.notif_password',['categories'=>$categories])->with('error','User Failed Create');
        }
        
    }
}
