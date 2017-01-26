<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de jugadores</title>
</head>
<body>
    <header><img src=""></header>
    <h1>Listado de todos los jugadores</h1>
    <?php 
    require_once "bbdd_lib.php"; 
    selectAllJugadores();
    ?>
    <footer></footer>
</body>
</html>