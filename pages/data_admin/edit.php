<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_akses = $_POST['role_akses'];

    $query = "UPDATE login SET username = '$username', password = '$password', role_akses = '$role_akses' WHERE id_login = '$id'";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>location='index.php?data_laporan'</script>";
}
    $query = mysqli_query($koneksi, "SELECT * FROM login WHERE id_login = '$id'");
    $data = mysqli_fetch_assoc($query);

?>
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
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?= $data['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" id="password" value="<?= $data['password'] ?>">
                            </div>
                                <input type="hidden" name="role_akses" id="role_akses" class="form-control" value="1">
                        </div>
                        <div class="form-group float-right">
                        <a href="index.php?data_admin" class="btn btn-secondary" onclick ="return confirm('Yakin ubah data dibatalkan?');">Batal</a> </td>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>