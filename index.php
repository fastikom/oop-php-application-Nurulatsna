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
  <a href="#" class="active">Buku</a>
  <a href="anggota.php">Anggota</a>
  </div>
  <div class="col-sm-9 putih">
  	<h2>Daftar Buku yang Tersedia</h2>
<table class="table table-bordered">
<tr>
<td>Kode Buku</td>
<td>Judul Buku</td>
<td>Pengarang Buku</td>
<td>Penerbit Buku</td>
<td>Delete</td>
<td>Edit</td>
</tr>
<?php
require("fungsi.php");
$Lib = new Library();
$show = $Lib->tampildata();
while($data = mysql_fetch_array($show)){
echo "
<tr>
<td>$data[kodeBuku]</td>
<td>$data[judulBuku]</td>
<td>$data[pengarang]</td>
<td>$data[penerbit]</td>
<td><a class='btn btn-danger' href='list.php?delete=$data[kodeBuku]'>Delete</a></td>
<td><a class='btn btn-info' href='edit.php?kode=$data[kodeBuku]'>Edit</td>
</tr>";
};
?>
</table>

<div >
<hr>
<h2>Tambah Buku Baru</h2>
<form  method="get" class="form-group row">
<div class="form-group">
      <label class="col-sm-2 control-label">Kode Buku:</label>
      <div class="col-sm-10">
        <input type="text" name="kode" class="form-control"><br>
      </div>
 </div>
<div class="form-group">
      <label class="col-sm-2 control-label">Judul Buku:</label>
      <div class="col-sm-10">
        <input type="text" name="judul" class="form-control"><br>
      </div>
</div>
<div class="form-group">
      <label class="col-sm-2 control-label">Pengarang Buku:</label>
      <div class="col-sm-10">
        <input type="text" name="pengarang" class="form-control"><br>
      </div>
</div>
<div class="form-group">
      <label class="col-sm-2 control-label">Penerbit Buku: </label>
      <div class="col-sm-10">
        <input type="text" name="penerbit" class="form-control"><br>
      </div>
</div>
<div class="form-group"><input type="submit" name="tambahdata" value="Tambah Buku" class="btn btn-danger"> <input type="reset" value="Reset" class="btn btn-success"></div>

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

if(isset($_GET['tambahdata'])){
$kode = $_GET['kode'];
$judul = $_GET['judul'];
$pengarang = $_GET['pengarang'];
$penerbit = $_GET['penerbit'];
 
$Lib = new library();
$add = $Lib->tambahdata($kode, $judul, $pengarang, $penerbit);
if($add == "Success"){
header('Location: List.php');
}
}
?>