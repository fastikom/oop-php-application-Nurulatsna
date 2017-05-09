<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Perpustakaan</title>
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
  <a href="index.php" class="active">Buku</a>
  <a href="anggota.php">Anggota</a>
  </div>
  <div class="col-sm-9 putih">
  	<h2>Daftar Anggota</h2>
<table class="table table-bordered">
<tr>
<td>Id</td>
<td>Nama</td>
<td>Alamat</td>
<td>Telepon</td>
<td colspan="2">Aksi</td>

</tr>
<?php
require("fungsi.php");
$Lib = new Anggota();
$show = $Lib->tampildata();
while($data = mysql_fetch_array($show)){
echo "
<tr>
<td>$data[id]</td>
<td>$data[nama]</td>
<td>$data[alamat]</td>
<td>$data[telp]</td>
<td><a class='btn btn-danger' href='anggota.php?delete=$data[id]'>Delete</a></td>
<td><a class='btn btn-info' href='editA.php?kode=$data[id]'>Edit</td>
</tr>";
};
?>
</table>

<div >
<hr>
<h2>Tambah Anggota</h2>
<form  method="get" class="form-group row">
<div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" name="nama" class="form-control"><br>
      </div>
 </div>
<div class="form-group">
      <label class="col-sm-2 control-label">Alamat</label>
      <div class="col-sm-10">
        <input type="text" name="alamat" class="form-control"><br>
      </div>
</div>
<div class="form-group">
      <label class="col-sm-2 control-label">Telepon</label>
      <div class="col-sm-10">
        <input type="text" name="telepon" class="form-control"><br>
      </div>
</div>

<div class="form-group"><input type="submit" name="tambah" value="Tambah" class="btn btn-danger"> <input type="reset" value="Reset" class="btn btn-success"></div>

</form>
</div>
  </div>
</div>


</div>
</html>
 
<?php
if(isset($_GET['delete'])){
$del = $Lib->hapusdata($_GET['delete']);
 
}

if(isset($_GET['tambah'])){

$nama = $_GET['nama'];
$alamat = $_GET['alamat'];
$telepon = $_GET['telepon'];
 
$Lib = new Anggota();
$add = $Lib->tambahdata($nama, $alamat, $telepon);
if($add == "Success"){
header('Location: anggota.php');
}
}
?>