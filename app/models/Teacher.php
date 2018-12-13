<?php
require_once __DIR__.'/../../vendor/autoload.php';

class Teacher extends Database
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

    public  function getAllActiveTeacher(){
        $query = "SELECT * FROM tbl_teacher where status = 1 ORDER BY id ";
        $result = $this->select($query);
        return $result;
    }

    public function getAllDectiveTeacher(){
        $query = "SELECT * FROM tbl_teacher where status = 0 ORDER BY id ";
        $result = $this->select($query);
        return $result;
    }


    public  function getAllFreeTeacher(){
        $query = "SELECT * FROM tbl_teacher where status = 1 AND member_type = 'free' ORDER BY id ";
        $result = $this->select($query);
        return $result;
    }


    public  function getAllPaidTeacher(){
        $query = "SELECT * FROM tbl_teacher where status = 1 AND member_type = 'paid' ORDER BY id ";
        $result = $this->select($query);
        return $result;
    }

    public  function  deleteTeacherByID($id){
        $query = "DELETE FROM tbl_teacher WHERE id = '$id'";
        $deletedRows1 = $this->delete($query);

        $query = "DELETE FROM tbl_department WHERE teacher_id = '$id'";
        $deletedRows2 = $this->delete($query);

        if($deletedRows1 && $deletedRows2){
            $message = "<h3 class='alert-success text-center'> Teachers Data Deleted Successfully .</h3>";
            return $message;
        }else{
            $message = "<h3 class='alert-danger text-center'> Teachers Data Not  Deleted Successfully .</h3>";
            return $message;
        }
    }
//////////////////////////////////////////////////////////
    public  function statusActiveById($id){
        $query = "UPDATE tbl_teacher SET status = 1 where id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teacherpaid.php");
        }else{
            header("Location: teacherpaid.php");
        }
    }

    public  function statusDectiveById($id){
        $query = "UPDATE tbl_teacher SET status = 0 where  id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teacherpaid.php");
        }else{
            header("Location: teacherpaid.php");
        }
    }
//////////////////////////////////////////////////


////////////////////////////////////////////////////////////
    public  function statusActiveByIdFromActivePage($id){
        $query = "UPDATE tbl_teacher SET status = 1 where id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teacherpaid.php");
        }else{
            header("Location: teacherpaid.php");
        }
    }

    public  function statusDectiveByIdFromActivePage($id){
        $query = "UPDATE tbl_teacher SET status = 0 where  id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teachershowactive.php");
        }else{
            header("Location: teachershowactive.php");
        }
    }
//////////////////////////////////////////////////


////////////////////////////////////////////////////////////

    public  function statusActiveByIdFromDectivePage($id){
        $query = "UPDATE tbl_teacher SET status = 1 where id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teacherpaid.php");
        }else{
            header("Location: teacherpaid.php");
        }
    }

    public  function statusDectiveByIdFromDectivePage($id){
        $query = "UPDATE tbl_teacher SET status = 0 where  id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teachershowactive.php");
        }else{
            header("Location: teachershowactive.php");
        }
    }
    //////////////////////////////////////////////////


