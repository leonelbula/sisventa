@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1">
            Nuevo Producto
        </h3>

        <p class="text-muted mb-0">
            Registra un nuevo producto en el inventario.
        </p>

    </div>

    <a
        href="{{ route('products.index') }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Volver

    </a>

</div>

<form
    action="{{ route('products.store') }}"
    method="POST">

    @csrf

    @include('products._form')

    <div class="text-end mt-4">

        <button class="btn btn-primary">

            <i class="bi bi-check-lg me-1"></i>
            Guardar Producto

        </button>

    </div>

</form>

@endsection