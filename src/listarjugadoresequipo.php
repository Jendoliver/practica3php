<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver jugadores de un equipo</title>
</head>
<body>
    <header><img src=""></header>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        echo "<h1>Listado de jugadores del equipo $nombre_equipo</h1>";
        selectJugadoresEquipo($nombre_equipo);
    }
    else {
    ?>
    <h1>Listado de jugadores de un equipo</h1>
    Introduce el nombre de un equipo para visualizar los jugadores que pertenecen al mismo:
    <form action="" method="POST">
        Nombre del equipo: <input type="text" name="nombre_equipo" maxlen="100" required><br>
        <input type="submit" value="MOSTRAR JUGADORES">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>