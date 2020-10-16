<?php 

    session_start();
    session_unset();
    if(!(isset($_SESSION['user']))){
        echo json_encode(['message'=> 'user logged out']);
    }else{
        echo json_encode($user);
    }
    

?>