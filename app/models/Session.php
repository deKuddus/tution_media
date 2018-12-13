<?php


class Session
{
    public  static  function sessioninit(){
      session_start();

    }
    public  static function set($key,$value){

        $_SESSION[$key] = $value;
    }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else{
            return false;
        }
    }
    public static function checkSession(){
        self::sessioninit();
        if(self::get("login") == false){
           self::sessionDestroy();
        }
    }

    public static function checkLogin(){
        self::sessioninit();
        if(self::get("login") == true){
            header("Location:index.php");
        }
    }

    public static function checkteacherSession(){
        self::sessioninit();
        if(self::get("teacherlogin") == false){
            self::sessionDestroy();
        }
    }




    public static function checkLoginforTeacher(){
        self::sessioninit();
        if(self::get("teacherlogin") == true){
            header("Location:index.php");
        }
    }

    public static function checkGardianSession(){
        self::sessioninit();
        if(self::get("gardianlogin") == false){
            self::sessionDestroy();
        }
    }




    public static function checkLoginforGardain(){
        self::sessioninit();
        if(self::get("gardianlogin") == true){
            header("Location:index.php");
        }
    }


    public static function sessionDestroy(){

        session_destroy();
        echo "<script>window.location = 'login.php';</script>>";
    }
}