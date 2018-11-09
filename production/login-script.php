<?php 
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    include('db/dbh.php');

    $query = "SELECT * FROM systemUsers WHERE username='$username' AND password='$password'";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    $username_db = $row['username'];
    $password_db = $row['password'];


    if($username_db == $username && $password_db == $password){
        $_SESSION['user']   = $username;
        $_SESSION['id']     = $id_db;

        header("Location: index.php");
    }
    else{
        echo "<script>window.alert('Username or Password Incorrect!')</script>";
    }


}
?>