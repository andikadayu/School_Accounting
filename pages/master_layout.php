<?php 
include '../controller/koneksi.php'
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School-Accounting | Widgets</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" type="text/css" href="../dist/css/style.css">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="halaman">
    <div class="wrapper">

      <?php include 'component/navbar.php' ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'component/sidebar.php' ?>

      <div class="content-wrapper" id="content_web">
        

        
      </div>
      <!-- /.content-wrapper -->

      <?php include 'component/footer.php' ?>
    </div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Slimscroll -->
  <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>

  <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#datatables').DataTable();
    });
  </script>
  <!-- Script Untuk link Halaman -->
  <script>
  	// Default View adalah Dashboard
  	$('#content_web').load('layouts/dashboard.php');

  	// Pilihan View Berdasarkan Click Sidebar
  	$(document).ready(function() {
  		$('.klik_menu').click(function () {
  			var menu = $(this).attr('id');
  			if(menu == 'dashboardd'){
  				$('#content_web').load('layouts/dashboard.php');
  			}else if(menu == 'berita'){
  				$('#content_web').load('layouts/berita.php');
  			}else if(menu == 'dana'){
  				$('#content_web').load('layouts/dana.php');
  			}else if(menu == 'm_guru'){
          $('#content_web').load('layouts/m_guru.php');
        }else if(menu == 'm_siswa'){
          $('#content_web').load('layouts/m_siswa.php');
        }else if(menu == 'm_admin'){
          $('#content_web').load('layouts/m_admin.php');
        }
  		});
  	});
  </script>
</body>
</html>
