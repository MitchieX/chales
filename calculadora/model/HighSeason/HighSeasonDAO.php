<?php

class HighSeasonDAO {
  public function create($high_season) {
    $price_room_1 = $high_season -> getPriceRoom1();
    $price_room_2 = $high_season -> getPriceRoom2();
    $start = $high_season -> getStart();
    $end = $high_season -> getEnd();

    try {
      $sql = "INSERT INTO high_seasons(price_room_1, price_room_2, start, end) 
              VALUES (:price_room_1, :price_room_2, :start, :end)";

      $connection = Connection::connect();

      $stmt = $connection->prepare($sql);
      $stmt->bindParam(":price_room_1", $price_room_1);
      $stmt->bindParam(":price_room_2", $price_room_2);
      $stmt->bindParam(":start", $start);
      $stmt->bindParam(":end", $end);

      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function get_high_seasons_after_today() {
    try {
      $sql = "SELECT id, price_room_1, price_room_2, DATE_FORMAT(start, '%d/%m/%Y'), DATE_FORMAT(end, '%d/%m/%Y') FROM high_seasons WHERE end >= CURDATE() ORDER BY start ASC";

      $connection = Connection::connect();

      $stmt = $connection->prepare($sql);
      $stmt -> execute();

      $high_season = array();

      while ($data = $stmt->fetch()) {
        $start = $data["DATE_FORMAT(start, '%d/%m/%Y')"];
        $end = $data["DATE_FORMAT(end, '%d/%m/%Y')"];
        $price_1 = number_format($data["price_room_1"], 2, ',', '.');
        $price_2 = number_format($data["price_room_2"], 2, ',', '.');

        $season = new HighSeason($data["id"], $price_1, $price_2, $start, $end);

        array_push($high_season, $season);
      }

      return $high_season;
    } catch (PDOException $e) {
      return null;
    }
  }

  public function get_prices_in_high_season_interval($day) {
    try {
      $sql = "SELECT price_room_1, price_room_2 FROM high_seasons WHERE start <= :day AND end >= :day";

      $connection = Connection::connect();

      $stmt = $connection->prepare($sql);
      $stmt -> bindParam(":day", $day);
      $stmt -> execute();

      $data = $stmt -> fetch();

      $prices = array('1' => $data['price_room_1'], '2' => $data['price_room_2']);
      
      return $prices;
    } catch (PDOException $e) {
      return null;
    }
  }

  public function update_high_season($high_season) {
    $id = $high_season -> getId();
    $price_room_1 = $high_season -> getPriceRoom1();
    $price_room_2 = $high_season -> getPriceRoom2();
    $start = $high_season -> getStart();
    $end = $high_season -> getEnd();

    try {
      $sql = "UPDATE high_seasons SET price_room_1 = :price_room_1, price_room_2 = :price_room_2, start = :start, end = :end WHERE id = :id";

      $connection = Connection::connect();

      $stmt = $connection->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":price_room_1", $price_room_1);
      $stmt->bindParam(":price_room_2", $price_room_2);
      $stmt->bindParam(":start", $start);
      $stmt->bindParam(":end", $end);

      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function delete_high_season($id) {
    try {
      $sql = "DELETE FROM high_seasons WHERE id = :id";

      $connection = Connection::connect();

      $stmt = $connection->prepare($sql);
      $stmt->bindParam(":id", $id);

      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
}
