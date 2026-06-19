@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')

<div class="container-fluid">

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Detalle del Producto
            </h3>

            <p class="text-muted mb-0">
                Información completa del producto.
            </p>

        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('products.edit', $product) }}"
                class="btn btn-warning">

                <i class="bi bi-pencil-square me-1"></i>
                Editar

            </a>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Volver

            </a>

        </div>

    </div>

    <div class="row">


        {{-- Información --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">

                    <h5 class="mb-0 fw-bold">
                        Información General
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Nombre

                            </label>

                            <div class="fw-semibold fs-5">

                                {{ $product->name }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Estado

                            </label>

                            <div>

                                @if($product->status)

                                    <span
                                        class="badge bg-success fs-6">

                                        Activo

                                    </span>

                                @else

                                    <span
                                        class="badge bg-secondary fs-6">

                                        Inactivo

                                    </span>

                                @endif

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                SKU

                            </label>

                            <div>

                                {{ $product->sku ?? '-' }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Código de Barras

                            </label>

                            <div>

                                {{ $product->barcode ?? '-' }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Categoría

                            </label>

                            <div>

                                {{ $product->category?->name }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Stock Actual

                            </label>

                            <div>

                                @if(
                                    $product->stock <=
                                    $product->min_stock
                                )

                                    <span
                                        class="badge bg-danger fs-6">

                                        {{ $product->stock }}
                                        unidades

                                    </span>

                                    <small
                                        class="text-danger d-block">

                                        Stock Bajo

                                    </small>

                                @else

                                    <span
                                        class="badge bg-success fs-6">

                                        {{ $product->stock }}
                                        unidades

                                    </span>

                                @endif

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Stock Mínimo

                            </label>

                            <div>

                                {{ $product->min_stock }}
                                unidades

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Precio Costo

                            </label>

                            <div
                                class="fw-semibold text-danger">

                                ${{ number_format(
                                    $product->cost_price,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Precio Venta

                            </label>

                            <div
                                class="fw-semibold text-success">

                                ${{ number_format(
                                    $product->sale_price,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                class="form-label text-muted">

                                Ganancia por Unidad

                            </label>

                            <div
                                class="fw-bold text-primary">

                                ${{ number_format(
                                    $product->sale_price -
                                    $product->cost_price,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </div>

                        </div>

                        <div class="col-12">

                            <label
                                class="form-label text-muted">

                                Descripción

                            </label>

                            <div
                                class="border rounded p-3 bg-light">

                                {{ $product->description ?: 'Sin descripción.' }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Resumen financiero --}}
            <div
                class="row mt-4">

                <div class="col-md-4">

                    <div
                        class="card border-0 shadow-sm">

                        <div class="card-body">

                            <small
                                class="text-muted">

                                Valor Inventario

                            </small>

                            <h4
                                class="fw-bold mb-0">

                                ${{ number_format(
                                    $product->stock *
                                    $product->cost_price,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </h4>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div
                        class="card border-0 shadow-sm">

                        <div class="card-body">

                            <small
                                class="text-muted">

                                Valor Venta

                            </small>

                            <h4
                                class="fw-bold mb-0 text-success">

                                ${{ number_format(
                                    $product->stock *
                                    $product->sale_price,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </h4>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div
                        class="card border-0 shadow-sm">

                        <div class="card-body">

                            <small
                                class="text-muted">

                                Ganancia Potencial

                            </small>

                            <h4
                                class="fw-bold mb-0 text-primary">

                                ${{ number_format(
                                    ($product->sale_price -
                                    $product->cost_price)
                                    *
                                    $product->stock,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection