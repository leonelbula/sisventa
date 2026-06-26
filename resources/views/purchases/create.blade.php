@extends('layouts.app')

@section('title', 'Nueva Compra')

@section('content')

    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h4 class="mb-0">
                    Nueva Compra
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('purchases.store') }}" method="POST">

                    @csrf

                    @include('purchases.partials._form')

                </form>

            </div>

        </div>

    </div>

@endsection

@push('scripts')
  @include('purchases.scripts._purchase-script')
@endpush
