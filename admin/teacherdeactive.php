
<?php 
  include "src/header.php";
  include "src/sidebar.php";

    require_once __DIR__.'/../vendor/autoload.php';

    $teacherClass = new Teacher();


    if(isset($_GET['deleteTeacherId'])){
        $id = $_GET['deleteTeacherId'];
        $deletedById = $teacherClass->deleteTeacherByID($id);
    }

    if(isset($_GET['actionIdForActive'])){
        $id = $_GET['actionIdForActive'];
        $statusActive = $teacherClass->statusActiveByIdFromDectivePage($id);
    }

    if(isset($_GET['actionIdForDeactive'])){
        $id = $_GET['actionIdForDeactive'];
        $statusDeactive = $teacherClass->statusDectiveByIdFromDectivePage($id);
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">All Deactive Teachers</h3>
            </div>
            <!-- /.box-header -->
           
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <tr>
                            <th>Status</th>
                            <th>Designation</th>
                            <th>TecherCode</th>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th> Type</th>
                            <th> Details</th>
                            <th>action</th>
                        </tr>
                </thead>
                <tbody>
                        <?php
                        $allDectiveTeacher = $teacherClass->getAllDectiveTeacher();
                        foreach ($allDectiveTeacher as $teacher){
                            ?>
                            <tr>
                                <td>
                                    <?php if($teacher['status'] ==1){ ?>
                                        <span class="label label-success">Active</span>
                                    <?php  }else{?>
                                        <span class="label label-danger">Deactive</span>
                                    <?php } ?>

                                </td>
                                <td><?php echo $teacher['designation']; ?></td>
                                <td><?php echo $teacher['teacher_code']; ?></td>
                                <td><?php echo $teacher['user_name']; ?></td>
                                <td><?php echo $teacher['full_name']; ?></td>
                                <td><?php echo $teacher['email']; ?></td>
                                <td><?php echo $teacher['mobile']; ?></td>
                                <td><?php echo $teacher['member_type']; ?></td>
                                <td class="center">
                                    <a class="btn btn-success" href="seeteacherdetails.php?actionid=<?php echo $teacher['id'];?>">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                                <td class="center">
                                    <?php if($teacher['status'] == 1){ ?>
                                        <a class="btn btn-info" href="?actionIdForDeactive=<?php echo $teacher['id'];?>">
                                            <i class="far fa-thumbs-up"></i>
                                        </a>
                                    <?php }else{ ?>
                                        <a class="btn btn-info" href="?actionIdForActive=<?php echo $teacher['id'];?>">
                                            <i class="far fa-thumbs-down"></i>
                                        </a>
                                    <?php } ?>
                                    <a class="btn btn-danger" onclick="return confirm('are you sure to delete');" href="?deleteTeacherId=<?php echo $teacher['id'];?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
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