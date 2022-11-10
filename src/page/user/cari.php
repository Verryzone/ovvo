<?php

if (isset($_POST['cari'])) {
    include '../../engine/koneksi.php';
    $db = new database();
    $sumber = $_POST['sumber'];
    $cari = $_POST['cari'];

    if ($sumber == 'dokter' || $sumber == 'pasien' || $sumber == 'poli') {
        if ($sumber == 'dokter') {
            $data = $db->tampil_dokter_by_name($cari);
        } else if ($sumber == 'pasien') {
            $data = $db->tampil_pasien_by_name($cari);
        } else if ($sumber == 'poli') {
            $data = $db->tampil_poli_by_name($cari);
        }
?>
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Nama User</span>
            </label>
            <select id="sumber_user" name="sumber_user" class="select w-full" name="type" id="types" required>
                <?php
                while ($row = mysqli_fetch_array($data)) {
                ?>
                    <option value="<?= $row['kode'] . '|' . $row['nama'] ?>"><?= $row['nama'] . " - " . $row['kode']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    <?php
    } else if ($sumber == 'admin') {
    ?>
        <div class=" form-control w-full ">
            <label class="label">
                <span class="label-text">Nama User</span>
            </label>
            <input type="text" placeholder="" id="sumber_user" name="sumber_user" class="input input-bordered w-full" required />
        </div>
    <?php
    }
    ?>



<?php
}
?>