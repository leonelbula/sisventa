<?php
namespace App\Repositories\Contracts;

use App\Models\Category;
use App\DTOs\CategoryDTO;

interface CategoryRepositoryInterface
{
    public function getAll(array $filters = []);
    public function getById(int $id): ?Category;
    public function create(CategoryDTO $categoryDTO): Category;
    public function update(Category $category, CategoryDTO $categoryDTO): bool;
    public function delete(Category $category): bool;
    public function getForSelect();
}