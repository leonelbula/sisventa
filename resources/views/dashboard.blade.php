@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">

    <h2 class="fw-bold">
        Hola, {{ auth()->user()->name }} 👋
    </h2>

    <p class="text-muted mb-0">
        Bienvenido al Sistema de Ventas
    </p>

</div>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body">

                <div class="icon bg-primary-subtle text-primary">
                    <i class="bi bi-cash-stack"></i>
                </div>

                <h6 class="text-muted mt-3">
                    Ventas Hoy
                </h6>

                <h3 class="fw-bold">
                    $0.00
                </h3>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body">

                <div class="icon bg-success-subtle text-success">
                    <i class="bi bi-cart-check"></i>
                </div>

                <h6 class="text-muted mt-3">
                    Compras Hoy
                </h6>

                <h3 class="fw-bold">
                    $0.00
                </h3>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body">

                <div class="icon bg-warning-subtle text-warning">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h6 class="text-muted mt-3">
                    Productos
                </h6>

                <h3 class="fw-bold">
                    0
                </h3>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body">

                <div class="icon bg-info-subtle text-info">
                    <i class="bi bi-people"></i>
                </div>

                <h6 class="text-muted mt-3">
                    Clientes
                </h6>

                <h3 class="fw-bold">
                    0
                </h3>

            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card">

            <div class="card-header bg-white border-0 p-4">

                <h5 class="mb-0">
                    Resumen de Ventas
                </h5>

            </div>

            <div class="card-body">

                <canvas id="salesChart" height="100"></canvas>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card">

            <div class="card-header bg-white border-0 p-4">

                <h5 class="mb-0">
                    Stock Bajo
                </h5>

            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between py-2">
                    <span>Arroz Premium</span>
                    <span class="badge bg-danger">3</span>
                </div>

                <div class="d-flex justify-content-between py-2">
                    <span>Leche Entera</span>
                    <span class="badge bg-warning">5</span>
                </div>

                <div class="d-flex justify-content-between py-2">
                    <span>Aceite Vegetal</span>
                    <span class="badge bg-warning">4</span>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-7">

        <div class="card">

            <div class="card-header bg-white border-0 p-4">

                <h5 class="mb-0">
                    Últimas Ventas
                </h5>

            </div>

            <div class="card-body p-0">

                <table class="table align-middle mb-0">

                    <thead>
                    <tr>
                        <th>Factura</th>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        <td>FV-0001</td>
                        <td>Juan Pérez</td>
                        <td>$250.000</td>
                    </tr>

                    <tr>
                        <td>FV-0002</td>
                        <td>María Gómez</td>
                        <td>$420.000</td>
                    </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="card">

            <div class="card-header bg-white border-0 p-4">

                <h5 class="mb-0">
                    Actividad Reciente
                </h5>

            </div>

            <div class="card-body">

                <div class="mb-3">
                    ✅ Se registró una venta
                </div>

                <div class="mb-3">
                    📦 Se agregó un producto
                </div>

                <div class="mb-3">
                    🛒 Se registró una compra
                </div>

                <div>
                    👤 Se creó un cliente
                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
    document.getElementById('salesChart'),
    {
        type: 'line',
        data: {
            labels: [
                'Lun',
                'Mar',
                'Mié',
                'Jue',
                'Vie',
                'Sáb',
                'Dom'
            ],
            datasets: [{
                label: 'Ventas',
                data: [12, 19, 10, 22, 18, 25, 30],
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13,110,253,.1)',
                fill: true,
                tension: .4
            }]
        }
    }
);

</script>

@endpush