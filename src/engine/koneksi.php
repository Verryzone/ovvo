<?php 

date_default_timezone_set('Asia/Jakarta');
    class database {
        var $host = 'localhost';
        var $username = 'root';
        var $password = '';
        var $db = 'ovvo';

        function __construct(){
            $this -> koneksi = mysqli_connect(
                $this -> host,
                $this -> username,
                $this -> password,
                $this -> db
            );
        }

        function update_last_login($id) {
         $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "UPDATE user_right SET last_login = '$today' WHERE id='$id'");
        }

        function login($username, $pw) {
            $password = md5($pw);
            // echo "<pre>";
            // var_dump($password);
            // die;
            $query = mysqli_query($this -> koneksi, "SELECT * FROM user_right WHERE username = '$username' AND password = '$password'");
            $data = $query -> fetch_array();
            $jml = $query -> num_rows;

            if($jml > 0) {
                // if($password == $data['password']) {
                    setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
                    setcookie('id', $data['id'], time() + (60 * 60 * 24 * 5), '/');
                    $_SESSION['username'] = $data['nama'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['type'] = $data['type'];
                    $_SESSION['is_login'] = true;

                    $this -> update_last_login($data['id']);
                    return true;
                // }
           } else {
               return false;
           }

           
        }

        function logout() {
            $_SESSION['is_login'] = false;
            session_start();
            session_unset();
            session_destroy();
            setcookie('username', '', 0, '/');
            setcookie('id', '', 0, '/');
            // session_destroy();
 
         }
            
         function ambil_id() {
            $query = mysqli_query($this -> koneksi, "SELECT MAX  FROM user_right");
            $data = mysqli_fetch_array($query);
         }

         function tampil_user() {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM user_right");
            while ($row = mysqli_fetch_array($query)){
                $data[] = $row;
            }
            return $data;
         }
         function tampil_dokter() {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM dokter");
            while ($row = mysqli_fetch_array($query)){
                $data[] = $row;
            }
            return $data;
         }

         function tampil_pasien() {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM pasien");
            while ($row = mysqli_fetch_array($query)){
                $data[] = $row;
            }
            return $data;
         }
         
         function tampil_obat() {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM obat");
            while ($row = mysqli_fetch_array($query)){
                $data[] = $row;
            }
            return $data;
         }

         function tampil_penyakit() {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM penyakit");
            while ($row = mysqli_fetch_array($query)){
                $data[] = $row;
            }
            return $data;
         }

         function tampil_staff() {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM staff");
            while ($row = mysqli_fetch_array($query)){
                $data[] = $row;
            }
            return $data;
         }

         function tampil_transaksi() {
            $query = mysqli_query($this -> koneksi, "SELECT transaksi.*, 
            pasien.kode AS kode_pasien, 
            pasien.nama AS nama_pasien, 
            dokter.kode AS kode_dokter, 
            dokter.nama AS nama_dokter, 
            sakit.kode AS kode_sakit, 
            sakit.nama AS nama_sakit, 
            sakit.biaya, 
            obat.nama AS nama_obat, 
            obat.kode AS kode_obat 
            FROM transaksi AS transaksi 
               LEFT JOIN pasien AS pasien ON (pasien.kode = transaksi.pasien)
               LEFT JOIN dokter AS dokter ON (dokter.kode = transaksi.dokter)
               LEFT JOIN penyakit AS sakit ON (sakit.kode = transaksi.penyakit)
               LEFT JOIN obat AS obat ON (obat.kode = transaksi.obat)
            ");
            while ($row = mysqli_fetch_array($query)){
                $data[] = $row;
            }
            return $data;
         }

         function tampil_dokter_by_name($name) {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM dokter WHERE nama LIKE '%" . $name . "%'");
            return $query;
         }
         function tampil_pasien_by_name($name) {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM pasien WHERE nama LIKE '%" . $name . "%'");
            return $query;
         }
         function tampil_poli_by_name($name) {
            $query = mysqli_query($this -> koneksi, "SELECT * FROM poli WHERE nama LIKE '%" . $name . "%'");
            return $query;
         }

         function tambah_user($kode, $nama, $username, $password, $type) {
            $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "INSERT INTO user_right (kode, nama, username, password, type, register) 
            VALUES ('$kode', '$nama', '$username', '$password', '$type', '$today')");

            return true;
         }

         function tambah_dokter($kode, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $no_izin) {
            // $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "INSERT INTO dokter (kode, nama, alamat, tempat_lahir, tgl_lahir, jenis_kelamin, agama, telp, status_nikah, no_izin) 
            VALUES ('$kode', '$nama', '$alamat', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$telp', '$status_nikah', '$no_izin')");

            return true;
         }

         function tambah_staff($kode, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $ket) {
            // $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "INSERT INTO staff (kode, nama, alamat, tempat_lahir, tgl_lahir, jenis_kelamin, agama, telp, status_nikah, ket) 
            VALUES ('$kode', '$nama', '$alamat', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$telp', '$status_nikah', '$ket')");

            return true;
         }

         function tambah_pasien($kode, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $pekerjaan, $tgl_daftar, $diagnosa, $alergi, $jenis_kunjungan) {
            mysqli_query($this -> koneksi, "INSERT INTO pasien (kode, nama, alamat, tempat_lahir, tgl_lahir, jenis_kelamin, agama, telp, status_nikah, pekerjaan, tgl_daftar, diagnosa_awal, alergi_obat, jenis_kunjungan) 
            VALUES ('$kode', '$nama', '$alamat', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$telp', '$status_nikah', '$pekerjaan', '$tgl_daftar', '$diagnosa', '$alergi', '$jenis_kunjungan')");

            return true;
         }

         function tambah_obat($kode, $nama, $stok, $tgl_exp, $harga) {
            // $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "INSERT INTO obat (kode, nama, stok, tgl_exp, harga) 
            VALUES ('$kode', '$nama', '$stok', '$tgl_exp', '$harga')");

            return true;
         }

         function tambah_penyakit($kode, $nama, $biaya) {
            // $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "INSERT INTO penyakit (kode, nama, biaya) 
            VALUES ('$kode', '$nama', '$biaya')");

            return true;
         }

         function tambah_transaksi($kode, $tgl_transaksi, $nama_pasien, $penyakit, $obat, $dokter, $total_harga, $dibayar, $kembalian, $tgl_bayar, $cara_bayar, $status) {
            // $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "INSERT INTO transaksi (kode, tgl_transaksi, pasien, penyakit, obat, dokter, total_harga, dibayar, kembali, tgl_bayar, cara_bayar, status) 
            VALUES ('$kode', '$tgl_transaksi', '$nama_pasien', '$penyakit', '$obat', '$dokter', '$total_harga', '$dibayar', '$kembalian', '$tgl_bayar', '$cara_bayar', '$status')");

            return true;
         }

         function tampil_user_by_id($id) {
            $kode = mysqli_query($this -> koneksi, "SELECT * FROM user_right WHERE id = '$id'");
            $data = mysqli_fetch_array($kode);

            return $data;
         }

         function tampil_dokter_by_id($id) {
            $kode = mysqli_query($this -> koneksi, "SELECT * FROM dokter WHERE id = '$id'");
            $data = mysqli_fetch_array($kode);

            return $data;
         }

         function tampil_pasien_by_id($id) {
            $kode = mysqli_query($this -> koneksi, "SELECT * FROM pasien WHERE id = '$id'");
            $data = mysqli_fetch_array($kode);

            return $data;
         }

         function tampil_staff_by_id($id) {
            $kode = mysqli_query($this -> koneksi, "SELECT * FROM staff WHERE id = '$id'");
            $data = mysqli_fetch_array($kode);

            return $data;
         }

         function tampil_obat_by_id($id) {
            $kode = mysqli_query($this -> koneksi, "SELECT * FROM obat WHERE id = '$id'");
            $data = mysqli_fetch_array($kode);

            return $data;
         }

         function tampil_penyakit_by_id($id) {
            $kode = mysqli_query($this -> koneksi, "SELECT * FROM penyakit WHERE id = '$id'");
            $data = mysqli_fetch_array($kode);

            return $data;
         }

         function tampil_transaksi_by_id($id) {
            $kode = mysqli_query($this -> koneksi, "SELECT * FROM transaksi WHERE id = '$id'");
            $data = mysqli_fetch_array($kode);

            return $data;
         }

         function hapus_user($id) {
            mysqli_query($this -> koneksi, "DELETE FROM user_right WHERE id = '$id'");
            return true;
         }

         function hapus_dokter($id) {
            mysqli_query($this -> koneksi, "DELETE FROM dokter WHERE id = '$id'");
            return true;
         }

         function hapus_pasien($id) {
            mysqli_query($this -> koneksi, "DELETE FROM pasien WHERE id = '$id'");
            return true;
         }

         function hapus_staff($id) {
            mysqli_query($this -> koneksi, "DELETE FROM staff WHERE id = '$id'");
            return true;
         }
         
         function hapus_obat($id) {
            mysqli_query($this -> koneksi, "DELETE FROM obat WHERE id = '$id'");
            return true;
         }

         function hapus_penyakit($id) {
            mysqli_query($this -> koneksi, "DELETE FROM penyakit WHERE id = '$id'");
            return true;
         }

         function hapus_transaksi($id) {
            mysqli_query($this -> koneksi, "DELETE FROM transaksi WHERE id = '$id'");
            return true;
         }

         function edit_user($id, $name, $username, $password, $type) {
            mysqli_query($this -> koneksi, "UPDATE user_right SET 
                nama = '$name',
                username = '$username',
                password = '$password',
                type = '$type'

                WHERE id='$id'
            ");
            return true;
         }

         function edit_dokter($id, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $no_izin) {
            mysqli_query($this -> koneksi, "UPDATE dokter SET 
                nama = '$nama',
                alamat = '$alamat',
                tempat_lahir = '$tempat_lahir',
                tgl_lahir = '$tgl_lahir',
                jenis_kelamin = '$jenis_kelamin',
                agama = '$agama',
                telp = '$telp',
                status_nikah = '$status_nikah',
                no_izin = '$no_izin'

                WHERE id='$id'
            ");
            return true;
         }

         function edit_staff($id, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $ket) {
            mysqli_query($this -> koneksi, "UPDATE staff SET 
                nama = '$nama',
                alamat = '$alamat',
                tempat_lahir = '$tempat_lahir',
                tgl_lahir = '$tgl_lahir',
                jenis_kelamin = '$jenis_kelamin',
                agama = '$agama',
                telp = '$telp',
                status_nikah = '$status_nikah',
                ket = '$ket'

                WHERE id='$id'
            ");
            return true;
         }

         function edit_pasien($id, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $pekerjaan, $tgl_daftar, $diagnosa, $alergi, $jenis_kunjungan) {
            mysqli_query($this -> koneksi, "UPDATE pasien SET 
                nama = '$nama',
                alamat = '$alamat',
                tempat_lahir = '$tempat_lahir',
                tgl_lahir = '$tgl_lahir',
                jenis_kelamin = '$jenis_kelamin',
                agama = '$agama',
                telp = '$telp',
                status_nikah = '$status_nikah',
                pekerjaan = '$pekerjaan',
                tgl_daftar = '$tgl_daftar',
                diagnosa_awal = '$diagnosa',
                alergi_obat = '$alergi',
                jenis_kunjungan = '$jenis_kunjungan'

                WHERE id='$id'
            ");
            return true;
         }
         
         function edit_transaksi($id, $tgl_transaksi, $nama_pasien, $penyakit, $obat, $dokter, $total_harga, $dibayar, $kembalian, $tgl_bayar, $cara_bayar, $status) {
            mysqli_query($this -> koneksi, "UPDATE transaksi SET 
                tgl_transaksi = '$tgl_transaksi',
                pasien = '$nama_pasien',
                penyakit = '$penyakit',
                obat = '$obat',
                dokter = '$dokter',
                total_harga = '$total_harga',
                dibayar = '$dibayar',
                kembali = '$kembalian',
                tgl_bayar = '$tgl_bayar',
                cara_bayar = '$cara_bayar',
                status = '$status'

                WHERE id='$id'
            ");
            return true;
         }
         
         function edit_obat($id, $nama, $stok, $tgl_exp, $harga) {
            mysqli_query($this -> koneksi, "UPDATE obat SET 
                nama = '$nama',
                stok = '$stok',
                harga = '$harga',
                tgl_exp = '$tgl_exp'

                WHERE id='$id'
            ");
            return true;
         }

         function edit_penyakit($id, $nama, $biaya) {
            mysqli_query($this -> koneksi, "UPDATE penyakit SET 
                nama = '$nama',
                biaya = '$biaya'

                WHERE id='$id'
            ");
            return true;
         }
    }
