<?php

function escape($string) {
  return trim(htmlspecialchars($string, ENT_QUOTES, 'UTF-8'));
}

function hashPassword($password) {
  return password_hash($password, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 4]);
}

function validateUsername($input_) {
  return preg_match('/^[0-9a-zA-Z]{6,50}$/', $input_);
}

function validatePassword($input_) {
  return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,128}$/', $input_);
}

function validateLength($input_, $min=1, $max=512) {
  return preg_match('/^.{' . $min . ',' . $max . '}$/', trim($input_));
}

function validate($input_, $expected='string') {
  if ($expected == 'float') $expected = 'double';
  $state = isset($input_) === true && 
           (empty($input_) === false || $input_ === 0 || $input_ === 0.0) && 
           gettype($input_) == $expected;
  return $state;
}