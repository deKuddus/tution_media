<?php
require_once __DIR__.'/../../vendor/autoload.php';
Session::sessioninit();
Session::checkSession();
$regi = new Registration();
$admin = new Admin();
$tutionClass  = new Tution();
if(isset($_GET['action'])){
    Session::sessionDestroy();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tution Media Ctg</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><i class="far fa-user"></i></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="far fa-bell"></i>
              <span class="label label-success">
                   <?php

                       $newTeacherRegistration = $regi->getNewTeacherRegistraion();
                       if($newTeacherRegistration > 0){
                           echo $newTeacherRegistration;
                       }else{
                           echo 0;
                       }

                   ?>
                  </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php
                  if($newTeacherRegistration > 0){
                      echo $newTeacherRegistration;
                  }else{
                      echo 0;
                  }
                  ?>  notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                      <?php
                      $getAllnewTeacherRegistration = $regi->getAllNewTeacherRegistration();
                      if(isset($getAllnewTeacherRegistration)){
                          foreach ($getAllnewTeacherRegistration as $newTeacher) {
                              ?>
                              <a href="seenewteacher.php?actionId=<?php echo $newTeacher['id']?>">
                                  <span class="message">New user <strong><?php echo $newTeacher['user_name']?></strong> hasbeen registred</span>
                              </a>
                          <?php } } ?>
                  </li>
                  <!-- end message -->

                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <i class="far fa-envelope"></i>
              <span class="label label-warning">
                  <?php
                    $countMessage = $regi->countNewMessage();
                    if($countMessage > 0){
                        echo $countMessage;
                    }else{
                        echo 0;
                    }
                  ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php
                  if($countMessage > 0){
                      echo $countMessage;
                  }else{
                      echo 0;
                  } ?> Messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <?php
                    $newMessage = $regi->getNewMessage();
                    if($newMessage) {
                        foreach ($newMessage as $message){
                    ?>
                  <li>
                    <a href="seemessagedetils.php?messageid=<?php echo $message['id'];?>">
                      <i class="fa fa-user text-red"></i> <?php echo $message['mobile'];?> sent a message
                    </a>
                  </li>
                    <?php } } ?>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>


          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="far fa-flag"></i>
              <span class="label label-danger">
                  <?php
                    $getNewTutionReq = $tutionClass->getTutionRequestCount();
                    if($getNewTutionReq > 0 ){
                        echo  $getNewTutionReq;
                    }else{
                        echo 0;
                    }
                  ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                  <?php
                  if($getNewTutionReq > 0 ){
                      echo  $getNewTutionReq;
                  }else{
                      echo 0;
                  }
                  ?>
                  New Tution Request</li>
              <li>
                <!-- inner menu: contains the actual data -->
              </li>
              <li class="footer">
                <a href="seetutionrequest.php">View all Request</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                    $id = Session::get('userID');
                    $getAdminImage = $admin->getAdminProfile($id);
                    if($getAdminImage){
                    foreach ($getAdminImage as $data) {

                        ?>
                        <img src="<?php echo $data['image']; ?>" class="user-image" alt="User Image">
                <?php } } ?>
              <span class="hidden-xs"><?php echo Session::get("username")?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  <?php
                      $id = Session::get('userID');
                      $getAdminImage = $admin->getAdminProfile($id);
                      if($getAdminImage){
                          foreach ($getAdminImage as $data) {

                          ?>
                          <img src="<?php echo $data['image']; ?>" class="user-image" alt="User Image">
                  <?php } } ?>

                <p>
                  <?php echo Session::get("username")?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="adminprofile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?action=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
