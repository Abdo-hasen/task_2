<?php

const DB_HOST = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "e-commerce";

function createDatabase(){

    $conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);

    if(!$conn){
        die("connection failed : " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS `e-commerce`" ;

    $result = mysqli_query($conn,$sql);

    if($result){
        return "database created successfully";
    }else{
        die("fail to create database : " . mysqli_connect_errno());
    }
  
    mysqli_close($conn);

}

function getConnection(){

    $conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if($conn){
        return "success to connect";
    }else{
        die("connection failed : " . mysqli_connect_error());
    }

    mysqli_close($conn);

}



