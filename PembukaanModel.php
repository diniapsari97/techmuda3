<?php
class PembukaanModel
{
	//member1 variabel
	public $koneksi;

	//member2 konstruktor
	public function __construct()
	{
		global $dbh; //panggil var di file lain ada di koneksi.php
		$this->koneksi = $dbh;
	}

	//member3 method/fungsi/behavior
	//fungsi2 CRUD
	public function getAll(){
		//$sql = "SELECT * FROM pembukaan";
		$sql = "SELECT pembukaan.*, nasabah.nama AS nama_nasabah, kategori.nama AS nama_kategori, cabang_bank.nama_cab AS nama_cabang, cs.nama AS nama_teller FROM pembukaan 
		INNER JOIN nasabah ON nasabah.id = pembukaan.nasabah_id 
		INNER JOIN kategori ON kategori.id = pembukaan.kategori_id 
		INNER JOIN cabang_bank ON cabang_bank.id = pembukaan.cabang_bank_id 
		INNER JOIN cs ON cs.id = pembukaan.teller_id
		ORDER BY id DESC";

		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function cari($keyword){
		//$sql = "SELECT * FROM pembukaan";
		$sql = "SELECT pembukaan.*, nasabah.nama AS nama_nasabah, kategori.nama AS nama_kategori, cabang_bank.nama_cab AS nama_cabang, cs.nama AS nama_teller FROM pembukaan 
		INNER JOIN nasabah ON nasabah.id = pembukaan.nasabah_id 
		INNER JOIN kategori ON kategori.id = pembukaan.kategori_id 
		INNER JOIN cabang_bank ON cabang_bank.id = pembukaan.cabang_bank_id 
		INNER JOIN cs ON cs.id = pembukaan.teller_id
		WHERE nasabah.nama LIKE '%$keyword%' ORDER BY id DESC";

		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function filter($idkat){
		//$sql = "SELECT * FROM pegawai";
		$sql = "SELECT pembukaan.*, nasabah.nama AS nama_nasabah, kategori.nama AS nama_kategori, cabang_bank.nama_cab AS nama_cabang, cs.nama AS nama_teller FROM pembukaan 
		INNER JOIN nasabah ON nasabah.id = pembukaan.nasabah_id 
		INNER JOIN kategori ON kategori.id = pembukaan.kategori_id 
		INNER JOIN cabang_bank ON cabang_bank.id = pembukaan.cabang_bank_id 
		INNER JOIN cs ON cs.id = pembukaan.teller_id
		WHERE pembukaan.kategori_id = ? ORDER BY id DESC";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($idkat);
		$rs = $ps->fetchAll();
		return $rs;
	}


	public function view($id){
		//$sql = "SELECT * FROM pembukaan WHERE id=?";

		$sql = "SELECT pembukaan.*, nasabah.nama AS nama_nasabah, kategori.nama AS nama_kategori, cabang_bank.nama_cab AS nama_cabang, cs.nama AS nama_teller FROM pembukaan 
		INNER JOIN nasabah ON nasabah.id = pembukaan.nasabah_id 
		INNER JOIN kategori ON kategori.id = pembukaan.kategori_id 
		INNER JOIN cabang_bank ON cabang_bank.id = pembukaan.cabang_bank_id 
		INNER JOIN cs ON cs.id = pembukaan.teller_id
		WHERE pembukaan.id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;
		
	}
	public function simpan($data){ //sesuai controler pembukaan
		$sql = "INSERT INTO pembukaan (tgl,nasabah_id,norek,saldo,kategori_id,cabang_bank_id,teller_id) VALUES (?,?,?,?,?,?,?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}


	public function ubah($data){ //sesuai controler pegawai
		$sql = "UPDATE pembukaan SET tgl=?,nasabah_id=?,norek=?,saldo=?,kategori_id=?,cabang_bank_id=?,teller_id=? WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}

	public function hapus($id){ //sesuai controler pegawai
		$sql = "DELETE FROM pembukaan WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		
	}




}