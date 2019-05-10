<?php
    require_once('handle/checkadmin.php');
    $callnumber = $_GET['callnumber'];
    $query = mysqli_query($con, "select * from tb_bibliography where call_number = '$callnumber'");
    $data = mysqli_fetch_assoc($query);
    mysqli_close($con);
?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Biblio-Modify</title>
  <meta name="description" content="Ela Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">

          <li><a href="./"><i class="menu-icon fa fa-laptop"></i>Dashboard</a></li>

          <li class="menu-title">Database</li><!-- /.menu-title -->

          <li class="active menu-item-has-children dropdown">
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
  </aside><!-- /#left-panel -->

  <!-- Left Panel -->

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
    <!-- /Header -->

      <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
          <div class="row m-0">
            <div class="col-sm-4">
              <div class="page-header float-left">
                <div class="page-title">
                  <h1>书目修改</h1>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="page-header float-right">
                <div class="page-title">
                  <ol class="breadcrumb text-right">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="db.manage.php">Database Manage</a></li>
                    <li><a href="biblio.manage.php">Bibliography</a></li>
                    <li class="active">Modify</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
          <div class="animated fadeIn">

            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                      <strong>书目修改</strong>
                  </div>
                  <div class="card-body card-block">
                    <form action="handle/biblio.modify.handle.php" method="post" class="form-horizontal">
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="callnumber" class=" form-control-label">索书号</label></div>
                        <div class="col-12 col-md-5"><input type="text" id="callnumber" name="callnumber" placeholder="call_number" class="form-control" value="<?php echo $data['call_number']?>" readonly/></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="biblioname" class=" form-control-label">书名</label></div>
                        <div class="col-12 col-md-5"><input type="text" id="biblioname" name="biblioname" placeholder="biblioname" class="form-control" value="<?php echo $data['biblioname']?>" /></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="author" class=" form-control-label">作者</label></div>
                        <div class="col-12 col-md-5"><input type="text" id="author" name="author" placeholder="author" class="form-control" value="<?php echo $data['author']?>" /></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="press" class=" form-control-label">出版社</label></div>
                        <div class="col-12 col-md-5"><input type="text" id="press" name="press" placeholder="press" class="form-control" value="<?php echo $data['press']?>" /></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="publishingtime" class=" form-control-label">出版年份</label></div>
                        <div class="col-12 col-md-5"><input type="number" min="1900" max="2030" step="1" id="publishingtime" name="publishingtime" placeholder="publishingtime" class="form-control" value="<?php echo $data['publishing_time']?>" /></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="isbn" class=" form-control-label">ISBN</label></div>
                        <div class="col-12 col-md-5"><input type="text" id="isbn" name="isbn" placeholder="ISBN" class="form-control" value="<?php echo $data['ISBN']?>" /></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="category" class=" form-control-label">类别</label></div>
                        <div class="col-12 col-md-5"><input type="text" id="category" name="category" placeholder="category" class="form-control" value="<?php echo $data['category']?>" /></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-2"><label for="price" class=" form-control-label">价格</label></div>
                        <div class="col-12 col-md-5"><input type="number" min="0" step="0.01" id="price" name="price" placeholder="price" class="form-control" value="<?php echo $data['price']?>" /></div>
                      </div>
                      <div class="row form-group">
                          <div class="col col-md-2"><label for="intro" class="form-control-label">简介</label></div>
                          <div class="col-12 col-md-5"><textarea class="form-control" id="intro" rows="5" name="intro" ><?php echo $data['intro']?></textarea></div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-10"></div>
                        <div class="col col-md-2">
                          <button type="submit" class="btn btn-primary">提交</button>
                          <button type="button" class="btn btn-outline-primary">重置</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>

      </div><!-- .animated -->
  </div><!-- .content -->

  <div class="clearfix"></div>

  <footer class="site-footer">
    <div class="footer-inner bg-white">
      <div class="row">
        <div class="col-sm-6">Copyright &copy; 2018 Ela Admin.</div>
        <div class="col-sm-6 text-right"> Designed by Colorlib. Modified by Arrack</div>
      </div>
    </div>
  </footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>


</body>
</html>
