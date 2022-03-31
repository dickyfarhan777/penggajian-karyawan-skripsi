<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $alamat_pegawai = $_POST['alamat_pegawai'];
    $telepon_pegawai = $_POST['telepon_pegawai'];
    $status_pegawai = $_POST['status_pegawai'];

    $query = "UPDATE pegawai SET nama_pegawai = '$nama_pegawai', alamat_pegawai = '$alamat_pegawai', telepon_pegawai = '$telepon_pegawai', status_pegawai = '$status_pegawai' WHERE id_pegawai = '$id'";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil diubah')</script>";
    echo "<script>location='index.php?data_pegawai'</script>";
}
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '$id'");
$data = mysqli_fetch_assoc($query);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Ubah Data Karyawan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_pegawai">Nama Karyawan</label>
                                <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" value="<?= $data['nama_pegawai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat_pegawai">Alamat Karyawan</label>
                                <textarea name="alamat_pegawai" id="alamat_pegawai" class="form-control"><?= $data['alamat_pegawai'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="telepon_pegawai">Telepon Karyawan</label>
                                <input type="number" name="telepon_pegawai" class="form-control" id="telepon_pegawai" value="<?= $data['telepon_pegawai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="status_pegawai">Status Karyawan</label>
                                <select name="status_pegawai" id="status_pegawai" class="form-control">
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>