<?php
    require_once('handle/checklogin.php');
    $pre = 'index';

    mysqli_close($con);
?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Library</title>
  <meta name="description" content="Ela Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <style type="text/css">
    
    body{min-height:100%;position:relative;}
    .letter{font-size: 100px;}
    .logo {text-align: center;}
    .blue{color: rgb(66, 133, 244);}
    .red{color:rgb(234, 71, 57);}
    .orange{color: rgb(251, 188, 5);}
    .green{color: rgb(52, 168, 83);}
    html{height:100%;}
    .content{padding-bottom:90px;}
    footer{position:absolute;bottom:0;width:100%;height:90px;}
  </style>
</head>

<body>
  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      <div class="top-right">
        <div class="header-menu">
          <?php if ($islogin) {?>
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-expanded="false">欢迎，<?php echo $username ?></a>
            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="myprofile?sid=<?php echo $sid ?>"><i class="fa fa-user"></i>My Profile</a>
              <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>
              <a class="nav-link" href="handle/loginout.php?act=logout"><i class="fa fa-power-off"></i>Logout</a>
            </div>
          </div>
          <?php } else {?>
          <div class="user-area float-right my-2 mx-5">
            <input class="btn btn-primary" type="button" value="登录" onclick="window.location.href='login?pre=<?php echo $pre?>'" />
          </div>
          <?php } ?>
        </div>
      </div>
    </header>
    <!-- /#header -->
  </div>
  <!-- /#right-panel -->

  <!-- Content -->
  <div class="content">
    <div class="row"><p></p></div>
    <div class="row col-lg-10 offset-lg-1">
      <div class="col-lg-6 offset-lg-3 logo">
        <a href="./">
          <span class="blue letter">L</span>
          <span class="red letter">i</span>
          <span class="orange letter">b</span>
          <span class="blue letter">r</span>
          <span class="green letter">a</span>
          <span class="red letter">r</span>
          <span class="orange letter">y</span>
        </a>
      </div>
    </div><p></p>
    <div class="row col-lg-10 offset-lg-1">
      <div class="col-lg-6 offset-lg-3">
        <div class="form-horizontal">
          <form class="search-form" action="list.php?" method="get">
            <div class="form-group">
              <input name="search" class="input-lg form-control-lg form-control" type="text" aria-label="Search" autofocus="autofocus" style="box-shadow: none;">
            </div>
            <div class="form-group col-lg-6 offset-lg-3">
              <div class="row">
                <div class="col-lg-6"><input class="btn btn-primary btn-block" type="submit" value="Library 搜索" /></div>
                <div class="col-lg-6"><input class="btn btn-outline-primary btn-block" type="button" value="手气不错" /></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-inner bg-white">
      <div class="row">
        <div class="col-sm-12 text-right"> Designed by Arrack</div>
      </div>
    </div>
  </footer>
  <!-- /.site-footer -->

  <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <!--Local Stuff-->
    
</body>
</html>
