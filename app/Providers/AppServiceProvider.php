<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		if (Schema::hasTable('categories')) 
          {
             view()->share("categories",Category::get());
          }
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(190);
    }
}
