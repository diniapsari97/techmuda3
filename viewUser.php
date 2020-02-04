<?php
//request 

$id = $_GET['iduser'];
$model = new UserModel();
$rs = $model->view([$id]);
//print_r($rs) ; exit; //(untuk mengecek masuk apa tidak)
foreach ($rs as $user) {
	$fullname = $user['fullname'];

}

$sesi = $_SESSION['MEMBER'];
if($sesi['id'] == $id || $sesi['role'] == 'administrator'){
?>

<div class="card" style="width: 30rem;">
  <img src="images/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <hr/>
  <div class="card-body">
    <h3 class="card-title"><?= $rs['fullname'] ?></h3>
    <p class="card-text">
    	Username : <?= $rs['username'] ?>
    	<br/> Password : <?= $rs['password'] ?>
    	<br/> Email : <?= $rs['email'] ?>
    	<br/> Jabatan : <?= $rs['role'] ?>
    	<br/> Foto : <?= $rs['foto'] ?>
    	


    </p>
    <?php 
    if($sesi['role'] != 'nasabah'){ 
    ?>
    <a href="index.php?hal=user" class="btn btn-primary">kembali</a>

    <?php } ?>

  </div>
</div>

<?php }
else{
  include_once 'terlarang.php';
} ?>
