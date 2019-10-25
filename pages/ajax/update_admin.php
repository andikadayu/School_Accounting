<?php 
	include '../../controller/koneksi.php';

	$id=$_POST['id_admin'];
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$nama=$_POST['nama'];
	$foto=$_FILES['foto']['name'];
	$tmp=$_FILES['foto']['tmp_name'];
	$path="../../image/admin/".$foto;


	if($foto==null || $foto ==''){
		$update=mysqli_query($koneksi,"UPDATE admin SET username='$user', password='$pass', nama='$nama' WHERE id_admin='$id'");
	}else{
		$tam=mysqli_query($koneksi,"SELECT * FROM admin where id_admin='$id'");
		$pil=mysqli_fetch_assoc($tam);
		unlink('../../image/admin/'.$pil['profile']);

		move_uploaded_file($tmp, $path);

		$update=mysqli_query($koneksi,"UPDATE admin SET username='$user', password='$pass', nama='$nama' ,profile='$foto' WHERE id_admin='$id'");
	}
	if($update){
		return true;
	}else{
		return false;
	}
 ?>