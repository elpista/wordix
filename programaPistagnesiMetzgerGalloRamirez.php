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

function menu(){
    // int $tecladoEntrada
    echo "***************************************************\n";
    echo "** Seleccione una de las opciones: **\n";
    echo "1) Jugar con palabra elegida \n";
    echo "2) Jugar con palabra aleatoria \n";
    echo "3) Mostrar una partida \n";
    echo "4) Mostrar la primer partida ganadora \n";
    echo "5) Mostrar resumen de jugador \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra \n";
    echo "7) Agregar una palabra de 5 letras a Wordix \n";
    echo "8) Salir \n";
    echo "***************************************************\n";
    $tecladoEntrada = solicitarNumeroEntre(1, 8);
    return $tecladoEntrada;
}

function mostrarPartida($partidas, $indice){

    $partidas=calcularPuntos($partidas);

    echo "***************************************************\n";
    echo "partida WORDIX n°" . $indice + 1 . ": palabra " . $partidas[$indice]["palabraWordix"] . " \n";
    echo "Jugador: " . $partidas[$indice]["jugador"] . " \n";
    echo "puntaje: " . $partidas[$indice]["puntaje"] . " \n";
    
    if($partidas[$indice]["intentos"] == 0) {

        echo "No adivinó la palabra"."\n";

    } else {

        echo "Intento: Adivino la palabra en " . $partidas[$indice]["intentos"] . " intentos"." \n";

    }
    echo "***************************************************\n";

}



/* ... COMPLETAR ... */


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int $numeroPalabra
// int $partida
// int $buscarPartida
// array $partidasJugadas
// array $resumenJugador
// array $partidasJugadas

//Inicialización de variables:

$partidasJugadas = [];
$resumenJugador = [];
//$partidasJugadas = [];

//Proceso:





do {
    $opcion = menu();

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
            echo "Ingrese el nombre del jugador \n";
            $nombreUsuario = trim(fgets(STDIN));
            echo "Ingrese un número entre 1 y 20 \n";
            $numeroPalabra = solicitarNumeroEntre(1, 20) - 1;
            $partida = jugarWordix(cargarColeccionPalabras()[$numeroPalabra], $nombreUsuario);
            $numeroDePartida = count($partidasJugadas);
            $partidasJugadas[$numeroDePartida]["palabraWordix"] = $partida["palabraWordix"];
            $partidasJugadas[$numeroDePartida]["jugador"] = $partida["jugador"];
            $partidasJugadas[$numeroDePartida]["intentos"] = $partida["intentos"];
            $partidasJugadas[$numeroDePartida]["puntaje"] = $partida["puntaje"];
            $partidasJugadas[$numeroDePartida]["resultado"] = $partida["resultado"];
            mostrarPartida($partidasJugadas,$numeroDePartida);

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $numeroPalabra = rand(0, 19);
            echo "Ingrese el nombre del jugador \n";
            $nombreUsuario = trim(fgets(STDIN));
            $partida = jugarWordix(cargarColeccionPalabras()[$numeroPalabra], $nombreUsuario);
            $numeroDePartida = count($partidasJugadas);
            $partidasJugadas[$numeroDePartida]["palabraWordix"] = $partida["palabraWordix"];
            $partidasJugadas[$numeroDePartida]["jugador"] = $partida["jugador"];
            $partidasJugadas[$numeroDePartida]["intentos"] = $partida["intentos"];
            $partidasJugadas[$numeroDePartida]["puntaje"] = $partida["puntaje"];
            $partidasJugadas[$numeroDePartida]["resultado"] = $partida["resultado"];
            mostrarPartida($partidasJugadas,$numeroDePartida);

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            if (count($partidasJugadas) == 0){
                echo "No se encontraron partidas guardadas \n";
            } else {
                echo "Seleccione un numero de partida \n";
                $buscarPartida = trim(fgets(STDIN));
                while($buscarPartida > count($partidasJugadas) || $buscarPartida <= 0){
                    echo "Debe seleccionar un numero menor o igual a ";
                    echo count($partidasJugadas);
                    echo " y mayor a 0 \n";
                    $buscarPartida = trim(fgets(STDIN));
                }
                $buscarPartida = $buscarPartida - 1;
                mostrarPartida($partidasJugadas, $buscarPartida);

            }

            break;
        case 4:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 4
            $indice=0; 
            if (count($partidasJugadas) == 0){
                echo "No se encontraron partidas guardadas \n";
            }else{                     
                echo "Ingrese el nombre del jugador \n";
                $nombreUsuario = trim(fgets(STDIN));

                $jugadorExiste=false;
                $partidaGanada=false;
                foreach($partidasJugadas as $partida){                
                    if($partida["jugador"]==$nombreUsuario){
                        $jugadorExiste=true;

                        if($partida["resultado"] == "Ganada"){                                                   
                            $partidaGanada=true;
                            mostrarPartida($partidasJugadas, $indice);
                            break;
                        }
                    }

                    $indice++;
                }
                
                if(!$jugadorExiste){
                    echo "No existe el jugador\n";
                }
                else {
                    if(!$partidaGanada){
                        echo "El jugador ".$nombreUsuario." no ganó ninguna partida\n";            
                    }

                }
            }
            break;
        case 5:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 5
            $partidasTotales = 0;
            $partidasGanadasTotales = 0;
            $partidasPerdidas = 0;
            $porcentajeDevictorias = 0;
            $primerIntento = 0;
            $segundoIntento = 0;
            $tercerIntento = 0;
            $cuartoIntento = 0;
            $quintoIntento = 0;
            $sextoIntento = 0;

            if (count($partidasJugadas) == 0){
                echo "No se encontraron partidas guardadas \n";
            }else{                     
                echo "Ingrese el nombre del jugador \n";
                $nombreUsuario = trim(fgets(STDIN));
            }
            $jugadorExiste=false;

            foreach($partidasJugadas as $partida)
            {
                if($partida["jugador"] == $nombreUsuario)
                {
                    $partidasTotales++;
                    $jugadorExiste=true;
                
                    if($partida["resultado"] == "Ganada"){
                        $partidasGanadasTotales++;
                    }
                    else{
                        $partidasPerdidas++;
                    }
                    if($partida["intentos"] == 1){
                        $primerIntento++;
                    }
                    if($partida["intentos"] == 2){
                        $segundoIntento++;
                    }
                    if($partida["intentos"] == 3){
                        $tercerIntento++;
                    }
                    if($partida["intentos"] == 4){
                        $cuartoIntento++;
                    }
                    if($partida["intentos"] == 5){
                        $quintoIntento++;
                    }
                    if($partida["intentos"] == 6){
                        $sextoIntento++;
                    }
                }
            }

            $porcentajeDevictorias = ($partidasGanadasTotales*100)/$partidasTotales;           

            
            echo "***************************************************\n";
            echo "Jugador: ".$nombreUsuario."\n";
            echo "Partidas: ".$partidasTotales."\n";
            echo "Puntaje Total: "."0"."\n";
            echo "Victorias: ".$partidasGanadasTotales."\n";
            echo "perdida: ".$partidasPerdidas."\n";
            echo "Porcentaje Victorias: ".($porcentajeDevictorias."%"."\n");
            echo "Adivinadas:\n";
            echo "   intento 1: ".$primerIntento."\n";
            echo "   intento 2: ".$segundoIntento."\n";
            echo "   intento 3: ".$tercerIntento."\n";
            echo "   intento 4: ".$cuartoIntento."\n";
            echo "   intento 5: ".$quintoIntento."\n";
            echo "   intento 6: ".$sextoIntento."\n";
            echo "***************************************************\n";

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

