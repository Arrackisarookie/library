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

    $insertsql = "insert into tb_bibliography(call_number, biblioname, author, press, publishing_time, ISBN, category, price, intro)values('$callnumber', '$biblioname', '$author', '$press', '$publishingtime', '$isbn', '$category', '$price', '$intro')";

    if (mysqli_query($con, $insertsql)) {
        echo "<script>alert('添加成功');window.location.href='../biblio.manage.php'</script>";
    } else {
        echo "<script>alert('添加失败');window.location.href='../biblio.manage.php'</script>";
    }
    mysqli_close($con);
?>