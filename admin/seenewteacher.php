
<?php
include "src/header.php";
include "src/sidebar.php";
require_once __DIR__.'/../vendor/autoload.php';
$teacher = new Teacher();

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
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <style>
        .fonts{
            font-size:18px;
        }
    </style>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <?php
            if(isset($_GET['actionId'])){
                $id = $_GET['actionId'];
                $teacherDetails = $teacher->SeeNewteacherById($id);
                foreach ($teacherDetails as $info){
                    ?>
                    <div class="col-md-8">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-yellow">
                                <!-- /.widget-user-image -->
                                <h2 style="font-weight: bold" class="widget-user-username"><?php echo $info['full_name']; ?></h2>
                                <h5 class="widget-user-desc badge bg-red"><?php echo $info['designation']; ?></h5>
                            </div>
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    <li>
                                        <a class="fonts" href="#">Status
                                            <?php if($info['status'] == 1){ ?>
                                            <span class="pull-right badge bg-green fonts">Active
                                                <?php  }else{?>
                                                <span class="pull-right badge bg-red  fonts">Deactive
                                                <?php } ?> </span>
                                        </a>
                                    </li>
                                    <li><a class="fonts" href="#">TecherCode <span class="pull-right badge bg-red fonts"><?php echo $info['teacher_code']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">Member Type <span class="pull-right badge bg-green fonts"><?php echo $info['member_type']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">User Name <span class="pull-right badge bg-red fonts"><?php echo $info['user_name']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">Mobile  <span class="pull-right badge bg-green fonts"><?php echo $info['mobile']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">Email  <span class="pull-right badge bg-green fonts"><?php echo $info['email']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">Department  <span class="pull-right badge bg-green fonts"><?php echo $info['department']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">Living Place  <span class="pull-right badge bg-green fonts"><?php echo $info['living_place']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">University  <span class="pull-right badge bg-green fonts"><?php echo $info['university']; ?></span></a></li>
                                    <li><a class="fonts"  href="#">Education Background  <span class="pull-right badge bg-green fonts"><?php echo $info['education_background']; ?></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                <?php } } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "src/footer.php"; ?>