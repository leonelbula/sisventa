@extends('layouts.app')

@section('title', 'Ver Compra')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h4>

                Compra
                #{{ $purchase->invoice_number }}

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <strong>
                        Proveedor
                    </strong>

                    <p>
                        {{ $purchase->supplier->name }}
                    </p>

                </div>

                <div class="col-md-4">

                    <strong>
                        Fecha
                    </strong>

                    <p>
                        {{ $purchase->purchase_date->format('d/m/Y') }}
                    </p>

                </div>

                <div class="col-md-4">

                    <strong>
                        Total
                    </strong>

                    <p>
                        $
                        {{ number_format($purchase->total,0,',','.') }}
                    </p>

                </div>

            </div>

            <hr>

            @include(
                'purchases.partials._details-table'
            )

        </div>

    </div>

</div>

@endsection