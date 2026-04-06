<?php
session_start();
require 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $stmt=$pdo->prepare("SELECT*FROM Users WHERE username= ? AND password= ?");
    $stmt->execute([$username, $password]);

    if($stmt->rowCount()>0){
        $_SESSION['user']=$username;
        header("Location: dashboard.php");
        exit();
    }else{
        $error="Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Jennifer M. Saycon</h1>
        <form method="POST">
            <label>Username:</label><br>
            <input type="text" name="username"><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br>
            <button type="">Login</button>
        </form>
    </div>
</body>
</html>