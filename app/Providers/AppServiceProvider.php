<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Pagination polos (daftar link biasa), tanpa Bootstrap/Tailwind
        Paginator::defaultView('pagination::default');
    }
}
