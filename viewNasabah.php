<?php
//request 
$id = $_GET['idnas'];
$model = new NasabahModel();
$rs = $model->view([$id]);
//print_r($rs) ; exit; //(untuk mengecek masuk apa tidak)
foreach ($rs as $nas) {
	$nama = $nas['nama'];

}
?>

<div class="card" style="width: 15rem;">
  <img src="images/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <hr/>
  <div class="card-body">
    <h3 class="card-title"><?= $rs['nama'] ?></h3>
    <p class="card-text">
    	Nama : <?= $rs['nama'] ?>
    	<br/> Jenis Kelamin : <?= $rs['jk'] ?>
    	<br/> Pekerjaan : <?= $rs['pekerjaan'] ?>
    	<br/> NPWP      : <?= $rs['npwp'] ?>
    	<br/> HP : <?= $rs['hp'] ?>
    	<br/> Alamat : <?= $rs['alamat'] ?>
      <br/> Foto : <?= $rs['foto'] ?>


    </p>
    <a href="index.php?hal=nasabah" class="btn btn-primary">kembali</a><br/>
  </div>
</div>