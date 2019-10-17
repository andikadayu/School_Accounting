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

              <button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addUser">
                <span>
                  <i class="fa fa-check"></i>
                </span>
                Add Guru
              </button>

              <table id="datatables" class="table table-bordered table-striped">  
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Id</th>
                    <th>Nama Guru</th>
                    <th>JK</th>
                    <th>TTL</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Image</th>
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
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['nama_guru']; ?></td>
                      <td><?php echo $row['jenis_kelamin']; ?></td>
                      <td><?php echo $row['tempat_lahir'];?>,<?php echo $row['tgl_lahir'];?></td>
                      <td><?php echo $row['agama']; ?></td>
                      <td><?php echo $row['alamat']; ?></td>
                      <td><?php echo $row['jabatan']; ?></td>
                      <td><?php echo $row['image']; ?></td>
                      <td class="w-b">
                        <button type="button" title="Edit User" class="btn btn-success" data-toggle="modal" data-target="#editUser">
                          <span>
                            <i class="fa fa-edit"></i>
                          </span>
                        </button>
                        <button type="button" title="Delete User" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">
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
  $('#m_guru').addClass('active');
  $('#dashboardd').removeClass('active');
  $('#dana').removeClass('active');
  $('#berita').removeClass('active');
  $('#m_siswa').removeClass('active');
  $('#m_admin').removeClass('active');
</script>