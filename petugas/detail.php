<?php
    ini_set('date.timezone','Asia/Jakarta');
    $tgl=date("Y-m-d");
    $id = $_GET['id'];
    $pengaduan = mysqli_query($konek," SELECT * FROM pengaduan INNER JOIN masyarakat on pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id'");
    $data = mysqli_fetch_array($pengaduan);

    if (isset($_POST['submit'])) {
        $id_pengaduan = $_POST['id_pengaduan'];
        $tanggal = $_POST['tgl'];
        $tanggapan = $_POST['tanggapan'];
        $id_petugas = $_POST['id_petugas'];
        $status = $_POST['status'];

        $tanggapan = mysqli_query($konek, " INSERT INTO tanggapan (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('', '$id_pengaduan', '$tanggal', '$tanggapan', '$id_petugas')");        
        mysqli_query($konek, "UPDATE pengaduan SET status = '$status' WHERE id_pengaduan = '$id'");        
        echo"<script>alert('verifikasi pengaduan berhasil'); document.location = '?page=daftar_pengaduan';</script>";
}elseif (isset($_POST['status'])) {
        $status = $_POST['status'];
        mysqli_query($konek, "UPDATE pengaduan SET status = '$status' WHERE id_pengaduan = '$id'");        

    }
    
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaduan</h1>
</div>
<!-- row content -->
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class=" mb-4 py-3 border-bottom-primary ">
            <div class="chard-header d-sm-flex justify-content-between">
              <div class="card-body">
                <h3>Detail Pengaduan</h3>
                </div>



<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5>Berikan Tanggapan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post">
          <div class="modal-body">
              <input type="hidden" name="tgl" value="<?php echo $tgl; ?>">
              <input type="hidden" name="id_petugas" value="<?php echo $_SESSION['petugas']['id_petugas']; ?>">
              <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan']; ?>">
              <textarea name="tanggapan" class="form-control"></textarea>
              <input type="hidden" name="status" value="selesai">
          </div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <input type="submit" name="submit" class="btn btn-success">
          </div>
      </form>
    </div>
  </div>
</div>
<?php
  $q = $data['status'];
  if ($q == "selesai") {
       echo '<div style="margin-right: 20px"><span class="btn btn-danger">SUDAH DITANGGAPI</span></div>';
  }elseif ($q != "selesai") {
      echo '<form method="post"><div><a class="btn btn-success" href="#" data-toggle="modal" data-target="#verifikasiModal">Tanggapi</a><input type="hidden" name="status" value="selesai"></div></form>';
  }


?>

            </div>
        </div>
        <div class="card-body">
                <h5>Nama : <?php echo $data['nama'];?></h5>
                <h5>Tanggal : <?php echo $data['tgl_pengaduan'];?></h5>
                <h5>Status : <?php echo $data['status'];?></h5>
                <h5>Isi Laporan : <?php echo $data['isi_lapor'];?></h5>
                <h5>Lampiran :</h5>
                <img src="../img/<?php echo $data['foto']?>" class="col-12">
        </div>
    </div>