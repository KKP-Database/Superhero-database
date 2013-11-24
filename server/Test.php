<?php
	require "DatabasePDO.php"; 
	require "Superhero.php";
	$superhero = Superhero::findByName("Superman");
	foreach($superhero as $test) {
		var_dump($test);
	}