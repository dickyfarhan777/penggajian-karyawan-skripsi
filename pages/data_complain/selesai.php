<?php
$id = $_GET['id'];
$query = "DELETE FROM komplain WHERE id_komplain = '$id'";
mysqli_query($koneksi, $query);

echo "<script>alert('Complain telah diperbaiki')</script>";
echo "<script>location='index.php?data_complain'</script>";