@extends('layouts.app')

@section('titulo', 'Crear Almacen')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content')
 <div class="page-heading card" style="box-shadow: none !important" >
    <div class="page-title card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Crear Almacen</h3>
                <p class="text-subtitle text-muted">Formulario para registrar un almacen</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('almacenes.index')}}">Almacenes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear almacen</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section mt-4">
        <div class="card">
            <div class="card-body">
                <form action="{{route('almacenes.store')}}" method="POST">
                    @csrf
                    <div class="bloque-formulario">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nombre">Nombre:</label>
                                    <input placeholder="Nombre del almacen" type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{ old('nombre') }}" name="nombre">
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="salon_id" class="form-label">Salón asociado</label>
                                <select name="salon_id" id="salon_id" class="form-select" required>
                                    <option value="">Seleccione un salón</option>
                                    @foreach (\App\Models\Salones\Salon::all() as $salon)
                                        <option value="{{ $salon->id }}" {{ old('salon_id', $almacen->salon_id ?? '') == $salon->id ? 'selected' : '' }}>
                                            {{ $salon->nombre }}
                                        </option>
                                    @endforeach
                                </select>
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
