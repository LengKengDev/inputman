<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\QuestionTypeRepository::class,
            \App\Repositories\QuestionTypeRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\QuestionRepository::class,
            \App\Repositories\QuestionRepositoryEloquent::class
        );
        //:end-bindings:
    }
}
