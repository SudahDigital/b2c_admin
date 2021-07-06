<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table ='clients';
    protected $fillable = ['client_name','client_slug','client_image','client_number_contact','client_number_wa','client_email','barcode_image'];
}
