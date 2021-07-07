<?php
session_start();

if (!$_SESSION["auth"]) {
  header("Location: ./");
}

if (!$_POST) {
  header("Location: ./dashboard.php");
}

require_once "../model/Connection.php";

require_once "../controller/LoginController.php";

require_once "../model/Room/Room.php";
require_once "../model/Room/RoomDAO.php";
require_once "../controller/RoomController.php";

require_once "../model/Interval/IntervalDAO.php";
require_once "../controller/IntervalController.php";

require_once "../model/HighSeason/HighSeason.php";
require_once "../model/HighSeason/HighSeasonDAO.php";
require_once "../controller/HighSeasonController.php";

$action = $_POST["action"];

$isTrue = false;

switch ($action) {
  case 'login':
    $isTrue = LoginController::validate_login($_POST);
    $_SESSION["auth"] = $isTrue;
    break;

  case 'update base price':
    $isTrue = RoomController::update_base_price($_POST);
    break;

  case 'update interval':
    $isTrue = IntervalController::update($_POST["interval"]);
    break;

  case 'add high season':
    $isTrue = HighSeasonController::add_high_season($_POST);
    break;

  case 'edit high season':
    $isTrue = HighSeasonController::edit_high_season($_POST);
    break;

  case 'delete high season':
    $isTrue = HighSeasonController::delete_high_season($_POST);
    break;
  
  default:
    # code...
    break;
}

if ($isTrue) {
  header("Location: dashboard.php");
} else {
  header("Location: ./");
}