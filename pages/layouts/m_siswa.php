 <section class="content-header">
  <h1>
    Master Data
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Master Siswa</li>
  </ol>
</section>

<section class="content">
  <div class="box box-solid box-info">
    <div class="box-header">
      <i class="ion ion-android-people"></i>
      <h1 class="box-title">
        Master Siswa
      </h1>
    </div>

    <div class="box-body">

      <button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addSiswa">
        <span>
          <i class="fa fa-check"></i>
        </span>
        Add Siswa
      </button>

      <table id="datatables" class="table table-bordered table-striped">  
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas </th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../../controller/koneksi.php'; 
          $i = 1;
          $query = "SELECT * FROM siswa";
          $key = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_assoc($key)) { ?>  
            <tr>
              <td><?php echo $i++ ?></td>
              <td><?php echo $row['nama_siswa']; ?></td>
              <td><?php echo $row['kelas']; ?></td>
              <td><?php echo $row['image']; ?></td>
              <td class="w-b">
                <button type="button" title="Edit Siswa" class="btn btn-success" data-toggle="modal" data-target="#editSiswa" onclick="get_data('<?php echo $row['id_siswa']; ?>','<?php echo $row['nama_siswa']; ?>','<?php echo $row['kelas']; ?>','<?php echo $row['image']; ?>');">
                  <span>
                    <i class="fa fa-edit"></i>
                  </span>
                </button>
                <button type="button" title="Delete Siswa" class="btn btn-danger" data-toggle="modal" data-target="#deleteSiswa" onclick="delete_siswa(<?php echo $row['id_siswa']; ?>);">
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
<div class="modal fade" id="addSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_siswa" method="post" enctype="multipart/form-data">
          <label class="form-group">Nama Siswa</label>
          <input type="text" name="nama_siswa" id="nama_siswa" class="form-control"> 
          <label class="form-group">Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control">
          <label class="form-group">Photo</label>
          <input type="file" name="foto"  id="image" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sv_add" onclick="valid_add();">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_siswa" method="post" enctype="multipart/form-data">
          <input type="text" name="id_siswa" hidden id="edit_id_siswa"> 
          <label class="form-group">Nama Siswa</label>
          <input type="text" name="nama_siswa" id="edit_nama_siswa" class="form-control"> 
          <label class="form-group">Kelas</label>
          <input type="text" name="kelas" id="edit_kelas" class="form-control">
          <label class="form-group">Photo</label>
          <input type="file" name="foto"  id="edit_image" class="form-control">
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
  $('#title').text("School-Accounting | Master Siswa");
  $('#m_siswa').addClass('active');
  $('#dashboardd').removeClass('active');
  $('#dana').removeClass('active');
  $('#berita').removeClass('active');
  $('#m_guru').removeClass('active');
  $('#m_admin').removeClass('active');
</script>
<script>
  function valid_add(argument) {
    var nama1=document.getElementById('nama_siswa').value;
    var kelas=document.getElementById('kelas').value;
    var image=document.getElementById('image').value;
    if(nama1!=""&&kelas!=""&&image!=""){
     $.ajax({
      url : "ajax/simpan_siswa.php",
      type : "post",
      processData: false,
      contentType : false,
      data : new FormData($('#add_siswa')[0]),
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
function delete_siswa(id) {
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
      url : "ajax/delete_siswa.php",
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
  function get_data(id,nama_siswa,kelas,image) {
    $('#edit_id_siswa').val(id);
    $('#edit_nama_siswa').val(nama_siswa);
    $('#edit_kelas').val(kelas);
  }

  function valid_edit() {
    var namas=document.getElementById('edit_nama_siswa').value;
    var kelass=document.getElementById('edit_kelas').value;
    if(namas!=''&&kelass!=''){
      $.ajax({
        url:"ajax/update_siswa.php",
        type : "post",
        processData: false,
        contentType : false,
        data : new FormData($('#edit_siswa')[0]),
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
      swal('Attention','Nama and Kelas must filled','error');
    }
  }
</script>