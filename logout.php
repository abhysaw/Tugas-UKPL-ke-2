<?php
session_start();
session_destroy();
	echo"<script>
	alert('Terima kasih atas kunjungannya, kembali ke login ');
	window.location.href='index.php';
	</script>";
?>