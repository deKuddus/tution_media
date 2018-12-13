<?php

include "src/header.php";
include "src/slider.php";
require_once __DIR__.'/vendor/autoload.php';
$teacher = new Teacher();
?>



    <!-- Features -->
    <section id="menu-features" class="features container">

        <!-- search part start -->
        <section class="col-md-12">
            <div class="row">
                <h1 class="text-center">Recent 6 Tuition</h1>
                <p class="text-center">Use following search box to find tuition that fits you better</p>
            </div>
            <hr>
            <div class="row">
                <form action="hello.html">
		<span class="col-md-4 provide-left provide-one">

				<div class="form-gorup">

				  <select class="form-control custom-select" id="inputGroupSelect01">
				    <option selected>Choose...</option>
				    <option value="1">One</option>
				    <option value="2">Two</option>
				    <option value="3">Three</option>
				  </select>
				</div>

		</span>
                    <span class="col-md-4 provide-left provide-two">
				<div class="form-gorup">

				  <select class="form-control custom-select" id="inputGroupSelect01">
				    <option selected>Choose...</option>
				    <option value="1">One</option>
				    <option value="2">Two</option>
				    <option value="3">Three</option>
				  </select>
				</div>
		</span>
                    <span class="col-md-4 provide-left provide-tre">
				<div class="form-gorup">

				  <select class="form-control custom-select" id="inputGroupSelect01">
				    <option selected>Choose...</option>
				    <option value="1">One</option>
				    <option value="2">Two</option>
				    <option value="3">Three</option>
				  </select>
				</div>
		</span><br>
                    <div class="clearfix"></div>
                    <div class="text-center" style="margin-top: 10px">
                        <button type="submit" class="btn btn-primary">Appy filter to find your tution</button>
                    </div>
                </form>
            </div>
        </section>
        <div class="clearfix"></div><br>


    <!-- Information -->
    <section class="container">
        <h2>All active teacher</h2>
        <?php
            $getAllTeachers = $teacher->getAllActiveTeacheForUser();
            if($getAllTeachers){
                foreach ($getAllTeachers  as $teachers){

        ?>
        <div  class="row  tutorstyle">
            <div class="col-md-12">
                <div class="col-md-1">
                    <br>
                    <img src="resource/img/client1.jpg" height="50px" width="50px">
                </div>
                <div class="col-md-8">
                    <h4 class="hStyle1">Tutuor Code : <?php echo $teachers['teacher_code']; ?></h4>
                    <h4 class="hStyle1"><?php echo $teachers['full_name']; ?></h4>
                    <h4 class="hsyle2"><?php echo $teachers['university']; ?></h4>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <h3 class="hstyle3">Expected Location : <span style="color:green"><?php echo $teachers['expected_area']; ?></span></h3>
                <span><h3 class="hstyle3">Expected Class(s):</h3>
						<ul class="list-inline">
							<li class="classStyle"><?php echo $teachers['expected_class']; ?></li>
						</ul>
					</span>
                <div class="clearfix"></div><br>
                <div class="col-md-6">
                    <ul class="list-inline">
                        <li> leaving palce :
                            <i class="fas fa-map-marker-alt"></i>  <?php echo $teachers['living_place']; ?>
                        </li>
                        <li>Expected Salary: <?php echo $teachers['expected_salary']; ?>
                            <?php if($teachers['expected_salary'] != ""){
                                echo "tk";
                            } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } }  ?>
    </section>
    <!-- end Information -->



    <style type="text/css">
        .contactsection {
            margin-right: -80px;
            margin-left: -80px;
        }
    </style>
    <!-- Contact-->
    <section class="container">
        <div  class="row contact generic ">
            <h1 class="text-center">hello world is first programming practise output</h1>
            <p class="sub-title">Contact us for everything you need..</p>
        </div>
    </section>
    <!-- end Contact -->
<?php

include "src/footer.php";

?>