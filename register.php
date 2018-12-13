<?php
 include "src/header.php"; 

 require_once __DIR__.'/vendor/autoload.php';
    Session::checkLoginforTeacher();
 $reg = new Registration();
$teacherClass = new Teacher();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['teacgerRegistraionData'])){
    $teacher = $reg->teacherRegistration($_POST);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['gardianRegistration'])){
    $gardian = $reg->gardianRegistration($_POST);
}
 ?>


<section class="container">
<div id="menu-features"  class=" row features">
	<div style="min-height: 100px;text-align: center;margin-top: 80px;">
        <?php
            if(isset($teacher)){
                echo $teacher;
            }
            if(isset($gardian)){
                echo "<h3 class='alert-danger'>".$gardian."</h3>";
            }
        ?>
		<button class="alert alert-info" @click="teachersfrom()">Teachers Sign Up</button>
		<button class="alert alert-info" @click="gardiansfrom()">Gardian Signup</button><br>
	</div>
	<div class="col-md-12">
	<div v-if="showteacherForm" class="col-md-6">
		<h3 id="myBlinkingDiv1" class="alert-info text-center">You are sining as a Teacher</h3>
		<form style="padding: 10px;" action="register.php" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="designation">I am </label>
			    <input type="text" name="designation" class="form-control" id="designation" value="tutor" readonly="readonly" required="required">
			  </div>
            <div class="form-group">
                <label for="teacherCode">Teacher Code</label>
                <?php
                    $teacherCode  = $teacherClass->getTutorCode();
                    if(isset($teacherCode)){
                        foreach ($teacherCode as $code){

                        }
                    }
                ?>
                <input type="text" name="teacherCode" class="form-control" id="teacherCode" value="<?php echo $code['teacher_code'] + 1; ?>" readonly="readonly" required="required">
            </div>

			  <div class="form-group">
			    <label for="userName">User Name</label>
			    <input type="text" class="form-control" name="userName" id="userName" placeholder="write user name here" required>
                  <div id="userNameCheck"></div>
			  </div>
			  <div class="form-group">
			    <label for="fullName">Full Name</label>
			    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Write your user name here" required>
			  </div>
			  <div class="form-group">
			    <label for="email">Your Email</label>
			    <input type="email" class="form-control" name="email" id="email" placeholder="Write your email here" required>
			  </div>
			  <div class="form-group">
			    <label for="mobile">Mobile Number</label>
			    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="type your moblie number" required>
			  </div>
			  <div class="form-group">
			    <label for="Password">Password</label>
			    <input type="Password" name="Password" class="form-control" id="Password" placeholder="type password" required>
			  </div>

			  <div class="form-group">
			    <label for="confirmPassword">Confim Password</label>
			    <input type="Password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="type password again" required>
			  </div>

			  <div class="form-group">
			    <label for="department">Your Department/Subject</label>
			    <input type="text" name="department" class="form-control" id="department" placeholder="type your department" required>
			  </div>

			  <div class="form-group">
			    <label for="livingPlace">Living Place</label>
			    <input type="text" name="livingPlace" class="form-control" id="livingPlace" placeholder="type living place here" required>
			  </div>

				<div class="form-gorup">	
				 <label for="membetType">Member Type</label>			  
				  <select  class="form-control custom-select" name="membetType" id="membetType" required>
				    <option selected>Choose...</option>
				    <option value="paid">paid</option>
				    <option value="free">free</option>
				  </select>
				</div>

				<div class="form-gorup">	
				 <label for="university">Unviersity</label>			  
				  <select  class="form-control custom-select" name="university" id="university" required>
				    <option selected>Choose...</option>
                      <?php
                        $university = $reg->getAllUniversityForTeccherRegistration();
                        if($university){
                            foreach ($university as $name){?>
				    <option value="<?php echo $name['versity_name']; ?>"><?php echo $name['versity_name']; ?></option>
                     <?php } } ?>
				  </select>
				</div>

				<div class="form-gorup">	
				 <label for="educationBackground">Education Background (carriculam)</label>			  
				  <select  class="form-control custom-select" name="educationBackground" id="educationBackground" required>
				    <option selected>(eg. bangal, national, british)</option>

                      <?php
                      $educationBackground = $reg->getAllEducationBackgroundForTeccherRegistration();
                      if($educationBackground){
                          foreach ($educationBackground as $name){?>
                              <option value="<?php echo $name['medium']; ?>"><?php echo $name['medium']; ?></option>
                          <?php } } ?>

				  </select>

				</div>
                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>

				<br>
			  <button type="submit" name="teacgerRegistraionData" class="btn btn-primary">submit</button>
		</form>
</div>

	<div v-if="showgardianform" class="col-md-6">

		<h3 id="myBlinkingDiv1" class="alert-info text-center">You are sining as a Gardian</h3>
		<form action="register.php"  method="POST">
			  <div class="form-group">
			    <label for="designation">I am</label>
			    <input type="text" class="form-control" name="designation" id="designation" value="gardian" readonly="readonly">
			  </div>
			  <div class="form-group">
			    <label for="g_userName">User Name:</label>
			    <input type="text" class="form-control" name="g_userName" id="g_userName" placeholder="your User name" required>
			  </div>
			  <div class="form-group">
			    <label for="g_fullName">Full Name</label>
			    <input type="text" class="form-control" name="g_fullName" id="g_fullName" placeholder="Full Name" required>
			  </div>
			  <div class="form-group">
			    <label for="g_email">Email</label>
			    <input type="email" class="form-control" name="g_email" id="g_email" placeholder="Type email here" required>
			  </div>
              <div class="form-group">
                <label for="g_mobile">Mobile</label>
                <input type="text" class="form-control" name="g_mobile" id="g_mobile" placeholder="Type mobile number here" required>
               </div>
			  <div class="form-group">
			    <label for="g_password">Password</label>
			    <input type="password" class="form-control" id="g_password" name="g_password" placeholder="type password here" required>
			  </div>
			  <div class="form-group">
			    <label for="g_confirmPassword">Confirm Password</label>
			    <input type="password" class="form-control" name="g_confirmPassword"  id="g_confirmPassword" placeholder="type password again" required>
			  </div>
			  <button type="submit"  name="gardianRegistration" class="btn btn-primary">Submit</button>
		</form><br>
</div>
</div>
</div>
</section>
 <?php include "src/footer.php"; ?>