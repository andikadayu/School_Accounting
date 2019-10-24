<?php 
	include '../../controller/koneksi.php';

	$keterangan=$_POST['keterangan'];$tanggal_jam=$_POST['tanggal_jam'];$dari_rekening=$_POST['dari_rekening'];$atas_nama=$_POST['atas_nama'];$tujuan_rekening=$_POST['tujuan_rekening'];$penerima=$_POST['penerima'];$nominal=$_POST['nominal'];

	$insert=mysqli_query($koneksi,"INSERT INTO dana values(NULL,'$tanggal_jam','$keterangan','$dari_rekening','$atas_nama','$tujuan_rekening','$penerima','$nominal')");

	if($keterangan == 'Pengeluaran'){
		$update=mysqli_query($koneksi,"UPDATE saldo SET nominal=nominal-$nominal WHERE keterangan='total'");
	}else{
		$update=mysqli_query($koneksi,"UPDATE saldo SET nominal=nominal+$nominal WHERE keterangan='total'");
	}

?>