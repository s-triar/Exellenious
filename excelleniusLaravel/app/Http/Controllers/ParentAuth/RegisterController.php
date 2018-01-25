<?php

namespace App\Http\Controllers\ParentAuth;

use App\Parentstudent;
use App\Auth as Auth_excel;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Notification;
use App\Notifications\confirmationAccount;
use Illuminate\Http\Request;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    use Notifiable;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/parent/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('parent.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:parents',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Parent
     */
    protected function create(array $data)
    {
        return Auth_excel::create([
            'token_register' => $data['token_register'],
            'id_registered_as' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('parent.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('parent');
    }

    protected function register(Request $request){
          $request['token_register'] = str_random(25).(string)date('YmdHis');
          $data = $this->create($request->toArray())->toArray();
          $new_member = Auth_excel::find($data['id']);
          Notification::send($new_member,new confirmationAccount($request['name'], $request['token_register']));
          $request->session()->flash('register_success', 'Kami sudah mengirimkan link aktivasi pada alamat email anda, silakan periksa email anda!.');
          return redirect(url('/'))->with('status', 'Kami sudah mengirimkan link aktivasi pada alamat email anda, silakan periksa email anda!');
    }
}
