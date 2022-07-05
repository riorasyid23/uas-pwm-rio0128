<?php
$page = @$_GET['clients'];
$id = @$_GET['id'];

if (!$page) {
  include '../../views/user/home/index.php';
}

switch ($page) {
  case ('home'):
    include '../../views/user/home/index.php';
    break;
  case ('order'):
    include '../../views/user/order/index.php';
    break;
  case ('cart'):
    include '../../views/user/cart/index.php';
    break;
  case ('produk' && $id == $id):
    include '../../views/user/produk/index.php';
    break;
}
