<?php
	session_start();
	include('../config.php');
	$session_aid = $input->session('aid');
	if($session_aid===false){
		header('location:login.php');
	}
	$sql = "SELECT * FROM admin WHERE aid='{$session_aid}'";
	$session_auser_result = $db->query($sql);
	$session_auser = $session_auser_result->fetch_array(MYSQLI_ASSOC);
?>