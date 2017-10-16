<?php
	session_start();
	include('../config.php');
	if($input->session('aid')===false){
		header('location:login.php');
	}else{

	}
?>