<?php
function autentikasi(){
	if(!isset($_SESSION['sudah_login'])){
		echo"<script>
		alert('Anda harus login terlebih dahulu !!!');
	window.location.href='index.php';
	</script>";
	}
}
?>