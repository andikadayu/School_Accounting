<?php 
	include '../../controller/koneksi.php';
	
	$guru=mysqli_query($koneksi,"SELECT COUNT(id) as jumlah FROM guru");
	$admin=mysqli_query($koneksi,"SELECT COUNT(id_admin) as jumlah FROM admin");
	$siswa=mysqli_query($koneksi,"SELECT COUNT(id_siswa) as jumlah FROM siswa");
	$dana=mysqli_query($koneksi,"SELECT * FROM saldo WHERE keterangan='total'");

	$data['jml_admin']=mysqli_fetch_assoc($admin);
	$data['jml_guru']=mysqli_fetch_assoc($guru);
	$data['jml_siswa']=mysqli_fetch_assoc($siswa);
	$data['jml_dana']=mysqli_fetch_assoc($dana);

	echo json_encode($data);
 ?>