<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM UMKM V.2023 - Pendaftaran UMKM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
 <h2>Pendaftaran Usaha Mikro, Kecil dan Menengah</h2>
 <form method="post">
 <div class="input-group mb-3">
    <span class="input-group-text">Nomor Registrasi</span>
    <input type="text" class="form-control" name="noregistrasi">
 </div>
 <div class="input-group mb-3">
    <span class="input-group-text">Nama UMKM</span>
    <input type="text" class="form-control" name="namaumkm">
 </div>
 <div class="input-group mb-3">
    <span class="input-group-text">Nama Pimpinan</span>
    <input type="text" class="form-control" name="pimpinan">
 </div>
 <div class="input-group mb-3">
    <span class="input-group-text">Alamat</span>
    <textarea class="form-control" rows="5" id="comment" name="alamat"></textarea>
 </div>
 <div class="input-group mb-3">
    <span class="input-group-text">No. Handphone / Telp.</span>
    <input type="text" class="form-control" name="nohp">
 </div>
 <div class="input-group mb-3">
    <span class="input-group-text">Password:</span>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
  </div>
 <button type="submit" class="btn btn-primary" name="bSimpan">Daftarkan</button>
 </form>
<?php
 if (isset($_POST['bSimpan'])) {
	 $noregistrasi = filter_var($_POST['noregistrasi'],FILTER_SANITIZE_STRING);
	 $namaumkm = filter_var($_POST['namaumkm'],FILTER_SANITIZE_STRING);
	 $pimpinan = filter_var($_POST['pimpinan'],FILTER_SANITIZE_STRING);
	 $alamat = filter_var($_POST['pimpinan'],FILTER_SANITIZE_STRING);
	 $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
	 $nohp = filter_var($_POST['nohp'],FILTER_SANITIZE_STRING);
	 include("koneksi.simumkm.php");$kunci="@!KripTo2023";
	 $sql="insert into umkm (noregistrasi,namaumkm,pimpinan,alamat,password,nohp) 
	       values 
		   ('".$noregistrasi."','".$namaumkm."','".$pimpinan."','".$alamat."',aes_encrypt('".$password."','".$kunci."'),'".$nohp."');";	  
	 $q=mysqli_query($koneksi,$sql);
     if ($q) {
		 echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Success!</strong> Rekord sukses disimpan !.
</div>';
	 } else {
		 echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Gagal!</strong> Rekord gagal disimpan !.
</div>';
	 }		 
 }
?>
</div>
</body>
</html>
