<?php 
	include '../../controller/koneksi.php';
	
	$id=$_POST['id'];$nama=$_POST['nama_guru'];$jk=$_POST['jenis_kelamin'];$agama=$_POST['agama'];
	$alamat=$_POST['alamat'];$tgl_lahir=$_POST['tgl_lahir'];$tempat_lahir=$_POST['tempat_lahir'];
	$jabatan=$_POST['jabatan'];$foto=$_FILES['foto']['name'];$tmp=$_FILES['foto']['tmp_name'];
	$path="../../image/guru/".$foto;

	move_uploaded_file($tmp,$path);
	$insert=mysqli_query($koneksi,"INSERT INTO guru VALUES('$id','$nama','$jk','$agama','$alamat','$tgl_lahir','$tempat_lahir','$jabatan','$foto')");
	if($insert){
		return true;
	}else{
		return false;
	}

 ?>