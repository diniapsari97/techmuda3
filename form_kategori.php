<?php
//buat array scalar untuk master data gender dan status
//buat assosiatif lebih dari 1 untuk master data jabatan

$obj = new KategoriModel();

$idedit = $_REQUEST['idedit'];
$obj2 = new KategoriModel();
if (!empty($idedit)){
  //ini untuk modus edit data lama yang ditampilkan di form u/ diedit
  $row = $obj2->view([$idedit]);
}
else{
  //ini untuk modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}


?>


<form method="POST" action="controllerKategori.php">

  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama</label> 
    <div class="col-7">
      <input id="nama" name="nama" type="text" required="required" class="form-control" value="<?= $row['nama'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-5 col-7">
      <?php
      if(empty($idedit)){ //modus entry data baru
      ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>

      <?php 
      }
      else{ //modus edit data lama
     ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <input type="hidden" name="idx" value="<?= $idedit ?>"/>
     <?php } ?>

     <button name="proses" value="batal" type="submit" class="btn btn-danger">Batal</button>
    </div>
  </div>
</form>
