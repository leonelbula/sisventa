@extends('layouts.app')

@section('title', 'Detalle del Proveedor')

@section('content')

<div class="container-fluid">

    {{-- Encabezado --}}
    <div
        class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Detalle del Proveedor
            </h3>

            <p class="text-muted mb-0">
                Información completa del proveedor.
            </p>

        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('suppliers.edit', $supplier) }}"
                class="btn btn-warning">

                <i class="bi bi-pencil-square me-1"></i>
                Editar

            </a>

            <a
                href="{{ route('suppliers.index') }}"
                class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Volver

            </a>

        </div>

    </div>

    <div class="row">

        {{-- Información General --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">

                    <h5 class="fw-bold mb-0">
                        Información General
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-4">

                            <label class="text-muted">
                                Tipo Documento
                            </label>

                            <div class="fw-semibold">
                                {{ $supplier->document_type }}
                            </div>

                        </div>

                        <div class="col-md-4">

                            <label class="text-muted">
                                Documento
                            </label>

                            <div class="fw-semibold">
                                {{ $supplier->document_number }}
                            </div>

                        </div>

                        <div class="col-md-4">

                            <label class="text-muted">
                                Estado
                            </label>

                            <div>

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

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">
                                Nombre
                            </label>

                            <div class="fw-semibold fs-5">
                                {{ $supplier->name }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">
                                Empresa
                            </label>

                            <div class="fw-semibold">
                                {{ $supplier->company_name ?: '-' }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">
                                Teléfono
                            </label>

                            <div>
                                {{ $supplier->phone ?: '-' }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">
                                Correo Electrónico
                            </label>

                            <div>
                                {{ $supplier->email ?: '-' }}
                            </div>

                        </div>

                        <div class="col-12">

                            <label class="text-muted">
                                Dirección
                            </label>

                            <div
                                class="border rounded p-3 bg-light">

                                {{ $supplier->address ?: 'No registrada.' }}

                            </div>

                        </div>

                        <div class="col-12">

                            <label class="text-muted">
                                Observaciones
                            </label>

                            <div
                                class="border rounded p-3 bg-light">

                                {{ $supplier->observation ?: 'Sin observaciones.' }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Panel Resumen --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <div
                        class="rounded-circle bg-primary bg-opacity-10
                               d-inline-flex justify-content-center
                               align-items-center"
                        style="width:90px;height:90px;">

                        <i
                            class="bi bi-truck fs-1 text-primary">
                        </i>

                    </div>

                    <h5 class="mt-3 mb-1 fw-bold">
                        {{ $supplier->name }}
                    </h5>

                    <p class="text-muted mb-4">
                        {{ $supplier->company_name }}
                    </p>

                    <hr>

                    <div
                        class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Compras realizadas
                        </span>

                        <span class="fw-bold">
                            0
                        </span>

                    </div>

                    <div
                        class="d-flex justify-content-between">

                        <span class="text-muted">
                            Total comprado
                        </span>

                        <span
                            class="fw-bold text-success">

                            $0

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection