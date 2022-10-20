<?php
session_start();
include "../engine/koneksi.php";

$db  = new database();

if (!isset($_SESSION['is_login'])) {
    header("location: ../login.php");
}

if (isset($_GET['q'])) {
    $db->logout();
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="emerald">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Home</title>
</head>

<body>
    <div class="navbar bg-base-100 shadow-xl">
        <div class="flex-1">
            <label for="my-drawer" style="border: 0;" class="bg-white hover:bg-teal-500 hover:text-white btn border-none border-0 border-white text-black">| | |</label>
            <a class="btn btn-ghost normal-case text-xl border-0 border-white border-none">OvvoKlinik</a>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <span class="badge badge-sm indicator-item">Administrator</span>
                    </div>
                </label>
            </div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div style="width: 40px;" class="w-1 rounded-full">
                        <img src="https://placeimg.com/80/80/people" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            My Profile
                        </a>
                    </li>
                    <li><a href="?q">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
                    <?php
                    // $id = isset($_GET['id']);
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == 'home') {
                            header('Location: home.php');
                        } else if ($_GET['page'] == 'user_right') {
                            include 'user/user_right.php';
                        } else if($_GET['page'] == 'tambah_user') {
                            include 'user/tambah_user.php';
                        } else if($_GET['page'] == 'edit_user') {
                            include 'user/edit_user.php';
                        }
                    }
                    ?>
        </div>

        <!-- side bar -->
        <div class="drawer-side">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 text-base-content ">
                <!-- Sidebar content here -->
                <center>
                    <div class="object-center">
                        <img class="pl-40 object-center" style="width: 150px;" src="../img/logo1.png" alt="ovvo-klinik">
                    </div><br>
                    <hr>
                </center>

                <li class=" hover:bg-teal-500 rounded-md selection:bg-slate-100 ">
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li class="  hover:bg-teal-500 rounded-md selection:bg-slate-100 ">
                    <a href="home.php?page=user_right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        User Right
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>