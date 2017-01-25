<?php
/*
*
* bbdd_lib.php --- Funciones y procedimientos relativos a la BBDD
*
*/
require_once "error_lib.php";

//ELEMENTALES
function conectar($db) // Todo un clásico
{
    $conexion = mysqli_connect("localhost", "root", "", $db) or
        die("No se ha podido conectar a la BBDD");
    return $conexion;
}

function desconectar($con) // Otra que tal
{
    mysqli_close($con);
}

function printHomeButton()
{
    echo "<p><input type='submit' value='VOLVER AL MENÚ PRINCIPAL' formaction='index.php'>";
}

//SELECTS
function selectAllJugadores()
{
    $con = conectar("basket");
    if($res = mysqli_query($con, "SELECT * FROM player;"))
    {
        if(mysqli_num_rows($res)) // si hay jugadores
        {
            createTable($con, $res);
            desconectar($con);
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorPlayerEmpty();
            printHomeButton();
        }
    }
    else
    {
        desconectar($con);
        errorConsulta();
        printHomeButton();
    }
}

function selectAllEquipos()
{
    $con = conectar("basket");
    if($res = mysqli_query($con, "SELECT * FROM team;"))
    {
        if(mysqli_num_rows($res)) // si hay equipos
        {
            createTable($con, $res);
            desconectar($con);
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorTeamEmpty();
            printHomeButton();
        }
    }
    else
    {
        desconectar($con);
        errorConsulta();
        printHomeButton();
    }
}

function selectJugadoresEquipo($equipo)
{
    $con = conectar("basket");
    if($res = mysqli_query($con, "SELECT * FROM player WHERE team = '$equipo';"))
    {
        if(mysqli_num_rows($res)) // si hay jugadores en ese equipo
        {
            createTable($con, $res);
            desconectar($con);
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorTeamWithoutPlayers();
            printHomeButton();
        }
    }
    else
    {
        desconectar($con);
        errorConsulta();
        printHomeButton();
    }
}

function selectJugadoresCanastas($canastas)
{
    $con = conectar("basket");
    if($res = mysqli_query($con, "SELECT * FROM player WHERE nbaskets >= $canastas;"))
    {
        if(mysqli_num_rows($res)) // si hay jugadores que cumplan ese criterio
        {
            createTable($con, $res);
            desconectar($con);
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorNoResults();
            printHomeButton();
        }
    }
    else
    {
        desconectar($con);
        errorConsulta();
        printHomeButton();
    }
}

function selectEquiposCiudad($ciudad)
{
    $con = conectar("basket");
    if($res = mysqli_query($con, "SELECT * FROM team WHERE city = '$ciudad';"))
    {
        if(mysqli_num_rows($res)) // si hay equipos en esa ciudad
        {
            createTable($con, $res);
            desconectar($con);
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorNoResults();
            printHomeButton();
        }
    }
    else
    {
        desconectar($con);
        errorConsulta();
        printHomeButton();
    }
}
//INSERTS
function insertarEquipo($nombre, $ciudad, $fecha)
{
    if(!equipoExists($nombre)) // si el equipo no existe
    {
        $con = conectar("basket");
        $insert = "INSERT INTO team VALUES('$nombre', '$ciudad', '$fecha');";
        if(mysqli_query($con, $insert))
        {
            desconectar($con);
            echo "<p>Equipo creado con éxito";
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorConsulta();
            printHomeButton();
        }
    }
    else
    {
        errorEquipoYaExiste();
        printHomeButton();
    }
}

function insertarJugador($nombre, $fechanac, $ncanastas, $nasis, $nrebotes, $posicion, $equipo)
{
    if(equipoExists($equipo)) // antes de nada comprobamos que el equipo especificado realmente existe
    {
        $con = conectar("basket");
        $insert = "INSERT INTO player VALUES('$nombre', '$fechanac', $ncanastas, $nasis, $nrebotes, '$posicion', '$equipo');";
        if(mysqli_query($con, $insert))
        {
            desconectar($con);
            echo "<p>Jugador creado con éxito";
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorConsulta();
            printHomeButton();
        }
    }
    else
    {
        errorEquipoNoExiste();
        printHomeButton();
    }
}

//UPDATES
function actualizarPuntosJugador($nombre, $canastas, $asis, $rebotes)
{
    if(jugadorExists($nombre))
    {
        $con = conectar("basket");
        $update = "UPDATE player SET nbaskets = $canastas, nassists = $asis, nrebounds = $rebotes WHERE name = '$nombre';";
        if(mysqli_query($con, $update))
        {
            desconectar($con);
            echo "<p>Puntos del jugador actualizados con éxito";
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorConsulta();
            printHomeButton();
        }
    }
    else
    {
        errorJugadorNoExiste();
        printHomeButton();
    }
}

function actualizarEquipoJugador($nombre, $equipo)
{
    if(jugadorExists($nombre))
    {
        if(equipoExists($equipo))
        {
            $con = conectar("basket");
            $update = "UPDATE player SET team = '$equipo';";
            if(mysqli_query($con, $update))
            {
                desconectar($con);
                echo "<p>Equipo del jugador actualizado con éxito";
                printHomeButton();
            }
            else
            {
                desconectar($con);
                errorConsulta();
                printHomeButton();
            }
        }
        else
        {
            errorEquipoNoExiste();
            printHomeButton();
        }
    }
    else
    {
        errorJugadorNoExiste();
        printHomeButton();
    }
}

//DELETES
function borrarJugador($nombre)
{
    if(jugadorExists($nombre)) // comprobamos que el jugador existe
    {
        $con = conectar("basket");
        $delete = "DELETE FROM player WHERE name = '$nombre';";
        if(mysqli_query($con, $delete)) // si no hay error
        {
            desconectar($con);
            echo "<p>Jugador borrado con éxito";
            printHomeButton();
        }
        else
        {
            desconectar($con);
            errorConsulta();
            printHomeButton();
        }
    }
}

//BOOLEANAS
function jugadorExists($nombre)
{
    $con = conectar("basket");
    if($res = mysqli_query($con, "SELECT * FROM player WHERE name = '$nombre';"))
    {
        if(mysqli_num_rows($res)) // si el numero de tuplas es distinto a 0
        {
            desconectar($con);    
            return 1; // el jugador existe
        }
        else
        {
            desconectar($con);
            return 0; // el jugador no existe
        }
    }
    else
    {
        desconectar($con);
        errorConsulta();
        printHomeButton();
    }
}

function equipoExists($nombre)
{
    $con = conectar("basket");
    if($res = mysqli_query($con, "SELECT * FROM team WHERE name = '$nombre';"))
    {
        if(mysqli_num_rows($res)) // si el numero de tuplas es distinto a 0
        {
            desconectar($con);    
            return 1; // el equipo existe
        }
        else
        {
            desconectar($con);
            return 0; // el equipo no existe
        }
    }
    else
    {
        desconectar($con);
        errorConsulta();
        printHomeButton();
    }
}

//CREACIÓN DE TABLAS
function createTable($con, $res)
{
    $row = mysqli_fetch_assoc($res);
    echo "<table border=2px><th>"; // principio de tabla
    foreach($row as $key => $value) // header tabla
    {
        echo "<td>$key</td>";
    }
    echo "</th>";

    do // llenar tabla con el contenido de la query
    {
        echo "<tr>"; // principio de fila
        foreach($row as $key => $value) // llenamos una fila
            echo "<td>$value</td>";
        echo "</tr>"; // final de fila
    } while ($row = mysqli_fetch_assoc($res)); // mientras queden registros en la query
    echo "</table>"; // final de tabla
}