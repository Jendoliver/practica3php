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
        echo "<p><input type='submit' value='VOLVER A INTENTARLO' formaction='crearequipo.php'>";
    }
}

function errorEquipoNoExiste()
{
    echo "<h1>EL EQUIPO ESPECIFICADO NO EXISTE, CREALO PRIMERO</h1>";
    echo "<p><input type='submit' value='IR A CREACIÓN DE EQUIPOS' formaction='crearequipo.php'>";
}

function errorPlayerEmpty()
{
    echo "<h1>La lista de jugadores esta vacia, tendras que dar de alta alguno primero</h1>";
    echo "<p><input type='submit' value='IR A NUEVO JUGADOR' formaction='crearjugador.php'>";
}

function errorTeamEmpty()
{
    echo "<h1>La lista de equipos esta vacia, tendras que dar de alta alguno primero</h1>";
    echo "<p><input type='submit' value='IR A NUEVO EQUIPO' formaction='crearequipo.php'>";
}

//Paranoias
function freePost($post)
{
    foreach($post as $key => $value)
        unset($post[$key]);
}