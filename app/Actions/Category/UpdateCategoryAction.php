<?php
namespace App\Actions\Category;

use App\DTOs\Category\CategoryDTO;
use App\Models\Category;    
use App\Repositories\Contracts\CategoryRepositoryInterface;

class UpdateCategoryAction
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }
    public function execute(Category $category, CategoryDTO $categoryDTO): bool
    {
        return $this->categoryRepository->update($category, $categoryDTO);
    }
}