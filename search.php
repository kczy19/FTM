<?php
    $email = filter_input(INPUT_POST,'mail');
    $password = filter_input(INPUT_POST,'pass');
    $conn = new mysqli("localhost","root","","users");
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $sql = "SELECT id, email, pass FROM registered";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //echo "<br>";
                //echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["pass"]. "<br>";
                if(strcmp($email,$row["email"]) == 0 and strcmp($password,$row["pass"] == 0)){
                    
                    $conn->close();
                    header("Location: student.html"); 
                }
            }
            $conn->close();
            header("Location: signup.html"); 
          } else {
            $conn->close();
            header("Location: signup.html"); 
          }
    }

?>