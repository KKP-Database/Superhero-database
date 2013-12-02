<?php
	require "DatabasePDO.php"; 
	require "Power.php";
	$power = Power::findAllAvg();
	var_dump($power);