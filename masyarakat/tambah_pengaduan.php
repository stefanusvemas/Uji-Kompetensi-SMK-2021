<?php
if (isset($_POST['submit'])) {
    $tanggal= date('Y-m-d');
    $isi_laporan= $_POST['isi_lapor'];
    $foto= $_FILES['foto'];
    $nama_foto= $foto['name'];
    $nik = $_POST['nik'];
    $status = $_POST['status'];

    $tambah = mysqli_query($konek," INSERT INTO pengaduan (id_pengaduan, tgl_pengaduan, nik, isi_lapor, foto, status) VALUES ('', '$tanggal', '$nik', '$isi_laporan', '$nama_foto', '$status')");
    move_uploaded_file($foto['tmp_name'], '../img/'.$nama_foto);
    echo"<script>alert('tambah data'); document.location = '?page=pengaduan';</script>";
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Pengaduan</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <div class="from-group">
        <label>Isi laporan</label>
        <textarea name="isi_lapor"class="form-control"></textarea>
    </div>
    <div class="from-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="from-group">
        <input type="hidden" name="nik" class="form-control" value="<?php echo $_SESSION['masyarakat']['nik'];?>">
        <input type="hidden" name="status" class="form-control" value="proses">
    </div>
        <br>
        <input type="submit" name="submit" class="btn btn-success btn-user btn-block" value="tambah">
</form>