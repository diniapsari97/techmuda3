<?php

$sesi = $_SESSION['MEMBER'];
if($sesi['role'] != 'nasabah' && isset($sesi)){


$ar_judul = ['No','NIK','Nama','Jenis Kelamin','Pekerjaan','Hp','Action',''];
//ciptakan objek dari class PegawaiModel
$model = new NasabahModel();
$rs = $model->getAll();
?>

<h3>Daftar Nasabah</h3>

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
        <h5 class="modal-title" id="exampleModalLabel">Form Nasabah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_nasabah.php' ?>
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
  	foreach($rs as $nasabah){
  	?>

    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $nasabah['nik'] ?></td>
      <td><?= $nasabah['nama'] ?></td>
      <td><?= $nasabah['jk'] ?></td>
      <td><?= $nasabah['pekerjaan'] ?></td>
      <td><?= $nasabah['hp'] ?></td>
      <td>
          <a class="btn btn-primary btn-sm" href="index.php?hal=viewNasabah&idnas=<?= $nasabah['id'] ?>">detail</a>
          <a class="btn btn-warning btn-sm" href="index.php?hal=form_nasabah&idedit=<?= $nasabah['id'] ?>">ubah</a>
        </td>

        <?php
      if($_SESSION['MEMBER']['role'] != 'teller'){ //teller gaboleh hapus !
      ?>


        <td align="left">
          <form method="POST" action="controllerNasabah.php">
          <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('yakin hapus')">hapus</button>
          <input type="hidden" name="idx" value="<?= $nasabah['id'] ?>"/>
          </form>
        </td>

        <?php } ?>
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>


<?php

} //tutup if(isset($_SESSION['MEMBER'])){
else {
  include_once 'terlarang.php';
}
?>