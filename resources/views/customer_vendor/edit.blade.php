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
{{ Form::open(array('route'=>array('customer-vendor.update',$user['id']),'method'=>'PUT','files'=>true, 'class'=> 'form-horizontal')) }}
	<div class="panel panel-default content_middle">
		<div class="panel-body">
			<div class="row">
							<div class="col-xs-6">
								<div class="form-group ">
									<label class="col-xs-4 control-label" for="custom_objects">Customer ID</label>
									<div class="col-xs-8">
										<input type="text" class="width-50-per form-control input-sm" placeholder="Customer ID" name="txtCusID" id="" disabled="" value="{{$user['id']}}">
									</div>
								</div>
								<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Company</label>
									<div class="col-xs-8">
										<input type="text" class="width-50-per heigh-50-per form-control input-sm text-note-start" placeholder="Serenco" name="txtCompany" id="" value="{!! old('txtCompany',isset($user) ? $user['company'] : null) !!}">
										
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group {{ $errors->has('sltUserType') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">Customer Type</label>
									<div class="col-xs-8">
										<select id="select-account-type" name="sltUserType" class="width-90-per text-note-start form-control input-sm">
				                            <option value="0" selected>Select Customer Type</option>                        
				                            <?php editlist($userType,$user["user_type_id"]); ?>
                        				</select>
										<span class="text-error">*</span>
										 @if ($errors->has('sltUserType'))
										 <span class="help-block">
                                                    <strong>{{ $errors->first('sltUserType') }}</strong>    
                                         </span>
                                          @endif
									</div>
								</div>
							
								<div class="form-group {{ $errors->has('txtPassword') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">Password</label>
									<div class="col-xs-8">
										<input type="password" class="width-90-per form-control input-sm text-note-start" placeholder="*****" name="txtPassword" id="" value="">
										<input type="hidden" class="width-90-per form-control input-sm text-note-start" placeholder="*****" name="txtPass" id="" value="{{$user['password']}}">
										<span class="text-error">*</span>
										 @if ($errors->has('password'))
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
								<label style="width:16%" class="col-xs-4 control-label" for="jobdesc">Job Descriptions</label>
								<div class="col-xs-8" style="width:84%">
									<textarea type="text" class="form-control input-sm text-note-start" placeholder="Job Descriptions" name="txtJobDesc" id="jobdesc" value="">{!! old('txtJobDesc',isset($user) ? $user['job_descriptions'] : null) !!}</textarea>
									
								</div>
							</div>
				</div>
			</div>
		<div class="row">
			<div class="col-xs-6">
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Contact Name</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="" name="txtContactName" id="" value="{!! old('txtContactName',isset($user) ? $user['contact_name'] : null) !!}">
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Address</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="" name="txtAddress" id="" value="{!! old('txtAddress',isset($user) ? $user['address'] : null) !!}">
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">City</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="City" name="txtCity" id=""  value="{!! old('txtCity',isset($user) ? $user['city'] : null) !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Zip Code</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="Zip Code" name="txtZipCode" id="" value="{!! old('txtZipCode',isset($user) ? $user['zip_code'] : null) !!}">
								</div>
							</div>
							<div class="form-group {{ $errors->has('txtEmail') ? ' has-error' : '' }}">
								<label class="col-xs-4 control-label" for="custom_objects">Email</label>
								<div class="col-xs-8">
									<input type="email" class="width-90-per form-control input-sm text-note-start" placeholder="Email" name="txtEmail" id="" value="{!! old('txtEmail',isset($user) ? $user['email'] : null) !!}" >
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
									<input type="text" class="text-note-start form-control input-sm" placeholder="EIN" name="txtEIN" id="" value="{!! old('txtEIN',isset($user) ? $user['EIN'] : null) !!}">
								</div>
							</div>
			</div>
			<div class="col-xs-6">
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Phone</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="Phone" name="txtPhone" id="" value="{!! old('txtPhone',isset($user) ? $user['phone'] : null) !!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Fax</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="Fax" name="txtFax" id=""  value="{!! old('txtFax',isset($user) ? $user['fax'] : null) !!}">
								</div>
							</div>
																			
							<div class="form-group {{ $errors->has('sltState') ? ' has-error' : '' }}">
									<label class="col-xs-4 control-label" for="custom_objects">State</label>
									<div class="col-xs-8">
										<select id="select-account-type" name="sltState" class="width-90-per text-note-start form-control input-sm">
				                            <option value="" selected>Select State</option>                        
				                            <?php editlist($state, $user["state_id"]); ?>
                        				</select>
                        				<span class="text-error">*</span>
                        				 @if ($errors->has('sltState'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sltState') }}</strong>    
                                                </span>
                                     @endif
									</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Country</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="Country" name="txtCountry" id="" value="{!! old('txtCountry',isset($user) ? $user['country'] : null) !!}">
								</div>
							</div>							
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">Internet Address</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="Internet Address" name="txtIAddr" id="" value="{!! old('txtIAddr',isset($user) ? $user['IAddress'] : null) !!}">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects">ACL_ID Code</label>
								<div class="col-xs-8">
									<input type="text" class="text-note-start form-control input-sm" placeholder="ACL-ID Code" name="txtACL" id="" value="{!! old('txtACL',isset($user) ? $user['ACL_ID'] : null) !!}">
								</div>
							</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-4 control-label" for="custom_objects" style="width:16%">Logo</label>
								<div class="col-xs-8" style="width:84%">
								<input type="text" class="text-note-start form-control input-sm" name="txtOldLogo" value="{!! old('txtLogo',isset($user) ? $user['logo'] : null) !!}" readonly="readonly">
								<input type="hidden" class="text-note-start form-control input-sm" name="txtNewLogo" id="filelogo" value="" readonly="readonly">				
								<img id="blah" src="{!! URL::to('public/uploads/' . $user['logo']) !!}" alt="Your logo"  style="width:60px;height:60px;" />
								<input id="myLogo" onchage="getImage()" onchange="readURL(this);" type="file" name="fileLogo">
								@if ($errors->has('fileLogo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fileLogo') }}</strong>    
                                    </span>
                                @endif
								</div>
							</div>
							<hr />
							<div class="form-group">
								<label style="width:16%" class="col-xs-4 control-label" for="notes">Notes </label>
								<div class="col-xs-8" style="width:84%">
									<textarea type="text" class="form-control input-sm" placeholder="Notes" name="txtNotes" id="notes" value="">{!! old('txtNotes',isset($user) ? $user['notes'] : null) !!}</textarea>
									
								</div>
							</div>
			</div>
		</div>
		<div class="row">
					<div class="col-xs-12">
							<div class="form-group">
								<div class="row">
									<div class="col-xs-12 text-right">
										<button class="btn btn-default" type="submit" onclick="return confirmEdit()" ><span class="glyphicon glyphicon-ok"></span> Submit</button>
									</div>
								</div>
							</div>
					</div><!-- //End search form -->
		</div><!-- //End row 1 for form -->
		</div><!-- //Panel Body -->
	</div><!-- //Panel Form -->
{{ Form::close() }}<!-- //Container Form -->
</div>
</div><!-- //Row main -->
<!-- Logo Image-->
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah')
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
    function confirmEdit() {
      return confirm("Do you want to add or modify the account?");
    };
</SCRIPT>
@endsection