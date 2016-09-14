@extends('layouts.master')
@section('content')
<!-- Content main -->

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
<form class="form-horizontal" role="form" method="POST" action="{!! route('register.store') !!}" enctype="multipart/form-data">
                {!! csrf_field() !!}
	<div class="panel panel-default content_middle">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label class="col-xs-4 control-label" for="custom_objects">Customer ID</label>
						<div class="col-xs-8">
							<input type="text" class="form-control input-sm text-note-start" placeholder="Customer ID" name="txtCusID" id="" disabled="">
						</div>
					</div>
				
					<div class="form-group">
					<label class="col-xs-4 control-label" for="custom_objects">Company</label>
					<div class="col-xs-8">
						<input type="text" class="form-control input-sm text-note-start" placeholder="Company" name="txtCompany" id="" value="{{ old('txtCompany') }}">
						
					</div>
					</div>
				</div>
				
				<div class="col-xs-6">
				@if(Auth::user()->role_id == 1)
					<div class="form-group {{ $errors->has('sltUserType') ? ' has-error' : '' }}">
						<label class="col-xs-4 control-label" for="custom_objects">Customer Type</label>
						<div class="col-xs-8">
							<select id="select-account-type" name="sltUserType" class="width-90-per text-note-start form-control input-sm">
	                            <option value="" selected>Select Customer Type</option>                        
	                            <?php droplist($userType); ?>
            				</select>
							<span class="text-error">*</span>
								     @if ($errors->has('sltUserType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sltUserType') }}</strong>    
                                    </span>
                                	@endif
						</div>
					</div>
				@else
					<div class="form-group {{ $errors->has('sltUserType') ? ' has-error' : '' }}">
						<label class="col-xs-4 control-label" for="custom_objects">Customer Type</label>
						<div class="col-xs-8">
							<select id="select-account-type" name="sltUserType" class="width-90-per text-note-start form-control input-sm">
	                            <option value="" selected>Select Customer Type</option>        
	                            <option value=11> Customers </option>
            				</select>
							<span class="text-error">*</span>
								     @if ($errors->has('sltUserType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sltUserType') }}</strong>    
                                    </span>
                                	@endif
						</div>
					</div>
					<input type="hidden" name="txtCreated" value="{{Auth::user()->id }}">
				@endif

					<div class="form-group {{ $errors->has('txtPassword') ? ' has-error' : '' }}">
						<label class="col-xs-4 control-label" for="custom_objects">Password</label>
						<div class="col-xs-8">
						<input type="text" class="width-90-per form-control input-sm text-note-start" placeholder="*****" name="txtPassword" id="" value="{{ old('txtPassword') }}">
						<span class="text-error">*</span>
						@if ($errors->has('txtPassword'))
						<span class="help-block">
						<strong>{{ $errors->first('txtPassword') }}</strong>    
						</span>
						@endif
						</div>
					</div>
				</div>
			</div>
			<div class="row">					
				<div class="col-xs-12">
					<div class="form-group">
						<label style="width:16%" class="col-xs-2 control-label" for="jobdesc" >Job Descriptions</label>
						<div class="col-xs-10" style="width:84%">
							<textarea type="text" rows="3" class="form-control" placeholder="Job Descriptions" name="txtJobDesc" id="jobdesc" value="">{{ old('txtJobDesc') }}</textarea>
							
						</div>
					</div>
				</div>
			</div>
			<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Contact Name</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="Contact Name" name="txtContactName" id="" value="{{ old('txtContactName') }}">
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Address</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="Address" name="txtAddress" id="" value="{{ old('txtAddress') }}">
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">City</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="City" name="txtCity" id="" value="{{ old('txtCity') }}">
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Zip Code</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="Zip Code" name="txtZipCode" id="" value="{{ old('txtZipCode') }}">
								</div>
							</div>
							<div class="form-group {{ $errors->has('txtEmail') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">Email Address</label>
									<div class="col-xs-8">
										<input type="email" class="width-90-per form-control input-sm text-note-start" placeholder="Email" name="txtEmail" id="" value="{{ old('txtEmail') }}">
										<span class="text-error">*</span>
										     @if ($errors->has('txtEmail'))
	                                                <span class="help-block">
	                                                    <strong>{{ $errors->first('txtEmail') }}</strong>    
	                                                </span>
	                                            @endif
									</div>
								</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">EIN</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="EIN" name="txtEIN" id=""  value="{{ old('txtEIN') }}">
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group {{ $errors->has('txtPhone') ? ' has-error' : '' }}">
								<label class="col-xs-4 control-label" for="custom_objects">Phone</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="Phone" name="txtPhone" id="" value="{{ old('txtPhone') }}">
									 @if ($errors->has('txtPhone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('txtPhone') }}</strong>    
                                                </span>
                                            @endif
								</div>
							</div>																													
							<div class="form-group {{ $errors->has('txtFax') ? ' has-error' : '' }}">
								<label class="col-xs-4 control-label" for="custom_objects">Fax</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="Fax" name="txtFax" id="" value="{{ old('txtFax') }}">
									 @if ($errors->has('txtFax'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('txtFax') }}</strong>    
                                                </span>
                                            @endif
								</div>
							</div>
									
							<div class="form-group {{ $errors->has('sltState') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">State</label>
									<div class="col-xs-8">
										<select id="select-account-type" name="sltState" class="width-90-per form-control input-sm" value="{{ old('sltState') }}">
				                            <option value="" selected>Select State</option>                        
				                            <?php droplist($state); ?>
                        				</select>
                        				<span class="text-error">*</span>
                        				   <span class="help-block">
                                                    <strong>{{ $errors->first('sltState') }}</strong>    
                                                </span>
									</div>
							</div>

							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Country</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="Country" name="txtCountry" id="" value="{{ old('txtCountry') }}">
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Internet Address</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="Internet Address" name="txtIAddr" id="" value="{{ old('txtIAddr') }}">
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">ACL-ID Code</label>
								<div class="col-xs-8">
									<input type="text" class="form-control input-sm" placeholder="ACL_ID Code" name="txtACL" id="" value="{{ old('txtACL') }}">
								</div>
							</div>
						</div>
			</div>
			<div class="row">
					<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-2 control-label" for="custom_objects" style="width:16%">Logo</label>
								<div class="col-xs-10" style="width:84%">								
								<input type="text" class="text-note-start form-control input-sm" name="txtNewLogo" id="filelogo" value="" readonly="readonly">				

								<input id="myLogo" onchage="getImage()" onchange="readURL(this);" type="file" name="fileLogo">
								</div>
							</div>
					</div>
			</div>
			<div class="row">					
				<div class="col-xs-12">
					<div class="form-group">
						<label style="width:16%" class="col-xs-2 control-label" for="notes" >Notes</label>
						<div class="col-xs-10" style="width:84%">
							<textarea rows="3" class="form-control" placeholder="Notes" name="txtNotes" id="notes" value="">{{ old('txtNotes') }}</textarea>
							
						</div>
					</div>
				</div>
			</div>
			<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
									<div class="col-xs-12 text-right">
										<button id="" class="btn btn-default" type="submit" onclick="return confirmAddUser()"><span class="glyphicon glyphicon-ok"  ></span> Submit</button>
									</div>							
						</div>
			</div>
		</div>
		</div><!-- //End row 1 for form -->
	</div><!-- //Panel Body -->
	</form>
	</div>	
	</div>
<!-- Logo Image-->
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#img')
        .attr('src', e.target.result)
        .width(100)
        .height(100);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

</script>
<script>
$('#myLogo').change(function() {
    var filename = $(this).val();
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
    $('#filelogo').val(filename);
    
});
</script>
<!-- Logo Image-->
<SCRIPT LANGUAGE="JavaScript">
    function confirmAddUser() {
      return confirm("Are you sure to submit the account?");
    };
</SCRIPT>
@endsection