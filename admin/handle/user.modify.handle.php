<?php
	require_once('../../connect.php');
	$sid = $_POST['sid'];
    $username = $_POST['username'];
    $birth = $_POST['birth'];
    $sex = $_POST['sex'];
    $school = $_POST['school'];
    $class_ = $_POST['class_'];
    if (!empty($_POST['password'])) {
        $password = md5($_POST['password']);
        $updatesql = "update tb_user set password = '$password', username = '$username', sex = '$sex', birth = '$birth', school = '$school', class = '$class_' where sid = '$sid'"
    } else {
        $updatesql = "update tb_user set username = '$username', sex = '$sex', birth = '$birth', school = '$school', class = '$class_' where sid = '$sid'";
    }

    if (mysqli_query($con, $updatesql)) {
        echo "<script>alert('修改成功');window.location.href='../user.manage.php'</script>";
    } else {
        echo "<script>alert('修改失败');window.location.href='../user.manage.php'</script>";
    }
    mysqli_close($con);
?>