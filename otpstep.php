<!DOCTYPE html>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'src/SMTP.php';
require 'src/Exception.php';
require 'src/PHPMailer.php';
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$user=$_SESSION['user'];
$pw=$_SESSION['pw'];

if(isset($_POST["userLOGIN"])) 
{
$otp=$_POST['otp'];
if($otp==$_SESSION["otp"]){
	header("location:selectqrimage.php");
}
else
{
echo "<b><h3 style='color:red;'>INCORRECT OTP</h3></b>";
}
}
?>
<HTML><HEAD>
<STYLE>

a{
	background-color: #0361A8;
	color:white;
	text-align: center;
	height:40;
	width:250;
	display: block;
}
a:hover
{
background-color: white;
color: black;
}
</STYLE>
<script>

function validateForm() {
    var x = document.forms["f1"]["otp"].value;
    if (x == "") {
        alert("OTP MUST BE FILLED");
        return false;
    }
    </script>


</HEAD><BODY style="background-image:url(amu1.jpg);">
<div style=" TEXT-ALIGN:CENTER; background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;"><H1>Hybrid Authentication System Using QR Code with OTP</H1></span></div>
<div STYLE="height:50;" ><a href="../tripleauthentication/" STYLE="TEXT-DECORATION:NONE; ">HOME</a></div>
<DIV STYLE="HEIGHT:250PX; ">
	<div style="text-align: CENTER; MARGIN:50PX;">
	<div style=" box-sizing: border-box; display: inline-block; width: 500PX; max-width: 480px; background-color: #ffffff; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 10px auto auto; FLOAT:LEFT;">
	<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">user LOGIN</span></div>
	<div style="background: ; padding: 15px" id="ap_style">
	<style type="text/css" scoped>
	#ap_style td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
	#ap_style input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; }
	#ap_style input[type="text"], input[type="password"] { width: 100%; }
	#ap_style input[type="button"], #ap_style input[type="reset"], #ap_style input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #0361A8; float: right; text-align:right; margin-top: 10px; margin-left:7px;}
	#ap_style table.center { margin-left:auto; margin-right:auto; }
	#ap_style .error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
	</style>
	<form name="f2" method="post">

<input type="submit" NAME="sendotp" value="Send otp to email">

</form>
<br/><br/>
<?php
if(isset($_POST["sendotp"])) 
{
	
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripleauthentication");
$query=mysqli_query($con,"SELECT * FROM user WHERE user='$user' and pw='$pw'");
$row= mysqli_fetch_assoc($query);
$b=rand(100000,999999);
$_SESSION["otp"] = $b;
$emails=$row['email'];
$to =$emails;
$subject = "OTP to login";
$txt = "Your OTP for login is : " .$b;


	$mail=new PHPMailer();
	$mail->CharSet = 'UTF-8';
	
	$body = $txt;
	
	$mail->IsSMTP();
	$mail->Host       = 'smtp.gmail.com';
	
	$mail->SMTPSecure = 'tls';
	$mail->Port       = 587;
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth   = true;
	
$mail->Username   = 'yourgmail@gmail.com';
$mail->Password   = 'yourpassword';

$mail->SetFrom('yourgmail@gmail.com');
$mail->AddReplyTo('yourgmail@gmail.com','no-reply');
$mail->Subject    = $subject;
$mail->MsgHTML($body);

$mail->AddAddress($to);

$mail->send();

echo "otp sent to your email: ".$to;
}
?>
<br/><br/>
<form name="f1" method="post" onsubmit="return validateForm()">
<table class='center'>
<tr><td>Enter otp sent to your registered email:</td><td><input type="text" name="otp"></td></tr>

<tr><td>&nbsp;</td><td><input type="submit" NAME="userLOGIN" value="Enter"></td></tr>


</table>
</form>
</div></div></div>


</BODY></HTML>