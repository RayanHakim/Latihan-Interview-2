<?php

namespace App\Providers;

use App\Models\Store;
use App\Observers\StoreObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Menghubungkan Model Store dengan Observer-nya.
        // Setiap ada aksi (created, updated, deleted) di Store, 
        // StoreObserver akan otomatis merespon.
        Store::observe(StoreObserver::class);
    }
}