<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use App\Models\Schools;
use App\Models\SchoolStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;

class JetstreamServiceProvider extends ServiceProvider
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
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);


        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->auth)->first();
            $user1 = Schools::Where('school_id_no', $request->auth)->first();
            $user2 = SchoolStudent::Where('acct_id', $request->auth)->first();

            if ($user &&
            Hash::check($request->password, $user->password)) {
            return $user;
            }

            if($user1 &&
            Hash::check($request->password, $user1->password)) {
            return $user1;
            }

            if($user2 &&
            Hash::check($request->password, $user2->password)) {
            return $user2;
            }


        });
        



    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
