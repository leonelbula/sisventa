<?php
namespace App\Actions\Category;

use App\Models\Category;
use App\DTOs\CategoryDTO;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class DeleteCategoryAction
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }
    public function execute(Category $category): bool
    {
        return $this->categoryRepository->delete($category);
    }
}