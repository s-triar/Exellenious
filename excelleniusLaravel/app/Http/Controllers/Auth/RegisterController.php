<?php

namespace App\Http\Controllers\Auth;

use App\Parentstudent;
use App\Privateteacher;
use App\Student;
use App\Registered_as;
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


    private $pilihan_guard = '';
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['private-teacher.guest', 'student.guest', 'parent.guest']);
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
            'email' => 'required|string|email|max:255|unique:auths',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Auth
     */
    protected function create(array $data)
    {
        return Auth_excel::create([
            'email' => $data['email'],
            'id_registered_as' => $data['register_as'],
            'token_register' => $data['token_register'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegisterForm()
    {
        $jenis_register = Registered_as::all();
        return view('public.signup')->with(compact('jenis_register'));
    }
    protected function guard()
    {
        return Auth::guard($this->pilihan_guard);
    }

    protected function register(Request $request){
        $validation = $this->validator($request->toArray());
        if($validation->fails()){
            // $errors = $validation->errors();
            // if($errors->has('password')){
            //     if(count($errors->get('password'))>1){
            //         $errors->add('password_confirmation', $errors->get('password')[1]) ;
            //     }
            // }
            return redirect(route('register'))
                        ->withErrors($validation)
                        ->withInput();
        }else{
            if($request['password'] === $request['password_confirmation']){
                $checked = Auth_excel::where('email', $request['email'])->first();
                if($checked == null){
                    $this->pilihan_guard = $this->checkRegisterAsforGuard($request['register_as']);
                    $request['token_register'] = str_random(25).(string)date('YmdHis');
                    $data = $this->create($request->toArray())->toArray();
                    $new_member = Auth_excel::find($data['id']);
                    Notification::send($new_member,new confirmationAccount($request['name'], $request['token_register']));
                    $request->session()->flash('register_success', 'Kami sudah mengirimkan link aktivasi pada alamat email anda, silakan periksa email anda!.');
                    return redirect(route('login'));
                }
                // return redirect(route('register')); // email sudah digunakan
            }
            return redirect(route('register')); //password tidak cocok dengan confirm password
        }
        
  }

  public function confirmRegister($token_register){
    $checked = Auth_excel::where('token_register', $token_register)->first();
    if($checked != null){
        $checked->token_register = '';
        $checked->save();
        return redirect(route('login'));
    }
    return redirect(url('/404'));
  }

  public function checkRegisterAsforGuard($id){
      if($id == 1){
        return 'student';
      }
      else if($id == 2){
        return 'parent';
      }
      else if($id == 3){
        return 'private-teacher';
      }
  }

}
