<?php

class Connection {
  public static function connect() {
    $hostname = "localhost";
    $database = "chales45_bancochale";
    $username = "chales45_chale";
    $password = "X26PZB3K2dZDaDm";

    try {
      $my_connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      $my_connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $my_connection;
    } catch (PDOException $e) {
      return null;
    }
  }  
}
