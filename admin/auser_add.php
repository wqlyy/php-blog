<?php
	include('check.php');
	$arr = array(
		'auser'=>'',
		'apassword'=>'',
	);
	$aid = $input->get('aid');
	if($aid>0){
		$sql = "SELECT * FROM admin WHERE aid = '{$aid}'";
		$result = $db->query($sql);
		$arr = $result->fetch_array(MYSQLI_ASSOC);
	}
	if($input->get('do')==='add'){
		$username = $input->post('username');
		$password = $input->post('pwd');
		if($username and $password){
			$sql1 = "SELECT * FROM `admin` WHERE auser='{$username}'";
			$result = $db->query($sql1);
			$is = $result->fetch_array(MYSQLI_ASSOC);
			if($is){
				die('账号不能重复');
			}
		}
		if($aid<1){
			$sql = "INSERT INTO admin (`auser`,`apassword`) VALUES ('{$username}','{$password}')";
				
		}else{
			$sql = "UPDATE admin SET auser='{$username}',apassword='{$password}' WHERE aid='{$aid}'";
		}
		$is = $db->query($sql);
				if($is){
					header('location:auser.php');
				}else{
					die('执行失败');
				}
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<?php include(PATH.'/head.inc.php');?>
</head>
<body>
	<?php include('nav.inc.php'); ?>
	<div class="container">
		<div class="page-header">
		  <h1>管理员管理 <small class="pull-right"><a href="auser.php" class="btn btn-default">返回</a></small></h1>
		</div>
		<div class="row">
			
			<div class="col-md-offset-3 col-md-6">
				<form class="form-horizontal" action="auser_add.php?do=add&aid=<?php echo $aid?>" method="post">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">账号</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="username" placeholder="请输入用户名" value="<?php echo $arr['auser']; ?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="pwd" placeholder="请输入密码" value="<?php echo $arr['apassword']; ?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">添加</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>