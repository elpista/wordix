<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Pistagnesi, Marco. FAI-4407. TUDW. marcopistagnesi2003@gmail.com. elpista */
/* Metzger, German. FAI-3521. TUDW. metzgergerman@gmail.com. GermanMetzger */
/* Ramirez, Juan Manuel. FAI-4391. TUDW. ramirezjuanmanu00@gmail.com. juanmanu0 */
/* Gallardo, Gabriel. FAI-4418. TUDW. ggabi7634@gmail.com. ggabi30 */


/************************************************** FUNCIONES ***************************************************
 Una función es un conjunto de instrucciones que a lo largo del programa van a ser ejecutadas multitud de veces.
 Es por ello, que este conjunto de instrucciones se agrupan en una función.
 Las funciones pueden ser llamadas y ejecutadas desde cualquier punto del programa.
*****************************************************************************************************************/
//prueba
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

/* ... COMPLETAR ... */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

function Menu($nombreUsuario){
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
    $tecladoEntrada = trim(fgets(STDIN));
     while($tecladoEntrada > 8 || $tecladoEntrada < 1 || !is_numeric($tecladoEntrada)){
        echo "Debes ingresar un valor válido \n";
        $tecladoEntrada = trim(fgets(STDIN));
     }
     return $tecladoEntrada;
    }

$nombreUsuario = escribirMensajeBienvenida();
$numeroDelMenu = menu($nombreUsuario);
echo $numeroDelMenu;


function ($nroIntentos){

    if($nroIntentos=="1"){
        $puntInicial=6;
    }
    elseif($nroIntentos=="2"){
        $puntInicial=5;
    }
    elseif($nroIntentos=="3"){
        $puntInicial=4;
    }
    elseif($nroIntentos=="4"){
        $puntInicial=3;
    }
    elseif($nroIntentos=="5"){
        $puntInicial=2;
    }
    elseif($nroIntentos=="6"){
        $puntInicial=1
    }else{
        $puntIncial=0
    }
}


//print_r($partida);
//imprimirResultado($partida);




do {
    $opcion = escribirMensajeBienvenida($usuario);

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

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


            break;
    }
} while ($opcion != $algo);

