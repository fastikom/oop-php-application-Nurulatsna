<?php
include"koneksi.php";
class Library {
	var $kode;
    var $judul;
    var $pengarang;
    var $penerbit;

    function tampildata() {
        $query = "select * from buku";
        $result = @mysql_query($query) or die(mysql_error());
        return $result;
    }
    function tambahdata($kode,$judul, $pengarang, $penerbit) {
        $query = "INSERT INTO buku(kodeBuku,judulBuku, pengarang, penerbit) VALUES ('$kode','$judul','$pengarang','$penerbit')";
        $result = @mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:index.php');
        } else {
            die("Data gagal Disimpan");
        }
    }
    function editdata($kode) {
        $query = "select * from buku where kodeBuku='$kode'";
        $result = @mysql_query($query) or die(mysql_error());
        return $result;
    }
    function prosesedit($kode, $judul, $pengarang, $penerbit) {
        $query = "UPDATE buku SET judulBuku='$judul', pengarang='$pengarang',penerbit='$penerbit' WHERE kodeBuku='$kode'";
        $result = @mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:index.php');
        } else {
            die("Data gagal Disimpan");
        }
    }
    function hapusdata($kode) {
        $query = "DELETE FROM buku WHERE kodeBuku='$kode'";
        $result = @mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:index.php');
        } else {
            die("data gagal dihapus");
        }
    }
    function caridata($cari) {
        $query = "select * from anggota where nama like '%$cari%' or alamat like '%$cari%' or telpon like '%$cari%'";
        $result = @mysql_query($query) or die(mysql_error());
        return $result;
    }
}
class Anggota {
    var $nama;
    var $alamat;
    var $telpon;

    function tampildata() {
        $query = "select * from anggota";
        $result = @mysql_query($query) or die(mysql_error());
        return $result;
    }
    function tambahdata($nama, $alamat, $telpon) {
        $query = "INSERT INTO anggota(nama, alamat, telp) VALUES ('$nama','$alamat','$telpon')";
        $result = @mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:anggota.php');
        } else {
            die("Data gagal Disimpan");
        }
    }
    function editdata($id) {
        $query = "select * from anggota where id='$id'";
        $result = @mysql_query($query) or die(mysql_error());
        return $result;
    }
    function prosesedit($id, $nama, $alamat, $telpon) {
        $query = "UPDATE anggota SET nama='$nama', alamat='$alamat',telp='$telpon' WHERE id='$id'";
        $result = @mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:anggota.php');
        } else {
            die("Data gagal Disimpan");
        }
    }
    function hapusdata($id) {
        $query = "DELETE FROM anggota WHERE id='$id'";
        $result = @mysql_query($query) or die(mysql_error());
        if ($result) {
            header('location:anggota.php');
        } else {
            die("data gagal dihapus");
        }
    }
    function caridata($cari) {
        $query = "select * from anggota where nama like '%$cari%' or alamat like '%$cari%' or telpon like '%$cari%'";
        $result = @mysql_query($query) or die(mysql_error());
        return $result;
    }
}
?>