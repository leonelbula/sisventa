<?php

namespace App\Providers;

use App\Models\Category;
use App\Policies\CategoryPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\KardexRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\PurchaseRepositoryInterface;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use App\Repositories\Eloquent\KardexRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\PurchaseRepository;
use App\Repositories\Eloquent\SupplierRepository;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     */

    

    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(KardexRepositoryInterface::class, KardexRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
    }
   


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {        
        Gate::policy(Category::class, CategoryPolicy::class);
    }
}
