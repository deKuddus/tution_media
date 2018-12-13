
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$adminClass = new Admin();

if(isset($_GET['deleteid'])){
    $id  = $_GET['deleteid'];
    $deletefooterImage = $adminClass->deleteFooterImageById($id);
}

if(isset($_GET['actionIdForactive'])){
    $id = $_GET['actionIdForactive'];
    $activeImage = $adminClass->deactiveFooterImageById($id);
}


if(isset($_GET['actionIdForDeactive'])){
    $id = $_GET['actionIdForDeactive'];
    $deactiveImage = $adminClass->activeFooterImageById($id);
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
                        if(isset($deletefooterImage)){
                            echo $deletefooterImage;
                        }
                        if(isset($deactiveImage)){
                            echo $deactiveImage;
                        }
                        if(isset($activeImage)){
                            echo $activeImage;
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
                                        <th>Hints Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getfooterImage = $adminClass->getAllfooterImage();
                                    foreach ($getfooterImage as $image){
                                        ?>
                                        <tr>
                                            <td><?php echo $image['id']; ?></td>
                                            <td><?php echo $image['image_hints']; ?></td>
                                            <td><img src="<?php echo $image['image']; ?>" height="50px" width="50px" alt=""></td>
                                            <td><?php

                                                if($image['status'] == 1){ ?>
                                                    <a class="btn btn-info" href="?actionIdForactive=<?php echo $image['id'];?>">
                                                        <i class="far fa-thumbs-up"></i><span> Active</span>
                                                    </a>
                                                <?php }else { ?>

                                                    <a class="btn btn-danger" href="?actionIdForDeactive=<?php echo $image['id'];?>">
                                                        <i class="far fa-thumbs-down"></i> <span class="label label-danger"> Deactive</span>
                                                    </a>
                                                <?php }  ?></td>
                                            <td class="center">

                                                <a class="btn btn-danger" onclick="return confirm('are you sure to delete');" href="?deleteid=<?php echo $image['id'];?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hints Name</th>
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