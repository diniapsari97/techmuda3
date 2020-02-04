<?php
if(isset($_SESSION['MEMBER'])){
//request 
$id = $_GET['idpem'];
$model = new PembukaanModel();
$rs = $model->view([$id]);
//print_r($rs) ; exit; //(untuk mengecek masuk apa tidak)
foreach ($rs as $pem) {
	$nama = $pem['nama'];

}
?>

<div class="card" style="width: 30rem;">
  
  <div class="card-body">
    <h3 class="card-title"><?= $rs['nama'] ?></h3>
    <p class="card-text">
    	Nasabah Id : <?= $rs['nama_nasabah'] ?>
    	<br/> No Rekening : <?= $rs['norek'] ?>
    	<br/> Saldo : <?= $rs['saldo'] ?>
    	<br/> Kategori id : <?= $rs['nama_kategori'] ?>
    	<br/> Cabang Bank id : <?= $rs['nama_cabang'] ?>
    	<br/> Teller ID : <?= $rs['nama_teller'] ?>


    </p>
    <?php
    if($sesi['role'] != 'nasabah'){
    ?>

    <a href="index.php?hal=pembukaan" class="btn btn-primary">kembali</a>

    <?php } ?>

  </div>
</div>

<?php 
}
else{
  include_once 'terlarang.php';
}
?>