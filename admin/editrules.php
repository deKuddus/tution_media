
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$tut = new Tution();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updaterules'])){
    $updaterules = $tut->updateRules($_POST);
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
                    <form action="editrules.php" method="POST">
                        <?php
                        if(isset($updaterules)){
                            echo $updaterules;
                        }

                        ?>
                        <div class="col-md-12">
                            <?php
                                if(isset($_GET['editid'])){
                                    $id = $_GET['editid'];
                                    $getrulse = $tut->getTutionRulesByid($id);
                                    if($getrulse){
                                        foreach ($getrulse as $rules){}
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="rulesId" value="<?php echo $rules['id'];?>">
                            </div>
                            <div class="form-group">
                                <label for="rules" >Rules </label>
                                <input type="text" name="rules" class="form-control" id="rules"  value="<?php echo $rules['rules'];?>">
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="updaterules" class="btn btn-primary">Save </button>
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