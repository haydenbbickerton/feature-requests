<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\FeatureRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Contracts\Repositories\ClientRepository as ClientRepositoryContract;
use App\Contracts\Repositories\FeatureRepository as FeatureRepositoryContract;
use App\Contracts\Repositories\UserRepository as UserRepositoryContract;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->defineRepositories();
    }

    /**
     * Bind the repositories into the container.
     *
     * @return void
     */
    protected function defineRepositories()
    {
        $repositories = [
            ClientRepositoryContract::class => ClientRepository::class,
            FeatureRepositoryContract::class => FeatureRepository::class,
            UserRepositoryContract::class => UserRepository::class,
        ];

        foreach ($repositories as $key => $value) {
            $this->app->bindIf($key, $value);
        }
    }
}
