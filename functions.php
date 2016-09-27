<?php
	//functions
	
	//see fail, peab olema kõigil lehtedel kus tahan kasutada SESSION muutujat 
	session_start();
	
	//**********
	//**SIGNUP**
	//**********
	//var_dump($GLOBALS);
		// stringina üks täht iga muutuja kohta (?), mis tüüp
		// string - s
		// integer - i
		// float (double) - d
		// küsimärgid asendada muutujaga
		
	function signUp ($email, $password){
	
		$database = "if16_andralla";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
		
	
		if ($mysqli->connect_error) {
			die('Connect Error: ' . $mysqli->connect_error);
		}
		
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
		
		echo $mysqli->error;

		$stmt->bind_param("ss", $email, $password);
		
	
		if($stmt->execute()) {
			echo "salvestamine õnnestus";			
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		$mysqli->close();
	
	}
	
	
	function login ($email, $password){
	
		$error = "";
	
	
		$database = "if16_andralla";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
		$stmt = $mysqli->prepare("SELECT id, email, password, created FROM user_sample WHERE email = ?");
		
		echo $mysqli->error;
		
		//asendan küsimärgi
		$stmt->bind_param("s", $email);
		
		//määran väärtused muutujatesse
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $created);
		$stmt->execute();
		
		//andmed tulid andmebaasist või mitte
		//on tõene kui on vähemalt üks vaste
		if($stmt->fetch()){
			//oli sellise meiliga kasutaja
			//password millega kasutaja tahab sisse logida
			$hash = hash("sha512", $password);
			if ($hash == $passwordFromDb) {
				echo "kasutaja logis sisse".$id;
				
				$_SESSION["userId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				
				//määran sessiooni muutujad millele saan ligi teistelt lehtedelt
				header("Location: data.php");
				
				
				
				
				
			}else{
				$error = "vale parool";
			}
			
						
		} else {
			//ei leidnud kasutajat selle meiliga
			$error = "ei ole sellist emaili";
		}
		
		return $error;
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*function sum($x, $y){
	
		return $x + $y;
		


	}
	
	function hello($firstname, $lastname){
		
		return "Tere tulemast ".$firstname." ".$lastname."!";		
		
	}
	
	echo hello("Andres", "Alla");	
	echo "<br>";
	echo sum(12541,151);
	echo "<br>";
	echo sum(1,1);
	*/
	
	
	
	
	
	
	
	
?>
