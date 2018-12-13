<?php include "src/header.php";

require_once __DIR__.'/vendor/autoload.php';
Session::checkLoginforTeacher();
Session::checkLoginforGardain();

$teacaherClass = new Teacher();
$gardianClass = new Gardian();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['teacherpassreset'])){
    $resetTeacherPass  = $teacaherClass->resetPasswordForTeacher($_POST);
}
?>


    <section class="container">
        <div id="menu-features"  class=" row features">
            <div style="min-height: 100px;text-align: center;margin-top: 80px;">
                <?php
                if(isset($resetTeacherPass)){
                    echo $resetTeacherPass;
                }

                ?>

            </div>
            <div class="col-md-12">
                <div class="col-md-6">

                    <form style="padding: 10px;" method="post" action="passwordreset.php">

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email"  name="email" class="form-control" id="email" placeholder="write your Old email here">
                        </div>
                        <div class="form-group">
                            <label for="password">User Name:</label>
                            <input type="password"  name="password" class="form-control" id="password" placeholder="Write new password here">
                        </div>
                        <div class="form-group">
                            <label for="confirmpass">User Name:</label>
                            <input type="password"  name="confirmpass" class="form-control" id="confirmpass" placeholder="Retype Password">
                        </div>
                        <button type="submit" name="teacherpassreset" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>
        </div>
    </section>
<?php include "src/footer.php"; ?>