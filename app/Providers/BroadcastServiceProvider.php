<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('order.*', function ($user, $userId) {
            return (int) $user->id === (int) $userId;
        });

        /**
         * Validate chatroom
         */
        Broadcast::channel('chatroom.*', function ($user, $roomId) {
            // $roomId is from the *
            return (int) $roomId === 1;
        });
    }
}
