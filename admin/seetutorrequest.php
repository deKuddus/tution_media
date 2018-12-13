
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$tutionClass = new Tution();
$teacherClass = new Teacher();

if(isset($_GET['deleteid'])){
    $id  = $_GET['deleteid'];
    $deleteRequest = $tutionClass->deleteTeacherRequestById($id);
}

if(isset($_GET['actionIdForactive'])){
    $id = $_GET['actionIdForactive'];
    $deactivetutionReq = $tutionClass->deactiveTeacherRequestById($id);
}


if(isset($_GET['actionIdForDeactive'])){
    $id = $_GET['actionIdForDeactive'];
    $activetutionReq = $tutionClass->activeTeacherRequestById($id);
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
                                        <th>Teacher Code</th>
                                        <th>Teacher UserName</th>
                                        <th>Gardian UserName</th>
                                        <th>Gardian Mobile</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getTutorRequest = $tutionClass->getAllTutorRequestForAdmin();
                                    foreach ($getTutorRequest as $request){
                                        ?>
                                        <tr>
                                            <td><?php echo $request['id']; ?></td>

                                            <td><?php echo $request['teacher_code']; ?></td>
                                            <td><?php echo $request['teacher_user_name']; ?></td>
                                            <td><?php

                                                $gardianID = $request['gardian_id'];
                                                $getGardian = $tutionClass->getGardianDataByID($gardianID);
                                                foreach ($getGardian as $gardian){
                                                    echo $gardian['user_name'];
                                                }

                                                ?></td>
                                            <td><?php echo $gardian['mobile']; ?></td>
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
                                        <th>Teacher Code</th>
                                        <th>Teacher UserName</th>
                                        <th>Gardian UserName</th>
                                        <th>Gardian Mobile</th>
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