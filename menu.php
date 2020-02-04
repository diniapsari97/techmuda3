<?php
$sesi = $_SESSION['MEMBER'];

?>


<div class="row">
		<div class="col-md-12">

			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">	 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand" href="index.php?hal=home">BANK INTERNASIONAL INDONESIA</a>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav ">
						<li>
							<a class="btn btn-primary my-2 my-sm-0" href="index.php?hal=about">About Us</a> 
						</li>						
					

						<?php
						if(!isset($sesi)){
						//belum berhasil login
						?>

						<li class="nav-item active">
							 <a class="nav-link" href="index.php?hal=login">Login <span class="sr-only">(current)</span></a>
						</li>
						<?php
						}
						//sudah berhasil login
						else{
							?>


						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"><link rell="icon" img src="images/<?= $sesi['foto']?>" />
							 	&nbsp;
							 <?= $sesi['fullname']?> </a>
							

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?hal=viewUser&iduser=<?= $sesi['id'] ?>">Profileku</a> 
								 
								 <?php
								 if($sesi['role'] == 'administrator'){
								 ?>



								 <a class="dropdown-item" href="index.php?hal=user">Kelola User</a> 

								 <?php } ?>

								<div class="dropdown-divider">
								</div> 

								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>

						<?php } ?>








						<li class="nav-item dropdown">
							 <a class="btn btn-primary my-2 my-sm-0" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Pelayanan</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="#">Registrasi</a>
								 <a class="dropdown-item" href="#">Pembukaan Rekening Baru</a>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="#">Cabang</a>
							</div>
						</li>
						
						<?php
						if(isset($sesi)){ //jadi menghilang kalo belum login
						?>


						<li class="nav-item dropdown">
							 <a class="btn btn-primary my-2 my-sm-0" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Master Data</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

								<?php
								if($sesi['role'] != 'nasabah'){
								?>


								 <a class="dropdown-item" href="index.php?hal=nasabah">Data Nasabah</a>

								 <a class="dropdown-item" href="index.php?hal=cs">Data Customer Service</a>
								 <a class="dropdown-item" href="index.php?hal=pembukaan">Data Pembukaan Tabungan</a>

								 <?php } ?>



								 <a class="dropdown-item" href="index.php?hal=kategori">Kategori Tabungan</a>
								 <a class="dropdown-item" href="index.php?hal=cabang">Cabang Bank</a>

								 

							</div>
						</li>

						<?php }?>


					</ul>
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item active">
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" name="keyword"> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search
						</button>
						
						<input type="hidden" name="hal" value="pembukaan" />
					</form>
						</li>
						<li class="nav-item dropdown">
							 <a class="btn btn-primary my-2 my-sm-0" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Pengaturan</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="#">Cek Saldo</a>
								 <a class="dropdown-item" href="#">Transfer</a>
								 <a class="dropdown-item" href="#">Bayar BPJS</a>
								 <a class="dropdown-item" href="#">Isi Pulsa</a>
								 <a class="dropdown-item" href="#">Token Listrik</a>
								
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	