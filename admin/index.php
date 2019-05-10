<?php
    require_once('handle/checkadmin.php');

    $bicount = mysqli_fetch_row(mysqli_query($con, "select COUNT(*) from tb_bibliography"));
    $bcount = mysqli_fetch_row(mysqli_query($con, "select COUNT(*) from tb_book"));
    $usercount = mysqli_fetch_row(mysqli_query($con, "select COUNT(*) from tb_user"));
    $dbcount = $bicount[0] + $bcount[0] + $usercount[0];
    $recount = mysqli_fetch_row(mysqli_query($con, "select COUNT(*) from tb_reserve"));
    mysqli_close($con);
?>

<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator</title>
  <meta name="description" content="Ela Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style type="text/css">
    body{min-height:100%;position:relative;}
    html{height:100%;}
    .content{padding-bottom:90px;}
    footer{position:absolute;bottom:0;width:80%;height:90px;}
  </style>
</head>
  
<body>
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">

          <li class="active"><a href="./"><i class="menu-icon fa fa-laptop"></i>Dashboard</a></li>

          <li class="menu-title">Database</li><!-- /.menu-title -->

          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Database Manage</a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="fa pe-7s-news-paper"></i><a href="biblio.manage.php">Bibliography</a></li>
              <li><i class="fa fa-user"></i><a href="user.manage.php">User</a></li>
              <li><i class="fa fa-file-text-o"></i><a href="record.manage.php">Record</a></li>
            </ul>
          </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </aside>
  <!-- /#left-panel -->
  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      <div class="top-left">
        <div class="navbar-header">
          <a class="navbar-brand" href="./">Library-Admin</a>
        </div>
      </div>
      <div class="top-right">
        <div class="header-menu">
          <?php if ($_SESSION['admin']) {?>
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-expanded="false">欢迎，管理员</a>
            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="../handle/loginout.php?act=logout"><i class="fa fa-power-off"></i>Logout</a>
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
    <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
        <div class="row m-0">
          <div class="col-sm-4">
            <div class="page-header float-left">
              <div class="page-title">
                <h1>管理模式</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="page-header float-right">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li class="active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content -->
    <div class="content">
      <!-- Animated -->
      <div class="animated fadeIn">
        <div class="row">

          <div class="col-lg-3 col-md-6" onclick="location.href='db.manage.php'" onmouseover="style.cursor='pointer'">
            <div class="card">
              <div class="card-body">
                <div class="stat-widget-four">
                  <div class="stat-icon dib">
                    <i class="ti-server text-muted"></i>
                  </div>
                  <div class="stat-content">
                    <div class="text-left dib">
                      <div class="stat-heading">DatabaseItem</div>
                      <div class="stat-text">Total: <?php echo $dbcount?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" onclick="location.href='borrow.manage.php'" onmouseover="style.cursor='pointer'">
            <div class="card">
              <div class="card-body">
                <div class="stat-widget-four">
                  <div class="stat-icon dib">
                    <i class="ti-pulse text-muted"></i>
                  </div>
                  <div class="stat-content">
                    <div class="text-left dib">
                      <div class="stat-heading">Borrowing</div>
                      <div class="stat-text">Total: <?php echo $recount[0]?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /Widgets -->                
      </div>
      <!-- /Animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
    <footer class="site-footer">
      <div class="footer-inner bg-white">
        <div class="row">
          <div class="col-sm-6">Copyright &copy; 2018 Ela Admin.</div>
          <div class="col-sm-6 text-right"> Designed by Colorlib. Modified by Arrack</div>
        </div>
      </div>
    </footer>
    <!-- /.site-footer -->
  </div>
  <!-- /#right-panel -->

  <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/plugins.js"></script>
  <script src="../assets/js/main.js"></script>
  <!--Local Stuff-->
    
</body>
</html>
