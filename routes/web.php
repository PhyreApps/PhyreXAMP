<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $findGuestUser = \App\Models\User::where('email', 'guest@phyrexamp.com')->first();
    if (!$findGuestUser) {
        $guestUser = new \App\Models\User();
        $guestUser->name = 'Guest';
        $guestUser->email = 'guest@phyrexamp.com';
        $guestUser->password = \Illuminate\Support\Facades\Hash::make('password');
        $guestUser->save();
    }

    auth()->loginUsingId($findGuestUser->id);

    return redirect('/admin');
});
