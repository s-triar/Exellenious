<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('private-teacher')->user();

    //dd($users);

    return view('private-teacher.home');
})->name('home');

