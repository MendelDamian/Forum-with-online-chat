<?php

require_once 'functions/serialize.php';

class UserController extends User
{
  public function registerUser()
  {
    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
    ]);

    if (validateUsername($_POST['username']) === false)
    {
      $return_data['ErrorMessage'] = 'Twoja nazwa użytkownika może składać się tylko z małych i dużych liter oraz cyfr. Powinna mieć od 6 do 50 znaków';
      return $return_data;
    }

    if (validatePassword($_POST['password']) === false)
    {
      $return_data['ErrorMessage'] = 'Twoje hasło musi się składać z małych i dużych znaków, cyfr oraz znaków specjalnych. Powinno mieć od 8 do 128 znaków';
      return $return_data;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password)
    {
      $return_data['ErrorMessage'] = 'Podane hasła nie są takie same';
      return $return_data;
    }

    if ($username === $password)
    {
      $return_data['ErrorMessage'] = 'Hasło nie może być takie samo jak nazwa użytkownika';
      return $return_data;
    }

    $user = $this->getUserByUsername($username);
    if (count($user) !== 0)
    {
      $return_data['ErrorMessage'] = 'Nazwa użytkownika jest już zajęta';
      return $return_data;
    }

    $password_hash = hashPassword($password);
    $result = $this->insertUser($username, $password_hash);
    if ($result === false)
    {
      $return_data['ErrorMessage'] = 'Błąd przy przetwarzaniu zapytania';
      return $return_data;
    }

    $return_data['success'] = true;
    return $return_data;
  }

  public function loginUser()
  {
    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
    ]);

    if (validateUsername($_POST['username']) === false || validatePassword($_POST['password']) === false)
    {
      $return_data['ErrorMessage'] = 'Nieprawidłowa nazwa użytkownika lub hasło';
      return $return_data;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $this->getUserByUsername($username);

    if (count($user) == 0 || password_verify($password, $user[0]['password']) === false)
    {
      $return_data['ErrorMessage'] = 'Nieprawidłowa nazwa użytkownika lub hasło';
      return $return_data;
    }

    $user = $user[0];
    $return_data['success'] = true;

    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    return $return_data;
  }

  public function getAllUsernames()
  {
    $return_data = array([
      'success' => false,
      'ErrorMessage' => '',
    ]);

    $users = $this->getAllUsersOrderByRankAsc();
    return $users;
  }
}