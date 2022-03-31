<?php
$id = $_GET['id'];
$query = "DELETE FROM laporan_gaji WHERE id_laporan = '$id'";
mysqli_query($koneksi, $query);

echo "<script>alert('Data berhasil hapus')</script>";
echo "<script>location='index.php?laporan_pegawai'</script>";
