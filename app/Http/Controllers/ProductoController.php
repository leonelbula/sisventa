<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Product\ProductService;
use App\Services\Category\CategoryService;
use App\DTOs\Product\ProductDTO;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Services\Kardex\KardexService;

class ProductoController extends Controller
{
    public function __construct(
        private ProductService $productService,
        private CategoryService $categoryService,
        private KardexService $kardexService
    ) {}
    public function index(Request $request)
    {

        $filters = [
            'search' => $request->input('search'),
            'status' => $request->input('status'),
            'sort' => $request->input('sort'),
            'direction' => $request->input('direction'),
        ];

        $products = $this->productService
            ->getAll($filters);

        return view(
            'products.index',
            compact(
                'products',
                'filters'
            )
        );
    }


    public function create()
    {

        $product = new Product();

        $categories = $this->categoryService
            ->getForSelect();

        return view(
            'products.create',
            compact(
                'product',
                'categories'
            )
        );
    }

    /**
     * Guardar
     */
    public function store(StoreProductRequest $request)
    {
        $dto = ProductDTO::fromRequest($request);

        $product = $this->productService->create($dto);
        $this->kardexService->createInitialMovement($product);

        return redirect()
            ->route('products.create')
            ->with(
                'success',
                'Producto creado correctamente.'
            );
    }


    /**
     * Formulario editar
     */
    public function edit(Product $product)
    {

        $categories = $this->categoryService
            ->getForSelect();

        return view(
            'products.edit',
            compact(
                'product',
                'categories'
            )
        );
    }

     public function show(Product $product)
    {

        $categories = $this->categoryService
            ->getForSelect();

        return view(
            'products.show',
            compact(
                'product'
            )
        );
    }

    /**
     * Actualizar
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $dto = ProductDTO::fromRequest($request);

        $this->productService->update(
            $product,
            $dto
        );

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Producto actualizado correctamente.'
            );
    }

    /**
     * Eliminar
     */
    public function destroy(Product $product)
    {

        $this->productService
            ->delete($product);

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Producto eliminado correctamente.'
            );
    }

    public function bulkDestroy(
        Request $request
    ) {
        $ids = $request->products ?? [];

        $this->productService
            ->bulkDelete($ids);

        return back()->with(
            'success',
            'Productos eliminados correctamente.'
        );
    }
}
