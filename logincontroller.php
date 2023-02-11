<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// mengambil data yang dikirim dari form file login.php
$username = $_POST['username'];

//hash password dengan md5
$password = md5($_POST['password']);
 
// memilih data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi,"SELECT * FROM users where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user login
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['status'] = "sudah_login";
	$_SESSION['id_login'] = $data['id'];
	header("location:index.php");
} else {
	header("location:login.php?pesan=gagal login data tidak ditemukan.");
}
?>