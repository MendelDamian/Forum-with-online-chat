<!-- <?php //require_once 'includes/baseTopSite.inc.php'; ?>
<?php //require_once 'includes/parts/chat.part.php'; ?>
<?php //require_once 'includes/baseBottomSite.inc.php'; ?>
 -->
 <?php

echo $_ENV['CLEARDB_DATABASE_USERNAME'];

$host = $_ENV['CLEARDB_DATABASE_HOST'];
$user = $_ENV['CLEARDB_DATABASE_USERNAME'];
$pwd = $_ENV['CLEARDB_DATABASE_PASSWORD'];
$dbName = $_ENV['CLEARDB_DATABASE_DATABASE'];

try {
  $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

 ?>