<?php
include 'koneksi.php';

$nm_mk = $_POST['nm_mk'];
$sks = $_POST['sks'];
$na = $_POST['na'];

mysqli_query($koneksi, "insert into ipk values('$nm_mk','$sks','$na')");

header("location:input.php");
