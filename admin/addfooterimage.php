
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$admin = new Admin();


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Create Admin</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form action="addfooterimage.php" method="POST" enctype="multipart/form-data">

                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['footerimage'])){

                                $addFooterImagw = $admin->addNewFooterImage($_POST);
                            }
                            if(isset($addFooterImagw)){
                                echo "<span class='text-center'>".$addFooterImagw."</span>";
                            }
                            ?>

                            <div class="form-group">
                                <label for="imageHints"> Image Hints</label>
                                <input type="text" name="imageHints" class="form-control" id="imageHints" placeholder="Type Image Hints here">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image Upload</label>
                                <input type="file" name="image" id="exampleInputFile">
                            </div>



                            <div class="form-actions float-right">
                                <button type="submit" name="footerimage" class="btn btn-primary">Save </button>
                                <button type="reset" class="btn">Cancel</button>
                            </div>

                        </div>
                </div>
                <div class="col-md-4"></div>
                <!-- /.row -->
                </form>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php include "src/footer.php"; ?>