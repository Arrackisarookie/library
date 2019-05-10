<?php
	require_once('../connect.php');
	session_start();
	$bid = $_GET['bid'];
	$updatesql = "update tb_book set state = '预定' where bid = '$bid'";
	$callnumber = mysqli_fetch_row(mysqli_query($con, "select call_number from tb_book where bid = '$bid'"));
	$sid = $_SESSION['sid'];
	$insertsql = "insert tb_reserve(sid, bid) values('$sid', '$bid')";
	if (mysqli_query($con, $updatesql) && mysqli_query($con, $insertsql)) {
		echo "<script>alert('预定成功');window.location.href='../detail.php?callnumber=$callnumber[0]'</script>";
	} else {
		echo "<script>alert('预定失败');</script>";
	}
	mysqli_close($con);
?>
