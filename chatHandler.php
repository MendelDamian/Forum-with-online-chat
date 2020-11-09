<?php
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) === false && 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' &&
    isset($_POST['method']) === true && empty($_POST['method']) === false) {
  var_dump($_SERVER, $_POST);
  var_dump('weszlo chatHandel');
  require_once 'includes/autoLoaderClass.inc.php';
  var_dump('autoloader przeszlo chatHandler');

  $chatContr = new chatController();
  $chatView = new ChatView();

  var_dump('dziala chathandler', $_POST['method'] === 'fetch');
  if ($_POST['method'] === 'fetch') {
    var_dump('weszlo fetch if');
    $messages = $chatContr->receiveMessages();
    var_dump($messages);
    if ($messages['success'] === true) {
      $chatView->fetchMessages($messages['data']);
    } else {
      echo 'Coś poszło nie tak if';
    }
  }
  exit;

  switch($_POST['method']) {
    case 'fetch':
      var_dump('weszlo fetch');
      $messages = $chatContr->receiveMessages();
      var_dump($messages);
      if ($messages['success'] === true) {
        $chatView->fetchMessages($messages['data']);
      } else {
        echo 'Coś poszło nie tak';
      }
      break;

    case 'send':
      var_dump('weszlo send');
      if (isset($_POST['content']) === true) {
        $chatContr->sendMessage($_POST['content']);
      }
      break;
  }

} else {
  var_dump('Nie wyszlo chatHandler');
}
