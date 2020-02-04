<?php
if(isset($_SESSION['MEMBER'])){


$ar_judul = ['No','NIP','Nama','Jenis Kelamin','',''];
//ciptakan objek dari class PegawaiModel
$model = new CsModel();
$keyword = $_REQUEST['keyword'];

if(!empty($keyword)){
//------------pencarian------------------
  $rs = $model->cari($keyword);
}
else{
  //--------------jika tidak cari data / tidak filter data--------------//
  //-------------maka tampilkan semua data pegawai---------------------//
  $rs = $model->getAll();
}

?>

<h3>Daftar Consumer Servis</h3>

<br/>
<!----------------awal modal-------------------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Consumer Servis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_cs.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>

<!----------------akhir modal------------------>
<br/><br/>

<table class="table table-striped">
  <thead>
    <tr>
    	<?php
    	foreach($ar_judul as $jdl){
    	?>
      <th scope="col"><?= $jdl ?></th>
      <?php } ?>

    </tr>
  </thead>
  <tbody>
  	<?php
  	$no = 1;
  	foreach($rs as $cs){
  	?>

    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $cs['nip'] ?></td>
      <td><?= $cs['nama'] ?></td>
      <td><?= $cs['jenis_kelamin'] ?></td>


      <td align="right">
          <a class="btn btn-primary btn-sm" href="index.php?hal=viewCs&idcs=<?= $cs['id'] ?>">detail</a>
          <a class="btn btn-warning btn-sm" href="index.php?hal=form_cs&idedit=<?= $cs['id'] ?>">ubah</a>
        </td>

        <?php
      if($_SESSION['MEMBER']['role'] != 'teller'){ //teller gaboleh dan hapus !
      ?>


        <td align="left">
          <form method="POST" action="controllerCs.php">
          <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('yakin hapus')">hapus</button>
          <input type="hidden" name="idx" value="<?= $cs['id'] ?>"/>
          </form>
        </td>

        <?php } ?>

    </tr>
    <?php $no++; } ?>
  </tbody>
</table>


<?php 
}
else{
  include_once 'terlarang.php';
}
?>