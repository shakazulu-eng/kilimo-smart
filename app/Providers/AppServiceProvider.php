<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
           URL::forceScheme('https');
        //
         if (!User::where('email', 'salummuhidini748@gmail.com')->exists()) {
        User::create([
            'name' => 'salumu',
            'email' => 'salummuhidini748@gmail.com',
            'password' => Hash::make('Mlanz9.8765432100'),
            'role' => 'admin'
        ]);
    }

    }
}
