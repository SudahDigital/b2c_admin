<!-- <p>Registered Email for Verification: {{ $data['email_verify']}}</p> --> 
<!--<p>Please click this link to input password: http://127.0.0.1:8000/verify_password?email='{{ $data['email_verify'] }}'</p>-->
<!-- <p>http://www.yourwebsite.com/verify.php?email='.$email_billing.'&hash='.$email_verify.'</p> -->

<p>Hi {{ $data['name'] }},</p> 

<p>Thank you for joining SudahOnline.</p>

<!-- <p>We have created an account for you. Please activate your account and set your administrator password by clicking <a href="http://127.0.0.1:8000/verify_password?email='{{ $data['email_verify'] }}'">here.</a></p> -->
<p>We have created an account for you. Please activate your account and set your administrator password by clicking <a href="http://admin-dev.sudahonline.com/verify_password?email='{{ $data['email_verify'] }}'">here.</a></p>
<p>The link did not work? Please copy and paste the link below to the address bar in your browser.</p>

<!-- <p>http://127.0.0.1:8000/verify_password?email='{{ $data['email_verify'] }}'</p> -->
<p>http://admin-dev.sudahonline.com/verify_password?email='{{ $data['email_verify'] }}'</p>
<p>We will see you soon and please contact us should you have any questions.</p>


<p>Kind regards,</p>
<p>SudahOnline team</p>


 
