<?php
class CabangModel
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
		$sql = "SELECT * FROM cabang_bank";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}


	public function filter($idcab){
		//$sql = "SELECT * FROM pegawai";
		$sql = "SELECT cabang.*, cs.nama AS nama_cs FROM pegawai INNER JOIN jabatan ON    
				jabatan.id = pegawai.idjabatan WHERE pegawai.idjabatan = ? ORDER BY id DESC ";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($idcab);
		$rs = $ps->fetchAll();
		return $rs;
	}


	public function view($id){
		$sql = "SELECT * FROM cabang_bank WHERE id=?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs = $ps->fetch();
		return $rs;
		
	}


	public function simpan($data){ 
		$sql = "INSERT INTO cabang_bank(kode_cab,nama_cab,alamat_cab) VALUES (?,?,?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		
	}

	public function ubah($data){
		$sql = "UPDATE cabang_bank SET kode_cab=?,nama_cab=?,alamat_cab=? WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
	}		

	public function hapus($id){
		$sql = "DELETE FROM cabang_bank WHERE id = ?";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($id);
	}





}