////////////////////////////////////////////////////////////
    public  function statusActiveByIdFromFreePage($id){
        $query = "UPDATE tbl_teacher SET status = 1 where id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teacherpaid.php");
        }else{
            header("Location: teacherpaid.php");
        }
    }

    public  function statusDectiveByIdFromFreePage($id){
        $query = "UPDATE tbl_teacher SET status = 0 where  id = '$id'";
        $result = $this->update($query);
        if($result){
            header("Location: teachershowactive.php");
        }else{
            header("Location: teachershowactive.php");
        }
    }

    /////////////////////////////////////
    public function SeeNewteacherById($id){
        $updatequery = "UPDATE tbl_teacher SET newRegistration = 0 WHERE  id = '$id'";
        $updaterow = $this->update($updatequery);
        $query  = "SELECT tbl_department.*, tbl_teacher.* from tbl_department inner join tbl_teacher on tbl_department.teacher_id = tbl_teacher.id where  tbl_teacher.id = '$id' ";
        $result = $this->select($query);
        return $result;
    }

    //////////////////////////////////
    public  function getTutorCode(){
        $query = "SELECT * FROM tbl_teacher ORDER BY id DESC  LIMIT 1 ";
        $result = $this->select($query);
        return $result;
    }


    public  function  loginTeacher($data){
        $userName = $this->validation($data['userName']);
        $password = $this->validation($data['password']);
        $email = $this->validation($data['email']);

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
            $query = "SELECT * FROM tbl_teacher WHERE user_name = '$userName' AND email = '$email' AND password = '$password' AND status = 1";
            $selectedRows = $this->select($query);
            if($selectedRows){
                $value = mysqli_fetch_array($selectedRows);
                $row = mysqli_num_rows($selectedRows);
                if($row){

                    Session::set("teacherlogin", true);
                    Session::set("teacher_username", $value['user_name']);
                    Session::set("user_id", $value['id']);
                    Session::set("user_email", $value['email']);
                    Session::set("teacher_designation", $value['designation']);
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
    public  function  getTeacherProfile($id,$userName,$email){
        $query  = "SELECT tbl_department.*, tbl_teacher.* from tbl_department inner join tbl_teacher on tbl_department.teacher_id =                  tbl_teacher.id where  tbl_teacher.id = '$id' AND tbl_teacher.user_name = '$userName' AND tbl_teacher.email = '$email' ";
        $result = $this->select($query);
        return $result;
    }

    public  function getAllActiveTeachersforDashboard(){
        $query = "SELECT * FROM tbl_teacher WHERE status = 1 ORDER BY id ";
        $data = $this->select($query);
        $total = mysqli_num_rows($data);
        return $total;
    }

    public function getTeacherDetaisls($id){
        $query  = "SELECT tbl_department.*, tbl_teacher.* from tbl_department inner join tbl_teacher on tbl_department.teacher_id =                  tbl_teacher.id where  tbl_teacher.id = '$id' ";
        $result = $this->select($query);
        return $result;
    }

    public  function  getTeacherDetailsfromDepartmentTable($id){
        $query = "SELECT * FROM tbl_department WHERE  teacher_id = '$id'";
        $result = $this->select($query);
        return $result;
    }

    public  function getTeacherAllExpectation($id){
        $query = "SELECT * FROM tbl_teacher_expectation WHERE teacher_id = '$id'";
        $result = $this->select($query);
        return $result;
    }

    public  function  updateTeacherExpectation($data){
        $expectedCity = $this->validation($data['expectedCity']) ;
        $expectedArea = $this->validation($data['expectedArea']);
        $expectedClass = $this->validation($data['expectedClass']);
        $expectedSuject = $this->validation($data['expectedSuject']);
        $expectedSalary = $this->validation($data['expectedSalary']);
        $expectedTime = $this->validation($data['expectedTime']);
        $expectedDays = $this->validation($data['expectedDays']);
        $teacherId = $this->validation($data['teacherId']);

        $expectedCity = mysqli_real_escape_string($this->link, $expectedCity);
        $expectedArea = mysqli_real_escape_string($this->link, $expectedArea);
        $expectedClass = mysqli_real_escape_string($this->link, $expectedClass);
        $expectedSuject = mysqli_real_escape_string($this->link, $expectedSuject);
        $expectedSalary = mysqli_real_escape_string($this->link, $expectedSalary);
        $expectedTime = mysqli_real_escape_string($this->link, $expectedTime);
        $expectedDays = mysqli_real_escape_string($this->link, $expectedDays);
        $teacherId = mysqli_real_escape_string($this->link, $teacherId);

        $query = "UPDATE tbl_teacher_expectation SET 
                  expected_city = '$expectedCity',
                  expected_area = '$expectedArea',
                  expected_class = '$expectedClass',
                  expected_subject = '$expectedSuject',
                  expected_salary = '$expectedSalary',
                  expected_time = '$expectedTime',
                  expected_day_inweek = '$expectedDays'
                  WHERE id = '$teacherId'";

        $updatedRows = $this->update($query);
        if($updatedRows){
            $message = "<h3 class='alert-danger'>yes.</h3>";
            return $message;
            /*header("Location: teacherprofile.php");*/
        }else{
            $message = "<h3 class='alert-danger'>No.</h3>";
            return $message;
            /*header("Location: index.php");*/
        }

    }

    public  function getAllActiveTeacheForUser(){
        $query  = "SELECT tbl_department.*, tbl_teacher.*,tbl_teacher_expectation.*  from tbl_department inner join tbl_teacher on tbl_department.teacher_id = tbl_teacher.id inner join tbl_teacher_expectation  on tbl_teacher_expectation.teacher_id = tbl_teacher.id  where  tbl_teacher.status = 1 ";
        $result = $this->select($query);
        return $result;
    }

    public  function getAllActiveTeachersForUser(){
        $query  = "SELECT tbl_department.*, tbl_teacher.*,tbl_teacher_expectation.*  from tbl_department inner join tbl_teacher on tbl_department.teacher_id = tbl_teacher.id inner join tbl_teacher_expectation  on tbl_teacher_expectation.teacher_id = tbl_teacher.id  where  tbl_teacher.status = 1 ORDER BY tbl_teacher.id Limit 10";
        $result = $this->select($query);
        return $result;
    }

    public  function getTutorCodeByID($id){
        $query = "SELECT * FROM tbl_teacher WHERE id = '$id'";
        $result = $this->select($query);
        return $result;
    }

    public  function ForgotPasswordTeacher($data){
        $username = $this->validation($data['userName']);
        $email = $this->validation($data['email']);

        $username = mysqli_real_escape_string($this->link, $username);
        $email  = mysqli_real_escape_string($this->link, $email);

        if($username == "" OR $email == ""){
            $message = "<h3 class='alert-danger'>Input must be given to reset pass</h3>";
            return $message;
        }else{
            $query = "SELECT * FROM tbl_teacher WHERE  user_name = '$username' AND email = '$email'";
            $selectedRow = $this->select($query);
            if($selectedRow){
                echo "<script>window.location = 'passwordreset.php';</script>>";
            }else{
                $message = "<h3 class='alert-danger'>User Name Or Email Not Matched</h3>";
                return $message;
            }
        }
    }


    public  function resetPasswordForTeacher($data){
        $email = $this->validation($data['email']);
        $password = $this->validation($data['password']);
        $confirmpass = $this->validation($data['confirmpass']);

        $email = mysqli_real_escape_string($this->link, $email);
        $password = mysqli_real_escape_string($this->link, $password);
        $confirmpass = mysqli_real_escape_string($this->link, $confirmpass);

        if($email == "" OR $password == "" OR $confirmpass ==""){
            $message = "<h3 class='alert-danger'>Input must be given to reset pass</h3>";
            return $message;
        }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message = "<h3 class='alert-danger'>Email is Invalid</h3>";
            return $message;
        }elseif($password != $confirmpass){
            $message = "<h3 class='alert-danger'>password does not match</h3>";
            return $message;
        }elseif(strlen($password) < 6){
            $message = "<h3 class='alert-danger'>Password must be greater than 6 character</h3>";
            return $message;
        }else{
            $password = md5($password);
            $query = "UPDATE tbl_teacher SET password = '$password' WHERE  email = '$email'";
            $updatedRow = $this->update($query);
            if($updatedRow){
                $message = "<h3 class='alert-success'>Password Updated. Login Now</h3>";
                return $message;
            }else{
                $message = "<h3 class='alert-danger'>Something went wrong, try again</h3>";
                return $message;
            }

        }
    }


}