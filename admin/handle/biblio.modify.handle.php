<?php
	require_once('../../connect.php');
	$callnumber = $_POST['callnumber'];
    $biblioname = $_POST['biblioname'];
    $author = $_POST['author'];
    $press = $_POST['press'];
    $publishingtime = $_POST['publishingtime'];
    $isbn = $_POST['isbn'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $intro = $_POST['intro'];

    $updatesql = "update tb_bibliography set biblioname = '$biblioname', author = '$author', press = '$press', publishing_time = $publishingtime, ISBN = '$isbn', category = '$category', price = $price ,intro = $intro where call_number = '$callnumber'";
    if (mysqli_query($con, $updatesql)) {
        echo "<script>alert('修改成功');window.location.href='../biblio.manage.php'</script>";
    } else {
        echo "<script>alert('修改失败');window.location.href='../biblio.manage.php'</script>";
    }
    mysqli_close($con);
?>