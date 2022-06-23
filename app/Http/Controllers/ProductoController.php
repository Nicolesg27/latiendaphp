<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Seleccionar todos los productos
        $productos=Producto::all();
        //mostrar vista del catalogo de productos
        //Llevando la lista de prodcutos
        return view('productos.index')
        ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar todas las marcas
        $marcas = Marca::all();
        //Seleccionar todas las categorias
        $categorias = Categoria::all();
        //Mostrar la vista de nuevo producto
        //Enviandole los datos de marcas y categorias
        return view('productos.create')
            ->with('marcas' , $marcas)
            ->with('categorias' , $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //Validaciones
        //1. Establecer reglas de validacion
        $reglas=[
            "nombre" => 'required|alpha|unique:productos,nombre',
            "descripcion" => 'required|min:5|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            "categoria" => 'required'
        ];
        
        //2. Crear el objeto validador
        $v = Validator::make($r->all() , $reglas );

        //3. Validar
        if($v->fails()){
                //Si la validacion falló
                //Redirigirme a la vista de create(ruta: productos/create)
                //Con los mensajes error
                return redirect('productos/create')
                        ->withErrors($v);
        }else{
                //Validacion exitosa
                $archivo=$r->imagen;
                //obtener nombre originla del archivo
                $nombre_archivo = $archivo->getClientOriginalName();
                //establecer la ubicacion de guardado del archivo
                $ruta = public_path()."/img";
                //Mover el archivio de imagen a la ubicacion y nombre deseados
                $archivo->move($ruta , $nombre_archivo);
        
                //Crear un nuevo producto:
                $p = new Producto();
                //Asignar atributos del producto
                $p->nombre = $r->nombre;
                $p->descripcion = $r->descripcion;
                $p->precio = $r->precio;
                $p->marca_id = $r->marca;
                $p->categoria_id = $r->categoria;
                $p->imagen = $nombre_archivo;
                //Grabar producto
                $p->save();
                //redirigir a productos/create
                //con mensaje de exito
                return redirect('productos/create')
                        ->with('mensajito' , 'Producto registrado exitosamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui van el detalle del producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va el formulario para actualizar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
