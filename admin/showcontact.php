<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$reg = new Registration();


if(isset($_GET['deletemessage'])){
    $id = $_GET['deletemessage'];
    $deletedById = $reg->deleteMessageByID($id);
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
                            <h3 class="box-title">All Active Teachers</h3>
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
                                            <th>Mobile</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $allUserMessage = $reg->getAllUserMessage();
                                        foreach ($allUserMessage as $message){
                                            ?>
                                            <tr>
                                                <td><?php echo $message['id']; ?></td>
                                                <td><?php echo $message['mobile']; ?></td>
                                                <td><?php echo $message['message']; ?></td>
                                                <td class="center">
                                                    <?php if($teacher['status'] == 1){ ?>

                                                            <span class="label label-success">Seen</span>

                                                    <?php }else{ ?>

                                                        <span class="label label-danger">New</span>

                                                    <?php } ?></td>
                                                <td>
                                                    <a class="btn btn-info"  href="seemessagedetils.php?messageid=<?php echo $message['id'];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>                                                    <a class="btn btn-danger" onclick="return confirm('are you sure to delete');" href="?deletemessage=<?php echo $message['id'];?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mobile</th>
                                            <th>Message</th>
                                            <th>Status</th>
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