@extends('layouts.master')
@section('content')

<div class="jquery-script-clear"></div>
<div class="container">
<div class="page-header">
<h2><span class="glyphicon glyphicon-cog"></span> Permission</h2>
</div>
{{ Form::open(array('route'=>array('permission.store'),'method'=>'POST', 'class'=> 'form-horizontal')) }}
{!! csrf_field() !!}
  <div class="panel-body">
    <div class="row">
    <div class="left-block col-xs-6">
    <div class="form-group {{ $errors->has('sltRole') ? ' has-error' : '' }}">
              <label class="col-xs-2 control-label" for="">User Role</label>
              <div class="col-xs-8">
                <select id="role" name="sltRole" class="form-control input-sm text-note-start" placeholder="">                     
                          
                                        <?php perlist($role); ?>
                </select>
                <span class="text-error">*</span>
                      @if ($errors->has('sltRole'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sltRole') }}</strong>    
                        </span>
                      @endif
              </div>
            </div>
          </div>
    </div>
    <br>
    <br>
      <div class="row">
              <div class="col-xs-3">
                <select name="from" id="undo_redo" class="form-control" size="8" multiple="multiple">        
                               <?php gridlist($per); ?>
                </select>
              </div>
              
              <div class="col-xs-2">

                <button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-backward"></i></button>
              </div>
              
              <div class="col-xs-3">
                <select name="gridPer[]" id="undo_redo_to" class="form-control" size="8" multiple="multiple">    
                                      
                </select>
              </div>
      </div>
      <br>
      <div class="row">
      <div class="form-group">
          <div class="col-xs-12 text-center">
           
            <button id="btnSubmit" type="submit" onclick="return confirmSubmitPer()" class="btn btn-danger btn-sm">Submit</button>
          </div>
        </div>
      </div>
  </div>
{{ Form::close() }}
</div>

<script type="text/javascript" src="{{url('public/shippingtemplate/js/multiselect.js')}}"></script>

<script type="text/javascript" src="{{url('public/shippingtemplate/js/boostrap.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#undo_redo').multiselect();
  });
  
  </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- Load permission-->
<script type="text/javascript">

function delteByValue(a,obj){

  for(var k in obj)
    if (obj[k] == a){
      delete obj[k];
    }
}
function loadPer(t)
{  var perObject = {"1": "View", "2": "Add", "3":"Edit", "4":"Delete", "5":"Approve"};
    //base_url = 'http://shipping.americancontainerline.com/'
    base_url = 'http://localhost/shipping/'
      jQuery.ajax({
      url: base_url+"getdata_permission.php?x="+t,
      type: "GET",
      ContentType: "application/json",
      datatype: "json",
      success:function(data){      
        var str=data;        
        var n = '['+str.slice(0,str.lastIndexOf(','))+']';
        var select=$.parseJSON(n); 
        // alert (JSON.stringify(select));
          $.each(select, function(key, value) { 
            var a=value.name;
            delteByValue(a,perObject);

            });
         //alert (JSON.stringify(perObject));
            $('#undo_redo')[0].options.length = 0;            
                 $.each(perObject, function(key, value) {   
                    $('#undo_redo')
                   .append($("<option></option>")
                   .attr("value",key)
                   .text(value)); 
                  });         
            $('#undo_redo_to')[0].options.length = 0;
            //$('#undo_redo')[0].options.length = 0;
               $.each(select, function(key, value) {   
                    $('#undo_redo_to')
                   .append($("<option></option>")
                   .attr("value",value.per_id)
                   .text(value.name)); 
                  });                                                               
            //});
          },
      error:function (){}
      });
}
$(document).ready(function(){
        loadPer(1);
        $("#role").change(function () {
          var a = $("#role").val();
          if(a == 2)
          {
            loadPer(2);
          }
          else if(a == 3)
          {
            loadPer(3);
          }
          else
          {   
            loadPer(1); 
          }
          });
       });
</script>
<SCRIPT LANGUAGE="JavaScript">
    function confirmSubmitPer() {
      return confirm("Are you sure to submit the Permission?");
    };
</SCRIPT>

@endsection