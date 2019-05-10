<?php 
	require_once('../../connect.php');
	$sid = $_GET['sid'];
	$delsql = "delete from tb_user where sid = '$sid'";
	if (mysqli_query($con, $delsql)) {
		echo "<script>alert('项目已删除');window.location.href='../user.manage.php'</script>";
	} else {
		echo "<script>alert('项目删除失败');window.location.href='../user.manage.php'</script>";
	}
	mysqli_close($con);
?>