<?php

class Database {
  // At this moment it's okay to contain these informations in the file. They are local settings which won't work 
  // on production
  private $host = 'localhost';
  private $user = 'root';
  private $pwd = '';
  private $dbName = 'Forum';

  protected function connect() {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }

}