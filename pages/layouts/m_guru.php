<section class="content-header">
  <h1>
    Master Data
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Master Guru</li>
  </ol>
</section>
<section class="content">
  <div class="box box-solid box-info">
    <div class="box-header">
      <i class="ion ion-android-people"></i>

      <h1 class="box-title">
        Master Guru
      </h1>
    </div>

    <div class="box-body">

      <button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addGuru">
        <span>
          <i class="fa fa-check"></i>
        </span>
        Add Guru
      </button>

      <table id="datatables" class="table table-bordered table-striped">  
        <thead>
          <tr>
            <th>NO</th>
            <th>Nama Guru</th>
            <th>JK</th>
            <th>TTL</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../../controller/koneksi.php'; 
          $i = 1;
          $query = "SELECT * FROM guru";
          $key = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_assoc($key)) { ?>  
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['nama_guru']; ?></td>
              <td><?php echo $row['jenis_kelamin']; ?></td>
              <td><?php echo $row['tempat_lahir'];?>,<?php echo $row['tgl_lahir'];?></td>
              <td><?php echo $row['agama']; ?></td>
              <td><?php echo $row['alamat']; ?></td>
              <td><?php echo $row['jabatan']; ?></td>
              <td class="w-b">
                <button type="button" title="Edit User" class="btn btn-success" data-toggle="modal" data-target="#editGuru" onclick="get_data('<?php echo $row['id']; ?>','<?php echo $row['nama_guru']; ?>','<?php echo $row['jenis_kelamin']; ?>','<?php echo $row['tgl_lahir']; ?>','<?php echo $row['tempat_lahir']; ?>','<?php echo $row['agama']; ?>','<?php echo $row['alamat']; ?>','<?php echo $row['jabatan']; ?>','<?php echo $row['image']; ?>');">
                  <span>
                    <i class="fa fa-edit"></i>
                  </span>
                </button>
                <button type="button" title="Delete User" class="btn btn-danger" onclick="delete_guru(<?php echo $row['id']; ?>);">
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
<!-- ADD MODAL -->
<div class="modal fade" id="addGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_guru" method="post" enctype="multipart/form-data">
          <label class="form-group">ID/NIP</label>
          <input type="text" name="id" class="form-control" id="id">
          <label class="form-group">Nama Guru</label>
          <input type="text" name="nama_guru" id="nama_guru" class="form-control"> 
          <label class="form-group">Jenis Kelamin</label>
          <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <label class="form-group">Agama</label>
          <input type="text" name="agama" id="agama" class="form-control">
          <label class="form-group">Alamat</label>
          <textarea class="form-control" cols="5" rows="3" name="alamat" id="alamat"></textarea>
          <br>
          <div class="form-inline">
            <label class="form-group">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir">
            <label class="form-group">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
          </div>
          <label class="form-group">Jabatan</label>
          <input type="text" name="jabatan" class="form-control" id="jabatan">
          <label class="form-group">Photo</label>
          <input type="file" name="foto"  id="foto" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sv_add" onclick="valid_add();">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="editGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_guru" method="post" enctype="multipart/form-data">
          <label class="form-group">ID/NIP</label>
          <input type="text" name="id" class="form-control" id="edit_id" readonly>
          <label class="form-group">Nama Guru</label>
          <input type="text" name="nama_guru" id="edit_nama_guru" class="form-control"> 
          <label class="form-group">Jenis Kelamin</label>
          <select class="form-control" name="jenis_kelamin" id="edit_jenis_kelamin">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <label class="form-group">Agama</label>
          <input type="text" name="agama" id="edit_agama" class="form-control">
          <label class="form-group">Alamat</label>
          <textarea class="form-control" cols="5" rows="3" name="alamat" id="edit_alamat"></textarea>
          <br>
          <div class="form-inline">
            <label class="form-group">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" id="edit_tgl_lahir">
            <label class="form-group">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" id="edit_tempat_lahir">
          </div>
          <label class="form-group">Jabatan</label>
          <input type="text" name="jabatan" class="form-control" id="edit_jabatan">
          <label class="form-group">Photo</label>
          <input type="file" name="foto"  id="edit_foto" class="form-control">
          <small><i>if you not change,let blank this</i></small>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sv_add" onclick="valid_edit();">Save changes</button>
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
  $('#title').text("School-Accounting | Master Guru");
  $('#m_guru').addClass('active');
  $('#dashboardd').removeClass('active');
  $('#dana').removeClass('active');
  $('#berita').removeClass('active');
  $('#m_siswa').removeClass('active');
  $('#m_admin').removeClass('active');
</script>
<script>
  function valid_add() {
    var id=document.getElementById('id').value;var nama_guru=document.getElementById('nama_guru').value;var jenis_kelamin=document.getElementById('jenis_kelamin').value;var agama=document.getElementById('agama').value;var alamat=document.getElementById('alamat').value;var tgl_lahir=document.getElementById('tgl_lahir').value;var tempat_lahir=document.getElementById('tempat_lahir').value;var jabatan=document.getElementById('jabatan').value;var foto=document.getElementById('foto').value;
    if(id!=''&&nama_guru!=''&&jenis_kelamin!=''&&agama!=''&&alamat!=''&&tgl_lahir!=''&&tempat_lahir!=''&&jabatan!=''&&foto!=''){
      $.ajax({
      url : "ajax/simpan_guru.php",
      type : "post",
      processData: false,
      contentType : false,
      data : new FormData($('#add_guru')[0]),
      success: function(data){
        swal("Success", "Data Added Success", "success").then((value)=>{
          location.reload();
        });
      },
      error:function (data) {
        swal("Failed","Data Added Failed","error");
      }
    })
    }else{
      swal("Attention!", "You must Complete Form ", "error");
    }
  }

  function delete_guru(id) {
    swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  icon: "warning",
  buttons : true,
  dangerMode:true
})
 .then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url : "ajax/delete_guru.php",
      method : "get",
      data :{
        id : id
      },
      success:function (data) {
        swal("Information","Your imaginary file has been deleted!", {
          icon: "success",
        }).then((value)=>{
          location.reload();
        });
      },
      error:function (data) {
        swal("Information","Your imaginary file is safe!","error");
      }
    })
    
  } else {
    swal("Information","Your imaginary file is safe!","error");
  }
});
  }
