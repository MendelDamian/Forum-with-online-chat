<?php

class Database
{
  protected function connect()
  {
    // It's okay to contain these informations here because it's only for local purposes
    $host = getenv('DBHOST') ?: 'localhost';
    $user = getenv('DBUSER') ?: 'root';
    $pwd = getenv('DBPWD') ?: '2137';
    $dbName = getenv('DBNAME') ?: 'Forum';
    try
    {
      $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName . ';port=3306';
      $pdo = new PDO($dsn, $user, $pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    } 
    catch (PDOException $e)
    {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }
}