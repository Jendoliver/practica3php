<?php
/*
*
* error_lib.php --- Librería de errores
*
*/

//ERRORES GRAVES
function errorConsulta()
{
    echo "<h1>ERROR EN LA CONSULTA, LLAMA A TU PROGRAMADOR Y DILE QUE HAGA BIEN SU TRABAJO</h1>";
}

//ERRORES TRANQUIS
function errorEquipoYaExiste()
{
    echo "<h1>EL EQUIPO YA EXISTE, ESPECIFICA OTRO</h1>";
    if(!empty($_POST))
    {
        freePost($_POST);
        echo "<form action='crearequipo.php' method='POST'><input type='submit' value='VOLVER A INTENTARLO'></form>";
    }
}

function errorEquipoNoExiste()
{
    echo "<h1>EL EQUIPO ESPECIFICADO NO EXISTE, CREALO PRIMERO</h1>";
    echo "<form action='crearequipo.php' method='POST'><input type='submit' value='IR A CREACION DE EQUIPOS'></form>";
}

function errorJugadorNoExiste()
{
    echo "<h1>EL JUGADOR ESPECIFICADO NO EXISTE, CREALO PRIMERO</h1>";
    echo "<form action='crearjugador.php' method='POST'><input type='submit' value='IR A CREACION DE JUGADORES'></form>";
}

function errorJugadorYaExiste()
{
    echo "<h1>EL JUGADOR YA EXISTE</h1>";
}

function errorPlayerEmpty()
{
    echo "<h1>La lista de jugadores esta vacia, tendras que dar de alta alguno primero</h1>";
    echo "<form action='crearjugador.php' method='POST'><input type='submit' value='IR A NUEVO JUGADOR'></form>";
}

function errorTeamEmpty()
{
    echo "<h1>La lista de equipos esta vacia, tendras que dar de alta alguno primero</h1>";
    echo "<form action='crearequipo.php' method='POST'><input type='submit' value='IR A NUEVO EQUIPO'></form>";
}

function errorTeamWithoutPlayers()
{
    echo "<h1>El equipo especificado no tiene jugadores</h1>";
}

function errorNoResults()
{
    echo "<h1>No hay resultados</h1>";
}

//Paranoias
function freePost($post)
{
    foreach($post as $key => $value)
        unset($post[$key]);
}