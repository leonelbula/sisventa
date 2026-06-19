@extends('layouts.app')

@section('title', 'Kardex')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <h4 class="fw-bold mb-0">
            Kardex de Inventario
        </h4>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table
                class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Referencia</th>
                        <th class="text-center">
                            Cantidad
                        </th>
                        <th class="text-center">
                            Stock Antes
                        </th>
                        <th class="text-center">
                            Stock Después
                        </th>
                        <th class="text-end">
                            Costo Unitario
                        </th>
                        <th class="text-end">
                            Total
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($kardex as $item)

                        <tr>

                            <td>
                                {{ $item->movement_date->format('d/m/Y H:i') }}
                            </td>

                            <td>
                                {{ $item->product->name }}
                            </td>

                            <td>

                                <span
                                    class="badge bg-primary">

                                    {{ $item->type }}

                                </span>

                            </td>

                            <td>
                                {{ $item->reference }}
                            </td>

                            <td class="text-center">
                                {{ $item->quantity }}
                            </td>

                            <td class="text-center">
                                {{ $item->stock_before }}
                            </td>

                            <td class="text-center">
                                {{ $item->stock_after }}
                            </td>

                            <td class="text-end">
                                ${{ number_format($item->unit_cost, 2) }}
                            </td>

                            <td class="text-end">
                                ${{ number_format($item->total_cost, 2) }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="9"
                                class="text-center py-5">

                                No hay movimientos.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="card-footer bg-white">

        {{ $kardex->links() }}

    </div>

</div>

@endsection