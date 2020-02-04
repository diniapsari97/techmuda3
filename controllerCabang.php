<?php
include_once 'koneksi.php';
include_once 'CabangModel.php';
//tangkap request form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];


//gabungkan var di atas ke array
$data = [
	$kode, // ? 1
	$nama, // ? 2
	$alamat // ? 3

];
//panggil fungsi simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model1 = new CabangModel();
switch ($proses) {
	case 'simpan':
		$model1->simpan($data);
		break;
	case 'ubah':
		//tangkap request idx u/ ? ke-4
		$data[] = $_POST['idx'];
		$model1->ubah($data);
		break;
	case 'hapus':
		$id[] = $_POST['idx'];
		$model1->hapus($id);
		break;
	default:
		//dikembalikan ke halaman kategori
		header('location:index.php?hal=cabang');
}
header('location:index.php?hal=cabang');