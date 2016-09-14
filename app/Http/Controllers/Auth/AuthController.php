<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Hash;
use Auth;
use Session;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){
        $auth = array (
                'email' => $request->email,
                'password' => $request->password
            );
        if(\Auth::attempt($auth)) {
            return redirect()->route('home');
        } else {
            \Auth::logout();
            \Session::flush();
            return redirect()->route('getLogin');            
        }
    }  
    **/ 
    protected function validator(array $data)
    {
        return Validator::make($data, [            
            'email' => 'required|email|max:255|unique:tbl_users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([    
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
 * Swap a user session with a current one
 * 
 * @param \App\User $user
 * @return boolean
 */
    public function authenticated(Request $request,User $user){
        $previous_session = $user->last_session_id;

        if ($previous_session) { 
            //echo "<script> alert('aaaaaaaaaaaaaaaa'); </script>";
           \Session::getHandler()->destroy($previous_session);           
           
        }

        Auth::user()->last_session_id = \Session::getId();
        Auth::user()->save();         
        \Session::flash('flash_message_success', 'Successfully Logged In!');        
        return redirect()->intended($this->redirectPath());
    }
}