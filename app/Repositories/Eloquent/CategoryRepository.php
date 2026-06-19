<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\DTOs\Category\CategoryDTO;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll(
        array $filters = []
    ) {
        $query = Category::query();

        $search = $filters['search'] ?? null;
        $status = $filters['status'] ?? null;

        $query
            ->when(
                $search,
                function ($query) use ($search) {
                    $query->where(
                        function ($query) use ($search) {
                            $query
                                ->where(
                                    'name',
                                    'like',
                                    "%{$search}%"
                                )
                                ->orWhere(
                                    'description',
                                    'like',
                                    "%{$search}%"
                                );
                        }
                    );
                }
            )
            ->when(
                $status !== null &&
                    $status !== '',
                function ($query) use ($status) {
                    $query->where(
                        'status',
                        $status
                    );
                }
            );

        return $query
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }

    public function getById(int $id): ?Category
    {
        return Category::find($id);
    }

    public function create(CategoryDTO $categoryDTO): Category
    {
        return Category::create([
            'name' => $categoryDTO->name,
            'description' => $categoryDTO->description,
            'status' => $categoryDTO->status,
        ]);
    }

    public function update(Category $category, CategoryDTO $categoryDTO): bool
    {
        return $category->update([
            'name' => $categoryDTO->name,
            'description' => $categoryDTO->description,
            'status' => $categoryDTO->status,
        ]);
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }
    public function getForSelect()
    {
        return Category::query()
            ->where('status', true)
            ->orderBy('name')
            ->get([
                'id',
                'name'
            ]);
    }
}
