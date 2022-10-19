<!DOCTYPE html>
<html lang="en" data-theme="emerald">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Home</title>
</head>

<body>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <label for="my-drawer" style="border: 0px;" class=" btn text-teal-600 font-bold hover:text-white hover:bg-teal-600 bg-transparent drawer-button">| | |</label>
            <a class="btn btn-ghost normal-case text-xl">OvvoKlinik</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal p-0">
                <li tabindex="0">
                    <a>
                        Administrator
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="p-2 bg-base-100">
                        <li><a>My Profile</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
        </div>
        <div class="drawer-side">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 text-base-content ">
                <!-- Sidebar content here -->
                <div class="justify-center text-center">
                    <img style="width: 100px;" src="../img/logo1.png" alt="ovvo-klinik">
                </div>

                <li class="hover:bg-teal-500 rounded-md selection:bg-slate-100 ">
                    <a>Home</a>
                </li>
                <li class="hover:bg-teal-500 rounded-md selection:bg-slate-100 ">
                    <a>User Right</a>
                </li>


            </ul>
        </div>
    </div>
</body>

</html>