<?php

class LoginController {
  public static function validate_login($post) {
    $email = "admin@chalescostadosol.com.br";
    $password = "!Chales123*";

    if ($email == $post["email"] && $password == $post["password"]) {      
      return true;
    }

    return false;

  }
}
