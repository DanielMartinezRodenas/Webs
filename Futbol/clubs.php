<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Fútbol | Clubs</title>
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
                    <?php $xml=simplexml_load_file("jugadores.xml");?>
                    <table width="100%" border=1 cellspacing="0" cellpadding="0">
                    <tr>
                        <td><strong>Nombre</strong></td>
                        <td><strong>Ciudad</strong></td>
                        <td><strong>Nº de Seguidores</strong></td>
                        <td><strong>Himno</strong></td>
                        <td><strong>Fecha de creación</strong></td>
                        <td colspan="7"><strong>Jugadores</strong></td>
                    </tr>
                    <?php foreach($xml as $equipo) :?>
                        <tr>
                            <td><?php echo $equipo->nombre ?></td>
                            <td><?php echo $equipo->ciudad ?></td>
                            <td><?php echo $equipo->nseguidores ?></td>
                            <td><?php echo $equipo->himno ?></td>
                            <td><?php echo $equipo->fechacreacion ?></td>
                            <?php foreach($equipo->jugadores->jugador as $jugador) :?>
                                <td><?php echo $jugador->nombrej ?></td>
                            <?php endforeach;?>
                        </tr>
                    <?php endforeach;?>
                    </table>
                </article>
            </section>
            <footer class="pie">
                Derechos reservados 2019-2020
            </footer>
        </section>
    </body>
</html>