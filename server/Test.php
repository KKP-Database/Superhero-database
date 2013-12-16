<?php
	require "DatabasePDO.php"; 
	require "Power.php";
	require "PortraitedBy.php";
	$power1 = Power::findAvg(1);
	$power2 = Power::findAvg(2);
	var_dump(doubleval($power1[0]));