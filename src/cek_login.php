<?php 
    session_start();
    include "engine/koneksi.php";
    
    $db = new database();
    
    if (isset($_SESSION['is_login'])) {
        header("Location: page/home.php");
    }
    
    if (isset($_REQUEST['login'])) {
        extract($_REQUEST);
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // echo $username;
        // echo $password;
        $login = $db->login($_POST['username'], $_POST['password']);
    
        if ($login) {
            header("location: page/home.php");
        } else {
            header("location: login.php?pesan=gagal");
        }
    }
