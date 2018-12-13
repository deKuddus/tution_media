
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$adminClass = new Admin();

if(isset($_GET['deleteid'])){
    $id  = $_GET['deleteid'];
    $delete = $adminClass->deleteAdminById($id);
}

if(isset($_GET['actionIdForactive'])){
    $id = $_GET['actionIdForactive'];
    $deactiveAdmin = $adminClass->deactiveAdminById($id);
}


if(isset($_GET['actionIdForDeactive'])){
    $id = $_GET['actionIdForDeactive'];
    $deactiveAdmin = $adminClass->activeAdminById($id);
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
            <li class="active">rules</li>
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
                            if(isset($deleteRule)){
                                echo $deleteRule;
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
                                        <th>Full Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>role</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $getAdmin = $adminClass->getAllAdmin();
                                        foreach ($getAdmin as $admins){
                                        ?>
                                        <tr>
                                            <td><?php echo $admins['id']; ?></td>
                                            <td><?php echo $admins['fullName']; ?></td>
                                            <td><?php echo $admins['user_name']; ?></td>
                                            <td><?php echo $admins['email']; ?></td>
                                            <td><?php echo $admins['role']; ?></td>
                                            <td><img src="<?php echo $admins['image']; ?>" height="50px" width="50px" alt=""></td>
                                            <td><?php

                                                if($admins['status'] == 1){ ?>
                                                    <a class="btn btn-info" href="?actionIdForactive=<?php echo $admins['id'];?>">
                                                        <i class="far fa-thumbs-down"></i>
                                                    </a>
                                                <?php }else { ?>
                                                    <a class="btn btn-info" href="?actionIdForDeactive=<?php echo $admins['id'];?>">
                                                        <i class="far fa-thumbs-up"></i>
                                                    </a>
                                                <?php }  ?></td>
                                            <td class="center">
                                                <a class="btn btn-danger" onclick="return confirm('are you sure to delete');" href="?deleteid=<?php echo $admins['id'];?>">
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