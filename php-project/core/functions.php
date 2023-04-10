<?php

    function checkRequestMethod($method){
        if($_SERVER["REQUEST_METHOD"] == $method){
            return true;
        }

        return false;

    }

    function checkPostInput($input){
        if(isset($_POST[$input])){
            return true;
        }

        return false;
    }

    function sanitizeInput($input){
        return trim(htmlspecialchars(htmlentities($input)));
    }




    function checkErrors($input){
        if(empty($input)){
            return true;
        }
        return false;
    }


    function checkLogin($array,$email,$password)
    {
        foreach($array as $value)
        {
            if($value[1] == $email && $value[2] == $password){
                    global $name;
                    $name = $value[0];
                    return true; 
                }
                
        }

        return false; 

    }

  
    function redirect($path){
        return header("location:$path");
        die;
    }



?>