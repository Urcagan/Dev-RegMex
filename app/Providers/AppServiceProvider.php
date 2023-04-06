<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource; //** Добавлено для исключения обертывания колекций в data
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        JsonResource::withoutWrapping(); //* Добавлено для исключения обертывания колекций в data
    }
}
