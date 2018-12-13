<?php include "src/header.php";

    require_once __DIR__.'/vendor/autoload.php';

    $tutionClass = new Tution();

    Session::checkteacherSession();
    $session = Session::get("teacherlogin");

    if($session == true && isset($_GET['tutionId'])){
            $tutionId = $_GET['tutionId'];
            $teacherId = Session::get("user_id");
            $tutionApply = $tutionClass->saveTutionRequest($tutionId, $teacherId);

    }
?>


    <section class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </section>
<?php include "src/footer.php"; ?>