@extends('layouts.app')

@section('title', 'Editar Compra')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h4 class="mb-0">

                Editar Compra

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('purchases.update', $purchase) }}"
                method="POST">

                @csrf
                @method('PUT')

                @include('purchases.partials._form')

            </form>

        </div>

    </div>

</div>

@endsection