<?php
session_start();
include('../config.php');
if($input->get('do')=='check'){
	$username = $input->post('auser');
	$password = $input->post('apwd');
	if($username && $password){
		$sql = "SELECT * FROM admin WHERE auser='{$username}' and apassword = '{$password}'";
		$mysqli_reslut = $db->query($sql);
		$row = $mysqli_reslut->fetch_array(MYSQLI_ASSOC);
		if(is_array($row)){
			$_SESSION['aid']=$row['aid'];
			header('location: home.php');
			// echo '登录成功';
		}else{
			die('账号密码错误');
		}
		// var_dump($row);
	}
	
}
// $sql = "SELECT * FROM admin";
// $mysqli_reslut = $mysqli->query($sql);
// $row = $mysqli_reslut->fetch_array(MYSQLI_ASSOC);
// var_dump($row);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
	<?php include(PATH.'/head.inc.php');?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6" style="margin-top: 200px">
				<div class="panel panel-primary">
				  <div class="panel-heading">管理员登录</div>
				  <div class="panel-body">
				    <form class="form-horizontal" action="login.php?do=check" method="post">
						  <div class="form-group">
						    <label for="username" class="col-sm-2 control-label">用户名</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name='auser' id="username" placeholder="请输入用户名">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="pwd" class="col-sm-2 control-label">密码</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="apwd" id="pwd" placeholder="请输入密码">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-primary">登录</button>
						    </div>
						  </div>
					</form>
				  </div>
				  <div class="panel-footer text-right">版权所有</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>
</html>