</script>
<script>
  function get_data(id,nama,jk,tgl,tpt,agama,alamat,jabatan,image) {
    $('#edit_id').val(id);
    $('#edit_nama_guru').val(nama);
    $('#edit_jenis_kelamin').val(jk);
    $('#edit_tgl_lahir').val(tgl);
    $('#edit_tempat_lahir').val(tpt);
    $('#edit_agama').val(agama);
    $('#edit_alamat').val(alamat);
    $('#edit_jabatan').val(jabatan);
  }


  function valid_edit() {
     var id=document.getElementById('edit_id').value;var nama_guru=document.getElementById('edit_nama_guru').value;var jenis_kelamin=document.getElementById('edit_jenis_kelamin').value;var agama=document.getElementById('edit_agama').value;var alamat=document.getElementById('edit_alamat').value;var tgl_lahir=document.getElementById('edit_tgl_lahir').value;var tempat_lahir=document.getElementById('edit_tempat_lahir').value;var jabatan=document.getElementById('edit_jabatan').value;var foto=document.getElementById('edit_foto').value;
     if(nama_guru!=''&&jenis_kelamin!=''&&agama!=''&&alamat!=''&&tgl_lahir!=''&&tempat_lahir!=''&&jabatan!=''){
      $.ajax({
        url:"ajax/update_guru.php",
        type : "post",
        processData: false,
        contentType : false,
        data : new FormData($('#edit_guru')[0]),
        success:function (date) {
          swal("Success", "Data Changed Success", "success").then((value)=>{
            location.reload();
          });
        },
        error:function (date) {
          swal('Failed','Data Changed Failed','error');
        }

      })
     }else{
      swal('Attention','Nama,Jenis Kelamin,Agama,Alamat,Tanggal Lahir,Tempat Lahir,Jabatan must filled','error');
     }
  }
</script>