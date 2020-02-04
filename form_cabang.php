<?php
//............proses ubah data................
//tangkap reques idedit di url
$idedit = $_REQUEST['idedit'];
$obj = new CabangModel();
if (!empty($idedit)){
  //ini untuk modus edit data lama yang ditampilkan di form u/ diedit
  $row = $obj->view([$idedit]);
}
else{
  //ini untuk modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}


?>


<form method="POST" action="controllerCabang.php">

  <div class="form-group row">
    <label for="kode" class="col-5 col-form-label">Kode</label> 
    <div class="col-7">
      <input id="kode" name="kode" type="text" required="required" class="form-control" value="<?= $row['kode_cab'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama</label> 
    <div class="col-7">
      <input id="nama" name="nama" type="text" required="required" class="form-control" value="<?= $row['nama_cab'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Alamat</label> 
    <div class="col-7">
      <input id="alamat" name="alamat" type="text" required="required" class="form-control" value="<?= $row['alamat_cab'] ?>">
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

