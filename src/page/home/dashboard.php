<style>
    .logoku {
        background-image: url("../img/logo1.png");
        background-blend-mode: multiply;
        height: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 44%;
        opacity: 20%;
        z-index: -1;
        position: absolute;
        filter: blur(3px);
    }

    .animasiku {
        transition: transform 220ms ease-in-out;
    }

    .animasiku:hover {
        transform: scale(110%);
    }
</style>
<div id="logoku" class="py-10 px-10 logoku w-full md:px-16"></div>
<div class="py-10 px-10 w-full md:px-16"><br>
    <div class="grid grid-cols-1 justify-items-center w-full">
        <h1 class="text-5xl font-extrabold" style="font-family: 'bold-Poppins';">SELAMAT DATANG DI OVVO KLINIK</h1>
    </div>
    <br><br><br>
    <div class="grid md:grid-cols-4 grid-cols-2 w-full gap-y-5 justify-items-center ">
        <a href="home.php?page=user_right">
            <div class="card w-44 md:w-60 md:h-70 bg-base-100 shadow-xl animasiku">
                <figure><img width="800px" class="imgku" src="./home/img/admin.jpg" alt="Shoes" /></figure>
                <div class="card-body">
                    <h2 class="card-title justify-center">User</h2>
                    <p class="text-center">Data pengguna aplikasi OvvoKlinik</p>
                    <div class="card-actions justify-end">
                    </div>
                </div>
            </div>
        </a>
        <a href="home.php?page=data_dokter">
            <div class="card w-44 md:w-60 md:h-70 bg-base-100 shadow-xl animasiku">
                <figure><img src="./home/img/dokter.jpg" alt="Shoes" /></figure>
                <div class="card-body">
                    <h2 class="card-title justify-center">Dokter</h2>
                    <p class="text-center">Data semua dokter yang tersedia</p>
                    <div class="card-actions justify-end">
                    </div>
                </div>
            </div>
        </a>
        <a href="home.php?page=data_pasien">
            <div class="card w-44 md:w-60 md:h-70 bg-base-100 shadow-xl animasiku">
                <figure><img src="./home/img/pasien.jpg" alt="Shoes" /></figure>
                <div class="card-body">
                    <h2 class="card-title justify-center">Pasien</h2>
                    <p class="text-center">Data semua pasien yang sedang dirawat</p>
                    <div class="card-actions justify-end">
                    </div>
                </div>
            </div>
        </a>
        <a href="home.php?page=data_staff">
            <div class="card w-44 md:w-60 md:h-70 bg-base-100 shadow-xl animasiku">
                <figure><img src="./home/img/poli.jpg" alt="Shoes" /></figure>
                <div class="card-body">
                    <h2 class="card-title justify-center">Poli</h2>
                    <p class="text-center">Data poli administrasi pada OvvoKlinik</p>
                    <div class="card-actions justify-end">
                    </div>
                </div>
            </div>
        </a>

    </div>
</div>