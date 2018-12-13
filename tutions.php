<?php

include "src/header.php";
include "src/slider.php";
require_once __DIR__.'/vendor/autoload.php';
$tution = new Tution();
?>



    <!-- Features -->
    <section id="menu-features" class="features container" xmlns="http://www.w3.org/1999/html"
             xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

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

        <!-- search part end -->
        <div class="container">
            <h1>All active tution</h1>
            <?php
                $getAllActiveTutions = $tution->getAllActiveTutions();
                if($getAllActiveTutions){
                    foreach ($getAllActiveTutions as $tutions){
            ?>
            <div class="row column-section">
                <hr>
                <div class="col-md-12">
                    <div class="item-section">
                        <h4 style="font-size:30px" class="text-center"><strong> <?php echo $tutions['teacher_university']; ?> </strong> <?php echo $tutions['teacher_gender']; ?> teacher wanted <strong>Dhaka</strong></h4><br>
                        <div class="col-sm-8">
                            <div class="col-sm-2">
                                    <img src="resource/img/client1.jpg" height="50px" width="50px">
                            </div>
                            <div class="col-sm-6">
                                <p><span style="font-size: 25px; font-weight: bold;color:green"> Class : </span> <?php echo $tutions['tution_class']; ?> </>
                                <p><span style="font-size: 25px; font-weight: bold;color:green"> Group : </span><?php echo $tutions['tution_group']; ?></p>
                                <p><span style="font-size: 25px; font-weight: bold;color:green">Medium : </span> <?php echo $tutions['tution_medium']; ?></p>
                                <p><span style="font-size: 25px; font-weight: bold;color:green">Subject : </span> <?php echo $tutions['tution_subject']; ?></p>
                                <p><span style="font-size: 25px; font-weight: bold;color:green">Salary : </span> <?php echo $tutions['tution_salary']; ?></p>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <span><i class="fas fa-map-marker-alt"></i> location: <?php echo $tutions['tution_location']; ?> </span>
                            </div>
                            <div class="clearfix"></div><br>
                            <div>
                                <ul  class="list-inline">
                                    <li style="font-size: 12px; background-color: gray"> <?php echo $tutions['days_in_week']; ?> days in a week</li>
                                    <li style="font-size: 12px; background-color: orange"> Time:
                                    <?php
                                        if($tutions['tution_time'] == ""){
                                            echo "N/A";
                                        }else{
                                            echo $tutions['tution_time'];
                                        }
                                    ?>
                                    </li><br>
                                    <li style="font-size: 12px; background-color: yellow"> Durations: <?php echo $tutions['tution_duration']; ?></li>
                                    <li style="font-size: 12px; background-color: green"> Media fee: <?php echo $tutions['tution_media_fee']; ?></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
                <button class="btn btn-info"><a href="tutionapply.php?tutionId=<?php echo $tutions['tutions_id']; ?>">Apply</a></button>

            </div>
         <?php } } ?>

        </div>


    </section>
    <!-- end Features -->

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