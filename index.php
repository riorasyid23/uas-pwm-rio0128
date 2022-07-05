<?php
session_start();
if (isset($_SESSION['admin'])) {
  if ($_SESSION['level'] == 'admin') {
    header('location: public/admin/index.php?page=dashboard');
  }
}
header('location: public/user/index.php');
