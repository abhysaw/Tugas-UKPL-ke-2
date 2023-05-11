<?php
function db_connect(){
	$conn = mysqli_connect("localhost","root","","fitness");
	
	if (mysqli_connect_errno()){
		echo"Gagal koneksi ke database : ".mysqli_connect_error();
	}else{
		
		return $conn;
	}
}
?>