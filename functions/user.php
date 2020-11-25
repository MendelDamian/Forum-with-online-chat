<?php

function is_authenticated()
{
  return isset($_SESSION['user_id']) === true && isset($_SESSION['username']) === true;
}