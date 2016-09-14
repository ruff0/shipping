<!DOCTYPE html>
<html>
	<head>
		<!-- Font vietnam UTF-8 -->
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Title here -->
		<title>American Container Line</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="SERENCO JSC"/>
		<meta name="keywords" content="CORE S-SOFT"/>
		<meta name="author" content="serenco jsc">
	
		<!-- Bootstrap Core CSS -->
		<link href="{{url('public/shippingtemplate/css/bootstrap.css')}}" rel="stylesheet"/>
		<link href="{{url('public/shippingtemplate/css/bootstrap-theme.css')}}" rel="stylesheet"/>
		
		<!-- Bootstrap Table -->
    	<link href="{{ url('public/shippingtemplate/css/dataTables.bootstrap.css') }}" rel="stylesheet">
		
		<!-- MetisMenu CSS -->
    	<link href="{{ url('public/shippingtemplate/css/metisMenu.min.css') }}" rel="stylesheet">

    	<!-- Custom CSS -->
    	<link href="{{ url('public/shippingtemplate/css/sb-admin-2.css') }}" rel="stylesheet">

		<!-- Grid -->
		<link rel="stylesheet" href="{{url('public/shippingtemplate/jqgrid/css/ui.jqgrid.css')}}" />
		<link rel="stylesheet" href="{{url('public/shippingtemplate/jqgrid/css/ui.multiselect.css')}}" />
		<link rel="stylesheet" href="{{url('public/shippingtemplate/css/jquery-ui-1.8.2.custom.css')}}" />
		<!-- End Grid -->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<!-- Custom Fonts -->
    	<link href="{{url('public/shippingtemplate/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link href="{{url('public/shippingtemplate/css/style.css')}}" rel="stylesheet"/>
		<!--[if IE]>
		<link rel="stylesheet" href="css/ie-style.css">
		<![endif]-->
		<!-- jQuery -->
	    <script src="{{url('public/shippingtemplate/js/jquery-1.12.0.min.js')}}" > </script>
		<!-- Bootstrap JS -->
		<script src="{{url('public/shippingtemplate/js/bootstrap.min.js')}}"></script>
		
		<!-- Bootstrap Table JS -->
		<script src="{{url('public/shippingtemplate/js/jquery.dataTables.js')}}"></script>
		<script src="{{url('public/shippingtemplate/js/dataTables.bootstrap.js')}}"></script>
		
		
		<link rel="shortcut icon" href="#"/>
	</head>
	<body>

		<!-- The main home page Each wrapper is define for seprate pages -->
		<div class="top"></div>
		<div class="wrapper-home">
			<!-- Start Header -->		
			<nav class="navbar navbar-default br-yellow" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a href="{{URL::to('home')}}"><h4 class="pvcombank-text-nav blue">American Container Line</h4></a>
				</div><!-- /.container-fluid -->
			</nav>
			<!-- End Header -->			
		</div>
        <!-- /.navbar-static-side -->
        <!-- Inner Page -->
        <div class="container">
            <!-- Block Logo Menu Header -->        
            <div class="row logo-menu-header clearfix">
                <div class="col-xs-4">
                <a href="{{URL::to('home')}}"> <img src="{{url('public/shippingtemplate/images/acl-logo.png') }}" class="img-responsive"/> </a>
                </div>
                <div class="col-xs-8">
                    <div class="box-link clearfix">
                        <div class="pull-right reset-margin-bottom">
                            <p><span class="glyphicon glyphicon-user"></span><span class="user-name"> {{Auth::user()->email}} </span></p>
                        
                            <a href="{{route('postEditPass',Auth::user()->id)}}"><strong><span class="glyphicon glyphicon-edit"></span>  Change your password</strong></a><br/>
                            <a style="cursor:pointer" id="logoutbtn"><strong><span class="glyphicon glyphicon-cog"></span>  Logout </strong></a>

		  <!-- Modal -->
		  <div class="modal fade" id="logoutModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title" style="text-align: center;">You have signed in Shipping ACL</h4>
		        </div>
		        <div class="modal-body" style="text-align: center;">
		          <p>
					Please click to sign out. 
				</p>
		        </div>
		        <div class="modal-footer">
		        <div class="col-xs-6">
		        	<a href="{{ url('logout') }}" class="btn btn-danger btn-block"> Sign out</a>
		        </div>
		        <div class="col-xs-6">
		        	<a href="#" class="btn btn-default"  data-dismiss="modal" >Close</a>		        
		        </div>
		      </div>
		    </div>
		  </div>
		  
		</div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>


		<div id="page-wrapper">
			<div class="container">        
				<!-- Content Row main -->
				<div class="row">	
				<div class="col-xs-12">	
				
				@if (Session::has('flash_message_danger'))	
					<!--<div class="alert alert-{!! Session::get('flash_level') !!}"> -->
					<div class="alert alert-danger" style="text-align: center;">				
					{!! Session::get('flash_message_danger') !!}
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
				@endif	
				@if (Session::has('flash_message_success'))	
					<!--<div class="alert alert-{!! Session::get('flash_level') !!}"> -->
					<div class="alert alert-success" style="text-align: center;">				
					{!! Session::get('flash_message_success') !!}
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
				@endif	
				</div>
				</div>
				<div class="row">
					<div class="col-xs-3">
						<div class="navbar-default sidebar" role="navigation">
						<div class="sidebar-nav navbar-collapse">
							<ul class="nav" id="side-menu">
								<li>
									<a href="{{URL::to('home')}}"><i class="fa fa-dashboard fa-fw"></i> Home</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Customer/Vendor<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
									@if (Auth::user()->role_id != 3 )
										<li>
											<a href="{{route('customer-vendor.index')}}">User Management</a>
										</li>
																		
										<li>
											<a href="{{route('register.index')}}">Add Customer/Vendor</a>
										</li>
										@endif
										<li>
											<a href="{{route('postEditPass',Auth::user()->id)}}">Change Password</a>
										</li>
										@if (Auth::user()->role_id == 1)
										<li>
											<a href="{{URL::to('permission')}}">Permission</a>
										</li>
										@endif
									</ul>
									<!-- /.nav-second-level -->
								</li>
								<li>
								<a href="{{ route('booking.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Booking <span class="fa arrow"></span></a>
									
								<ul class="nav nav-second-level">								
										<li>
											<a href="{{route('booking.index')}}">Booking Management</a>
										</li>	
										@if (Auth::user()->role_id != 3)
										<li>
											<a href="{{route('booking.post')}}">Add Booking</a>										
										</li>
										@endif													
								</ul>
								</li>                        
							</ul>
						</div>
						<!-- /.sidebar-collapse -->
						</div>
					</div>
							
					<div class="col-xs-9"> @yield('content')</div>
						<!-- Inner Page -->		
				</div>


				</div><!-- //Row main -->
			</div><!-- //Content main -->

		<!-- Start footer -->
		<div class="ebank_footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<p>American Container Line</p>
						<p>1650 Las Plumas Ave, San Jose,Ca 95133</p>
						<p>Tel : 408 937 5119 Email : steve@acline.com</p>
					</div>
					<div class="col-xs-6 text-right">
					<p>Copyright © 2016. ACL Container Line. </p>
					</div>
				</div>
				
			</div>
			
		</div><!-- //End Footer -->
		<!-- Javascript files -->		
		<!-- Metis Menu Plugin JavaScript -->
	    <script src="{{url('public/shippingtemplate/js/metisMenu.min.js')}}"></script>
	    <!-- Custom Theme JavaScript -->
    	<script src="{{url('public/shippingtemplate/js/sb-admin-2.js')}}"></script>
    	
		<!--Data table -->
		
		<!--Boostrap jquery-ui -->
	    <script src="{{url('public/shippingtemplate/js/jquery-ui.js')}}"> </script>
    	
		<!-- JS for this page-->
		<script type="text/javascript">
			$(document).ready(function(){
				var myHeight;
				var minHeight;
				myHeight = window.innerHeight;
				minHeight = myHeight - $(".navbar").height() - $(".ebank_footer").height() - $(".logo-menu-header").height();
				$('.content_middle').css('min-height',minHeight - 138);
			});
		</script>
		<script>
			$(document).ready(function(){
			    $("#logoutbtn").click(function(){
			        $("#logoutModal").modal();
			    });
			});	
		</script>
		<script>
		$(document).ready(function()){
			 $("div.alert").delay(2000).slideUp();			
		}
		</script>

</html>