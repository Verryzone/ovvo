<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
    include '../../engine/koneksi.php';
    $db = new database();

    $aksi = $_GET['aksi'];
    if ($aksi == 'tambah') {
        $nama = $_POST['nama'];
        $biaya = $_POST['biaya'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);

        $kode = "PYKT" . $id_tgl;


        $tambah = $db->tambah_penyakit($kode, $nama, $biaya);
        if($tambah) {
            header('Location: ../home.php?page=data_penyakit&alert=tambah');
        }
    } else if ($aksi == 'edit') {
        $nama = $_POST['nama'];
        $biaya = $_POST['biaya'];

        $update = $db->edit_penyakit($_GET['id'], $nama, $biaya);

        if ($update) {
            header('Location: ../home.php?page=data_penyakit&alert=edit');

        }

    } else if ($aksi == 'hapus') {
        $db->hapus_penyakit($_GET['id']);
        header('location: ../home.php?page=data_penyakit');
    }
