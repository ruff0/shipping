<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserType;
use App\Permission;
use App\Role_Permission;
use App\Http\Requests\PermissionRequest;
use App\Role;
use DB;
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $booking = DB::table('tbl_booking_order')  
        ->select('tbl_booking_order.*')
        ->orderBy('tbl_booking_order.id','desc')        
        ->first(); 
        $user = DB::table('tbl_users')->where('id','=',\Auth::user()->id)->first();
        $role = Role::select('id','name')->get()->toArray();
        $per = Permission::select('id','name')->get()->toArray();        
        return view('permission',compact('per','role','booking'));        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {    
        $r = Role_Permission::where('role_id','=',$request->sltRole)->delete();             
        foreach($request->gridPer as $p)
        {
        for ($i=0; $i<count($p); ++$i)
        	{        			
        	$Role_Per = new Role_Permission;
            $Role_Per->per_id = $p[$i]; 

            $Role_Per->role_id = $request->sltRole;
                         
            $Role_Per->save();           
        	}
    	}
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(PermissionRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
