<?php 
    if (isset($_POST['sumber'])) {
        include '../../engine/koneksi.php';
        $db = new database();
        $sumber = $_POST['sumber'];

        $query = mysqli_query($db -> koneksi, "SELECT * FROM penyakit WHERE kode = '$sumber'");
        $data = mysqli_fetch_array($query);
        if($query) {
            $harga = $data['biaya'];
            return true;
        } else {
            return 'gagal';
        }
    }
?>