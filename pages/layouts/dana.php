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
			Dana
		</div>

		<div class="box-body">

			<button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addDana">
				<span>
					<i class="fa fa-check"></i>
				</span>
				Add Dana
			</button>

			<table id="datatables" class="table table-bordered table-striped">  
				<thead>
					<tr>
						<th>*</th>
						<th>Tanggal Jam</th>
						<th>Keterangan</th>
						<th>Rekening Donatur</th>
						<th>Donatur</th>
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
							<td><?php echo $row['tanggal_jam']; ?></td>
							<td><?php echo $row['keterangan'];?></td>
							<td><?php echo  $row['dari_rekening']; ?></td>
							<td><?php echo $row['atas_nama']; ?></td>
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

<!-- MODAL ADD -->
<div class="modal fade" id="addDana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dana</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_dana" method="post" enctype="multipart/form-data">
        	<input type="number" name="saldo" id="saldo" hidden="">
          <table class="table table-borderless">
          	<tr>
          		<td>
          			<label class="form-group">Keterangan Dana</label>
          			<select class="form-control" name="keterangan" id="ket" onchange="ceksaldo();">
          				<option value="" selected="" disabled="">-- Pilih Keterangan --</option>
          				<option value="Pemasukan">Pemasukan</option>
          				<option value="Pengeluaran">Pengeluaran</option>
          			</select>
          		</td>
          		<td>
          			<label class="form-group">Waktu</label>
          			<input type="text" name="tanggal_jam" readonly="" class="form-control" value="<?php echo date("Y/m/d H:i:s"); ?>">
          		</td>
          	</tr>
          	<tr>
          		<td>
          			<label class="form-group">Rekening Donatur</label>
          			<input type="number" name="dari_rekening" class="form-control" id="dari_rekening">
          		</td>
          		<td>
          			<label class="form-group">Nama Donatur</label>
          			<input type="text" name="atas_nama" class="form-control" id="atas_nama">
          		</td>
          	</tr>
          	<tr>
          		<td>
          			<label class="form-group">Rekening Penerima</label>
          			<input type="number" name="tujuan_rekening" class="form-control" id="tujuan_rekening">
          		</td>
          		<td>
          			<label class="form-group">Nama Penerima</label>
          			<input type="text" name="penerima" class="form-control" id="penerima">
          		</td>
          	</tr>
          </table>
          <label class="form-group">Nominal</label>
          <input type="number" name="nominal" class="form-control" id="nominal">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sv_add" onclick="valid_add();">Save changes</button>
      </div>
    </div>
  </div>
</div>


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
<script>
	
</script>
<script>
	function valid_add() {
		
		$.ajax({
			url:"ajax/dashboard.php",
			method:"get",
			type:"json",
			success:function (data) {
				var JSONObject = JSON.parse(data);
			 	var saldo=JSONObject['jml_dana']['nominal'];
			 	$('#saldo').val(saldo)	
			}
		})
		var ket=document.getElementById('ket').value;var dari_rekening=document.getElementById('dari_rekening').value;var atas_nama=document.getElementById('atas_nama').value;var tujuan_rekening=document.getElementById('tujuan_rekening').value;var penerima=document.getElementById('penerima').value;var nominal=document.getElementById('nominal').value;var saldo=document.getElementById('saldo').value;
		if(ket!=''&&dari_rekening!=''&&atas_nama!=''&&tujuan_rekening!=''&&penerima!=''&&nominal!=''){
			if(ket == "Pengeluaran"){
				add_datas();
			}else{	
				add_datas();
			}
		}else{
			swal("Attention!", "You must Complete Form ", "error");
		}

	}
	function add_datas() {
		$.ajax({
			url : "ajax/simpan_dana.php",
			type : "post",
			processData: false,
			contentType : false,
			data : new FormData($('#add_dana')[0]),
			success: function(data){
				swal("Success", "Data Added Success", "success").then((value)=>{
					location.reload();
				});
			},
			error:function (data) {
				swal("Failed","Data Added Failed","error");
			}
		})
	}
</script>