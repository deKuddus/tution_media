<?php include "src/header.php";

require_once __DIR__.'/vendor/autoload.php';
Session::checkLoginforTeacher();
Session::checkLoginforGardain();

$teacaherClass = new Teacher();
$gardianClass = new Gardian();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['teacherforgotpass'])){
    $teacherForgotpass = $teacaherClass->ForgotPasswordTeacher($_POST);
}
?>


    <section class="container">
        <div id="menu-features"  class=" row features">
            <div style="min-height: 100px;text-align: center;margin-top: 80px;">
                <?php
                if(isset($teacherForgotpass)){
                    echo $teacherForgotpass;
                }

                ?>

            </div>
            <div class="col-md-12">
                <div class="col-md-6">

                    <form style="padding: 10px;" method="post" action="forgotpass.php">
                        <div class="form-group">
                            <label for="userName">User Name:</label>
                            <input type="text"  name="userName" class="form-control" id="userName" placeholder="Write your Old Use Name here">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email"  name="email" class="form-control" id="email" placeholder="write your Old email here">
                        </div>
                        <button type="submit" name="teacherforgotpass" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>
        </div>
    </section>
<?php include "src/footer.php"; ?>