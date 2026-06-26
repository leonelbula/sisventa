<?php

namespace App\Http\Controllers;


use Throwable;
use App\Models\Category;
use App\Support\Flash;
use App\Services\CategoryService;
use App\DTOs\CategoryDTO;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CategoryController extends Controller
{

    public function __construct(
        private CategoryRepositoryInterface $categoryRepository,
        private CategoryService $categoryService
    ) {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(Request $request)
    {

        $filters = [
            'search' => $request->input('search'),
            'status' => $request->input('status'),
        ];

        $categories = $this->categoryService
            ->getAll($filters);

        return view(
            'categories.index',
            compact(
                'categories',
                'filters'
            )
        );
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        try {
            $categoryDTO = new CategoryDTO(
                name: $request->name,
                description: $request->description,
                status: (bool) $request->status
            );

            $this->categoryService->store($categoryDTO);

            return redirect()
                ->route('categories.create')
                ->with(
                    'success',
                    'La categoría se ha creado exitosamente.'
                );
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('error', 'Error al crear la categoría.');
        }
    }
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $categoryDTO = new CategoryDTO(
                name: $request->name,
                description: $request->description,
                status: (bool) $request->status
            );

            $this->categoryService->update($category, $categoryDTO);

            return redirect()
                ->route('categories.index')
                ->with(
                    'success',
                    'La categoría se ha actualizado exitosamente.'
                );
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('error', 'Error al actualizar la categoría.');
        }
    }
    public function destroy(Category $category)
    {
        try {
            $this->categoryService->delete($category);

            return redirect()
                ->route('categories.index')
                ->with(
                    'success',
                    'La categoría se ha eliminado exitosamente.'
                );
        } catch (Throwable $e) {

            report($e);

            return redirect()
                ->route('categories.index')
                ->with('error', 'Error al eliminar la categoría.');
        }
    }
}
