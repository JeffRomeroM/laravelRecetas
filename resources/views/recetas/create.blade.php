@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection


@section('botones')

<a href="{{ route('recetas.index')}}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')

<h2 class="text-center mb-5">Crear Nueva Receta</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store')}}" enctype="multipart/form-data" novalidate> 
                @csrf 
                <div class="form-group mt-3">
                    <label for="titulo">Título</label>
                    <input type="text"
                        name="titulo"
                        value="{{ old('titulo') }}"
                        class="form-control @error('titulo') is-invalid @enderror" 
                        id="titulo"
                        placeholder="Título Receta"
                    />
                    @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                

                <div class="form-group mt-3">
                    <label for="categoria">Categoría</label>
                    <select name="categoria" 
                        id="categoria" 
                        class="form-control  @error('categoria') is-invalid @enderror"
                    >   <option value="">--Seleccione--</option>

                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'Selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>
                   <input type="hidden" name="preparacion" id="preparacion" value="{{old('preparacion')}}">
                   <trix-editor input='preparacion' 
                        style="min-height: 300px" 
                        class="form-control  @error('preparacion') is-invalid @enderror"
                        ></trix-editor>


                    @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                   <input type="hidden" name="ingredientes" id="ingredientes" value="{{old('ingredientes')}}">

                   <trix-editor input='ingredientes' 
                        style="min-height: 300px" 
                        class="form-control  @error('ingredientes') is-invalid @enderror"
                   ></trix-editor>


                    @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Elige la imagen</label>
                    <input type="file" 
                    name="imagen" 
                    id="imagen"
                    class="form-control @error('imagen') is-invalid @enderror">

                    @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    
                    <input type="submit"
                        class="btn btn-primary mt-3"
                        value="Agregar Receta"
                    />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection