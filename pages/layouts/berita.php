<section class="content-header">
					<h1>
						Berita
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Berita</li>
					</ol>
				</section>

				<section class="content">
					<div class="box box-solid box-info">
						<div class="box-header">
							<i class="ion ion-android-people"></i>

							<h1 class="box-title">
								Berita
							</h1>
						</div>

						<div class="box-body">

							<button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addUser">
								<span>
									<i class="fa fa-check"></i>
								</span>
								Add News
							</button>

							<table id="datatables" class="table table-bordered table-striped">  
								<thead>
									<tr>
										<th>*</th>
										<th>Id</th>
										<th>Foto</th>
										<th>Judul_Berita</th>
										<th>Tanggal_Posting</th>
										<th>Isi_Berita</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									include '../../controller/koneksi.php';
									$i = 1;
									$query = "SELECT * FROM berita";
									$key = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_assoc($key)) { ?>  
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['foto']; ?></td>
											<td><?php echo $row['judul_berita']; ?></td>
											<td><?php echo $row['tanggal_posting']; ?></td>
											<td><?php echo $row['isi_berita']; ?></td>
											<td class="w-b">
												<button type="button" onclick="" title="Edit Berita" class="btn btn-success" data-toggle="modal" data-target="#editBerita">
													<span>
														<i class="fa fa-edit"></i>
													</span>
												</button>
												<button type="button" title="Delete Berita" class="btn btn-danger" data-toggle="modal" data-target="#deleteBerita">
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
		$('#title').text("School-Accounting | Berita");
	  	$('#berita').addClass('active');
	  	$('#dashboardd').removeClass('active');
	  	$('#dana').removeClass('active');
	  	$('#m_guru').removeClass('active');
	  	$('#m_siswa').removeClass('active');
	  	$('#m_admin').removeClass('active');
</script>