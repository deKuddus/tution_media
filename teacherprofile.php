<?php

include "src/header.php";
require_once __DIR__.'/vendor/autoload.php';
Session::sessioninit();
Session::checkteacherSession();
$tecProf = new Teacher();
$tutionClass = new Tution();
?>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -2 }
                ]
            });
            $('#example1').DataTable( {
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -2 }
                ]
            } );

            $('#example3').DataTable( {
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -2 }
                ]
            } );

        } );
    </script>

    <!-- Contact-->
    <section class="container">


        <div  class="row contact generic ">
            <div style="clear: both;overflow: hidden">
                <div class="category-tab" style="border-top: 2px solid red; margin-bottom: 8px;"><!--category-tab-->
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" style="margin-bottom: 5px">
                            <li class="active" class=""><a href="#dashboard" data-toggle="tab">Dashboard-</a></li>
                            <li class=""><a href="#expectation" data-toggle="tab">Expectation</a></li>
                            <li class=""><a href="#tution" data-toggle="tab">Tution</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <?php
                            $id = Session::get("user_id");
                            $userName = Session::get("teacher_username");
                            $email = Session::get("user_email");
                            $profile = $tecProf->getTeacherProfile($id,$userName,$email);
                            if($profile){
                            foreach ($profile as $data){

                            ?>
                        <div class="tab-pane fade" id="dashboard">
                            <div class="col-md-6">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $data['image']; ?>" class="" alt="no image" height="200px" width="200px">
                                            <div class="box box-widget widget-user-2">
                                                <div class="widget-user-header bg-yellow">
                                                    <h4 class="widget-user-username" style="color: darkgreen"><?php echo $data['full_name']; ?></h4>
                                                    <br>
                                                    <h3 class="widget-user-desc" style="color: red"><?php echo $data['designation']; ?> </h3>
                                                </div>
                                                <div class="box-footer no-padding">
                                                    <ul class="nav nav-stacked">
                                                        <li><a href="#">Teacher Code :<span class="pull-right badge bg-blue"><?php echo $data['teacher_code']; ?></span></a></li>
                                                        <li><a href="#">Full Name :<span class="pull-right badge bg-blue"><?php echo $data['full_name']; ?></span></a></li>
                                                        <li><a href="#">Mobile :<span class="pull-right badge bg-aqua"><?php echo $data['mobile']; ?></span></a></li>
                                                        <li><a href="#"> Email :<span class="pull-right badge bg-green"><?php echo $data['email']; ?></span></a></li>
                                                        <li><a href="#">Member Type :<span class="pull-right badge bg-red"><?php echo $data['member_type']; ?></span></a></li>
                                                        <li><a href="#"> Living Place : <span class="pull-right badge bg-red"><?php echo $data['living_place']; ?></span></a></li>
                                                        <li><a href="#"> University  : <span class="pull-right badge bg-red"><?php echo $data['university']; ?></span></a></li>
                                                        <li><a href="#"> Medium From :   <span class="pull-right badge bg-red"><?php echo $data['education_background']; ?></span></a></li>
                                                        <li><a href="#"> Department From :   <span class="pull-right badge bg-red"><?php echo $data['department']; ?></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary pull-right"><a href="hello.html" style="color: #FFFFFF">update</a></button>
                            </div>
                        </div>
                       <?php } } ?>


                        <?php
                            $id = Session::get("user_id");
                            $userName = Session::get("teacher_username");
                            $email = Session::get("user_email");
                            $expectedProfile = $tecProf->getTeacherAllExpectation($id);
                            if($expectedProfile){
                                foreach ($expectedProfile as $data){

                      ?>
                                <div class="tab-pane fade" id="expectation">

                                    <div class="col-md-6">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <div class="box box-widget widget-user-2">
                                                        <h3 style="color: green">You Can Udate Your Expectation</h3>
                                                        <hr>
                                                        <div class="box-footer no-padding">
                                                            <?php
                                                                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['profUpdate'])){
                                                                    $updateTeacherExpectation = $tecProf->updateTeacherExpectation($_POST);
                                                                }
                                                            ?>
                                                          <form action="teacherprofile.php" method="post">
                                                              <?php
                                                                if(isset($updateTeacherExpectation)){
                                                                    echo $updateTeacherExpectation;
                                                                }
                                                              ?>
                                                              <input type="hidden" name="teacherId" value="<?php echo $data['id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="expectedCity">Expected City</label>
                                                                    <input type="text" name="expectedCity" class="form-control" id="expectedCity" value="<?php echo $data['expected_city']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="expectedArea">Expected Area</label>
                                                                    <input type="text" name="expectedArea" class="form-control" id="expectedArea" value="<?php echo $data['expected_area']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="expectedClass">Expected Class</label>
                                                                    <input type="text" name="expectedClass" class="form-control" id="expectedClass" value="<?php echo $data['expected_class']; ?>">
                                                                </div>

                                                                  <div class="form-group">
                                                                      <label for="expectedSuject">Expected Subject</label>
                                                                      <input type="text" name="expectedSuject" class="form-control" id="expectedSuject" value="<?php echo $data['expected_subject']; ?>">
                                                                  </div>

                                                              <div class="form-group">
                                                                  <label for="expectedSalary">Expected Salary</label>
                                                                  <input type="text" name="expectedSalary" class="form-control" id="expectedSalary" value="<?php echo $data['expected_salary']; ?>">
                                                              </div>

                                                              <div class="form-group">
                                                                  <label for="expectedTime">Expected Time</label>
                                                                  <input type="text" name="expectedTime" class="form-control" id="expectedTime" value="<?php echo $data['expected_time']; ?>">
                                                              </div>

                                                              <div class="form-group">
                                                                  <label for="expectedDays" style="text-align: left">Expected days in Week</label>
                                                                  <input type="text" name="expectedDays" class="form-control" id="expectedDays" value="<?php echo $data['expected_day_inweek']; ?>">
                                                              </div>

                                                              <div class="form-group">
                                                                  <button type="submit" class="btn btn-primary pull-right" name="profUpdate">update</button>

                                                              </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php } } ?>



                        <div class="tab-pane fade" id="tution">
                            <div class="col-md-12 col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <table id="example3" class="display nowrap" width="100%">
                                                <thead>
                                                <tr class="text-center">
                                                    <th class="text-center">TutionCode</th>
                                                    <th class="text-center">Salary</th>
                                                    <th class="text-center">Location</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php

                                                $teacherid = Session::get("user_id");
                                                $tutionReq = $tutionClass->getAllTutionRequest($teacherid);
                                                if($tutionReq){
                                                    foreach ($tutionReq as $tution){

                                                        ?>
                                                        <tr>
                                                            <td><?php echo $tution['tution_code']; ?></td>
                                                            <td><?php echo $tution['tution_salary']; ?></td>
                                                            <td><?php echo $tution['tution_location']; ?></td>
                                                            <td>
                                                                <?php if($tution['status'] ==1){ ?>
                                                                    <span class="label label-success">Accepted</span>
                                                                <?php  }else{?>
                                                                    <span class="label label-danger">Pending</span>
                                                                <?php } ?>

                                                            </td>
                                                        </tr>
                                                    <?php } } ?>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            </div>








                <h1>All Active Tution</h1>
                <hr>
                <div>
                    <table id="example1" class="display nowrap" width="100%">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th>tutionCode</th>
                            <th>Teachers Wants from </th>
                            <th>Group</th>
                            <th>Medium</th>
                            <th>Days</th>
                            <th>Salary</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>mediaFee</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $tutions = $tutionClass->getAllActiveTutions();
                        if($tutions){
                            foreach ($tutions as $tution){

                                ?>
                                <tr>
                                    <td>
                                        <?php if($tution['status'] ==1){ ?>
                                            <span class="label label-success">Active</span>
                                        <?php  } ?>

                                    </td>
                                    <td><?php echo $tution['tution_code']; ?></td>
                                    <td><?php echo $tution['teacher_university']; ?></td>
                                    <td><?php echo $tution['tution_group']; ?></td>
                                    <td><?php echo $tution['tution_medium']; ?></td>
                                    <td><?php echo $tution['days_in_week']; ?></td>
                                    <td><?php echo $tution['tution_salary']; ?></td>
                                    <td><?php echo $tution['tution_time']; ?></td>
                                    <td><?php echo $tution['tution_location']; ?></td>
                                    <td><?php echo $tution['tution_media_fee']; ?></td>
                                    <td class="center">
                                        <a class="btn btn-info" href="tutionapply.php?tutionId=<?php echo $tution['id'];?>">
                                            <i class="far fa-envelope"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
    </section><br>
    <!-- end Contact -->


<?php

include "src/footer.php";

?>