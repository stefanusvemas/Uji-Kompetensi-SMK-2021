
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tanggapan</h1>
</div>
<!-- row content -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-bottom-primary text-gray">
         <h3>Daftar Tanggapan</h3>
      </div>
      <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Tanggapan</th>
                    <th>Petugas</th>
</tr>
    <?php
        $no = 0;
        $daftar_tanggapan = mysqli_query($konek,"SELECT * FROM tanggapan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas ORDER BY id_tanggapan ASC");
        while ($data = mysqli_fetch_array($daftar_tanggapan)) {         
            $no++;
    ?>
                <tr>
                    <th><?php echo $no;?></th>
                    <th><?php echo $data['tgl_tanggapan'];?></th>
                    <th><?php echo $data['tanggapan'];?></th>
                    <th><?php echo $data['nama_petugas'];?></th>
                </tr>
    <?php
        }
    ?>
            </table>
      </div>
      <div class="card-footer">
        <a href="print_daftar_tanggapan.php" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
      </div>
    </div>
  </div>
</div>