<?php
include "koneksi.php";
include "edit.php";
include "hapus.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-N2gzGJm2W9qS7Qf5yC3t2aa1TqTxlkU02xtpzjJ2hR9Ozx+7sTwPWVQOdUJo+6b7HYi+g0vpJpxOt86PwRcR1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 50px;
    }

    .jumbotron {
      background: linear-gradient(to right, #007bff, #0056b3);
      color: white;
      padding: 20px;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .card {
      margin-top: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-header {
      background-color: #007bff;
      color: white;
      border-bottom: none;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      padding: 10px 20px;
    }

    .card-title {
      margin-bottom: 0;
      font-size: 1.5rem;
    }

    .card-body {
      padding: 20px;
      background-color: #f8f9fa;
    }

    .table th,
    .table td {
      text-align: center;
      font-size: 1rem;
    }

    .btn-action {
      margin-right: 5px;
    }

    .btn-warning,
    .btn-danger {
      transition: background-color 0.3s ease-in-out;
    }

    .btn-warning:hover,
    .btn-danger:hover {
      background-color: #dc3545;
    }

    .modal-content {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
      background-color: #007bff;
      color: white;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      padding: 10px 20px;
    }

    .modal-title {
      font-size: 1.5rem;
    }

    .modal-body {
      padding: 20px;
    }

    .btn-primary,
    .btn-danger {
      width: 100%;
      margin-top: 10px;
    }

    .current-date {
      color: #6c757d;
      margin-top: 10px;
      font-size: 1.2rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="jumbotron">
      <h2>Data Mahasiswa Kelompok 3</h2>
      <p class="current-date" id="currentDate"></p>
    </div>
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Daftar Mahasiswa</h5>
      </div>
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-user-plus"></i> Tambah Data
        </button>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nim</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Asal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $qsiswa = mysqli_query($db_conn, "SELECT * FROM biodata");
            $i = 1;
            while ($data = mysqli_fetch_array($qsiswa)) {
              $nim = $data['nim'];
              $nama = $data['nama'];
              $kelas = $data['kelas'];
              $asal = $data['asal'];
            ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $nim; ?></td>
                <td><?= $nama; ?></td>
                <td><?= $kelas; ?></td>
                <td><?= $asal; ?></td>
                <td>
                  <button type="button" class="btn btn-primary btn-action" data-bs-toggle="modal" data-bs-target="#edit<?= $nim ?>">
                    <i class="fas fa-edit"></i> Edit
                  </button>
                  <button type="button" class="btn btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#hapus<?= $nim ?>">
                    <i class="fas fa-trash-alt"></i> Hapus
                  </button>
                </td>
              </tr>
        <!--Edit Modal -->
      <div class="modal fade" id="edit<?=$nim;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="edit">Edit Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post">
              <div class="modal-body">
              <input type="text" id="nim" name="nimb" value="<?=$nim;?>" class="form-control mb" required>
              <br>
              <input type="text" id="nama" name="nama" value="<?=$nama;?>" class="form-control" required>
              <br>
              <input type="text" id="kelas" name="kelas" value="<?=$kelas;?>" class="form-control" required>
              <br>
              <input type="text" id="asal" name="asal" value="<?=$asal;?>" class="form-control" required>
              <br>
              <br>
              <input type="hidden" name="niml" value="<?=$nim?>">
              <button type="submit" class="btn btn-primary" name="editdata">Edit</button>
              </div>
                  </form>
            </div>
          </div>
        </div>
      </div>


              <!-- Hapus Modal -->
        <div class="modal fade" id="hapus<?=$nim;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="hapus">Hapus Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="hapus.php" method="post">
              <div class="modal-body">
              Apakah anda yakin menghapus data <?=$nama;?>?
              <input type="hidden" name="nim" value="<?=$nim;?>">
              <br>
              <br>
              <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
              </div>
                  </form>
            </div>
          </div>
        </div>
      </div>


          <?php
            };
            ?>
      </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    document.getElementById('currentDate').innerText = new Date().toLocaleDateString('en-US', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  </script>
  </body>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="add.php">
              <div class="modal-body">
              <input type="text" id="nim" name="nim" placeholder="Nim" class="form-control mb" required>
              <br>
              <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control" required>
              <br>
              <input type="text" id="kelas" name="kelas" placeholder="Kelas" class="form-control" required>
              <br>
              <input type="text" id="asal" name="asal" placeholder="Asal" class="form-control" required>
              <br>
              <br>
              <button type="submit" name="tambah" class="btn btn-warning">Tambah</button>
              </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
</html>