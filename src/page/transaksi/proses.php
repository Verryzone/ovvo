<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
    include '../../engine/koneksi.php';
    $db = new database();

    $aksi = $_GET['aksi'];
    if ($aksi == 'tambah') {
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $nama_pasien = $_POST['nama_pasien'];
        $penyakit = $_POST['penyakit'];
        $dokter = $_POST['dokter'];

        $obat = $_POST['obat'];
        $data_obat = mysqli_query($db -> koneksi, "SELECT harga FROM penyakit WHERE kode = '$penyakit'");
        $harga_obat = mysqli_fetch_array($harga_obat);
        $biaya_obat = $harga_obat['harga'];

        $data_harga = mysqli_query($db -> koneksi, "SELECT biaya FROM penyakit WHERE kode = '$penyakit'");
        $harga = mysqli_fetch_array($data_harga);
        $total_harga = $harga['biaya'] + $biaya_obat;

        $dibayar = $_POST['dibayar'];
        $kembalian = $total_harga - $dibayar;

        $cara_bayar = $_POST['cara_bayar'];
        $status = $_POST['status'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);
        $kode = "TR" . $id_tgl;

        if ($status == '1') {
            $tgl_bayar = $today;
        } else {
            $tgl_bayar = '-';
        }

        $tambah = $db->tambah_transaksi($kode, $tgl_transaksi, $nama_pasien, $penyakit, $obat, $dokter, $total_harga, $dibayar, $kembalian, $tgl_bayar, $cara_bayar, $status);
        if($tambah) {
            header('Location: ../home.php?page=data_transaksi&alert=tambah');
        }
    } else if ($aksi == 'edit') {
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $nama_pasien = $_POST['nama_pasien'];
        $penyakit = $_POST['penyakit'];
        $dokter = $_POST['dokter'];

        $obat = $_POST['obat'];
        $data_obat = mysqli_query($db -> koneksi, "SELECT harga FROM penyakit WHERE kode = '$penyakit'");
        $harga_obat = mysqli_fetch_array($harga_obat);
        $biaya_obat = $harga_obat['harga'];

        $data_harga = mysqli_query($db -> koneksi, "SELECT biaya FROM penyakit WHERE kode = '$penyakit'");
        $harga = mysqli_fetch_array($data_harga);
        $total_harga = $harga['biaya'] + $biaya_obat;
        
        $dibayar = $_POST['dibayar'];
        $kembalian = $total_harga - $dibayar;

        $cara_bayar = $_POST['cara_bayar'];
        $status = $_POST['status'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);
        $kode = "TR" . $id_tgl;

        if ($status == '1') {
            $tgl_bayar = $today;
        } else {
            $tgl_bayar = '-';
        }


        $update = $db->edit_transaksi($_GET['id'], $tgl_transaksi, $nama_pasien, $penyakit, $obat, $dokter, $total_harga, $dibayar, $kembalian, $tgl_bayar, $cara_bayar, $status);

        if ($update) {
            header('Location: ../home.php?page=data_transaksi&alert=edit');

        }

    } else if ($aksi == 'hapus') {
        $db->hapus_transaksi($_GET['id']);
        header('location: ../home.php?page=data_transaksi');
    }
