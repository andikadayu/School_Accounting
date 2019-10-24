<section class="content-header">
					<h1>
						Dashboard
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Dashboard</li>
					</ol>
				</section>

				<section class="content">

					<div class="card">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-gavel"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Jumlah Guru</span>
										<span class="info-box-number">...<small>guru</small></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-green"><i class="fa fa-graduation-cap"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Jumlah Siswa</span>
										<span class="info-box-number">... <small>siswa</small></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->

							<!-- fix for small devices only -->
							<div class="clearfix visible-sm-block"></div>

							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Jumlah Pengguna</span>
										<span class="info-box-number">...<small>pengguna</small></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Jumlah Dana</span>
										<span class="info-box-number">...</span>
									</div>
									<!-- /.info-box-content -->

								</div>
								<!-- /.info-box -->
							</div>
						<!-- <button class="btn btn-primary" onclick="pindah()">Tes</button> -->
							<!-- /.col -->
						</div>

					</div>
				</section>

<script>
  $(function () {
      $('#datatables').DataTable();
    });
</script>
<script>
	$('#dashboardd').addClass('active');
	$('#berita').removeClass('active');
	$('#dana').removeClass('active');
	$('#m_guru').removeClass('active');
	$('#m_siswa').removeClass('active');
	$('#m_admin').removeClass('active');
</script>