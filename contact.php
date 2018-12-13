<?php
include "src/header.php";

require_once __DIR__.'/vendor/autoload.php';
Session::checkLoginforTeacher();
$reg = new Registration();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userContact'])){
    $contact = $reg->saveUserMessage($_POST);
}


?>


<section class="container">
    <div id="menu-features"  class=" row features">
        <div style="min-height: 100px;text-align: center;margin-top: 80px;">
            <?php
            if(isset($contact)){
                echo $contact;
            }
            ?>

        </div>
        <div class="col-md-12">
            <div  class="col-md-6">
                <form style="padding: 10px;" action="contact.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="mobile">Your Phone Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="write user name here" required>
                        <div id="userNameCheck"></div>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea  class="form-control" name="message" id="message" placeholder="Write your message here"> </textarea>
                        <div id="userNameCheck"></div>
                    </div>


                    <br>
                    <button type="submit" name="userContact" class="btn btn-primary">Send</button>
                </form>
            </div>

        </div>
    </div>
</section>
<?php include "src/footer.php"; ?>