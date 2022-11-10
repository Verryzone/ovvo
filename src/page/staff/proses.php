<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
    include '../../engine/koneksi.php';
    $db = new database();

    $aksi = $_GET['aksi'];
    if ($aksi == 'tambah') {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $telp = $_POST['telp'];
        $status_nikah = $_POST['status_nikah'];
        $ket = $_POST['ket'];


        // $pw = $_POST['password'];
        // $password = md5($pw);
        // $type = $_POST['type'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);

        $kode = "P0" . $id_tgl;


        $tambah = $db->tambah_staff($kode, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $ket);
        if($tambah) {
            header('Location: ../home.php?page=data_staff&alert=tambah');
        }
    } else if ($aksi == 'edit') {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $telp = $_POST['telp'];
        $status_nikah = $_POST['status_nikah'];
        $ket = $_POST['ket'];

        $update = $db->edit_staff($_GET['id'], $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $ket);

        if ($update) {
            header('Location: ../home.php?page=data_staff&alert=edit');

        }

    } else if ($aksi == 'hapus') {
        $db->hapus_staff($_GET['id']);
        header('location: ../home.php?page=data_staff');
    }
