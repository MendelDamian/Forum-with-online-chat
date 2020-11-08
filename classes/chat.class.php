<?php

class Chat extends Database {

  protected function getLastMessages() {
    $query = 'SELECT Chat.id, Users.username, Users.avatar_path, Ranks.color, Chat.created_at, Chat.content FROM Users, Ranks, Chat WHERE Users.id=Chat.user_id AND Ranks.id=Users.rank_id ORDER BY Chat.id DESC LIMIT 20';
    $stmt = $this->connect()->query($query);
    $result = $stmt->fetchAll();
    return $result;
  }

  protected function insertMessage($user_id, $content) {
    $query = 'INSERT INTO Chat VALUES (NULL, ?, current_timestamp(), ?)';
    $stmt = $this->connect()->prepare($query);
    $result = $stmt->execute([$user_id, $content]);
    return $result;
  }

}