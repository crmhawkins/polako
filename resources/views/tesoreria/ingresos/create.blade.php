@extends('layouts.app')

@section('titulo', 'Crear Ingreso')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content')
 <div class="page-heading card" style="box-shadow: none !important" >
    <div class="page-title card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Crear ingreso</h3>
                <p class="text-subtitle text-muted">Formulario para crear un Ingreso</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('ingreso.index')}}">Ingresos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear Ingreso</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section mt-4">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ingreso.store')}}" method="POST" >
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 mt-4">
                                    <label for="title" class="mb-2">Título:</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    <style>.text-danger {color: red;}</style>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="quantity" class="mb-2">Cantidad:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{old('quantity')}}">
                                    @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    <style>.text-danger {color: red;}</style>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="bank_id" class="mb-2">Banco:</label>
                                    <select class="form-select" id="bank_id" name="bank_id">
                                        <option value="">-- Seleccione un Banco --</option>
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('bank_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    <style>.text-danger {color: red;}</style>
                                @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="salon_id" class="mb-2">Salon:</label>
                                    <select class="form-select choices" id="salon_id" name="salon_id">
                                        <option value="">-- Selecciona un Salon --</option>
                                        @if (count($salones) > 0)
                                            @foreach($salones as $salon)
                                            <option value="{{ $salon->id }}" {{ old('salon_id') == $salon->id ? 'selected' : '' }}>{{ $salon->nombre}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('salon_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    <style>.text-danger {color: red;}</style>
                                @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="invoice_id" class="mb-2">Factura:</label>
                                    <select class="form-select choices" id="invoice_id" name="invoice_id">
                                        <option value="">-- Selecciona una factura --</option>
                                        @if (count($invoices) > 0)
                                            @foreach($invoices as $invoice)
                                            <option value="{{ $invoice->id }}" {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>{{ $invoice->reference }} &nbsp; {{ $invoice->client->name  ?? ''}} &nbsp; {{ $invoice->total ?? ''}} €</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('invoice_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    <style>.text-danger {color: red;}</style>
                                @enderror
                                </div>
                                <div class="col-md-6  mt-4">
                                    <label for="date" class="mb-2">Fecha:</label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}">
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    <style>.text-danger {color: red;}</style>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                <div class="card-body p-3">
                    <div class="card-title">
                        Acciones
                        <hr>
                    </div>
                    <div class="card-body">
                        <button id="actualizar" class="btn btn-success btn-block mt-3">Crear Ingreso</button>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    $('#actualizar').click(function(e){
        e.preventDefault(); // Esto previene que el enlace navegue a otra página.
        $('form').submit(); // Esto envía el formulario.
    });
</script>
@endsection
