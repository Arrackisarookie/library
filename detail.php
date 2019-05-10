<?php
    require_once('handle/checklogin.php');

    $pre = 'detail';
    $callnumber = $_GET['callnumber'];
    $loginhref = "login?pre=$pre&callnumber=$callnumber";
    $biblio = mysqli_query($con, "select * from tb_bibliography where call_number = '$callnumber' limit 1");
    $book = mysqli_query($con, "select * from tb_book where call_number = '$callnumber'");
    $bibliodata = mysqli_fetch_assoc($biblio);
    if ($book && mysqli_num_rows($book)) {
        while ($row = mysqli_fetch_assoc($book)) {
            $bookdata[] = $row;
        }
    } else {
        $bookdata = array();
    }
    mysqli_close($con);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $bibliodata['biblioname'] ?></title>
  <meta name="description" content="Ela Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <style type="text/css">
    body{min-height:100%;position:relative;}
    html{height:100%;}
    .content{padding-bottom:90px;}
    footer{position:absolute;bottom:0;width:100%;height:90px;}
  </style>
</head>

<body>
  <!-- Right Panel -->


  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header navbar navbar-default">
      <div class="top-left" style="width: 50%">
        <div class="row">
          <div class="navbar-header" style="width:150px">
            <a class="navbar-brand" href="./" style="padding-bottom: 0"><img src="images/logo.png" alt="Logo"></a>
          </div>
        </div>
      </div>

      <div class="top-right">
        <div class="header-menu">
          <?php if ($islogin) {?>
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-expanded="false">欢迎，<?php echo $username ?></a>
            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="myprofile.php?sid=<?php echo $sid ?>"><i class="fa fa-user"></i>My Profile</a>
              <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>
              <a class="nav-link" href="handle/loginout.php?act=logout"><i class="fa fa-power-off"></i>Logout</a>
            </div>
          </div>
          <?php } else {?>
          <div class="user-area float-right my-2 mx-5">
            <input class="btn btn-primary" type="button" value="登录" onclick="window.location.href='<?php echo $loginhref?>'"/>
          </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </header>
    <!-- /#header -->
  </div>
  <!-- /#right-panel -->

<div class="content">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3">书目信息</strong>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">索书号</th>
                <th scope="col">书名</th>
                <th scope="col">作者</th>
                <th scope="col">出版社</th>
                <th scope="col">出版年份</th>
                <th scope="col">ISBN</th>
                <th scope="col">类别</th>
                <th scope="col">价格</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"><?php echo $bibliodata['call_number']?></th>
                <td><?php echo $bibliodata['biblioname']?></td>
                <td><?php echo $bibliodata['author']?></td>
                <td><?php echo $bibliodata['press']?></td>
                <td><?php echo $bibliodata['publishing_time']?></td>
                <td><?php echo $bibliodata['ISBN']?></td>
                <td><?php echo $bibliodata['category']?></td>
                <td><?php echo $bibliodata['price']?></td>                        
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3">书目简介</strong>
        </div>
        <div class="card-body">
          <p class="card-text text"><?php echo $bibliodata['intro']?></p>
        </div>
      </div>
    </div>


    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
            <strong>图书预定</strong>
        </div>
        <div class="card-body card-block">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">图书编号</th>
                <th scope="col">状态</th>
                <th scope="col">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  if (!empty($bookdata)) {
                      foreach ($bookdata as $value) {
              ?>
              <tr>
                <th scope="row"><?php echo $value['bid']?></th>
                <td><?php echo $value['state']?></td>
                <td>
                  <?php if ($islogin) { ?>
                  <?php if($value['state'] == '阅览'){ ?>
                  <a href="handle/book.handle.php?bid=<?php echo $value['bid']?>">预定</a>
                  <?php } else { ?>
                  <span>已预订</span>
                  <?php }} else { ?>
                  <span>登录后可操作</span>
                  <?php } ?>
                </td>
              </tr>
              <?php }}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.content -->


<footer class="site-footer">
  <div class="footer-inner bg-white">
    <div class="row">
      <div class="col-sm-12 text-right"> Designed by Arrack</div>
    </div>
  </div>
</footer>


<!-- Scripts -->
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
