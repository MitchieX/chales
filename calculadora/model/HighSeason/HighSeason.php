<?php

class HighSeason {
  private $id;
  private $price_room_1;
  private $price_room_2;
  private $start;
  private $end;

  public function __construct($id, $price_room_1, $price_room_2, $start, $end) {
    $this->id = $id;
    $this->price_room_1 = $price_room_1;
    $this->price_room_2 = $price_room_2;
    $this->start = $start;
    $this->end = $end;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getPriceRoom1() {
    return $this->price_room_1;
  }

  public function setPriceRoom1($price_room_1) {
    $this->price_room_1 = $price_room_1;
  }
  
  public function getPriceRoom2() {
    return $this->price_room_2;
  }

  public function setPriceRoom2($price_room_2) {
    $this->price_room_2 = $price_room_2;
  }

  public function getStart() {
    return $this->start;
  }

  public function setStart($start) {
    $this->start = $start;
  }
  
  public function getEnd() {
    return $this->end;
  }

  public function setEnd($end) {
    $this->end = $end;
  }
}
