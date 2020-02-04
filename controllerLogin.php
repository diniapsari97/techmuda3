<?php
session_start();
include_once 'koneksi.php';
include_once 'LoginModel.php';
//tangkap request form 
$uname = $_POST['uname'];
$pass = $_POST['pass'];
//gabungkan var di atas ke array
$data = [
	$uname, // ? 1
	$pass // ? 2
	];

//panggil fungsi cekLogin di LoginModel.php
$model = new LoginModel();
$jml = $model->cekLogin($data);
//print_r('jumlah baris : '.$jml); exit;
if(!empty($jml)){ //sukses login
	$_SESSION['MEMBER'] = $jml;

//kembalikan ke halaman pembukaan
header('location:index.php?hal=home');

}
else { //gagal login
	echo '<script>
	alert("Maaf User/Password Anda Salah!!!Silahkan Login Kembali");
	history.go(-1);
    </script>';
}