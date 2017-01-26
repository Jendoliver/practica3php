<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrar un jugador</title>
</head>
<body>
    <header><img src=""></header>
    <h1>Borrar un jugador</h1>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        borrarJugador($nombre_jugador);
    }
    else {
    ?>
    Introduce el nombre del jugador a borrar (¡CUIDADO! ¡ESTA ACCIÓN ES PERMANENTE!):
    <form action="" method="POST">
        Nombre del jugador: <input type="text" name="nombre_jugador" maxlen="100" required><br>
        <input type="submit" value="BORRAR JUGADOR">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>