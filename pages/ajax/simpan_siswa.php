<?php 
	include '../../controller/koneksi.php';
	$nama=$_POST['nama_siswa'];
	$kelas=$_POST['kelas'];
	$no_induk=$_POST['no_induk'];
	$agama=$_POST['agama'];
	$alamat=$_POST['alamat'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$foto=$_FILES['foto']['name'];
	$tmp=$_FILES['foto']['tmp_name'];
	$path="../../image/siswa/".$foto;

	move_uploaded_file($tmp, $path);
	$query="INSERT INTO siswa values(null,'$no_induk','$nama','$kelas','$agama','$alamat','$tanggal_lahir','$jenis_kelamin','$foto')";
	$sql=mysqli_query($koneksi,$query);
	if($sql){
		return true;
	}else{
		return false;
	}
?>