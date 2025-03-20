<?php
session_start();
require_once 'config.php';

if (isset($_POST['register'])){
    $name = $_POST['Naam'];
    $email = $_POST['Email'];
    $password = password_hash($_POST['Wachtwoord'], PASSWORD_DEFAULT);

    $checkEmail = $conn->query("SELECT Email FROM inlog WHERE Email = '$email'");
    if ($checkEmail->num_rows > 0){
    $_SESSION['register_error'] = 'Email is already registered!';
    $_SESSION['active_form'] = 'register';
    }else{
    $conn->query("INSERT INTO inlog (Naam, Email, Wachtwoord) VALUES ('$name', '$email', '$password')");
    }

    header("location: index.php");
    exit();
}

if (isset($_POST['login'])){
    $email = $_POST['Email'];
    $password = $_POST['Wachtwoord'];

    $result = $conn->query("SELECT * FROM inlog WHERE Email = '$email'");
    if ($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if (password_verify($password,$user['Wachtwoord'])){
            $_SESSION['Naam'] = $user['Naam'];
            $_SESSION['Email'] = $user['Email'];
            header("location: ../Homepage/Homepage.php");
            exit();
        }
        
    }
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("location: index.php");
    exit();
}

?>
