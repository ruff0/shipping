<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\BookingOrder;
use DB;
use App\BillLading;
use App\ShipperExport;
use App\ArrivalNotice;
use Session;
use App\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $booking = DB::table('tbl_booking_order')   
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 

        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();

        $ccust = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.today','=',date('Y/m/d'))        
        ->where('tbl_booking_order.shipper_id','=',\Auth::user()->id) 
        ->orderBy('tbl_booking_order.id','DESC')
        ->distinct()
        ->count();

        return view('home',compact('user','booking','ccust'));
    }

    public function waiting() {
        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();
        $role = DB::table('tbl_role_per')->where('tbl_role_per.role_id','=',\Auth::user()->role_id)->get();
        $book = DB::table('tbl_booking_order')
        //->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        //->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();
        $result = DB::table('tbl_booking_order')
        ->where('status','=','Waiting')
        ->orderBy('id','DESC')
        ->distinct()
        ->get();
        return view('home/homedetail',compact('result','book','role','user'));
    }
    public function approve(){
        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();
        $role = DB::table('tbl_role_per')->where('tbl_role_per.role_id','=',\Auth::user()->role_id)->get();
        $book = DB::table('tbl_booking_order')
        //->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        //->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();
        if(\Auth::user()->role_id == 2)
        {
        $result = DB::table('tbl_booking_order')
        ->where('status','=','Approved')
        ->where(function($q) {
                $q->where('shipper_id','=',\Auth::user()->id)
                ->orWhere('user_id','=',\Auth::user()->id); })
        ->orderBy('tbl_booking_order.id','DESC')
        ->distinct()
        ->get();
        }
        elseif (\Auth::user()->role_id == 3)
        {
        $result = DB::table('tbl_booking_order')
        ->where('status','=','Approved')
        ->where('tbl_booking_order.shipper_id','=',\Auth::user()->id)
        ->orderBy('tbl_booking_order.id','DESC')
        ->distinct()
        ->get();  
        }
        return view('home/homedetail',compact('result','book','role','user'));
    }
    public function lastest() {
        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();
        $role = DB::table('tbl_role_per')->where('tbl_role_per.role_id','=',\Auth::user()->role_id)->get();
        $book = DB::table('tbl_booking_order')
        //->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        //->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();
        if(\Auth::user()->role_id == 2)
        {
        $result = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.today','=',date('Y/m/d'))
        ->Where(function($q) {
                $q->where('shipper_id','=',\Auth::user()->id)
                ->orWhere('user_id','=',\Auth::user()->id); })       
        ->orderBy('tbl_booking_order.id','DESC')
        ->distinct()
        ->get();
        }
        elseif (\Auth::user()->role_id == 3)
        {
        $result = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.today','=',date('Y/m/d'))   
        ->where('tbl_booking_order.shipper_id','=',\Auth::user()->id)  
        ->orderBy('tbl_booking_order.id','DESC')
        ->distinct()
        ->get();
        }
        else {
        $result = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.today','=',date('Y/m/d'))   
        ->orderBy('tbl_booking_order.id','DESC')
        ->distinct()
        ->get();
        }

        return view('home/homedetail',compact('result','book','role','user'));
    }
    public function addBooking(Request $request){
        $book = new BookingOrder;        
        $book->user_id = \Auth::user()->id;
        //$book->booking_no = $request->txtBookingID;
        $book->BL_no = billRandomString(6);
        $book->log_no = logRandomString(6);
        $book->status = 'Draft';    
        $book->save(); 

        $bid = $request->txtBookingid;
        $bill = new BillLading;
        $bill->book_id = $bid;
        $bill->save();

        $ship = new ShipperExport;
        $ship->book_id = $bid;
        $ship->save();

        $arrival = new ArrivalNotice;
        $arrival->book_id = $bid;
        
        $arrival->save();

        return redirect()->route('booking.create');  
    }
}
