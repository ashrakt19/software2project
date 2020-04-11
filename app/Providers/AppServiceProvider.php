<?php

namespace App\Providers;

use App\Http\Controllers\BackEnd\Skills;
use App\Models\Category;
use App\Models\Page;
use App\Models\Skill;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {  //لو عاوزه اعمل حاجه تظهر للكل في كل الصفحححح
        
       view()->share('categories' , Category::get());
       view()->share('skills' , Skill::get());
       
    }
}
