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
use App\BookingTemp;

class BookingController extends Controller
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
    public function add()
    {
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('id', 'desc')        
        ->first(); 
        $userType = UserType::select('id','name')->get()->toArray();
        $user = DB::table('tbl_users')
        ->join('tbl_user_types','tbl_user_types.id', '=','tbl_users.user_type_id')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_user_types.name as CusType', 'tbl_users.address as Address', 'tbl_users.company as Company','tbl_users.contact_name as ContactName','tbl_users.zip_code as ZipCode','tbl_states.name as State','tbl_users.city as City','tbl_users.country as Country','tbl_users.phone as Phone','tbl_users.email as Email', 'tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get();  

        /* get ID booking order */        
        $book = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();

        $bill = DB::table('tbl_bill_lading')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_bill_lading.*')
        ->orderBy('tbl_bill_lading.id', 'desc')        
        ->first();
        $ship = DB::table('tbl_shipper_export')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_shipper_export.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_shipper_export.*')
        ->orderBy('tbl_shipper_export.id', 'desc')        
        ->first();
        $arrival = DB::table('tbl_arrival_notice')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_arrival_notice.*')
        ->orderBy('tbl_arrival_notice.id', 'desc')        
        ->first();
        
        return view('booking.contentadd',compact('user','userType','booking'));
    }
    public function up()
    {
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
        $userType = UserType::select('id','name')->get()->toArray();
        $user = DB::table('tbl_users')
        ->join('tbl_user_types','tbl_user_types.id', '=','tbl_users.user_type_id')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_user_types.name as CusType', 'tbl_users.address as Address','tbl_users.company as Company','tbl_users.contact_name as ContactName','tbl_users.zip_code as ZipCode','tbl_states.name as State','tbl_users.city as City','tbl_users.country as Country','tbl_users.phone as Phone','tbl_users.email as Email', 'tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get();    
        $usertruck = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country', 'tbl_users.phone as Phone', 'tbl_users.fax as Fax', 'tbl_users.email as Email') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
         $usercon = DB::table('tbl_users')
        ->select('*') 
        ->orderBy('id','DESC')
        ->distinct()
        ->get(); 
        $userexporter = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country','tbl_users.phone as Phone','tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get();
        $usercargoremit = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country','tbl_users.phone as Phone') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
        /* get ID booking order */        
        $book = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();

        $bill = DB::table('tbl_bill_lading')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_bill_lading.*')
        ->orderBy('tbl_bill_lading.id', 'desc')        
        ->first();
        $ship = DB::table('tbl_shipper_export')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_shipper_export.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_shipper_export.*')
        ->orderBy('tbl_shipper_export.id', 'desc')        
        ->first();
        $arrival = DB::table('tbl_arrival_notice')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_arrival_notice.*')
        ->orderBy('tbl_arrival_notice.id', 'desc')        
        ->first();
        
        return view('booking.contentupdate',compact('user','usertruck','usercon','userType','book','bill','ship','arrival','booking','userexporter','usercargoremit'));
    }
    public function create()
    {
        $userType = UserType::select('id','name')->get()->toArray();
        $user = DB::table('tbl_users')
        ->join('tbl_user_types','tbl_user_types.id', '=','tbl_users.user_type_id')
        ->select('tbl_users.id as ID', 'tbl_user_types.name as CusType', 'tbl_users.company as Company','tbl_users.contact_name as ContactName','tbl_users.city as City','tbl_users.phone as Phone','tbl_users.email as Email', 'tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get();  

        /* get ID booking order */        
        $book = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();

        $bill = DB::table('tbl_bill_lading')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_bill_lading.*')
        ->orderBy('tbl_bill_lading.id', 'desc')        
        ->first();
        $ship = DB::table('tbl_shipper_export')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_shipper_export.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_shipper_export.*')
        ->orderBy('tbl_shipper_export.id', 'desc')        
        ->first();
        $arrival = DB::table('tbl_arrival_notice')
        ->join('tbl_booking_order','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->where('tbl_booking_order.user_id','=',\Auth::user()->id)    
        ->where('tbl_booking_order.status','=','Draft')    
        ->select('tbl_arrival_notice.*')
        ->orderBy('tbl_arrival_notice.id', 'desc')        
        ->first();
        
        return view('booking.contentupdate',compact('user','userType','book','bill','ship','arrival'));
    }     
    public function post(){
        $userType = UserType::select('id','name')->get()->toArray();
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('id', 'desc')        
        ->first(); 
        $user = DB::table('tbl_users')
        ->join('tbl_user_types','tbl_user_types.id', '=','tbl_users.user_type_id')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_user_types.name as CusType', 'tbl_users.address as Address', 'tbl_users.company as Company','tbl_users.contact_name as ContactName','tbl_users.zip_code as ZipCode','tbl_states.name as State','tbl_users.city as City','tbl_users.country as Country','tbl_users.phone as Phone','tbl_users.email as Email', 'tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
        $usertruck = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country', 'tbl_users.phone as Phone', 'tbl_users.fax as Fax', 'tbl_users.email as Email') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
         $usercon = DB::table('tbl_users')
        ->select('*') 
        ->orderBy('id','DESC')
        ->distinct()
        ->get();  
        $userexporter = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country','tbl_users.phone as Phone','tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
        $usercargoremit = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country','tbl_users.phone as Phone') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
        return view('booking.contentadd', compact('user','usertruck','usercon','userexporter','userType','booking','usercargoremit'));
    }
    public function store (BookRequest $request)
    {                 
     if (\Input::get('add')) {
                            
        $book = new BookingOrder;        
        $book->user_id = \Auth::user()->id;        
        $book->BL_no = $request->txtBLNo;
        $book->log_no = $request->txtLogNo;
        $book->booking_no = $request->txtBookingID;                        
        $book->export_no = $request->txtExportNo;                        
        $book->today = date_format(date_create($request->txtToday),"Y/m/d");
        $book->bookedby = $request->txtBookedBy;
        $book->shipper = $request->txtShipper;
        $book->port_cargo = $request->txtPortLoadCargo;
        $book->port_discharge = $request->txtPortDischarge;
        $book->carrier =$request->txtCarrier;
        $book->final_dest =$request->txtFinalDest;
        $book->vessel = $request->txtVessel;
        $book->voyage = $request->txtVoyage;
        $book->rail_cut_off = date_format(date_create($request->txtRailCut),"Y/m/d");
        $book->ETD = date_format(date_create($request->txtETD),"Y/m/d");
        $book->port_cut_off = date_format(date_create($request->txtPortCut),"Y/m/d");
        $book->ETA = date_format(date_create($request->txtETA),"Y/m/d");
        $book->empty_equip_pu_at = $request->txtEmptyEquip;
        $book->trucking_company = $request->txtTrucking;
        $book->loading_address = $request->txtLoadingAddress;
        $book->number_container = $request->txtNumberContainer;
        $book->commodities = $request->txtCommodities;
        $book->full_load_return_to = $request->txtFullLoadReturn;
        $book->remark = $request->txtRemark;
        $book->shipper_id = $request->txtShipperID;                        
        $book->status = 'Draft';    
        $book->save(); 

        $bill = new BillLading;
        $bill->book_id = $book->id;
        $bill->consignee = $request->txtConsignee;
        $bill->delivery = $request->txtDelivery;
        $bill->containerno = $request->txtNumberContainerinerNo;
        $bill->package_no = $request->txtNoPackage;
        $bill->kind_package_no = $request->txtKindPackage;
        $bill->gross_weight = $request->txtGross;
        $bill->measurement = $request->txtMeasurement;
        $bill->number_original = $request->txtNumberOriginal;
        $bill->place_receipt = $request->txtPlaceReceipt;
        $bill->place_issue = $request->txtPlaceIssue;
        $bill->date_laden = date_format(date_create($request->txtDateLaden),"Y/m/d");  
  
        $bill->save();

        $ship = new ShipperExport;
        $ship->book_id = $book->id;
        $ship->exporter = $request->txtExport;
        $ship->export_ref = $request->txtExportRef;
        $ship->method_trans = $request->txtMethodTrans;
        $ship->country_des = $request->txtCountryDes;
        $ship->date_export = date_format(date_create($request->txtDateExport),"Y/m/d");
        $ship->parties_trans = $request->txtPartiesTrans;
        $ship->domestic_routing = $request->txtDomesticRouting;
        $ship->export_carrier = $request->txtExportCarrier;
        $ship->containerized  = $request->txtContainerized;
        $ship->type_move = $request->txtTypeMove;
        $ship->value = $request->txtValue;
        $ship->save();

        $arrival = new ArrivalNotice;
        $arrival->book_id = $book->id;
        $arrival->mode = $request->txtMode;
        $arrival->PU_no = $request->txtPUNo;
        $arrival->container_no = $request->txtContainerNo;
        $arrival->shipping_line = $request->txtShippingLine;
        $arrival->master_BL = $request->txtMasterBL;
        $arrival->AMS_BL = $request->txtAMS;
        $arrival->House_BL = $request->txtHouseBL;
        $arrival->Final_ETA = $request->txtFinalETA;
        $arrival->IT_no = $request->txtITNo;
        $arrival->date_it_issued = date_format(date_create($request->txtDateIssued),"Y/m/d");
        $arrival->last_free_date = date_format(date_create($request->txtLastFreeDate),"Y/m/d");
        $arrival->GO_date = date_format(date_create($request->txtGODate),"Y/m/d");
        $arrival->cargo_location = $request->txtCargoLocation;
        $arrival->remit_payment = $request->txtRemitPayment;
        $arrival->freight_collect = $request->txtFreightCollect;
        $arrival->handling_fee = $request->txtHandlingFee;
        $arrival->ams_fee = $request->txtAMSFee;
        $arrival->ddc = $request->txtDDC;
        $arrival->demurrage = $request->txtDemurrage;
        $arrival->inland_freight = $request->txtInlandFreight;
        $arrival->custom_clearance = $request->txtCustomClearance;
        $arrival->custom_duty = $request->txtCustomDuty;
        $arrival->custom_bond = $request->txtCustomBond;
        $arrival->examination_fee = $request->txtExamFee;
        $arrival->cfs_charges = $request->txtCFSCharges;
        $arrival->thc_fee = $request->txtTHCFee;
        $arrival->origin_charges = $request->txtOriginCharges;
        $arrival->chassis_charges = $request->txtChassisCharges;
        $arrival->IT_entry_charges = $request->txtITEntryCharges;
        $arrival->amount_due = $request->txtAmountDue;
        $arrival->prepare_by = $request->txtPrepareBy;  
        $arrival->save();
                               
       return redirect()->route('updatebook');  
        }
        else if (\Input::get('submit'))
        {
        $book = new BookingOrder;        
        $book->user_id = \Auth::user()->id;        
        $book->BL_no = $request->txtBLNo;
        $book->log_no = $request->txtLogNo;
        $book->booking_no = $request->txtBookingID;                        
        $book->export_no = $request->txtExportNo;                        
        $book->today = date_format(date_create($request->txtToday),"Y/m/d");
        $book->bookedby = $request->txtBookedBy;
        $book->shipper = $request->txtShipper;
        $book->port_cargo = $request->txtPortLoadCargo;
        $book->port_discharge = $request->txtPortDischarge;
        $book->carrier =$request->txtCarrier;
        $book->final_dest =$request->txtFinalDest;
        $book->vessel = $request->txtVessel;
        $book->voyage = $request->txtVoyage;
        $book->rail_cut_off = date_format(date_create($request->txtRailCut),"Y/m/d");
        $book->ETD = date_format(date_create($request->txtETD),"Y/m/d");
        $book->port_cut_off = date_format(date_create($request->txtPortCut),"Y/m/d");
        $book->ETA = date_format(date_create($request->txtETA),"Y/m/d");
        $book->empty_equip_pu_at = $request->txtEmptyEquip;
        $book->trucking_company = $request->txtTrucking;
        $book->loading_address = $request->txtLoadingAddress;
        $book->number_container = $request->txtNumberContainer;
        $book->commodities = $request->txtCommodities;
        $book->full_load_return_to = $request->txtFullLoadReturn;
        $book->remark = $request->txtRemark;
        $book->shipper_id = $request->txtShipperID;                        
        $book->status = 'Waiting';    
        $book->save(); 

        $bill = new BillLading;
        $bill->book_id = $book->id;
        $bill->consignee = $request->txtConsignee;
        $bill->delivery = $request->txtDelivery;
        $bill->containerno = $request->txtNumberContainerinerNo;
        $bill->package_no = $request->txtNoPackage;
        $bill->kind_package_no = $request->txtKindPackage;
        $bill->gross_weight = $request->txtGross;
        $bill->measurement = $request->txtMeasurement;
        $bill->number_original = $request->txtNumberOriginal;
        $bill->place_receipt = $request->txtPlaceReceipt;
        $bill->place_issue = $request->txtPlaceIssue;
        $bill->date_laden = date_format(date_create($request->txtDateLaden),"Y/m/d");   
        $bill->save();

        $ship = new ShipperExport;
        $ship->book_id = $book->id;
        $ship->exporter = $request->txtExport;
        $ship->export_ref = $request->txtExportRef;
        $ship->method_trans = $request->txtMethodTrans;
        $ship->country_des = $request->txtCountryDes;
        $ship->date_export = date_format(date_create($request->txtDateExport),"Y/m/d");
        $ship->parties_trans = $request->txtPartiesTrans;
        $ship->domestic_routing = $request->txtDomesticRouting;
        $ship->export_carrier = $request->txtExportCarrier;
        $ship->containerized  = $request->txtContainerized;
        $ship->type_move = $request->txtTypeMove;
        $ship->value = $request->txtValue;
        $ship->save();

        $arrival = new ArrivalNotice;
        $arrival->book_id = $book->id;
        $arrival->mode = $request->txtMode;
        $arrival->PU_no = $request->txtPUNo;
        $arrival->container_no = $request->txtContainerNo;
        $arrival->shipping_line = $request->txtShippingLine;
        $arrival->master_BL = $request->txtMasterBL;
        $arrival->AMS_BL = $request->txtAMS;
        $arrival->House_BL = $request->txtHouseBL;
        $arrival->Final_ETA = $request->txtFinalETA;
        $arrival->IT_no = $request->txtITNo;
        $arrival->date_it_issued = date_format(date_create($request->txtDateIssued),"Y/m/d");
        $arrival->last_free_date = date_format(date_create($request->txtLastFreeDate),"Y/m/d");
        $arrival->GO_date = date_format(date_create($request->txtGODate),"Y/m/d");
        $arrival->cargo_location = $request->txtCargoLocation;
        $arrival->remit_payment = $request->txtRemitPayment;
        $arrival->freight_collect = $request->txtFreightCollect;
        $arrival->handling_fee = $request->txtHandlingFee;
        $arrival->ams_fee = $request->txtAMSFee;
        $arrival->ddc = $request->txtDDC;
        $arrival->demurrage = $request->txtDemurrage;
        $arrival->inland_freight = $request->txtInlandFreight;
        $arrival->custom_clearance = $request->txtCustomClearance;
        $arrival->custom_duty = $request->txtCustomDuty;
        $arrival->custom_bond = $request->txtCustomBond;
        $arrival->examination_fee = $request->txtExamFee;
        $arrival->cfs_charges = $request->txtCFSCharges;
        $arrival->thc_fee = $request->txtTHCFee;
        $arrival->origin_charges = $request->txtOriginCharges;
        $arrival->chassis_charges = $request->txtChassisCharges;
        $arrival->IT_entry_charges = $request->txtITEntryCharges;
        $arrival->amount_due = $request->txtAmountDue;
        $arrival->prepare_by = $request->txtPrepareBy;          
        $arrival->save();

       return redirect()->route('booking.index');  
        
        }
    }   
   public function update (Request $request, $id)
   {             
        if (\Input::get('save')) {
                        $book = BookingOrder::find($id);
                        $book->booking_no = $request->txtBookingID;                        
                        $book->export_no = $request->txtExportNo;                        
                        $book->today = date_format(date_create($request->txtToday),"Y/m/d");
                        $book->bookedby = $request->txtBookedBy;
                        $book->shipper = $request->txtShipper;
                        $book->port_cargo = $request->txtPortLoadCargo;
                        $book->port_discharge = $request->txtPortDischarge;
                        $book->carrier =$request->txtCarrier;
                        $book->final_dest =$request->txtFinalDest;
                        $book->vessel = $request->txtVessel;
                        $book->voyage = $request->txtVoyage;
                        $book->rail_cut_off = date_format(date_create($request->txtRailCut),"Y/m/d");
                        $book->ETD = date_format(date_create($request->txtETD),"Y/m/d");
                        $book->port_cut_off = date_format(date_create($request->txtPortCut),"Y/m/d");
                        $book->ETA = date_format(date_create($request->txtETA),"Y/m/d");
                        $book->empty_equip_pu_at = $request->txtEmptyEquip;
                        $book->trucking_company = $request->txtTrucking;
                        $book->loading_address = $request->txtLoadingAddress;
                        $book->number_container = $request->txtNumberContainer;
                        $book->commodities = $request->txtCommodities;
                        $book->full_load_return_to = $request->txtFullLoadReturn;
                        $book->remark = $request->txtRemark;
                        $book->shipper_id = $request->txtShipperID;
                        
                        $bill = BillLading::where('book_id','=', $id)->first();
                        // DB::table('tbl_bill_lading')->where('book_id', '=', $id)->first();
                        $bill->consignee = $request->txtConsignee;
                        $bill->delivery = $request->txtDelivery;
                        $bill->containerno = $request->txtNumberContainerinerNo;
                        $bill->package_no = $request->txtNoPackage;
                        $bill->kind_package_no = $request->txtKindPackage;
                        $bill->gross_weight = $request->txtGross;
                        $bill->measurement = $request->txtMeasurement;
                        $bill->number_original = $request->txtNumberOriginal;
                        $bill->place_receipt = $request->txtPlaceReceipt;
                        $bill->place_issue = $request->txtPlaceIssue;
                        $bill->date_laden = date_format(date_create($request->txtDateLaden),"Y/m/d");
                                   
                        
                        $ship = ShipperExport::where('book_id', '=', $id)->first();                    
                        $ship->exporter = $request->txtExport;
                        $ship->export_ref = $request->txtExportRef;
                        $ship->method_trans = $request->txtMethodTrans;
                        $ship->country_des = $request->txtCountryDes;
                        $ship->date_export = date_format(date_create($request->txtDateExport),"Y/m/d");
                        $ship->parties_trans = $request->txtPartiesTrans;
                        $ship->domestic_routing = $request->txtDomesticRouting;
                        $ship->export_carrier = $request->txtExportCarrier;
                        $ship->containerized  = $request->txtContainerized;
                        $ship->type_move = $request->txtTypeMove;
                        $ship->value = $request->txtValue;
                        
                        $arrivalnotice = ArrivalNotice::where('book_id', '=', $id)->first();        
                        $arrivalnotice->mode = $request->txtMode;
                        $arrivalnotice->PU_no = $request->txtPUNo;
                        $arrivalnotice->container_no = $request->txtContainerNo;
                        $arrivalnotice->shipping_line = $request->txtShippingLine;
                        $arrivalnotice->master_BL = $request->txtMasterBL;
                        $arrivalnotice->AMS_BL = $request->txtAMS;
                        $arrivalnotice->House_BL = $request->txtHouseBL;
                        $arrivalnotice->Final_ETA = $request->txtFinalETA;
                        $arrivalnotice->IT_no = $request->txtITNo;
                        $arrivalnotice->date_it_issued = date_format(date_create($request->txtDateIssued),"Y/m/d");
                        $arrivalnotice->last_free_date = date_format(date_create($request->txtLastFreeDate),"Y/m/d");
                        $arrivalnotice->GO_date = date_format(date_create($request->txtGODate),"Y/m/d");
                        $arrivalnotice->cargo_location = $request->txtCargoLocation;
                        $arrivalnotice->remit_payment = $request->txtRemitPayment;
                        $arrivalnotice->freight_collect = $request->txtFreightCollect;
                        $arrivalnotice->handling_fee = $request->txtHandlingFee;
                        $arrivalnotice->ams_fee = $request->txtAMSFee;
                        $arrivalnotice->ddc = $request->txtDDC;
                        $arrivalnotice->demurrage = $request->txtDemurrage;
                        $arrivalnotice->inland_freight = $request->txtInlandFreight;
                        $arrivalnotice->custom_clearance = $request->txtCustomClearance;
                        $arrivalnotice->custom_duty = $request->txtCustomDuty;
                        $arrivalnotice->custom_bond = $request->txtCustomBond;
                        $arrivalnotice->examination_fee = $request->txtExamFee;
                        $arrivalnotice->cfs_charges = $request->txtCFSCharges;
                        $arrivalnotice->thc_fee = $request->txtTHCFee;
                        $arrivalnotice->origin_charges = $request->txtOriginCharges;
                        $arrivalnotice->chassis_charges = $request->txtChassisCharges;
                        $arrivalnotice->IT_entry_charges = $request->txtITEntryCharges;
                        $arrivalnotice->amount_due = $request->txtAmountDue;
                        $arrivalnotice->prepare_by = $request->txtPrepareBy;                                    
                        $book->save();
                        $bill->save();
                        $ship->save();
                        $arrivalnotice->save();   
                        return redirect()->route('updatebook');
                    }                                            
            
        elseif (\Input::get('submit')) {            

            $book = BookingOrder::find($id);
                        $book->booking_no = $request->txtBookingID;                        
                        $book->export_no = $request->txtExportNo;                        
                        $book->today = date_format(date_create($request->txtToday),"Y/m/d");
                        $book->bookedby = $request->txtBookedBy;
                        $book->shipper = $request->txtShipper;
                        $book->port_cargo = $request->txtPortLoadCargo;
                        $book->port_discharge = $request->txtPortDischarge;
                        $book->carrier =$request->txtCarrier;
                        $book->final_dest =$request->txtFinalDest;
                        $book->vessel = $request->txtVessel;
                        $book->voyage = $request->txtVoyage;
                        $book->rail_cut_off = date_format(date_create($request->txtRailCut),"Y/m/d");
                        $book->ETD = date_format(date_create($request->txtETD),"Y/m/d");
                        $book->port_cut_off = date_format(date_create($request->txtPortCut),"Y/m/d");
                        $book->ETA = date_format(date_create($request->txtETA),"Y/m/d");
                        $book->empty_equip_pu_at = $request->txtEmptyEquip;
                        $book->trucking_company = $request->txtTrucking;
                        $book->loading_address = $request->txtLoadingAddress;
                        $book->number_container = $request->txtNumberContainer;
                        $book->commodities = $request->txtCommodities;
                        $book->full_load_return_to = $request->txtFullLoadReturn;
                        $book->remark = $request->txtRemark;
                        $book->shipper_id = $request->txtShipperID;
                        
                        $bill = BillLading::where('book_id','=', $id)->first();                        
                        // DB::table('tbl_bill_lading')->where('book_id', '=', $id)->first();
                        $bill->consignee = $request->txtConsignee;
                        $bill->delivery = $request->txtDelivery;
                        $bill->containerno = $request->txtNumberContainerinerNo;
                        $bill->package_no = $request->txtNoPackage;
                        $bill->kind_package_no = $request->txtKindPackage;
                        $bill->gross_weight = $request->txtGross;
                        $bill->measurement = $request->txtMeasurement;
                        $bill->number_original = $request->txtNumberOriginal;
                        $bill->place_receipt = $request->txtPlaceReceipt;
                        $bill->place_issue = $request->txtPlaceIssue;
                        $bill->date_laden = date_format(date_create($request->txtDateLaden),"Y/m/d");
                                   
                        
                        $ship = ShipperExport::where('book_id', '=', $id)->first();                        
                        $ship->exporter = $request->txtExport;
                        $ship->export_ref = $request->txtExportRef;
                        $ship->method_trans = $request->txtMethodTrans;
                        $ship->country_des = $request->txtCountryDes;
                        $ship->date_export = date_format(date_create($request->txtDateExport),"Y/m/d");
                        $ship->parties_trans = $request->txtPartiesTrans;
                        $ship->domestic_routing = $request->txtDomesticRouting;
                        $ship->export_carrier = $request->txtExportCarrier;
                        $ship->containerized  = $request->txtContainerized;
                        $ship->type_move = $request->txtTypeMove;
                        $ship->value = $request->txtValue;
                        
                        $arrivalnotice = ArrivalNotice::where('book_id', '=', $id)->first();                           
                        $arrivalnotice->mode = $request->txtMode;
                        $arrivalnotice->PU_no = $request->txtPUNo;
                        $arrivalnotice->container_no = $request->txtContainerNo;
                        $arrivalnotice->shipping_line = $request->txtShippingLine;
                        $arrivalnotice->master_BL = $request->txtMasterBL;
                        $arrivalnotice->AMS_BL = $request->txtAMS;
                        $arrivalnotice->House_BL = $request->txtHouseBL;
                        $arrivalnotice->Final_ETA = $request->txtFinalETA;
                        $arrivalnotice->IT_no = $request->txtITNo;
                        $arrivalnotice->date_it_issued = date_format(date_create($request->txtDateIssued),"Y/m/d");
                        $arrivalnotice->last_free_date = date_format(date_create($request->txtLastFreeDate),"Y/m/d");
                        $arrivalnotice->GO_date = date_format(date_create($request->txtGODate),"Y/m/d");
                        $arrivalnotice->cargo_location = $request->txtCargoLocation;
                        $arrivalnotice->remit_payment = $request->txtRemitPayment;
                        $arrivalnotice->freight_collect = $request->txtFreightCollect;
                        $arrivalnotice->handling_fee = $request->txtHandlingFee;
                        $arrivalnotice->ams_fee = $request->txtAMSFee;
                        $arrivalnotice->ddc = $request->txtDDC;
                        $arrivalnotice->demurrage = $request->txtDemurrage;
                        $arrivalnotice->inland_freight = $request->txtInlandFreight;
                        $arrivalnotice->custom_clearance = $request->txtCustomClearance;
                        $arrivalnotice->custom_duty = $request->txtCustomDuty;
                        $arrivalnotice->custom_bond = $request->txtCustomBond;
                        $arrivalnotice->examination_fee = $request->txtExamFee;
                        $arrivalnotice->cfs_charges = $request->txtCFSCharges;
                        $arrivalnotice->thc_fee = $request->txtTHCFee;
                        $arrivalnotice->origin_charges = $request->txtOriginCharges;
                        $arrivalnotice->chassis_charges = $request->txtChassisCharges;
                        $arrivalnotice->pier_pass_charges = $request->txtPierPassCharges;
                        $arrivalnotice->IT_entry_charges = $request->txtITEntryCharges;
                        $arrivalnotice->amount_due = $request->txtAmountDue;
                        $arrivalnotice->prepare_by = $request->txtPrepareBy;        

                        $book->status = 'Waiting';                            
                        $book->save();
                        $bill->save();
                        $ship->save();
                        $arrivalnotice->save();   
                return redirect()->route('booking.index');            
        }
   }

    public function manage (Request $request){
        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();
        //$book = BookingOrder::find($id);
        $booking = DB::table('tbl_booking_order')   
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first();  
        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();
        $role = DB::table('tbl_role_per')->where('tbl_role_per.role_id','=',\Auth::user()->role_id)->get();
        $book = BookingOrder::select('id')->orderBy('id','desc')->first();
        $bookingno = $request->txtBookingNo;
        $export = $request->txtExportNo;
        $fromdate=date_format(date_create($request->txtFromDate),"Y/m/d");          
        $todate = date_format(date_create($request->txtToDate),"Y/m/d");
        $logno = $request->txtLogNo;
        $bookedby = $request->txtBookedBy;    

        if (\Auth::user()->role_id == 2)
        {
        $result = DB::table('tbl_booking_order')
        ->where('booking_no', 'LIKE', '%'.$bookingno.'%')
        ->Where('export_no', 'LIKE', '%'.$export.'%')
        ->whereBetween('today',array($fromdate,$todate)) 
        ->where('log_no', 'LIKE', '%'.$logno.'%')        
        ->Where('bookedby', 'LIKE', '%'.$bookedby.'%')
        ->Where(function($q) {
                $q->where('shipper_id','=',\Auth::user()->id)
                ->orWhere('user_id','=',\Auth::user()->id); })
        ->orderBy('id','DESC')
        ->distinct()
        ->get();   

        }
        else if(\Auth::user()->role_id == 3)
        {
        $result = DB::table('tbl_booking_order')
        ->where('booking_no', 'LIKE', '%'.$bookingno.'%')
        ->Where('export_no', 'LIKE', '%'.$export.'%')
        ->whereBetween('today',array($fromdate,$todate)) 
        ->where('log_no', 'LIKE', '%'.$logno.'%')
        ->Where('bookedby', 'LIKE', '%'.$bookedby.'%')
        ->Where('shipper_id','=',\Auth::user()->id)
        ->orderBy('id','DESC')
        ->distinct()
        ->get();    
        }
        else{
        $result = DB::table('tbl_booking_order')
        ->where('booking_no', 'LIKE', '%'.$bookingno.'%')
        ->Where('export_no', 'LIKE', '%'.$export.'%')
        ->whereBetween('today',array($fromdate,$todate)) 
        ->where('log_no', 'LIKE', '%'.$logno.'%')
        ->Where('bookedby', 'LIKE', '%'.$bookedby.'%')
        ->orderBy('id','DESC')
        ->distinct()
        ->get();
        }

        return view('booking.manage',compact('result','book','role','user','booking','countagent'));
    }

    public function edit($id){

        $book = BookingOrder::find($id);
        $check_book = DB::table('tbl_booking_temp')->where('book_id','=',$book->id)->first();
        if (isset($check_book) && ((strtotime(date("Y-m-d h:i:s")) - strtotime($check_book->date_created)) <= $check_book->time) && \Auth::user()->id != $check_book->user_id) 
        {        
            return redirect('/')->with('flash_message_danger','Can not edit this booking! Another user is editing.');
        }
        else {
        $booktempdel = BookingTemp::where('book_id','=', $id)->delete();
        $booking = DB::table('tbl_booking_order')   
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
        $userType = UserType::select('id','name')->get()->toArray();
         $users = DB::table('tbl_users')
        ->join('tbl_user_types','tbl_user_types.id', '=','tbl_users.user_type_id')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_user_types.name as CusType', 'tbl_users.company as Company','tbl_users.address as Address', 'tbl_users.contact_name as ContactName','tbl_users.zip_code as ZipCode','tbl_states.name as State','tbl_users.city as City','tbl_users.country as Country','tbl_users.phone as Phone','tbl_users.email as Email', 'tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get();  
        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();

        $usertruck = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country', 'tbl_users.phone as Phone', 'tbl_users.fax as Fax', 'tbl_users.email as Email') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
         $usercon = DB::table('tbl_users')
        ->select('*') 
        ->orderBy('id','DESC')
        ->distinct()
        ->get(); 
        $userexporter = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country','tbl_users.phone as Phone','tbl_users.fax as Fax') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
        $usercargoremit = DB::table('tbl_users')
        ->join('tbl_states','tbl_states.id', '=','tbl_users.state_id')
        ->select('tbl_users.id as ID', 'tbl_users.company as Company', 'tbl_users.address as Address', 'tbl_users.city as City', 'tbl_states.name as State', 'tbl_users.zip_code as ZipCode', 'tbl_users.country as Country','tbl_users.phone as Phone') 
        ->orderBy('ID','DESC')
        ->distinct()
        ->get(); 
        $editbook = DB::table('tbl_booking_order')
        ->join('tbl_bill_lading','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->join('tbl_shipper_export','tbl_booking_order.id','=','tbl_shipper_export.book_id')
        ->join('tbl_arrival_notice','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->where('tbl_booking_order.id','=',$id)     
        ->select('tbl_booking_order.*','tbl_bill_lading.*','tbl_shipper_export.*','tbl_arrival_notice.*')   
        ->orderBy('tbl_booking_order.id','DESC')   
        ->first();

        $b = BookingOrder::find($id);
        $booktemp = new BookingTemp;        
          $booktemp->user_id = \Auth::user()->id;       
          $booktemp->book_id =  $b->id; 
          $booktemp->time =  300; 
          $booktemp->date_created = date("Y-m-d h:i:s");
        $booktemp->save();     

        return view('booking.editBooking',compact('editbook','book','userType','user','booking','usertruck','usercon','userexporter','usercargoremit','users','bt','check_book'));
        }
    }
    public function postEdit(Request $request, $id)
    {
        if (\Input::get('save')) {        
                        $book = BookingOrder::find($id);
                        $book->booking_no = $request->txtBookingID;                        
                        $book->export_no = $request->txtExportNo;                        
                        $book->today = date_format(date_create($request->txtToday),"Y/m/d");
                        $book->bookedby = $request->txtBookedBy;
                        $book->shipper = $request->txtShipper;
                        $book->port_cargo = $request->txtPortLoadCargo;
                        $book->port_discharge = $request->txtPortDischarge;
                        $book->carrier =$request->txtCarrier;
                        $book->final_dest =$request->txtFinalDest;
                        $book->vessel = $request->txtVessel;
                        $book->voyage = $request->txtVoyage;
                        $book->rail_cut_off = date_format(date_create($request->txtRailCut),"Y/m/d");
                        $book->ETD = date_format(date_create($request->txtETD),"Y/m/d");
                        $book->port_cut_off = date_format(date_create($request->txtPortCut),"Y/m/d");
                        $book->ETA = date_format(date_create($request->txtETA),"Y/m/d");
                        $book->empty_equip_pu_at = $request->txtEmptyEquip;
                        $book->trucking_company = $request->txtTrucking;
                        $book->loading_address = $request->txtLoadingAddress;
                        $book->number_container = $request->txtNumberContainer;
                        $book->commodities = $request->txtCommodities;
                        $book->full_load_return_to = $request->txtFullLoadReturn;
                        $book->remark = $request->txtRemark;
                        $book->shipper_id = $request->txtShipperID;
                        

                        $bill = BillLading::where('book_id','=', $id)->first();
                        // DB::table('tbl_bill_lading')->where('book_id', '=', $id)->first();
                        $bill->consignee = $request->txtConsignee;
                        $bill->delivery = $request->txtDelivery;
                        $bill->containerno = $request->txtNumberContainerinerNo;
                        $bill->package_no = $request->txtNoPackage;
                        $bill->kind_package_no = $request->txtKindPackage;
                        $bill->gross_weight = $request->txtGross;
                        $bill->measurement = $request->txtMeasurement;
                        $bill->number_original = $request->txtNumberOriginal;
                        $bill->place_receipt = $request->txtPlaceReceipt;
                        $bill->place_issue = $request->txtPlaceIssue;
                        $bill->date_laden = date_format(date_create($request->txtDateLaden),"Y/m/d"); 
                           
                        
                        $ship = ShipperExport::where('book_id', '=', $id)->first();                        
                        $ship->exporter = $request->txtExport;
                        $ship->export_ref = $request->txtExportRef;
                        $ship->method_trans = $request->txtMethodTrans;
                        $ship->country_des = $request->txtCountryDes;
                        $ship->date_export = date_format(date_create($request->txtDateExport),"Y/m/d");
                        $ship->parties_trans = $request->txtPartiesTrans;
                        $ship->domestic_routing = $request->txtDomesticRouting;
                        $ship->export_carrier = $request->txtExportCarrier;
                        $ship->containerized  = $request->txtContainerized;
                        $ship->type_move = $request->txtTypeMove;
                        $ship->value = $request->txtValue;
                        
                        $arrivalnotice = ArrivalNotice::where('book_id', '=', $id)->first();        
                        $arrivalnotice->mode = $request->txtMode;
                        $arrivalnotice->PU_no = $request->txtPUNo;
                        $arrivalnotice->container_no = $request->txtContainerNo;
                        $arrivalnotice->shipping_line = $request->txtShippingLine;
                        $arrivalnotice->master_BL = $request->txtMasterBL;
                        $arrivalnotice->AMS_BL = $request->txtAMS;
                        $arrivalnotice->House_BL = $request->txtHouseBL;
                        $arrivalnotice->Final_ETA = $request->txtFinalETA;
                        $arrivalnotice->IT_no = $request->txtITNo;
                        $arrivalnotice->date_it_issued = date_format(date_create($request->txtDateIssued),"Y/m/d");
                        $arrivalnotice->last_free_date = date_format(date_create($request->txtLastFreeDate),"Y/m/d");
                        $arrivalnotice->GO_date = date_format(date_create($request->txtGODate),"Y/m/d");
                        $arrivalnotice->cargo_location = $request->txtCargoLocation;
                        $arrivalnotice->remit_payment = $request->txtRemitPayment;
                        $arrivalnotice->freight_collect = $request->txtFreightCollect;
                        $arrivalnotice->handling_fee = $request->txtHandlingFee;
                        $arrivalnotice->ams_fee = $request->txtAMSFee;
                        $arrivalnotice->ddc = $request->txtDDC;
                        $arrivalnotice->demurrage = $request->txtDemurrage;
                        $arrivalnotice->inland_freight = $request->txtInlandFreight;
                        $arrivalnotice->custom_clearance = $request->txtCustomClearance;
                        $arrivalnotice->custom_duty = $request->txtCustomDuty;
                        $arrivalnotice->custom_bond = $request->txtCustomBond;
                        $arrivalnotice->examination_fee = $request->txtExamFee;
                        $arrivalnotice->cfs_charges = $request->txtCFSCharges;
                        $arrivalnotice->thc_fee = $request->txtTHCFee;
                        $arrivalnotice->origin_charges = $request->txtOriginCharges;
                        $arrivalnotice->chassis_charges = $request->txtChassisCharges;
                        $arrivalnotice->IT_entry_charges = $request->txtITEntryCharges;
                        $arrivalnotice->amount_due = $request->txtAmountDue;
                        $arrivalnotice->prepare_by = $request->txtPrepareBy;

                                            

                        $book->status = "Draft";                              
                        $book->save();
                        $bill->save();
                        $ship->save();
                        $arrivalnotice->save();          
                       
                        return redirect()->route('booking.edit',$id);
                    }                                            
            
        elseif (\Input::get('submit')) {            
                        $book = BookingOrder::find($id);
                        $book->booking_no = $request->txtBookingID;                        
                        $book->export_no = $request->txtExportNo;                        
                        $book->today = date_format(date_create($request->txtToday),"Y/m/d");
                        $book->bookedby = $request->txtBookedBy;
                        $book->shipper = $request->txtShipper;
                        $book->port_cargo = $request->txtPortLoadCargo;
                        $book->port_discharge = $request->txtPortDischarge;
                        $book->carrier =$request->txtCarrier;
                        $book->final_dest =$request->txtFinalDest;
                        $book->vessel = $request->txtVessel;
                        $book->voyage = $request->txtVoyage;
                        $book->rail_cut_off = date_format(date_create($request->txtRailCut),"Y/m/d");
                        $book->ETD = date_format(date_create($request->txtETD),"Y/m/d");
                        $book->port_cut_off = date_format(date_create($request->txtPortCut),"Y/m/d");
                        $book->ETA = date_format(date_create($request->txtETA),"Y/m/d");
                        $book->empty_equip_pu_at = $request->txtEmptyEquip;
                        $book->trucking_company = $request->txtTrucking;
                        $book->loading_address = $request->txtLoadingAddress;
                        $book->number_container = $request->txtNumberContainer;
                        $book->commodities = $request->txtCommodities;
                        $book->full_load_return_to = $request->txtFullLoadReturn;
                        $book->remark = $request->txtRemark;
                        $book->shipper_id = $request->txtShipperID;
                        

                        $bill = BillLading::where('book_id','=', $id)->first();
                        // DB::table('tbl_bill_lading')->where('book_id', '=', $id)->first();
                        $bill->consignee = $request->txtConsignee;
                        $bill->delivery = $request->txtDelivery;
                        $bill->containerno = $request->txtNumberContainerinerNo;
                        $bill->package_no = $request->txtNoPackage;
                        $bill->kind_package_no = $request->txtKindPackage;
                        $bill->gross_weight = $request->txtGross;
                        $bill->measurement = $request->txtMeasurement;
                        $bill->number_original = $request->txtNumberOriginal;
                        $bill->place_receipt = $request->txtPlaceReceipt;
                        $bill->place_issue = $request->txtPlaceIssue;
                        $bill->date_laden = date_format(date_create($request->txtDateLaden),"Y/m/d");
                                           
                        
                        $ship = ShipperExport::where('book_id', '=', $id)->first();                        
                        $ship->exporter = $request->txtExport;
                        $ship->export_ref = $request->txtExportRef;
                        $ship->method_trans = $request->txtMethodTrans;
                        $ship->country_des = $request->txtCountryDes;
                        $ship->date_export = date_format(date_create($request->txtDateExport),"Y/m/d");
                        $ship->parties_trans = $request->txtPartiesTrans;
                        $ship->domestic_routing = $request->txtDomesticRouting;
                        $ship->export_carrier = $request->txtExportCarrier;
                        $ship->containerized  = $request->txtContainerized;
                        $ship->type_move = $request->txtTypeMove;
                        $ship->value = $request->txtValue;
                        
                        $arrivalnotice = ArrivalNotice::where('book_id', '=', $id)->first();                           
                        $arrivalnotice->mode = $request->txtMode;
                        $arrivalnotice->PU_no = $request->txtPUNo;
                        $arrivalnotice->container_no = $request->txtContainerNo;
                        $arrivalnotice->shipping_line = $request->txtShippingLine;
                        $arrivalnotice->master_BL = $request->txtMasterBL;
                        $arrivalnotice->AMS_BL = $request->txtAMS;
                        $arrivalnotice->House_BL = $request->txtHouseBL;
                        $arrivalnotice->Final_ETA = $request->txtFinalETA;
                        $arrivalnotice->IT_no = $request->txtITNo;
                        $arrivalnotice->date_it_issued = date_format(date_create($request->txtDateIssued),"Y/m/d");
                        $arrivalnotice->last_free_date = date_format(date_create($request->txtLastFreeDate),"Y/m/d");
                        $arrivalnotice->GO_date = date_format(date_create($request->txtGODate),"Y/m/d");
                        $arrivalnotice->cargo_location = $request->txtCargoLocation;
                        $arrivalnotice->remit_payment = $request->txtRemitPayment;
                        $arrivalnotice->freight_collect = $request->txtFreightCollect;
                        $arrivalnotice->handling_fee = $request->txtHandlingFee;
                        $arrivalnotice->ams_fee = $request->txtAMSFee;
                        $arrivalnotice->ddc = $request->txtDDC;
                        $arrivalnotice->demurrage = $request->txtDemurrage;
                        $arrivalnotice->inland_freight = $request->txtInlandFreight;
                        $arrivalnotice->custom_clearance = $request->txtCustomClearance;
                        $arrivalnotice->custom_duty = $request->txtCustomDuty;
                        $arrivalnotice->custom_bond = $request->txtCustomBond;
                        $arrivalnotice->examination_fee = $request->txtExamFee;
                        $arrivalnotice->cfs_charges = $request->txtCFSCharges;
                        $arrivalnotice->thc_fee = $request->txtTHCFee;
                        $arrivalnotice->origin_charges = $request->txtOriginCharges;
                        $arrivalnotice->chassis_charges = $request->txtChassisCharges;
                        $arrivalnotice->pier_pass_charges = $request->txtPierPassCharges;
                        $arrivalnotice->IT_entry_charges = $request->txtITEntryCharges;
                        $arrivalnotice->amount_due = $request->txtAmountDue;
                        $arrivalnotice->prepare_by = $request->txtPrepareBy;        

                        $booktemp = BookingTemp::where('book_id','=', $id)->delete();


                        $book->status = 'Waiting';                            
                        $book->save();
                        $bill->save();
                        $ship->save();
                        $arrivalnotice->save();   
                return redirect()->route('booking.index');            
        }   
    }
    public function destroy ($id)
    {
        $book = BookingOrder::find($id);
        $check_book = DB::table('tbl_booking_temp')->where('book_id','=',$book->id)->first();
        if (isset($check_book) && ((strtotime(date("Y-m-d h:i:s")) - strtotime($check_book->date_created)) <= $check_book->time) && \Auth::user()->id != $check_book->user_id) 
        {        
            return redirect('/')->with('flash_message_danger','Can not delete this booking! Another user is editing.');
        }
        else {
        $book = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.id','=',$id)
        ->delete();
        return redirect()->route('booking.index');
        }
    }
    
    public function show($id, Request $request)
    {
        $book = BookingOrder::find($id);
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
        $userType = UserType::select('id','name')->get()->toArray();
        $showbook = DB::table('tbl_booking_order')
        ->join('tbl_bill_lading','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->join('tbl_shipper_export','tbl_booking_order.id','=','tbl_shipper_export.book_id')
        ->join('tbl_arrival_notice','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->where('tbl_booking_order.id','=',$id)     
        ->select('tbl_booking_order.*','tbl_bill_lading.*','tbl_shipper_export.*','tbl_arrival_notice.*')   
        ->orderBy('tbl_booking_order.id','DESC')   
        ->first();

        return view('booking.show',compact('showbook','book','userType','booking'));
    }
    public function showapprove($id)
    {
        $book = BookingOrder::find($id);
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id', 'desc')        
        ->first(); 
        $userType = UserType::select('id','name')->get()->toArray();
        $showbook = DB::table('tbl_booking_order')
        ->join('tbl_bill_lading','tbl_booking_order.id','=','tbl_bill_lading.book_id')
        ->join('tbl_shipper_export','tbl_booking_order.id','=','tbl_shipper_export.book_id')
        ->join('tbl_arrival_notice','tbl_booking_order.id','=','tbl_arrival_notice.book_id')
        ->where('tbl_booking_order.id','=',$id)     
        ->select('tbl_booking_order.*','tbl_bill_lading.*','tbl_shipper_export.*','tbl_arrival_notice.*')   
        ->orderBy('tbl_booking_order.id','DESC')   
        ->first();
        return view('booking.approve',compact('showbook','book','userType','booking'));
    }
    public function approve($id, Request $request)
    {
        $book = BookingOrder::find($id);
        $check_book = DB::table('tbl_booking_temp')->where('book_id','=',$book->id)->first();
        if (isset($check_book) && ((strtotime(date("Y-m-d h:i:s")) - strtotime($check_book->date_created)) <= $check_book->time) && \Auth::user()->id != $check_book->user_id) 
        {        
            return redirect('/')->with('flash_message_danger','Can not approve this booking! Another user is editing.');
        }
        else {
        $book = DB::table('tbl_booking_order')
        ->where('tbl_booking_order.id','=',$id)
        ->delete();
        return redirect()->route('booking.index');  
        }    
    }

    public function updatetype (Request $request, $id)
   {
        $book = BookingOrder::find($id);
        $bill = BillLading::where('book_id','=', $id)->first();
        $bill->type = $request->txtType; 
        $bill->save();
        return redirect()->route('printBillLading',$book->id);
   }
}