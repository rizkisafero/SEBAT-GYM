<?php
include "koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$biaya = 100000;
$order_id= rand();
$transaction_status= 1;

mysqli_query($koneksi,"insert into membership  values('','$nama','$alamat','$biaya','$order_id','$transaction_status','$email')");
 
header("location:./midtrans/examples/snap/checkout-process-simple-version.php?order_id");


?>


