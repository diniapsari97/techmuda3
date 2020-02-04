<?php
include_once 'koneksi.php';
include_once 'CsModel.php';
//tangkap request form 
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$foto = $_POST['foto'];

//gabungkan var di atas ke array
$data = [
	$nip, // ? 1
	$nama, // ? 2
	$jk, // ? 3
	$foto // ? 4
];
//panggil fungsi simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model1 = new CsModel();
switch ($proses) {
	case 'simpan':
		$model1->simpan($data);
		break;
	case 'ubah':
		//tangkap request idx u/ ? ke-9
		$data[] = $_POST['idx'];
		$model1->ubah($data);
		break;
	case 'hapus':
		$id[] = $_POST['idx'];
		$model1->hapus($id);
		break;
	default:
		//dikembalikan ke halaman pegawai
		header('location:index.php?hal=cs');
}
header('location:index.php?hal=cs');