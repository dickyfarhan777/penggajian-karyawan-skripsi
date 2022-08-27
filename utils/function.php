<?php
function getTotalGaji($totalMasuk, $gajiPokok, $tunjangan)
{
    $jumlah = ($totalMasuk * $gajiPokok +  $tunjangan);

    return $jumlah;

}

function getPajak ($totalMasuk, $gajiPokok, $tunjangan)
{
	$PPH = 5;
	$pajak = (($totalMasuk * $gajiPokok +  $tunjangan)) * ($PPH/100);

	return $pajak;
}


function getTotal ($totalMasuk, $gajiPokok, $tunjangan)
{
	$PPH = 5;
	$pajak = (($totalMasuk * $gajiPokok +  $tunjangan)) * ($PPH/100);

	$jumlah = ($totalMasuk * $gajiPokok +  $tunjangan);

	$jamsostek = 141000;

	$total = $jumlah - $pajak - $jamsostek;

	return $total;
}


