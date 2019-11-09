<?php
    session_start();
?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Procesar login</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            $nombre = $_POST["name"];
            $contra = $_POST["pass"];
            $valor1 = false;
            $valor2 = false;

            foreach($_SESSION["users"] as $val1){   // Recorrer Array Asociativo
                if(in_array($nombre, $val1)){
                    $valor1 = true;
                }

                if(in_array($contra, $val1)){
                    $valor2 = true;
                }
            }
            
            if($valor1 == true && $valor2 == true){ // Login válido y mensaje en js
                echo '<script type="text/javascript">alert("Bienvenido ' . $nombre . '")</script>';
            } else {
                echo '<script type="text/javascript">alert("¡Login incorrecto!")</script>';
            }
        ?>
        <p><a href="index.php">Volver a la página principal</a></p>
    </body>

</html>