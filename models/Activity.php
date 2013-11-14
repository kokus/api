<?php

namespace models;
use lib\Core;
use PDO;

class Activity {
protected $core;

	function __construct() {
		$this->core = Core::getInstance();
		//$this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	// Get all teams
	public function getActivities() {
		$r = array();		

		$sql = "SELECT ";
		$sql .= "a.activity_id,";
		$sql .= "a.activity_date,";
		$sql .= "a.activity_activitytype_id,";
		$sql .= "a.activity_player_id,";
		$sql .= "a.activity_team_id,";
		$sql .= "a.activity_match_id,";
		$sql .= "at.activitytype_name,";
		$sql .= "m.venue_id,";
		$sql .= "v.venue_latitude,";
		$sql .= "v.venue_longitude, ";
		$sql .= "v.venue_name ";
		$sql .= "FROM activity a ";
		$sql .= "INNER JOIN activitytype at ON a.activity_activitytype_id = at.activitytype_id ";
		$sql .= "INNER JOIN matchh m ON m.match_id = a.activity_match_id ";
		$sql .= "INNER JOIN venue v ON v.venue_id = m.venue_id ";
		$sql .= "AND at.activitytype_name = 'Goal' ";
		$sql .= "AND v.venue_latitude is not null ";
		$sql .= "ORDER by a.activity_date DESC ";
		$sql .= "LIMIT 25";
		//echo $sql;
		
		$stmt = $this->core->dbh->prepare($sql);
		//$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);		   	
		} else {
			$r = 0;
		}		
		return $r;
	}

}