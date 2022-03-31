<?php
$id = $_GET['id'];
$query = "DELETE FROM pegawai WHERE id_pegawai = '$id'";
mysqli_query($koneksi, $query);

echo "<script>alert('Data berhasil hapus')</script>";
echo "<script>location='index.php?data_pegawai'</script>";
