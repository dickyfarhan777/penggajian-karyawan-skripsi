<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Data Complain Karyawan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <!-- Button trigger modal -->
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nama Karyawan</th>
                                    <th>Telepon Karyawan</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $query = mysqli_query($koneksi, "SELECT * FROM komplain"); ?>
                                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?= $row['id_komplain'] ?></td>
                                        <td><?= $row['nama_pegawai'] ?></td>
                                        <td><?= $row['telpon_pegawai'] ?></td>
                                        <td><?= $row['deskrpsi'] ?></td>
                                        <td>
                                            <a href="index.php?selesai_complain&id=<?= $row['id_komplain'] ?>" class="btn btn-outline-primary">Selesai</a>
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