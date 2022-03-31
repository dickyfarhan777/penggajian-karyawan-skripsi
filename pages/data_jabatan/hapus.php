<?php
$id = $_GET['id'];
$query = "DELETE FROM jabatan WHERE id_jabatan = '$id'";
mysqli_query($koneksi, $query);

echo "<script>alert('Data berhasil hapus')</script>";
echo "<script>location='index.php?data_jabatan'</script>";
