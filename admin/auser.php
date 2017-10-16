<?php
	include('check.php');

	if($input->get('do')=='delete'){
		$aid=$input->get('aid');
		if($aid===$session_aid){
			echo '不能删除自己';
			exit;
		}else{
			$sql = "DELETE FROM admin WHERE aid='{$aid}'";
			$is = $db->query($sql);
			if($is){
				echo '删除成功';
				header('location:auser.php');
			}else{
				die('删除失败');
			}
		}
	}




	$sql = "SELECT * FROM admin";
	$result = $db->query($sql);
	$rows = array();
	while($row = $result->fetch_array(MYSQL_ASSOC)){
		$rows[]=$row;
	}
	// var_dump($rows)
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
		  <h1>管理员管理 <small class="pull-right"><a href="auser_add.php" class="btn btn-default">添加管理员</a></small></h1>
		</div>
		<div class="row">
			
			<div class="col-md-offset-3 col-md-6">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>用户名</th>
							<th>管理</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rows as $row):?>
						<tr>
							<td><?php echo $row['aid'];?></td>
							<td><?php echo $row['auser'];?></td>
							<td>
								<a href="auser_add.php?do=update&aid=<?php echo $row['aid']?>">修改</a>
					
									<a href="auser.php?do=delete&aid=<?php echo $row['aid']?>">删除</a>
								
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>