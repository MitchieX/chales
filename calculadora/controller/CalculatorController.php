<?php

require_once "model/Connection.php";

require_once "model/HighSeason/HighSeason.php";
require_once "model/HighSeason/HighSeasonDAO.php";

require_once "model/Room/Room.php";
require_once "model/Room/RoomDAO.php";

class CalculatorController {
  public static function calculate($post) {
    $single = $post["single"];
    $couple = $post["couple"];
    $underSix = $post["underSix"];
    $underSixBonus = ($post["underSix"] <= 0) ? 0 : $post["underSix"] - 1;
    $underEleven = $post["underEleven"];

    $type = $post["type"];
    $checkin = $post["checkin"];
    $checkout = $post["checkout"];

    $dates = CalculatorController::get_dates($checkin, $checkout);

    $total = 0;

    foreach ($dates as $date) {
      $prices = CalculatorController::get_prices($date);
      $price = $prices[$type];
      
      $total += (($single * 0.7) + ($couple * 1) + ($underSixBonus * 0.1) + ($underEleven * 0.2)) * $price;      
    }

    $total_amount = $single + $couple + $underSix + $underEleven;

    if ($total_amount >= 25) {
      $total *= 0.7;
    }

    return $total;
  }
  
  private static function get_dates($start, $end) {
    date_default_timezone_set('America/Bahia');

    $period = new DatePeriod(
      new DateTime($start),
      new DateInterval('P1D'),
      new DateTime($end)
    );
    
    $dates = array();
    
    foreach ($period as $key => $value) {      
      array_push($dates, $value->format('Y-m-d'));
    }

    return $dates;
  }

  private static function get_prices($day) {
    $room_DAO = new RoomDAO();
    $high_season_DAO = new HighSeasonDAO();

    $data = $room_DAO -> get_rooms();
    $prices = array('1' => $data[0] -> getBasePrice(),  '2' => $data[1] -> getBasePrice());

    $high_season_prices = $high_season_DAO -> get_prices_in_high_season_interval($day);

    if ($high_season_prices["1"] != null) {
      $prices = $high_season_prices;
    }

    return $prices;
  }
}
