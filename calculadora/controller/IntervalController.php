<?php

class IntervalController {
  public static function update($interval) {
    $interval_DAO = new IntervalDAO();    
    return $interval_DAO -> update($interval);
  }

  public static function get_interval() {
    $interval_DAO = new IntervalDAO();
    return $interval_DAO -> get_interval();
  }
}
