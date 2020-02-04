<?php
//request 
$id = $_GET['idcs'];
$model = new CsModel();
$rs = $model->view([$id]);
//print_r($rs) ; exit; //(untuk mengecek masuk apa tidak)
foreach ($rs as $cs) {
	$nama = $cs['nama'];

}
?>

<div class="card" style="width: 15rem;">
  <img src="images/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <hr/>
  <div class="card-body">
    <h3 class="card-title"><?= $rs['nama'] ?></h3>
    <p class="card-text">
    	Nama : <?= $rs['nama'] ?>
      <br/> NIP : <?= $rs['nip'] ?>
    	<br/> Jenis Kelamin : <?= $rs['jenis_kelamin'] ?>
      <br/> Foto : <?= $rs['foto'] ?>


    </p>
    <a href="index.php?hal=cs" class="btn btn-primary">kembali</a><br/>
  </div>
</div>