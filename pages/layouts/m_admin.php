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

              <button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addUser">
                <span>
                  <i class="fa fa-check"></i>
                </span>
                Add Admin
              </button>

              <table id="datatables" class="table table-bordered table-striped">  
                <thead>
                  <tr>
                    <th>*</th>
                    <th>Id Admin</th>
                    <th>Nama</th>
                    <th>Username </th>
                    <th>Image</th>
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
                      <td><?php echo $row['id_admin']; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['profile']; ?></td>
                      <td class="w-b">
                        <button type="button" title="Edit Siswa" class="btn btn-success" data-toggle="modal" data-target="#editSiswa">
                          <span>
                            <i class="fa fa-edit"></i>
                          </span>
                        </button>
                        <button type="button" title="Delete Siswa" class="btn btn-danger" data-toggle="modal" data-target="#deleteSiswa">
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
  $('#m_admin').addClass('active');
  $('#dashboardd').removeClass('active');
  $('#dana').removeClass('active');
  $('#berita').removeClass('active');
  $('#m_guru').removeClass('active');
  $('#m_siswa').removeClass('active');
</script>