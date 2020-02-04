<?php
include_once 'koneksi.php';
include_once 'NasabahModel.php';
//tangkap request form 
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$pek = $_POST['pek'];
$npwp = $_POST['npwp'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];

//gabungkan var di atas ke array
$data = [
	$nik, // ? 1
	$nama, // ? 2
	$jk, // ? 3
	$pek, // ? 4
	$npwp, // ? 5
	$hp, // ? 6
	$alamat, // ? 7
	$foto // ? 8
];
//panggil fungsi simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model1 = new NasabahModel();
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
		header('location:index.php?hal=nasabah');
}
header('location:index.php?hal=nasabah');