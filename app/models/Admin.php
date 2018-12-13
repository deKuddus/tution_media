<?php 
/**
 * 
 */
require_once __DIR__.'/../../vendor/autoload.php';

class Admin extends Database
{
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
    public  function  getAdminProfile($id){
        $query =  "SELECT * FROM tbl_admin WHERE  id = '$id'";
        $result = $this->select($query);
        return $result;
    }

    public  function createNewAdmin($data){
        $fullName = $this->validation($data['adminFullName']);
        $userName = $this->validation($data['adminUserName']);
        $email = $this->validation($data['adminEmail']);
        $role  = $this->validation($data['adminRole']);
        $password = $this->validation($data['adminPassword']);
        $confrimpassword = $this->validation($data['confirmpassword']);


        $fullName = mysqli_real_escape_string($this->link,$fullName);
        $userName = mysqli_real_escape_string($this->link,$userName);
        $email = mysqli_real_escape_string($this->link,$email);
        $role = mysqli_real_escape_string($this->link,$role);
        $password = mysqli_real_escape_string($this->link,$password);
        $confrimpassword = mysqli_real_escape_string($this->link,$confrimpassword);


        $permitted = array('jpg' , 'jpeg' , 'png' , 'gif');
        $file_Name = $_FILES['image']['name'];
        $file_Size = $_FILES['image']['size'];
        $file_Temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_Name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0 ,10).'.'.$file_ext;
        $uploaded_image = "images/".$unique_image;

        $query =  "SELECT * FROM tbl_admin WHERE user_name = '$userName' OR  email = '$email'";
        $result = $this->select($query);
        if($result){
            $message = "<h3 class='alert-danger'>User Name or Emial already exist. Try Again</h3>";
            return$message;
        }

