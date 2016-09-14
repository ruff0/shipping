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
            <form method="post" role="form" class="form-horizontal" id="" action="">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->`
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">System Track No.</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="System Track No." name="business_phone_company" id="business_phone_company">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Contact Name</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="Contact Name" name="business_phone_company" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Company</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="Company" name="business_phone_company" id="">
                            </div>
                        </div>
                    </div><!-- End col -->
                    <!-- Start col -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Customer Type</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="Customer Type" name="business_phone_company" id="business_phone_company">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">Phone #</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="Phone #" name="business_phone_company" id="business_phone_company">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_phone_company" class="col-xs-6 control-label">City</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="City" name="" id="">
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
                                <th>Contact Type</th>
                                <th>Company</th>
                                <th>Contact Name</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Contact Type</th>
                                <th>Company</th>
                                <th>Contact Name</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($user as $print)         
                            <tr >
                                <td><a href="{{route('customer-vendor.show',$print->ID)}}"> {!! $print->ID !!} </a></td>
                                <td>{!! $print->ContactType !!}</td>
                                <td>{!! $print->Company !!} </td>
                                <td>
                                {!! $print->ContactName!!}
                                </td> 
                                <td>
                                {!! $print->City!!}
                                </td>  
                                <td>
                                {!! $print->Phone!!}
                                </td>   
                                <td >
                                <form method="POST" action="{{route('customer-vendor.destroy',$print->ID)}}">      
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" value="{{ $print->ID }}">
                                <button class="btn btn-danger btn-xs" onclick="return confirmAction()" type="submit" id="delete" ><i class="fa fa-trash-o fa-fw"> </i> Delete</button>
                                </form>
                                </td>
                                <td ><a class="btn btn-default btn-xs" href="{!! route('customer-vendor.edit',$print->ID) !!}"><i class="fa fa-pencil fa-fw"></i> Edit</a></td>
                            </tr>                            
                            @endforeach 
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
@endsection