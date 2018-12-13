<?php

include "src/header.php";
require_once __DIR__.'/vendor/autoload.php';
Session::sessioninit();
Session:: checkGardianSession();
$teacher = new Teacher();
$gardian = new Gardian();
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
            $('#example4').DataTable( {
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -2 }
                ]
            } );

            $('#example5').DataTable( {
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
                            <li><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                            <li><a href="#updateProfile" data-toggle="tab">Update Profile</a></li>
                            <li><a href="#appliedTeacher" data-toggle="tab">Requested Teacher</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <?php
                        $id = Session::get("gardian_id");
                        $userName = Session::get("gardian_userName");
                        $email = Session::get("gardian_email");
                        $profile = $gardian->getGardianProfile($id,$userName,$email);
                        if($profile){
                            foreach ($profile as $data){

                                ?>
                                <div class="tab-pane fade" id="dashboard">
                                    <div class="col-md-6">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <div class="box box-widget widget-user-2">
                                                        <div class="widget-user-header bg-yellow">

                                                        </div>
                                                        <div class="box-footer no-padding">
                                                            <ul class="nav nav-stacked">
                                                                <li><a href="#">UserName :<span class="pull-right label label-success"><?php echo $data['user_name']; ?></span></a></li>
                                                                <li><a href="#">Full Name :<span class="pull-right label label-success"><?php echo $data['full_name']; ?></span></a></li>
                                                                <li><a href="#">Designation :<span class="pull-right label label-success"><?php echo $data['designation']; ?></span></a></li>
                                                                <li><a href="#">Email :<span class="pull-right label label-success"><?php echo $data['email']; ?></span></a></li>
                                                                <li><a href="#">Mobile:<span class="pull-right label label-success"><?php echo $data['mobile']; ?></span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>

                        <?php
                        $id = Session::get("gardian_id");
                        $email = Session::get("gardian_email");
                        $gardianProfile = $gardian->updateGardianDetaisl($id,$email);
                        if($gardianProfile){
                            foreach ($gardianProfile as $data){

                                ?>
                                <div class="tab-pane fade" id="updateProfile">

                                    <div class="col-md-6">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <div class="box box-widget widget-user-2">
                                                        <hr>
                                                        <div class="box-footer no-padding">
                                                            <?php
                                                            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['gardian_profUpdate'])){
                                                                $updateGardianProf = $gardian->updateGardianProfile($_POST);
                                                            }
                                                            ?>
                                                            <form action="gardianprofile.php" method="post">
                                                                <?php
                                                                if(isset($updateTeacherExpectation)){
                                                                    echo $updateTeacherExpectation;
                                                                }
                                                                ?>
                                                                <input type="hidden" name="gardianId" value="<?php echo $data['id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="designation">Designation</label>
                                                                    <input type="text" name="designation" class="form-control" id="designation" readonly  value="<?php echo $data['designation']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="g_userName">User Name</label>
                                                                    <input type="text" name="g_userName" class="form-control" id="g_userName" value="<?php echo $data['user_name']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="g_fullName">Full Name</label>
                                                                    <input type="text" name="g_fullName" class="form-control" id="g_fullName" value="<?php echo $data['full_name']; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="g_email">Expected Subject</label>
                                                                    <input type="text" name="g_email" class="form-control" id="g_email" value="<?php echo $data['email']; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="g_mobile">Expected Salary</label>
                                                                    <input type="text" name="g_mobile" class="form-control" id="g_mobile" value="<?php echo $data['mobile']; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary pull-right" name="gardian_profUpdate">update</button>

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

                    </div>

                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="appliedTeacher">
            <div class="col-md-12 col-sm-12">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">

                            <table id="example4" class="display nowrap" width="100%">
                                <thead>
                                <tr class="text-center">
                                    <th class="text-center">Teacher Code</th>
                                    <th class="text-center">Teacher User Name</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $gardianid = Session::get("gardian_id");
                                $tutorReq = $gardian->getTutorRequest($gardianid);
                                if($tutorReq){
                                    foreach ($tutorReq as $request){

                                        ?>
                                        <tr>
                                            <td><?php echo $request['teacher_code']; ?></td>
                                            <td><?php echo $request['teacher_user_name']; ?></td>
                                            <td>
                                                <?php if($request['status'] ==1){ ?>
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




        <h1>All Active Tution</h1>
        <hr>
        <div>
            <table id="example5" class="display nowrap" width="100%">
                <thead>
                <tr>
                    <th>Code </th>
                    <th>User Name</th>
                    <th>Department</th>
                    <th>Versity</th>
                    <th>Background</th>
                    <th>expected area</th>
                    <th>expected Class</th>
                    <th>expected subject</th>
                    <th>expected salary</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $getTeachers = $teacher->getAllActiveTeacheForUser();
                if($getTeachers){
                    foreach ($getTeachers as $teacher){

                        ?>
                        <tr>
                            <td><?php echo $teacher['teacher_code']; ?></td>
                            <td><?php echo $teacher['user_name']; ?></td>
                            <td><?php echo $teacher['department']; ?></td>
                            <td><?php echo $teacher['university']; ?></td>
                            <td><?php echo $teacher['education_background']; ?></td>
                            <td><span class="text-success"><?php echo $teacher['expected_area']; ?></span></td>
                            <td><span class="text-success"><?php echo $teacher['expected_class']; ?></span></td>
                            <td><span class="text-success"><?php echo $teacher['expected_subject']; ?></span></td>
                            <td><?php echo $teacher['expected_salary']; ?>tk</td>
                            <td class="center">
                                <a class="btn btn-info" href="applyteacher.php?teacgerId=<?php echo $teacher['teacher_id'];?>">
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