<?php include "src/header.php";

require_once __DIR__.'/vendor/autoload.php';

$gardianClass = new Gardian();

Session::checkGardianSession();
$session = Session::get("gardianlogin");

if($session == true && isset($_GET['tutorCode'])){
    $tutorCode = $_GET['tutorCode'];
    $gardianId = Session::get("gardian_id");
    $tutorApply = $gardianClass->saveTutorRequest($tutorCode, $gardianId);
}

?>

<?php include "src/footer.php"; ?>