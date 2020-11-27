<?php

class UserView extends User
{
  public function showUser($username)
  {
    $result = $this->getUser($username);
    print_r($result);
  }
}