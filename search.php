<?php

include "src/header.php";
include "src/slider.php";
require_once __DIR__.'/vendor/autoload.php';

$tut = new Tution();
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
                <form action="search.php" method="post">
		<span class="col-md-4 provide-left provide-one">

				<div class="form-gorup">

				  <select class="form-control custom-select" id="inputGroupSelect01" name="class">
				    <option selected>Class...</option>
				    <option value="class1">Class one</option>
				    <option value="class2"> Class Two</option>
				    <option value="class3">Class Three</option>
				    <option value="class4">Class  Four</option>
				    <option value="class5">Class Five</option>
				    <option value="class6">Class Six</option>
				    <option value="class7">Class Seven</option>
				    <option value="class8">Class Eight</option>
				    <option value="class8">Class Nine</option>
				    <option value="class10">Class Ten</option>
				    <option value="class11">Class Eleven</option>
				    <option value="class12">Class Twelve</option>
				    <option value="honours">Honours</option>
				  </select>
				</div>

		</span>
                    <span class="col-md-4 provide-left provide-two">
				<div class="form-gorup">

				  <select class="form-control custom-select" id="inputGroupSelect01" name="city">
				    <option selected>City...</option>
				    <option value="dhaka">Dhaka</option>
				    <option value="chittagong">Chittagong</option>
				  </select>
				</div>
		</span>
                    <span class="col-md-4 provide-left provide-tre">
				<div class="form-gorup">

				  <select class="form-control custom-select" id="inputGroupSelect01" name="gender">
				    <option selected>Gender...</option>
				    <option value="male">Male</option>
				    <option value="female">Female</option>
				  </select>
				</div>
		</span><br>
                    <div class="clearfix"></div>
                    <div class="text-center" style="margin-top: 10px">
                        <button type="submit" name="searchtution" class="btn btn-primary">Appy filter to find your tution</button>
                    </div>
                </form>
            </div>
        </section>
        <div class="clearfix"></div><br>

        <!-- search part end -->
        <div class="container">
            <h1>All active tution</h1>
            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['searchtution'])){
                    $getTutuionBysearch = $tut->getAllTutionBySearch($_POST);
                if($getTutuionBysearch){
                    foreach ($getTutuionBysearch as $singleTution){
                    ?>
                    <div class="row column-section">
                        <hr>
                        <div class="col-md-12">
                            <div class="item-section">
                                <h4 style="font-size:30px" class="text-center"><strong> <?php echo $singleTution['teacher_university']; ?> </strong> <?php echo $singleTution['teacher_gender']; ?> teacher wanted <strong>Dhaka</strong></h4><br>
                                <div class="col-sm-8">
                                    <div class="col-sm-2">
                                        <img src="resource/img/client1.jpg" height="50px" width="50px">
                                    </div>
                                    <div class="col-sm-6">
                                        <p><span style="font-size: 25px; font-weight: bold;color:green"> Class : </span> <?php echo $singleTution['tution_class']; ?> </>
                                        <p><span style="font-size: 25px; font-weight: bold;color:green"> Group : </span><?php echo $singleTution['tution_group']; ?></p>
                                        <p><span style="font-size: 25px; font-weight: bold;color:green">Medium : </span> <?php echo $singleTution['tution_medium']; ?></p>
                                        <p><span style="font-size: 25px; font-weight: bold;color:green">Subject : </span> <?php echo $singleTution['tution_subject']; ?></p>
                                        <p><span style="font-size: 25px; font-weight: bold;color:green">Salary : </span> <?php echo $singleTution['tution_salary']; ?></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <span><i class="fas fa-map-marker-alt"></i> location: <?php echo $singleTution['tution_location']; ?> </span>
                                    </div>
                                    <div class="clearfix"></div><br>
                                    <div>
                                        <ul  class="list-inline">
                                            <li style="font-size: 12px; background-color: gray"> <?php echo $singleTution['days_in_week']; ?> days in a week</li>
                                            <li style="font-size: 12px; background-color: orange"> Time:
                                                <?php
                                                if($singleTution['tution_time'] == ""){
                                                    echo "N/A";
                                                }else{
                                                    echo $singleTution['tution_time'];
                                                }
                                                ?>
                                            </li><br>
                                            <li style="font-size: 12px; background-color: yellow"> Durations: <?php echo $singleTution['tution_duration']; ?></li>
                                            <li style="font-size: 12px; background-color: green"> Media fee: <?php echo $singleTution['tution_media_fee']; ?></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <button class="btn btn-info"><a href="tutionapply.php?tutionId=<?php echo $singleTution['tutions_id']; ?>">Apply</a></button>
                    </div>
                <?php } } } ?>

        </div>


    </section>
    <!-- end Features -->





    <!-- Contact-->
    <section class="container">
        <div  class="row contact generic ">
            <div class="col-md-4">
                <div class="text-center styleforbottom"><u>5000+</u><br>Teachers</div>
            </div>
            <div class="col-md-4">
                <div class="text-center styleforbottom"><u>1000+</u><br>Tutions </div>
            </div>
            <div class="col-md-4">
                <div class="text-center styleforbottom">
                    <u>4000+</u><br>Success
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="container">
        <div  class="row contact generic ">
            <div class="col-md-6">
                <div class="info">
                    <ul>
                        <?php
                        $tutionRules  = $tut->getAllTutionRules();
                        if($tutionRules){
                            foreach ($tutionRules as $rules){
                                ?>
                                <li><?php echo $rules['rules']; ?></li>

                            <?php } } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <img src="resource/img/hello.png" class="img-thumbnail" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end Contact -->
<?php

include "src/footer.php";

?>