<?php
session_start();
include "../engine/koneksi.php";

$db  = new database();

if (!isset($_SESSION['is_login'])) {
    header("location: ../login.php");
}

if (isset($_GET['q'])) {
    $db->logout();
    header("Location: ../login.php?pesan=logout");
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

    <!-- jQquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <!-- JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- Datatables -->

    <title>Home</title>
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(../component/font/Poppins-Regular.ttf);
        }

        @font-face {
            font-family: 'bold-Poppins';
            src: url(../component/font/Poppins-Bold.ttf);
        }
    </style>
</head>

<body>
    <div style="background: #346751;" class="navbar shadow-xl">
        <div class="flex-1">
            <label for="my-drawer" style="border: 0;" class="bg-transparent hover:bg-transparent hover:text-white btn border-none border-0 border-white text-white">| | |</label>
            <a style="font-family: 'Poppins';" class="font-bold normal-case text-xl border-0 border-white border-none text-white">&nbsp;&nbsp;&nbsp;OvvoKlinik</a>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <span class="mr-3 font-semibold text-white"><?= $_SESSION['username'] ?></span>

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
                } else if ($_GET['page'] == 'data_pasien') {
                    include 'pasien/data_pasien.php';
                } else if ($_GET['page'] == 'tambah_pasien') {
                    include 'pasien/tambah_pasien.php';
                } else if ($_GET['page'] == 'edit_pasien') {
                    include 'pasien/edit_pasien.php';
                } else if ($_GET['page'] == 'data_staff') {
                    include 'staff/data_staff.php';
                } else if ($_GET['page'] == 'tambah_staff') {
                    include 'staff/tambah_staff.php';
                } else if ($_GET['page'] == 'edit_staff') {
                    include 'staff/edit_staff.php';
                } else if ($_GET['page'] == 'data_obat') {
                    include 'obat/data_obat.php';
                } else if ($_GET['page'] == 'tambah_obat') {
                    include 'obat/tambah_obat.php';
                } else if ($_GET['page'] == 'edit_obat') {
                    include 'obat/edit_obat.php';
                } else if ($_GET['page'] == 'data_transaksi') {
                    include 'transaksi/data_transaksi.php';
                } else if ($_GET['page'] == 'tambah_transaksi') {
                    include 'transaksi/tambah_transaksi.php';
                } else if ($_GET['page'] == 'edit_transaksi') {
                    include 'transaksi/edit_transaksi.php';
                }
            } else {
                include 'home/dashboard.php';
            }
            ?>
        </div>

        <!-- side bar -->
        <div class="drawer-side ">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul style="background: #346751;" class="menu p-4 overflow-y-auto w-80 text-base-content">
                <!-- Sidebar content here -->
                <center>
                    <div class="object-center">
                        <img class="object-center" style="width: 150px;" src="../img/logo1.png" alt="ovvo-klinik">
                    </div><br>
                    <hr>
                </center>

                <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'user_right' || $_GET['page'] ==  'tambah_user' || $_GET['page'] == 'edit_user') {
                        $user_right = "--tw-bg-opacity: 1; background-color: rgb(74 222 128 / var(--tw-bg-opacity));";
                    } else {
                        $user_right = '';
                    }

                    if ($_GET['page'] == 'data_dokter' || $_GET['page'] ==  'tambah_dokter' || $_GET['page'] == 'edit_dokter') {
                        $data_dokter = "--tw-bg-opacity: 1; background-color: rgb(74 222 128 / var(--tw-bg-opacity));";
                    } else {
                        $data_dokter = '';
                    }

                    if ($_GET['page'] == 'data_pasien' || $_GET['page'] ==  'tambah_pasien' || $_GET['page'] == 'edit_pasien') {
                        $data_pasien = "--tw-bg-opacity: 1; background-color: rgb(74 222 128 / var(--tw-bg-opacity));";
                    } else {
                        $data_pasien = '';
                    }

                    if ($_GET['page'] == 'data_staff' || $_GET['page'] ==  'tambah_staff' || $_GET['page'] == 'edit_staff') {
                        $data_poli = "--tw-bg-opacity: 1; background-color: rgb(74 222 128 / var(--tw-bg-opacity));";
                    } else {
                        $data_poli = '';
                    }
                    if ($_GET['page'] == 'data_obat' || $_GET['page'] ==  'tambah_obat' || $_GET['page'] == 'edit_obat') {
                        $data_obat = "--tw-bg-opacity: 1; background-color: rgb(74 222 128 / var(--tw-bg-opacity));";
                    } else {
                        $data_obat = '';
                    }

                    if ($_GET['page'] == 'data_transaksi' || $_GET['page'] ==  'tambah_transaksi' || $_GET['page'] == 'edit_transaksi') {
                        $data_transaksi = "--tw-bg-opacity: 1; background-color: rgb(74 222 128 / var(--tw-bg-opacity));";
                    } else {
                        $data_transaksi = '';
                    }
                } else {
                    $home = "--tw-bg-opacity: 1; background-color: rgb(74 222 128 / var(--tw-bg-opacity));";
                }
                ?>
                <li style="<?= $home; ?>" class=" hover:bg-slate-900/10 rounded-md selection:bg-slate-100 text-white">
                    <a href="home.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li style="<?= $user_right; ?>" class="  hover:bg-slate-900/10 rounded-md selection:bg-slate-100 text-white">
                    <a href="home.php?page=user_right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        User Right
                    </a>
                </li>

                <li style="<?= $data_dokter; ?>" class="  hover:bg-slate-900/10 rounded-md selection:bg-slate-100 text-white">
                    <a href="home.php?page=data_dokter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-plus-fill" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5H2.545c-.3 0-.545.224-.545.5zm6.5 5a.5.5 0 0 0-1 0V10H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V11H10a.5.5 0 0 0 0-1H8.5V8.5z" />
                        </svg>
                        Dokter
                    </a>
                </li>

                <li style="<?= $data_pasien; ?>" class="  hover:bg-slate-900/10 rounded-md selection:bg-slate-100 text-white">
                    <a href="home.php?page=data_pasien">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital-fill" viewBox="0 0 16 16">
                            <path d="M6 0a1 1 0 0 0-1 1v1a1 1 0 0 0-1 1v4H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h6v-2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5V16h6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-3V3a1 1 0 0 0-1-1V1a1 1 0 0 0-1-1H6Zm2.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM2.25 9h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 9.75v-.5A.25.25 0 0 1 2.25 9Zm0 2h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5ZM13.25 9h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25Z" />
                        </svg>
                        Pasien
                    </a>
                </li>

                <li style="<?= $data_poli; ?>" class="  hover:bg-slate-900/10 rounded-md selection:bg-slate-100 text-white">
                    <a href="home.php?page=data_staff">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                            <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        Staff
                    </a>
                </li>
                <li style="<?= $data_obat; ?>" class="  hover:bg-slate-900/10 rounded-md selection:bg-slate-100 text-white">
                    <a href="home.php?page=data_obat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                        </svg>
                        Obat
                    </a>
                </li>
                <li style="<?= $data_transaksi; ?>" class="  hover:bg-slate-900/10 rounded-md selection:bg-slate-100 text-white">
                    <a href="home.php?page=data_transaksi">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                        </svg>
                        Transaksi
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