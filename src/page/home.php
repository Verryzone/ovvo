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
    <!-- tailwind css -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- Datatables -->
    <!-- jQquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />

    <!-- JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- Datatables -->

    <title>Home</title>
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(../component/font/Poppins-Regular.ttf);
        }
    </style>
</head>

<body>
    <div class="navbar bg-base-100 shadow-xl">
        <div class="flex-1">
            <label for="my-drawer" style="border: 0;" class="bg-white hover:bg-teal-500 hover:text-white btn border-none border-0 border-white text-black">| | |</label>
            <a style="font-family: 'Poppins';" class="font-bold normal-case text-xl border-0 border-white border-none">OvvoKlinik</a>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <span class="mr-3 font-semibold"><?= $_SESSION['username'] ?></span>

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
                } else if ($_GET['page'] == 'tambah_user') {
                    include 'user/tambah_user.php';
                } else if ($_GET['page'] == 'edit_user') {
                    include 'user/edit_user.php';
                } else if ($_GET['page'] == 'data_dokter') {
                    include 'dokter/data_dokter.php';
                } else if ($_GET['page'] == 'tambah_dokter') {
                    include 'dokter/tambah_dokter.php';
                } else if ($_GET['page'] == 'edit_dokter') {
                    include 'dokter/edit_dokter.php';
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

                <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'user_right' || $_GET['page'] ==  'tambah_user' || $_GET['page'] == 'edit_user') {
                        $user_right = "--tw-bg-opacity: 1; background-color: rgb(20 184 166 / var(--tw-bg-opacity));";
                    } else {
                        $user_right = '';
                    }
                }
                ?>
                <li class=" hover:bg-teal-500 rounded-md selection:bg-slate-100 ">
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li style="<?= $user_right; ?>" class="  hover:bg-teal-500 rounded-md selection:bg-slate-100 ">
                    <a href="home.php?page=user_right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        User Right
                    </a>
                </li>

                <li style="<?= $data_dokter; ?>" class="  hover:bg-teal-500 rounded-md selection:bg-slate-100 ">
                    <a href="home.php?page=data_dokter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-plus-fill" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5H2.545c-.3 0-.545.224-.545.5zm6.5 5a.5.5 0 0 0-1 0V10H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V11H10a.5.5 0 0 0 0-1H8.5V8.5z" />
                        </svg>
                        Dokter
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>