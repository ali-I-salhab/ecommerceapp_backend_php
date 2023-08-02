<!-- this page to check if the enterd email and antered verify code exicted in database  --><?php

$email=filterRequest('email');
$verifycode=filterRequest('verifycode');
$stmt=$con->prepare("SELECT * FROM users WHERE user_email=? and user_verifycode=?");
$stmt->execute(array($email,$verifycode));

$count=$stmt->rowcount();


if($count > 0){
   echo json_encode(array('status'=> "success"));
  
   
}else{


       echo json_encode(array("status"=>"failure"));

}






?>