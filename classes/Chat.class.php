<?php

class Chat extends Database
{
  protected function getLastMessages()
  {
    $query = 'SELECT chat.id, users.username, users.avatar_path, ranks.color, chat.created_at, chat.content FROM users, ranks, chat WHERE users.id=chat.user_id AND ranks.id=users.rank_id ORDER BY chat.id DESC LIMIT 20';
    $stmt = $this->connect()->query($query);
    $result = $stmt->fetchAll();
    return $result;
  }

  protected function insertMessage($user_id, $content)
  {
    $query = 'INSERT INTO chat VALUES (NULL, ?, current_timestamp(), ?)';
    $stmt = $this->connect()->prepare($query);
    $result = $stmt->execute([$user_id, $content]);
    return $result;
  }
}