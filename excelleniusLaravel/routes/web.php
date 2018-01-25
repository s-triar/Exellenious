<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public.index');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/confirm-register/{token_register}', 'Auth\RegisterController@confirmRegister');
Route::post('/checkingUser', 'Auth\LoginController@checkingUser');
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.loginpost');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm');
  Route::post('/login', 'StudentAuth\LoginController@login')->name('student.loginpost');
  Route::get('/logout', 'StudentAuth\LoginController@logout')->name('student.logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('student.password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('student.password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('student.password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'private-teacher'], function () {
  Route::get('/login', 'PrivateTeacherAuth\LoginController@showLoginForm');
  Route::post('/login', 'PrivateTeacherAuth\LoginController@login')->name('private-teacher.loginpost');
  Route::post('/logout', 'PrivateTeacherAuth\LoginController@logout')->name('private-teacher.logout');

  Route::get('/register', 'PrivateTeacherAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'PrivateTeacherAuth\RegisterController@register');

  Route::post('/password/email', 'PrivateTeacherAuth\ForgotPasswordController@sendResetLinkEmail')->name('privateteacher.password.request');
  Route::post('/password/reset', 'PrivateTeacherAuth\ResetPasswordController@reset')->name('privateteacher.password.email');
  Route::get('/password/reset', 'PrivateTeacherAuth\ForgotPasswordController@showLinkRequestForm')->name('privateteacher.password.reset');
  Route::get('/password/reset/{token}', 'PrivateTeacherAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'parent'], function () {
  Route::get('/login', 'ParentAuth\LoginController@showLoginForm');
  Route::post('/login', 'ParentAuth\LoginController@login');
  Route::post('/logout', 'ParentAuth\LoginController@logout')->name('parent.logout');

  Route::get('/register', 'ParentAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'ParentAuth\RegisterController@register');

  Route::post('/password/email', 'ParentAuth\ForgotPasswordController@sendResetLinkEmail')->name('parent.password.request');
  Route::post('/password/reset', 'ParentAuth\ResetPasswordController@reset')->name('parent.password.email');
  Route::get('/password/reset', 'ParentAuth\ForgotPasswordController@showLinkRequestForm')->name('parent.password.reset');
  Route::get('/password/reset/{token}', 'ParentAuth\ResetPasswordController@showResetForm');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

