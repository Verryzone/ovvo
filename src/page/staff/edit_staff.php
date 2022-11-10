<?php 
    $data = $db -> tampil_staff_by_id($_GET['id']);

?>
<center>
    <br>
    <div style="padding-bottom: 10px; ;">
        <h1 style="font-size: 50px;" class="font-bold">Edit Data Staff</h1>
    </div>
</center>
<div class="md:px-16 px-5">
    <div style="padding-bottom: 10px;">
        <a href="../page/home.php?page=data_staff">
            <button style="border: 0;" class="btn btn-primary font-semibold bg-slate-300 hover:bg-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
                &nbsp;&nbsp;Back
            </button>
        </a>
    </div>
    <div>
        <div class="shadow-2xl">
            <div class="px-10 py-10">
                <form action="staff/proses.php?aksi=edit&id=<?= $_GET['id']; ?>" method="post">
                    <div class="gap-0 grid justify-items-center w-full md:grid-cols-2 gap-x-10 grid-cols-1">
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Nama</span>
                            </label>
                            <input value="<?= $data['nama']; ?>" name="nama" type="text" placeholder="" class="input input-bordered w-full max-w-xl" required/>
                        </div>
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Alamat</span>
                            </label>
                            <input value="<?= $data['alamat']; ?>" name="alamat" type="text" placeholder="" class="input input-bordered w-full max-w-xl" required/>
                        </div>
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Tempat Lahir</span>
                            </label>
                            <input value="<?= $data['tempat_lahir']; ?>" name="tempat_lahir" type="text" placeholder="" class="input input-bordered w-full max-w-xl" required/>
                        </div>
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Tanggal Lahir</span>
                            </label>
                            <input value="<?= $data['tgl_lahir']; ?>" name="tgl_lahir" type="date" placeholder="" class="input input-bordered w-full max-w-xl" required/>
                        </div>
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Jenis Kelamin</span>
                            </label>
                            <select value="<?= $data['jenis_kelamin']; ?>" name="jenis_kelamin" class="select w-full" name="type" id="types" required>
                                <option <?php if($data['jenis_kelamin'] == 'L') {echo 'selected';} ?> value="L">Laki-Laki</option>
                                <option <?php if($data['jenis_kelamin'] == 'P') {echo 'selected';} ?> value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Agama</span>
                            </label>
                            <select name="agama" class="select w-full" required>
                                <option <?php if($data['agama'] == '1') {echo 'selected';} ?> value="1">Islam</option>
                                <option <?php if($data['agama'] == '2') {echo 'selected';} ?> value="2">Kristen</option>
                                <option <?php if($data['agama'] == '3') {echo 'selected';} ?> value="3">Katholik</option>
                                <option <?php if($data['agama'] == '4') {echo 'selected';} ?> value="4">Hindu</option>
                                <option <?php if($data['agama'] == '5') {echo 'selected';} ?> value="5">Budha</option>
                                <option <?php if($data['agama'] == '6') {echo 'selected';} ?> value="6">Konghuchu</option>
                            </select>
                        </div>
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">No. Telp</span>
                            </label>
                            <input value="<?= $data['telp']; ?>" name="telp" type="text" placeholder="" class="input input-bordered w-full max-w-xl" required/>
                        </div>
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Status Nikah</span>
                            </label>
                            <select name="status_nikah" class="select w-full" required>
                                <option <?php if($data['status_nikah'] == 'S') {echo 'selected';} ?> value="S">Sudah Menikah</option>
                                <option <?php if($data['status_nikah'] == 'B') {echo 'selected';} ?> value="B">Belum Menikah</option>
                            </select>
                        </div>

                    </div>
                    <div class="px-10 py-10 grid justify-items-center w-full gap-x-10 grid-cols-1">
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text">Ket</span>
                            </label>
                            <input value="<?= $data['ket']; ?>" name="ket" type="text" placeholder="" class="input input-bordered w-full max-w-xl" />
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
            </div>
        </div>
    </div>
</div>
<br><br>