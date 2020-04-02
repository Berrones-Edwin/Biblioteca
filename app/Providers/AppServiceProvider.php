<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Menu;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Pasar todos los menús a la vista aside
        //solo pasara los menus que esten relacionados a un rol  
        View::composer('theme.lte.aside',function($view){
            $menus = Menu::getMenu(true);
            $view->with('menusComposer',$menus);
            
        });

        // View::share('theme', 'lte_v3');
        View::share('theme', 'lte');
    }
}
