
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$tut = new Tution();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatesocial'])){
    $updatesocial = $tut->updateSocailById($_POST);
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Create Tuttion Rules</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form action="addsocialmedia.php" method="POST">
                        <?php
                        if(isset($savesocail)){
                            echo $savesocail;
                        }
                        ?>
                        <div class="col-md-12">

                            <?php
                                if($_GET['socialedit']){
                                    $id = $_GET['socialedit'];
                                    $getSocial  = $tut->getSocialByid($id);
                                    if($getSocial){
                                        foreach ($getSocial as $social){}
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="linkid"    value="<?php echo $social['id'];?>">
                            </div>
                            <div class="form-group">
                                <label for="linkName" >Links Write Here </label>
                                <input type="text" name="linkName" class="form-control" id="linkName"  value="<?php echo $social['linkName'];?>">
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" id="icon" class="form-control" value="<?php echo $social['icon'];?>">
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="updatesocial" class="btn btn-primary"> Save </button>
                                <button type="reset" class="btn">Cancel</button>
                            </div>
                        </div>
                        <!-- /.col -->
                </div>
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