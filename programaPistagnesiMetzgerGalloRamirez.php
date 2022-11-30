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
// array $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PATIO", "SILLA", "ARBOL", "LAPIZ", "GORRA"
        
    ];

    return ($coleccionPalabras);
}



/**
 * muestra las opciones del menu y retorna la opcion elegida
 * @return int
 */
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

function cmp($a, $b) {
    if ($a["jugador"] == $b["jugador"]) {
        if ($a["palabraWordix"] == $b["palabraWordix"]) {
        return 0;
        }
        if ($a["palabraWordix"] < $b["palabraWordix"]) {
            return -1;
        } else {
            return 1;
        }
    }
    if ($a["jugador"] < $b["jugador"]) {
        return -1;
    } else {
        return 1;
    }
}

/**
 * Imprime una pantalla que demuestra el resumen de una partida
 * @param int $indice
 * @param array $partidas
 */
function mostrarPartida($partidas, $indice){

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
// int $opcion, $numeroPalabra, $partida, $numeroDePartida $buscarPartida, $partidasTotales, $partidasGanadasTotales, 
// $partidasPerdidas, $porcentajeDevictorias, $primerIntento, $segundoIntento, $tercerIntento, $cuartoIntento,
// $quintoIntento, $sextoIntento
// array $partidasJugadas, $resumenJugador, $coleccionPalabras
// STRING $nombreUsuario, $palabraEntrada
// BOOLEAN $jugadorExiste, $partidaGanada

//Inicialización de variables:

$partidasJugadas = [];
$resumenJugador = [];


//Proceso:

$coleccionPalabras = cargarColeccionPalabras();

do {
    $opcion = menu();
    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
            $esPalabraRepetida = false;
            echo "Ingrese el nombre del jugador: \n";
            $nombreUsuario = trim(fgets(STDIN));
            echo "Ingrese un número entre 1 y " . count($coleccionPalabras) . "\n";
            $numeroPalabra = solicitarNumeroEntre(1, count($coleccionPalabras)) - 1;
            for($i = 0; $i < count($partidasJugadas) ; $i++){
                if($partidasJugadas[$i]["jugador"] == $nombreUsuario){
                    if($coleccionPalabras[$numeroPalabra] == $partidasJugadas[$i]["palabraWordix"]){
                        $esPalabraRepetida = true;
                    }
                }
            }
            while($esPalabraRepetida == true){

                echo "Esta palabra ya ha sido usada por el jugador \n";
                echo "Ingrese un número entre 1 y " . count($coleccionPalabras) . "\n";
                $numeroPalabra = solicitarNumeroEntre(1, count($coleccionPalabras)) - 1;
                $esPalabraRepetida = false;
                for($i = 0; $i < count($partidasJugadas) ; $i++){
                    if($partidasJugadas[$i]["jugador"] == $nombreUsuario){
                        if($coleccionPalabras[$numeroPalabra] == $partidasJugadas[$i]["palabraWordix"]){
                            $esPalabraRepetida = true;
                        }
                    }
                }
            }
            $partida = jugarWordix($coleccionPalabras[$numeroPalabra], $nombreUsuario);
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
            $esPalabraRepetida = false;
            $numeroPalabra = rand(0, (count($coleccionPalabras) - 1));
            echo "Ingrese el nombre del jugador \n";
            $nombreUsuario = trim(fgets(STDIN));
            for($i = 0; $i < count($partidasJugadas) ; $i++){
                if($partidasJugadas[$i]["jugador"] == $nombreUsuario){
                    if($coleccionPalabras[$numeroPalabra] == $partidasJugadas[$i]["palabraWordix"]){
                        $esPalabraRepetida = true;
                    }
                }
            }
            while($esPalabraRepetida == true){
                $numeroPalabra = rand(0, (count($coleccionPalabras) - 1));
                $esPalabraRepetida = false;
                for($i = 0; $i < count($partidasJugadas) ; $i++){
                    if($partidasJugadas[$i]["jugador"] == $nombreUsuario){
                        if($coleccionPalabras[$numeroPalabra] == $partidasJugadas[$i]["palabraWordix"]){
                            $esPalabraRepetida = true;
                        }
                    }
                }
            }
            $partida = jugarWordix($coleccionPalabras[$numeroPalabra], $nombreUsuario);
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
            $puntajeFinal = 0;
            $partidasGanadasTotales = 0;
            $partidasPerdidas = 0;
            $puntajeFinal = 0;
            $porcentajeDevictorias = 0;
            $primerIntento = 0;
            $segundoIntento = 0;
            $tercerIntento = 0;
            $cuartoIntento = 0;
            $quintoIntento = 0;
            $sextoIntento = 0;
            $nombreUsuario = "nO t13n3 n0M8rE";

            if (count($partidasJugadas) == 0){
                $sinPartidas = "No se encontraron partidas guardadas \n";
                $sinPartidas = escribirRojo($sinPartidas);
            }else{                     
                $nombreDelJugador = "Ingrese excatamente el nombre del jugador:  \n";
                $nombreDelJugador = escribirGris($nombreDelJugador);
                $nombreUsuario = trim(fgets(STDIN));
                
            
            

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
                        if($partida["puntaje"] >= 0){
                            $puntajeFinal = $puntajeFinal + $partida["puntaje"];

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
                    }else{
                       $noHayJugador = "El jugador no existe.";
                       $noHayJugador = escribirRojo($noHayJugador);
                       echo $noHayJugador."\n";
                              
                    }
                }
            
            if($partidasTotales > 0){
            $porcentajeDevictorias = ($partidasGanadasTotales*100)/$partidasTotales;      
            }     

            
            echo "***************************************************\n";
            echo "Jugador: ".$nombreUsuario."\n";
            echo "Partidas: ".$partidasTotales."\n";
            echo "Puntaje Total: ".$puntajeFinal."\n";
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
            }

            break;
        case 6:

            if(count($partidasJugadas) == 0){
                echo "No se han encontrado partidas \n";
            } else{
                $partidasOrdenadas = $partidasJugadas;
                uasort($partidasOrdenadas, 'cmp');
                print_r($partidasOrdenadas);
            }

            break;
        case 7:

            $palabraEntrada = "";
            echo "ingrese una palabra de 5 letras \n";
            $palabraEntrada = trim(fgets(STDIN));
            while (strlen($palabraEntrada) != 5){
                echo "debes ingresar una palabra de EXACTAMENTE 5 letras \n";
                $palabraEntrada = trim(fgets(STDIN));
            }
            $palabraNueva = strtoupper($palabraEntrada);
            array_push($coleccionPalabras, $palabraNueva);
            echo "La palabra " . $palabraEntrada . " ha sido agregada correctamente \n";

            break;
        case 8:
            echo "Cerrando Wordix...";

            break;
    }
} while ($opcion != 8);

