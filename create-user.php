<?php

    require('conn.php');

    $name = $username = $email = $password = '';
    //errors array
    $errors = array('name'=>'', 'username'=>'', 'email'=>'', 'password'=>'');
    // if the form is submited
    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['name']);

        if(strlen(trim($_POST['username'])) < 8){
            $errors['username'] = 'username must be at least 8 characters long';
        }
        else{
            $username = htmlspecialchars($_POST['username']);
        };

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $email = htmlspecialchars($_POST['email']);
        }
        else{
            $errors['email'] = 'Email is not in correct format';
        }
    
        if(!preg_match('/[\w \W]{8}/', $_POST['password'])){
            $errors['password'] = 'Password must contain a lowercase, uppercase letter and a number and cannot be less than 8 characters';
        }
        else{
            $password = htmlspecialchars($_POST['password']);
        }


        if(!array_filter($errors)){
           
            $name = mysqli_real_escape_string($conn, $name);
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);
            $uid = 'DQAKSSS'.rand(1000, 10000);

            $sql = "INSERT INTO user (uid, name, username, email, password) VALUES ('$uid','$name', '$username', '$email',  '$password')";

            if(mysqli_query($conn, $sql)){
                $user = new Person($name,$username, $email, $password, $uid);
                session_start();
                $_SESSION['user'] = $user;
                $user = $_SESSION['user'];
                // $user = ['name'=>$name, 'username'=>$username, 'email'=>$email, 'password'=>$password];
                echo json_encode($user);
            }else{
                echo "error occured ";
            }
            
            
            
        }
        else{
            echo json_encode($errors);
        }
       
    }
    
?>