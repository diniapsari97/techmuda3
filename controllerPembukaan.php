<?php
include_once 'koneksi.php';
include_once 'PembukaanModel.php';
//tangkap request form 
$tgl = $_POST['tgl'];
$nama = $_POST['nama'];
$norek = $_POST['norek'];
$saldo = $_POST['saldo'];
$kategori = $_POST['kategori'];
$cabang = $_POST['cabang'];
$cs = $_POST['cs'];

//gabungkan var di atas ke array
$data = [
	$tgl, // ? 1
	$nama, // ? 2
	$norek, // ? 3
	$saldo, // ? 4
	$kategori, // ? 5
	$cabang, // ? 6
	$cs // ? 7
];
//panggil fungsi simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model = new PembukaanModel();

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
    	//kembali ke halaman pembukaan
    	header('location:index.php?hal=pembukaan');
    	
}


//kembalikan ke halaman pegawai
header('location:index.php?hal=pembukaan');