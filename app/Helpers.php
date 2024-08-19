<?php

use App\Models\DanaZakat;
use App\Models\Jurnal;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helpers
 *
 * @author 
 */
function setActive($path, $active = 'active')
{
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function setShow($path, $block = 'block')
{
  return call_user_func_array('Request::is', (array)$path) ? $block : '';
}

function formatDate($array)
{
  $string = date('Y-m-d', strtotime($array));
  return $string;
}

if (!function_exists('num_row')) {
  function num_row($page, $limit)
  {
    if (is_null($page)) {
      $page = 1;
    }

    $num = ($page * $limit) - ($limit - 1);
    return $num;
  }
}
function format_rupiah($x)
{
  if (is_nan($x)) {
    $x = 0;
  }

  if (is_infinite($x)) {
    $x = 0;
  }
  return number_format($x, 0, ",", ".");
}

function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  //return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  return $pecahkan[2] . '/' . $pecahkan[1]  . '/' . $pecahkan[0];
}

function getTotalDana($jenis_dana, $cabang_id)
{

  $data = DanaZakat::join('jurnal', 'jurnal.id', '=', 'dana_zakat.jurnal_id')
    ->where('dana_zakat.jenis_dana', $jenis_dana)
    ->where('jurnal.cabang_id', $cabang_id)
    ->where('jurnal.jenis', 'Kredit')
    ->orderBy('dana_zakat.updated_at', 'desc')
    ->sum('dana_zakat.jumlah_dana');
  return $data;
}

function getLastUpdateDana($jenis_dana, $cabang_id)
{
  $data = DanaZakat::join('jurnal', 'jurnal.id', '=', 'dana_zakat.jurnal_id')
    ->where('dana_zakat.jenis_dana', $jenis_dana)
    ->where('jurnal.cabang_id', $cabang_id)
    ->orderBy('dana_zakat.updated_at', 'desc')
    ->first();
  if ($data) {
    return $data->updated_at;
  } else {
    return '-';
  }
}
function terbilang($x)
{
  $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

  if ($x < 12)
    return " " . $angka[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . " belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return "seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return "seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
}
