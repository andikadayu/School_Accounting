<?php 
	include '../../controller/koneksi.php';
	$id=$_POST['id'];$nama=$_POST['nama_guru'];$jk=$_POST['jenis_kelamin'];$agama=$_POST['agama'];
	$alamat=$_POST['alamat'];$tgl_lahir=$_POST['tgl_lahir'];$tempat_lahir=$_POST['tempat_lahir'];
	$jabatan=$_POST['jabatan'];$foto=$_FILES['foto']['name'];$tmp=$_FILES['foto']['tmp_name'];
	$path="../../image/guru/".$foto;

	if($foto==null||$foto==''){
		$update=mysqli_query($koneksi,"UPDATE guru SET id='$id',nama_guru='$nama',jenis_kelamin='$jk',agama='$agama',alamat='$alamat',tgl_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jabatan='$jabatan' WHERE id='$id'");
	}else{
		$tam=mysqli_query($koneksi,"SELECT * FROM guru where id='$id'");
		$pil=mysqli_fetch_assoc($tam);
		unlink('../../image/guru/'.$pil['image']);

		move_uploaded_file($tmp, $path);

		$update=mysqli_query($koneksi,"UPDATE guru SET id='$id',nama_guru='$nama',jenis_kelamin='$jk',agama='$agama',alamat='$alamat',tgl_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jabatan='$jabatan',image='$foto' WHERE id='$id'");
	}

	if($update){
		return true;
	}else{
		return false;
	}

 ?>