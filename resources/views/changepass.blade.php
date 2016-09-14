@extends('layouts.master')
@section('content')
<form class="form-horizontal" id="frmChangePass" name="frmChangePass" role="form" method="POST" action="{{route('postEditPass',Auth::user()->id)}}" enctype="multipart/form-data">
{!! csrf_field() !!}
    <div class="panel panel-default content_middle">
        <div class="panel-body">
            <div class="row">

                <div class="col-xs-6 center-block">
                    <fieldset class="fieldset-border margin-bottom-only">
                        <legend class="fieldset-border"> Change password</legend>                    
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="col-xs-4 control-label" for="custom_objects">Customer ID</label>
                                    <div class="col-xs-8">
                                        <input type="text" class="width-50-per form-control input-sm"  name="txtCusID" id="" disabled="" value="{!!Auth::user()->id !!}">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-xs-4 control-label" for="custom_objects">Company</label>
                                    <div class="col-xs-8">
                                        <input type="text" class="width-90-per form-control input-sm"  name="txtCompany" id="" disabled="" value="{!! Auth::user()->company !!}">
                                    </div>
                                </div> 
                                <input type="hidden" class="width-90-per form-control input-sm"  name="txtPassDB" id=""  value="{!! Auth::user()->password !!}" >
                                <div class="form-group">
                                    <label class="col-xs-4 control-label" for="custom_objects">Contact Name</label>
                                    <div class="col-xs-8">
                                        <input type="text" class="width-90-per form-control input-sm" placeholder="Your Contact Name" disabled="" name="txtContacName" id="" value="{!! Auth::user()->contact_name !!}" >
                                    </div>
                                </div>                               
                            <div class="form-group {{ $errors->has('txtPassOld') ? ' has-error' : '' }}">
                                <label class="col-xs-4 control-label" for="custom_objects">Old Password</label>
                                <div class="col-xs-8">
                                    <input type="password" class="width-90-per form-control input-sm text-note-start" placeholder="*********" name="txtPassOld" id="" value="">
                                    <span class="text-error">*</span>
                                      @if ($errors->has('txtPassOld'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('txtPassOld') }}</strong>    
                                                </span>
                                            @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('txtNewPassword') ? ' has-error' : '' }}">
                                <label class="col-xs-4 control-label" for="custom_objects">New Password</label>
                                <div class="col-xs-8">
                                    <input type="password" class="width-90-per form-control input-sm text-note-start " placeholder="*********" name="txtNewPassword" id="newpass" >
                                    <span class="text-error">*</span>
                                     @if ($errors->has('txtNewPassword'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('txtNewPassword') }}</strong>    
                                                </span>
                                            @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('txtConfirmPassword') ? ' has-error' : '' }}">
                                <label class="col-xs-4 control-label" for="custom_objects">Confirm New Password</label>
                                <div class="col-xs-8">
                                    <input type="password" class="width-90-per form-control input-sm text-note-start " placeholder="*********" name="txtConfirmPassword" id="connewpass" >
                                    <span class="text-error">*</span>
                                     @if ($errors->has('txtConfirmPassword'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('txtConfirmPassword') }}</strong>    
                                                </span>
                                    @endif
                                    <span id="alert-pass"></span>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-xs-12 text-right">
                                        <button id="create-user" class="btn btn-default btn-sm" onclick="return confirmSubmitBooking()" type="submit"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                                    </div> 
                                </div>
                            </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    </form>
<SCRIPT LANGUAGE="JavaScript">
    function confirmSubmitBooking() {
      return confirm("Do you modify the change password?");
    };
</SCRIPT>
<script>
$("form").onblur(function() {
  var _txt1 = $('#newpass').val();
  var _txt2 = $('#connewpass').val();
  
  if (_txt1 == _txt2)
  {
     alert('Password is Matched');
     return true;
  }
  else
  {
    alert('Password is not matched');
    return false;
  }
}); 
</script>
@endsection