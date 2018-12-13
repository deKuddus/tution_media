<?php
require_once __DIR__.'/../vendor/autoload.php';
$tut = new Tution();
?>
<!-- Footer -->
	<section class="footer container">
	    <div class="footer-section container">
	       <div class="item-footer col-sm-6 col-xs-12 col-md-3">
	            <a class="navbar-logobrand" href="index.php">Provakor Tution</a>
	       </div>
	       <div class="item-footer col-sm-6 col-xs-12 col-md-3">
	            <h4 class="footer-title">Top Links</h4>
	            <ul class="gold links-footer">
	            	<li><a href="index.php">Home</a></li>
	            	<li><a href="teachers.php">Teachers</a></li>
	            	<li><a href="tutions.php">Tutions</a></li>
	            	<li><a href="contact.php">Contact Us</a></li>
                    <?php
                    $checkSession = Session::get("teacher_username");
                    $checkGardianSession = Session::get("gardian_userName");
                    if($checkSession == "" OR $checkGardianSession == ""){ ?>
	            	<li><a href="register.php">Register</a></li>
	            	<li><a href="login.php"> Login</a></li>
                    <?php }?>
	            </ul>
	       </div>
	       <div class="item-footer col-sm-6 col-xs-12 col-md-3">
               <h4 class="footer-title">Social Links</h4>
               <ul class="gold links-footer list-inline">
                   <li><a href="https://www.facebook.com"><img src="resource/img/fac.png" height="50px" width="50px" alt=""></a></li>
                   <li><a href="https://www.twitter.com"><img src="resource/img/twt.png" height="50px" width="50px" alt=""></a></li>
                   <li><a href="https://www.linkedin.com"><img src="resource/img/link.png" height="50px" width="50px" alt=""></a></li>
                   <li><a href="https://www.instagram.com"><img src="resource/img/ins.png" height="50px" width="50px" alt=""></a></li>
	            </ul>
	       </div>
	   </div>
    </section>
    <section class="footer-bottom container">
    	<p class="text-center copyright-text">&copy; Provakor - All Rights Reserved</p>
    </section>
<script src="resource/js/scrolltotop.js"></script>
<div id="stop" class="scrollTop">
    <span><a href="">Top</a></span>
</div>
    <!--end Modal 6 img -->
    <!-- ======================= JQuery libs =========================== -->

        <!-- vue -->

        <!--  -->
       
        <!-- Bootstrap -->
        <script src="resource/js/bootstrap.min.js"></script>      
        <script src="resource/js/nav/jquery.scrollTo.js"></script> 
        <script src="resource/js/nav/jquery.nav.js"></script>
        <script src="resource/js/jquery-scrolltofixed.js"></script> 
        <script src="resource/js/jquery.fittext.js"></script>
    	<script src="resource/js/modernizr.js" type="text/javascript"></script>
    	<!-- Custom -->
        <script src="resource/js/script.js"></script>
        <script src="resource/js/jquery.countdown.js"></script>
        <script type="text/javascript">
       		$("#fittext3,#fittext2").fitText(.95, { minFontSize: '35px', maxFontSize: '95px' });
        </script>
       </div> 
       	    <script type="text/javascript" src="resource/js/vue.js"></script> 
		<script type="text/javascript" src="resource/js/app.js"></script> 
    </body>    
</html>