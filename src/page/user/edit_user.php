<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['nama'];
    $type = $_POST['type'];
    if ($nama == '') {
        echo "
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'nama tidak boleh kosong!',
                    });
                </script>
            ";
    } else if ($username == '') {
        echo "
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'username tidak boleh kosong!',
                    });
                </script>
            ";
    } else if ($password == '') {
        echo "
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'password tidak boleh kosong!',
                    });
                </script>
            ";
    } else if ($type == '') {
        echo "
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'type user tidak boleh kosong!',
                    });
                </script>
            ";
    }
}

$data = $db -> tampil_user_by_id($_GET['id']);

?>
<center>
    <br>
    <div style="padding-bottom: 10px; ;">
        <h1 style="font-size: 50px;" class="font-bold">Edit Data User</h1>
    </div>
</center>
<div class="md:px-16 px-5">
    <div style="padding-bottom: 10px;">
        <a href="../page/home.php?page=user_right">
            <button style="border: 0;" class="btn btn-primary font-semibold bg-slate-300 hover:bg-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
                &nbsp;&nbsp;Back
            </button>
        </a>
    </div>
    <div>
        <div class=" shadow-2xl">
            <form action="user/proses.php?aksi=edit&id=<?=$_GET['id'] ?>" method="post">
                <div class="px-52 py-10 grid grid-cols-1 w-full">
                    <div class=" form-control w-full ">
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input value="<?= $data['nama']?>" type="text" placeholder="" name="nama" class="input input-bordered w-full" />
                        <input type="hidden" name="kode" id="kode" value="<?= $data['kode']; ?>">
                    </div>
                    <div class=" form-control w-full ">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input value="<?= $data['username']?>" type="text" placeholder="" name="username" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input value="<?= $data['password']?>" type="Password" placeholder="" name="password" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Type User</span>
                        </label>
                        <select class=" select w-full" name="type" id="types" required>
                            <option <?php if($data['type'] == 'A1') {echo 'selected';} ?> value="A1">SuperAdmin</option>
                            <option <?php if($data['type'] == 'D2') {echo 'selected';} ?> value="D2">Dokter</option>
                            <option <?php if($data['type'] == 'P3') {echo 'selected';} ?> value="P3">Pasien</option>
                            <option <?php if($data['type'] == 'P0') {echo 'selected';} ?> value="P0">Poli</option>
                        </select>
                    </div>
                    <div class="form-control w-full my-6 px-40">
                        <button type="submit" name="simpan" style="border: 0;" class="btn btn-primary bg-slate-300 hover:bg-teal-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
                                <path d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438V7.5zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438V7.5z" />
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                            </svg>
                            &nbsp;&nbsp; Simpan
                        </button>
                    </div>
                </div>
            </form>
            <label class="input-group input-group-md">

            </label>
        </div>
    </div>
</div>