@extends('layouts.master')
@section('content')
    <!-- Title -->
    <div class="header-page margin-top-only margin-bottom-only">
        <h3>
            <div class="pvcombank-title-circle">
                <div class="pvcombank-title-circle-inner"><i class="fa fa-info fa-lg"></i></div>
            </div>
            CUSTOMER / VENDOR
        </h3>
    </div><!-- // End Title -->
    <!-- Start main content -->
    <div class="panel panel-default content_middle">
        <div class="panel-body">
            <form method="get" role="form" class="form-horizontal" id="frmSearch" action="{{URL::action('CustomerVendorController@search')}}">
            {!! csrf_field() !!}
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">System Track No.</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="System Track No." name="txtID" id="business_phone_company" value="<?php if (isset($_GET['txtID'])) echo $_GET['txtID']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Contact Name</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="Contact Name" name="txtContactName" id="" value="<?php if (isset($_GET['txtContactName'])) echo $_GET['txtContactName']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Company</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="Company" name="txtCompany" id="" value="<?php if (isset($_GET['txtCompany'])) echo $_GET['txtCompany']; ?>">
                            </div>
                        </div>
                    </div><!-- End col -->
                    <!-- Start col -->
                    <div class="col-xs-6">
                        @if(Auth::user()->role_id == 1)
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Customer Type</label>
                            <div class="col-xs-6">
                                <select id="custype" name="sltCusType" class="width-90-per text-note-start form-control input-sm" value="">
                                            <option value="" selected>Select Customer Type</option>                        
                                            <?php droplist($userType); ?>
                                </select>
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Customer Type</label>
                            <div class="col-xs-6">
                                <select id="custype" name="sltCusType" class="width-90-per text-note-start form-control input-sm" value="">
                                            <option value="" selected>Select Customer Type</option>
                                            <option value="11">Customer</option>                                                               
                                        </select>
                            </div>
                        </div>
                        <input type="hidden" name="txtCreated" value="">
                        @endif
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Phone #</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="Phone #" name="txtPhone" id="business_phone_company" value="<?php if (isset($_GET['txtPhone'])) echo $_GET['txtPhone']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">City</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="City" name="txtCity" id="" value="<?php if (isset($_GET['txtCity'])) echo $_GET['txtCity']; ?>">
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
            <div class="row">
                <div class="col-xs-12">
                    <table id="mana-customer-vendor" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Type</th>
                                <th>Company</th>
                                <th>Contact Name</th>
                                <th>City</th>
                                <th>Phone</th>
                                @if (Auth::user()->user_type_id != 1 )
                                <th>Delete</th>
                                <th>Edit</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Customer Type</th>
                                <th>Company</th>
                                <th>Contact Name</th>
                                <th>City</th>
                                <th>Phone</th>
                                @if (Auth::user()->user_type_id != 1 )
                                <th>Delete</th>
                                <th>Edit</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                        @if(Auth::user()->role_id == 2)
                            @foreach($resultAgent as $print)
                            <tr >
                                <td><a href="{{route('customer-vendor.show',$print->id)}}"> {!! $print->id !!} </a></td>
                                <td>{!! $print->name !!}</td>
                                <td>{!! $print->company!!} </td>
                                <td>
                                {!! $print->contact_name!!}
                                </td> 
                                <td>
                                {!! $print->city!!}
                                </td>  
                                <td>
                                {!! $print->phone!!}
                                </td>   
                                <td >
                                
                                <form method="POST" action="{{route('customer-vendor.destroy',$print->id)}}">      
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" value="{{ $print->id }}">

                                <button class="btn btn-danger btn-xs" onclick="return confirmAction()" type="submit" id="delete" ><i class="fa fa-trash-o fa-fw"> </i> Delete</button>
                                </form>
                                </td>
                                <td ><a class="btn btn-default btn-xs" href="{!! route('customer-vendor.edit',$print->id) !!}"><i class="fa fa-pencil fa-fw"></i> Edit</a></td>
                            </tr>                            
                            @endforeach 
                        @elseif(Auth::user()->role_id == 1 )          
                            @foreach($result as $print)
                            <tr >
                                <td><a href="{{route('customer-vendor.show',$print->id)}}"> {!! $print->id !!} </a></td>
                                <td>{!! $print->name !!}</td>
                                <td>{!! $print->company!!} </td>
                                <td>
                                {!! $print->contact_name!!}
                                </td> 
                                <td>
                                {!! $print->city!!}
                                </td>  
                                <td>
                                {!! $print->phone!!}
                                </td>   
                                <td >
                                
                                <form method="POST" action="{{route('customer-vendor.destroy',$print->id)}}">      
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" value="{{ $print->id }}">

                                <button class="btn btn-danger btn-xs" onclick="return confirmAction()" type="submit" id="delete" ><i class="fa fa-trash-o fa-fw"> </i> Delete</button>
                                </form>
                                </td>
                                <td ><a class="btn btn-default btn-xs" href="{!! route('customer-vendor.edit',$print->id) !!}"><i class="fa fa-pencil fa-fw"></i> Edit</a></td>
                            </tr>                            
                            @endforeach
                        @endif
                            
                        </tbody>
                    </table>
                </div>
            </div><!-- //Row -->
            <!-- //Content table List -->
        </div>
    </div><!-- //Start main content -->
    

<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Are you sure?");
    };
    $(document).ready(function() {
        $('#mana-customer-vendor').DataTable();
    } );
</SCRIPT>

<script type="text/javascript">
  document.getElementById('custype').value = "<?php if (isset($_GET['sltCusType'])) echo $_GET['sltCusType']; ?>";
</script>
@endsection