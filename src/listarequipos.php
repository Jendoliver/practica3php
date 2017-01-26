<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de equipos</title>
</head>
<body>
    <header><img src=""></header>
    <h1>Listado de todos los equipos</h1>
    <?php 
    require_once "bbdd_lib.php"; 
    selectAllEquipos();
    ?>
    <footer></footer>
</body>
</html>