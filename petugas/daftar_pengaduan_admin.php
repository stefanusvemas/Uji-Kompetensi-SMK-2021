
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaduan</h1>
</div>
<!-- row content -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-bottom-primary text-gray">
        <h5>Daftar Pengaaduan Masyarakat</h5>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Isi Laporan</th>
            <th>Nik</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
          <?php
          $i = 0;
          $pengaduan = mysqli_query($konek," SELECT * FROM pengaduan INNER JOIN masyarakat on pengaduan.nik = masyarakat.nik ORDER BY id_pengaduan ASC ");
          while ($data = mysqli_fetch_array($pengaduan)) {
            $i++;
          ?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['isi_lapor'];?></td>
            <td><?php echo $data['nik'];?></td>
            <td><?php echo $data['tgl_pengaduan'];?></td>
            <td><a href="?page=detail_admin&&id=<?php echo $data['id_pengaduan'];?>" class="btn btn-success">Lihat</a></td>
          </tr>
          <?php
           }
          ?>
        </table>
      </div>
      <div class="card-footer">
        <a href="print_daftar_pengaduan.php" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
      </div>
    </div>
  </div>
</div>



