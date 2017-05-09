<?php
require('fungsi.php');
 
if(isset($_GET['kode'])){
$Lib = new Anggota();
$book = $Lib->editdata($_GET['kode']);
$edit = mysql_fetch_array($book);
echo '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>List Book</title>
<link rel="stylesheet" href="dir/css/bootstrap.min.css">
<script src="dir/js/bootstrap.min.js"></script>
<style type="text/css">
	.biru{
		 color:#fff !important; background-color:#b44441 !important;
		 height: 100%;
		padding-top: 60px;
		position: fixed; /* Stay in place */
	    z-index: 1; /* Stay on top */
	    top: 0;
	    left: 0;
	    overflow-x: hidden; /* Disable horizontal scroll */
	    box-shadow: 5px;
	}
	.biru a{
		padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 15px;
    color: #fff;
    display: block;
    transition: 0.3s;
	}
	.biru a:hover{
		background-color: white;
    color: #b44441;
	}
	.putih{
		margin-left: 350px;
		padding: 30px 30px 30px 30px;
	}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-3 biru">
  <h2>Sistem Informasi Perpustakaan</h2>
  <hr>
  <a href="#">Buku</a>
  <a href="#">Anggota</a>
  </div>
   <div class="col-sm-9 putih">
<h2>Ubah Data Anggota</h2>
<form action="editA.php" method="POST" class="form-group" >
Id: <input type="text" name="id" value="'.$edit['id'].'" class="form-control" Disable="Disable"><br>
Nama: <input type="text" name="nama" value="'.$edit['nama'].'" class="form-control"><br>
Alamat: <input type="text" name="alamat" value="'.$edit['alamat'].'" class="form-control"><br>
Telepon: <input type="text" name="telepon" value="'.$edit['telp'].'" class="form-control"><br>
<input type="submit" name="update" value="Update" class="btn btn-info">
</form>
</div>
</div>
</body>
</html>
';
}
 
if(isset($_POST['update'])){
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
 
$Lib = new Anggota();
$upd = $Lib->prosesedit($id, $nama, $alamat, $telepon);
if($upd == "Success"){
header('Location: anggota.php');
}
}
 
?>