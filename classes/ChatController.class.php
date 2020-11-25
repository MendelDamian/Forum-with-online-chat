<?php

require_once 'functions/serialize.php';

class ChatController extends Chat
{
  public function sendMessage($content)
  {
    session_start();
    $user_id = $_SESSION['user_id'];
    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
    ]);

    if (validate($content) === false)
    {
      $return_data['ErrorMessage'] = 'Wystąpił błąd podczas przetwarzania. Proszę spróbować ponownie';
      return $return_data;
    }

    if (validateLength($content, 1, 512) === false)
    {
      $return_data['ErrorMessage'] = 'Wiadomości mogą mieć maksymalnie 512 znaków';
      return $return_data;
    }

    $content = escape($content);
    $result = $this->insertMessage($user_id, $content);
    if (count($result) === 0)
    {
      $return_data['ErrorMessage'] = 'Błąd przy przetwarzaniu zapytania';
      return $return_data;
    }

    $return_data['success'] = true;
    return $return_data;
  }

  public function receiveMessages()
  {
    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
      'data' => array([])
    ]);

    $result = $this->getLastMessages();
    $return_data['success'] = true;
    $return_data['data'] = $result;
    return $return_data;
  }
}