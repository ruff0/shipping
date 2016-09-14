<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\User;
use App\UserType;
use App\State;
use DB;
use App\Http\Requests\EditRequest;
use Input;
use View;

class CustomerVendorController extends Controller
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
        //$user = User::select('id','user_type_id','company','contact_name')->orderBy('id','DESC')->get()->toArray();
        //$userType = UserType::select('id','name')->get()->toArray();
        /*$userType = UserType::select('id','name')->get()->toArray();
        $user = DB::table('tbl_users')
        ->join('tbl_usertype_per','tbl_users.user_type_id', '=','tbl_usertype_per.usertype_id')
        ->join('tbl_user_types','tbl_user_types.id', '=','tbl_usertype_per.usertype_id')
        ->select('tbl_users.id as ID', 'tbl_user_types.name as ContactType', 'tbl_users.company as Company','tbl_users.contact_name as ContactName','tbl_users.city as City','tbl_users.phone as Phone') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get();            
        return view('customer_vendor.manage',compact('user','userType'));
        */
        return redirect()->route('getSearch');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store()
    {   
        //return redirect()->route('getSearch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
        $state = State::select('id','name')->get()->toArray();
        $userType = UserType::select('id','name')->get()->toArray();
        $user = User::findOrFail($id);
        //$user = DB::table('tbl_users')
        //->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        //->join('tbl_user_types','tbl_user_types.id', '=','tbl_users.user_type_id')
        //->select('*') 
       // ->distinct()
        //->get(); 
        return view('customer_vendor.show',compact('user','userType','state','booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
        $userType = UserType::select('id','name')->get()->toArray();
        $state = State::select('id','name')->get()->toArray();
        $user = User::findOrFail($id);
        return view('customer_vendor.edit',compact('user','userType','state','booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {        
        $user = User::find($id);     
        $user->user_type_id = $request->sltUserType;
        if ($request->txtPassword ==''){
            $user->password = $request->txtPass; 
        }        
        else{
        $user->password = Hash::make($request->txtPassword);     
            }
        $user->email = $request->txtEmail;
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
         $user->logo = $request->txtOldLogo;
        }
        elseif (($request->txtOldLogo == '') and ($request->txtOldLogo == $request->txtNewLogo)){
        $img_name = ($request->txtCompany).'-logo-'.($request->txtNewLogo);
        $user->logo = $img_name;
        $des = public_path().'/uploads';        
        $img = $request->file('fileLogo'); 
        $img->move($des, $img_name);   
            }
        else {
                $img_name = ($request->txtCompany).'-logo-'.($request->txtNewLogo);
                $user->logo = $img_name;
                $des = public_path().'/uploads';        
                $img = $request->file('fileLogo'); 
                $img->move($des, $img_name);   
            }
            /* update logo image */
        $user->notes = $request->txtNotes;  
        $user->save();                
        return redirect()->route('customer-vendor.index')->with(['flash_message'=>'Success Edit User']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('customer-vendor.index');
    }

    public function search(Request $request){
        $id = $request->txtID;
        $user_type = $request->sltCusType;
        $company = $request->txtCompany;
        $contactname = $request->txtContactName;
        $phone = $request->txtPhone;
        $city = $request->txtCity;

        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();  

        $userType = UserType::select('id','name')->get()->toArray();

        $result = DB::table('tbl_users')
        ->join('tbl_user_types', 'tbl_users.user_type_id', '=', 'tbl_user_types.id')
        ->where('tbl_users.id', 'LIKE', '%'.$id.'%')
        ->Where('company', 'LIKE', '%'.$company.'%')
        ->Where('contact_name', 'LIKE', '%'.$contactname.'%')
        ->Where('user_type_id', 'LIKE', '%'.$user_type.'%')
        ->Where('phone', 'LIKE', '%'.$phone.'%')
        ->Where('city', 'LIKE', '%'.$city.'%')        
        ->select('tbl_users.*','tbl_user_types.name as name')
        ->get();                
        $resultAgent = DB::table('tbl_users')
        ->join('tbl_user_types', 'tbl_users.user_type_id', '=', 'tbl_user_types.id')
        ->where('tbl_users.id', 'LIKE', '%'.$id.'%')
        ->Where('company', 'LIKE', '%'.$company.'%')
        ->Where('contact_name', 'LIKE', '%'.$contactname.'%')
        ->Where('user_type_id', '=','11')
        ->Where('phone', 'LIKE', '%'.$phone.'%')
        ->Where('city', 'LIKE', '%'.$city.'%')
        ->Where('tbl_users.created_by','=', \Auth::user()->id )        
        ->select('tbl_users.*','tbl_user_types.name as name')
        ->get();       
        return view('customer_vendor.search',compact('result','userType','resultAgent','booking'));
    }
}