<?php
if (isset($_POST['submit'])) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $alamat_pegawai = $_POST['alamat_pegawai'];
    $tlp_pegawai = $_POST['tlp_pegawai'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO pegawai VALUES('','$nama_pegawai', '$alamat_pegawai', '$tlp_pegawai', '$status', '$username', '$password')";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>location='index.php?data_pegawai'</script>";
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Data Karyawan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary float-left" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
                <a target="_blank" href="index.php?print" class="btn btn-outline-primary float-right mb-3"> Print </a>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Alamat Karyawan</th>
                                    <th>Telepon Karyawan</th>
                                    <th>status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $query = mysqli_query($koneksi, "SELECT * FROM pegawai"); ?>
                                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_pegawai'] ?></td>
                                        <td><?= $row['alamat_pegawai'] ?></td>
                                        <td><?= $row['telepon_pegawai'] ?></td>
                                        <td><?= $row['status_pegawai'] ?></td>
                                        <td>
                                            <a href="index.php?ubah_pegawai&id=<?= $row['id_pegawai'] ?>" class="btn btn-outline-warning">Ubah</a>
                                            <a href="index.php?hapus_pegawai&id=<?= $row['id_pegawai'] ?>" class="btn btn-outline-danger">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Karyawan</label>
                        <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai">
                    </div>
                    <div class="form-group">
                        <label for="username">Username Karyawan</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Karyawan</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="alamat_pegawai">Alamat Karyawan</label>
                        <textarea name="alamat_pegawai" class="form-control" id="alamat_pegawai"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tlp_pegawai">Telepon Karyawan</label>
                        <input type="tlp_pegawai" name="tlp_pegawai" class="form-control" id="tlp_pegawai">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Sudah Menikah">Sudah Menikah</option>
                        </select>
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