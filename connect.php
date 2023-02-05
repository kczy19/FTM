<?php
    $name = filter_input(INPUT_POST,'naam');
    $mobile = filter_input(INPUT_POST,'phone');
    $email = filter_input(INPUT_POST,'eemail');
    $pass = filter_input(INPUT_POST,'passs');

    $conn = new mysqli("localhost","root","","users");
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
        
    }else{
        $stmt = $conn->prepare("insert into registered(name,mobile,email,pass)values(?,?,?,?)");
        $stmt->bind_param("siss",$name,$mobile,$email,$pass);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: login.html"); 
    }

?>