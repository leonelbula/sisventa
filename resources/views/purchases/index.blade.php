@extends('layouts.app')

@section('title', 'Compras')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h4 class="mb-0">
                        Compras
                    </h4>

                    <small class="text-muted">
                        Gestión de compras
                    </small>

                </div>

                <a
                    href="{{ route('purchases.create') }}"
                    class="btn btn-primary">

                    <i class="bi bi-plus-circle me-2"></i>
                    Nueva Compra

                </a>

            </div>

        </div>

        <div class="card-body">

            <form method="GET">

                <div class="row g-3">

                    <div class="col-md-4">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Buscar factura...">

                    </div>

                    <div class="col-md-3">

                        <select
                            name="status"
                            class="form-select">

                            <option value="">
                                Todos los estados
                            </option>

                            <option
                                value="BORRADOR"
                                @selected(request('status')=='BORRADOR')>

                                Borrador

                            </option>

                            <option
                                value="CONFIRMADA"
                                @selected(request('status')=='CONFIRMADA')>

                                Confirmada

                            </option>

                            <option
                                value="ANULADA"
                                @selected(request('status')=='ANULADA')>

                                Anulada

                            </option>

                        </select>

                    </div>

                    <div class="col-md-2">

                        <button
                            class="btn btn-primary w-100">

                            Buscar

                        </button>

                    </div>

                </div>

            </form>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Factura</th>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th width="180">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($purchases as $purchase)

                        <tr>

                            <td>
                                {{ $purchase->invoice_number }}
                            </td>

                            <td>
                                {{ $purchase->supplier->name }}
                            </td>

                            <td>
                                {{ $purchase->purchase_date->format('d/m/Y') }}
                            </td>

                            <td>
                                $
                                {{ number_format($purchase->total,0,',','.') }}
                            </td>

                            <td>

                                @if($purchase->status === 'BORRADOR')

                                    <span class="badge bg-warning">
                                        Borrador
                                    </span>

                                @elseif($purchase->status === 'CONFIRMADA')

                                    <span class="badge bg-success">
                                        Confirmada
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Anulada
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ route('purchases.show', $purchase) }}"
                                    class="btn btn-light btn-sm">

                                    <i class="bi bi-eye"></i>

                                </a>

                                @if($purchase->isDraft())

                                    <a
                                        href="{{ route('purchases.edit', $purchase) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center">

                                No hay registros.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer bg-white">

            {{ $purchases->links() }}

        </div>

    </div>

</div>

@endsection