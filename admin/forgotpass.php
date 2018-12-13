<?php
require_once __DIR__.'/../vendor/autoload.php';
Session::checkLogin();
$db = new Database();
$fm = new Format();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['forgotpass'])){
    $userName = $fm->validation($_POST['username']);
    $email = $fm->validation($_POST['email']);

    $userName = mysqli_real_escape_string($db->link, $userName);
    $email= mysqli_real_escape_string($db->link, $email);

    if($userName == "" OR $email ==""){
        $message1 = "<h3 class='alert-danger text-center'> Input Field Mustbe filled to Reset your Password</h3>";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $message2 = "<h3 class='alert-danger text-center'> Email Address is Invalid</h3>";
    }else{

        $query = "SELECT * FROM tbl_admin WHERE  user_name = '$userName' AND email = '$email' ";
        $result = $db->select($query);
        if($result){
            echo "<script>window.location = 'passwordreset.php';</script>>";
        }else{
            $message = "<h3 class='alert-danger text-center'> Account Not found OR user Name OR Email is incorrect ,try  again.</h3>";
        }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>forgot password</title>
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

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p><?php echo $message;?></p>
        <p><?php echo $message1;?></p>
        <p><?php echo $message2;?></p>
        <form action="forgotpass.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Type old user name">
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Your old email">
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="forgotpass" class="btn btn-primary btn-block btn-flat">submit</button>
                </div>
                <!-- /.col -->
            </div>
        </form>



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
