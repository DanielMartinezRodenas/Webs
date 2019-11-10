<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Fútbol | Jugadores</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <section class="agrupar">
            <header class="cabecera">
                <h1>Fútbol</h1>
            </header>
            <section id="main">
                <nav class="menu">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="clubs.php">Clubs</a></li>
                        <li><a href="jugadores.php">Jugadores</a></li>
                    </ul>
                </nav>
                <article>
                    <table width="100%" border=1 cellspacing="0" cellpadding="0">
                    <?php $xml=simplexml_load_file("jugadores.xml");?>
                    <tr>
                        <td><strong>Nombre</strong></td>
                        <td><strong>Primer apellido</strong></td>
                        <td><strong>Segundo apellido</strong></td>
                        <td><strong>Edad</strong></td>
                        <td><strong>DNI</strong></td>
                        <td><strong>Nº de lesiones</strong></td>
                    </tr>
                    <?php foreach($xml as $equipo) :?>
                    <?php foreach($equipo->jugadores->jugador as $jugador) :?>
                            <tr>
                                <td><?php echo $jugador->nombrej ?></td>
                                <td><?php echo $jugador->apellido1 ?></td>
                                <td><?php echo $jugador->apellido2 ?></td>
                                <td><?php echo $jugador->edad ?></td>
                                <td><?php echo $jugador->dni ?></td>
                                <td><?php echo $jugador->nlesiones ?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endforeach;?>
                    </table>
            </section>
            <footer class="pie">
                Derechos reservados 2019-2020
            </footer>
        </section>
    </body>
</html>