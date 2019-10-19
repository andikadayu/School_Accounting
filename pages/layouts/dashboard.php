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
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3 id="jml_guru"><sup style="font-size: 20px"></sup></h3>

						<p>Jumlah Guru</p>
					</div>
					<div class="icon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3 id="jml_siswa"><sup style="font-size: 20px">%</sup></h3>
						
						<p>Jumlah Siswa</p>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3 id="jml_admin"><sup style="font-size: 20px">%</sup></h3>

						<p>Jumlah Admin</p>
					</div>
					<div class="icon">
						<i class="fa fa-user-secret"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>53<sup style="font-size: 20px">%</sup></h3>

						<p>Saldo Dana</p>
					</div>
					<div class="icon">
						<i class="fa fa-money"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
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

<script>
	$.ajax({
		url: "ajax/dashboard.php",
		method:"get",
		type:"json",
		success:function (data) {
			// https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/
		 	var JSONObject = JSON.parse(data);
		  	$('#jml_guru').text(JSONObject["jml_guru"]['jumlah']),
			$('#jml_admin').text(JSONObject["jml_admin"]['jumlah']),
			$('#jml_siswa').text(JSONObject["jml_siswa"]['jumlah'])
		}
	})
	
</script>