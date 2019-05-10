<?php
  require_once('handle/checklogin.php');

  $action = "handle/loginout?act=login";

  if ($islogin) {
      if ($_SESSION['admin']) {
          echo "<script>window.location.href='../admin';</script>";
      } else {
          echo "<script>window.location.href='../list';</script>";
      }
  }
  if (isset($_GET['pre'])) {
      $pre = $_GET['pre'];
      $action = $action."&pre=$pre";
  }
  if (isset($_GET['search'])) {
      $search = $_GET['search'];
      $action = $action."&search=$search";
  } else if (isset($_GET['callnumber'])) {
      $callnumber = $_GET['callnumber'];
      $action = $action."&callnumber=$callnumber";
  }
  mysqli_close($con);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>登录</title>
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
    html,
    body {
      height: 100%;
    }
    .form-signin {
      width: 100%;
      max-width: 350px;
      padding: 15px;
      margin: auto;
    }
    .content{padding-bottom:90px;}
    footer{position:absolute;bottom:0;width:100%;height:90px;}
  </style>
</head>

<body>

<div class="content">
  <div class="row col-lg-10 offset-lg-1">
    <div class="col-lg-6 offset-lg-3 logo" style="padding-bottom: 1rem ">
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
  </div>

  <div class="row">
    <div class="card" style="margin: 0 auto">
      <div class="card-body">
        <form class="form-signin" action="<?php echo $action ?>" method="post">
          <h1 class="h3 mb-4 font-weight-normal">请登录</h1>
          <input type="text" id="sid" name="sid" class="form-control" placeholder="用户名" required="" autofocus="" style="box-shadow: none">
          <input type="password" id="password" name="password" class="form-control" placeholder="密码" required="" style="box-shadow: none">
          <div class="custom-control custom-checkbox mt-3 mb-4">
            <input type="checkbox" class="custom-control-input" id="remember">
            <label class="custom-control-label" for="remember">记住我</label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
        </form>
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