        if($fullName == "" OR $userName == "" OR $email == "" OR $role == "" OR $password == "" or $file_Name == ""){
            $message = "<h3 class='alert-danger'>All Input must be given to complete your registration</h3>";
            return $message;
        }elseif($file_Size > 1048567){
            $message = "<h3 class='alert-danger'>Image should be less then 1MB.</h3>";
            return $message;
        }
        elseif (in_array($file_ext , $permitted) === false){
            echo "<span class='err'></span>";
            $message = "<h3 class='alert-danger'>you can upload only :-".implode(',' , $permitted)."</h3>";
            return $message;
        }elseif($password != $confrimpassword){
            $message = "<h3 class='alert-danger'>password does not match</h3>";
            return$message;
        }else{
            if(move_uploaded_file($file_Temp ,$uploaded_image)){
                $password = md5($password).$userName;
                $query = "INSERT INTO tbl_admin (fullName,user_name,email,role,image,password)VALUES ('$file_Name','$userName','$email','$role','$uploaded_image','$password')";

                $insertedRows = $this->insert($query);
                if($insertedRows){
                    $message = "<h3 class='alert-success'>Admin Profile Created Successfully.Profile Will Be activate by Super Admin</h3>";
                    return $message;
                }else{
                    $message = "<h3 class='alert-danger'>Profile Not Created.Try Again</h3>";
                    return $message;
                }
            }else{
                $message = "<h3 class='alert-danger'>Image Uploadin Problem</h3>";
                return $message;
            }
        }

    }

    public  function getAllAdmin(){
        $query = "SELECT * FROM tbl_admin";
        $result = $this->select($query);
        return $result;
    }

    public  function deleteAdminById($id){
        $query  = "DELETE FROM tbl_admin WHERE id = '$id'";
        $result = $this->delete($query);
        if($result){
            $message = "<h3 class='alert-success text-center'> Admin Deleted Successfully.</h3>";
            return $message;
        }else{

            $message = "<h3 class='alert-danger text-center'> Admin Not Deleted Successfully.Try Again.</h3>";
            return $message;

        }
    }

    public  function  activeAdminById($id){
        $query = "UPDATE tbl_admin SET status = 1 WHERE id = '$id'";
        $result = $this->update($query);
        if($result){
            echo "<script>window.location = 'adminlist.php'; </script>>";
        }else{
            echo "<script>window.location = 'adminlist.php'; </script>>";
        }
    }

    public  function  deactiveAdminById($id){
        $query = "UPDATE tbl_admin SET status = 0 WHERE id = '$id'";
        $result = $this->update($query);
        if($result){
            echo "<script>window.location = 'adminlist.php'; </script>>";
        }else{
            echo "<script>window.location = 'adminlist.php'; </script>>";
        }
    }

    public  function addNewFooterImage($data){
        $imageHints = $this->validation($data['imageHints']);

        $imageHints = mysqli_real_escape_string($this->link, $imageHints);

        $permitted = array('jpg' , 'jpeg' , 'png' , 'gif');
        $file_Name = $_FILES['image']['name'];
        $file_Size = $_FILES['image']['size'];
        $file_Temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_Name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0 ,10).'.'.$file_ext;
        $uploaded_image = "footerImage/".$unique_image;

        if($imageHints == "" OR  $file_Name == ""){
            $message = "<h3 class='alert-danger'>All Input must be given .</h3>";
            return $message;
        }elseif($file_Size > 1048567){
            $message = "<h3 class='alert-danger'>Image should be less then 1MB.</h3>";
            return $message;
        }
        elseif (in_array($file_ext , $permitted) === false){
            echo "<span class='err'></span>";
            $message = "<h3 class='alert-danger'>you can upload only :-".implode(',' , $permitted)."</h3>";
            return $message;
        }else{
            if(move_uploaded_file($file_Temp ,$uploaded_image)){
                $query = "INSERT INTO tbl_footer_image (image_hints,image)VALUES ('$imageHints','$uploaded_image')";

                $insertedRows = $this->insert($query);
                if($insertedRows){
                    echo "<script>window.location = 'footerimagelist.php';</script>>";
                }else{
                    $message = "<h3 class='alert-danger'>Profile Not Created.Try Again</h3>";
                    return $message;
                }
            }else{
                $message = "<h3 class='alert-danger'>Image Uploading Problem</h3>";
                return $message;
            }
        }

    }

    public  function getAllfooterImage(){
        $query = "SELECT * FROM tbl_footer_image ORDER  BY id DESC ";
        $result = $this->select($query);
        return $result;
    }

    public function deleteFooterImageById($id){
        $query = "DELETE FROM tbl_footer_image WHERE id = '$id'";
        $deletedRow = $this->delete($query);
        if($deletedRow){
            $message = "<h3 class='alert-success'>Image Deleted Successfully</h3>";
            return $message;
        }else{
            $message = "<h3 class='alert-danger'>Image Not Deleted</h3>";
            return $message;
        }
    }

    public  function  activeFooterImageById($id){
        $query = "UPDATE tbl_footer_image SET status = 1 WHERE id = '$id'";
        $result = $this->update($query);
        if($result){
            $message = "<h3 class='alert-success'>Image Activated</h3>";
            return $message;
        }else{
            $message = "<h3 class='alert-danger'>Image Not Activated</h3>";
            return $message;
        }
    }

    public  function  deactiveFooterImageById($id){
        $query = "UPDATE tbl_footer_image SET status = 0 WHERE id = '$id'";
        $result = $this->update($query);
        if($result){
            $message = "<h3 class='alert-success'>Image Deactivated</h3>";
            return $message;
        }else{
            $message = "<h3 class='alert-danger'>Image Not Deactivated</h3>";
            return $message;
        }
    }

    public  function getActiveFooterImage(){
        $query = "SELECT * FROM  tbl_footer_image WHERE status = 1";
        $result = $this->select($query);
        return $result;
    }

    public function resetAdminPassword($data){
        $password = $this->validation($data['password']);
        $confirmpasswrod = $this->validation($data['confirmPassword']);
        $email = $this->validation($data['email']);

        $password = mysqli_real_escape_string($this->link,$password);
        $confirmpasswrod = mysqli_real_escape_string($this->link,$confirmpasswrod);
        $email = mysqli_real_escape_string($this->link,$email);

        if($password == "" OR $confirmpasswrod == ""){
            $message = "<h3 class='alert-danger'>Input field can not empty</h3>";
            return $message;
        }elseif($password != $confirmpasswrod){
            $message = "<h3 class='alert-danger'>Password does not match</h3>";
            return $message;
        }elseif(strlen($password) < 6){
            $message = "<h3 class='alert-danger'>password must be greater than 6 character</h3>";
            return $message;
        }else{
                $password = md5($password);
                $query = "UPDATE tbl_admin SET password = '$password' WHERE email = '$email'";
                $updatedRow = $this->update($query);
                if($updatedRow){
                    $message = "<h3 class='alert-success'>password Updated , Goto Login</h3>";
                    return $message;
                }else{
                    $message = "<h3 class='alert-danger'>something went wrong!! try again</h3>";
                    return $message;
                }
        }
    }

}