<?php 
	include '../../controller/koneksi.php';
	$nama=$_POST['nama_siswa'];
	$kelas=$_POST['kelas'];
	$foto=$_FILES['foto']['name'];
	$tmp=$_FILES['foto']['tmp_name'];
	$path="../../image/siswa/".$foto;
		// move_uploaded_file($tmp, $path);
	move_uploaded_file($tmp, $path);
	$query="INSERT INTO siswa(nama_siswa,kelas,image) values('$nama','$kelas','$foto')";
	$sql=mysqli_query($koneksi,$query);
	if($sql){
		return true;
	}else{
		return false;
	}
?>