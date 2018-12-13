
<?php
include "src/header.php";
include "src/sidebar.php";

require_once __DIR__.'/../vendor/autoload.php';

$tution = new Tution();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $updatetution = $tution->updateTutionInformaion($_POST);
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Update Tutions</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <?php
                        if(isset($_GET['editId'])){
                            $tutionId = $_GET['editId'];
                            $getTutionByid = $tution->editTutionByID($tutionId);
                            foreach ($getTutionByid as $data){

                    ?>
                    <form action="edittution.php" method="POST">

                        <div class="col-md-12">
                            <div class="col-md-6">
                                    <input type="hidden" name="tutionid" value="<?php echo $data['id']; ?>">


                                <div class="form-group">
                                    <label for="tutionCode">Tution Code</label>
                                    <input type="text" class="form-control" id="tutionCode" name="tutionCode" value="<?php echo $data['tution_code']; ?>" readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label for="teacherFrom" >Teacher from (univeersity)</label>
                                    <input type="text" name="teacherFrom" class="form-control" id="teacherFrom"  value="<?php echo $data['teacher_university']; ?>">
                                </div>



                                <div class="form-group">
                                    <label>Tution City Name</label>
                                    <select class="form-control select2" style="width: 100%;" name="tutionAt">
                                        <option selected="selected" >Select One</option>
                                        <?php
                                        $cities = $tution->getAllCity();
                                        foreach ($cities as $city){ ?>
                                            <option value="<?php echo $city['city_name'];?>"
                                            <?php
                                                if($data['tution_at'] == $city['city_name']){ ?>
                                                    selected
                                                <?php } ?>

                                            > <?php echo $city['city_name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tutionClass"> Tution Class</label>
                                    <input type="text" name="tutionClass" class="form-control" id="tutionClass" value="<?php echo $data['tution_class']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tutionGroup"> Tution Group</label>
                                    <input type="text" name="tutionGroup" class="form-control" id="tutionGroup" value="<?php echo $data['tution_group']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tution Medium</label>
                                    <select class="form-control select2" style="width: 100%;" name="tutionMedium">
                                        <option selected="selected">Alabama</option>
                                        <?php
                                        $mediums = $tution->getAllMedium();
                                        foreach ($mediums as $medium){
                                            ?>
                                            <option value="<?php echo $medium['medium'];?>"
                                            <?php
                                                if($data['tution_medium'] == $medium['medium']){ ?>
                                                    selected
                                                    <?php  } ?>

                                            ><?php echo $medium['medium'];?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="form-group">
                                        <label for="tutionSubject"> Tution Subject</label>
                                        <input type="text" class="form-control" id="tutionSubject" name="tutionSubject" value="<?php echo $data['tution_subject']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tutionSalary"> Tution Salary</label>
                                    <input type="text" class="form-control" id="tutionSalary" name="tutionSalary"  value="<?php echo $data['tution_salary']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="tutionLocation"> Tution Location</label>
                                    <input type="text" class="form-control" id="tutionLocation" name="tutionLocation" value="<?php echo $data['tution_location']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tutionTime"> Tution Time </label>
                                    <input type="text" class="form-control" id="tutionTime" name="tutionTime" value="<?php echo $data['tution_time']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tutionMediafee"> Tution Media Fee</label>
                                    <input type="text" class="form-control" id="tutionMediafee" name="tutionMediafee" value="<?php echo $data['tution_media_fee']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tution Duration</label>
                                    <select class="form-control select2" style="width: 100%;" name="tutionDurations">
                                        <option selected="selected">Alabama</option>
                                        <?php
                                        $durations = $tution->getAllDurations();
                                        foreach ($durations as $duration){
                                            ?>

                                            <option value="<?php echo $duration['duration'];?>"
                                            <?php

                                                if($data['tution_duration'] == $duration['duration']){ ?>
                                                        selected
                                                    <?php } ?>
                                            ><?php echo $duration['duration'];?> hours</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tution Days In A Week</label>
                                    <select class="form-control select2" style="width: 100%;" name="daysInAWeek">
                                        <option selected="selected">Alabama</option>
                                        <?php
                                        $days = $tution->getAllTeachingDays();
                                        foreach ($days as $day){
                                            ?>

                                            <option value="<?php echo $day['days_in_week'];?>"
                                                <?php
                                                    if($data['days_in_week'] == $day['days_in_week']){ ?>
                                                        selected
                                                 <?php    }  ?>
                                            ><?php echo $day['days_in_week'];?> in a week</option>
                                        <?php } ?>
                                    </select>
                                </div>



                                <div class="form-actions float-right">
                                    <button type="submit" name="update" class="btn btn-primary">Save </button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div>
                            </div>


                        </div>
                        <!-- /.col -->
                </div>
                <!-- /.row -->
                </form>
                <?php } } ?>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php include "src/footer.php"; ?>