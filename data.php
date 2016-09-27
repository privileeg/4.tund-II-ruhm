<?php

	require("functions.php");
	
	//kui ei ole kasutaja id'd
	if (!isset($_SESSION["userId"])){
		
			//suunan sisselogimise lehele
			header("location: login_arendus.php");
			
	
	}
	
	//kui on ?logout URLis siis logi välja
	if (isset($_GET["logout"])){
		
		session_destroy();
		header("Location: login_arendus.php");
		
	}






?>
<h1>Data</h1>

<p>Tere tulemas <?=$_SESSION["userEmail"];?>!

	<a href="?logout=1">Logi välja</a>
	
</p> 




