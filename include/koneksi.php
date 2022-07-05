<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'eccomerce');

if ($koneksi) {
  echo "";
} else {
  echo "gagal terhubung kedalam Database";
}

function baseUrl($url = null)
{
  $uri = explode('/', $_SERVER['REQUEST_URI'])[1];

  $baseUrl = "http://localhost/" . $uri;

  if ($url != null) {
    return $baseUrl . "/" . $url;
  } else {
    return $baseUrl;
  }
}

function moneyFormat($str)
{
  return 'Rp ' . number_format($str, '0', '', '.');
}

function image($path)
{
  return baseUrl() . "/public/assets/products/" . $path;
}
