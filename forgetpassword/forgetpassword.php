<?php
include "../connect.php";





$email=filterRequest('email');
$verifycode=rand(1000,9999);



$stmt=$con->prepare("SELECT * FROM users WHERE 'user_email'=? and 'user_approve'=1");
$stmt->execute(array($email));

$count=$stmt->rowCount();

if($count > 0){
    //approved email exicted in data base 
    $data=array("user_verifycode"=>$verifycode);
    sendmail($email,'Verify code to reset password',$verifycode);
    updateData('users',$data,"user_email='$email'");
    
    echo json_encode(array("status"=>"success"));
}else{   
    
    echo json_encode(array("status"=>"failure"));


}
