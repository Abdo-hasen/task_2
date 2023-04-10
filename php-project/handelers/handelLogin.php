<?php
session_start();
include "../core/functions.php";
include "../core/validations.php";
$errors = [];
$name = "";



if(checkRequestMethod("POST")&&checkPostInput("email"))
{

   foreach($_POST as $key => $value){
        $$key = sanitizeInput($value); 
   }

   if(requiredVal($email)){
        $errors[] = "email is required";
   }elseif(emailVal($email)){
        $errors[] = "please type a vaild email";
   }


   if(requiredVal($password)){
        $errors[] = "password is required";
   }elseif(minVal($password,6)){
        $errors[] = "password must be greater than 6 chars";
   }elseif(maxVal($password,25)){
        $errors[] = "password must be smaller than 25 chars";
   }


   $password = sha1($password); 

   $users_file = fopen("../data/users.csv","a+");
    
   while( $line = fgetcsv($users_file))
   {
          $credentials[] =  $line;
   }

   fclose($users_file);




     if(!checkLogin($credentials,$email,$password))

     {
          $errors[] = "please type the correct email and password";
               
     }


     if(checkErrors($errors)){
          
          $data = [$name,$email]; 
          $_SESSION["auth"] = $data;
          redirect("../index.php");
          
     }else{

          $_SESSION["errors"] = $errors;
          redirect("../login.php");

     }




}else{
    redirect("../login.php");
}