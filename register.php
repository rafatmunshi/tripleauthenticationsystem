<!DOCTYPE html>
<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$logid=$_SESSION['logid'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripleauthentication");
$query1=mysqli_query($con,"INSERT INTO reg_log (log_id, timestart)  VALUES ( '$logid', NOW() )");
if(isset($_POST["userregis"])) 
{
$user=$_POST['user'];
$pw=$_POST['pw'];
$email=$_POST['email'];
$qrkey=$_POST['qrkey'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripleauthentication");
$query=mysqli_query($con,"INSERT INTO user (user, pw, email, qrkey)  VALUES ( '$user','$pw','$email','$qrkey')");
$_SESSION['user']=$user;
$_SESSION['pw']=$pw;
header("location:qrimagetosave.php");


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
    var x = document.forms["f1"]["user"].value;
    if (x == "") {
        alert("USERNAME MUST BE FILLED");
        return false;
    }
	     var x = document.forms["f1"]["email"].value;
    if (x == "") {
        alert("EMAIL MUST BE FILLED");
        return false;
    }
	     var x = document.forms["f1"]["pw"].value;
    if (x == "") {
        alert("PASSWORD MUST BE FILLED");
        return false;
    }
	     var x = document.forms["f1"]["qrkey"].value;
    if (x == "") {
        alert("QR PASSWORD MUST BE FILLED");
        return false;
    }
   }
</script>


</HEAD><BODY style="background-image:url(amu1.jpg);">
<div style=" TEXT-ALIGN:CENTER; background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;"><H1>Hybrid Authentication System Using QR Code with OTP</H1></span></div>
<div STYLE="height:50;" ><a href="../tripleauthentication/" STYLE="TEXT-DECORATION:NONE; ">HOME</a></div>
<DIV STYLE="HEIGHT:250PX; ">
	<div style="text-align: CENTER; MARGIN:50PX;">
	<div style=" box-sizing: border-box; display: inline-block; width: 500PX; max-width: 480px; background-color: #ffffff; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 10px auto auto; FLOAT:LEFT;">
	<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">user registration</span></div>
	<div style="background: ; padding: 15px" id="ap_style">
	<style type="text/css" scoped>
	#ap_style td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
	#ap_style input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; }
	#ap_style input[type="text"], input[type="password"] { width: 100%; }
	#ap_style input[type="button"], #ap_style input[type="reset"], #ap_style input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #0361A8; float: right; text-align:right; margin-top: 10px; margin-left:7px;}
	#ap_style table.center { margin-left:auto; margin-right:auto; }
	#ap_style .error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
	</style>
<form name="f1" method="post" onsubmit="return validateForm()">
<table class='center'>
<tr><td>Username:</td><td><input type="text" name="user"></td></tr>
<tr><td>email:</td><td><input type="email" name="email"></td></tr>
<tr><td>Password:</td><td><input type="password" name="pw"></td></tr>
<tr><td>Secret password for QR code image:</td><td><input type="password" name="qrkey"></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" NAME="userregis" value="Register"></td></tr>


</table>
</form>
</div></div></div>


</BODY></HTML>