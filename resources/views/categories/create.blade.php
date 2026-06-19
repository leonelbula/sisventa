@extends('layouts.app')

@section('title', 'Nueva Categoría')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1">
            Nueva Categoría
        </h3>

        <p class="text-muted mb-0">
            Registra una nueva categoría para tus productos.
        </p>

    </div>

    <a
        href="{{ route('categories.index') }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Volver

    </a>

</div>

<form
    action="{{ route('categories.store') }}"
    method="POST">

    @csrf

    @include('categories._form')

    <div class="d-flex justify-content-end gap-2 mt-4">

        <a
            href="{{ route('categories.index') }}"
            class="btn btn-light border">

            Cancelar

        </a>

        <button
            type="submit"
            class="btn btn-primary">

            <i class="bi bi-check-lg me-1"></i>
            Guardar Categoría

        </button>

    </div>

</form>

@endsection