@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1">
            Editar Producto
        </h3>

        <p class="text-muted mb-0">
            Actualiza la información del producto.
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
    action="{{ route('products.update', $product) }}"
    method="POST">

    @csrf
    @method('PUT')

    @include('products._form')

    <div class="text-end mt-4">

        <button class="btn btn-primary">

            <i class="bi bi-check-lg me-1"></i>
            Actualizar Producto

        </button>

    </div>

</form>

@endsection