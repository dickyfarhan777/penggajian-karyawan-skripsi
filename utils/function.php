<?php
function getTotalGaji($totalMasuk, $gajiPokok, $tunjangan)
{
    $jumlah = ($totalMasuk * $gajiPokok) + ($totalMasuk * $tunjangan);

    return $jumlah;

}

function getPajak ($totalMasuk, $gajiPokok, $tunjangan)
{
	$PPH = 0.4;
	$pajak = (($totalMasuk * $gajiPokok) + ($totalMasuk * $tunjangan)) * ($PPH/100);

	return $pajak;
}


function getTotal ($totalMasuk, $gajiPokok, $tunjangan)
{
	$PPH = 0.4;
	$pajak = (($totalMasuk * $gajiPokok) + ($totalMasuk * $tunjangan)) * ($PPH/100);

	$jumlah = ($totalMasuk * $gajiPokok) + ($totalMasuk * $tunjangan);

	$jamsostek = 141000;

	$total = $jumlah - $pajak - $jamsostek;

	return $total;
}


