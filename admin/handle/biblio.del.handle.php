<?php 
	require_once('../../connect.php');
	$callnumber = $_GET['callnumber'];
	$delsql = "delete from tb_bibliography where call_number = '$callnumber'";
	if (mysqli_query($con, $delsql)) {
		echo "<script>alert('项目已删除');window.location.href='../biblio.manage.php'</script></script>";
	} else {
		echo "<script>alert('项目删除失败');window.location.href='../biblio.manage.php'</script></script>";
	}
	mysqli_close($con);
?>