<?php
// including the database connection file
include_once("inc/config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>O campo nome não pode estar vazio.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>O campo idade não pode estar vazio.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>O campo email não pode estar vazio.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- STYLE LOCAL -->
    <link rel="stylesheet" href="./css/style.css">
	<title>Alterar Cadastro</title>
</head>

<body>
<div class="barra-breadcrb">
		<a href="index.php"><<< Home</a>
	</div>
<div class="container" style="margin-top: 50px;">
	<form name="form1" method="post" action="edit.php">
			<div class="form-group">
			  <label>Nome</label>
			  <input type="text" name="name" class="form-control" value="<?php echo $name;?>">
			</div>
			<div class="form-group">
					<label>Idade</label>
					<input type="text" name="age" class="form-control" value="<?php echo $age;?>">
			</div>
			<div class="form-group">
			<label>Email</label>
    		<input type="text" name="email" class="form-control" value="<?php echo $email;?>">
			</div>
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" name="update" value="Atualizar" class="btn btn-primary">
		  </form>
		</div>
		
</body>
</html>
