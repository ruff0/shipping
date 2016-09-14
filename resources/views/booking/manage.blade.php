@extends('layouts.master')
@section('content')
	<!-- Title -->	
	<div class="header-page margin-top-only margin-bottom-only">
		<h3>
			<div class="pvcombank-title-circle">
				<img src="{{url('public/shippingtemplate/images/booking.png') }}" class="img-responsive" height="30px" width="30px" />
			</div>
			FCL BOOKING ORDER

		</h3>
	</div><!-- // End Title -->
	<!-- Start main content -->
	<div class="panel panel-default content_middle">
		<div class="panel-body">
			<form method="get" role="form" class="form-horizontal" name="formSearch" id="frmSearch" action="{{URL::action('BookingController@manage')}}">
			{!! csrf_field() !!}
				<!-- Start row -->
				<div class="row">
					<!-- Start col -->
					<div class="col-xs-6">
						<div class="form-group">
							<label for="business_phone_company" class="col-xs-6 control-label">Booking No.</label>
							<div class="col-xs-6">
								<input type="text" class="form-control input-sm" placeholder="Booking No." name="txtBookingNo" id="business_phone_company" value="<?php if (isset($_GET['txtBookingNo'])) echo $_GET['txtBookingNo']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="business_phone_company" class="col-xs-6 control-label">Export references M-B/L No.</label>
							<div class="col-xs-6">
								<input type="text" class="form-control input-sm" placeholder="Export references M-B/L No." name="txtExportNo" id="business_phone_company" value="<?php if (isset($_GET['txtExportNo'])) echo $_GET['txtExportNo']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="business_phone_company" class="col-xs-6 control-label">From Date</label>
							<div class="col-xs-6">
								<input type="text" class="form-control input-sm datepicker" placeholder="From Date" name="txtFromDate" id="datepicker" value="<?php 
								if (isset($_GET['txtFromDate'])) 
									{
										echo $_GET['txtFromDate'];
									}
								else
									{
									echo date('m/01/Y');
									}
								?>
								">
							</div>
						</div>
					</div><!-- End col -->
					<!-- Start col -->
					<div class="col-xs-6">
						<div class="form-group">
							<label for="business_phone_company" class="col-xs-6 control-label">Log No.</label>
							<div class="col-xs-6">
								<input type="text" class="form-control input-sm" placeholder="Log No." name="txtLogNo" id="business_phone_company" value="<?php if (isset($_GET['txtLogNo'])) echo $_GET['txtLogNo']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="business_phone_company" class="col-xs-6 control-label">Booked by</label>
							<div class="col-xs-6">
								<input type="text" class="form-control input-sm" placeholder="Booked by" name="txtBookedBy" id="business_phone_company" value="<?php if (isset($_GET['txtBookedBy'])) echo $_GET['txtBookedBy']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="business_phone_company" class="col-xs-6 control-label">To Date</label>
							<div class="col-xs-6">
								<input type="text" class="form-control input-sm datepicker" placeholder="From Date" name="txtToDate" id="datepicker-to" value="<?php 
								if (isset($_GET['txtToDate'])) 
									{
										echo $_GET['txtToDate'];
									}
								else
									{
									echo date('12/31/Y');
									}
								?>
								">
							</div>
						</div>
					</div><!-- //End col -->
				</div><!-- //End Row -->
				<!-- Row Button -->
				<div class="row">
					<div class="col-xs-12 text-right">
						<div class="form-group">
							<button class="btn btn-danger" type="submit"><i class="fa fa-search"></i> Search</button>
						</div>
					</div>
				</div><!-- //Row Button -->
			</form>
			<hr>
			<!-- Content table List -->
			<div id="main" class="row">
			
				<div class="col-xs-12">
					 <table id="mana-book" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Booking No</th>
                                <th>B/L No.</th>  
                                <th>Log No</th>
                                <th>Export References</th>                              
                                <th>Date</th>                                
                                <th>Booked by</th>
                                <th>Status</th>
                                @if (Auth::user()->role_id != 3 )
                                
                                <th>Delete</th>
                                <th>Edit</th>                                
                                @endif
                                @if (Auth::user()->role_id ==1)
                                <th>Approve</th>                                
                                @endif
                                                       
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Booking No</th>
                                <th>B/L No.</th>  
                                <th>Log No</th>
                                <th>Export References</th>                              
                                <th>Date</th>                                
                                <th>Booked by</th>
                                <th>Status</th>
                                @if (Auth::user()->role_id != 3 )
                                
                                <th>Delete</th>
                                <th>Edit</th>                                
                                @endif     
                                @if (Auth::user()->role_id ==1)
                                <th>Approve</th>                                
                                @endif                                                
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($result as $print)                                    
                            
                            <tr>
                            	<td>
                            	<a href="{{route('booking.show',$print->id)}}">
                            	<?php 
                            	$str = $print->booking_no;
                            	echo wordwrap($str,13,"\n", true);
                            	?> 
                            	</a> 
                            	</td>
                                <td>{!! $print->BL_no !!}</td>
                                <td>{!! $print->log_no!!}</td>  
                                <td>{!! $print->export_no !!}</td>
                                <td><?php 
                                $date=date_create($print->today);	
                                echo date_format($date,"m/d/Y"); ?> </td>                                
                                
                                <td>
                                {!! $print->bookedby!!}
                                </td>
                                @if($print->status == "Approved")                                
                                <td>                               
                                <p class="text-success"><i class="fa fa-check-square-o"></i>Approved</p>                                                        
                                </td>
                                
                                @elseif($print->status == "Waiting")
                                <td><p class="text-info"><i class="fa fa-clock-o"></i> Waiting</p></td>
                                @else
                                <td><p class="text-warning"><i class="fa fa-pencil-square-o"></i> Draft</p></td>
                                @endif   
                                @if (Auth::user()->role_id != 3)                                
                                <td>
                                @if (Auth:: user()->role_id == 2)
                                	@if ($print->status !="Approved")
		                                @foreach($role as $t)         
			                                @if($t->per_id == 4)                       
			                                <form method="POST" action="{{route('booking.destroy',$print->id)}}">      
			                                {!! csrf_field() !!}
			                                <input type="hidden" name="_method" value="DELETE">                                
			                                <button class="btn btn-danger btn-xs" onclick="return confirmAction()" type="submit" id="delete" ><i class="fa fa-trash-o fa-fw"> </i> Delete</button>
			                                </form>
			                                @endif
		                                @endforeach
		                                </td>                                                               
		                                <td>
		                                @foreach($role as $t)  
		                                @if($t->per_id == 3)
		                                <a class="btn btn-default btn-xs" href="{!! route('booking.edit',$print->id) !!}"><i class="fa fa-pencil fa-fw"></i> Edit</a>
		                                @endif
		                                @endforeach
		                            @else
		                            @foreach($role as $t)         
			                                @if($t->per_id == 4)                       
			                                <form method="POST" action="{{route('booking.destroy',$print->id)}}">      
			                                {!! csrf_field() !!}
			                                <input type="hidden" name="_method" value="DELETE">                                
			                                <button class="btn btn-danger btn-xs" onclick="return confirmAction()" type="submit" id="delete" disabled=""><i class="fa fa-trash-o fa-fw"> </i> Delete</button>
			                                </form>
			                         @endif
		                                @endforeach
		                                </td>                                                               
		                                <td>
		                                @foreach($role as $t)  
		                                @if($t->per_id == 3)
		                                <a class="btn btn-default btn-xs" href="{!! route('booking.edit',$print->id) !!}" disabled=""><i class="fa fa-pencil fa-fw"></i> Edit</a>
		                                @endif
		                                @endforeach		      
                                	@endif
                                @endif

                                @if (Auth::user()->role_id == 1)
                                	@if ($print->status !="Approved")
		                                @foreach($role as $t)         
			                                @if($t->per_id == 4)                       
			                                <form method="POST" action="{{route('booking.destroy',$print->id)}}">      
			                                {!! csrf_field() !!}
			                                <input type="hidden" name="_method" value="DELETE">                                
			                                <button class="btn btn-danger btn-xs" onclick="return confirmAction()" type="submit" id="delete" ><i class="fa fa-trash-o fa-fw"> </i> Delete</button>
			                                </form>
			                                @endif
		                                @endforeach
		                                </td>                                                               
		                                <td>
		                                @foreach($role as $t)  
		                                @if($t->per_id == 3)
		                                <a class="btn btn-default btn-xs" href="{!! route('booking.edit',$print->id) !!}"><i class="fa fa-pencil fa-fw"></i> Edit</a>
		                                @endif
		                                @endforeach
		                            @else
		                            @foreach($role as $t)         
			                                @if($t->per_id == 4)                       
			                                <form method="POST" action="{{route('booking.destroy',$print->id)}}">      
			                                {!! csrf_field() !!}
			                                <input type="hidden" name="_method" value="DELETE">                                
			                                <button class="btn btn-danger btn-xs" onclick="return confirmAction()" type="submit" id="delete"><i class="fa fa-trash-o fa-fw"> </i> Delete</button>
			                                </form>
			                         @endif
		                                @endforeach
		                                </td>                                                               
		                                <td>
		                                @foreach($role as $t)  
		                                @if($t->per_id == 3)
		                                <a class="btn btn-default btn-xs" href="{!! route('booking.edit',$print->id) !!}" ><i class="fa fa-pencil fa-fw"></i> Edit</a>
		                                @endif
		                                @endforeach		      
                                	@endif
                                @endif
                                </td>                                                                       
                                @endif 

                                 @foreach($role as $t)                                   
                                 @if ( (Auth::user()->role_id ==1) AND ($t->per_id ==5))
                                   <td>                                
	                                 @if($print->status == "Waiting")
	                                 	<a href="{!! route('getbookapprove',$print->id) !!}" class="btn btn-success btn-xs" onclick="return confirmAction()" type="button" id="" ><i class="fa fa-check fa-fw"> </i>Approve</a>  
	                                 @else    
	                                 	<a href="{!! route('getbookapprove',$print->id) !!}" class="btn btn-success btn-xs" onclick="return confirmAction()" type="button" id="" disabled=""><i class="fa fa-check fa-fw"></i>Approve</a>                             
                                 	@endif
                                 	</td>
                                 @endif
                                 @endforeach
                                                     
                            </tr>   
                                             
                            @endforeach 

                        </tbody>
                    </table> 
                   
				</div>
					</div><!-- //Row -->
					<!-- get created_by-->

			<!-- Content table List -->
			
			<div class="row">
			@foreach($role as $t)
			@if((Auth::user()->role_id != 3) AND ($t->per_id==2))			
					<div class="col-xs-12 text-right">
						<div class="form-group">
							<a class="btn btn-danger" href="{{route('booking.post')}}"><i class="fa fa-play"></i> Add Booking</a>							
						</div>
					</div>
			@endif
			 @endforeach
			</div>
			
		</div>
	</div><!-- //Start main content -->
	<script>
	
	$(document).ready(function(){
		$( "#datepicker" ).datepicker();
		$( "#datepicker-to" ).datepicker();
	});
</script>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Are you sure?");
    };
    $(document).ready(function() {
        $('#mana-book').DataTable();
    } );
</SCRIPT>

    

<script>

$(document).ready(function() {
        $url = document.URL;
        if(($url.indexOf("txtFromDate") != -1) &&($url.indexOf("txtToDate") != -1)){
 		   
		}
		else {
			document.getElementById('frmSearch').submit();		
		}
    } );
// document.onload = function
//  document.getElementById('frmSearch').submit();
 
</script>



@endsection