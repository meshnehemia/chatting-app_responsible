<?php
    global $row;
    session_start();
    require_once('config.php');
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);
    if(!empty($email) and !empty($password)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sql =mysqli_query($conn,"SELECT * from profiles where email ='{$email}' and password='{$password}'");
            if(mysqli_num_rows($sql)>0){
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['id'] =$row['id'];
                echo "successfully";
            }else{
                echo "you have provided wrong credentials";
            }
        }
        else{
            echo "wrong email";
        }
    }else{
        echo "all fields must be filled up ";
    }