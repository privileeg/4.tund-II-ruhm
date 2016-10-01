<?php

	$signupEmailError="";
	$signupPasswordError="";
	
	if(isset($_POST["signupEmail"])){
		
		if(empty($_POST["signupEmail"])){
			
			echo "email on puudu";
			
			$signupEmailError = "E-post on kohustuslik";	
		}	
	}

	if(isset($_POST["signupPassword"])){
		
		if(empty($_POST["signupPassword"])){
			
			echo "Parool on puudu";
			
			$signupPasswordError = "Parool on kohustuslik";
		}else{
			
			if(strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki";
				
			}
			
		}
	
	}

?>


<html>
<head>
	<title>Logi sisse voi registreeru</title>
</head>

<body>
	<h2>Logi sisse</h2>
	
	<form method="POST"> <!--POST ei kuva paroole ega asi URL'is-->
	
		<input name="loginEmail" placeholder="E-post" type="text"><br><br>
		
		<input name="loginPassword" placeholder="Parool" type="password"><br><br>

		<input type="submit" value="Logi sisse">
		
	</form>

	
	<h2>Registreeru</h2>
	
	<form method="POST">
		
		<input name="signupEmail" placeholder="E-post" type="text"> <?php echo $signupEmailError; ?> <br><br>
		
		<input name="signupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError; ?> <br><br>
		
		<input name="signupName" placeholder="Eesnimi" type="text"> <br><br>
		
		<input name="signupFamily" placeholder="Perekonnanimi" type="text"> <br><br>
		
		<h4>Vali sugu</h4>
		
		<input type="radio" name="Sugu" value="Mees" checked> Mees <br>
		
		<input type="radio" name="Sugu" value="Naine"> Naine <br>
		
		<input type="radio" name="Sugu" value="Muu"> Muu <br><br>
		
		<input type="submit" value="Registreeru">
		
	</form>
	
</body>
</html>