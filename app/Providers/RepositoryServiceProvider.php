<?php

namespace App\Providers;

use App\Interfaces\CountryValueRepositoryInterface;
use App\Interfaces\IbaNumberRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\CountryValueRepository;
use App\Repositories\IbaNumberRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CountryValueRepositoryInterface::class, CountryValueRepository::class);
        $this->app->bind(IbaNumberRepositoryInterface::class, IbaNumberRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
