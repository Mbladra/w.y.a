<?php
    require("password.php");
    $host="localhost"; // Host name 
    $username=""; // Mysql username 
    $password=""; // Mysql password 
    $db_name=""; // Database name 

    $con = mysqli_connect("$host", "$user", "$password", "$db_name");
    
    $username = $_POST['username'];
    $password = $_POST['password'];  

    //sanitize db
  
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = msql_real_escape_string($username);
    $password = msql_real_escape_string($password);

    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$colUsername,$colEmail,$colPassword);
    
    $response = array();
    $response["success"] = false;
    
    while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $colPassword)) {     
            $response["success"] = true;  
            $response["name"] = $colName;
            $response["age"] = $colAge;
        }
    }
    echo json_encode($response);
?>
