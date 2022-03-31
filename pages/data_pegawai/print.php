<?php

 $query = mysqli_query($koneksi, "SELECT * FROM pegawai");

?>
<html>
<head>
	<title>Print</title>
</head>
<style>
	table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
</style>
<center>
<body>
<br>
<br>
<h1>Data Karyawan</h1>

<table border="1">
	<tr >
   <th>No</th>
   <th>Nama Karyawan</th>
   <th>Alamat Karyawan</th>
   <th>Telepon Karyawan</th>
   <th>Status</th>
	</tr>
 <?php $no = 1 ?>
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $row['nama_pegawai'] ?></td>
        <td><?= $row['alamat_pegawai'] ?></td>
        <td><?= $row['telepon_pegawai'] ?></td>
        <td><?= $row['status_pegawai'] ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
</center>

<script>
        window.print();
    </script>
</body>
</html>