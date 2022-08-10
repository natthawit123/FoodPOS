<?php
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
include('../condb.php');
$m_id = $_SESSION['m_id'];
$m_level = $_SESSION['m_level'];
if($m_level!='Admin'){
  Header("Location: ../logout.php");
}

//query member login
$sqlm = "SELECT m_name, m_id, m_img FROM tbl_member WHERE m_id=$m_id";
$resultm = mysqli_query($con, $sqlm) or die ("Error in query: $sqlm " . mysqli_error());
$rowm = mysqli_fetch_array($resultm);
extract($rowm);
$m_id = $rowm['m_id'];
$m_name = $rowm['m_name'];
$m_img = $rowm['m_img'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบรับออเดอร์อาหาร</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
