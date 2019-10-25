<?php
	session_start();
	
	include("../controller/koneksi.php");

	$user = $_POST['user'];
	$pass = md5($_POST['pass']);

	if(!empty($user) and !empty($pass)){
		
		$query = mysqli_query($koneksi, "SELECT * FROM admin where username='$user' AND password='$pass'");
		$data = mysqli_fetch_assoc($query);
		
		if($data){
			$_SESSION['login'] = true;
			$_SESSION['user'] = $user;
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['profile']=$data['profile']; 

			header('location: master_layout.php');
		}else{
			header('Location: index.php?p=salah lubang kali mas??!!');
		}
	}else{
		header('Location: index.php?p=itu lubangnya jangan kosong ya :*');
	}
?>