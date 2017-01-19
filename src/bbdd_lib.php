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
            echo "<table style='2px solid;'>"; // creación de la tabla y su header
            echo "<tr><th>Nombre</th><th>Fecha de nacimiento</th><th>Número de canastas</th><th>Número de asistencias</th><th>Número de rebotes</th><th>Posición</th><th>Equipo</th></tr>";
            while ($row = mysqli_fetch_array($res)) // mientras haya filas
            {
                extract($row);
                echo "<tr><td>$name</td><td>$birth</td><td>$nbaskets</td><td>$nassists</td><td>$nrebounds</td><td>$position</td><td>$team</td></tr>";
            }
            echo "</table>";
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
            echo "<table style='2px solid;'>"; // creación de la tabla y su header
            echo "<tr><th>Nombre</th><th>Ciudad del equipo</th><th>Fecha de creación del equipo</th></tr>";
            while ($row = mysqli_fetch_array($res)) // mientras haya filas
            {
                extract($row);
                echo "<tr><td>$name</td><td>$city</td><td>$creation</td></tr>";
            }
            echo "</table>";
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
    
}

function selectJugadoresCanastas($canastas)
{
    
}

function selectEquiposCiudad($ciudad)
{
    
}
//INSERTS
function insertarEquipo($nombre, $ciudad, $fecha)
{
    $con = conectar("basket");
    if(!equipoExists($nombre)) // si el equipo no existe
    {
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
        desconectar($con);
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
        desconectar($con);
        errorEquipoNoExiste();
        printHomeButton();
    }
}

//UPDATES
function actualizarPuntosJugador($canastas, $asis, $rebotes)
{
    
}

function actualizarEquipoJugador($equipo)
{
    
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