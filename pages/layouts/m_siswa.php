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

              <button type="button" class="btn btn-success mb-a w-a" data-toggle="modal" data-target="#addUser">
                <span>
                  <i class="fa fa-check"></i>
                </span>
                Add Siswa
              </button>

              <table id="datatables" class="table table-bordered table-striped">  
                <thead>
                  <tr>
                    <th>Id Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Kelas </th>
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
  $('#m_siswa').addClass('active');
  $('#dashboardd').removeClass('active');
  $('#dana').removeClass('active');
  $('#berita').removeClass('active');
  $('#m_guru').removeClass('active');
  $('#m_admin').removeClass('active');
</script>