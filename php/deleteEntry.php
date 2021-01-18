<?php

//function deleteEntry($id){
                session_start();
                
                $id = $_REQUEST["id"];
                echo "entro a la funcion";
                $query  = "DELETE FROM `formulario`";
                $query .= "WHERE `formulario`.`id`  = $id;";
                echo "<br>$query<br>";

                $result = mysqli_query($connection, $query);

                if ($result && mysqli_affected_rows($connection) == 1) {
                    // Success
                    // redirect_to("somepage.php");
                    echo "Success!";
                    
                    header("Location: " . "bienvenido.php");
                } else {
                    // Failure
                    // $message = "Subject update failed";
                    die("Database query failed. " . mysqli_error($connection));
                }
            //}
?>