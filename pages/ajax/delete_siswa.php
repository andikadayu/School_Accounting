<?php 
	include '../../controller/koneksi.php';
	$id=$_GET['id'];

	$tam=mysqli_query($koneksi,"SELECT * FROM siswa where id_siswa='$id'");
	$pil=mysqli_fetch_assoc($tam);

	unlink('../../image/siswa/'.$pil['image']);

	$delete=mysqli_query($koneksi,"DELETE FROM siswa where id_siswa='$id'");

	if($delete){
		return true;
	}else{
		return false;
	}

 ?>