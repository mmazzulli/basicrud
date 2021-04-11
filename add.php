<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("inc/config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>O campo nome deve ser preenchido</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>O campo idade deve ser preenchido</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>O campo email deve ser preenchido</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		//display success message
		echo "<font color='green'>Cadastrado com sucesso!.";
		echo "<br/><a href='index.php'>Página Principal</a>";
	}
}
?>
</body>
</html>
