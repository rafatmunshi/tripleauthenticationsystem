<!DOCTYPE html>

<HTML><HEAD>
<STYLE>

a{
	background-color: #0361A8;
	color:white;
	text-align: center;
	height:40;
	width:250;
	display:block;
}
a:hover
{
background-color: white;
color: black;
}
</STYLE>


</HEAD><BODY>
<div style=" TEXT-ALIGN:CENTER; background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;"><H1>Hybrid Authentication System Using QR Code with OTP</H1></span></div>
<div STYLE="height:50;" ><a href="../tripleauthentication/" STYLE="TEXT-DECORATION:NONE; ">HOME</a></div>
<?php 
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$user=$_SESSION['user'];
$pw=$_SESSION['pw'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"tripleauthentication");
$query=mysqli_query($con,"SELECT * FROM user WHERE user='$user' and pw='$pw'");
$row= mysqli_fetch_assoc($query);
$qrkey=$row['qrkey'];
if(isset($_POST["qrimageselected"])) 
{
$qrselected=$_POST['qrimageselected'];
if($qrselected==$qrkey){
	header("location:successlogin.php");
}
else
	echo "<b><h3 style='color:red;'>INCORRECT QR IMAGE!</h3></b>";
}
$fix3=substr(md5(rand()), 0, 3);

$fix2=substr(md5(rand()), 0, 2);

$fix1=substr(md5(rand()), 0, 1);

$array = array($qrkey,$qrkey.$fix3,$qrkey.$fix2 ,$qrkey.$fix1 ,$fix3.$qrkey ,$fix2.$qrkey ,$fix1.$qrkey ,$fix1.$qrkey.$fix1 ,$fix2.$qrkey.$fix2 );
shuffle($array);
echo"<form name='f1' method='post'>";
echo "<br/> <span style='display:block; text-align:center;'>Select the valid qr image for completing login process <br/>";
echo "<button name='qrimageselected' value='".$array[0]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[0]."' /></button>";
echo "<button name='qrimageselected' value='".$array[1]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[1]."' /></button>";
echo "<button name='qrimageselected' value='".$array[2]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[2]."' /></button><br/>";
echo "<button name='qrimageselected' value='".$array[3]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[3]."' /></button>";
echo "<button name='qrimageselected' value='".$array[4]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[4]."' /></button>";
echo "<button name='qrimageselected' value='".$array[5]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[5]."' /></button><br/>";
echo "<button name='qrimageselected' value='".$array[6]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[6]."' /></button>";
echo "<button name='qrimageselected' value='".$array[7]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[7]."' /></button>";
echo "<button name='qrimageselected' value='".$array[8]."'><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$array[8]."' /></button><br/>";
echo "</span>";
echo"</form>";
?>

</BODY></HTML>