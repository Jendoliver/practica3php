<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar los puntos de un jugador</title>
</head>
<body>
    <header><img src=""></header>
    <h1>Modificar los puntos de un jugador</h1>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        actualizarPuntosJugador($nombre_jugador, $ncanastas, $nasis, $nrebotes);
    }
    else {
    ?>
    Introduce los datos del jugador a modificar:
    <form action="" method="POST">
        Nombre del jugador: <input type="text" name="nombre_jugador" maxlen="100" required><br>
        Número de canastas: <input type="number" name="ncanastas" maxlen="11" min="0" required><br>
        Número de asistencias: <input type="number" name="nasis" maxlen="11" min="0" required><br>
        Número de rebotes: <input type="number" name="nrebotes" maxlen="11" min="0" required><br>
        <input type="submit" value="ACTUALIZAR JUGADOR">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>