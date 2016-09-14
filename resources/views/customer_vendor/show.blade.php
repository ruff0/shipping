@extends('layouts.master')
@section('content')

<!-- Content Row main -->
<div class="row">
<div class="col-xs-12">
<!-- Title -->
<div class="header-page margin-top-only margin-bottom-only">
<h3>
	<div class="pvcombank-title-circle">
		<div class="pvcombank-title-circle-inner"><i class="fa fa-info fa-lg"></i></div>
	</div>
	 Customer/Vendor
</h3>
</div><!-- // End Title -->
<!-- Container Form -->
{{ Form::open(array('route'=>array('customer-vendor.show',$user['id']),'method'=>'GET','files'=>true, 'class'=> 'form-horizontal')) }}
	<div class="panel panel-default content_middle">
		<div class="panel-body">
			<div class="row">
							<div class="col-xs-6">
								<div class="form-group ">
									<label class="col-xs-4 control-label" for="custom_objects">Customer ID</label>
									<label class="col-xs-8 control-label" for="custom_objects">{{$user['id']}}</label>
								</div>
								
								<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Company</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['company']}}</label>
									
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group {{ $errors->has('sltUserType') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">Customer Type</label>
									<label class="col-xs-8 control-label" for="custom_objects"><?php slist($userType,$user["user_type_id"]); ?></label>									
								</div>
							
								<div class="form-group {{ $errors->has('txtPassword') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">Password</label>
									<label class="col-xs-8 control-label" for="custom_objects">*********</label>									
									<div class="col-xs-8">
									</div>
								</div>
							</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
							<div class="form-group">
								<label style="width:16%" class="col-xs-4 control-label" for="custom_objects">Job Descriptions</label>
								<label class="col-xs-8 control-label" style="width:84%">{!! $user['job_descriptions'] !!}</label>								
								
							</div>
				</div>
			</div>
		<div class="row">
			<div class="col-xs-6">
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Contact Name</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['contact_name']}}</label>								
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Address</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['address']}}</label>									
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">City</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['city']}}</label>									
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Zip Code</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['zip_code']}}</label>
							</div>
							<div class="form-group {{ $errors->has('txtEmail') ? ' has-error' : '' }}">
								<label class="col-xs-4 control-label" for="custom_objects">Email</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['email']}}</label>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">EIN</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['EIN']}}</label>							
							</div>
			</div>
			<div class="col-xs-6">
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Phone</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['phone']}}</label>				
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Fax</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['fax']}}</label>	
							</div>
																			
							<div class="form-group {{ $errors->has('sltState') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">State</label>
									<label class="col-xs-8 control-label" for="custom_objects"><?php slist($state, $user["state_id"]); ?></label>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Country</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['country']}}</label>	
							</div>							
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Internet Address</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['IAddress']}}</label>	
							</div>
							
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">ACL_ID Code</label>
								<label class="col-xs-8 control-label" for="custom_objects">{{$user['ACL_ID']}}</label>
							</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects" style="width:16%">Logo</label>
								<div class="col-xs-8" style="width:84%">
									@if($user['logo'] == '')
																	
									@else
									<img class="img-center" src="{!! URL::to('public/uploads/' . $user['logo']) !!}" style="width:60px;height:60px;" alt="img"> 
									@endif
								</div>
							</div>
							<hr />
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects" style="width:16%">Notes</label>
								<div class="col-xs-8" style="width:84%">
									<label class="col-xs-8 control-label" >
									{!!  $user['notes']  !!}
									</label>
								</div>
							</div>
			</div>
		</div>
		</div><!-- //Panel Body -->
	</div><!-- //Panel Form -->
{{ Form::close() }}<!-- //Container Form -->
</div>
</div><!-- //Row main -->


@endsection