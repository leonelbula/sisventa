@extends('layouts.app')

@section('title', 'Nuevo Proveedor')

@section('content')

<form
    action="{{ route('suppliers.store') }}"
    method="POST">

    @csrf

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Nuevo Proveedor
            </h5>

        </div>

        <div class="card-body">

            @include('suppliers._form')

        </div>

        <div class="card-footer bg-white">

            <button
                class="btn btn-primary">

                Guardar

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