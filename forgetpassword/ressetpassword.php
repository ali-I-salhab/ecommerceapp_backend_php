<?php
include "../connect.php";





$email=filterRequest('email');
$password=sha1($_POST['password']);




    $data=array("password"=>$password);
   
    updateData('users',$data,"user_email='$email'");
    

