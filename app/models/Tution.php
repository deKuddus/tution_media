<?php

require_once __DIR__.'/../../vendor/autoload.php';


class Tution extends Database
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

    public  function getTutionCode(){
        $quuery = "SELECT * FROM tbl_tutions ORDER BY id DESC LIMIT 1";
        $result  = $this->select($quuery);
       if ($result){
            foreach ($result as $data){
                $tutionCode = $data['tution_code'] +1;
                return $tutionCode;
            }
        }
    }

    public  function  saveAllTutionInformaion($data){

        $teacherFrom = $this->validation($data['teacherFrom']);
        $tutionAt = $this->validation($data['tutionAt']);
        $tutionClass = $this->validation($data['tutionClass']);
        $tutionGroup = $this->validation($data['tutionGroup']);
        $tutionMedium = $this->validation($data['tutionMedium']);
        $tutionSubject = $this->validation($data['tutionSubject']);
        $tutionSalary = $this->validation($data['tutionSalary']);
        $tutionLocation = $this->validation($data['tutionLocation']);
        $daysInAWeek = $this->validation($data['daysInAWeek']);
        $tutionTime = $this->validation($data['tutionTime']);
        $tutionDurations = $this->validation($data['tutionDurations']);
        $tutionMediafee = $this->validation($data['tutionMediafee']);
        $tutionCode = $this->validation($data['tutionCode']);
        $teacherGender = $this->validation($data['teacherGenger']);


        $teacherFrom = mysqli_real_escape_string($this->link, $teacherFrom);
        $tutionAt = mysqli_real_escape_string($this->link, $tutionAt);
        $tutionClass = mysqli_real_escape_string($this->link, $tutionClass);
        $tutionGroup = mysqli_real_escape_string($this->link, $tutionGroup);
        $tutionMedium = mysqli_real_escape_string($this->link, $tutionMedium);
        $tutionSubject = mysqli_real_escape_string($this->link, $tutionSubject);
        $tutionSalary = mysqli_real_escape_string($this->link, $tutionSalary);
        $tutionLocation = mysqli_real_escape_string($this->link, $tutionLocation);
        $daysInAWeek = mysqli_real_escape_string($this->link, $daysInAWeek);
        $tutionTime = mysqli_real_escape_string($this->link, $tutionTime);
        $tutionDurations = mysqli_real_escape_string($this->link, $tutionDurations);
        $tutionMediafee = mysqli_real_escape_string($this->link, $tutionMediafee);
        $tutionCode = mysqli_real_escape_string($this->link, $tutionCode);
        $teacherGender = mysqli_real_escape_string($this->link, $teacherGender);




        if($tutionAt ==""){
            $message = "<h3 class='alert-danger'>Please specify a city for the tution.</h3>";
            return $message;
        }
        if($teacherGender ==""){
            $message = "<h3 class='alert-danger'>Please specify a gender for the tution.</h3>";
            return $message;
        }

        $query1 = "SELECT * FROM tbl_tutions WHERE  tution_code = '$tutionCode'";
        $result = $this->select($query1);
        if($result){
            $message = "<h3 class='alert-danger text-center'>tution code already exist. Refresh the page or type manually.</h3>";
            return $message;
            }

        if($tutionClass =="" OR $tutionMedium == "" OR $tutionSubject == "" OR $tutionLocation == "" OR $daysInAWeek =="" OR $tutionTime =="" OR $tutionDurations =="" OR $tutionMediafee =="")
        {
            $message = "<h3 class='alert-danger text-center'>Fill up all * mark field</h3>";
            return $message;
        }else{
            $query = "INSERT INTO tbl_tutions (teacher_university,tution_at,tution_class,tution_group,tution_medium,tution_subject,tution_salary,tution_code,teacher_gender)VALUES 
                      ('$teacherFrom','$tutionAt','$tutionClass','$tutionGroup','$tutionMedium','$tutionSubject','$tutionSalary','$tutionCode','$teacherGender')";
            $inserted_rows = $this->insert($query);

            $query1 = "SELECT * FROM tbl_tutions WHERE  tution_code = '$tutionCode'";
            $result = $this->select($query1);
            if($result){
                foreach ($result as $data){
                    $tutionID = $data['id'];
                }

                $query2 = "INSERT INTO tbl_tutions_details (tutions_id,tution_location,days_in_week,tution_time,tution_duration,tution_media_fee)
                              VALUES ('$tutionID','$tutionLocation','$daysInAWeek','$tutionTime','$tutionDurations','$tutionMediafee')";
                $result = $this->insert($query2);
                if($result){
                    $message = "<h3 class='alert-info text-center'> Data Inserted Successfully.</h3>";
                    return $message;
                }else{

                    $message = "<h3 class='alert-danger text-center'> Data Not Inserted  .</h3>";
                    return $message;
                }
            }

        }
    }


    public  function getAllDurations(){
        $query = "SELECT  * FROM tbl_duration order by id";
        $result = $this->select($query);
        return $result;
    }

    public  function getAllTeachingDays(){
        $query = "SELECT  * FROM tbl_days order by id";
        $result = $this->select($query);
        return $result;
    }

    public  function getAllCity(){
        $query = "SELECT  * FROM tbl_city order by id";
        $result = $this->select($query);
        return $result;
    }

    public  function getAllMedium(){
        $query = "SELECT  * FROM tbl_medium order by id";
        $result = $this->select($query);
        return $result;
    }

    public   function getAllActiveTutions(){

        $query  = "SELECT tbl_tutions_details.*, tbl_tutions.* from tbl_tutions_details inner join tbl_tutions on tbl_tutions_details.tutions_id = tbl_tutions.id where  tbl_tutions.status = 1 ";
        $result = $this->select($query);
        return $result;
    }
    public   function getAllActiveTutionsforAdminDashboard(){

        $query  = "SELECT tbl_tutions_details.*, tbl_tutions.* from tbl_tutions_details inner join tbl_tutions on tbl_tutions_details.tutions_id = tbl_tutions.id where  tbl_tutions.status = 1 ";
        $result = $this->select($query);
        $total = mysqli_num_rows($result);
        return $total;
    }

    public   function getAllDeactiveTutions(){

        $query  = "SELECT tbl_tutions_details.*, tbl_tutions.* from tbl_tutions_details inner join tbl_tutions on tbl_tutions_details.tutions_id = tbl_tutions.id where  tbl_tutions.status = 0 ";
        $result = $this->select($query);
        return $result;
    }

    public  function  deleteTutionByID($id){
        $query = "DELETE FROM tbl_tutions where  id = '$id'";
        $delete = $this->delete($query);

        $query1 = "DELETE FROM tbl_tutions_details where  tutions_id = '$id'";
        $delete1 = $this->delete($query1);
        if($delete && $delete1){
            $message = "<h3 class='alert-info text-center'> Data Deleted Successfully.</h3>";
            return $message;
        }else{

            $message = "<h3 class='alert-danger text-center'> Data Not Deleted  .</h3>";
            return $message;
        }
    }

    public function editTutionByID($id){
        $query  = "SELECT tbl_tutions_details.*, tbl_tutions.* from tbl_tutions_details inner join tbl_tutions on tbl_tutions_details.tutions_id = tbl_tutions.id where  tbl_tutions_details.tutions_id = '$id'";
        $result = $this->select($query);
        return $result;
    }


    public  function updateTutionInformaion($data){
        $teacherFrom = $this->validation($data['teacherFrom']);
        $tutionAt = $this->validation($data['tutionAt']);
        $tutionClass = $this->validation($data['tutionClass']);
        $tutionGroup = $this->validation($data['tutionGroup']);
        $tutionMedium = $this->validation($data['tutionMedium']);
        $tutionSubject = $this->validation($data['tutionSubject']);
        $tutionSalary = $this->validation($data['tutionSalary']);
        $tutionLocation = $this->validation($data['tutionLocation']);
        $daysInAWeek = $this->validation($data['daysInAWeek']);
        $tutionTime = $this->validation($data['tutionTime']);
        $tutionDurations = $this->validation($data['tutionDurations']);
        $tutionMediafee = $this->validation($data['tutionMediafee']);
        $tutionMediafee = $this->validation($data['tutionMediafee']);
        $id = $this->validation($data['tutionid']);
        $teacherGender = $this->validation($data['teacherGenger']);

        $teacherFrom = mysqli_real_escape_string($this->link, $teacherFrom);
        $tutionAt = mysqli_real_escape_string($this->link, $tutionAt);
        $tutionClass = mysqli_real_escape_string($this->link, $tutionClass);
        $tutionGroup = mysqli_real_escape_string($this->link, $tutionGroup);
        $tutionMedium = mysqli_real_escape_string($this->link, $tutionMedium);
        $tutionSubject = mysqli_real_escape_string($this->link, $tutionSubject);
        $tutionSalary = mysqli_real_escape_string($this->link, $tutionSalary);
        $tutionLocation = mysqli_real_escape_string($this->link, $tutionLocation);
        $daysInAWeek = mysqli_real_escape_string($this->link, $daysInAWeek);
        $tutionTime = mysqli_real_escape_string($this->link, $tutionTime);
        $tutionDurations = mysqli_real_escape_string($this->link, $tutionDurations);
        $tutionMediafee = mysqli_real_escape_string($this->link, $tutionMediafee);
        $teacherGender = mysqli_real_escape_string($this->link, $teacherGender);
        $id = mysqli_real_escape_string($this->link, $id);

        if($tutionAt ==""){
            $message = "<h3 class='alert-danger'>Please specify a city for the tution.</h3>";
            return $message;
        }

        if($tutionClass =="" OR $tutionMedium == "" OR $tutionSubject == "" OR $tutionLocation == "" OR $daysInAWeek =="" OR $tutionTime =="" OR  $tutionDurations =="" OR $tutionMediafee =="")
        {
            $message = "<h3 class='alert-danger text-center'>Fill up all * mark field</h3>";
            return $message;
        }else{
           $query1 = " UPDATE tbl_tutions SET 
             teacher_university = '$teacherFrom',
             tution_at = '$tutionAt',
             tution_class = '$tutionClass',
             tution_group = '$tutionGroup',
             tution_medium = '$tutionMedium',
             tution_subject = '$tutionSubject',
             tution_salary = '$tutionSalary',
             tution_subject = '$tutionSubject',
             teacher_gender = '$teacherGender'
            WHERE id = '$id' ";

            $updateQuery = $this->update($query1);
            if($updateQuery){
           $query2 = " UPDATE tbl_tutions_details SET 
                 tution_location = '$tutionLocation',
                 days_in_week = '$tutionSubject',
                 tution_time = '$tutionTime',
                 tution_duration = '$tutionDurations',
                 tution_media_fee = '$tutionMediafee'
             WHERE tutions_id ='$id' ";
            $result = $this->update($query2);
            if($result){
               echo "<script>window.location = 'tutionactive.php';</script>";
            }else{

                echo "<script>window.location = 'edittution.php';</script>";
            }
            }

        }



    }

    public  function changeStatusDeativeById($id){
        $query = "UPDATE tbl_tutions SET status = 0 WHERE  id = '$id'";
        $updatedRows = $this->update($query);
        if($updatedRows){
            header("Location:tutionactive.php");
        }else{
            header("Location: tutionactive.php");
        }
    }
    public  function changeStatusActiveById($id){
        $query = "UPDATE tbl_tutions SET status = 1 WHERE  id = '$id'";
        $updatedRows = $this->update($query);
        if($updatedRows){
            header("Location:tutionactive.php");
        }else{
            header("Location: tutionactive.php");
        }
    }

    public  function saveTutionRules($data){
        $rules = $this->validation($data['rules']);

        $rules = mysqli_real_escape_string($this->link, $rules);


        $query = "INSERT INTO tbl_tution_rules (rules)VALUES ('$rules')";
        $insert_rules = $this->insert($query);
        if($insert_rules){
            echo "<script>window.location = 'allrules.php';</script>>";
        }else{
            $message = "<h3 class='alert-danger'>Rules Not added due to some problem.</h3>";
            return $message;
        }
    }

    public  function getAllTutionRules(){
        $query =  "SELECT * FROM tbl_tution_rules";
        $result = $this->select($query);
        return $result;
    }

    public  function getAllLatestActiveTutions(){
        $query  = "SELECT tbl_tutions_details.*, tbl_tutions.* from tbl_tutions_details inner join tbl_tutions on tbl_tutions_details.tutions_id = tbl_tutions.id ORDER BY tbl_tutions.id DESC ";
        $result = $this->select($query);
        return $result;
    }

    public  function deleteRulesById($id){
        $query = "DELETE FROM  tbl_tution_rules WHERE id = '$id'";
        $result = $this->delete($query);
        if($result){
            $message = "<h3 class='alert-success'>Rules deleted.</h3>";
            return $message;
        }else{
            $message = "<h3 class='alert-success'>Rules Not deleted.</h3>";
            return $message;
        }
    }

    public function getTutionRulesByid($id){
        $query = "SELECT  * FROM tbl_tution_rules WHERE  id = '$id'";
        $result= $this->select($query);
        return $result;
    }

    public function updateRules($data){
        $rules = $this->validation($data['rules']);
        $id = $this->validation($data['rulesId']);

        $rules = mysqli_real_escape_string($this->link, $rules);
        $id = mysqli_real_escape_string($this->link, $id);

        $query = "UPDATE tbl_tution_rules SET rules = '$rules' where id = '$id'";
        $updateRules = $this->update($query);
        if($updateRules){
            echo "<script>window.location = 'seerulesfortution.php';</script>";
        }else{
            $message = "<h3 class='alert-danger'>Rules Not Updated.</h3>";
            return $message;
        }
    }


    public function saveSocailMediaLink($data){
        $link = $this->validation($data['linkName']);
        $icon = $this->validation($data['icon']);

        $link = mysqli_real_escape_string($this->link, $link);
        $icon = mysqli_real_escape_string($this->link, $icon);

        if($link == "" OR $icon == ""){
            $message = "<h3 class='alert-danger'>Input Can not be empty.</h3>";
            return $message;
        }else{
            $query = "INSERT INTO tbl_social_link (linkName, icon)VALUES ('$link', '$icon')";
            $insertedRows = $this->insert($query);
            if($insertedRows){
                echo "<script>window.location = 'sociallist.php';</script>";

            }else{
                $message = "<h3 class='alert-danger'>no.</h3>";
                return $message;
            }
        }

    }

    public  function getAllSocial(){
        $query = "SELECT * FROM tbl_social_link order by id desc ";
        $result = $this->select($query);
        return $result;
    }

    public function getSocialByid($id){
        $query = "SELECT * FROM tbl_social_link where id = '$id'";
        $result = $this->select($query);
        return $result;
    }

    public  function updateSocailById($data){
        $link = $this->validation($data['linkName']);
        $icon = $this->validation($data['icon']);
        $id = $this->validation($data['linkid']);

        $link = mysqli_real_escape_string($this->link, $link);
        $icon = mysqli_real_escape_string($this->link, $icon);
        $id = mysqli_real_escape_string($this->link, $id);

        if($link == "" OR $icon == ""){
            $message = "<h3 class='alert-danger'>Input Can not be empty.</h3>";
            return $message;
        }else{
            $query = "UPDATE tbl_social_link SET linkName = '$link', icon = '$icon' where id = '$id'";
            $updatedRows = $this->update($query);
            if($updatedRows){
                echo "<script>window.location = 'sociallist.php';</script>";

            }else{
                $message = "<h3 class='alert-danger'>Data not updated</h3>";
                return $message;
            }
        }
    }

    public function getAllTutionBySearch($data){
        $class = $this->validation($data['class']);
        $city = $this->validation($data['city']);
        $gender = $this->validation($data['gender']);

        $class = mysqli_real_escape_string($this->link, $class);
        $city = mysqli_real_escape_string($this->link,$city);
        $gender = mysqli_real_escape_string($this->link,$gender);

        $query  = "SELECT tbl_tutions_details.*, tbl_tutions.* from tbl_tutions_details inner join tbl_tutions on tbl_tutions_details.tutions_id = tbl_tutions.id WHERE  tbl_tutions.tution_class Like  '%$class%' OR tbl_tutions.tution_at Like  '%$city%' OR tbl_tutions.teacher_gender Like '%$gender%' ORDER BY tbl_tutions.id DESC ";

        $result = $this->select($query);
        return $result;

    }



    public function saveTutionRequest($tutionId,$teacherId){
        $tutionID = $this->validation($tutionId);
        $teacherID = $this->validation($teacherId);

        $query1  = "SELECT tbl_tutions_details.*, tbl_tutions.* from tbl_tutions_details inner join tbl_tutions on tbl_tutions_details.tutions_id = tbl_tutions.id WHERE  tbl_tutions.id = '$tutionID' ";
        $value  = $this->select($query1);

        if($value){
            foreach ($value as $item){

                $tutionCode = $item['tution_code'];
                $tutionSalary = $item['tution_salary'];
                $tutionLocation = $item['tution_location'];
                $tutionClass = $item['tution_class'];

                $query2 = "SELECT * FROM tbl_tution_request WHERE  tution_code = '$tutionCode' AND teacher_id = '$teacherID'";
                $selectedRow = $this->select($query2);
                if($selectedRow){
                    echo "<script> window.location = 'teacherprofile.php'; </script>";
                }else{
                    $query = "INSERT INTO tbl_tution_request (tution_code,tution_salary,tution_location,teacher_id,tution_class) VALUES ('$tutionCode','$tutionSalary','$tutionLocation','$teacherID','$tutionClass')";
                    $inserted_rows = $this->insert($query);
                    if($inserted_rows){
                        echo "<script> window.location = 'teacherprofile.php'; </script>";
                    }else{
                        echo "<script> window.location = 'index.php'; </script>";

                    }
                }
            }
        }


    }

    public function getAllTutionRequest($id){
        $query = "SELECT * FROM tbl_tution_request WHERE  teacher_id = '$id'";
        $result = $this->select($query);
        return $result;
    }


    public  function getTutionRequestCount(){
        $query  = "SELECT * FROM tbl_tution_request WHERE  status = 0";
        $result = $this->select($query);
        if($result){
            $count = mysqli_num_rows($result);
            return $count;
        }
    }

    public function getAllTutionRequestForAdmin(){
        $query = "SELECT * FROM tbl_tution_request ORDER BY id DESC ";
        $result = $this->select($query);
        return $result;
    }

    public  function activeTutionRequestById($id){
        $query = "UPDATE tbl_tution_request SET status = 0 WHERE  id = '$id'";
        $updatedRows = $this->update($query);
        if($updatedRows){
            header("Location:seetutionrequest.php");
        }else{
            header("Location: seetutionrequest.php");
        }
    }

    public  function deactiveTutionRequestById($id){
        $query = "UPDATE tbl_tution_request SET status = 1 WHERE  id = '$id'";
        $updatedRows = $this->update($query);
        if($updatedRows){
            header("Location:seetutionrequest.php");
        }else{
            header("Location: seetutionrequest.php");
        }
    }

    public  function deleteRequestById($id){
            $query = "DELETE FROM tbl_tution_request WHERE id = '$id'";
            $deletedRows1 = $this->delete($query);

            if($deletedRows1){
                $message = "<h3 class='alert-success text-center'> Tution Request Deleted Successfully .</h3>";
                return $message;
            }else{
                $message = "<h3 class='alert-danger text-center'> Tution Request Not  Deleted Successfully .</h3>";
                return $message;
            }
        }

        public  function getAllTutorRequestForAdmin(){
        $query = "SELECT * FROM tbl_teacher_request ORDER BY id DESC ";
        $result = $this->select($query);
        return $result;
        }

        public  function getGardianDataByID($id){
        $query = "SELECT * FROM tbl_gardian WHERE id = '$id'";
        $result = $this->select($query);
        return $result;
        }

    public  function activeTeacherRequestById($id){
        $query = "UPDATE tbl_teacher_request SET status = 0 WHERE  id = '$id'";
        $updatedRows = $this->update($query);
        if($updatedRows){
            header("Location: seetutorrequest.php");
        }else{
            header("Location: seetutorrequest.php");
        }
    }

    public  function deactiveTeacherRequestById($id){
        $query = "UPDATE tbl_teacher_request SET status = 1 WHERE  id = '$id'";
        $updatedRows = $this->update($query);
        if($updatedRows){
            header("Location: seetutorrequest.php");
        }else{
            header("Location: seetutorrequest.php");
        }
    }

    public  function deleteTeacherRequestById($id){
        $query = "DELETE FROM tbl_teacher_request WHERE id = '$id'";
        $deletedRows1 = $this->delete($query);

        if($deletedRows1){
            $message = "<h3 class='alert-success text-center'> Teacher Request Deleted Successfully .</h3>";
            return $message;
        }else{
            $message = "<h3 class='alert-danger text-center'> Teacher Request Not  Deleted Successfully .</h3>";
            return $message;
        }
    }


}