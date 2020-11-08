<?php

require_once 'functions/serialize.php';

class UserController extends User {

  public function registerUser($username, $password, $confirm_password) {

    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
    ]);

    if ($password !== $confirm_password) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Podane hasła nie są takie same';
      return $return_data;
    }

    if ($username === $password) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Hasło nie może być takie samo jak nazwa użytkownika';
      return $return_data;
    }

    if (validate($username) === false || validate($password) === false) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Wystąpił błąd podczas przetwarzania. Proszę spróbować ponownie';
      return $return_data;
    }

    if (validateUsername($username) === false) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Twoja nazwa użytkownika może składać się tylko z małych i dużych liter or cyfr. Powinna mieć od 6 do 50 znaków';
      return $return_data;
    }

    if (validatePassword($password) === false) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Twoje hasło musi się składać z małych i dużych znaków, cyfr oraz znaków specjalnych. Powinno mieć od 8 do 128 znaków';
      return $return_data;
    }

    $user = $this->getUserByUsername($username);
    if (count($user) !== 0) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Nazwa użytkownika jest już zajęta';
      return $return_data;
    }

    $password = hashPassword($password);
    $result = $this->insertUser($username, $password);
    if (count($result) === 0) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Błąd przy przetwarzaniu zapytania';
      return $return_data;
    }

    $return_data['success'] = true;
    $return_data['ErrorMessage'] = '';
    return $return_data;
  }

  public function loginUser($username, $password) {

    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
    ]);

    if (validate($username) === false || validate($password) === false) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Wystąpił błąd podczas przetwarzania. Proszę spróbować ponownie';
      return $return_data;
    }

    if (validateUsername($username) === false || validatePassword($password) === false) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Nieprawidłowa nazwa użytkownika lub hasło';
      return $return_data;
    }

    $user = $this->getUserByUsername($username);

    if (count($user) == 0 || password_verify($password, $user[0]['password']) === false) {
      $return_data['success'] = false;
      $return_data['ErrorMessage'] = 'Nieprawidłowa nazwa użytkownika lub hasło';
      return $return_data;
    }

    $user = $user[0];
    $return_data['success'] = true;
    $return_data['ErrorMessage'] = '';

    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    return $return_data;
  }

  public function getAllUsernames() {

    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
    ]);

    $users = $this->getAllUsersOrderByRankAsc();
    return $users;
  }
  
}