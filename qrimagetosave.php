<!DOCTYPE html>

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

<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$user=$_SESSION['user'];
$pw=$_SESSION['pw'];
$logid=$_SESSION['logid'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripleauthentication");
$query1=mysqli_query($con,"UPDATE reg_log set timeend=now(),totaltime=TIMESTAMPDIFF(SECOND, timestart,CURRENT_TIMESTAMP()) where log_id='$logid'");
$query=mysqli_query($con,"SELECT * FROM user WHERE user='$user' and pw='$pw'");
$row= mysqli_fetch_assoc($query);
$qrkey=$row['qrkey'];
echo "<br/> <span style='display:block; text-align:center;'> Right click and save this qr image for future login <br/>";
echo "<a style='display:inline;' href='a.jpg' download='imageName'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$qrkey."' /></a>";
echo "<br/><br/><br/><br/>Go to <a style='display:inline;' href='index.php'><button value='login'>login</button></a>";
?>

</BODY></HTML>