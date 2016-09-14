
	<div class="header-page margin-top-only margin-bottom-only">
		<h3>
			<div class="pvcombank-title-circle">
				<img src="{{url('public/shippingtemplate/images/booking.png') }}" class="img-responsive" height="30px" width="30px" />
			</div>
			FCL BOOKING ORDER

		</h3>
	</div><!-- // End Title -->
	<!-- Start main content -->		
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
                                    <td><p class="text-warning"><i class="fa fa-pencil-square-o"></i> Draft</p>
                                    </td>
                                @endif  
                                
                                @if (Auth::user()->role_id ==1)                                
                                <td>
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
                                </td>                                                                           
                                @endif

                                @if (Auth::user()->role_id ==2)
                                    @if($print->status == "Approved")
                                        <td>
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
                                        @foreach($role as $t)  
                                            @if($t->per_id == 3) 
                                            <td>                               
                                                <a class="btn btn-default btn-xs" href="{!! route('booking.edit',$print->id) !!}" disabled=""><i class="fa fa-pencil fa-fw"></i> Edit</a>                                   
                                            </td>
                                            @endif
                                        @endforeach                                           
                                    @else
                                        <td>
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
                                        @foreach($role as $t)  
                                            @if($t->per_id == 3) 
                                            <td>                               
                                            <a class="btn btn-default btn-xs" href="{!! route('booking.edit',$print->id) !!}"><i class="fa fa-pencil fa-fw"></i> Edit</a>                                   
                                            </td>
                                            @endif
                                        @endforeach
                                    @endif 
                                @endif 
                                
                                     @if ( Auth::user()->role_id == 1)
                                                                      
                                         @if($print->status == "Waiting")
                                            <td>
                                                 <a href="{!! route('getbookapprove',$print->id) !!}" class="btn btn-success btn-xs" onclick="return confirmAction()" type="button" id="" ><i class="fa fa-check fa-fw"> </i> Approve</a>                                                           
                                            </td>     
                                         @else
                                            <td>
                                                <a href="{!! route('getbookapprove',$print->id) !!}" class="btn btn-success btn-xs" onclick="return confirmAction()" type="button" id="" disabled=""><i class="fa fa-check fa-fw"> </i> Approve</a>    
                                            </td>
                                         @endif
                                    @endif
                                                          
                            </tr>   
                                             
                            @endforeach 

                        </tbody>
                    </table> 

			<!-- //Content table List -->
			<form class="form-horizontal" method="post" role="form"  action="{!! route('booking.store') !!}">
				{!! csrf_field() !!}
			<div class="row">
			@if(Auth::user()->role_id != 3)
			<div class="col-xs-12 text-right">
                        <div class="form-group">
                            <a class="btn btn-danger" href="{{route('booking.post')}}"><i class="fa fa-play"></i> Add Booking</a>                           
                        </div>
                    </div>
			@endif
			</div>
			</form>

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


