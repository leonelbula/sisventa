<div class="row g-3">

    {{-- Proveedor --}}
    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Proveedor
            <span class="text-danger">*</span>
        </label>

        <div class="input-group">

            <input type="hidden" id="supplier_id" name="supplier_id"
                value="{{ old('supplier_id', $purchase->supplier_id ?? '') }}">

            <input type="text" id="supplier_name" class="form-control" readonly placeholder="Seleccione un proveedor"
                value="{{ old('supplier_name', $purchase->supplier->name ?? '') }}">

            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#supplierModal">

                <i class="bi bi-search"></i>

            </button>

        </div>

        @error('supplier_id')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror

    </div>

    {{-- Factura --}}
    <div class="col-md-3">

        <label class="form-label fw-semibold">
            Factura
        </label>

        <input type="text" name="invoice_number" class="form-control"
            value="{{ old('invoice_number', $purchase->invoice_number ?? '') }}" placeholder="FAC-0001">

    </div>

    {{-- Tipo --}}
    <div class="col-md-3">

        <label class="form-label fw-semibold">
            Tipo de compra
        </label>

        <select name="purchase_type" class="form-select">

            <option value="CONTADO" @selected(old('purchase_type', $purchase->purchase_type ?? '') == 'CONTADO')>

                Contado

            </option>

            <option value="CREDITO" @selected(old('purchase_type', $purchase->purchase_type ?? '') == 'CREDITO')>

                Crédito

            </option>

        </select>

    </div>

    {{-- Fecha Compra --}}
    <div class="col-md-3">

        <label class="form-label fw-semibold">
            Fecha compra
        </label>

        <input type="date" name="purchase_date" class="form-control"
            value="{{ old('purchase_date', isset($purchase) ? $purchase->purchase_date->format('Y-m-d') : now()->format('Y-m-d')) }}">

    </div>

    {{-- Fecha Vencimiento --}}
    <div class="col-md-3">

        <label class="form-label fw-semibold">
            Fecha vencimiento
        </label>

        <input type="date" name="due_date" class="form-control"
            value="{{ old('due_date', isset($purchase->due_date) ? $purchase->due_date?->format('Y-m-d') : '') }}">

    </div>

    {{-- Observación --}}
    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Observaciones
        </label>

        <textarea name="observation" rows="1" class="form-control" placeholder="Escriba una observación...">{{ old('observation', $purchase->observation ?? '') }}</textarea>

    </div>

</div>

<hr class="my-4">

<div class="d-flex justify-content-between align-items-center mb-3">

    <div>

        <h5 class="mb-0">

            Productos

        </h5>

        <small class="text-muted">
            Agregue los productos de la compra
        </small>

    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">

        <i class="bi bi-plus-circle me-2"></i>
        Agregar Producto

    </button>

</div>

@include('purchases.partials._details-table')

@include('purchases.partials._totals')

<div class="d-flex justify-content-end gap-2 mt-4">

    <button type="submit" class="btn btn-success">

        <i class="bi bi-save me-2"></i>
        Guardar Borrador

    </button>

    @isset($purchase)

        @if ($purchase->isDraft())
            <button type="button" class="btn btn-primary" id="btnConfirm">

                <i class="bi bi-check-circle me-2"></i>
                Confirmar Compra

            </button>
        @endif

        @if ($purchase->isConfirmed())
            <button type="button" class="btn btn-danger" id="btnCancel">

                <i class="bi bi-x-circle me-2"></i>
                Anular Compra

            </button>
        @endif

    @endisset

    <a href="{{ route('purchases.index') }}" class="btn btn-light">

        Cancelar

    </a>

</div>

@if (isset($purchase))
    <form id="confirmForm" action="{{ route('purchases.confirm', $purchase) }}" method="POST" class="d-none">

        @csrf

    </form>

    <form id="cancelForm" action="{{ route('purchases.cancel', $purchase) }}" method="POST" class="d-none">

        @csrf

    </form>
@endif

@include('purchases.partials._supplier-modal')

@include('purchases.partials._product-modal')

@include('purchases.scripts._purchase-script')
