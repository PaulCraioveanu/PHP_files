<?php
<?php
    $con = mysqli_connect("localhost", "id18667671_paulcraioveanu", "&sVS@zXz)n%*DW05", "id18667671_netballapp");
    
    $username = $_POST["username"];
    $password = $_POST["password"];


    $statement = mysqli_prepare($con, "SELECT * FROM User WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement), $userID, $name, $age, $username, $password);

    $user = array();
    
    while(mysqli_stmt_fetch($statement)){
         $user[name] = $name;
         $user[age] = $age;
         $user[username] = $username;
         $user[password] = $password;
         $user[email] = $email;
    }

    mysqli_close($con);
?>