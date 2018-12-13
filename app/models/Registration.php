<?php

require_once __DIR__.'/../../vendor/autoload.php';

class Registration extends Database
{
    //methods for validating and formating start

    public function dateFormat($date){
        return   date('F j, Y ,g:i a', strtotime($date));
    }


    public  function validation($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }


    //methods for validating and formating ends



    ////check user name available or not

    public function getUserName($userName){
        $query = "SELECT * FROM tbl_teacher where user_name = '$userName'";
        $result = $this->select($query);
        if($result){
            echo "<span style = 'color:red;'><b>$userName</b>  not available</span>";
            exit();
        }else{
            echo "<span style = 'color:green;'><b>$userName</b>  available</span>";
            exit();
        }
    }

    public function teacherRegistration($data){


        $designation = $this->validation($data['designation']);
        $userName = $this->validation($data['userName']);
        $fullName = $this->validation($data['fullName']);
        $email = $this->validation($data['email']);
        $mobile = $this->validation($data['mobile']);
        $password = $this->validation($data['Password']);
        $confirmPassword = $this->validation($data['confirmPassword']);
        $department = $this->validation($data['department']);
        $livingPlace = $this->validation($data['livingPlace']);
        $university = $this->validation($data['university']);
        $memberType = $this->validation($data['membetType']);
        $educationBackground = $this->validation($data['educationBackground']);
        $teacherCode = $this->validation($data['teacherCode']);


        $designation = mysqli_real_escape_string($this->link, $designation);
        $userName = mysqli_real_escape_string($this->link, $userName);
        $fullName = mysqli_real_escape_string($this->link, $fullName);
        $email = mysqli_real_escape_string($this->link, $email);
        $mobile = mysqli_real_escape_string($this->link, $mobile);
        $password = mysqli_real_escape_string($this->link, $password);
        $confirmPassword = mysqli_real_escape_string($this->link, $confirmPassword);
        $department = mysqli_real_escape_string($this->link, $department);
        $livingPlace = mysqli_real_escape_string($this->link, $livingPlace);
        $university = mysqli_real_escape_string($this->link, $university);
        $memberType = mysqli_real_escape_string($this->link, $memberType);
        $educationBackground = mysqli_real_escape_string($this->link, $educationBackground);
        $teacherCode = mysqli_real_escape_string($this->link, $teacherCode);

        $permitted = array('jpg' , 'jpeg' , 'png' , 'gif');
        $file_Name = $_FILES['image']['name'];
        $file_Size = $_FILES['image']['size'];
        $file_Temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_Name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0 ,10).'.'.$file_ext;
        $uploaded_image = "admin/teacherimage/".$unique_image;

        $password_encrypt = md5($password);
        $newRegistration = 1;


