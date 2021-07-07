<?php

class Room {
  private $id;
  private $type;
  private $base_price;

  public function __construct($id, $type, $base_price) {
    $this->id = $id;
    $this->type = $type;
    $this->base_price = $base_price;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getType() {
    return $this->type;
  }

  public function setType($type) {
    $this->type = $type;
  }

  public function getBasePrice() {
    return $this->base_price;
  }

  public function setBasePrice($base_price) {
    $this->base_price = $base_price;
  }

}
