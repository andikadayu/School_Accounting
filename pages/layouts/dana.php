<section class="content-header">
	<h1>
		Dana
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dana</li>
	</ol>
</section>

<section class="content">
	<div class="box box-solid box-info">
		<div class="box-header">
		</div>

		<div class="box-body">

			<button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addUser">
				<span>
					<i class="fa fa-check"></i>
				</span>
				Add Dana
			</button>

			<table id="datatables" class="table table-bordered table-striped">  
				<thead>
					<tr>
						<th>*</th>
						<th>Id_Dana</th>
						<th>Tanggal Jam</th>
						<th>Keterangan</th>
						<th>Rekening Donatur</th>
						<th>Rekening Penerima</th>
						<th>Penerima</th>
						<th>Nominal</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					include '../../controller/koneksi.php';
					$i = 1;
					$query = "SELECT * FROM dana";
					$key = mysqli_query($koneksi, $query);
					while ($row = mysqli_fetch_assoc($key)) { ?>  
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $row['id_dana']; ?></td>
							<td><?php echo $row['tanggal_jam']; ?></td>
							<td><?php echo $row['keterangan'];?></td>
							<td><?php echo  $row['dari_rekening']; ?></td>
							<td><?php echo  $row['tujuan_rekening']; ?></td>
							<td><?php echo  $row['penerima']; ?></td>
							<td><?php echo  $row['nominal']; ?></td>
							<td class="w-b">
								<button type="button" onclick="" title="Edit Dana" class="btn btn-success" data-toggle="modal" data-target="#editDana">
									<span>
										<i class="fa fa-edit"></i>
									</span>
								</button>
								<button type="button" title="Delete Dana" class="btn btn-danger" data-toggle="modal" data-target="#deleteDana">
									<span>
										<i class="fa fa-trash"></i>
									</span>
								</button>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
	$(function () {
		$('#datatables').DataTable();
	});
</script>
<script>
	$('#title').text("School-Accounting | Dana");
	$('#dana').addClass('active');
	$('#dashboardd').removeClass('active');
	$('#berita').removeClass('active');
	$('#m_guru').removeClass('active');
	$('#m_siswa').removeClass('active');
	$('#m_admin').removeClass('active');
</script>