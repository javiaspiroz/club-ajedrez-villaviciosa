<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>CAV | Bienbenido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/iconHorse.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top oscuro" id="inicio">
        <a class="navbar-brand" href="../index.html"><img src="../images/logoCav.jpg" height="50" width="100"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../html/blog.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/historia.html">Historia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/escuela.html">Escuela</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.html#galeria">Galería</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.html#donde">Dónde estamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.html#contacto">Contacto</a> <!-- Esto puede ir al footer -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/arena.html">Arena</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Liga</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../html/liga/liga20-21.html">Liga 20-21</a>
                        <a class="dropdown-item" href="../html/liga/liga19-20.html">Liga 19-20</a>
                        <a class="dropdown-item" href="../html/liga/liga18-19.html">Liga 18-19</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/enlaces.html">Enlaces de interés</a>
                </li>
                <li class="nav-item" id="navLogin">
                    <a class="nav-link" href="../html/login.html">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="claro">
    <br><br><br>
        <div class="container">
            <br>
        
<?php
	session_start();
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
<?php
    //session_start();
    
    //echo("BIENVENIDO " . $_SESSION['fname']);
    if ($_SESSION['fname'] == "admin"){
        echo("<h3>BIENVENIDO Administrador</h3>");
        echo("<p>A continuación te mostramos los formularios de contacto enviados. Tras contestar por email, elimina la entrada pulsando el botón.</p><hr>");

        $query = "SELECT * FROM `formulario`" ;
	    //echo $query;
	
	    $result = mysqli_query($connection, $query);

	    if ($result) {
		    // Success
		    // redirect_to("somepage.php");
		    //echo "Success!";
	    } else {
		    // Failure
		    // $message = "Subject creation failed";
		    die("Database query failed. " . mysqli_error($connection));
	    }
        
	    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo("<tr style='text-align: center; border: 1px solid black;'><td>".$row["username"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td><a href='mailto:".$row["email"]."'>".$row["email"]."</a></tr>");
                echo("<b>Nombre:</b> " . $row["fname"] . "<br>");
                echo("<b>Apellido:</b> " . $row["lname"] . "<br>"); 
                echo("<b>email:</b> " . "<a href='mailto:" .$row["email"] ."'>" .$row["email"] ."</a><br>"); 
                echo("<b>Asunto:</b> " . "<br>" . $row["subject"] . "<br><br>");
                echo("<input style='background-color: #705022; align-content: center;' type='submit' name='' value='Respondido' id='btRes' onclick = 'funcion();'>". "<br><hr>");
            }
        } else {
            echo "0 results";
        }

        //echo("</table>");

    }
    else{
        echo("<h3>BIENVENIDO " . $_SESSION['fname'] . "</h3>");
        echo("<br><p>A continuación te mostramos un lista de los integrantes del club y sus datos de contacto:</p><br>");
  
	    $query = "SELECT * FROM `usuarios`" ;
	    //echo $query;
	
	    $result = mysqli_query($connection, $query);

	    if ($result) {
		    // Success
		    // redirect_to("somepage.php");
		    //echo "Success!";
	    } else {
		    // Failure
		    // $message = "Subject creation failed";
		    die("Database query failed. " . mysqli_error($connection));
	    }
        
        echo("<table style='width: 75%; border: 1px solid black;'>  <tr style='text-align: center; border: 1px solid black;'> <th style='font-weight: bold;'>Username</th><th style='font-weight: bold;'>Nombre</th> <th style='font-weight: bold;'>Apellido</th> <th style='font-weight: bold;'>email</th> </tr>");

	    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo("<tr style='text-align: center; border: 1px solid black;'><td>".$row["username"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td><a href='mailto:".$row["email"]."'>".$row["email"]."</a></tr>");
                //echo "Username: " . $row["username"] . ", Nombre: " . $row["fname"]. ", Apellido: " . $row["lname"] . ", email: " . $row["email"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        echo("</table>");

    }
?>

            <br><br>
	    </div>
    </div>

<footer class="page-footer font-small oscuro darken-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-5">
                    <div class="mb-5 flex-center">
                        <a class="fb-ic" href=https://es-es.facebook.com/Club-Ajedrez-Villaviciosa-CAV-723788761034112/>
                            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Pinterest-->
                        <a class="pin-ic">
                            <i class="fas fa-mail-bulk	 fa-lg white-text fa-2x"> </i>
                        </a>
                    </div>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href=../index.html#inicio> Clubajedrezvillaviciosa.com</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>