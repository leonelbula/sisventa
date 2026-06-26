<?php
namespace App\Actions\Category;

use App\DTOs\CategoryDTO;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CreateCategoryAction
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }
    public function execute(CategoryDTO $categoryDTO): Category
    {
        return $this->categoryRepository->create($categoryDTO);
    }
}