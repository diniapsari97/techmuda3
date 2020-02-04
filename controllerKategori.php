<?php
include_once 'koneksi.php';
include_once 'KategoriModel.php';
//tangkap request form 
$nama = $_POST['nama'];


//gabungkan var di atas ke array
$data = [
	$nama, // ? 1

];
//panggil fungsi simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model1 = new KategoriModel();
switch ($proses) {
	case 'simpan':
		$model1->simpan($data);
		break;
	case 'ubah':
		//tangkap request idx u/ ? ke-2
		$data[] = $_POST['idx'];
		$model1->ubah($data);
		break;
	case 'hapus':
		$id[] = $_POST['idx'];
		$model1->hapus($id);
		break;
	default:
		//dikembalikan ke halaman kategori
		header('location:index.php?hal=kategori');
}
header('location:index.php?hal=kategori');