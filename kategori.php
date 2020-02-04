<?php
if(isset($_SESSION['MEMBER'])){





$ar_judul = ['No','Nama','',''];
//ciptakan objek dari class PegawaiModel
$model = new KategoriModel();
$rs = $model->getAll();
?>

<h3>Kategori Tabungan</h3>

<br/>
<!----------------awal modal-------------------->
<!-- Button trigger modal -->
 <?php
      if($_SESSION['MEMBER']['role'] != 'nasabah'){ //nasabah gaboleh ubah dan hapus !
      ?>

<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah 
</button>

<?php } ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Kategori Tabungan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_kategori.php' ?>
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
  	foreach($rs as $kategori){
  	?>

    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $kategori['nama'] ?></td>

       <?php
      if($_SESSION['MEMBER']['role'] != 'nasabah'){ //staf gaboleh ubah dan hapus !
      ?>

        <td align="right">
          <a class="btn btn-warning btn-sm" href="index.php?hal=form_kategori&idedit=<?= $kategori['id'] ?>">ubah</a>
        </td>

         <?php
      if($_SESSION['MEMBER']['role'] != 'teller'){ //staf gaboleh ubah dan hapus !
      ?>


        <td align="left">
          <form method="POST" action="controllerKategori.php">
          <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('yakin hapus')">hapus</button>
          <input type="hidden" name="idx" value="<?= $kategori['id'] ?>"/>
          </form>
        </td>

        <?php } ?>

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