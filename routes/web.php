<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta
Route::get('hola', function(){ 
    echo "Hola 2465852";
});

Route::get('arreglo', function(){ 
    $estudiantes = [
        "AN" => "Andres",
        "CA" => "Camila",
        "LI" => "Lina"
    ];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    echo "<hr />";
    //agregar elemento a un arreglo
    $estudiantes["NI"] = "Nicole";
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    //eliminar elemento del arreglo
    echo "<hr />";
    unset($estudiantes["LI"]);
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
});

//Ruta evidencias
Route::get('paises', function(){ 
    $paises = [
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" => "Peso",
            "poblacion" => 51.6,
            "ciudades" =>[
                "Cali",
                "Medellin",
                "Barranquilla"
            ]
        ],
        "Argentina"=> [
            "capital" => "Buenos Aires",
            "moneda" => "Peso",
            "poblacion" => 45.3,
            "ciudades" =>[
                "Rosario",
                "Córdoba"
            ]
        ],
        "Puerto Rico"=> [
            "capital" => "San Juan",
            "moneda" => "Dolar",
            "poblacion" => 3.1,
            "ciudades" =>[
                "Ponce",
            ]
        ],
        "Perú"=> [
            "capital" => "Lima",
            "moneda" => "Sol",
            "poblacion" => 32.9,
            "ciudades" =>[
                "Cuzco",
                "Trujillo"
            ]
        ],
        "Brasil"=> [
            "capital" => "Brasilia",
            "moneda" => "Real",
            "poblacion" => 212.6,
            "ciudades" =>[
                "Rio de Janeiro",
                "São Paulo",
                "Manaos"
            ]
        ]
    ];
    
    //mostrar vista de paises
    return view("paises")->with("paises" , $paises );
});
