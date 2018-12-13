<?php
require_once __DIR__.'/../vendor/autoload.php';
Session::checkLogin();
$db = new Database();
$fm = new Format();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){
    $userName = $fm->validation($_POST['username']);
    $password = $fm->validation($_POST['password']);

    $userName = mysqli_real_escape_string($db->link, $userName);
    $password= mysqli_real_escape_string($db->link, $password);
    $password = md5($password);

    $query = "SELECT * FROM tbl_admin WHERE  user_name = '$userName' AND password = '$password' ";
    $result = $db->select($query);
    if($result){
        $value = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);
        if($row){
            Session::set("login", true);
            Session::set("username", $value['user_name']);
            Session::set("userID", $value['id']);
            Session::set("userRole", $value['role']);
            header("Location: index.php");
        }else{
            $message = "<h3 class='alert-danger'> Some thing has going error,try  again.</h3>>";
        }
    }else{
        $message = "<h3 class='alert-danger'> User Name or Password is incorrect ,try  again.</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <p><?php echo $message;?></p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Type user name here">
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

    <!-- /.social-auth-links -->

    <a href="forgotpass.php">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
