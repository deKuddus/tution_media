
<?php 
  include "src/header.php";
  include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$gardianClass = new Gardian();


if(isset($_GET['deletegardianId'])){
    $id = $_GET['deletegardianId'];
    $deletedById = $gardianClass->deleteGardianByID($id);
}
if(isset($_GET['actionIdForActive'])){
    $id = $_GET['actionIdForActive'];
    $activeById = $gardianClass->activeGardianById($id);
}
if(isset($_GET['actionIdForDeactive'])){
    $id = $_GET['actionIdForDeactive'];
    $deletedById = $gardianClass->deactiveGardianById($id);
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
                <h3 class="box-title">All Deactive Gardians</h3>
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
                            <th>Status</th>
                            <th>Designation</th>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>action</th>
                        </tr>
                </thead>
                <tbody>
                        <?php
                        $allDectiveGardian = $gardianClass->getAllDectivegardian();
                        foreach ($allDectiveGardian as $gardian){
                            ?>
                            <tr>
                                <td><?php echo $gardian['id']; ?></td>
                                <td>
                                    <?php if($gardian['status'] ==0){ ?>
                                        <span class="label label-warning">Dective</span>
                                    <?php  } ?>

                                </td>
                                <td><?php echo $gardian['designation']; ?></td>
                                <td><?php echo $gardian['user_name']; ?></td>
                                <td><?php echo $gardian['full_name']; ?></td>
                                <td><?php echo $gardian['email']; ?></td>
                                <td><?php echo $gardian['mobile']; ?></td>
                                <td class="center">
                                    <?php if($gardian['status'] == 1){ ?>
                                        <a class="btn btn-info" href="?actionIdForDeactive=<?php echo $gardian['id'];?>">
                                            <i class="far fa-thumbs-up"></i>
                                        </a>
                                    <?php }else{ ?>
                                        <a class="btn btn-info" href="?actionIdForActive=<?php echo $gardian['id'];?>">
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