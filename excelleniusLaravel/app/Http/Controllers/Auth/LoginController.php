<?php

namespace App\Http\Controllers\Auth;

use App\Auth as Auth_excel;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

     use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    private $pilihan_guard = '';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->pilihan_guard);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['parent.guest', 'student.guest', 'private-teacher.guest'])->except('logout');
    }
    public function showLoginForm()
    {
        return view('public.login');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
    public function login(Request $request)
    {
        $request->remember = false;
        $validation = $this->validator($request->toArray());
        // Check has errors or not
        if(!$validation->fails()){
            $account = Auth_excel::where('email', $request->email)->first();
            if(!is_null($account)){
                // check if account is active
                if($account->token_register == ''){
                    if($account->id_registered_as == 1){
                        $this->pilihan_guard = 'student';
                    }
                    else if($account->id_registered_as == 2){
                        $this->pilihan_guard = 'parent';
                    }
                    else if($account->id_registered_as == 3){
                        $this->pilihan_guard = 'private-teacher';
                    }
                    if(Auth::guard($this->pilihan_guard)->attempt(['email' => $request->email, 'password' => ($request->password)], $request->remember)){
                        return redirect(route($this->pilihan_guard.'.home'));
                    }else{
                        $request->session()->flash('login-error', 'Oops... Sistem mengalami kesalahan.');
                        return redirect(route('login'));
                    }
                }
                else{
                    $request->session()->flash('login-error', 'Akun belum aktif. Silahkan aktifkan akun terlebih dahulu.');
                    return redirect(route('login'));
                }
            }
            else{
                $request->session()->flash('login-error-email', 'Email tidak terdaftar.');
                return redirect(route('login'));
            }
        }else{
            // $request->session()->flash('login-error', $validation->errors());
            $errors = $validation->errors();
            return redirect(route('login'))->with(compact('errors'));
        }
    }

    public function checkingUser(Request $request){
        dd($request);
        if ($request->email !== '') {
            if ($request->email) {
                $rule = array('email' => 'Required|email|unique:auths');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');

    }

    
}
