<?php 

    require('conn.php');

    if(isset($_POST['login'])){
        $username = trim(htmlspecialchars($_POST['username']));
        $password = trim(htmlspecialchars($_POST['password']));

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT *  FROM `user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";

        $result = mysqli_query($conn, $sql);

        if($result){
            $user = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['user'] = $user;
            $user = $_SESSION['user'];
            echo json_encode($user);
        }else{
            echo "error wrong password or email";
        }
        
    }

?>