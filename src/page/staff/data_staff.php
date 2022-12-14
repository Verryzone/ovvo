<?php
  $alert = isset($_GET['alert']);
  if($alert) {
    if ($_GET['alert'] == 'edit') {
      echo "
          <script> 
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil...',
                  text: 'Data berhasil di edit',
              })
          </script>
        ";
    } else if($_GET['alert'] == 'tambah') {
      echo "
          <script> 
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil...',
                  text: 'Data berhasil di ditambahkan',
              })
          </script>
        ";
    }
  }
?>

<center>
  <br>
  <div style="padding-bottom: 10px; ;">
    <h1 style="font-size: 50px;" class="font-bold">Data Staff</h1>
  </div>
</center>
<div class="md:px-16 px-5">
  <div style="padding-bottom: 10px;">
    <a href="home.php?page=tambah_staff">
      <button style="border: 0;" class="btn btn-primary font-semibold bg-slate-300 hover:bg-teal-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
          <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
        </svg>
        &nbsp;&nbsp;Tambah
      </button>
    </a>
  </div>
  <div class="shadow-2xl">
    <div class="overflow-x-auto">
      <table id="myTable" class="table table-compact w-full text-center">
        <thead>
          <tr>
            <th class="bg-green-200" style="text-align: center;">No</th>
            <th class="bg-green-200" style="text-align: center;">Kode</th>
            <th class="bg-green-200" style="text-align: center;">Nama</th>
            <th class="bg-green-200" style="text-align: center;">Alamat</th>
            <th class="bg-green-200" style="text-align: center;">Tempat Lahir</th>
            <th class="bg-green-200" style="text-align: center;">Tanggal Lahir</th>
            <th class="bg-green-200" style="text-align: center;">Jenis Kelamin</th>
            <th class="bg-green-200" style="text-align: center;">Agama</th>
            <th class="bg-green-200" style="text-align: center;">No. Telp</th>
            <th class="bg-green-200" style="text-align: center;">Status Nikah</th>
            <th class="bg-green-200" style="text-align: center;">Ket</th>
            <th class="bg-green-200" style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data = $db->tampil_staff();

          $no = 1;
          foreach ($data as $row) :

            $kel = $row['jenis_kelamin'];
            if($kel == 'L') {
                $kelamin = 'Laki-Laki';
            }else if($kel == 'P'){
                $kelamin = 'Perempuan';
            }
            // islam = 1
            // kristen = 2
            // katolik  = 3
            // hindu = 4
            // budha = 5
            // konghucu = 6

            $ag = $row['agama'];
            if($ag == '1') {
                $agama = 'Islam';
            }else if($ag == '2'){
                $agama = 'Kristen';
            }else if($ag == '3'){
                $agama = 'Katolik';
            }else if($ag == '4'){
                $agama = 'Hindu';
            }else if($ag == '5'){
                $agama = 'Budha';
            }else if($ag == '6'){
                $agama = 'Konghuchu';
            }

            $sn = $row['status_nikah'];
            if($sn == 'S') {
                $nikah = 'Sudah Menikah';
            } else if ($sn = 'B') {
                $nikah = "Belum Menikah";
            }
          ?>
            <tr>
              <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
              <th><?= $no++ ?></th>
              <td><?= $row['kode'] ?></td>
              <td><?= $row['nama'] ?></td>
              <td><?= $row['alamat'] ?></td>
              <td><?= $row['tempat_lahir'] ?></td>
              <td><?= $row['tgl_lahir'] ?></td>
              <td><?= $kelamin ?></td>
              <td><?= $agama ?></td>
              <td><?= $row['telp'] ?></td>
              <td><?= $nikah ?></td>
              <td><?= $row['ket'] ?></td>
              <td>
                <a class="btn" style="background:transparent ; color: black; border: 0; height: min-content;" href="../page/home.php?page=edit_staff&id=<?= $row['id']; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                  </svg>
                </a>
                <a class="btn tbl_hapus" style="background:transparent ; color: red; border: 0; height: min-content;" href="staff/proses.php?aksi=hapus&id=<?= $row['id']; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                    <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z" />
                  </svg>
                </a>
              </td>
            </tr>

          <?php
          endforeach;
          ?>

      </table>
    </div>
  </div>
</div>
<br><br>
<script>
  $('.tbl_hapus').on('click', function() {
    var getLink = $(this).attr('href');
    Swal.fire({
      title: "Yakin hapus data?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonColor: '#3085d6',
      cancelButtonText: "Batal"

    }).then(result => {
      //jika klik ya maka arahkan ke proses.php
      if (result.isConfirmed) {
        window.location.href = getLink
      }
    })
    return false;
  });
</script>