<?php
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) === false && 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' &&
    isset($_POST['method']) === true && empty($_POST['method']) === false) {
  require_once 'includes/autoLoaderClass.inc.php';

  $chatContr = new chatController();
  $chatView = new ChatView();

  switch($_POST['method']) {
    case 'fetch':
      $messages = $chatContr->receiveMessages();
      if ($messages['success'] === true) {
        $chatView->fetchMessages($messages['data']);
      } else {
        echo 'Coś poszło nie tak';
      }
      break;

    case 'send':
      if (isset($_POST['content']) === true) {
        $chatContr->sendMessage($_POST['content']);
      }
      break;
  }

}
