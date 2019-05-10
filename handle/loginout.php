<?php
	require_once('../connect.php');
	
	$act = $_GET['act'];
	$sid = $_POST['sid'];
	$password = md5($_POST['password']);
	
	switch ($act) {
		case 'login':
			$sql = "select username, role from tb_user, tb_role where tb_role.sid = '$sid' and password = '$password' and tb_role.sid = tb_user.sid limit 1";
			$query = mysqli_query($con, $sql);
			$result = mysqli_fetch_assoc($query);
			if ($query && $result && !empty($result)) {
				session_start();
				$_SESSION['islogin'] = true;
				$_SESSION['sid'] = $sid;
				$_SESSION['username'] = $result['username'];
				if ($result['role'] == 'admin') {
					$_SESSION['admin'] = true;
					echo "<script>window.location.href='../admin';</script>";
				} else {
					$_SESSION['admin'] = false;
					if (isset($_GET['pre'])) {
						$href = "../".$_GET['pre'];
						if (isset($_GET['search'])) {
							$search = $_GET['search'];
							$href = $href . "?search=".$_GET['search'];
						} else if (isset($_GET['callnumber'])) {
							$callnumber = $_GET['callnumber'];
							$href = $href . "?callnumber=".$_GET['callnumber'];
						}
						echo "<script>window.location.href='".$href."'</script>";
					} else {
						echo "<script>window.location.href='../';</script>";
					}
				}
			} else {
				die("<script>alert('用户名或密码错误');window.location.href='../login';</script>");
			}
			break;
		case 'logout':
			$_SESSION = [];
			if (ini_get('session.use_cookies')) {
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time()-1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
			}
			session_destroy();
			header('location: /library2');
			break;
		default:
			break;
	}

	mysqli_close($con);
?>