<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creación de un nuevo jugador</title>
</head>
<body>
    <header><img src=""></header>
    <h1>Creación de jugadores</h1>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        insertarJugador($nombre_jugador, $fecha_nacimiento, $ncanastas, $nasis, $nrebotes, $posicion, $equipo);
    }
    else {
    ?>
    Introduce los datos del jugador a crear:
    <form action="" method="POST">
        Nombre del jugador: <input type="text" name="nombre_jugador" maxlen="100" required><br>
        Fecha de nacimiento: <input type="date" name="fecha_nacimiento" min="1920-1-1" max="2007-1-1" required><br>
        Número de canastas: <input type="number" name="ncanastas" maxlen="11" min="0" required><br>
        Número de asistencias: <input type="number" name="nasis" maxlen="11" min="0" required><br>
        Número de rebotes: <input type="number" name="nrebotes" maxlen="11" min="0" required><br>
        Posición del jugador: <input type="text" name="posicion" maxlen="100" required><br>
        Equipo del jugador: <input type="text" name="equipo" maxlen="100" required><br>
        <input type="submit" value="CREAR JUGADOR">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>