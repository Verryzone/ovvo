<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
    include '../../engine/koneksi.php';
    $db = new database();

    $aksi = $_GET['aksi'];
    if ($aksi == 'tambah') {
        $nama = $_POST['nama'];
        $stok = $_POST['stok'];
        $tgl_exp = $_POST['tgl_exp'];
        $harga = $_POST['harga'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);

        $kode = "OB" . $id_tgl;


        $tambah = $db->tambah_obat($kode, $nama, $stok, $tgl_exp, $harga);
        if($tambah) {
            header('Location: ../home.php?page=data_obat&alert=tambah');
        }
    } else if ($aksi == 'edit') {
        $nama = $_POST['nama'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $tgl_exp = $_POST['tgl_exp'];

        $update = $db->edit_obat($_GET['id'], $nama, $stok, $tgl_exp, $harga);

        if ($update) {
            header('Location: ../home.php?page=data_obat&alert=edit');

        }

    } else if ($aksi == 'hapus') {
        $db->hapus_obat($_GET['id']);
        header('location: ../home.php?page=data_obat');
    }
