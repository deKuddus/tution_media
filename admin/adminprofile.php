
<?php
include "src/header.php";
include "src/sidebar.php";
require_once __DIR__.'/../vendor/autoload.php';
$admin = new Admin();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
                $id  = Session::get("userID");
                $getAdminInfo = $admin->getAdminProfile($id);
                if($getAdminInfo){
                    foreach ($getAdminInfo as $info){
                    ?>
            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">

                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo $info['image'];?>" height="100px" width="200px" alt="User Avatar">
                    </div>
                    <br><br>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12 border-right">
                                <div class="description-block">
                                    <h3 class="widget-user-username"><strong>Full  Name: </strong><?php echo $info['fullName']; ?></h3>
                                    <h3 class="widget-user-username"><strong>User Name:</strong> <?php echo $info['user_name']; ?></h3>
                                    <h4 class="widget-user-desc"><strong>Email</strong> <?php echo $info['email']; ?></h4>
                                    <h4 class="widget-user-desc"><strong>Role:</strong> <?php echo $info['role']; ?></h4>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <?php } } ?>
        </div>
        <!-- /.row -->
   </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "src/footer.php"; ?>