<?php

namespace App\Providers;

use App\Repositories\CrudRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Repositories\ServiceGrantRepository;
use App\Services\CustomerService;
use App\Services\CustomerServiceInterface;
use App\Services\ServiceGrantService;
use App\Services\ServiceGrantServiceInterface;
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

        $this->app->bind(CrudRepositoryInterface::class, ServiceGrantRepository::class);
        $this->app->bind(ServiceGrantServiceInterface::class,ServiceGrantService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
