<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver equipos de una ciudad determinada</title>
</head>
<body>
    <header><img src=""></header>
    <?php 
    require_once "bbdd_lib.php";
    if(!empty($_POST)) // si hay algo en $_POST
    {
        extract($_POST);
        echo "<h1>Listado de equipos de $ciudad</h1>";
        selectEquiposCiudad($ciudad);
    }
    else {
    ?>
    <h1>Listado de equipos de una ciudad</h1>
    Introduce el nombre de una ciudad para visualizar los equipos que pertenecen a la misma:
    <form action="" method="POST">
        Ciudad: <input type="text" name="ciudad" maxlen="100" required><br>
        <input type="submit" value="MOSTRAR JUGADORES">
    </form>
    <footer></footer>
    <?php } ?>
</body>
</html>