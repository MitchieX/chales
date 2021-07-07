<?php
class HighSeasonController {
  public static function add_high_season($post) {
    $high_season = new HighSeason(null, $post["room-1"], $post["room-2"], $post["start"], $post["end"]);
    
    $high_season_DAO = new HighSeasonDAO();
    return $high_season_DAO -> create($high_season);
  }

  public static function get_all_high_seasons() {
    $high_season_DAO = new HighSeasonDAO();
    return $high_season_DAO -> get_high_seasons_after_today();
  }

  public static function edit_high_season($post) {
    $high_season = new HighSeason($post["id"], $post["room-1"], $post["room-2"], $post["start"], $post["end"]);

    $high_season_DAO = new HighSeasonDAO();
    return $high_season_DAO -> update_high_season($high_season);
  }
  
  public static function delete_high_season($post) {
    $high_season_DAO = new HighSeasonDAO();
    return $high_season_DAO -> delete_high_season($post["id"]);
  }
}
