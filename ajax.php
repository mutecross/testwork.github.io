<?php
require_once('php/Extensions.php');

if(isset($_GET['company_name']) && $_GET['phone'] && $_GET['email'] && $_GET['description']){
    $connect = ConnectToServer();
    $company_name = Clean($_GET['company_name'],100);
    $phone = Clean($_GET['phone'],30);
    $email = Clean($_GET['email'],100);
    $description = Clean($_GET['description'],200);
    
    $query_insert = "INSERT INTO Company_list (company_name, phone, email, description) VALUES ('$company_name','$phone','$email','$description')";

    $successful = mysqli_query($connect,$query_insert);
    if($successful){
        $text = "Информация принята";
    }
    else {
        $text = "Ошибка добавления данных!";
    }
    mysqli_close($connect);
    exit;
}


//CREATE DATABASE TestDb_Nemtsev DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci

// CREATE TABLE TestDb_Nemtsev.Company_list (company_id INT NOT NULL AUTO_INCREMENT, company_name VARCHAR(100) NULL , phone VARCHAR(30) NULL, email VARCHAR(100) NULL, description VARCHAR(200) NULL, PRIMARY KEY (company_id)) ENGINE = InnoDB;