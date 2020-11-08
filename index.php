<?php //require_once 'includes/baseTopSite.inc.php'; ?>
<?php //require_once 'includes/parts/chat.part.php'; ?>
<?php //require_once 'includes/baseBottomSite.inc.php'; 

    $host = getenv('CLEARDB_DATABASE_HOST') ?: 'localhost';
    $user = getenv('CLEARDB_DATABASE_USERNAME') ?: 'root';
    $pwd = getenv('CLEARDB_DATABASE_PASSWORD') ?: '';
    $dbName = getenv('CLEARDB_DATABASE_DATABASE') ?: 'Forum';
    try {
      $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName . ';port=3306';
      $pdo = new PDO($dsn, $user, $pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      echo 'success';
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
    return $pdo;

?>