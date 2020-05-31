<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use DB;
use Illuminate\Support\Facades\View;

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
            $nongdan_id = Auth::guard('nongdan')->id();
            $nhom_nong_dan = DB::table('chitietnhom')
                        ->where('nd_id','=',$nongdan_id)
                        ->join('nhom','nhom.n_id','=','chitietnhom.n_id')
                        ->get();
            View::share('nhom_nong_dan', ); 
        
    }
}
