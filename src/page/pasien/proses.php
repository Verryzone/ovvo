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
        $pekerjaan = $_POST['pekerjaan'];
        $tgl_daftar = $_POST['tgl_daftar'];
        $diagnosa = $_POST['diagnosa'];
        $alergi = $_POST['alergi'];
        $jenis_kunjungan = $_POST['jenis_kunjungan'];


        // $pw = $_POST['password'];
        // $password = md5($pw);
        // $type = $_POST['type'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);

        $kode = "P3" . $id_tgl;

        $tambah = $db->tambah_pasien($kode, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $pekerjaan, $tgl_daftar, $diagnosa, $alergi, $jenis_kunjungan);

        if($tambah) {
            header('Location: ../home.php?page=data_pasien&alert=tambah');
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
        $pekerjaan = $_POST['pekerjaan'];
        $tgl_daftar = $_POST['tgl_daftar'];
        $diagnosa = $_POST['diagnosa'];
        $alergi = $_POST['alergi'];
        $jenis_kunjungan = $_POST['jenis_kunjungan'];

        $update = $db->edit_pasien($_GET['id'], $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $pekerjaan, $tgl_daftar, $diagnosa, $alergi, $jenis_kunjungan);

        if ($update) {
            header('Location: ../home.php?page=data_pasien&alert=edit');

        }

    } else if ($aksi == 'hapus') {
        $db->hapus_pasien($_GET['id']);
        header('location: ../home.php?page=data_pasien');
    }
