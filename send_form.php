<?php
error_reporting(6143);
ini_set("display_errors","on");
header("content-type: application/json; charset=utf-8");
$name=isset($_POST['name']) ? $_POST['name'] : "";
$email=isset($_POST['email']) ? $_POST['email'] : "";
$phone=isset($_POST['phone']) ? $_POST['phone'] : "";
$message=isset($_POST['message']) ? $_POST['message'] : "";
if($name && $email && $phone && $message){
 $headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit";
 $message_body="Formularz kontaktowy wysłany ze strony www.oslonyokienne.eu\n";
 $message_body.="Imię i nazwisko: $name\n";
 $message_body.="Adres email: $email\n";
 $message_body.="Numer telefonu: $phone\n\n";
 $message_body.=$message;
 if(mail("info@oslonyokienne.eu","Formularz kontaktowy",$message_body,$headers)){
 $json=array("status"=>1,"msg"=>"<p class='status_ok'>Twój formularz został pomyślnie wysłany.</p>");
 }
 else{
 $json=array("status"=>0,"msg"=>"<p class='status_err'>Wystąpił problem z wysłaniem formularza.</p>"); 
 }
}
else{
 $json=array("status"=>0,"msg"=>"<p class='status_err'>Proszę wypełnić wszystkie pola przed wysłaniem.</p>"); 
}
echo json_encode($json);
exit;
?>