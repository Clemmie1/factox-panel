<?php

namespace App\Providers;

use App\Mail\Auth\Welcome;
use Faker\Core\Uuid;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
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
        if (!Session::get('token_code')){
            \Session::put('token_code', \Ramsey\Uuid\Uuid::uuid4());
        }
    }
}
