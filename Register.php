<?php
    //details needed for database connection
    $con = mysqli_connect("localhost", "id18667671_paulcraioveanu", "Agilepr0ject!", "id18667671_netballapp");
    // assigning parameters
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $age = $_POST["age"];

    


    //preapring statement to stop SQL injection
    //statement created to insert details into the users table
    $statement = mysqli_prepare($con, "INSERT INTO users (username, name, email, password, age) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "ssssi", $username, $name, $email, $password, $age);
    mysqli_stmt_execute($statement);
    
    // response if statement above returns all necessary parameters
    //encodes response in json and sends to app
    $response = array();
    $response["success"] = true;

    echo json_encode($response);
    
?>