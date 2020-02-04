<?php
//buat array scalar untuk master data gender dan status
//buat assosiatif lebih dari 1 untuk master data jabatan
$ar_gender = ['L','P'];
$ar_pekerjaan = ['PNS','Karyawan Swasta','Buruh','Wiraswasta','Lainnya'];
$obj = new NasabahModel();
$ar_kategori = $obj->getKategori();
$ar_cabang = $obj->getCabang();
$ar_nasabah = $obj->getNasabah();
$ar_customer = $obj->getCustomer();

$idedit = $_REQUEST['idedit'];
$obj2 = new NasabahModel();
if (!empty($idedit)){
  //ini untuk modus edit data lama yang ditampilkan di form u/ diedit
  $row = $obj2->view([$idedit]);
}
else{
  //ini untuk modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}


?>


<form method="POST" action="controllerNasabah.php">
  <div class="form-group row">
    <label for="nik" class="col-5 col-form-label">NIK</label> 
    <div class="col-7">
      <input id="nik" name="nik" type="text" required="required" class="form-control" value="<?= $row['nik'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama</label> 
    <div class="col-7">
      <input id="nama" name="nama" type="text" required="required" class="form-control" value="<?= $row['nama'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-5">Jenis Kelamin</label> 
    <div class="col-7">
      <?php 
      $no = 0;
        foreach ($ar_gender as $jk){
          $cek = ($jk == $row['jk']) ? "checked" : "";
        ?>
      <div class="custom-control custom-radio custom-control-inline">
            
        <input name="jk" id="jk_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $jk ?>" <?= $cek ?>> 
        <label for="jk_<?= $no ?>" class="custom-control-label"><?= $jk ?></label>

      </div>
      <?php $no++; } ?>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-5">Pekerjaan</label> 
    <div class="col-7">
      <?php 
      $no = 0;
        foreach ($ar_pekerjaan as $pek){
         $cek = ($pek == $row['pekerjaan']) ? "checked" : "";
        ?>
      <div class="custom-control custom-radio custom-control-inline">
            
        <input name="pek" id="pek_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $pek ?>" <?= $cek ?>>
        <label for="pek_<?= $no ?>" class="custom-control-label"><?= $pek ?></label>

      </div>
      <?php $no++; } ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="npwp" class="col-5 col-form-label">NPWP</label> 
    <div class="col-7">
      <input id="npwp" name="npwp" type="text" required="required" class="form-control" value="<?= $row['npwp'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="hp" class="col-5 col-form-label">HP</label> 
    <div class="col-7">
      <input id="hp" name="hp" type="text" required="required" class="form-control" value="<?= $row['hp'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Alamat</label> 
    <div class="col-7">
      <input id="alamat" name="alamat" type="text" required="required" class="form-control" value="<?= $row['alamat'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="foto" class="col-5 col-form-label">Foto</label> 
    <div class="col-7">
      <input id="foto" name="foto" type="text" value="<?= $row['foto'] ?>" class="form-control" required="required">
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
