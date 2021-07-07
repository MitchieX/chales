<?php
  class RoomDAO {
    public function update_base_price($room) {
      $id = $room -> getId();
      $base_price = $room -> getBasePrice();

      try {
        $sql = "UPDATE rooms SET base_price = :base_price WHERE id = :id";
        
        $connection = Connection::connect();
        
        $stmt = $connection -> prepare($sql);
        $stmt -> bindParam(":id", $id);
        $stmt -> bindParam(":base_price", $base_price);

        $stmt -> execute();
        
        return true;
      } catch (PDOException $e) {
        return false;
      }
    }

    public function get_room_by_id($room) {
      $id = $room -> getId();

      try {
        $sql = "SELECT * FROM rooms WHERE id = :id";
        
        $connection = Connection::connect();
        
        $stmt = $connection -> prepare($sql);
        $stmt -> bindParam(":id", $id);

        $stmt -> execute();

        $data = $stmt -> fetch();

        $room = new Room($data["id"], $data["type"], $data["base_price"]);
        
        return $room;
      } catch (PDOException $e) {
        return null;
      }
    }

    public function get_rooms() {
      try {
        $sql = "SELECT * FROM rooms";
        
        $connection = Connection::connect();
        
        $stmt = $connection -> prepare($sql);
        $stmt -> execute();

        $rooms = array();

        while ($data = $stmt->fetch()) {
          $room = new Room($data["id"], $data["type"], $data["base_price"]);
          
          array_push($rooms, $room);
        }
        
        return $rooms;
      } catch (PDOException $e) {
        return null;
      }
    }
  }
  