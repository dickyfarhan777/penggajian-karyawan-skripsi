<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $telpon_pegawai = $_POST['telpon_pegawai'];
    $deskrpsi = $_POST['deskrpsi'];

    $query = "INSERT INTO komplain VALUES('','$nama_pegawai','$telpon_pegawai','$deskrpsi')";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>location='index.php?data_laporan'</script>";
}
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '$id'");
$data = mysqli_fetch_assoc($query);
?>
<html>
<head>
    <title>Slip Gaji</title>
</head>

<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Complain</h1>
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
                                <label for="telpon_pegawai">Telepon Karyawan</label>
                                <input type="number" name="telpon_pegawai" class="form-control" id="telpon_pegawai" value="<?= $data['telpon_pegawai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskrpsi">Deskripsi</label>
                                <textarea name="deskrpsi" id="deskrpsi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <a href="index.php?data_laporan" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

</html>