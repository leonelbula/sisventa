<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\DTOs\Category\CategoryDTO;
use App\Actions\Category\CreateCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Actions\Category\DeleteCategoryAction;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(
        private CreateCategoryAction $createCategoryAction,
        private UpdateCategoryAction $updateCategoryAction,
        private DeleteCategoryAction $deleteCategoryAction,
        private readonly CategoryRepositoryInterface $repository
    ) {}

    public function getAll(array $filters = [])
    {
        return $this->repository
            ->getAll($filters);
    }

    public function store(CategoryDTO $categoryDTO): Category
    {
        DB::beginTransaction();
        try {
            $category = $this->createCategoryAction->execute($categoryDTO);
            DB::commit();
            return $category;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Category $category, CategoryDTO $categoryDTO): bool
    {
        DB::beginTransaction();
        try {
            $result = $this->updateCategoryAction->execute($category, $categoryDTO);
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Category $category): bool
    {
        DB::beginTransaction();
        try {
            $result = $this->deleteCategoryAction->execute($category);
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function getForSelect()
{
    return $this->repository
        ->getForSelect();
}
}
