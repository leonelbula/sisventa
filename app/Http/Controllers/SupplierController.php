<?php

namespace App\Http\Controllers;

use App\DTOs\Supplier\SupplierDTO;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use App\Services\Supplier\SupplierService;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct(
        private SupplierService $supplierService
    ) {}

    public function index(Request $request)
    {
        $filters = [
            'search' => $request->input('search'),
            'status' => $request->input('status'),
        ];

        $suppliers = $this
            ->supplierService
            ->getAll($filters);

        return view(
            'suppliers.index',
            compact(
                'suppliers',
                'filters'
            )
        );
    }

    public function create()
    {
        $supplier = new Supplier();

        return view(
            'suppliers.create',
            compact('supplier')
        );
    }

    public function store(
        StoreSupplierRequest $request
    ) {
        $dto = SupplierDTO::fromRequest(
            $request
        );

        $this->supplierService
            ->create($dto);

        return redirect()
            ->route('suppliers.index')
            ->with(
                'success',
                'Proveedor creado correctamente.'
            );
    }

    public function show(
        Supplier $supplier
    ) {
        return view(
            'suppliers.show',
            compact('supplier')
        );
    }

    public function edit(
        Supplier $supplier
    ) {
        return view(
            'suppliers.edit',
            compact('supplier')
        );
    }

    public function update(
        UpdateSupplierRequest $request,
        Supplier $supplier
    ) {
        $dto = SupplierDTO::fromRequest(
            $request
        );

        $this->supplierService
            ->update(
                $supplier,
                $dto
            );

        return redirect()
            ->route('suppliers.index')
            ->with(
                'success',
                'Proveedor actualizado correctamente.'
            );
    }

    public function destroy(
        Supplier $supplier
    ) {
        $this->supplierService
            ->delete($supplier);

        return redirect()
            ->route('suppliers.index')
            ->with(
                'success',
                'Proveedor eliminado correctamente.'
            );
    }
}
