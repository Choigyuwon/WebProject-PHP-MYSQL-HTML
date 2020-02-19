<?php
header("Content-Type: text/html; charset=UTF-8");
$conn = new mysqli("localhost","root","1234","mydb");
mysqli_query($conn,'SET NAMES utf8');
$id = $_POST['id'];
$hiddenid = $_POST['hiddenid'];
$name = $_POST['name'];
$pw = $_POST['pw1'];
$hiddenpw = $_POST['hiddenpw'];
$email = $_POST['email'];
if($hiddenid == 1) {
$sql = "select *from member where id = '$id'";
$res = $conn->query($sql);
if($res -> num_rows > 0) {
echo "<script>alert('이미 존재하는 아이디입니다.'); location.href='/yy/join.html';</script>";
exit();
}
}

if($hiddenpw != 1) {
echo "<script>alert('비밀번호 제출 양식이 올바르지 않습니다.'); location.href='/yy/join.html';</script>";
exit();
}

$sql3 = "insert into member (id,pw,name,email) values ('$id','$pw','$name','$email')";
$res3 = $conn->query($sql3);
$sql4 = "select *from member where id = '$id' and name='$name'";
$res4 = $conn->query($sql4);

if($res4 -> num_rows > 0) {
echo "<script>alert('회원가입을 성공하였습니다.'); location.href='/yy/main.php'</script>";
exit();
}  else {
echo "<script>alert('회원가입을 성공하지 못하였습니다.'); location.href='/yy/join.html'</script>";
}
?>