<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use App\Http\Requests\ChangePassRequest;
use DB;
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('changepass');
    }
    public function getEdit($id){
    $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
    $data = User::find($id);
    $user = User::select('id','company','contact_name','password')
         ->where('id','=',$id)
         ->get();   
         return view('changepass',compact('user','data','booking'));
    }
    public function postEdit($id, ChangePassRequest $request){


        $user = User::find($id);
        //$user->company = $request->txtCompany;
        //$user->contact_name = $request->txtContactName; 

        $hashedPassword = $request->txtPassDB;  

        if ((Hash::check($request->txtPassOld,$hashedPassword)) and ($request->txtConfirmPassword== $request->txtNewPassword)){
        $user->password = Hash::make($request->txtNewPassword);         
        $user->save();
        Auth::logout();
        return redirect()->route('getLogin');
        }
        else{            
        return view('changepass');
        }
    }
}
