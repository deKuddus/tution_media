<?php		
	 require_once __DIR__.'/../vendor/autoload.php';
	 Session::sessioninit();
	 $db  = new Database();
	 $format  = new Format();
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Define Charset -->
    <meta charset="utf-8" />
	<!-- Page Title -->
	<title>provakor tution</title>
	
	<!-- Responsive Metatag --> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.html">
	<!-- Stylesheet
	===================================================================================================  -->
	<link rel="stylesheet" href="resource/css/bootstrap.min.css">
	<link rel="stylesheet" href="resource/css/style.css">
	<link rel="stylesheet" href="resource/css/slider.css">
	<link rel="stylesheet" href="resource/css/media-queries.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="resource/css/scroll.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


    <!-- js -->
    <script src="resource/js/blink.js"></script>


    <!-- js end -->
	</head>	
	<body>
		<div id="root">
	<!-- Header -->

<?php
    if(isset($_GET['action'])){
        Session::sessionDestroy();
    }
?>
            <section class="navbar clearr">
                <div class="container clearr">
                    <div class="row clearr">
                        <div class="navsection clearr">
                            <div class="search clearr">
                            <h2><a href="index.php">TUTION MEDIA</a></h2>
                            </div>
                            <div class="mainmenu">
                                <ul>
                                    <li ><a href="index.php">Home</a></li>
                                    <li ><a href="teachers.php">Teacher</a></li>
                                    <li ><a href="tutions.php">Tutions</a></li>
                                    <?php 
                                        $checkSession = Session::get("teacher_username");
                                        $checkGardianSession = Session::get("gardian_userName");
                                        if($checkSession == "" && $checkGardianSession == ""){ ?>

                                        <li ><a href="register.php">Registration</a></li>
                                        <li><a href="login.php">Login</a></li>

                                     <?php }elseif(Session::get("teacher_designation") == "tutor") { ?>

                                        <li ><a href="teacherprofile.php">Welcome: <strong><?php  echo  Session::get("teacher_username"); ?></strong></a></li>
                                        <li><a href="?action=logout">logout</a></li>

                                        <?php }elseif(Session::get("gardian_designation") == "gardian"){?>

                                            <li ><a href="gardianprofile.php">Welcome: <strong><?php echo  Session::get("gardian_userName"); ?></strong></a></li>
                                            <li><a href="?action=logout">logout</a></li>

                                        <?php } ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
