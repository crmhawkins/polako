@extends('layouts.app')

@section('titulo', 'Crear Categoria de Producto')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content')
 <div class="page-heading card" style="box-shadow: none !important" >
    <div class="page-title card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Crear categoria de producto</h3>
                <p class="text-subtitle text-muted">Formulario para registrar una categoria de producto</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('productosCategoria.index')}}">Categorias de Productos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear producto</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section mt-4">
        <div class="card">
            <div class="card-body">
                <form action="{{route('productosCategoria.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bloque-formulario">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title">Nombre:</label>
                                    <input placeholder="Nombre de la categoria" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="concept">Imagen:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success w-100 text-uppercase">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>

@endsection
