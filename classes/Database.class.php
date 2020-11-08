<?php

class Database {

  protected function connect() {
    $host = $_ENV['CLEARDB_DATABASE_HOST'] ?: 'localhost';
    $user = $_ENV['CLEARDB_DATABASE_USERNAME'] ?: 'root';
    $pwd = $_ENV['CLEARDB_DATABASE_PASSWORD'] ?: '';
    $dbName = $_ENV['CLEARDB_DATABASE_DATABASE'] ?: 'Forum';

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }

}