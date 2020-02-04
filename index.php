<?php
session_start();

include_once 'koneksi.php';
include_once 'NasabahModel.php';
include_once 'PembukaanModel.php';
include_once 'CabangModel.php';
include_once 'CsModel.php';
include_once 'KategoriModel.php';
include_once 'UserModel.php';



include_once 'LoginModel.php';


include_once 'header.php';
include_once 'menu.php';
echo '<br/>';
include_once 'main.php';
include_once 'sidebar.php';
echo '<br/>';
include_once 'footer.php';


