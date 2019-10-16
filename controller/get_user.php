<?php  
include '../controller/koneksi.php';

public function get_user(Request $req)
{
	$id = $req->get('id_user');
	$q = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id' ") ;
	$row = mysqli_fetch_assoc($q);
	return $row;
}

?>