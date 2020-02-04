<div class="row">
<div class="col-md-9">
<?php 
	$hal = $_GET['hal'];
	if(!empty($hal)){
		include_once $hal.'.php';
	}else{
		include_once 'home.php';

	}
	?>
</div>