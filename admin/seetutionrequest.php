
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$tutionClass = new Tution();
$teacherClass = new Teacher();

if(isset($_GET['deleteid'])){
    $id  = $_GET['deleteid'];
    $deleteRequest = $tutionClass->deleteRequestById($id);
}

if(isset($_GET['actionIdForactive'])){
    $id = $_GET['actionIdForactive'];
    $deactivetutionReq = $tutionClass->deactiveTutionRequestById($id);
}


if(isset($_GET['actionIdForDeactive'])){
    $id = $_GET['actionIdForDeactive'];
    $activetutionReq = $tutionClass->activeTutionRequestById($id);
}

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
            <li class="active">Tution Request</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Rules For Tutions </h3>
                        <?php
                        if(isset($deleteRequest)){
                            echo $deleteRequest;
                        }
                        ?>
                    </div>
                    <!-- /.box-header -->

                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Teacher ID</th>
                                        <th>Tution Code</th>
                                        <th>Tution Class</th>
                                        <th>Tution Salary</th>
                                        <th>Tution Location</th>
                                        <th>Tution Status</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getTutionRequest = $tutionClass->getAllTutionRequestForAdmin();
                                    foreach ($getTutionRequest as $request){
                                        ?>
                                        <tr>
                                            <td><?php echo $request['id']; ?></td>

                                            <td><?php

                                                $teacherID = $request['teacher_id'];
                                                $getTeacherCode = $teacherClass->getTutorCodeByID($teacherID);
                                                foreach ($getTeacherCode as $teacher){
                                                    echo $teacher['teacher_code'];
                                                }

                                                ?></td>

                                            <td><?php echo $request['tution_code']; ?></td>
                                            <td><?php echo $request['tution_class']; ?></td>
                                            <td><?php echo $request['tution_salary']; ?></td>
                                            <td><?php echo $request['tution_location']; ?></td>
                                            <td>
                                                <?php if($request['status'] ==1){ ?>
                                                    <span class="label label-success">Done</span>
                                                <?php  }else{?>
                                                    <span class="label label-danger">Pending</span>
                                                <?php } ?>

                                            </td>
                                            <td class="center">
                                                <?php
                                                    if($request['status'] == 1){?>
                                                        <a class="btn btn-success" href="?actionIdForDeactive=<?php echo $request['id'];?>">
                                                            <i class="far fa-thumbs-down"></i>
                                                        </a>
                                                    <?php }else { ?>
                                                        <a class="btn btn-success" href="?actionIdForactive=<?php echo $request['id'];?>">
                                                            <i class="far fa-thumbs-up"></i>
                                                        </a>
                                                    <?php }  ?>
                                                <a class="btn btn-danger" onclick="return confirm('are you sure to delete');" href="?deleteid=<?php echo $request['id'];?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>role</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "src/footer.php"; ?>