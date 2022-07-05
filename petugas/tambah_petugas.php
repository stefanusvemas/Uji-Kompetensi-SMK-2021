<?php
if (isset($_POST['submit'])) {
    $nama= $_POST['nama_petugas'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $telp= $_POST['telp'];
    $level = $_POST['level'];

    $tambah = mysqli_query($konek," INSERT INTO petugas (id_petugas, nama_petugas, username, password, telp, level) VALUES ('', '$nama', '$username', '$password', '$telp', '$level')");
    echo"<script>alert('tambah petugas berhasil'); document.location = 'index.php';</script>";
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Petugas</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <div class="from-group">
        <label>nama</label>
        <input type="text" name="nama_petugas" class="form-control">
    </div>
    <div class="from-group">
        <label>username</label>        
        <input type="text" name="username" class="form-control">

    </div>
    <div class="from-group">
        <label>password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="from-group">
        <label>telp</label>
        <input type="password" name="telp" class="form-control">
    </div>
    <div class="from-group">
        <label>level</label>
        <select name="level" class="form-control">
            <option value="admin">admin</option>
            <option value="petugas">petugas</option>
        </select>
    </div>
        <br>
        <input type="submit" name="submit" class="btn btn-success btn-user btn-block" value="tambah">
</form>