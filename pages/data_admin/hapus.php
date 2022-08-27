<?php
$id = $_GET['id'];
$query = "DELETE FROM login WHERE id_login = '$id'";
mysqli_query($koneksi, $query);

echo "<script>alert('akun berhasil dihapus')</script>";
echo "<script>location='index.php?data_admin'</script>";