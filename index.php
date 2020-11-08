<?php //require_once 'includes/baseTopSite.inc.php'; ?>
<?php //require_once 'includes/parts/chat.part.php'; ?>
<?php //require_once 'includes/baseBottomSite.inc.php';

$host = getenv('CLEARDB_DATABASE_HOST') ?: 'localhost';
$user = getenv('CLEARDB_DATABASE_USERNAME') ?: 'root';
$pwd = getenv('CLEARDB_DATABASE_PASSWORD') ?: '';
$dbName = getenv('CLEARDB_DATABASE_DATABASE') ?: 'Forum';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

var_dump($dsn);
$pdo = new PDO($dsn, $user, $pwd);

 ?>