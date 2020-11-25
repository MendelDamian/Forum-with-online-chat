<?php

class User extends Database
{
  protected function getUserByUsername($username)
  {
    $query = 'SELECT * FROM users WHERE username = ?';
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$username]);

    $result = $stmt->fetchAll();
    return $result;
  }

  protected function getAllUsersOrderByRankAsc()
  {
    $query = 'SELECT users.username, users.avatar_path, ranks.color FROM users, ranks WHERE users.rank_id=ranks.id ORDER BY FIELD(ranks.name,"admin","user"), users.id';
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([]);

    $result = $stmt->fetchAll();
    return $result;
  }

  protected function insertUser($username, $password)
  {
    $query = 'INSERT INTO users (username, password) VALUES (?, ?)';
    $stmt = $this->connect()->prepare($query);
    $result = $stmt->execute([$username, $password]);
    return $result;
  }

}
