<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji'];
    $tunjangan = $_POST['tunjangan'];

    $query = "UPDATE jabatan SET nama_jabatan = '$nama', gaji_pokok = '$gaji', tunjangan_jabatan = '$tunjangan' WHERE id_jabatan = '$id'";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil diubah')</script>";
    echo "<script>location='index.php?data_jabatan'</script>";
}
$query = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id_jabatan = '$id'");
$data = mysqli_fetch_assoc($query);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Ubah Data Jabatan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama Jabatan</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $data['nama_jabatan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="gaji">Gaji Pokok</label>
                                <input type="number" name="gaji" class="form-control" id="gaji" value="<?= $data['gaji_pokok'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="tunjangan">Tunjangan Jabatan</label>
                                <input type="number" name="tunjangan" class="form-control" id="tunjangan" value="<?= $data['tunjangan_jabatan'] ?>">
                            </div>
                        </div>
                        <div class="form-group float-right">
                        <a href="index.php?data_jabatan" class="btn btn-secondary" onclick ="return confirm('Yakin ubah data dibatalkan?');">Batal</a> </td>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>