<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('parent')->user();

    //dd($users);

    return view('parent.home');
})->name('home');

