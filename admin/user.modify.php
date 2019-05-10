<?php
    require_once('handle/checkadmin.php');
    $sid = $_GET['sid'];
    $query = mysqli_query($con, "select * from tb_user where sid = '$sid'");
    $data = mysqli_fetch_assoc($query);
    mysqli_close($con);
?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User-Modify</title>
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
    <!--/Header -->

      <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
          <div class="row m-0">
            <div class="col-sm-4">
              <div class="page-header float-left">
                <div class="page-title">
                  <h1>用户修改</h1>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="page-header float-right">
                <div class="page-title">
                  <ol class="breadcrumb text-right">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="db.manage.php">Database Manage</a></li>
                    <li><a href="biblio.manage.php">User</a></li>
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
                    <strong>用户修改</strong>
                </div>
                <div class="card-body card-block">
                  <form action="handle/user.modify.handle.php" method="post" class="form-horizontal">
                    <div class="row form-group">
                      <div class="col col-md-2"><label for="sid" class=" form-control-label">学号</label></div>
                      <div class="col-12 col-md-5"><input type="text" id="sid" name="sid" placeholder="学号" class="form-control" value="<?php echo $data['sid']?>" readonly/></div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-2"><label for="username" class=" form-control-label">姓名</label></div>
                      <div class="col-12 col-md-5"><input type="text" id="username" name="username" placeholder="姓名" class="form-control" value="<?php echo $data['username']?>" /></div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-2"><label for="sex" class=" form-control-label">性别</label></div>
                      <div class="col col-md-9">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="sexMale" name="sex" value="1" class="custom-control-input" <?php if($data['sex'] != "0") echo "checked=checked"?>>
                          <label class="custom-control-label" for="sexMale">男</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="sexFamale" name="sex" value="0" class="custom-control-input" <?php if($data['sex'] == "0") echo "checked=checked"?>>
                          <label class="custom-control-label" for="sexFamale">女</label>
                        </div>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-2"><label for="birth" class=" form-control-label">出生日期</label></div>
                      <div class="col-12 col-md-5"><input type="text" id="birth" name="birth" placeholder="出生日期" class="form-control" value="<?php echo $data['birth']?>" /></div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-2"><label for="school" class=" form-control-label">学院</label></div>
                      <div class="col-12 col-md-5">
                        <select name="school" id="school" class="form-control">
                          <option value="null"></option>
                          <option value="计算机学院" <?php if($data['school'] == "计算机学院") echo "selected=\"selected\""?> >计算机学院</option>
                          <option value="理学院" <?php if($data['school'] == "理学院") echo "selected=\"selected\""?>>理学院</option>
                          <option value="经济管理学院" <?php if($data['school'] == "经济管理学院") echo "selected=\"selected\""?>>经济管理学院</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-2"><label for="class_" class=" form-control-label">班级</label></div>
                      <div class="col-12 col-md-5"><input type="text" id="class_" name="class_" placeholder="班级" class="form-control" value="<?php echo $data['class']?>" /></div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-2"><label for="password" class=" form-control-label">密码</label></div>
                      <div class="col-12 col-md-5"><input type="text" id="password" name="password" placeholder="密码默认为学号后6位" class="form-control"/></div>
                    </div>
                    
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                          <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                      </div>
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Multiple File input</label></div>
                          <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file"></div>
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
