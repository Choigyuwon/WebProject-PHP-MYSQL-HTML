<?php
session_start();
$session=session_dextroy();
if($session){
	header('Location: /yy/main.php');
}
?>
