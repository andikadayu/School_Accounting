<?php
	include '../../controller/koneksi.php';
	$id=$_GET['id'];

	$tam=mysqli_query($koneksi,"SELECT * FROM admin where id_admin='$id'");
	$pil=mysqli_fetch_assoc($tam);

	unlink('../../image/admin/'.$pil['image']);

	$delete=mysqli_query($koneksi,"DELETE FROM admin where id_admin='$id'");

	if($delete){
		return true;
	}else{
		return false;
	}

 ?>