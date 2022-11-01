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
        $no_izin = $_POST['no_izin'];


        // $pw = $_POST['password'];
        // $password = md5($pw);
        // $type = $_POST['type'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);

        $kode = "D2" . $id_tgl;


        $tambah = $db->tambah_dokter($kode, $nama, $alamat, $tempat_lahir, $tgl_lahir, $agama, $telp, $status_nikah, $no_izin);
        if($tambah) {
            header('Location: ../home.php?page=data_dokter&alert=tambah');
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
        $no_izin = $_POST['no_izin'];

        $update = $db->edit_dokter($_GET['id'], $nama, $alamat, $tempat_lahir, $tgl_lahir, $agama, $telp, $status_nikah, $no_izin);

        if ($update) {
            header('Location: ../home.php?page=data_dokter&alert=edit');

        }

    } else if ($aksi == 'hapus') {
        $db->hapus_dokter($_GET['id']);
        header('location: ../home.php?page=data_dokter');
    }
