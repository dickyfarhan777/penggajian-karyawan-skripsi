<?php

 $query = mysqli_query($koneksi, "SELECT * FROM jabatan");

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
<h1>Data Jabatan Karyawan</h1>

<table border="1">
	<tr >
		<th>No</th>
		<th>Nama Jabatan</th>
		<th>Gaji Pokok</th>
		<th>Tunjangan Jabatan</th>
	</tr>
 <?php $no = 1 ?>
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
	<tr>
		<td><?= $no++; ?></td>
        <td><?= $row['nama_jabatan'] ?></td>
        <td>Rp. <?= number_format($row['gaji_pokok']) ?></td>
        <td>Rp. <?= number_format($row['tunjangan_jabatan']) ?></td>
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