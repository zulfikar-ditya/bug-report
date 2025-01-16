<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Model::shouldBeStrict(true);
        // Model::preventLazyLoading();
        // Model::preventsAccessingMissingAttributes();

        $aliasInstance = AliasLoader::getInstance();
        $aliasInstance->alias('Carbon', \App\Supports\Carbon::class);
        $aliasInstance->alias('Str', \App\Supports\Str::class);
        $aliasInstance->alias('Number', \App\Supports\Number::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
