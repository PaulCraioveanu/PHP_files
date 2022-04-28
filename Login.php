<?php
    //connection details for database
    $con = mysqli_connect("localhost", "id18667671_paulcraioveanu", "Agilepr0ject!", "id18667671_netballapp");
    //assigned parameters
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //select the user where the username and password match for that user
    //prepared against SQL Injection
    $statement = mysqli_prepare($con, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $username, $name, $email, $password, $age);

    $response = array();
    $response["success"] = false;

    //retrievieng all data about specific user to be encoded in json and sent to app
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["username"] = $username;
        $response["name"] = $name;
        $response["email"] = $email;
        $response["password"] = $password;
        $response["age"] = $age;
    }

    echo json_encode($response);
?>