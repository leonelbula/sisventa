@extends('layouts.app')

@section('title', 'Productos')

@section('content')

    <div class="card border-0 shadow-sm">

        {{-- Header --}}
        <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">

            <div>

                <h4 class="mb-1 fw-bold">
                    Productos
                </h4>

                <small class="text-muted">
                    Administración de productos e inventario.
                </small>

            </div>

            <a href="{{ route('products.create') }}" class="btn btn-primary">

                <i class="bi bi-plus-lg me-1"></i>
                Nuevo Producto

            </a>

        </div>

        {{-- Filtros --}}
        <div class="card-body border-bottom">

            <form method="GET">

                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text" name="search" class="form-control"
                                placeholder="Buscar por nombre, SKU o código de barras..."
                                value="{{ $filters['search'] ?? '' }}">

                        </div>

                    </div>

                    <div class="col-md-2">

                        <select name="status" class="form-select">

                            <option value="">
                                Todos los estados
                            </option>

                            <option value="1" @selected(($filters['status'] ?? '') === '1')>

                                Activos

                            </option>

                            <option value="0" @selected(($filters['status'] ?? '') === '0')>

                                Inactivos

                            </option>

                        </select>

                    </div>

                    <div class="col-md-2">

                        <button type="submit" class="btn btn-outline-primary w-100">

                            <i class="bi bi-search me-1"></i>
                            Buscar

                        </button>

                    </div>
                    <div class="col-md-2">

                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100">

                            <i class="bi bi-arrow-clockwise me-1"></i>
                            Limpiar

                        </a>

                    </div>
                    <div class="d-flex gap-2">

                        <button type="submit" formaction="{{ route('products.bulkDestroy') }}" formmethod="POST"
                            class="btn btn-outline-danger">

                            <i class="bi bi-trash"></i>

                            Eliminar

                        </button>

                    </div>

                </div>

            </form>

        </div>

        {{-- Tabla --}}
        <div class="table-responsive">

            <table class="table align-middle table-hover mb-0">

                <thead class="table-light">

                    <tr>
                        <th width="40">
                            <input type="checkbox" id="checkAll" class="form-check-input">
                        </th>
                        <th>Código</th>

                        <th>
                            SKU
                        </th>

                        <th>
                            Producto
                        </th>

                        <th>
                            Categoría
                        </th>

                        <th class="text-center">
                            Stock
                        </th>

                        <th class="text-end">
                            Costo
                        </th>

                        <th class="text-end">
                            Venta
                        </th>

                        <th class="text-center">
                            Estado
                        </th>

                        <th width="150" class="text-center">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)
                        <tr>
                            <td>

                                <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                    class="form-check-input row-check">

                            </td>

                            <td>

                                <span class="badge bg-light text-dark border">

                                    {{ $product->barcode }}

                                </span>


                                {{-- SKU --}}
                            <td>

                                <span class="badge bg-light text-dark border">

                                    {{ $product->sku }}

                                </span>

                            </td>

                            {{-- Nombre --}}
                            <td>

                                <div class="fw-semibold">

                                    {{ $product->name }}

                                </div>                               

                            </td>

                            {{-- Categoría --}}
                            <td>

                                {{ $product->category?->name }}

                            </td>

                            {{-- Stock --}}
                            <td class="text-center">

                                @if ($product->stock <= $product->min_stock)
                                    <span class="badge bg-danger">

                                        {{ $product->stock }}

                                    </span>
                                @else
                                    <span class="badge bg-success">

                                        {{ $product->stock }}

                                    </span>
                                @endif

                            </td>

                            {{-- Costo --}}
                            <td class="text-end">

                                ${{ number_format($product->cost_price, 0, ',', '.') }}

                            </td>

                            {{-- Venta --}}
                            <td class="text-end fw-semibold">

                                ${{ number_format($product->sale_price, 0, ',', '.') }}

                            </td>

                            {{-- Estado --}}
                            <td class="text-center">

                                @if ($product->status)
                                    <span class="badge bg-success">

                                        Activo

                                    </span>
                                @else
                                    <span class="badge bg-secondary">

                                        Inactivo

                                    </span>
                                @endif

                            </td>

                            {{-- Acciones --}}
                            <td>

                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-light btn-sm border">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-light border">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <form method="POST" action="{{ route('products.destroy', $product) }}"
                                        class="delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-light border">

                                            <i class="bi bi-trash text-danger">
                                            </i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center py-5">

                                <i class="bi bi-box display-6 text-muted">
                                </i>

                                <div class="mt-2">

                                    No hay productos registrados.

                                </div>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Paginación --}}
        @if ($products->hasPages())
            <div class="card-footer bg-white">

                {{ $products->links() }}

            </div>
        @endif

    </div>

@endsection
@push('scripts')
    <script>
        document
            .getElementById('checkAll')
            .addEventListener('change', function() {

                document
                    .querySelectorAll('.row-check')
                    .forEach(checkbox => {

                        checkbox.checked = this.checked;

                    });

            });
    </script>
@endpush
