<?php
class NasabahModel
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
		$sql = "SELECT * FROM nasabah";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function getKategori(){
		$sql = "SELECT * FROM kategori";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function getCabang(){
		$sql = "SELECT * FROM cabang_bank";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function getNasabah(){
		$sql = "SELECT * FROM nasabah";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function getCustomer(){
		$sql = "SELECT * FROM cs";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function view($id){
		$sql = "SELECT * FROM nasabah WHERE id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;
		
	}


	public function simpan($data){ //sesuai controler pembukaan
		$sql = "INSERT INTO nasabah(nik,nama,jk,pekerjaan,npwp,hp,alamat,foto) VALUES (?,?,?,?,?,?,?,?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}

	public function ubah($data){
		$sql = "UPDATE nasabah SET nik=?,nama=?,jk=?,pekerjaan=?,npwp=?,hp=?,alamat=?,foto=?
		WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}		

	public function hapus($id){
		$sql = "DELETE FROM nasabah WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
	}





}