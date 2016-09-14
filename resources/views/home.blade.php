@extends('layouts.master')
@section('content')
	<!-- Content main -->

				<!-- Title -->
			
				<div class="header-page margin-top-only margin-bottom-only">
					<h3>
						<div class="pvcombank-title-circle">
							<div class="pvcombank-title-circle-inner"><i class="fa fa-info fa-lg"></i></div>
						</div>
						 Welcome to Shipping

					</h3>
				</div><!-- // End Title -->
				<!-- Container -->
				<div class="panel panel-default content_middle">
					<div class="panel-body">
							<div class="row">						
								<div class="col-xs-6">
								@if (Auth::user()->role_id == 1 )
				                    <div style="cursor: pointer"class="alert alert-danger text-center" id="page1">
				                    <h1>{{\App\BookingOrder::where(['status' => 'Waiting'])->count() }}</h1><i class="fa fa-check fa-3x"></i>&nbsp; 
				                   	Waiting For Approval
				                    </div>				               
				                @elseif (Auth::user()->role_id == 2 )
				                <div style="cursor: pointer" class="alert alert-success text-center" id="page2">
				                    <h1>{{\App\BookingOrder::where(['status' => 'Approved', 'user_id'=> Auth::user()->id])
				                    ->orWhere(['status' => 'Approved', 'shipper_id'=> Auth::user()->id])
				                    ->count() }}</h1><i class="fa fa-clock-o fa-3x"></i>&nbsp; 
				                   	Approved Booking Order
				                </div>	
				                @elseif (Auth::user()->role_id == 3 ) 
				                 <div style="cursor: pointer" class="alert alert-success text-center" id="page2">
				                    <h1>{{\App\BookingOrder::where(['status' => 'Approved','shipper_id' => Auth::user()->id])->count() }}</h1><i class="fa fa-clock-o fa-3x"></i>&nbsp; 
				                   	Approved Booking Order
				                </div>	
				                 @endif
	                			</div>
				                <div class="col-xs-6">

				                @if (Auth::user()->role_id == 2)
				                    <div style="cursor: pointer" class="alert alert-info text-center" id="page3">

				                    <h1>{{\App\BookingOrder::Where(function($q) {
						                $q->where('shipper_id','=',\Auth::user()->id)
						                ->orWhere('user_id','=',\Auth::user()->id); })
						                ->where('today','=',date('Y/m/d'))
						                ->count() }}
                </h1><i class="fa fa fa-bookmark fa-3x"></i>&nbsp;Latest Booking Order  
				                    </div>

				                @elseif (Auth::user()->role_id == 3)
				                	 <div style="cursor: pointer" class="alert alert-info text-center" id="page3">

				                    <h1>{{$ccust}}</h1><i class="fa fa fa-bookmark fa-3x"></i>&nbsp;Latest Booking Order  
				                    </div>
				                 @else
				                 <div style="cursor: pointer" class="alert alert-info text-center" id="page3">

				                    <h1>{{\App\BookingOrder::where(['today' => date('Y/m/d')])->count() }}</h1><i class="fa fa fa-bookmark fa-3x"></i>&nbsp;Latest Booking Order  
				                 </div>
				                @endif

				                </div>								
							</div>
							<div class="col-xs-12">
								<div id="result1">
							
								</div>								
							</div>

					</div><!-- //End row -->
					</div>
				<!-- //Container -->
	<script type="text/javascript">
		$(document).ready(function(){
		$('#result1').load('{{URL::to("/home/lastest")}}');
		   $("#page1").click(function(){

		   	$('#result1').load('{{URL::to("/home/waiting")}}');	
		   	//$("#result2").remove();
		   }); 

		   $("#page2").click(function(){
		   	//alert("page2");
		   	
		   	$('#result1').load('{{URL::to("/home/approve")}}');		     
		   });

		   	$("#page3").click(function(){
		   	//alert("page2");		   	
		   	$('#result1').load('{{URL::to("/home/lastest")}}');		     
		   });
		 });
	</script>
@endsection