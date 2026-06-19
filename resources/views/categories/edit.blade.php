@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1">
            Editar Categoría
        </h3>

        <p class="text-muted mb-0">
            Actualiza la información de la categoría.
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
    action="{{ route('categories.update', $category) }}"
    method="POST">

    @csrf
    @method('PUT')

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
            Actualizar Categoría

        </button>

    </div>

</form>

@endsection