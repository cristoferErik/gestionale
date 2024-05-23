<?php

namespace App\Providers;

use App\Repositories\CrudRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Services\CustomerService;
use App\Services\CustomerServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CrudRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerServiceInterface::class,CustomerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
