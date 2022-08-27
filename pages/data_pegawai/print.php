<?php

 $query = mysqli_query($koneksi, "SELECT * FROM pegawai");
 $tgl=date('d-m-Y');

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
  
<p style="float: left;">PT. Tiffany Damai Sejahtera</p>
        <p style="float: right;"> Tanggal :  <?= $tgl;?> </p>
        <br><br>
        <p style="float: left;">Jl. Dewi Sartika Ciputat</p>
        <p style="float: right;"> Telpon : (021) 7470-8449</p> 

        <h3 align="center">Laporan Pegawai</h3>


        <hr>

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