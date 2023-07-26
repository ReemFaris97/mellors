<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/


Broadcast::channel('User.Notifications.{id}', function (User $user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('timeSlot-notification', function ($user) {
    return true;
});

Broadcast::channel('ride-status', function ($user) {
    return true;
});

Broadcast::channel('ride-queue', function ($user) {
    return true;
});

Broadcast::channel('rsr_report', function ($user) {
    return true;
});

Broadcast::channel('report', function ($user) {
    return true;
});
