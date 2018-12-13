
<?php
  include "src/header.php";
  include "src/sidebar.php";

  require_once __DIR__.'/../vendor/autoload.php';

	$tution = new Tution();

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tution'])){
	    $saveTution = $tution->saveAllTutionInformaion($_POST);
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
    	      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create Tutions</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          	<form action="tutioncreate.php" method="POST">
	  		    <?php
	                if(isset($saveTution)){
	                    echo $saveTution;
	                }
	             ?>
          	<div class="col-md-12">
            <div class="col-md-6">

          <div class="form-group">
          		<?php
					$tutionCode = $tution->getTutionCode();
                 ?>
	              <label for="tutionCode">Tution Code</label>
	              <input type="text" class="form-control" id="tutionCode" name="tutionCode" value="<?php echo $tutionCode; ?>" readonly="readonly">
            </div>

          <div class="form-group">
	              <label for="teacherFrom" >Teacher from (univeersity)</label>
	              <input type="text" name="teacherFrom" class="form-control" id="teacherFrom"  placeholder="Enter email">
            </div>



              <div class="form-group">
	                <label>Tution City Name</label>
	                <select class="form-control select2" style="width: 100%;" name="tutionAt">
		                  <option selected="selected" >Select One</option>
		                   <?php
                                $cities = $tution->getAllCity();
                                foreach ($cities as $city){ ?>
                                  <option value="<?php echo $city['city_name'];?>"> <?php echo $city['city_name'];?></option>
                            <?php } ?>
	                </select>
              </div>
          <div class="form-group">
	              <label for="tutionClass"> Tution Class</label>
	              <input type="text" name="tutionClass" class="form-control" id="tutionClass" placeholder="Enter email">
            </div>
          <div class="form-group">
	              <label for="tutionGroup"> Tution Group</label>
	              <input type="text" name="tutionGroup" class="form-control" id="tutionGroup" placeholder="Enter email">
            </div>

              <div class="form-group">
	                <label>Tution Medium</label>
	                <select class="form-control select2" style="width: 100%;" name="tutionMedium">
		                  <option selected="selected">Alabama</option>
                            <?php
                            $mediums = $tution->getAllMedium();
                            foreach ($mediums as $medium){
                                ?>
                                <option value="<?php echo $medium['medium'];?>"><?php echo $medium['medium'];?></option>
                            <?php } ?>
	                </select>
              </div>
                    <div class="form-group">
                          <label for="tutionSubject"> Tution Subject</label>
                          <input type="text" class="form-control" id="tutionSubject" name="tutionSubject" placeholder="Enter email">
                    </div>

            </div>
          <div class="col-md-6">
          <div class="form-group">
	              <label for="tutionSalary"> Tution Salary</label>
	              <input type="text" class="form-control" id="tutionSalary" name="tutionSalary"  placeholder="Enter email">
            </div>

          <div class="form-group">
	              <label for="tutionLocation"> Tution Location</label>
	              <input type="text" class="form-control" id="tutionLocation" name="tutionLocation" placeholder="Enter email">
            </div>
          <div class="form-group">
	              <label for="tutionTime"> Tution Time </label>
	              <input type="text" class="form-control" id="tutionTime" name="tutionTime" placeholder="Enter email">
            </div>
          <div class="form-group">
	              <label for="tutionMediafee"> Tution Media Fee</label>
	              <input type="text" class="form-control" id="tutionMediafee" name="tutionMediafee" placeholder="Enter email">
            </div>



              <div class="form-group">
	                <label>Tution Duration</label>
	                <select class="form-control select2" style="width: 100%;" name="tutionDurations">
		                  <option selected="selected">Alabama</option>
                            <?php
                                $durations = $tution->getAllDurations();
                                    foreach ($durations as $duration){
                                ?>

                                <option value="<?php echo $duration['duration'];?>"><?php echo $duration['duration'];?> hours</option>
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

	                                <option value="<?php echo $day['days_in_week'];?>"><?php echo $day['days_in_week'];?> in a week</option>
                            <?php } ?>
	                </select>
              </div>


              <div class="form-group">
                  <label > Teacher Gender</label>
                  <select class="form-control select2" style="width: 100%;" name="teacherGenger">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
              </div>

            	 <div class="form-actions float-right">
                    <button type="submit" name="tution" class="btn btn-primary">Save </button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
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