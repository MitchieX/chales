<?php

class RoomController {
  public static function update_base_price($post) {
    $room = new Room($post["type"], null, $post["price"]);
    
    $room_DAO = new RoomDAO();
    return $room_DAO -> update_base_price($room);
  }

  public static function get_rooms() {
    $room_DAO = new RoomDAO();
    return $room_DAO -> get_rooms();
  }

  public static function get_room_by_id($room) {
    $room_DAO = new RoomDAO();
    return $room_DAO -> get_room_by_id($room);
  }
}
