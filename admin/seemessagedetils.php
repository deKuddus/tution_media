
<?php
include "src/header.php";
include "src/sidebar.php";
require_once __DIR__.'/../vendor/autoload.php';
$regi = new Registration();

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
            <li class="active">Message</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

                    <div class="col-md-12">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-12 border-right">
                                        <div class="description-block">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>

                                                    <th>Mobile</th>
                                                    <th>Message</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   <?php
                                                    if(isset($_GET['messageid'])){
                                                        $id = $_GET['messageid'];
                                                        $getsingleMessage = $regi->getMessageById($id);
                                                        if($getsingleMessage){
                                                        foreach ($getsingleMessage as $message){
                                                     ?>
                                                                                            <tr>
                                                        <td><?php echo $message['mobile']; ?></td>
                                                        <td><?php echo $message['message']; ?></td>

                                                    </tr>
                                                <?php } }}?>
                                                <tfoot>
                                                <tr>
                                                    <th>Mobile</th>
                                                    <th>Message</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "src/footer.php"; ?>