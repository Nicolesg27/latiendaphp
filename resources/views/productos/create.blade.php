@extends('layouts.principal')

@section('contenido')
    <form class="col s8">
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
            class="validate">
        <label for="nombre"> Nombre del producto </label>
        </div>
        
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input  
          id="desc" 
          type="text" 
          class="validate">
          <label for="desc"> Descripción </label>
        </div>

      </div>
      <div class="row">
        <div class="input-field col s8">
          <input 
            id="precio" 
            type="number" 
            class="validate">
          <label for="precio">Precio</label>
        </div>
      </div>

      <div class="row">
        <div class="col s8 input-field ">
          <select name="marca" id="marca">
            <option> Elija su marca </option>
            @foreach($marcas as $marca)
            <option>{{$marca->nombre}}</option>
            @endforeach
          </select>
          <label>Marcas</label>
        </div>
      </div>

      <div class="file-field input-field">
        <div class="btn">
          <span>Ingrese Imagen</span>
          <input type="file">
        </div>
        <div 
          class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>

      </div>
      <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn">Guardar</a>
        </div>
      </div>

  </form>
  @endsection
        