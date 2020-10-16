<?php

    
    $conn = mysqli_connect('localhost', 'kala', 'kala', 'auth');

    if(!$conn){
        echo 'Connection error'.mysqli_connect_error();
    };

?>