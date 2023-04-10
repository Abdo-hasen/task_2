<?php
session_start();
include "../core/functions.php";
include "../core/validations.php";
$errors = [];

    // check method

    if(checkRequestMethod("POST") && checkPostInput("email")){

        foreach($_POST as $key => $value){
            $$key = sanitizeInput($value);
        }

        // validations

        // mahfouz - - كاني بقول لو النيم فولس
        // if(!requiredVal($name)){
        //     echo "name is required";
        // }

        // me 
        if(requiredVal($name)){
            $errors[] =  "name is required";
        }elseif(minVal($name,3)){
            $errors[] = "name must be greater than 3 chars";
        }elseif(maxVal($name,25)){
            $errors[] = "name must be smaller than 25 chars";
        }

        if(requiredVal($email)){
            $errors[] =  "email is required";
        }elseif(emailVal($email)){
            $errors[] = "please type a vaild email";
        }


        if(requiredVal($password)){
            $errors[] =  "password is required";
        }elseif(minVal($password,6)){
            $errors[] = "password must be greater than 6 chars";
        }elseif(maxVal($password,20)){
            $errors[] = "password must be smaller than 20 chars";
        }

        

        if(checkErrors($errors)){

            $data = [$name,$email,sha1($password)];
            $users_file = fopen("../data/users.csv","a+");
            fputcsv($users_file,$data);
            fclose($users_file);  
            $_SESSION["auth"] = [$name,$email]; 
            redirect("../index.php");

        }else{

            print_r($errors);
            $_SESSION["errors"] = $errors;
            redirect("../regestier.php");
            
        }
     
       
    }else{
        redirect("location:../regestier.php");
    }


?>