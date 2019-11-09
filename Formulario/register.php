<?php
    session_start();
?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            $nombre = $_POST["user"];
            $contra = $_POST["pass"];
            $password_2 = $_POST["repass"];
            
            if(!isset($_SESSION["users"])) {
                $_SESSION["users"]=array();
            }

            if($contra == $password_2) {
                $user = [$nombre, $contra];
                $_SESSION["users"] [] = $user;
                echo'<script type="text/javascript">alert("¡Se ha llevado a cabo el registro!")</script>';
            } else {
                echo'<script type="text/javascript">alert("No se ha podido registrar")</script>';
            }
        ?>
        <p><a href="index.php">Volver a la página principal</a></p>
    </body>

</html>