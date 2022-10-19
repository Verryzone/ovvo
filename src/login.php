<?php 
    session_start();
    include "engine/koneksi.php";

    $db = new database();

    if(isset($_SESSION['is_login'])) {
        header("Location: home.php");
    }

    if(isset($_REQUEST['login'])){
        extract($_REQUEST);
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username;
        echo $password;
        $login = $db -> login($_POST['username'], $_POST['password']);

        if($login) {
            header("location: page/home.php");
        }else {
            header("location: login.php?pesan=gagal");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Login</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen bg-gradient-to-r from-green-500 to-teal-600">
        <div class="p-6 grid grid-cols-2 shadow-2xl gap-8 rounded-2xl bg-white py-10" >
            <div>
                <img style="width: 220px;" src="img/logo1.png" alt="ovvo-klinik">
            </div>
            <div class="justify-center">
                <h1 class="text-center text-4xl font-bold">Sign in</h1><br>
                <form action="" id="form_login" method="post">
                    <div style="padding-bottom: 13px;">
                        <input placeholder="username" style="height: 38px ; padding-bottom: 5px;" class="input input-bordered form-control" type="text" name="username">
                    </div>
                    <div>
                        <input placeholder="password" style="height: 38px ;" class="input input-bordered form-control" type="password" name="password">
                    </div>
                    <div class="mt-1">
                        <a href="" class="text-xs text-blue-600">Lupa password?</a>
                    </div>
                    <div class="justify-center text-end mt-2">
                        <button style="height:8px ;" class="rounded-3xl btn btn-outline btn-accent btn-sm" type="submit" name="login" >Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>