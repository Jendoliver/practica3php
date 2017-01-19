<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creación de un nuevo equipo</title>
</head>
<body>
    <header><img src=""></header>
    <h1>Creación de equipos</h1>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        insertarEquipo($nombre_equipo, $ciudad_equipo, $fecha_creacion);
    }
    else {
    ?>
    Introduce los datos del equipo a crear:
    <form action="" method="POST">
        Nombre del equipo: <input type="text" name="nombre_equipo" maxlen="100" required><br>
        Ciudad del equipo: <input type="text" name="ciudad_equipo" maxlen="100" required><br>
        Fecha de creación: <input type="date" name="fecha_creacion" required>
        <input type="submit" value="CREAR EQUIPO">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>