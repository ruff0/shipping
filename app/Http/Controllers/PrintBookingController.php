<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\UserType;
use DB;
use App\BookingOrder;
use App\Http\Requests\BookRequest;
use App\BillLading;
use App\ArrivalNotice;
use App\ShipperExport;
use App\Role_Permission;
class PrintBookingController extends Controller
{
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
        return redirect()->route('getBookSearch');
    }
    public function showBookingOrder($id)
    {
        $book = BookingOrder::find($id);

        return view('print.bookingorder',compact('book'));
    }
        public function showBillLading($id)
    {
        $book = BookingOrder::find($id);
        $showbook = DB::table('tbl_booking_order')
        ->join('tbl_bill_lading','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->where('tbl_booking_order.id','=',$id)     
        ->select('tbl_booking_order.*','tbl_bill_lading.*')   
        ->orderBy('tbl_booking_order.id','DESC')   
        ->first();

        return view('print.billoflading',compact('book','showbook'));
    }
        public function showShipperExport($id)
    {
        $book = ShipperExport::find($id);
        $showbook = DB::table('tbl_booking_order')
        ->join('tbl_bill_lading','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->join('tbl_shipper_export','tbl_booking_order.id','=','tbl_shipper_export.book_id')
        ->join('tbl_arrival_notice','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->where('tbl_booking_order.id','=',$id)     
        ->select('tbl_booking_order.*','tbl_shipper_export.*','tbl_bill_lading.*','tbl_arrival_notice.*')   
        ->orderBy('tbl_booking_order.id','DESC')   
        ->first();
        return view('print.shipper',compact('book','showbook'));
    }
        public function showArrivalNotice($id)
    {
        $book = ArrivalNotice::find($id);
        $showbook = DB::table('tbl_booking_order')
        ->join('tbl_arrival_notice','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->join('tbl_bill_lading','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->where('tbl_booking_order.id','=',$id)     
        ->select('tbl_booking_order.*','tbl_bill_lading.*','tbl_arrival_notice.*')   
        ->orderBy('tbl_booking_order.id','DESC')   
        ->first();
        return view('print.arrivalnotice',compact('book','showbook'));
    }
}