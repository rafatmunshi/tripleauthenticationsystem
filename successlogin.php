<!DOCTYPE html>
<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$user=$_SESSION['user'];
$pw=$_SESSION['pw'];
$logid=$_SESSION['logid'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripleauthentication");
$query=mysqli_query($con, "UPDATE login_log set timeend=now(),totaltime=TIMESTAMPDIFF(SECOND, timestart,CURRENT_TIMESTAMP()) where log_id='$logid'");
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


</HEAD><BODY style="background-image:url(amu1.jpg);">
<div style=" TEXT-ALIGN:CENTER; background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;"><H1>Hybrid Authentication System Using QR Code with OTP</H1></span></div>
<div STYLE="height:50;" ><a href="../tripleauthentication/" STYLE="TEXT-DECORATION:NONE; ">HOME</a></div>
<br/> <span style='display:block; text-align:center;'>Logged in successfully!</span>

</BODY></HTML>
