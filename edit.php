<?php
require('fungsi.php');
 
if(isset($_GET['kode'])){
$Lib = new library();
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
	.biru a: hover{
		color: green;
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
  </div>
   <div class="col-sm-9 putih">
<h2>Ubah Data Buku</h2>
<form action="edit.php" method="POST" class="form-group">
Kode Buku: <input type="text" name="kode" value="'.$edit['kodeBuku'].'" class="form-control"><br>
Judul Buku: <input type="text" name="judul" value="'.$edit['judulBuku'].'" class="form-control"><br>
Pengarang Buku: <input type="text" name="pengarang" value="'.$edit['pengarang'].'" class="form-control"><br>
Penerbit Buku: <input type="text" name="penerbit" value="'.$edit['penerbit'].'" class="form-control"><br>
<input type="submit" name="update" value="Update" class="btn btn-info">
</form>
</div>
</div>
</body>
</html>
';
}
 
if(isset($_POST['update'])){
$kode = $_POST['kode'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
 
$Lib = new library();
$upd = $Lib->prosesedit($kode, $judul, $pengarang, $penerbit);
if($upd == "Success"){
header('Location: list.php');
}
}
 
?>