<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Pistagnesi, Marco. FAI-4407. TUDW. marcopistagnesi2003@gmail.com. elpista */
/* Metzger, German. FAI-3521. TUDW. metzgergerman@gmail.com. GermanMetzger */
/* ... COMPLETAR ... */



/************************************************** FUNCIONES ***************************************************
 Una función es un conjunto de instrucciones que a lo largo del programa van a ser ejecutadas multitud de veces.
 Es por ello, que este conjunto de instrucciones se agrupan en una función.
 Las funciones pueden ser llamadas y ejecutadas desde cualquier punto del programa.
*****************************************************************************************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "CALLE", "PRIMA", "CARTA", "JUEGO", "PASTA"
        
    ];

    return ($coleccionPalabras);
}

function imprimirResultado(){

    return 1;

}

function menu($nombreUsuario){
    // int $tecladoEntrada
    echo "***************************************************\n";
    echo "** Seleccione una de las opciones: **\n";
    echo "1) Jugar con palabra elegida \n";
    echo "2) Jugar con palabra aleatoria \n";
    echo "3) Mostrar una partida \n";
    echo "4) Mostrar la primer partida ganadora \n";
    echo "5) Mostrar resumen de ";
    echo $nombreUsuario;
    echo " \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra \n";
    echo "7) Agregar una palabra de 5 letras a Wordix \n";
    echo "8) Salir \n";
    echo "***************************************************\n";
    $tecladoEntrada = solicitarNumeroEntre(1, 8);
     return $tecladoEntrada;
    }

/* ... COMPLETAR ... */


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int $numeroPalabra
// int $partida
// array $partidasJugadas
// array $resumenJugador
// array $partidasJugadas

//Inicialización de variables:

$partidasJugadas = [];
$resumenJugador = [];
$partidasJugadas = [];

//Proceso:

escribirMensajeBienvenida();

//print_r($partida);
//imprimirResultado($partida);


do {
    $opcion = menu($nombreUsuario);

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
            echo "Ingrese el nombre del jugador \n";
            $nombreUsuario = trim(fgets(STDIN));
            echo "Ingrese un número entre 1 y 20 \n";
            $numeroPalabra = solicitarNumeroEntre(1, 20) - 1;
            $partida = jugarWordix(cargarColeccionPalabras()[$numeroPalabra], $nombreUsuario);
            $partidasJugadas[count($partidasJugadas)]["palabraWordix"] = $partida["palabraWordix"];
            $partidasJugadas[count($partidasJugadas)]["jugador"] = $partida["jugador"];
            $partidasJugadas[count($partidasJugadas)]["intentos"] = $partida["intentos"];
            $partidasJugadas[count($partidasJugadas)]["puntaje"] = $partida["puntaje"];
            print_r($partidasJugadas); //esta línea es solo para hacer pruebas

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $numeroPalabra = rand(0, 19);
            echo "Ingrese el nombre del jugador \n";
            $nombreUsuario = trim(fgets(STDIN));
            $partida = jugarWordix(cargarColeccionPalabras()[$numeroPalabra], $nombreUsuario);
            $partidasJugadas[count($partidasJugadas)]["palabraWordix"] = $partida["palabraWordix"];
            $partidasJugadas[count($partidasJugadas)]["jugador"] = $partida["jugador"];
            $partidasJugadas[count($partidasJugadas)]["intentos"] = $partida["intentos"];
            $partidasJugadas[count($partidasJugadas)]["puntaje"] = $partida["puntaje"];
            print_r($partidasJugadas); //esta línea es solo para hacer pruebas

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4:


            break;
        case 5:


            break;
        case 6:


            break;
        case 7:


            break;
        case 8:
            echo "Cerrando Wordix...";

            break;
    }
} while ($opcion != 8);

