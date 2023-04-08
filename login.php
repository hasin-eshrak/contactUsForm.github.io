<?php
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // DATABASE CONNECTION

    $con = new mysqli("localhost", "root", "", "project");
    if($con->connect_error){
        die("Failed To Connect : ".$con->connect_error);
    }
    else{
        $stmt = $con->prepare("select * from registration where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['pass'] === $pass){
                echo "<h2>Log In Successful</h2>";
            }
            else{
                echo "<h2>Invalid Username OR Password</h2>";
            }
        }
        else{
            echo "<h2>Invalid Username OR Password</h2>";
        }
    }
?>