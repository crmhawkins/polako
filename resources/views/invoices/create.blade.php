@extends('layouts.app')

@section('titulo', 'Crear Factura')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}">
@endsection

@section('content')
<div class="page-heading card" style="box-shadow: none !important">
    <div class="page-title card-body">
        <div class="row">
            <div class="col-md-6">
                <h3>Nueva Factura</h3>
                <p class="text-subtitle text-muted">Formulario para registrar una factura</p>
            </div>
        </div>
    </div>

    <section class="section mt-3">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('factura.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="client_id">Cliente</label>
                            <select name="client_id" id="client_id" class="form-select @error('client_id') is-invalid @enderror">
                                <option value="">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('client_id') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="invoice_status_id">Estado</label>
                            <select name="invoice_status_id" id="invoice_status_id" class="form-select @error('invoice_status_id') is-invalid @enderror">
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}" {{ old('invoice_status_id') == $estado->id ? 'selected' : '' }}>
                                        {{ $estado->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('invoice_status_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="payment_method_id">Método de pago</label>
                            <select name="payment_method_id" id="payment_method_id" class="form-select @error('payment_method_id') is-invalid @enderror">
                                @foreach($metodosPago as $metodo)
                                    <option value="{{ $metodo->id }}" {{ old('payment_method_id') == $metodo->id ? 'selected' : '' }}>
                                        {{ $metodo->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_method_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="expiration_date">Fecha de vencimiento</label>
                            <input type="date" name="expiration_date" class="form-control" value="{{ old('expiration_date') }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="iva_percentage">IVA (%)</label>
                            <input type="number" step="0.01" name="iva_percentage" class="form-control" value="{{ old('iva_percentage', 21) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="discount_percentage">Descuento (%)</label>
                            <input type="number" step="0.01" name="discount_percentage" class="form-control" value="{{ old('discount_percentage', 0) }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="note">Nota interna</label>
                            <textarea name="note" class="form-control" rows="2">{{ old('note') }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="observations">Observaciones</label>
                            <textarea name="observations" class="form-control" rows="2">{{ old('observations') }}</textarea>
                        </div>
                    </div>

                    <hr>
                    <h5>Conceptos</h5>

                    <table class="table table-bordered mt-3" id="tabla-conceptos">
                        <thead class="table-light">
                            <tr>
                                <th>Título</th>
                                <th>Unidades</th>
                                <th>Precio unitario (€)</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Conceptos dinámicos aquí -->
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-outline-primary mb-3" onclick="agregarConcepto()">+ Añadir concepto</button>

                    <div class="row">
                        <div class="col-md-4 offset-md-8">
                            <div class="mb-2">
                                <label>Base imponible</label>
                                <input type="text" name="base" class="form-control" id="base" readonly>
                            </div>
                            <div class="mb-2">
                                <label>IVA</label>
                                <input type="text" name="iva" class="form-control" id="iva" readonly>
                            </div>
                            <div class="mb-2">
                                <label>Total</label>
                                <input type="text" name="total" class="form-control" id="total" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success w-100 text-uppercase">Guardar factura</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    function agregarConcepto() {
        const tbody = document.querySelector("#tabla-conceptos tbody");
        const row = document.createElement("tr");

        row.innerHTML = `
            <td><input type="text" name="conceptos[][title]" class="form-control" required></td>
            <td><input type="number" step="1" name="conceptos[][units]" class="form-control unidades" required></td>
            <td><input type="number" step="0.01" name="conceptos[][price]" class="form-control precio" required></td>
            <td><input type="text" class="form-control total-linea" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove(); calcularTotales();">Eliminar</button></td>
        `;

        tbody.appendChild(row);
        row.querySelectorAll('input').forEach(input => input.addEventListener('input', calcularTotales));
    }

    function calcularTotales() {
        let base = 0;
        document.querySelectorAll("#tabla-conceptos tbody tr").forEach(row => {
            const unidades = parseFloat(row.querySelector(".unidades").value) || 0;
            const precio = parseFloat(row.querySelector(".precio").value) || 0;
            const totalLinea = unidades * precio;
            row.querySelector(".total-linea").value = totalLinea.toFixed(2);
            base += totalLinea;
        });

        const ivaPct = parseFloat(document.querySelector("input[name='iva_percentage']").value) || 0;
        const descuentoPct = parseFloat(document.querySelector("input[name='discount_percentage']").value) || 0;
        const descuento = base * (descuentoPct / 100);
        const baseDescontada = base - descuento;
        const iva = baseDescontada * (ivaPct / 100);
        const total = baseDescontada + iva;

        document.getElementById('base').value = baseDescontada.toFixed(2);
        document.getElementById('iva').value = iva.toFixed(2);
        document.getElementById('total').value = total.toFixed(2);
    }

    document.querySelectorAll("input[name='iva_percentage'], input[name='discount_percentage']").forEach(input => {
        input.addEventListener('input', calcularTotales);
    });
</script>
@endsection
