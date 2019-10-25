<?php 
	include '../../controller/koneksi.php';
	$user=$_POST['username'];
	$pass=md5($_POST['password']);
	$nama=$_POST['nama'];
	$foto=$_FILES['foto']['name'];
	$tmp=$_FILES['foto']['tmp_name'];
	$path="../../image/admin/".$foto;
		// move_uploaded_file($tmp, $path);
	move_uploaded_file($tmp, $path);
	$query="INSERT INTO admin(username,password,nama,profile) values('$user','$pass','$nama','$foto')";
	$sql=mysqli_query($koneksi,$query);
	if($sql){
		return true;
	}else{
		return false;
	}
?>