@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

    <div class="card">

        {{-- Encabezado --}}
        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h4 class="mb-1 fw-bold">
                        Categorías
                    </h4>

                    <p class="text-muted mb-0">
                        {{ $categories->total() }}
                        categorías encontradas
                    </p>
                </div>

                @can('create', App\Models\Category::class)
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">

                        <i class="bi bi-plus-lg me-1"></i>
                        Nueva Categoría
                    </a>
                @endcan

            </div>

        </div>

        {{-- Filtros --}}
        <div class="card-body border-top">

            <form method="GET" action="{{ route('categories.index') }}" class="row g-3 mb-4">

                <div class="col-md-5">

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search"></i>

                        </span>

                        <input type="text" name="search" class="form-control" placeholder="Buscar categoría..."
                            value="{{ $filters['search'] ?? '' }}">

                    </div>

                </div>

                <div class="col-md-3">

                    <select name="status" class="form-select">

                        <option value="">
                            Todos los estados
                        </option>

                        <option value="1" @selected(($filters['status'] ?? '') === '1')>

                            Activo

                        </option>

                        <option value="0" @selected(($filters['status'] ?? '') === '0')>

                            Inactivo

                        </option>

                    </select>

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary w-100">

                        <i class="bi bi-search me-1"></i>
                        Buscar

                    </button>

                </div>

                <div class="col-md-2">

                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary w-100">

                        <i class="bi bi-arrow-clockwise me-1"></i>
                        Limpiar

                    </a>

                </div>

            </form>


        </div>

        {{-- Tabla --}}
        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="80">
                            #
                        </th>

                        <th>
                            Nombre
                        </th>

                        <th>
                            Descripción
                        </th>

                        <th width="120">
                            Estado
                        </th>

                        <th width="180" class="text-center">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)
                        <tr>

                            <td>
                                {{ $category->id }}
                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $category->name }}
                                </div>

                            </td>

                            <td>

                                <span class="text-muted">

                                    {{ $category->description ?: 'Sin descripción' }}

                                </span>

                            </td>

                            <td>

                                @if ($category->status)
                                    <span class="badge bg-success">
                                        Activo
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactivo
                                    </span>
                                @endif

                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    @can('update', $category)
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-light border btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>
                                    @endcan

                                    @can('delete', $category)
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-light border btn-sm"
                                                onclick="return confirm('¿Desea eliminar la categoría?')">

                                                <i class="bi bi-trash text-danger"></i>

                                            </button>

                                        </form>
                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="text-center py-5">

                                    <i class="bi bi-inbox display-5 text-muted">
                                    </i>

                                    <h5 class="mt-3">
                                        No hay categorías registradas
                                    </h5>

                                    <p class="text-muted">
                                        Comienza creando tu primera categoría.
                                    </p>

                                </div>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Paginación --}}
        @if ($categories->hasPages())
            <div class="card-footer bg-white border-0 py-3">

                {{ $categories->links() }}

            </div>
        @endif

    </div>

@endsection
