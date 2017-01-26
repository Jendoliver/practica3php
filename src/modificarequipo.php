<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar el equipo de un jugador</title>
</head>
<body>
    <header><img src=""></header>
    <h1>Modificar el equipo de un jugador</h1>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        actualizarEquipoJugador($nombre_jugador, $equipo);
    }
    else {
    ?>
    Introduce los datos del jugador a modificar:
    <form action="" method="POST">
        Nombre del jugador: <input type="text" name="nombre_jugador" maxlen="100" required><br>
        Nuevo equipo del jugador: <input type="text" name="equipo" maxlen="100" required><br>
        <input type="submit" value="ACTUALIZAR EQUIPO">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>