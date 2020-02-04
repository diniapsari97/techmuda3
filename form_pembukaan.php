<?php
//buat array scalar untuk master data gender dan status
//buat assosiatif lebih dari 1 untuk master data jabatan
$obj = new NasabahModel();
$ar_kategori = $obj->getKategori();
$ar_cabang = $obj->getCabang();
$ar_nasabah = $obj->getNasabah();
$ar_customer = $obj->getCustomer();


$idedit = $_REQUEST['idedit'];
$obj2 = new PembukaanModel();
if(!empty($idedit)){
  //edit data lama yang ditampilkan di form//
  $row = $obj2-> view([$idedit]);
}
else{
  //tetap dalam keadaan kosong kalo tidak ada data//
  $row = [];
}


?>















<form method="POST" action="controllerPembukaan.php">
  <div class="form-group row">
    <label for="tgl" class="col-5 col-form-label">Tanggal Pembukaan</label> 
    <div class="col-7">
      <input id="tgl" name="tgl" value="<?= $row['tgl'] ?>" type="date" required="required" class="form-control">
    </div>
  </div>


  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama Nasabah</label> 
    <div class="col-7">



      <select id="nama" name="nama" required="required" class="custom-select">
        <option value="">--Pilih Nama--</option>
        <?php 
        foreach($ar_nasabah as $nama){
          //edit
          $sel = ($nama['id'] == $row['nasabah_id']) ? "selected" : "";



        ?>
        <option value="<?= $nama['id'] ?>" <?= $sel ?> ><?= $nama['nama'] ?></option>

        <?php } ?>


      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="norek" class="col-5 col-form-label">No Rekening</label> 
    <div class="col-7">
      <input id="norek" name="norek" value="<?= $row['norek'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="saldo" class="col-5 col-form-label">Saldo</label> 
    <div class="col-7">
      <input id="saldo" name="saldo" value="<?= $row['saldo'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

    <div class="form-group row">
    <label for="kategori" class="col-5 col-form-label">Kategori</label> 
    <div class="col-7">
      <select id="kategori" name="kategori" required="required" class="custom-select">
        <option value="">--Pilih Kategori--</option>
        <?php 
        foreach($ar_kategori as $kat){
          $sel = ($kat['id'] == $row['kategori_id']) ? "selected" : "";
        ?>
        <option value="<?= $kat['id'] ?>" <?= $sel ?> ><?= $kat['nama'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  
  <div class="form-group row">
    <label for="cabang" class="col-5 col-form-label">Cabang Bank</label> 
    <div class="col-7">



      <select id="cabang" name="cabang" required="required" class="custom-select">
        <option value="">--Pilih Cabang--</option>
        <?php 
        foreach($ar_cabang as $cab){
          //edit
          $sel = ($cab['id'] == $row['cabang_bank_id']) ? "selected" : "";



        ?>
        <option value="<?= $cab['id'] ?>" <?= $sel ?>  ><?= $cab['nama_cab'] ?></option>

        <?php } ?>


      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="cs" class="col-5 col-form-label">Teller</label> 
    <div class="col-7">



      <select id="cs" name="cs" required="required" class="custom-select">
        <option value="">--Pilih Teller--</option>
        <?php 
        foreach($ar_customer as $cus){
          //edit
          $sel = ($cus['id'] == $row['teller_id']) ? "selected" : "";



        ?>
        <option value="<?= $cus['id'] ?>" <?= $sel ?>  ><?= $cus['nama'] ?></option>

        <?php } ?>


      </select>
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
