<?php

    session_start();
    try {
        //code...
        $user = $_SESSION['user'];
    } catch (\Throwable $th) {
        //throw $th;
        throw new Exception("Error Processing Request $th", 1);
    }
    
    if(isset($user)){
        echo json_encode(['user'=>$user, 'online'=> true]);
    }else{
        echo json_encode(['online'=>false]);
    }

    

?>