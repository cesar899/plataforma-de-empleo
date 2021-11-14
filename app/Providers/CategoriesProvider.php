<?php

namespace App\Providers;

use View;
use App\Models\Categorie;
use Illuminate\Support\ServiceProvider;

class CategoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
          $categorie = Categorie::all();
          $view->with('categorie', $categorie);
        });
    }    
}
