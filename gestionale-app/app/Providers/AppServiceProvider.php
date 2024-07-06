<?php

namespace App\Providers;

use App\Repositories\BasicRepositories\CustomerRepository;
use App\Repositories\BasicRepositories\ServiceGrantRepository;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use App\Repositories\HomeRepositories\HomeRepository;
use App\Repositories\HomeRepositories\HomeRepositoryInterface;
use App\Services\CustomerServices\CustomerService;
use App\Services\CustomerServices\CustomerServiceInterface;
use App\Services\HomeServices\HomeService;
use App\Services\HomeServices\HomeServiceInterface;
use App\Services\ServiceGrantServices\ServiceGrantService;
use App\Services\ServiceGrantServices\ServiceGrantServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CrudRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CrudRepositoryInterface::class, ServiceGrantRepository::class);

        $this->app->bind(CustomerServiceInterface::class,CustomerService::class);
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
