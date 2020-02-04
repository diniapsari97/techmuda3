<?php
$sesi = $_SESSION['MEMBER'];
if($sesi['role'] != 'nasabah' && isset($sesi)){





$ar_judul = ['No','Tgl','Norek','Saldo','Nama Nasabah','Kategori',''];
//ciptakan objek dari class CustomerModel
$model = new PembukaanModel();

$keyword = $_REQUEST['keyword'];
$idkat = $_REQUEST['idkat'];

if(!empty($keyword)){
//------------pencarian------------------
  $rs = $model->cari($keyword);
}
else if(!empty($idkat)){
  $rs = $model->filter([$idkat]);
}

else{
  //--------------jika tidak cari data / tidak filter data--------------//
  //-------------maka tampilkan semua data pegawai---------------------//
  $rs = $model->getAll();
}


?>

<h3>Daftar Pembukaan</h3>
<br/>
<!----------------awal modal-------------------->
<!-- Button trigger modal -->
<?php
if($sesi['role'] != 'nasabah'){
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
        <h5 class="modal-title" id="exampleModalLabel">Form Pembukaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_pembukaan.php' ?>
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
  	foreach($rs as $pembukaan){
  	?>

    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $pembukaan['tgl'] ?></td>
      <td><?= $pembukaan['norek'] ?></td>
      <td><?= $pembukaan['saldo'] ?></td>
      <td><?= $pembukaan['nama_nasabah'] ?></td>
      <td><?= $pembukaan['nama_kategori'] ?></td>

      <td align="right">
      	<a class="btn btn-primary btn-sm" href="index.php?hal=viewPembukaan&idpem=<?= $pembukaan['id'] ?>">Detail</a>

      	<?php
		if($sesi['role'] != 'nasabah'){
		?>

      	<a class="btn btn-warning btn-sm" href="index.php?hal=form_pembukaan&idedit=<?= $pembukaan['id'] ?>">Ubah</a>

      	<?php } ?>
      </td>




      <?php
      if($_SESSION['MEMBER']['role'] != 'nasabah' && $_SESSION['MEMBER']['role'] != 'teller' ){ //nasabah dan teller gaboleh hapus!
      ?>

      	<td align="left">
        <form method="POST" action="controllerPembukaan.php">
        <button class="btn btn-danger btn-sm" name="proses" value="hapus" 
        onclick="return confirm('Yakin Hapus?')">Hapus</button>
        <input type="hidden" name="idx" value="<?= $pembukaan['id'] ?>"/>
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