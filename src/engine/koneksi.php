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

         function tambah_pasien($kode, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $telp, $status_nikah, $pekerjaan, $tgl_daftar, $diagnosa, $alergi, $jenis_kunjungan) {
            // $today = date("Y-m-d H:i:s");
            mysqli_query($this -> koneksi, "INSERT INTO pasien (kode, nama, alamat, tempat_lahir, tgl_lahir, jenis_kelamin, agama, telp, status_nikah, pekerjaan, tgl_daftar, diagnosa_awal, alergi_obat, jenis_kunjungan) 
            VALUES ('$kode', '$nama', '$alamat', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$telp', '$status_nikah', '$pekerjaan', '$tgl_daftar', '$diagnosa', '$alergi', '$jenis_kunjungan')");

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
    }
