<?php
class UserModel
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
		$sql = "SELECT * FROM user";
				//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function view($id){
		$sql = "SELECT * FROM user WHERE id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;
	}


	public function simpan($data){ //sesuai controler user
		$sql = "INSERT INTO user (fullname,username,password,email,role,foto) VALUES (?,?,SHA1(?),?,?,?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}

	public function ubah($data){ //sesuai controler user
		$sql = "UPDATE user SET fullname=?,username=?,password=SHA1(?),email=?,role=?,foto=? WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}

	public function hapus($id){ //sesuai controler user
		$sql = "DELETE FROM user WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		
	}


}