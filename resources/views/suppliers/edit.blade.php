@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')

<form
    action="{{ route(
        'suppliers.update',
        $supplier
    ) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Editar Proveedor
            </h5>

        </div>

        <div class="card-body">

            @include('suppliers._form')

        </div>

        <div class="card-footer bg-white">

            <button
                class="btn btn-warning">

                Actualizar

            </button>

            <a
                href="{{ route('suppliers.index') }}"
                class="btn btn-secondary">

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection