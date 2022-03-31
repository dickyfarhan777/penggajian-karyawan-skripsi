<?php
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $gaji = $_POST['gaji'];
  $tunjangan = $_POST['tunjangan'];

  $query = "INSERT INTO jabatan VALUES('','$nama', '$gaji', '$tunjangan')";
  mysqli_query($koneksi, $query);
  echo "<script>alert('Data berhasil ditambahkan')</script>";
  echo "<script>location='index.php?data_jabatan'</script>";
}
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Jabatan</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary float-left" data-toggle="modal" data-target="#exampleModal">
          Tambah Data
        </button>
        <a target="_blank" href="index.php?print_jabatan" class="btn btn-outline-primary float-right mb-3"> Print </a>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered text-center" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Jabatan</th>
                  <th>Gaji Pokok</th>
                  <th>Tunjangan Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php $query = mysqli_query($koneksi, "SELECT * FROM jabatan"); ?>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_jabatan'] ?></td>
                    <td>Rp. <?= number_format($row['gaji_pokok']) ?></td>
                    <td>Rp. <?= number_format($row['tunjangan_jabatan']) ?></td>
                    <td>
                      <a href="index.php?ubah_jabatan&id=<?= $row['id_jabatan'] ?>" class="btn btn-outline-warning">Ubah</a>
                      <a href="index.php?hapus_jabatan&id=<?= $row['id_jabatan'] ?>" class="btn btn-outline-danger">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Jabatan</label>
            <input type="text" name="nama" class="form-control" id="nama">
          </div>
          <div class="form-group">
            <label for="gaji">Gaji Pokok</label>
            <input type="number" name="gaji" class="form-control" id="gaji">
          </div>
          <div class="form-group">
            <label for="tunjangan">Tunjangan Jabatan</label>
            <input type="number" name="tunjangan" class="form-control" id="tunjangan">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>