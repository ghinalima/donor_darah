<?php
include 'koneksi.php';

if ($_GET['aksi'] == 'tambah') {
    $kd_golda   = $_POST['kd_golda'];
    $nm_golda = $_POST['nm_golda'];
    $rhesus      = $_POST['rhesus'];
    $jml_unit     = $_POST['jml_unit'];

    $insert = mysqli_query($koneksi, "INSERT INTO `tb_golda`(`kd_golda`, `nm_golda`, `rhesus`, `jml_unit`) 
                                        VALUES ('$kd_golda','$nm_golda','$rhesus','$jml_unit')");

    header("location:golda.php");
} elseif ($_GET['aksi'] == 'edit') {
    $kode   = $_POST['kd_golda'];
    $kd_golda  = $_POST['kd_golda'];
    $nm_golda = $_POST['nm_golda'];
    $rhesus      = $_POST['rhesus'];
    $jml_unit     = $_POST['jml_unit'];


    $update = mysqli_query($koneksi, "UPDATE `tb_golda` SET 
                `kd_golda`='$kd_golda',
                `nm_golda`='$nm_golda',
                `rhesus`='$rhesus',
                `jml_unit`='$jml_unit' WHERE kd_golda =  '" . $kode . "'");

    header("location:golda.php");
} elseif ($_GET['aksi'] == 'hapus') {

    $delete = mysqli_query($koneksi, "DELETE FROM `tb_golda` WHERE kd_golda = '" . $_GET['kode'] . "'");

    header("location:golda.php");
}
