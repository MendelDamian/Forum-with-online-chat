<?php

class Database {

  protected function connect() {
    $host = getenv('CLEARDB_DATABASE_HOST') ?: 'localhost';
    $user = getenv('CLEARDB_DATABASE_USERNAME') ?: 'root';
    $pwd = getenv('CLEARDB_DATABASE_PASSWORD') ?: '';
    $dbName = getenv('CLEARDB_DATABASE_DATABASE') ?: 'Forum';

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }

}