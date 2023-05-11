<?php
include 'db_conn.php';
session_start();
// echo"<pre>";
// print_r($_REQUEST);
// exit;

$kon = db_connect();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$query = mysqli_query($kon,"SELECT * from member where username='$username'and password='$password'");

$result = mysqli_fetch_object($query);
// echo"<pre>";
// print_r($result);
// exit;
if(mysqli_num_rows($query)>0 and $result->username==$username and $result->password==$password and $result->status == 'aktif' ){
	$_SESSION['sudah_login'] = TRUE;
	$query_update=mysqli_query($kon,"UPDATE member SET percobaan='0' WHERE username = '$username'");
			echo"<script>
		alert('Anda berhasil login . . . ');
	window.location.href='Dashboard.php';
	</script>";
}else{
	$query_select = mysqli_query($kon,"SELECT * FROM member where username='$username'");
	$result_select = mysqli_fetch_object($query_select);
	if(mysqli_num_rows($query_select) > 0){
		$percobaan = $result_select->percobaan + 1;
		if($percobaan>=3){
			$query_update=mysqli_query($kon,"UPDATE member SET status='nonaktif' WHERE username = '$username'");
		}
		
		$query_update=mysqli_query($kon,"UPDATE member SET percobaan='$percobaan' WHERE username = '$username'");
	}
	echo"<script>
	alert('Anda Gagal login ');
	window.location.href='index.php';
	</script>";
}

?>