<?php
    require_once('../../connect.php');
    $callnumber = $_POST['callnumber'];
    $bid = $_POST['bid'];

    $insertsql = "insert into tb_book(call_number, bid) values('$callnumber', '$bid')";
    if (mysqli_query($con, $insertsql)) {
        echo "<script>alert('添加成功');window.location.href='../book.modify.php?callnumber=$callnumber'</script>";
    } else {
        echo "<script>alert('添加失败');window.location.href='../book.modify.php?callnumber=$callnumber'</script>";
    }
    mysqli_close($con);
?>