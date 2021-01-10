<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "cav");

  // 1. Crear conexión con la BBDD
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("La conexión con la BBDD ha fallado: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<!-- ?php 
function find_user_by_username($username,  $connection) {
		
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM data_users ";
		$query .= "WHERE usuario = '$username'";
		$query .= "LIMIT 1";  //Como username es primario no lo necesito
		echo "$query <br>";
		$user_set = mysqli_query($connection, $query);
		if (!$user_set) {
			die("Database query failed.");
		}
		
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

function attempt_login($username, $connection) {
		$user = find_user_by_username($username, $connection);
		if ($user) {
			
			//user encontrado
			
			return $user;
    }
			
		 else {
			// user not found
			//echo "Usuario no encontrado";
			return false;
		}
	}
	
	
	
?> -->
<?php

if(isset($_POST['fname'])) { 
    // check if the username has been set
	$fname = $_POST["fname"];
}
if(isset($_POST['lname'])) { 
    // check if the username has been set
	$lname = $_POST["lname"];
}
if(isset($_POST['email'])) { 
    // check if the username has been set
	$email = $_POST["email"];
}
if(isset($_POST['subject'])) { 
    // check if the username has been set
	$subject = $_POST["subject"];
}
//echo $_POST['newsletter'];
if(isset($_POST['newsletter']) && $_POST['newsletter'] == '1') { 
    // check if the username has been set
	$newsletter = 1;
	echo $newsletter;
}
else{
	$newsletter = 0;
	echo $newsletter;
}


/*$found_user = attempt_login($username, $connection);
$tipo=0;
$tablename ="data_users";
if ($found_user) {
      header("Location: " . "usuario_existe.php");	
}
     
else {
            //Encriptar password
            $pass_s = password_hash($password, PASSWORD_DEFAULT);*/
            $query  = "INSERT INTO `formulario` (";
			$query .= "  `fname`, `lname`,`email`, `subject`,`newsletter`";
			$query .= ") VALUES (";
			$query .= " '$fname', '$lname', '$email', '$subject', '$newsletter' ";
			$query .= ")";
	
			$result = mysqli_query($connection, $query);

			if ($result) {
				echo "El usuario se ha agregado correctamente";
			} else {
				die("Database query failed. " . mysqli_error($connection));
			}
//}
?>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>