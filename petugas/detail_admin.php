<?php
    ini_set('date.timezone','Asia/Jakarta');
    $tgl=date("Y-m-d");
    $id = $_GET['id'];
    $pengaduan = mysqli_query($konek," SELECT * FROM pengaduan INNER JOIN masyarakat on pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id'");
    $data = mysqli_fetch_array($pengaduan);

    
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
                <h3>Detail Pengaduan</h3>
                




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