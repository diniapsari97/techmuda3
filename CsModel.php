<?php
class CsModel
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
		$sql = "SELECT * FROM cs";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function cari($keyword){
		//$sql = "SELECT * FROM cs";
		$sql = "SELECT * FROM cs WHERE cs.nama LIKE '%$keyword%' ORDER BY id DESC";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}


	public function view($id){
		$sql = "SELECT * FROM cs WHERE id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;
		
	}


	public function simpan($data){ //sesuai controler pembukaan
		$sql = "INSERT INTO cs(nip,nama,jenis_kelamin,foto) VALUES (?,?,?,?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}

	public function ubah($data){
		$sql = "UPDATE cs SET nip=?,nama=?,jenis_kelamin=?,foto=? WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}		

	public function hapus($id){
		$sql = "DELETE FROM cs WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
	}





}