@extends('layouts.principal')

@section('contenido')
    <form class="col s8" method="POST" action="{{ route('productos.store') }}"
    enctype="multipart/form-data">
      @csrf
      @if( session('mensajito') )
        <div class="row">
          <strong>{{ session('mensajito') }}</strong>
        </div>
      @endif

    <div class="row">
       <div class="col s8">
           <h4 class="deep-purple-text text-deep-purple">Nuevo Producto</h4>
       </div> 
    </div>
    <div class="row">
    <div class="input-field col s8">
        <input 
            placeholder="Nombre del producto" 
            id="nombre" 
            type="text" 
            class="validate"
            name="nombre">
        <label for="nombre"> Nombre del producto </label>
        <strong class="red-text text-darken-1">{{ $errors->first('nombre') }}</strong>
        </div>
        
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input  
          id="descripcion" 
          type="text" 
          class="validate"
          name="descripcion">
          <label for="descripcion"> Descripción </label>
          <strong class="red-text text-darken-1">{{ $errors->first('descripcion') }}</strong>
        </div>

      </div>
      <div class="row">
        <div class="input-field col s8">
          <input 
            id="precio" 
            type="text" 
            class="validate"
            name="precio">
          <label for="precio">Precio</label>
          <strong class="red-text text-darken-1">{{ $errors->first('precio') }}</strong>
        </div>
      </div>

      <div class="row">
        <div class="col s8 input-field ">
          <select name="marca" id="marca">
            <option value=""> </option>
            @foreach($marcas as $marca)
            <option value="{{ $marca->id }}">
              {{$marca->nombre}}
            </option>
            @endforeach
          </select>
          <label>Marcas</label>
          <strong class="red-text text-darken-1">{{ $errors->first('marca') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="categoria" id="categoria">
            <option value=""> </option>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">
              {{ $categoria->nombre }}
            </option>
            @endforeach
          </select>
          <label>Categorias</label>
          <strong class="red-text text-darken-1">{{ $errors->first('categoria') }}</strong>
        </div>
      </div>


    <div class="file-field input-field">
      <div class="btn">
        <span>Imagen</span>
        <input type="file" name="imagen" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files">
      </div>
    </div>
    <strong class="red-text text-darken-1">{{ $errors->first('imagen') }}</strong>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
        </button>
      </div>

  </form>
  @endsection
        