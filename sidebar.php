<?php
$sesi = $_SESSION['MEMBER'];

?>

		<div class="col-md-3">
			<div class="list-group">
				 <a href="#" class="list-group-item list-group-item-action active">Home</a>
				<div class="list-group-item">
					<b class="fas fa-phone-alt"> +1 998 8877</b>
				</div>
				<div class="list-group-item">
					<h4 class="list-group-item-heading">
						Tentang Bank
					</h4>
					<p class="list-group-item-text">
						<li><a href="index.php?hal=keluhan">Laporkan Keluhan</a></li>
						<li><a href="index.php?hal=org">Organisasi</a></li>
						<li><a href="index.php?hal=rekan">Rekan</a></li>
					</p>

					<?php
					if($sesi['role'] != 'nasabah'){ //nasabah gaboleh liat
					?>

					<h4 class="list-group-item-heading">
						Kategori
					</h4>

					<?php
					$model = new KategoriModel();
					$rs = $model->getAll();
					foreach ($rs as $kategori){
					?>

					<p class="list-group-item-text">
						<li><a href="index.php?hal=pembukaan&idkat=<?= $kategori['id']?>"><?= $kategori['nama']?></a></li>
						
					</p>

					<?php } ?>

					<?php } ?>

				</div>
				<div class="list-group-item justify-content-between">
					<a href="index.php?hal=faq">FAQ </a><span class="badge badge-secondary badge-pill">3</span>
				</div> <a href="index.php?hal=help" class="list-group-item list-group-item-action active justify-content-between">Bantuan <span class="badge badge-light badge-pill">14</span></a>
			</div>
		</div>
		</div>