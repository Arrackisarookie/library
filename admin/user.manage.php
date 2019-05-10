<?php
    require_once('handle/checkadmin.php');
    $sql = "select * from tb_user, tb_role where role <> 'admin' and tb_user.sid = tb_role.sid order by tb_role.sid";
    $query = mysqli_query($con, $sql);
    if ($query && mysqli_num_rows($query)) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
    } else {
        $data = array();
    }
    mysqli_close($con);
?>

<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User-Management</title>
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
                  <h1>用户管理</h1>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="page-header float-right">
                <div class="page-title">
                  <ol class="breadcrumb text-right">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="db.manage.php">Database Manage</a></li>
                    <li class="active">User</li>
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
                    <strong class="card-title mb-3">增</strong>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-outline-secondary" onclick="location.href='user.add.php'">单项添加</button>
                  <button type="button" class="btn btn-outline-secondary" onclick="location.href='#'">批量添加</button>
                </div>
              </div>
            </div>


            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong class="card-title">删改</strong>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">学号</th>
                        <th scope="col">姓名</th>
                        <th scope="col">性别</th>
                        <th scope="col">出生日期</th>
                        <th scope="col">学院</th>
                        <th scope="col">班级</th>
                        <th scope="col">密码</th>
                        <th scope="col">操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!empty($data)) {
                            foreach ($data as $value) {
                    ?>
                      <tr>
                        <th scope="row"><?php echo $value['sid']?></th>
                        <td><?php echo $value['username']?></td>
                        <td><?php if ($value['sex'] == '1') echo "男"; else if($value['sex'] == '0') echo "女"?></td>
                        <td><?php echo $value['birth']?></td>
                        <td><?php echo $value['school']?></td>
                        <td><?php echo $value['class']?></td>
                        <td><?php echo $value['password']?></td>
                        <td>
                          <a href="user.modify.php?sid=<?php echo $value['sid']?>">修改</a>
                          <a href="handle/user.del.handle.php?sid=<?php echo $value['sid']?>">删除</a>
                        </td>
                      </tr>
                    <?php }}?>
                    </tbody>
                  </table>
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
