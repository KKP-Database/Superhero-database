<?php 
	require_once "./Team.php";
	$team1 = Team::findById(1); 
	$team2 = Team::findByName('Superman');
	var_dump($team1);
	var_dump($team2);