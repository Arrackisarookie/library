<?php 
	require_once('../../connect.php');
	$bid = $_GET['bid'];
	$query = mysqli_query($con, "select call_number from tb_book where bid = '$bid' limit 1");
	$data = mysqli_fetch_assoc($query);
	$callnumber = $data['call_number'];
	$delsql = "delete from tb_book where bid = '$bid'";
	print_r($callnumber);
	if (mysqli_query($con, $delsql)) {
		echo "<script>alert('项目已删除');window.location.href='../book.modify.php?callnumber=$callnumber'</script>";
	} else {
		echo "<script>alert('项目删除失败');window.location.href='../book.modify.php?callnumber=$callnumber'
		</script>";
	}
	mysqli_close($con);
?>