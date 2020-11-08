<?php
var_dump('here');
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) === false && 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' &&
    isset($_POST['method']) === true && empty($_POST['method']) === false) {
  require_once 'includes/autoLoaderClass.inc.php';

  $chatContr = new chatController();
  $chatView = new ChatView();
  var_dump('here2');

  switch($_POST['method']) {
    case 'fetch':
      $messages = $chatContr->receiveMessages();
      var_dump('here3');
      if ($messages['success'] === true) {
        var_dump('here4');
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
