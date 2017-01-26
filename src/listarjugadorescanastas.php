<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver jugadores con canastas determinadas</title>
</head>
<body>
    <header><img src=""></header>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        echo "<h1>Listado de jugadores con más de $ncanastas canastas</h1>";
        selectJugadoresCanastas($ncanastas);
    }
    else {
    ?>
    <h1>Listado de jugadores con canastas determinadas</h1>
    Introduce un número de canastas para visualizar los jugadores que tienen igual o más:
    <form action="" method="POST">
        Número de canastas: <input type="number" name="ncanastas" min="0" maxlen="11" required><br>
        <input type="submit" value="MOSTRAR JUGADORES">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>