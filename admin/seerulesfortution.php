
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$gardianClass = new Gardian();
$tut = new Tution();



if(isset($_GET['deleteid'])){
    $id  = $_GET['deleteid'];
    $deleteRule = $tut->deleteRulesById($id);
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
                                        <th width="10%">ID</th>
                                        <th width="80%">Rules</th>
                                        <th width="10%">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $allRules = $tut->getAllTutionRules();
                                    foreach ($allRules as $rule){
                                        ?>
                                        <tr>
                                            <td><?php echo $rule['id']; ?></td>
                                            <td><?php echo $rule['rules']; ?></td>
                                            <td class="center">
                                                <a class="btn btn-success" href="editrules.php?editid=<?php echo $rule['id'];?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" onclick="return confirm('are you sure to delete');" href="?deleteid=<?php echo $rule['id'];?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rules</th>
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