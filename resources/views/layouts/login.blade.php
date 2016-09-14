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
		<!-- Styles -->
		<!-- Bootstrap Core CSS -->
    	<link href="{{url('public/shippingtemplate/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{url('public/shippingtemplate/css/bootstrap-theme.css')}}" rel="stylesheet"/>
		<link href="{{url('public/shippingtemplate/css/bootstrap.css')}}" rel="stylesheet"/>

    	<!-- Custom CSS -->
    	<link href="{{ url('public/shippingtemplate/css/sb-admin-2.css') }}" rel="stylesheet">
		<!-- Grid -->
		<link rel="stylesheet" href="{{url('public/shippingtemplate/jqgrid/css/ui.jqgrid.css')}}" />
		<link rel="stylesheet" href="{{url('public/shippingtemplate/jqgrid/css/ui.multiselect.css')}}" />
		<link rel="stylesheet" href="{{url('public/shippingtemplate/css/jquery-ui-1.8.2.custom.css')}}" />
		<!-- End Grid -->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- data table -->



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
		<!-- Favicon -->
		<!-- jQuery -->
	    <script src="{{url('public/shippingtemplate/js/jquery.min.js')}}"></script>

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
					  <a href="#"><h4 class="pvcombank-text-nav blue">American Container Line</h4></a>
				</div><!-- /.container-fluid -->
			</nav>
					@if (Session::has('flash_message_logout'))	
				    <div class="alert alert-danger " style="text-align: center;" >
				    {!! Session::get('flash_message_logout') !!}
				        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    </div>
					@endif	

		</div>

		@yield('content')

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
		<!-- Bootstrap JS -->
		<script src="{{url('public/shippingtemplate/js/bootstrap.min.js')}}"></script>
		

	    <!-- Metis Menu Plugin JavaScript -->
	    <script src="{{url('public/shippingtemplate/js/metisMenu.min.js')}}"></script>
	    <!-- Custom Theme JavaScript -->
    	<script src="{{url('public/shippingtemplate/js/sb-admin-2.js')}}"></script>

			<!-- JS for this page-->
			<script type="text/javascript">
				$(document).ready(function(){
					var myHeight;
					var minHeight;
					myHeight = window.innerHeight;
					minHeight = myHeight - $(".navbar").height() - $(".ebank_footer").height();
					$('.content_middle').css('min-height',minHeight-52);
				});
			</script>
		
	</body>
</html>