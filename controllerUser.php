<?php
include_once 'koneksi.php';
include_once 'UserModel.php';
//tangkap request form 
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$role = $_POST['role'];
$foto = $_POST['foto'];
//gabungkan var di atas ke array
$data = [
	$fullname, // ? 1
	$username, // ? 2
	$password, // ? 3
	$email, // ? 4
	$role, // ? 5
	$foto, // ? 6
	];
//tangkap request tombol2
$proses = $_POST['proses'];
$model = new UserModel();


//panggil fungsi simpan di UserModel.php
switch($proses) {
    case 'simpan':
    	$model->simpan($data);
        break;
    case 'ubah':
    	//tangkap request idx u/ ? ke 9
    	$data[] = $_POST['idx'];
    	$model->ubah($data);
    	break;
    case 'hapus':
    	$id = $_POST['idx'];
    	$model->hapus([$id]);
    	break;
    default:
    	//kembali ke halaman user
    	header('location:index.php?hal=user');
    	
}



//kembalikan ke halaman user
header('location:index.php?hal=user');