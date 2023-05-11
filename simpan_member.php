<?php
include "db_conn.php";
$kon = db_connect();
//echo"<pre>";
//print_r($_REQUEST);
//exit;

$nama = $_REQUEST['nama'];
$tinggi_badan = $_REQUEST['tinggi_badan'];
$berat_badan = $_REQUEST['berat_badan'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$query = mysqli_query($kon, "Insert Into member values ('','$nama','$tinggi_badan','$berat_badan','$username','$password','0','aktif')") or die(mysqli_error($kon));

if($query){
	
	echo"<script>
		alert('Data berhasil disimpan, silahkan login');
	window.location.href='index.php';
	</script>";
}else{
	echo"<script>alert('data gagal disimpan,silahkan ulangi pendaftaran !');
	window.location.href='form_register.php';
	</script>";
}
?>