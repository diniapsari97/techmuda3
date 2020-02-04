<?php
class LoginModel
{
	//member1 variabel
	public $koneksi;

	//member2 konstruktor
	public function __construct()
	{
		global $dbh; //panggil var di file lain ada di koneksi.php
		$this->koneksi = $dbh;
	}


	public function cekLogin($data){
		$sql = "SELECT * FROM user WHERE username = ? AND password = SHA1(?)";
		//prepare statement PDO
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		$rs = $ps->fetch();
		return $rs;
	}



}