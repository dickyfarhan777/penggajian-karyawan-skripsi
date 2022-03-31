<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM laporan_gaji l LEFT JOIN pegawai p ON p.id_pegawai = l.pegawai_id LEFT JOIN jabatan j ON j.id_jabatan = l.jabatan_id  WHERE id_laporan = '$id'");
$data = mysqli_fetch_assoc($query);
?>

<html>

<head>
    <title>Slip Gaji</title>
</head>

<body>

        <p style="float: left;">PT. Tiffany Damai Sejahtera</p>
        <p style="float: right;"> Tanggal :  <?= $data["tanggal_laporan"] ?> </p>
        <br><br>
        <p style="float: left;">Jl. Dewi Sartika Ciputat</p>
        <p style="float: right;"> Telpon : (021) 7470 – 8449</p> 

        <h1 align="center">Slip Gaji</h1>


        <hr>
        <img style="float: left;" src="asstes/images/1.png" width="50" height="50">
        <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama Karyawan :  <?= $data['nama_pegawai']; ?> </p>
        <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan :  <?= $data["nama_jabatan"] ?> </p>  

        
        <hr>
        
        <center>
        <br>
        <table border="1" class="table_detail">
            <tr>
                <td width="" align="center">No</td>
                <td width="400" align="center">Keterangan</td>
                <td width="500" align="center">Nominal</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Bersih</td>
                <td align="right">
                    Rp. <?= number_format(getTotalGaji($data['total_masuk'], $data['gaji_pokok'], $data['tunjangan_jabatan'])) ?>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>PPH</td>
                <td align="right">
                    Rp. <?= number_format(getPajak($data['total_masuk'], $data['gaji_pokok'], $data['tunjangan_jabatan'])) ?>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Jamsostek</td>
                <td align="right">Rp. 141.000</td>
            </tr>
            <tr>
                <td colspan="2"><strong>TOTAL GAJI</strong></td>
                <td align="right" style="color:green;font-weight:bold">
                    Rp. <?= number_format(getTotal($data['total_masuk'], $data['gaji_pokok'], $data['tunjangan_jabatan'])) ?></td>
            </tr>
        </table>
        </center>
        <p class="mt-5 float-right ">Yang bertanda tangan HRD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p>
<br>
<br>
<br>
<div class="container float-right">
    <p class="mt-5 float-right">----------------- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
</div>
    </center>

    <script>
        window.print();
    </script>

</body>

</html>