        if($userName =="" OR $fullName =="" OR $email =="" OR $mobile =="" OR $password =="" OR $department =="" OR $livingPlace =="" OR $memberType =="" OR $university =="" OR $educationBackground =="")
        {
            $message = "<h3 class='alert-danger'>All Input must be given to complete your registration</h3>";
            return$message;
        }
        $checkUserQuery = "SELECT * FROM tbl_teacher WHERE  user_name ='$userName'";
        $result= $this->select($checkUserQuery);
        if($result){
            $message = "<h3 class='alert-danger'>user name already exist</h3>";
            return$message;
        }
        $checkEmail = "SELECT * FROM tbl_teacher WHERE  email = '$email'";
        $result_email = $this->select($checkEmail);
        if($result_email){
            $message = "<h3 class='alert-danger'>email already exit!</h3>";
            return $message;
        }
        elseif($file_Size > 300000){
            $message = "<h3 class='alert-danger'>Image should be less then 300KB .</h3>";
            return $message;
        }
        elseif (in_array($file_ext , $permitted) === false){
            echo "<span class='err'></span>";
            $message = "<h3 class='alert-danger'>you can upload only :-".implode(',' , $permitted)."</h3>";
            return $message;
        }
        elseif($password != $confirmPassword){
            $message = "<h3 class='alert-danger'>Password must be same.</h3>!";
            return $message;
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message = "<h3 class='alert-danger'>Your given Email is Invalid!</h3>";
            return $message;
        }elseif(strlen($password) < 6 ){
            $message = "<h3 class='alert-danger'>Password must be be greater than 6 character</h3>";
            return $message;
        }else{
            $query1 = "INSERT INTO tbl_teacher (designation,user_name,full_name,mobile,email,password,member_type,newRegistration,teacher_code,image)
                        VALUES
                        ('$designation','$userName','$fullName','$mobile','$email','$password_encrypt','$memberType','$newRegistration','$teacherCode','$uploaded_image')";
            $inserted_rows = $this->insert($query1);

            if($inserted_rows){

                $query2 = "SELECT * FROM tbl_teacher WHERE  email = '$email'";
                $selcted_rows = $this->select($query2);
                foreach ($selcted_rows as $data){
                    $user_id = $data['id'];
                }
                $query3 =  "INSERT INTO tbl_department (teacher_id,department,living_place,university,education_background) 
                          VALUES  ('$user_id','$department','$livingPlace','$university','$educationBackground')";
                $inserted_rows1  = $this->insert($query3);
                $query4 = "INSERT INTO tbl_teacher_expectation (teacher_code)VALUES ('$user_id')";
                $inserted_rows3 = $this->insert($query4);
                if($inserted_rows1 && $inserted_rows3){
                    $message = "<h3 class='alert-info'>Registration hasbeen completed!</h3>";
                    return  $message;
                }
            }else{
                $message = "<h3 class='alert-danger'>Some Problem might be happened with your registration!! please try again.</h3>";
                return $message;
            }


        }



    }



    public  function gardianRegistration($data){

        $designation = $this->validation($data['designation']);
        $userName = $this->validation($data['g_userName']);
        $fullName = $this->validation($data['g_fullName']);
        $email = $this->validation($data['g_email']);
        $password = $this->validation($data['g_password']);
        $mobile = $this->validation($data['g_mobile']);
        $confirmPassword = $this->validation($data['g_confirmPassword']);


        $designation = mysqli_real_escape_string($this->link, $designation);
        $userName = mysqli_real_escape_string($this->link, $userName);
        $fullName = mysqli_real_escape_string($this->link, $fullName);
        $email = mysqli_real_escape_string($this->link, $email);
        $password = mysqli_real_escape_string($this->link, $password);
        $mobile = mysqli_real_escape_string($this->link, $mobile);
        $confirmPassword = mysqli_real_escape_string($this->link, $confirmPassword);

        if($userName == "" OR $fullName == "" OR $email == "" OR $password == "" OR $confirmPassword =="" OR $mobile==""){
            $message = "Input field should not be empty";
            return $message;
        }

        $checkUserQuery = "SELECT * FROM tbl_gardian WHERE  user_name ='$userName'";
        $result= $this->select($checkUserQuery);
        if($result){
            $message = "user name already exist!";
            return$message;
        }
        $checkEmail = "SELECT * FROM tbl_gardian WHERE  email = '$email'";
        $result_email = $this->select($checkEmail);
        if($result_email){
            $message = "email already exit!";
            return $message;
        }elseif($password != $confirmPassword){
            $message = "Password must be same";
            return $message;
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message = "Your given Email is Invalid";
            return $message;
        }elseif(strlen($password) < 6 ){
            $message = "Password must be be greater than 6 character";
            return $message;
        }else{
            $password = md5($password);
            $query = "INSERT INTO tbl_gardian (designation,user_name,full_name,email,mobile,password)VALUES ('$designation','$userName','$fullName','$email','$mobile','$password')";
            $insetted_rows = $this->insert($query);
            if($insetted_rows){
                $message = "Registration has been completed";
                return $message;
            }else{
                $message = "Registration failed, Please try again";
                return $message;
            }
        }
    }

    public function getNewTeacherRegistraion(){
        $query = "SELECT * FROM tbl_teacher WHERE newregistration = 1";
        $result =$this->select($query);
        if($result){
            $total = mysqli_num_rows($result);
            return $total;
        }
    }

    public function getAllNewTeacherRegistration(){
        $query = "SELECT * FROM tbl_teacher WHERE newRegistration = 1";
        $result = $this->select($query);
        return $result;
    }
    //////////////////////////////////////////////////////////////////
    public  function getAllUniversityForTeccherRegistration(){
        $query = "SELECT * FROM tbl_university_for_teacher ORDER BY id";
        $result = $this->select($query);
        return $result;
    }

    ////////////////////////////////////////
    public  function getAllEducationBackgroundForTeccherRegistration(){
        $query = "SELECT * FROM tbl_medium ORDER BY id";
        $result = $this->select($query);
        return $result;
    }

    public function saveUserMessage($data){
        $mobile = $this->validation($data['mobile']);
        $message = $this->validation($data['message']);

        $mobile = mysqli_real_escape_string($this->link, $mobile);
        $messages = mysqli_real_escape_string($this->link, $message);

        if($mobile == "" OR $message = ""){
            $message = "<h3 class='alert-danger'>You have must Filled all Input field to send message</h3>";
            return $message;
        }else{
            $query = "INSERT INTO tbl_contact (mobile,message)VALUES('$mobile','$messages')";
            $insertedRow = $this->insert($query);
            if($insertedRow){
                $message = "<h3 class='alert-success'>Message Successfully Send.We will Contact you soon via phone Call</h3>";
                return $message;
            }else{
                $message = "<h3 class='alert-danger'>Message not send!! Try again</h3>";
                return $message;
            }
        }
    }


    public function  getAllUserMessage() {
        $query = "SELECT * FROM tbl_contact ORDER BY id DESC ";
        $result = $this->select($query);
        return $result;
    }

    public function deleteMessageByID($id){
        $query = "DELETE FROM tbl_contact WHERE id = $id";
        $deletedRow = $this->delete($query);
        if($deletedRow){
            $message = "<h3 class='alert-success'>Message Deleted</h3>";
            return $message;
        }else{
            $message = "<h3 class='alert-danger'>Message not Deleted</h3>";
            return $message;
        }
    }

    public function countNewMessage(){
        $query = "SELECT * FROM tbl_contact WHERE  status = 0 ORDER BY id DESC ";
        $result = $this->select($query);
        $total = mysqli_num_rows($result);
        return $total;
    }

    public function getNewMessage(){
        $query = "SELECT * FROM tbl_contact WHERE  status = 0  ORDER BY id DESC ";
        $result = $this->select($query);
        return $result;
    }

    public function getMessageById($id){
        $query1 = "UPDATE tbl_contact SET status = 1 WHERE id = '$id'";
        $updateStatus = $this->update($query1);
        if($updateStatus){
            $query = "SELECT * FROM tbl_contact WHERE  id = '$id' ";
            $result = $this->select($query);
            return $result;
        }
    }
}