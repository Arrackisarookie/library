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
    } else {
        $password = md5(substr($sid, -6));
    }
    
    $insertsql = "insert into tb_user(sid, password, username, sex, birth, school, class) values('$sid', '$password', '$username', '$sex', '$birth', '$school', '$class_')";
    if (mysqli_query($con, $insertsql)) {
        echo "<script>alert('添加成功');window.location.href='../user.manage.php'</script>";
    } else {
        echo "<script>alert('添加失败');window.location.href='../user.manage.php'</script>";
    }
    mysqli_close($con);
?>
