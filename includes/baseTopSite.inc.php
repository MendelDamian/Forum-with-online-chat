<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/autoLoaderClass.inc.php';
require_once 'functions/user.php';
session_start(); 

?>
<!DOCTYPE html>
<html lang="pl">
<?php require_once 'includes/parts/head.part.php'; ?>
<body>
  <?php require_once 'includes/parts/header.part.php'; ?>
  <div class="container">