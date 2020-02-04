<?php
//buat array scalar untuk master data gender dan status

//buat assosiatif lebih dari 1 untuk master data jabatan
$ar_jabatan = ['administrator','teller','nasabah'];
$obj = new UserModel();
$rs = $obj->getAll();
//-------------proses ubah data---------------//
//--tangkap request idedit di pegawai URL----//
$idedit = $_REQUEST['idedit'];
$obj2 = new UserModel();
if(!empty($idedit)){
  //edit data lama yang ditampilkan di form//
  $row = $obj2-> view([$idedit]);
}
else{
  //tetap dalam keadaan kosong kalo tidak ada data//
  $row = [];
}


?>










<form method="POST" action="controllerUser.php">
  <div class="form-group row">
    <label for="fullname" class="col-5 col-form-label">Nama Lengkap</label> 
    <div class="col-7">
      <input id="fullname" name="fullname" value="<?= $row['fullname'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="username" class="col-5 col-form-label">Username</label> 
    <div class="col-7">
      <input id="username" name="username" value="<?= $row['username'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-5 col-form-label">Password</label> 
    <div class="col-7">
      <input id="password" name="password" value="<?= $row['password'] ?>" type="password" required="required" class="form-control">
    </div>
  </div>

<div class="form-group row">
    <label for="email" class="col-5 col-form-label">Email</label> 
    <div class="col-7">
      <input id="email" name="email" value="<?= $row['email'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-5">Jabatan</label> 
    <div class="col-7">
      <?php 
      $no = 0;
        foreach ($ar_jabatan as $jab){
         $cek = ($jab == $row['role']) ? "checked" : "";
        ?>
      <div class="custom-control custom-radio custom-control-inline">
            
        <input name="role" id="role_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $jab ?>" <?= $cek ?>>
        <label for="role_<?= $no ?>" class="custom-control-label"><?= $jab ?></label>

      </div>
      <?php $no++; } ?>
    </div>
  </div>



  
  
  

  <div class="form-group row">
    <label for="foto" class="col-5 col-form-label">Foto</label> 
    <div class="col-7">
      <input id="foto" name="foto" value="<?= $row['foto']?>" type="text" class="form-control">
    </div>
  </div> 



  
  <div class="form-group row">
    <div class="offset-5 col-7">


      <?php
      if(empty($idedit)){ //entry data baru
      ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
      <?php
      }
      else{ //edit data lama
      ?>

      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <input type="hidden" name="idx" value="<?= $idedit ?>"/>
      <?php } ?>

      <button name="proses" value="batal" type="submit" class="btn btn-warning">Batal</button>

    </div>
  </div>
</form>
