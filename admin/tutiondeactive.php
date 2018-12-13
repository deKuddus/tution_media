<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$tutionClass = new Tution();


if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    $deletedById = $tutionClass->deleteTutionByID($id);
}

if(isset($_GET['actionIdForActive'])){
    $id = $_GET['actionIdForActive'];
    $statusActive = $tutionClass->changeStatusActiveById($id);
}

if(isset($_GET['actionIdForDeactive'])){
    $id = $_GET['actionIdForDeactive'];
    $statusDeactive = $tutionClass->changeStatusDeativeById($id);
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
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Active Tutions</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>tutionCode</th>
                                            <th>Teachers from </th>
                                            <th>Group</th>
                                            <th>Medium</th>
                                            <th>Days</th>
                                            <th>Salary</th>
                                            <th>Time</th>
                                            <th>Location</th>
                                            <th>mediaFee</th>
                                            <th>Change status</th>
                                            <th>action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $allDeactiveTutions = $tutionClass->getAllDeactiveTutions();
                                        foreach ($allDeactiveTutions as $tution){
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php if($tution['status'] ==0){ ?>
                                                        <span class="label label-danger">Deactive</span>
                                                    <?php  } ?>

                                                </td>
                                                <td><?php echo $tution['tution_code']; ?></td>
                                                <td><?php echo $tution['teacher_university']; ?></td>
                                                <td><?php echo $tution['tution_group']; ?></td>
                                                <td><?php echo $tution['tution_medium']; ?></td>
                                                <td><?php echo $tution['days_in_week']; ?></td>
                                                <td><?php echo $tution['tution_salary']; ?></td>
                                                <td><?php echo $tution['tution_time']; ?></td>
                                                <td><?php echo $tution['tution_location']; ?></td>
                                                <td><?php echo $tution['tution_media_fee']; ?></td>
                                                <td>
                                                    <?php
                                                    if($tution['status'] == 1){?>

                                                        <a class="btn btn-info" href="?actionIdForDeactive=<?php echo $tution['id'];?>">
                                                            <i class="far fa-thumbs-down"></i>
                                                        </a>
                                                    <?php } else {?>
                                                        <a class="btn btn-info" href="?actionIdForActive=<?php echo $tution['id'];?>">
                                                            <i class="far fa-thumbs-down"></i>
                                                        </a>
                                                    <?php }?>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-info" href="edittution.php?editId=<?php echo $tution['id'];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" onclick="return confirm('are you sure to delete');"                                                            href="?deleteId=<?php echo $tution['id'];?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tfoot>
                                        <tr>
                                            <th>Status</th>
                                            <th>tutionCode</th>
                                            <th>Teachers from </th>
                                            <th>Group</th>
                                            <th>Medium</th>
                                            <th>Days</th>
                                            <th>Salary</th>
                                            <th>Time</th>
                                            <th>Location</th>
                                            <th>mediaFee</th>
                                            <th>action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
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