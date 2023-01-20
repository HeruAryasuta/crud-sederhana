<?php
include "koneksi.php";
include "edit.php";
include "hapus.php"
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron mt-5">
        <div class="card p-3">
          <h2>Data Mahasiswa Kelompok 3</h2>
        </div>
        <div class="card">
          <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah Data
            </button>
          </div>
          <table class="table table-bordered " cellspacing="0">
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
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM biodata");
      $i = 1;
				while($data = mysqli_fetch_array($qsiswa)){
                    $nim = $data['nim'];
                    $nama = $data['nama'];
                    $kelas = $data['kelas'];
                    $asal =  $data['asal'];
			?>
        <tr>
                <td><?=$i++;?></td>
                <td><?=$nim;?></td>
                <td><?=$nama;?></td>
                <td><?=$kelas;?></td>
                <td><?=$asal;?></td>
                <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?=$nim;?>">
                Edit
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?=$nim;?>">
                Hapus
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