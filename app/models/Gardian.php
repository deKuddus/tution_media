<?php
/**
 * Created by PhpStorm.
 * User: kuddus
 * Date: 11/14/18
 * Time: 10:51 PM
 */

require_once __DIR__.'/../../vendor/autoload.php';

class Gardian extends Database
{
    public function dateFormat($date)
    {
        return   date('F j, Y ,g:i a', strtotime($date));
    }


    public  function validation($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }


    public  function  getAllActivegardian(){
        $query = "SELECT * FROM tbl_gardian where status = 1  ORDER BY id ";
        $result = $this->select($query);
        return $result;
    }

    public  function getAllDectivegardian(){
        $query = "SELECT * FROM tbl_gardian where status = 0  ORDER BY id ";
        $result = $this->select($query);
        return $result;
    }

    public  function deleteGardianByID($id){
        $query  = "DELETE FROM tbl_gardian WHERE id = '$id'";
        $result = $this->delete($query);
        if($result){
            $message = "<h3 class='alert-success text-center'> Gardian Deleted Successfully.</h3>";
            return $message;
        }else{

            $message = "<h3 class='alert-danger text-center'> Gardian Not Deleted Successfully.Try Again.</h3>";
            return $message;

        }
    }

    public  function  activeGardianById($id){
        $query = "UPDATE tbl_gardian SET status = 1 WHERE id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: gardianshowactive.php");
        }else{
            header("Location: gardianshowactive.php");
        }
    }

    public  function  deactiveGardianById($id){
        $query = "UPDATE tbl_gardian SET status = 0 WHERE id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: gardianshowdective.php");
        }else{
            header("Location: gardianshowdective.php");
        }
    }

    public function  allActiveGardian(){
        $query = "SELECT * FROM tbl_gardian WHERE status = 1 ORDER BY id  ";
        $result = $this->select($query);
        $total = mysqli_num_rows($result);
        return $total;
    }

    public  function gardianLogin($data){
        $userName = $this->validation($data['g_userName']);
        $email = $this->validation($data['g_email']);
        $password = $this->validation($data['g_password']);

        $userName = mysqli_real_escape_string($this->link, $userName);
        $email = mysqli_real_escape_string($this->link, $email);
        $password = mysqli_real_escape_string($this->link,$password);
        $password = md5($password);

        if($userName == "" OR $email =="" OR $password ==""){
            $message = "<h3 class='alert-danger text-center'> Fill Up All input Field To login .</h3>";
            return $message;
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message = "<h3 class='alert-danger'>Your given Email is Invalid!</h3>";
            return $message;
        }else{
            $query = "SELECT * FROM  tbl_gardian WHERE user_name = '$userName' AND email = '$email' AND password = '$password' AND status = 1";
            $selectedRows = $this->select($query);
            if($selectedRows){
                $value = mysqli_fetch_array($selectedRows);
                $row = mysqli_num_rows($selectedRows);
                if($row){

                    Session::set("gardianlogin", true);
                    Session::set("gardian_userName", $value['user_name']);
                    Session::set("gardian_id", $value['id']);
                    Session::set("gardian_email", $value['email']);
                    Session::set("gardian_designation", $value['designation']);
                    header("Location: index.php");
                }else{
                    $message = "<h3 class='alert-danger'>Data Not found.Can't login!</h3>";
                    return $message;
                }
            }else{
                $message = "<h3 class='alert-danger'>User Name Or Email Or Password does not match OR Maybe Your Account Deactivated</h3>";
                return $message;
            }
        }
    }

    public  function getGardianProfile($id,$userName,$email){
        $query = "SELECT * FROM tbl_gardian WHERE  user_name = '$userName' AND email = '$email' AND id = '$id'";
        $result = $this->select($query);
        return $result;
    }

    public  function updateGardianDetaisl($id,$email){
        $query = "SELECT * FROM tbl_gardian  WHERE  id = '$id' AND email = '$email'";
        $result = $this->select($query);
        return $result;
    }

    public  function updateGardianProfile($data){
        $designation = $this->validation($data['designation']);
        $userName = $this->validation($data['g_userName']);
        $fullName = $this->validation($data['g_fullName']);
        $email = $this->validation($data['g_email']);
        $mobile = $this->validation($data['g_mobile']);
        $id = $this->validation($data['gardianId']);

        $designation = mysqli_real_escape_string($this->link, $designation);
        $userName = mysqli_real_escape_string($this->link, $userName);
        $fullName = mysqli_real_escape_string($this->link, $fullName);
        $email = mysqli_real_escape_string($this->link, $email);
        $password = mysqli_real_escape_string($this->link, $password);
        $mobile = mysqli_real_escape_string($this->link, $mobile);
        $id = mysqli_real_escape_string($this->link, $id);

        if($userName == "" OR $fullName == "" OR $email == "" OR $mobile == ""){
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
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message = "Your given Email is Invalid";
            return $message;
        }else{
            $query = "UPDATE  tbl_gardian SET 
                        designation = '$designation',
                        user_name = '$userName',
                        full_name = '$fullName',
                        email = '$email',
                        mobile = '$mobile' WHERE id = '$id'";
            $updatedRows  = $this->update($query);
            if($updatedRows){
                $message = "<h3 class='alert-success'>Your Profile Data hasbeen Updated</h3>";
                return $message;
            }else{
                $message = "<h3 class='alert-danger'>Your Profile Data hasbeen Updated</h3>";
                return $message;
            }
        }
    }

    public function saveTutorRequest($tutorCode, $gardianId){
        $tutorId = $this->validation($tutorCode);
        $gardianId = $this->validation($gardianId);

        $query = "SELECT * FROM tbl_teacher WHERE  teacher_code = '$tutorCode'";
        $data = $this->select($query);
        foreach ($data as $name){
            $userName = $name['user_name'];
        }

        $query2 = "INSERT INTO  tbl_teacher_request (teacher_code,teacher_user_name,gardian_id)VALUES('$tutorCode','$userName','$gardianId')";
        $insertedRows = $this->insert($query2);
        if($insertedRows){
            echo "<script>window.location = 'gardianprofile.php';</script>>";
        }else{
            echo "<script>window.location = 'index.php';</script>>";

        }
    }

    public  function getTutorRequest($id){
        $query = "SELECT * FROM tbl_teacher_request WHERE gardian_id = '$id'";
        $result = $this->select($query);
        return $result;
    }
}