    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
    include '../../engine/koneksi.php';
    $db = new database();

    $aksi = $_GET['aksi'];
    if ($aksi == 'tambah') {
        $sumber_user = $_POST['sumber_user'];
        $data = explode("|", $sumber_user);
        $kode = $data[0];
        $nama = $data[1];
        $username = $_POST['username'];
        $pw = $_POST['password'];
        $password = md5($pw);
        $type = $_POST['type'];

        $today = date('Y-m-d H:i:s');
        $id_tgl = strtotime($today);

        // $kode = $type . $id_tgl;


        $db->tambah_user($kode, $nama, $username, $password, $type);
        header('Location: ../home.php?page=user_right&alert=tambah');
    } else if ($aksi == 'edit') {
        $data = $db->tampil_user_by_id($_GET['id']);
        $name = $_POST['nama'];
        $username = $_POST['username'];
        $pw = $_POST['password'];
        $type = $_POST['type'];
        $kode = $_POST['kode'];

        if ($type == 'D2') {
            mysqli_query($db -> koneksi, "UPDATE dokter SET nama = '$name' WHERE kode = '$kode'");
        } else if ($type == 'P3') {
            mysqli_query($db -> koneksi, "UPDATE pasien SET nama = '$name' WHERE kode = '$kode'");
        }else if($type == 'P0') {
            mysqli_query($db -> koneksi, "UPDATE staff SET nama = '$name' WHERE kode = '$kode'");
        }

        if ($data['password'] == $_POST['password']) {
            $password = $_POST['password'];
        } else {
            $password = md5($pw);
        }

        $update = $db->edit_user($_GET['id'], $name, $username, $password, $type);

        if ($update) {
            // echo "
            //     <script> 
            //         Swal.fire({
            //             icon: 'success',
            //             title: 'Berhasil...',
            //             text: 'Data berhasil di edit',
            //         })
            //     </script>
            // ";
            header('Location: ../home.php?page=user_right&alert=edit');

        }

    } else if ($aksi == 'hapus') {
        $db->hapus_user($_GET['id']);
        header('location: ../home.php?page=user_right');
    }
