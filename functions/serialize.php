<?php

function validate($input_, $expected='string')
{
  if ($expected === 'float')
  {
    $expected = 'double';
  }

  $state = isset($input_) === true && // if exists
           (empty($input_) === false || $input_ === 0 || $input_ === 0.0) && // if not empty (0, 0.0 excluded)
           gettype($input_) == $expected; // same type 

  return $state;
}

function validateLength($input_, $min=1, $max=512)
{
  return preg_match('/^.{' . $min . ',' . $max . '}$/', trim($input_));
}

function validateUsername($input_)
{
  return (validate($input_) && preg_match('/^[0-9a-zA-Z]{6,50}$/', $input_));
}

function validatePassword($input_)
{
  return (validate($input_) && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,128}$/', $input_));
}

function hashPassword($password)
{
  return password_hash($password, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 4]);
}

function escape($string)
{
  return trim(htmlspecialchars($string, ENT_QUOTES, 'UTF-8'));
}