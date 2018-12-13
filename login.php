<?php include "src/header.php";

require_once __DIR__.'/vendor/autoload.php';
Session::checkLoginforTeacher();
Session::checkLoginforGardain();

$teacaherClass = new Teacher();
$gardianClass = new Gardian();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['teacherLogin'])){
    $teacherLogin = $teacaherClass->loginTeacher($_POST);
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['gardianLogin'])){
    $gardianLogin = $gardianClass->gardianLogin($_POST);
}
?>


<section class="container">
<div id="menu-features"  class=" row features">
	<div style="min-height: 100px;text-align: center;margin-top: 80px;">
        <?php
        if(isset($teacherLogin)){
            echo $teacherLogin;
        }
        if(isset($gardianLogin)){
            echo $gardianLogin;
        }
        ?>
		<button class="alert alert-info" @click="teacherlogin()">Teachers Login</button>
		<button class="alert alert-info" @click="gardianlogin()">Gardian Login</button><br>
	</div>
	<div class="col-md-12">
	<div v-if="teacher_login" class="col-md-6">

		<h3 id="blinkforteacherloging" class="alert-info text-center">You are Loging as a Teacher</h3>

		<form style="padding: 10px;" method="post" action="login.php">
			  <div class="form-group">
			    <label for="userName">User Name:</label>
			    <input type="text"  name="userName" class="form-control" id="userName" placeholder="Write your Use Name here">
			  </div>
			  <div class="form-group">
			    <label for="email">Email:</label>
			    <input type="email"  name="email" class="form-control" id="email" placeholder="write your email here">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" name="password" class="form-control" id="password" placeholder="type your password here">
			  </div>
		
			  <button type="submit" name="teacherLogin" class="btn btn-primary">Login</button>
                <a href="forgotpass.php">I forgot my password</a><br>
		</form>
</div>

	<div v-if="gardian_login" class="col-md-6">

		<h3 id="blinkforgardloging" class="alert-info text-center">You are Loging as a guradian</h3>
		<form action="login.php" method="post">
			  <div class="form-group">
			    <label for="g_userName">User Name:</label>
			    <input type="text"  name="g_userName" class="form-control" id="g_userName" placeholder="Write your User Name Here.">
			  </div>
			  <div class="form-group">
			    <label for="g_email">Email:</label>
			    <input type="email"  name="g_email" class="form-control" id="g_email" placeholder="write your email here">
			  </div>
			  <div class="form-group">
			    <label for="g_password">Password</label>
			    <input type="password" name="g_password" class="form-control" id="g_password" placeholder="type your password here">
			  </div>
			  <button type="submit" name="gardianLogin" class="btn btn-primary">Login</button>
		</form><br>
</div>
</div>
</div>
</section>
 <?php include "src/footer.php"; ?>