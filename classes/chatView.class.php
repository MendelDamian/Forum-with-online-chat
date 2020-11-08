<?php

class ChatView extends Chat {

  public function fetchMessages ($messages) {
    foreach (array_reverse($messages) as $message) {
      ?>
      <div class="message">
        <div class="left">
          <img src="assets/images/avatars/<?php echo $message['avatar_path'] ?>" alt="avatar" class="avatar">
        </div>
        <div class="right">
          <div class="msg-meta">
            <a href="" style="color: <?php echo $message['color'] ?>;"><?php echo $message['username']; ?></a>
            <span class="timestamp">: <?php echo $message['created_at']; ?></span>
          </div>
          <div class="msg-content">
            <p><?php echo $message['content'] ?></p>
          </div>
        </div>
      </div>
      <?php
    }
  }

}