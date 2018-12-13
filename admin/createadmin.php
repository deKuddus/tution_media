
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
                    <form action="createadmin.php" method="POST" enctype="multipart/form-data">

                       <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin'])){

                                    $createNewAdmin = $admin->createNewAdmin($_POST);
                                }
                                    if(isset($createNewAdmin)){
                                        echo "<span class='text-center'>".$createNewAdmin."</span>";
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="adminFullName" >Admin Full Name</label>
                                    <input type="text" name="adminFullName" class="form-control" id="adminFullName"  placeholder="Write Admin Full Name Here">
                                </div>

                                <div class="form-group">
                                    <label for="adminUserName"> Admin User Name </label>
                                    <input type="text" name="adminUserName" class="form-control" id="adminUserName" placeholder="Write Admin User Name Here">
                                </div>
                                <div class="form-group">
                                    <label for="adminEmail"> Admin Email</label>
                                    <input type="email" name="adminEmail" class="form-control" id="adminEmail" placeholder="Admin Email Here">
                                </div>

                                <div class="form-group">
                                    <label for="adminRole"> Admin Role </label>
                                    <input type="text" name="adminRole" class="form-control" id="adminRole" placeholder="Admin Role Here">
                                </div>

                                <div class="form-group">
                                    <label for="adminPassword"> Admin Password </label>
                                    <input type="password" name="adminPassword" class="form-control" id="adminPassword" placeholder="Admin password Here">
                                </div>

                                <div class="form-group">
                                    <label for="confirmpassword"> Confirm Password </label>
                                    <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Type password again here">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image Upload</label>
                                    <input type="file" name="image" id="exampleInputFile">
                                </div>



                                <div class="form-actions float-right">
                                    <button type="submit" name="admin" class="btn btn-primary">Save </button>
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