<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse as SuccessfulPasswordResetLinkRequestResponseContract;
use App\Http\Responses\SuccessfulPasswordResetLinkRequestResponse;
use Laravel\Fortify\Contracts\PasswordResetResponse as PasswordResetResponseContract;
use App\Http\Responses\PasswordResetResponse;
use Laravel\Fortify\Contracts\VerifyEmailResponse as VerifyEmailResponseContract;
use App\Http\Responses\VerifyEmailResponse;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        $this->app->singleton(VerifyEmailResponseContract::class, VerifyEmailResponse::class);
        $this->app->singleton(SuccessfulPasswordResetLinkRequestResponseContract::class, SuccessfulPasswordResetLinkRequestResponse::class);
        $this->app->singleton(PasswordResetResponseContract::class, PasswordResetResponse::class);
    }
}
