 <section class="content-header">
  <h1>
    Master Data
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Master Admin</li>
  </ol>
</section>

<section class="content">
  <div class="box box-solid box-info">
    <div class="box-header">
      <i class="ion ion-android-people"></i>

      <h1 class="box-title">
        Master Admin
      </h1>
    </div>

    <div class="box-body">

      <button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addAdmin">
        <span>
          <i class="fa fa-check"></i>
        </span>
        Add Admin
      </button>

      <table id="datatables" class="table table-bordered table-striped">  
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username </th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../../controller/koneksi.php'; 
          $i = 1; 
          $query = "SELECT * FROM admin";
          $key = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_assoc($key)) { ?>  
            <tr>
              <td><?php echo $i++ ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td class="w-b">
                <button type="button" title="Edit Admin" class="btn btn-success" data-toggle="modal" data-target="#editAdmin" onclick="get_data('<?php echo $row['id_admin']; ?>','<?php echo $row['nama']; ?>','<?php echo $row['username']; ?>','<?php echo $row['password']; ?>','<?php echo $row['profile']; ?>');">
                  <span>
                    <i class="fa fa-edit"></i>
                  </span>
                </button>
                <button type="button" title="Delete Siswa" class="btn btn-danger" data-toggle="modal" data-target="#deleteAdmin" onclick="delete_siswa(<?php echo $row['id_admin']; ?>);">
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
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_admin" method="post" enctype="multipart/form-data">
          <label class="form-group">Username</label>
          <input type="text" name="username" id="username" class="form-control">
          <label class="form-group">Password</label>
          <input type="password" name="password" id="password" class="form-control">
          <label class="form-group">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control"> 
          <label class="form-group">Profil</label>
          <input type="file" name="foto" id="image" class="form-control">
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
<div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_admin" method="post" enctype="multipart/form-data">
          <input type="text" name="id_admin" hidden id="edit_id_admin"> 
          <label class="form-group">Nama Admin</label>
          <input type="text" name="nama" id="edit_nama_admin" class="form-control"> 
          <label class="form-group">Username</label>
          <input type="text" name="username" id="edit_user" class="form-control">
          <label class="form-group">Password</label>
          <input type="text" name="password" id="edit_pass" class="form-control">
          <label class="form-group">Photo</label>
          <input type="file" name="foto"  id="edit_profile" class="form-control">
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
  $('#title').text("School-Accounting | Master Admin");
  $('#m_admin').addClass('active');
  $('#dashboardd').removeClass('active');
  $('#dana').removeClass('active');
  $('#berita').removeClass('active');
  $('#m_guru').removeClass('active');
  $('#m_siswa').removeClass('active');
</script>
<script>
  function valid_add(argument) {
    var nama1=document.getElementById('nama').value;
    var user=document.getElementById('username').value;
    var pass=document.getElementById('password').value;
    var image=document.getElementById('image').value;
    if(nama1!=""&&user!=""&&pass!=""&&image!=""){
     $.ajax({
      url : "ajax/simpan_admin.php",
      type : "post",
      processData: false,
      contentType : false,
      data : new FormData($('#add_admin')[0]),
      success: function(data){

        swal("Berhasil Lurd", "Datamu wes melbu", "sukses").then((value)=>{
          location.reload();
        });
      },
      error:function (data) {
        swal("Goblok","Datamu Gagal Cok","ERROR");
      }
    })

   }else{
    swal("Perhatian!", "Di isi seng lengkap cek gak error ", "error");
  }
}

function delete_siswa(id) {
 swal({
  title: "Are you sure?",
  text: "Beneran mau hapus kenangan ini?? Kenangan ini indah lo!",
  icon: "warning",
  buttons : true,
  dangerMode:true
})
 .then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url : "ajax/delete_admin.php",
      method : "get",
      data :{
        id : id
      },
      success:function (data) {
        swal("Information","Yah beneran dihapus dong :(", {
          icon: "success",
        }).then((value)=>{
          location.reload();
        });
      },
      error:function (data) {
        swal("Information","Tuhkan udah dibilangin jangan di hapus kan jadi error to??","error");
      }
    })
    
  } else {
    swal("Information","Your imaginary file is safe!","error");
  }
});
}
</script>
<script>
  function get_data(id,nama,username,password,image) {
    $('#edit_id_admin').val(id);
    $('#edit_nama_admin').val(nama);
    $('#edit_user').val(username);
    $('#edit_pass').val(password);
  }
  function valid_edit() {
    var namas=document.getElementById('edit_nama_admin').value;
    var users=document.getElementById('edit_user').value;
    var pass=document.getElementById('edit_pass').value;
    if(namas!=''&&users!=''&&pass!=''){
      $.ajax({
        url:"ajax/update_admin.php",
        type : "post",
        processData: false,
        contentType : false,
        data : new FormData($('#edit_admin')[0]),
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
      swal('Attention','Nama , Username and Password must filled','error');
    }
  }
</script>