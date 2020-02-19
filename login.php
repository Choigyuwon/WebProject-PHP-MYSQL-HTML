<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$conn = new mysqli("localhost","root","1234","mydb");
mysqli_query($conn,'SET NAMES utf8');
$id = $_POST['id'];
$pw = $_POST['pw'];
$sql = "select *from member where id='$id' and pw = '$pw'";
$res = $conn->query($sql);
$row = mysqli_fetch_array($res);
if($res->num_rows > 0)
{
	$_SESSION['id']=$id;
	$_SESSION['name']=$row["name"];
		if(isset($_SESSION['id']) && isset($_SESSION['name']))
		{
			echo "<script>location.href='bookmain.html';</script>";
		}
		else{
			echo "<script>alert('login fall!');location.href='login.html';</script>";
			}
}
			
else{
			echo "<script>alert('login fall!');location.href='login.html';</script>";
}
?>