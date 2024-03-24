<?php
function validateEmail($email)
{
  return preg_match('/^\S+@\S+\.\S+$/', strtolower($email));
}