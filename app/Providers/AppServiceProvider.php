<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    public function boot(): void {
        view()->composer('shared.header', function ($view) {
            $avatarUrl = asset('img/av.png'); // Default avatar URL
    
            if (Auth::check()) {
                $avatar = DB::table('up_profils')->select('avatar')->where('idUser', auth()->user()->id)->first();
    
                if ($avatar && $avatar->avatar) {
                    $avatarUrl = strpos($avatar->avatar, 'http') === 0 ? $avatar->avatar : asset('storage/profil/' . $avatar->avatar);
                }
            }
    
            $view->with(['avatar' => $avatarUrl]);
        });
    }    
    

}
