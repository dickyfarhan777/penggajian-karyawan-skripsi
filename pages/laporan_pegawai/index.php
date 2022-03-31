<?php
if (isset($_POST['submit'])) {
    $jabatan_id = $_POST['jabatan_id'];
    $pegawai_id = $_POST['pegawai_id'];
    $total_masuk = $_POST['total_masuk'];
    $date = date('Y-m-d');

    $query = "INSERT INTO laporan_gaji VALUES('','$jabatan_id', '$pegawai_id', '$total_masuk', '$date')";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>location='index.php?data_laporan'</script>";
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Laporan Karyawan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <?php if (isset($_SESSION['login']['role_akses'])) { ?>
                    <button type="button" class="btn btn-outline-primary float-left mb-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>
                <?php } ?>


                <?php if (isset($_SESSION['login']['role_akses'])) { ?>
                    <a target="_blank" href="index.php?laporan_gaji1" class="btn btn-outline-primary float-right mb-3"> Print  </a>
                <?php } else {  
                    $id_pegawai = $_SESSION['login']['id_pegawai']; ?>
                    <a target="_blank" href="index.php?laporan_gaji&id=<?= $id_pegawai['pegawai_id'] ?>" class="btn btn-outline-primary float-right mb-3"> Print  </a>

                <?php } ?>



                       

                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="sampleTable">
                            <thead>

                                 <?php $no = 1 ?>
                                
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan Karyawan</th>
                                    <th>Total Masuk</th>
                                    <th>Gaji Bersih</th>
                                    <th>PPH</th>
                                    <th>Jamsostek</th>
                                    <th>Total Gaji</th>
                                    <th>Tanggal Laporan</th>
                                    <th>Slip Gaji</th>
                                    <?php
                                             if (isset($_SESSION['login']['role_akses'])) { ?>
                                                <th>Hapus</th>
                                            <?php }
                                            else {?>
                                            <?php } ?>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['login']['role_akses'])) {
                                    $query = mysqli_query($koneksi, "SELECT laporan_gaji.id_laporan, laporan_gaji.total_masuk, laporan_gaji.tanggal_laporan, jabatan.*, pegawai.nama_pegawai FROM laporan_gaji JOIN jabatan ON jabatan.id_jabatan = laporan_gaji.jabatan_id JOIN pegawai ON pegawai.id_pegawai = laporan_gaji.pegawai_id");
                                } else {
                                    $id_pegawai = $_SESSION['login']['id_pegawai'];
                                    $query = mysqli_query($koneksi, "SELECT laporan_gaji.id_laporan, laporan_gaji.total_masuk, laporan_gaji.tanggal_laporan, jabatan.*, pegawai.nama_pegawai FROM laporan_gaji JOIN jabatan ON jabatan.id_jabatan = laporan_gaji.jabatan_id JOIN pegawai ON pegawai.id_pegawai = laporan_gaji.pegawai_id WHERE pegawai_id = '$id_pegawai'");
                                }

                                ?>
                               <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>

                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_pegawai'] ?></td>
                                        <td><?= $row['nama_jabatan'] ?></td>
                                        <td><?= $row['total_masuk'] ?></td>
                                        <td>Rp. <?= number_format(getTotalGaji($row['total_masuk'], $row['gaji_pokok'], $row['tunjangan_jabatan'])) ?></td>
                                        <td>Rp. <?= number_format(getPajak($row['total_masuk'], $row['gaji_pokok'], $row['tunjangan_jabatan'])) ?></td>
                                        <td>Rp. 141.000</td>
                                        <td>Rp. <?= number_format(getTotal($row['total_masuk'], $row['gaji_pokok'], $row['tunjangan_jabatan'])) ?></td>
                                        <td><?= $row['tanggal_laporan'] ?></td>
                                        <td>
                                            <a target="_blank" href="index.php?slip_gaji&id=<?= $row['id_laporan'] ?>" class="btn btn-outline-warning">Print</a>
                                        </td>
                                        <td>
                                            <?php
                                             if (isset($_SESSION['login']['role_akses'])) { ?>
                                                <a href="index.php?hapus_laporan&id=<?= $row['id_laporan'] ?>" class="btn btn-outline-danger">Hapus</a>
                                            <?php }
                                            else {?>
                                            <?php } ?>
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
                        <label for="jabatan_id">Jabatan Karyawan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control">
                            <?php $query = mysqli_query($koneksi, "SELECT * FROM jabatan") ?>
                            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                <option value="<?= $row['id_jabatan'] ?>"><?= $row['nama_jabatan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pegawai_id">Nama Karyawan</label>
                        <select name="pegawai_id" id="pegawai_id" class="form-control">
                            <?php $query = mysqli_query($koneksi, "SELECT * FROM pegawai") ?>
                            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                <option value="<?= $row['id_pegawai'] ?>"><?= $row['nama_pegawai'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_masuk">Total Karyawan Masuk</label>
                        <input type="total_masuk" name="total_masuk" class="form-control" id="total_masuk">
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