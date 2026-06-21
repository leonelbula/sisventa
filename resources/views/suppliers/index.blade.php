@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')

<div class="card border-0 shadow-sm">

    {{-- Header --}}
    <div
        class="card-header bg-white d-flex justify-content-between align-items-center">

        <div>

            <h4 class="fw-bold mb-1">
                Proveedores
            </h4>

            <small class="text-muted">
                Administración de proveedores
            </small>

        </div>

        <div class="d-flex gap-2">

            <a
                href="#"
                class="btn btn-success">

                <i class="bi bi-file-earmark-excel me-1"></i>
                Excel

            </a>

            <a
                href="#"
                class="btn btn-danger">

                <i class="bi bi-file-earmark-pdf me-1"></i>
                PDF

            </a>

            <a
                href="{{ route('suppliers.create') }}"
                class="btn btn-primary">

                <i class="bi bi-plus-lg me-1"></i>
                Nuevo

            </a>

        </div>

    </div>

    {{-- Filtros --}}
    <div class="card-body border-bottom">

        <form
            method="GET"
            action="{{ route('suppliers.index') }}">

            <div class="row g-3">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Buscar por documento, nombre o empresa..."
                        value="{{ $filters['search'] ?? '' }}">

                </div>

                <div class="col-md-3">

                    <select
                        name="status"
                        class="form-select">

                        <option value="">
                            Todos los estados
                        </option>

                        <option
                            value="1"
                            @selected(($filters['status'] ?? '') === '1')>

                            Activos

                        </option>

                        <option
                            value="0"
                            @selected(($filters['status'] ?? '') === '0')>

                            Inactivos

                        </option>

                    </select>

                </div>

                <div class="col-md-2 d-grid">

                    <button
                        class="btn btn-outline-primary">

                        <i class="bi bi-search me-1"></i>
                        Buscar

                    </button>

                </div>
                 <div class="col-md-2 d-grid">

                        <a href="{{ route('suppliers.index') }}" class="btn btn-outline-secondary w-100">

                            <i class="bi bi-arrow-clockwise me-1"></i>
                            Limpiar

                        </a>

                    </div>

            </div>

        </form>

    </div>

    {{-- Tabla --}}
    <div class="table-responsive">

        <table
            class="table table-hover align-middle mb-0">

            <thead class="table-light">

                <tr>

                    <th width="50">
                        #
                    </th>

                    <th>
                        Documento
                    </th>

                    <th>
                        Nombre
                    </th>

                    <th>
                        Empresa
                    </th>

                    <th>
                        Teléfono
                    </th>

                    <th>
                        Correo
                    </th>

                    <th class="text-center">
                        Estado
                    </th>

                    <th class="text-center">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($suppliers as $supplier)

                    <tr>

                        <td>
                            {{ $supplier->id }}
                        </td>

                        <td>

                            <div class="fw-semibold">
                                {{ $supplier->document_type }}
                            </div>

                            <small class="text-muted">
                                {{ $supplier->document_number }}
                            </small>

                        </td>

                        <td>

                            <div class="fw-semibold">
                                {{ $supplier->name }}
                            </div>

                        </td>

                        <td>

                            {{ $supplier->company_name ?: '-' }}

                        </td>

                        <td>

                            {{ $supplier->phone ?: '-' }}

                        </td>

                        <td>

                            {{ $supplier->email ?: '-' }}

                        </td>

                        <td class="text-center">

                            @if($supplier->status)

                                <span
                                    class="badge bg-success">

                                    Activo

                                </span>

                            @else

                                <span
                                    class="badge bg-secondary">

                                    Inactivo

                                </span>

                            @endif

                        </td>

                        <td>

                            <div
                                class="d-flex justify-content-center gap-2">

                                {{-- Ver --}}
                                <a
                                    href="{{ route('suppliers.show', $supplier) }}"
                                    class="btn btn-sm btn-outline-info"
                                    title="Ver">

                                    <i class="bi bi-eye"></i>

                                </a>

                                {{-- Editar --}}
                                <a
                                    href="{{ route('suppliers.edit', $supplier) }}"
                                    class="btn btn-sm btn-outline-warning"
                                    title="Editar">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                {{-- Eliminar --}}
                                <form
                                    action="{{ route('suppliers.destroy', $supplier) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('¿Eliminar este proveedor?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="text-center py-5">

                            <i
                                class="bi bi-truck display-5 text-muted">
                            </i>

                            <p class="text-muted mt-3 mb-0">

                                No hay proveedores registrados.

                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Footer --}}
    @if($suppliers->hasPages())

        <div class="card-footer bg-white">

            {{ $suppliers->links() }}

        </div>

    @endif

</div>

@endsection