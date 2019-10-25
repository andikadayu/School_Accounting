<?php 
	include '../../controller/koneksi.php';
	$id=$_POST['id_siswa'];$nama=$_POST['nama_siswa'];
	$kelas=$_POST['kelas'];$foto=$_FILES['foto']['name'];
	$tmp=$_FILES['foto']['tmp_name'];$path="../../image/siswa/".$foto;

	$no_induk=$_POST['no_induk'];
	$agama=$_POST['agama'];
	$alamat=$_POST['alamat'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$jenis_kelamin=$_POST['jenis_kelamin'];

	if($foto==null || $foto ==''){
		$update=mysqli_query($koneksi,"UPDATE siswa SET nama_siswa='$nama',kelas='$kelas',no_induk='$no_induk',agama='$agama',alamat='$alamat',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin' WHERE id_siswa='$id'");
	}else{
		$tam=mysqli_query($koneksi,"SELECT * FROM siswa where id_siswa='$id'");
		$pil=mysqli_fetch_assoc($tam);
		unlink('../../image/siswa/'.$pil['image']);

		move_uploaded_file($tmp, $path);
		$update=mysqli_query($koneksi,"UPDATE siswa SET nama_siswa='$nama',kelas='$kelas',image='$foto',no_induk='$no_induk',agama='$agama',alamat='$alamat',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin' WHERE id_siswa='$id'");
	}

	if($update){
		return true;
	}else{
		return false;
	}

 ?>