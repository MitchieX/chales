<?php
class IntervalDAO {
  public function update($interval) {
    try {
      $sql = "UPDATE reservation_interval SET interval_days = :interval_days WHERE id = 1";

      $connection = Connection::connect();

      $stmt = $connection->prepare($sql);
      $stmt->bindParam(":interval_days", $interval);

      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function get_interval() {
    try {
      $sql = "SELECT interval_days FROM reservation_interval WHERE 1";

      $connection = Connection::connect();

      $stmt = $connection->prepare($sql);
      $stmt->execute();

      $interval = $stmt -> fetch()["interval_days"];

      return $interval;
    } catch (PDOException $e) {
      return 0;
    }
  }
}
