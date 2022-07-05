<?php
$page = @$_GET['page'];
$id = @$_GET['id'];

if (!$page) {
  include '../../views/main/dashboard/index.php';
}

switch ($page) {
  case ('dashboard'):
    include '../../views/main/dashboard/index.php';
    break;
  case 'product':
    include '../../views/main/produk/index.php';
    break;
  case 'add-products':
    include '../../views/main/produk/add.php';
    break;
  case 'report':
    include '../../views/main/report/index.php';
    break;
  case ('add-products' && $id == $id):
    include '../../views/main/produk/edit.php';
    break;
  default:
    include '../../views/main/produk/index.php';
    break;
}
