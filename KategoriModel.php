<?php
class KategoriModel
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
		$sql = "SELECT * FROM kategori";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}


	public function view($id){
		$sql = "SELECT * FROM kategori WHERE id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;
		
	}


	public function simpan($data){ //sesuai controler pembukaan
		$sql = "INSERT INTO kategori(nama) VALUES (?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}

	public function ubah($data){
		$sql = "UPDATE kategori SET nama=? WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}		

	public function hapus($id){
		$sql = "DELETE FROM kategori WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
	}





}