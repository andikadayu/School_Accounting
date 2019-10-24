<?php 
	include '../../controller/koneksi.php';
	$id=$_GET['id'];
	$tam=mysqli_query($koneksi,"SELECT * FROM guru where id='$id'");
	$pil=mysqli_fetch_assoc($tam);

	unlink('../../image/guru/'.$pil['image']);

	$delete=mysqli_query($koneksi,"DELETE FROM guru where id='$id'");
	if($delete){
		return true;
	}else{
		return false;
	}
 ?>