<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Mail;
use App\Http\Requests;
use App\User;
use App\State;
use App\UserType;
use App\Http\Requests\RegisterRequest;
use DB;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('register.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $user = User::all()->last()->toArray();
        //$checkuser = User::where('id', '=', $user['id'])->first(); 
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
        $state = State::select('id','name')->get()->toArray();
        $userType = UserType::select('id','name')->get()->toArray();
        return view('auth.register',compact('state','userType','booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(RegisterRequest $request)
    {   
        
        $user = new User;    
        /** require*/
        $user->user_type_id = $request->sltUserType;
        $user->password = Hash::make($request->txtPassword);     
        $user->email = $request->txtEmail;
        $user->remember_token = $request->_token;

        /** not require */
        $user->company = $request->txtCompany;
        $user->job_descriptions = $request->txtJobDesc;
        $user->contact_name = $request->txtContactName;
        $user->address = $request->txtAddress;
        $user->phone = $request->txtPhone;
        $user->fax = $request->txtFax;
        $user->city = $request->txtCity;
        $user->state_id = $request->sltState;
        $user->country = $request->txtCountry;
        $user->zip_code = $request->txtZipCode;
        $user->IAddress = $request->txtIAddr;
        $user->EIN = $request->txtEIN;
        $user->ACL_ID = $request->txtACL;
        /* update logo image */
        if ($request->txtNewLogo =='')
        {
            $user->logo = '';
        }
        else{
            $img_name = ($request->txtCompany).'-logo-'.($request->txtNewLogo);
            $user->logo = $img_name;
            $des = public_path().'/uploads';        
            $img = $request->file('fileLogo'); 
            $img->move($des, $img_name);
        }
           
            /* update logo image */
        $user->notes = $request->txtNotes; 
        if($request->sltUserType == 10)
        {
            $user->role_id = 1;
        }           
        else if($request->sltUserType == 9)
        {
            $user->role_id = 2;
        }
        else
        {
            $user->role_id = 3;
        }
        $user->created_by = $request->txtCreated;
        $user->save();        
        $data = ['email'=>$request->txtEmail,'password'=>$request->txtPassword,'contact_name'=>$request->txtContactName];
        Mail::send('auth.sendemail',$data, function($msg){
            $msg->from('ad.shipping.2016@gmail.com','Shipping Admin');
            $msg->to('tuan.bnm@serenco.net','Tuan')->subject('Shipping Account Information');
        });
        return redirect()->route('register.index')->with(['flash_level'=>'success','flash_message'=>'Successfull']);;
    }


    /**
     * Display the specified resource     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
               

       // $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
