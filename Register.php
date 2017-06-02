<?php
    
    $host="localhost"; // Host name 
    $username=""; // Mysql username 
    $password=""; // Mysql password 
    $db_name=""; // Database name 

    $con = mysqli_connect("$my_host", "$my_user", "$my_password", "$db_name");

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    //sanitize db
    
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = msql_real_escape_string($username);
    $password = msql_real_escape_string($password);

    function registerUser() {
        global $con, $email, $username, $password;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $statement = mysqli_prepare($con, "INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($statement, "siss", $email, $username, $passwordHash);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);     
    }
    function usernameAvailable() {
        global $connect, $username;
        $statement = mysqli_prepare($connect, "SELECT * FROM user WHERE username = ?"); 
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            return true; 
        }else {
            return false; 
        }
    }
    $response = array();
    $response["success"] = false;  
    if (usernameAvailable()){
        registerUser();
        $response["success"] = true;  
    }
    
    echo json_encode($response);
?>
