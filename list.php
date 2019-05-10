<?php
  require_once('handle/checklogin.php');

  $pre = "list";
  $pagesize = 10;
  $showpages = 5;
  $page = 0;
  $searchsql = "";
  $loginhref = "login?pre=".$pre;

  if (isset($_GET["page"])) {
      $page = $_GET["page"];
  }
  if (isset($_GET["search"])) {
      $search = $_GET['search'];
      $searchsql = "where biblioname like "."'%".$search."%' ";
      $loginhref = $loginhref."&search=$search";
  }

  $totalsql = "select COUNT(*) from tb_bibliography ";
  $selectsql = "select * from tb_bibliography ";
  $limitsql = "limit ".$page*$pagesize.",".$pagesize;

  $query = mysqli_query($con, $selectsql.$searchsql.$limitsql);
  $totaldata = mysqli_fetch_row(mysqli_query($con, $totalsql.$searchsql));
  $totalpages = ceil($totaldata[0] / $pagesize);

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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>List</title>
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
    .text{
      word-break: break-all;
      text-indent: 25px;
      text-overflow: ellipsis;/**显示省略号**/
      display: -webkit-box; /** 将对象作为伸缩盒子模型显示 **/
      -webkit-box-orient: vertical; /** 设置或检索伸缩盒对象的子元素的排列方式 **/
      -webkit-line-clamp: 2; /** 显示的行数 **/
      overflow: hidden;  /** 隐藏超出的内容 **/
    }
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
          <form class="col-lg-6" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="input-group" style="margin: 8px 0px">
              <input id="search" name="search" type="text" class="form-control" style="box-shadow: none;" value="<?php if (isset($_GET['search'])) echo $_GET['search'] ?>" />
              <span class="input-group-btn">
                <button id="go" class="btn btn-outline-secondary" type="submit">Go!</button>
              </span>
            </div>
          </form>
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

  <!-- Content -->
  <div class="content">
    <?php
      if (!empty($data)) {
        foreach ($data as $value) {
     ?>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="card">
          <div class="card-header">
              <h4 class="float-left"><strong class="card-title"><a target="_blank" href="detail.php?callnumber=<?php echo $value['call_number'] ?>"><?php echo $value['biblioname']?></a></strong></h4>
              <small class="text-muted float-right"><?php echo $value['author']." ".$value['press']." ".$value['publishing_time'];?></small>
          </div>
          <div class="card-body">
            <p class="card-text text"><?php echo $value['intro']?></p>
          </div>
        </div>
      </div>
    </div><?php }} ?>
    <?php
      if ($totaldata[0] > 10) {
    ?>
    <nav aria-label="Page navigation example" class="col-lg-3 offset-lg-3">
      <ul class="pagination">
        <li class="page-item <?php if ($page < 1) echo 'disabled'?>">
          <a class="page-link" href='<?php echo $_SERVER['PHP_SELF']."?page=".($page - 1);?>' aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <?php for ($i=0; $i < $totalpages && $i < $showpages; $i++) {?>
        <li class="page-item <?php if ($page == $i) echo 'active'?>"><a class="page-link" href='<?php echo $_SERVER['PHP_SELF']."?page=".$i;?>'><?php echo $i+1 ?></a></li>
        <?php } ?>
        <li class="page-item <?php if ($page >= $totalpages - 1) echo 'disabled' ?>">
          <a class="page-link" href='<?php echo $_SERVER['PHP_SELF']."?page=".($page + 1);?>' aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
    <?php } ?>
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
