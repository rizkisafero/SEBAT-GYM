<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "SELECT * FROM membership WHERE id='".$id."'";
$sql = mysqli_query($koneksi, $query); 
$data = mysqli_fetch_array($sql);  eksekusi $sql

// Query untuk menghapus datayang dikirim
$query2 = "DELETE FROM membership WHERE id='".$id."'";
$sql2 = mysqli_query($koneksi, $query2); 

if($sql2){
	header("location: data.php");
}else{
	echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>

