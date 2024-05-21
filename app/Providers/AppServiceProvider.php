<?php

namespace App\Providers;

use App\Models\AddCashOutCategory;
use Illuminate\Support\ServiceProvider;
use Request;

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

        view()->composer('*', function ($view,) {
            $branch_id = Request::route('branch_id');
            $categories = AddCashOutCategory::pluck('category')->unique()->values()->all();
            $view->with('categories', $categories);
            $view->with('branch_id', $branch_id);
        }); 

        // view()->composer('*', function ($view) {
        //     // Get the branch_id from the route or any other source
        //     $branch_id = Request::route('branch_id');

        //     // Fetch categories based on the provided branch_id
        //     $categories = AddCashOutCategory::where('branch_id', $branch_id)
        //         ->pluck('category')
        //         ->unique()
        //         ->values()
        //         ->all();
        //     // dd($categories);
        //     // Pass categories and branch_id to the views
        //     $view->with('categories', $categories);
        //     $view->with('branch_id', $branch_id);
        // });


    }
}
