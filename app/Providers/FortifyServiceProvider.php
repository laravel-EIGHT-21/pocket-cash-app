<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Actions\Fortify\AttemptToAuthenticate2;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable2;
use App\Http\Controllers\Schools\SchoolUsersController;
use App\Http\Controllers\Schools\StudentUserController;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Http\Requests\LoginRequest;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {    
    
        $this->app->when([SchoolUsersController::class, AttemptToAuthenticate::class, RedirectIfTwoFactorAuthenticatable::class])
        ->needs(StatefulGuard::class)->give(function(){
            return Auth::guard('school');
        });

        
        $this->app->when([StudentUserController::class, AttemptToAuthenticate2::class, RedirectIfTwoFactorAuthenticatable2::class])
        ->needs(StatefulGuard::class)->give(function(){
            return Auth::guard('student');
        });


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        

       



    }
}
