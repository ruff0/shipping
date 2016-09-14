@extends('layouts.master')
@section('content')
	<!-- Content main -->
	<!-- Title -->

	<div class="header-page margin-top-only margin-bottom-only">
		<h3>
			<div class="pvcombank-title-circle">
				<div class="pvcombank-title-circle-inner"><i class="fa fa-info fa-lg"></i></div>
			</div>
			FCL BOOKING ORDER

		</h3>
	</div><!-- // End Title -->
	<!-- Container -->
	<div class="panel panel-default content_middle">
		<div class="panel-body">
			<div class="row">			
				<div class="col-xs-12">					
						<div>
						
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist" id="oder-tab">
								<li role="presentation" class="active"><a href="#fcl-booking-order" aria-controls="fcl-booking-order" role="tab" data-toggle="tab">FCL BOOKING ORDER</a></li>
								<li role="presentation"><a  href="#bill-off-lading" aria-controls="bill-off-lading" role="tab" data-toggle="tab">BILL OF LADING</a></li>
								<li role="presentation"><a  href="#shipper-export-dec" aria-controls="shipper-export-dec" role="tab" data-toggle="tab">SHIPPER 'S EXPORT DECLARATION</a></li>
								<li role="presentation"><a  href="#arrival-not-inv" aria-controls="arrival-not-inv" role="tab" data-toggle="tab">ARRIVAL NOTICE/INVOICE</a></li>
							</ul>
							{{ Form::open(array('route'=>array('bookEdit',$book->id),'method'=>'PUT', 'class'=> 'form-horizontal'), 'id' => 'eform') }}
							{!! csrf_field() !!}
							<!-- Tab panes -->
							<div class="tab-content">								
								<!-- Tab FCL BOOKING ORDER -->
							<div role="tabpanel" class="tab-pane active" id="fcl-booking-order">
									<!-- Start row -->															
									<!--<input type="hidden" name="txtBookID" value="{!! old('txtBookID',isset($book) ? $book->id : null) !!}">
									-->
									<div class="row">
									
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group {{ $errors->has('txtBookingID') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">BOOKING #</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtBookingID" placeholder="BOOKING #" class="form-control input-sm" 
													value="{!! old('txtBookingID',isset($editbook) ? $editbook->booking_no : null) !!}" readonly="">
													 @if ($errors->has('txtBookingID'))
	                                                <span class="help-block">
	                                                    <strong>{{ $errors->first('txtBookingID') }}</strong>    
	                                                </span>
                                            		@endif
												</div>
												<!--<input type="hidden" id="" name="txtBookid" placeholder="" class="form-control input-sm" value="{{old('txtBookid',isset($book) ? $book->id: null) }}" readonly="readonly"> -->
											</div>
											<div class="form-group {{ $errors->has('txtLogNo') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">LOG NO.</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtLogNo" placeholder="LOG NO." class="form-control input-sm" 
													value="{{ old('txtLogNo',isset($editbook) ? $editbook->log_no: logRandomString(6)) }}" readonly="readonly">
												</div>
											</div>
											<div class="form-group {{ $errors->has('txtToday') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">TODAY</label>
												<div class="col-xs-5">
													<input type="text" id="datepicker-today" name="txtToday" placeholder="MM/DD/YY" class="form-control input-sm datepicker" 
													value="{!! old('txtToday',isset($editbook) ? date_format(date_create($editbook->today),"m/d/Y") : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">B/L NO.</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtBLNo" placeholder="B/L NO." class="form-control input-sm" 
													value="{{ old('txtBLNo',isset($editbook) ? $editbook->BL_no: billRandomString(6)) }}" readonly="readonly">
												</div>
											</div>
											<div class="form-group {{ $errors->has('txtExportRef') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">EXPORT REFERENCES M-B/L NO.</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtExportNo" placeholder="EXPORT REFERENCES M-B/L NO." class="form-control input-sm" 
													value="{!! old('txtExportNo',isset($editbook) ? $editbook->export_no : null) !!}">
													@if ($errors->has('txtExportNo'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtExportNo') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">BOOKED BY</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtBookedBy" placeholder="BOOKED BY" class="form-control input-sm" 
													value="{!! old('txtBookedBy',isset($editbook) ? $editbook->bookedby : null) !!}">
												</div>
													@if ($errors->has('txtBookedBy'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtBookedBy') }}</strong>    
		                                                </span>
                                            		@endif
											</div>
										</div><!-- //End col -->
									</div><!-- Start row -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">
													SHIPPER <br/>
													<br/>
													<!-- Large modal -->
													<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#search-vendor-cus-pop-shipper" data-backdrop="static"><i class="fa fa-search"></i> Search</button>
												</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" rows="3" cols="100" placeholder="SHIPPER" name="txtShipper" id="shipper" value="" readonly="">{!! old('txtShipper',isset($editbook) ? $editbook->shipper : null) !!}</textarea>
													@if ($errors->has('txtShipper'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtShipper') }}</strong>    
		                                                </span>
                                            		@endif
                                            		<input type="hidden" name="txtShipperID" value="{!! old('txtShipper',isset($editbook) ? $editbook->shipper_id : null) !!}" id="shipperid">                                            	
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Start row -->
									<div class="row">
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PORT OF LOAD CARGO ORIGIN</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtPortLoadCargo" placeholder="" class="form-control input-sm" 
													value="{!! old('txtPortLoadCargo',isset($editbook) ? $editbook->port_cargo : null) !!}">
													@if ($errors->has('txtPortLoadCargo'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtPortLoadCargo') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">CARRIER</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtCarrier" placeholder="" class="form-control input-sm" 
													value="{!! old('txtCarrier',isset($editbook) ? $editbook->carrier : null) !!}">
													@if ($errors->has('txtShipper'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtShipper') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">VESSEL</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtVessel" placeholder="" class="form-control input-sm" 
													value="{!! old('txtVessel',isset($editbook) ? $editbook->vessel : null) !!}">
													@if ($errors->has('txtVessel'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtVessel') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">RAIL CUT OFF</label>
												<div class="col-xs-5">
													<input type="text" id="datepicker-rail" name="txtRailCut" placeholder="MM/DD/YY" class="form-control input-sm datepicker" 
													value="{!! old('txtRailCut',isset($editbook) ? date_format(date_create($editbook->rail_cut_off),"m/d/Y") : null) !!}">
													@if ($errors->has('txtRailCut'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtRailCut') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PORT CUT OFF</label>
												<div class="col-xs-5">
													<input type="text" id="datepicker-port" name="txtPortCut" placeholder="MM/DD/YY" class="form-control input-sm datepicker" 
													value="{!! old('txtPortCut',isset($editbook) ? date_format(date_create($editbook->port_cut_off),"m/d/Y") : null) !!}">
													@if ($errors->has('txtPortCut'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtPortCut') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">EMPTY EQUIP P/U AT</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtEmptyEquip" placeholder="EMPTY EQUIP P/U AT" class="form-control input-sm" 
													value="{!! old('txtEmptyEquip',isset($editbook) ? $editbook->empty_equip_pu_at : null) !!}">
													@if ($errors->has('txtEmptyEquip'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtEmptyEquip') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PORT DISCHARGE</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtPortDischarge" placeholder="PORT DISCHARGE" class="form-control input-sm" 
													value="{!! old('txtPortDischarge',isset($editbook) ? $editbook->port_discharge : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">FINAL DEST</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtFinalDest" placeholder="FINAL DEST" class="form-control input-sm" value="{!! old('txtFinalDest',isset($editbook) ? $editbook->final_dest : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">VOYAGE</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtVoyage" placeholder="VOYAGE" class="form-control input-sm" value="{!! old('txtVoyage',isset($editbook) ? $editbook->voyage : null) !!}">
													@if ($errors->has('txtVoyage'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtVoyage') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">ETD</label>
												<div class="col-xs-5">
													<input type="text" id="datepicker-ETD" name="txtETD" placeholder="MM/DD/YY" class="form-control input-sm datepicker" value="{!! old('txtETD',isset($editbook) ? date_format(date_create($editbook->ETD),"m/d/Y") : null) !!}">
													@if ($errors->has('txtETD'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtETD') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">ETA</label>
												<div class="col-xs-5">
													<input type="text" id="datepicker-ETA" name="txtETA" placeholder="MM/DD/YY" class="form-control input-sm datepicker" value="{!! old('txtETA',isset($editbook) ? date_format(date_create($editbook->ETA),"m/d/Y") : null) !!}">
													@if ($errors->has('txtETA'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtETA') }}</strong>    
		                                                </span>
                                            		@endif
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">FULL LOAD RETURN TO</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtFullLoadReturn" placeholder="FULL LOAD RETURN TO" class="form-control input-sm" value="{!! old('txtFullLoadReturn',isset($editbook) ? $editbook->full_load_return_to : null) !!}">
													@if ($errors->has('txtFullLoadReturn'))
		                                                <span class="help-block">
		                                                    <strong>{{ $errors->first('txtFullLoadReturn') }}</strong>    
		                                                </span>
                                            @endif
												</div>
											</div>
										</div><!-- //End col -->
									</div><!-- //End row -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">
													TRUCKING COMPANY <br/><br/>
													<!-- Large modal -->
													<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#search-vendor-cus-pop-truck" data-backdrop="static"><i class="fa fa-search"></i> Search</button>
												</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" rows="3" placeholder="TRUCKING COMPANY" name="txtTrucking" id="truck" readonly="">{!! old('txtTrucking',isset($editbook) ? $editbook->trucking_company : null) !!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">
													LOADING ADDRESS <br/>											
													
												</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" rows="3" placeholder="LOADING ADDRESS" name="txtLoadingAddress" id="load">{!! old('txtLoadingAddress',isset($editbook) ? $editbook->loading_address : null) !!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Start row -->
									<div class="row">
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">NUMBER OF CONTAINER</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtNumberContainer" placeholder="NUMBER OF CONTAINER" class="form-control input-sm" value="{!! old('txtNumberContainer',isset($editbook) ? $editbook->number_container : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">COMMODITIES</label>
												<div class="col-xs-5">
													<input type="text" id="business_phone_company" name="txtCommodities" placeholder="COMMODITIES" class="form-control input-sm" 
													value="{!! old('txtCommodities',isset($editbook) ? $editbook->commodities : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
										
									</div><!-- //End row -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">REMARK</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" name="txtRemark" rows="3" placeholder="REMARK">{!! old('txtRemark',isset($editbook) ? $editbook->remark : null) !!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row Button -->
									<hr>																
								
							</div><!-- //Tab FCL BOOKING ORDER -->							
								<!-- BILL OF LADING -->
							<div role="tabpanel" class="tab-pane" id="bill-off-lading">
									<!-- Row textarea -->																
									<div class="row">
										<div class="col-xs-12">										
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">
													CONSIGNEE <br/>
													(complete name and address)
													<br/><br/>
													<!-- Large modal -->
													<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#search-vendor-cus-pop-consignee" data-backdrop="static"><i class="fa fa-search"></i> Search</button>
												</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" rows="3" placeholder="CONSIGNEE" name="txtConsignee" id="consignee" readonly="">{!!old('txtConsignee',isset($editbook) ? $editbook->consignee : null)!!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">FOR DELIVERY PLEASE PRESENT TO</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" rows="3" placeholder="FOR DELIVERY PLEASE PRESENT TO" name="txtDelivery">{!! old('txtDelivery',isset($editbook) ? $editbook->delivery : null) !!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Start Row CARRIER 'S RECEIPT -->
									<div class="row">
										<div class="col-xs-12">
											<fieldset class="fieldset-border margin-bottom-only">
												<legend class="fieldset-border"> CARRIER 'S RECEIPT</legend>
												<div class="row">
													<!-- Start col -->
													<div class="col-xs-6">
														<div class="form-group">
															<label class="col-xs-7 control-label" for="business_phone_company">CONTAINER NO./ SEAL NO.</label>
															<div class="col-xs-5">
																<input type="text" id="" name="txtNumberContainerinerNo" placeholder="CONTAINER NO./ SEAL NO." class="form-control input-sm" value="{!! old('txtNumberContainerinerNo',isset($editbook) ? $editbook->containerno : null) !!}">
															</div>
														</div>
													</div><!-- //End col -->
													<!-- Start col -->
													<div class="col-xs-6">
														<div class="form-group">
															<label class="col-xs-7 control-label" for="business_phone_company">NO. OF PACKAGES</label>
															<div class="col-xs-5">
																<input type="text" id="" name="txtNoPackage" placeholder="NO. OF PACKAGES" class="form-control input-sm" value="{!! old('txtNoPackage',isset($editbook) ? $editbook->package_no : null) !!}">
															</div>
														</div>
													</div><!-- //End col -->
												</div>
											</fieldset>
										</div>
									</div><!-- //End Row CARRIER 'S RECEIPT-->
									<!-- Start Row PARTICULARS FURNISHED BY - CARRIER NOT RESPONSIBLE -->
									<div class="row">
										<div class="col-xs-12">
											<fieldset class="fieldset-border margin-bottom-only ">
												<legend class="fieldset-border"> PARTICULARS FURNISHED BY - CARRIER NOT RESPONSIBLE</legend>
												<!-- Row textarea -->
												<div class="row">
													<div class="col-xs-12">
														<div class="form-group">
															<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">KIND OF PACKAGES, DESCRIPTION OF GOODS</label>
															<div class="col-xs-9" style="width: 72%">
																<textarea class="form-control" rows="3" placeholder="KIND OF PACKAGES, DESCRIPTION OF GOODS" name="txtKindPackage">{!! old('txtKindPackage',isset($editbook) ? $editbook->kind_package_no : null) !!}</textarea>
															</div>
														</div>
													</div>
												</div><!-- //Row textarea -->
												<!-- Start Row -->
												<div class="row">
													<!-- Start col -->
													<div class="col-xs-6">
														<div class="form-group">
															<label class="col-xs-7 control-label" for="business_phone_company">GROSS WEIGHT</label>
															<div class="col-xs-5">
																<input type="text" id="" name="txtGross" placeholder="GROSS WEIGHT" class="form-control input-sm" value="{!! old('txtGross',isset($editbook) ? $editbook->gross_weight : null) !!}">
															</div>
														</div>
													</div><!-- //End col -->
													<!-- Start col -->
													<div class="col-xs-6">
														<div class="form-group">
															<label class="col-xs-7 control-label" for="business_phone_company">MEASUREMENT</label>
															<div class="col-xs-5">
																<input type="text" id="" name="txtMeasurement" placeholder="MEASUREMENT" class="form-control input-sm" value="{!! old('txtMeasurement',isset($editbook) ? $editbook->measurement : null) !!}">
															</div>
														</div>
													</div><!-- //End col -->
												</div><!-- //Start Row -->
											</fieldset>
										</div>
									</div><!-- //End Row PARTICULARS FURNISHED BY - CARRIER NOT RESPONSIBLE-->
									<!-- Start Row -->
									<div class="row">
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">NUMBER OF ORIGINAL B (s)/L</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtNumberOriginal" placeholder="NUMBER OF ORIGINAL B (s)/L" class="form-control input-sm" value="{!! old('txtNumberOriginal',isset($editbook) ? $editbook->number_original : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PLACE OF ISSUE</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtPlaceIssue" placeholder="PLACE OF ISSUE" class="form-control input-sm" value="{!! old('txtPlaceIssue',isset($editbook) ? $editbook->place_issue : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PLACE OF RECEIPT</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtPlaceReceipt" placeholder="PLACE OF RECEIPT" class="form-control input-sm" value="{!! old('txtPlaceReceipt',isset($editbook) ? $editbook->place_receipt : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">DATE LADEN ON BOARD</label>
												<div class="col-xs-5">
													<input type="text" id="datepicker-Laden" name="txtDateLaden" placeholder="MM/DD/YY" class="form-control input-sm datepicker" value="{!! old('txtDateLaden',isset($editbook) ? date_format(date_create($editbook->date_laden),"m/d/Y") : null) !!}">
												</div>
											</div>

										</div><!-- //End col -->
									</div><!-- //Start Row -->

									<!-- Row Button -->							
									<hr>
													
							</div><!-- //BILL OF LADING -->
								<!-- SHIPPER 'S EXPORT DECLARATION -->
							<div role="tabpanel" class="tab-pane" id="shipper-export-dec">
									<!-- Row textarea -->
								
									<div class="row">									
										<div class="col-xs-12">								
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">
													EXPORTER (Principle or Seller and address including ZIP Code)
													<br/>
													<!-- Large modal -->
													<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#search-vendor-cus-pop-exporter" data-backdrop="static"><i class="fa fa-search"></i> Search</button>
												</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" rows="3" name="txtExport" id="exporter" placeholder="EXPORTER (Principle or Seller and address including ZIP Code)" readonly="">{!! old('txtExport',isset($editbook) ? $editbook->exporter : null) !!}
													</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">EXPORT REFERENCES</label>
												<div class="col-xs-9" style="width: 72%">
													<textarea class="form-control" rows="3" name="txtExportRef" placeholder="EXPORT REFERENCES">{!! old('txtExportRef',isset($editbook) ? $editbook->export_ref : null) !!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 28%">METHOD OF TRANSPORTATION (Mark one)</label>
												<div class="col-xs-9" style="width: 72%">
													<label class="radio-inline">
														<input type="radio" name="txtMethodTrans" id="inlineRadio1" value="Vessel" <?php if ($editbook->method_trans == 'Vessel'): ?>checked='checked'<?php endif; ?> /> Vessel
													</label>
													<label class="radio-inline">
														<input type="radio" name="txtMethodTrans" id="inlineRadio2" value="Air" <?php if ($editbook->method_trans == 'Air'): ?>checked='checked'<?php endif; ?>/> Air
													</label>
													<label class="radio-inline">
														<input type="radio" name="txtMethodTrans" id="inlineRadio3" value="Other - Special" <?php if ($editbook->method_trans == 'Other - Special'): ?>checked='checked'<?php endif; ?> /> Other - Special
													</label>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Start Row -->
									<div class="row">
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">COUNTRY OF ULTIMATE DESTINATION</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtCountryDes" placeholder="COUNTRY OF ULTIMATE DESTINATION" class="form-control input-sm" value="{!! old('txtCountryDes',isset($editbook) ? $editbook->country_des : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PARTIES TO TRANSACTION</label>
												<div class="col-xs-5">
													<div class="checkbox">
														<label><input type="radio" name="txtPartiesTrans" id="inlineRadio1" value="Related" <?php if ($editbook->parties_trans == 'Related'): ?>checked='checked'<?php endif; ?>/>Related</label>
													</div>
													<div class="checkbox">
														<label><input type="radio" name="txtPartiesTrans" id="inlineRadio2" value="Non-Related" <?php if ($editbook->parties_trans == 'Non-Related'): ?>checked='checked'<?php endif; ?>/>Non-Related</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">EXPORTING CARRIER</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtExportCarrier" placeholder="EXPORTING CARRIER" class="form-control input-sm" value="{!! old('txtExportCarrier',isset($editbook) ? $editbook->export_carrier : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">CONTAINERIZED (Vessel only)</label>
												<div class="col-xs-5" style="width: 41%; padding-left: 15px;">
													<label class="radio-inline">
														<input type="radio" name="txtContainerized" id="inlineRadio1" value="Yes" <?php if ($editbook->containerized == 'Yes'): ?>checked='checked'<?php endif; ?>/> Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="txtContainerized" id="inlineRadio2" value="No" <?php if ($editbook->containerized == 'No'): ?>checked='checked'<?php endif; ?>/> No
													</label>
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">DATE OF EXPORTATION (Not required for vessel shipments)</label>
												<div class="col-xs-5">
													<input type="text" id="datepicker-Export" name="txtDateExport" placeholder="DATE OF EXPORTATION (Not required for vessel shipments)" class="form-control input-sm datepicker" value="{!! old('txtDateExport',isset($editbook) ? date_format(date_create($editbook->date_export),"m/d/Y") : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">DOMESTIC ROUTING / EXPORT INSTRUCTIONS</label>
												<div class="col-xs-5">
												<textarea class="form-control" rows="3" name="txtDomesticRouting" placeholder="DOMESTIC ROUTING" >{!! old('txtDomesticRouting',isset($editbook) ? $editbook->domestic_routing : null) !!}</textarea>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">TYPE OF MOVE</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtTypeMove" placeholder="TYPE OF MOVE" class="form-control input-sm" value="{!! old('txtTypeMove',isset($editbook) ? $editbook->type_move : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">VALUE</label>
												<div class="col-xs-5">
													<input type="text" id="" name="txtValue" placeholder="VALUE" class="form-control input-sm" value="{!! old('txtValue',isset($editbook) ? $editbook->value : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
									</div><!-- Start Row -->
									<!-- Row Button -->
									<hr>
																
							</div><!-- //SHIPPER 'S EXPORT DECLARATION -->
								<!-- ARRIVAL NOTICE/INVOICE -->
							<div role="tabpanel" class="tab-pane" id="arrival-not-inv">
									<!-- Start Row -->
									
									<div class="row">														
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">MODE</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtMode" placeholder="mode" class="form-control input-sm" value="{!! old('txtMode',isset($editbook) ? $editbook->mode : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CONTAINER NO.</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtContainerNo" placeholder="CONTAINER NO." class="form-control input-sm" value="{!! old('txtContainerNo',isset($editbook) ? $editbook->container_no : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">MASTER B/L</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtMasterBL" placeholder="MASTER B/L" class="form-control input-sm" value="{!! old('txtMasterBL',isset($editbook) ? $editbook->master_BL : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">HOUSE B/L</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtHouseBL" placeholder="HOUSE B/L" class="form-control input-sm" value="{!! old('txtHouseBL',isset($editbook) ? $editbook->House_BL : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">IT NO.</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtITNo" placeholder="IT NO." class="form-control input-sm" value="{!! old('txtITNo',isset($editbook) ? $editbook->IT_no : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">LAST FREE DATE</label>
												<div class="col-xs-7">
													<input type="text" id="datepicker-lastfree" name="txtLastFreeDate" placeholder="LAST FREE DATE" class="form-control input-sm" value="{!! old('txtLastFreeDate',isset($editbook) ? date_format(date_create($editbook->last_free_date),"m/d/Y") : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">P/U NO.</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtPUNo" placeholder="P/U NO." class="form-control input-sm" value="{!! old('txtPUNo',isset($editbook) ? $editbook->PU_no : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">SHIPPING LINE</label>
												<div class="col-xs-7">													
													<textarea type="text" id="" name="txtShippingLine" placeholder="SHIPPING LINE" class="form-control input-sm">{!! old('txtShippingLine',isset($editbook) ? $editbook->shipping_line : null) !!} </textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">AMS B/L</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtAMS" placeholder="AMS B/L" class="form-control input-sm" value="{!! old('txtAMS',isset($editbook) ? $editbook->AMS_BL : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">FINAL E.T.A</label>
												<div class="col-xs-7">
													<input type="text" id="" name="txtFinalETA" placeholder="FINAL E.T.A" class="form-control input-sm" value="{!! old('txtFinalETA',isset($editbook) ? $editbook->Final_ETA : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">DATE IT ISSUED</label>
												<div class="col-xs-7">
													<input type="text" id="datepicker-issued" name="txtDateIssued" placeholder="DATE IT ISSUED" class="form-control input-sm" value="{!! old('txtDateIssued',isset($editbook) ? date_format(date_create($editbook->date_it_issued),"m/d/Y") : null) !!}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">G.O DATE</label>
												<div class="col-xs-7">
													<input type="text" id="datepicker-GO" name="txtGODate" placeholder="G.O DATE" class="form-control input-sm" value="{!! old('txtGODate',isset($editbook) ? date_format(date_create($editbook->GO_date),"m/d/Y") : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
									</div><!-- //End Row -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 20%">
													CARGO LOCATION
													<br/><br/>
													<!-- Large modal -->
													<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#search-vendor-cus-pop-cargo" data-backdrop="static"><i class="fa fa-search"></i> Search</button>
												</label>
												<div class="col-xs-9" style="width: 80%">
													<textarea class="form-control" id="cargo" rows="3" name="txtCargoLocation" placeholder="CARGO LOCATION" readonly="">{!! old('txtCargoLocation',isset($editbook) ? $editbook->cargo_location : null) !!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 20%">
													REMIT PAYMENT TO
													<br/><br/>
													<!-- Large modal -->
													<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#search-vendor-cus-pop-remit" data-backdrop="static"><i class="fa fa-search"></i> Search</button>
												</label>
												<div class="col-xs-9" style="width: 80%">
													<textarea class="form-control" id="remit" name="txtRemitPayment" rows="3" placeholder="REMIT PAYMENT TO" readonly="">{!! old('txtRemitPayment',isset($editbook) ? $editbook->remit_payment : null) !!}</textarea>
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Start Row -->
									<div class="row">
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">FREIGHT COLLECT</label>
												<div class="col-xs-7">
													<input type="text" id="fre" name="txtFreightCollect" placeholder="FREIGHT COLLECT" class=" txtadd form-control input-sm" value="{!! old('txtFreightCollect',isset($editbook) ? $editbook->freight_collect : null) !!}" onblur="fixFloatFre()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">HANDLING FEE</label>
												<div class="col-xs-7">
													<input type="text" id="han" name="txtHandlingFee" placeholder="HANDLING FEE" class=" txtadd form-control input-sm" value="{!! old('txtHandlingFee',isset($editbook) ? $editbook->handling_fee : null) !!}" onblur="fixFloatHan()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">AMS FEE</label>
												<div class="col-xs-7">
													<input type="text" id="ams" name="txtAMSFee" placeholder="AMS FEE" class="txtadd form-control input-sm" value="{!! old('txtAMSFee',isset($editbook) ? $editbook->ams_fee : null) !!}" onblur="fixFloatAms()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">D.D.C</label>
												<div class="col-xs-7">
													<input type="text" id="ddc" name="txtDDC" placeholder="D.D.C" class="txtadd form-control input-sm" value="{!! old('txtDDC',isset($editbook) ? $editbook->ddc : null) !!}" onblur="fixFloatDdc()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">DEMURRAGE</label>
												<div class="col-xs-7">
													<input type="text" id="dem" name="txtDemurrage" placeholder="DEMURRAGE" class="txtadd form-control input-sm" value="{!! old('txtDemurrage',isset($editbook) ? $editbook->demurrage : null) !!}" onblur="fixFloatDem()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">INLAND FREIGHT</label>
												<div class="col-xs-7">
													<input type="text" id="inl" name="txtInlandFreight" placeholder="INLAND FREIGHT" class="txtadd form-control input-sm" value="{!! old('txtInlandFreight',isset($editbook) ? $editbook->inland_freight : null) !!}" onblur="fixFloatInl()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CUSTOM CLEARANCE</label>
												<div class="col-xs-7">
													<input type="text" id="cle" name="txtCustomClearance" placeholder="CUSTOM CLEARANCE" class="txtadd form-control input-sm" value="{!! old('txtCustomClearance',isset($editbook) ? $editbook->custom_clearance : null) !!}" onblur="fixFloatCle()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CUSTOM DUTY</label>
												<div class="col-xs-7">
													<input type="text" id="dut" name="txtCustomDuty" placeholder="CUSTOM DUTY" class="txtadd form-control input-sm" value="{!! old('txtCustomDuty',isset($editbook) ? $editbook->custom_duty : null) !!}" onblur="fixFloatDut()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CUSTOM BOND</label>
												<div class="col-xs-7">
													<input type="text" id="bon" name="txtCustomBond" placeholder="CUSTOM BOND" class="txtadd form-control input-sm" value="{!! old('txtCustomBond',isset($editbook) ? $editbook->custom_bond : null) !!}" onblur="fixFloatBon()">
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">EXAMINATION FEE</label>
												<div class="col-xs-7">
													<input type="text" id="exa" name="txtExamFee" placeholder="EXAMINATION FEE" class="txtadd form-control input-sm" value="{!! old('txtExamFee',isset($editbook) ? $editbook->examination_fee : null) !!}" onblur="fixFloatExa()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CFS IN & OUT CHARGES</label>
												<div class="col-xs-7">
													<input type="text" id="cfs" name="txtCFSCharges" placeholder="CFS IN & OUT CHARGES" class="txtadd form-control input-sm" value="{!! old('txtCFSCharges',isset($editbook) ? $editbook->cfs_charges : null) !!}" onblur="fixFloatCfs()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">T.H.C FEE</label>
												<div class="col-xs-7">
													<input type="text" id="thc" name="txtTHCFee" placeholder="T.H.C FEE" class="txtadd form-control input-sm" value="{!! old('txtTHCFee',isset($editbook) ? $editbook->thc_fee : null) !!}" onblur="fixFloatThc()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">ORIGIN CUSTOME CHARGES</label>
												<div class="col-xs-7">
													<input type="text" id="ori" name="txtOriginCharges" placeholder="ORIGIN CUSTOME CHARGES" class="txtadd form-control input-sm" value="{!! old('txtOriginCharges',isset($editbook) ? $editbook->origin_charges : null) !!}" onblur="fixFloatOri()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CHASSIS CHARGES</label>
												<div class="col-xs-7">
													<input type="text" id="cha" name="txtChassisCharges" placeholder="CHASSIS CHARGES" class="txtadd form-control input-sm" value="{!! old('txtChassisCharges',isset($editbook) ? $editbook->chassis_charges : null) !!}" onblur="fixFloatCha()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">PIER PASS CHARGES</label>
												<div class="col-xs-7">
													<input type="text" id="pie" name="txtPierPassCharges" placeholder="PIER PASS CHARGES" class="txtadd form-control input-sm" value="{!! old('txtPierPassCharges',isset($editbook) ? $editbook->pier_pass_charges : null) !!}" onblur="fixFloatPie()" >
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">I.T ENTRY CHARGES</label>
												<div class="col-xs-7">
													<input type="text" id="ite" name="txtITEntryCharges" placeholder="I.T ENTRY CHARGES" class="txtadd form-control input-sm" value="{!! old('txtITEntryCharges',isset($editbook) ? $editbook->IT_entry_charges : null) !!}" onblur="fixFloatIte()">
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">AMOUNT DUE ($USD)</label>
												<div class="col-xs-7">
													<input type="text" id="total" name="txtAmountDue" placeholder="" class="form-control input-sm" readonly="" value="{!! old('txtAmountDue',isset($editbook) ? $editbook->amount_due : null) !!}">
												</div>
											</div>
										</div><!-- //End col -->
									</div><!-- //End Row -->
									<!-- Row textarea -->
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label class="col-xs-3 control-label" for="business_phone_company"  style="width: 20%">PREPARE BY</label>
												<div class="col-xs-9" style="width: 80%">
													<input type="text" name="txtPrepareBy" placeholder="PREPARE BY" class="form-control input-sm" value="{!! old('txtPrepareBy',isset($editbook) ? $editbook->prepare_by : null) !!}">
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row Button -->
									<hr>
									<div class="row">
										<div class="col-xs-12 text-right">
											<div class="form-group">												
												<input class="btn btn-danger" onclick="return confirmEditBooking()" type="submit" name="submit" value="Submit">
											</div>
										</div>
									</div><!-- //Row Button -->
									
							</div><!-- ARRIVAL NOTICE/INVOICE -->
								<div class="row">
										<div class="col-xs-12 text-right">
											<div class="form-group">
												<input class="btn btn-default fa fa-floppy-o" type="submit" name="save" value="Save as Draft">											
											</div>
										</div>
								</div>
							</div>
							{{ Form::close() }}
						</div>					
				</div>
				<div class="col-xs-12 text-center">
				<button class="btn btn-danger btnPrevious"><i class="fa fa-long-arrow-left"></i> Previous</button>					
				<button class="btn btn-danger btnNext" type='submit'>Next <i class="fa fa-long-arrow-right"></i></button>

				</div>
			</div><!-- //End row -->

		</div>
	</div>
	<!-- Modal shipper-->
	<div class="modal fade" id="search-vendor-cus-pop-shipper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Seach Customer/ Vendor</h4>
				</div>	
					<div class="modal-body">

						<!-- Start panel -->
						<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
									<div class="col-xs-12">
										<table id="table-shipper" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>ID</th>
									                <th>Customer Type</th>
									                <th>Company</th>
									                <th>Contact Name</th>
									                <th>City</th>
									                <th>Phone</th>
									                <th>Select</th>

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
									                <th>Select</th>

									            </tr>
									        </tfoot>
									        <tbody>
									        
									           @foreach($users as $print)         
									            <tr >
									                <td>{!! $print->ID !!} </td>
									                <td>{!! $print->CusType !!}</td>
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
									               <td>
									                <input type="radio" name="select_shipper" value="User ID: {!! $print->ID!!} &#10;Contact Name: {!! $print->ContactName !!} &#10;Address: {!! $print->Address !!}  &#10;Company:{!! $print->Company !!}  &#10;City: {!! $print->City!!} &#10;State: {!! $print->State!!} &#10;Zip Code: {!! $print->ZipCode!!}  &#10;Country:{!! $print->Country!!} &#10;Phone: {!! $print->Phone!!}  &#10;Fax:{!! $print->Fax!!} &#10;Email:{!! $print->Email!!}" id="myRadio">
									                </td>
									            </tr>                            
									            @endforeach  

									        </tbody>
									    </table>

								</div>
								</div>
							</div>
						</div><!-- //End panel -->
					</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" onclick ="saveShipper()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
				</div>
			</div>
		</div>
	</div><!-- //Modal -->
	<!-- //Container -->
	<!-- Modal truck-->
	<div class="modal fade" id="search-vendor-cus-pop-truck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Seach Customer/ Vendor</h4>
				</div>
				<form class="form-horizontal" method="POST" role="form"  id="" action="">
					<div class="modal-body">
						<!-- Start panel -->
						<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
									<div class="col-xs-12">
										<table id="table-truck" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>id</th>
									                <th>Company</th>
									                <th>Address</th>
									                <th>City</th>
									                <th>State</th>
									                <th>Zip Code</th>
									                <th>Country</th>
									                <th>Select</th>

									            </tr>
									        </thead>
									        <tfoot>
									            <tr>
									                <th>ID</th>
									                <th>Company</th>
									                <th>Address</th>
									                <th>City</th>
									                <th>State</th>
									                <th>Zip Code</th>
									                <th>Country</th>
									                <th>Select</th>

									            </tr>
									        </tfoot>
									        <tbody>
									        
									           @foreach($usertruck as $print)         
									            <tr >
									                <td>{!! $print->ID !!} </td>
									                <td>{!! $print->Company !!}</td>
									                <td>{!! $print->Address !!} </td>
									                <td>
									                    {!! $print->City!!}
									                </td> 
									                <td>{!! $print->State!!} </td>
									                <td>
									                    {!! $print->ZipCode!!}
									                </td>  
									                <td>
									                    {!! $print->Country!!}
									                </td>              
									                <td>
									                <input type="radio" name="select_truck" value="Company: {!! $print->Company !!} &#10;Address: {!! $print->Address !!} &#10;City: {!! $print->City!!} &#10;State: {!! $print->State!!} &#10;Zip Code: {!! $print->ZipCode!!} &#10;Country: {!! $print->Country!!} &#10;Phone: {!! $print->Phone!!} &#10;Fax: {!! $print->Fax!!} &#10;Email: {!! $print->Email!!}"  id="myRadio"> <br>
									                </td>
									            </tr>                            
									            @endforeach  

									        </tbody>
									    </table>

									</div>
									</div>
								</div>
						</div><!-- //End panel -->
					</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" onclick ="saveTruck()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
				</div>
			</form>
			<a id="docs" href="http://docs.jquery.com/Plugins/Validation" target="_blank">Validation Documentation</a>
			</div>
		</div>
	</div><!-- //Modal -->
	<!-- //Container -->
		<!-- //Container -->
	<!-- Modal consignee-->
	<div class="modal fade" id="search-vendor-cus-pop-consignee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Seach Customer/ Vendor</h4>
				</div>
				<form class="form-horizontal" method="POST" role="form"  id="" action="">
				{!! csrf_field() !!}
					<div class="modal-body">
						<!-- Start panel -->
						<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
									<div class="col-xs-12">
										<table id="table-consignee" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>ID</th>									             
									                <th>Company</th>
									                <th>Address</th>
									                <th>City</th>
									                <th>Country</th>
									                <th>Select</th>

									            </tr>
									        </thead>
									        <tfoot>
									            <tr>
									                <th>ID</th>									             
									                <th>Company</th>
									                <th>Address</th>
									                <th>City</th>
									                <th>Country</th>
									                <th>Select</th>

									            </tr>
									        </tfoot>
									        <tbody>
									        
									           @foreach($usercon as $print)         
									            <tr >
									                <td>{!! $print->id !!} </td>
									                <td>{!! $print->company !!}</td>
									                <td>{!! $print->address !!} </td>
									                <td>
									                    {!! $print->city!!}
									                </td> 
									                <td>
									                    {!! $print->country!!}
									                </td>  
									                            
									                <td>
									                <input type="radio" name="select_consignee" value="Company: {!! $print->company!!} &#10;Address:{!! $print->address !!} &#10;City:{!! $print->city !!} &#10;Country: {!! $print->country!!}" id="myRadio"> <br>
									                </td>
									            </tr>                            
									            @endforeach  

									        </tbody>
									    </table>

									</div>
									</div>
								</div>
						</div><!-- //End panel -->
					</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" onclick ="saveConsignee()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
				</div>
			</form>
			</div>
		</div>
	</div><!-- //Modal -->
	<!-- //Container -->

	<!-- Modal exporter-->
	<div class="modal fade" id="search-vendor-cus-pop-exporter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Seach Customer/ Vendor</h4>
				</div>
				<form class="form-horizontal" method="POST" role="form"  id="" action="">
				{!! csrf_field() !!} 
					<div class="modal-body">						
						<!-- Start panel -->
						<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
									<div class="col-xs-12">
										<table id="table-exporter" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>ID</th>
									                <th>Company</th>
									                <th>Address</th>							            
									                <th>City</th>
									                <th>State</th>
									                <th>Zipcode</th>
									                <th>Country</th>
									                <th>Phone</th>
									                <th>Fax</th>
									                <th>Select</th>
									            </tr>
									        </thead>
									        <tfoot>
									            <tr>
									                <th>ID</th>
									                <th>Company</th>
									                <th>Address</th>							            
									                <th>City</th>
									                <th>State</th>
									                <th>Zipcode</th>
									                <th>Country</th>
									                <th>Phone</th>
									                <th>Fax</th>
									                <th>Select</th>

									            </tr>
									        </tfoot>
									        <tbody>
									        
									           @foreach($userexporter as $print)         
									            <tr >
									                <td>{!! $print->ID !!} </td>
									                <td>{!! $print->Company !!}</td>
									                <td>{!! $print->Address !!} </td>
									                <td>
									                    {!! $print->City!!}
									                </td> 
									                <td>{!! $print->State!!} </td>
									                <td>
									                    {!! $print->ZipCode!!}
									                </td>  
									                <td>
									                    {!! $print->Country!!}
									                </td>
									                <td>
									                    {!! $print->Phone!!}
									                </td>  
									                <td>
									                    {!! $print->Fax!!}
									                </td>                
									                <td>
									                <input type="radio" name="select_exporter" value="Company:{!! $print->Company !!} &#10;Address: {!! $print->Address !!} &#10;City: {!! $print->City!!} &#10;State: {!! $print->State!!} &#10;Zip Code:{!! $print->ZipCode!!} &#10;Country:{!! $print->Country!!}  &#10;Tel:{!! $print->Phone!!}  &#10;Fax:{!! $print->Fax!!}" id="myRadio"> <br>
									                </td>
									            </tr>                            
									            @endforeach  

									        </tbody>
									    </table>

									</div>
									</div>
								</div>
						</div><!-- //End panel -->
					</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" onclick ="saveExporter()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
				</div>
			</form>
			</div>
		</div>
	</div><!-- //Modal -->
	<!-- Modal cargo-->
	<div class="modal fade" id="search-vendor-cus-pop-cargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Seach Customer/ Vendor</h4>
				</div>
				<form class="form-horizontal" method="POST" role="form"  id="" action="">
				{!! csrf_field() !!} 
					<div class="modal-body">
						<!-- Start panel -->
						<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
									<div class="col-xs-12">
										<table id="table-cargo" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>ID</th>
									                <th>Company</th>
									                <th>Address</th>							            
									                <th>City</th>
									                <th>State</th>
									                <th>Zipcode</th>
									                <th>Country</th>
									                <th>Phone</th>									          
									                <th>Select</th>
									            </tr>
									        </thead>
									        <tfoot>
									            <tr>
									                <th>ID</th>
									                <th>Company</th>
									                <th>Address</th>							            
									                <th>City</th>
									                <th>State</th>
									                <th>Zipcode</th>
									                <th>Country</th>
									                <th>Phone</th>									          
									                <th>Select</th>

									            </tr>
									        </tfoot>
									        <tbody>
									        
									           @foreach($usercargoremit as $print)         
									            <tr >
									                <td>{!! $print->ID !!} </td>
									                <td>{!! $print->Company !!}</td>
									                <td>{!! $print->Address !!} </td>
									                <td>
									                    {!! $print->City!!}
									                </td> 
									                <td>{!! $print->State!!} </td>
									                <td>
									                    {!! $print->ZipCode!!}
									                </td>  
									                <td>
									                    {!! $print->Country!!}
									                </td>
									                <td>
									                    {!! $print->Phone!!}
									                </td>  
									                             
									                <td>
									                <input type="radio" name="select_cargo" value="Company:{!! $print->Company !!} &#10;Address: {!! $print->Address !!} &#10;City: {!! $print->City!!} &#10;State: {!! $print->State!!} &#10;Zip Code:{!! $print->ZipCode!!} &#10;Country:{!! $print->Country!!}  &#10;Tel:{!! $print->Phone!!} " id="myRadio"> <br>
									                </td>
									            </tr>                            
									            @endforeach  


									        </tbody>
									    </table>

									</div>
									</div>
								</div>
						</div><!-- //End panel -->
					</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" onclick ="saveCargo()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
				</div>
			</form>
			</div>
		</div>
	</div><!-- //Modal -->

	<!-- Modal remit-->
	<div class="modal fade" id="search-vendor-cus-pop-remit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Seach Customer/ Vendor</h4>
				</div>
						<!-- Start panel -->
						<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
									<div class="col-xs-12">
										<table id="table-remit" class="table-hover table table-striped table-bordered" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>ID</th>
									                <th>Company</th>
									                <th>Address</th>							            
									                <th>City</th>
									                <th>State</th>
									                <th>Zipcode</th>
									                <th>Country</th>
									                <th>Phone</th>									          
									                <th>Select</th>
									            </tr>
									        </thead>
									        <tfoot>
									            <tr>
									                <th>ID</th>
									                <th>Company</th>
									                <th>Address</th>							            
									                <th>City</th>
									                <th>State</th>
									                <th>Zipcode</th>
									                <th>Country</th>
									                <th>Phone</th>									          
									                <th>Select</th>

									            </tr>
									        </tfoot>
									        <tbody>
									        
									           @foreach($usercargoremit as $print)         
									            <tr >
									                <td>{!! $print->ID !!} </td>
									                <td>{!! $print->Company !!}</td>
									                <td>{!! $print->Address !!} </td>
									                <td>
									                    {!! $print->City!!}
									                </td> 
									                <td>{!! $print->State!!} </td>
									                <td>
									                    {!! $print->ZipCode!!}
									                </td>  
									                <td>
									                    {!! $print->Country!!}
									                </td>
									                <td>
									                    {!! $print->Phone!!}
									                </td>  
									                             
									                <td>
									                <input type="radio" name="select_remit" value="Company:{!! $print->Company !!} &#10;Address: {!! $print->Address !!} &#10;City: {!! $print->City!!} &#10;State: {!! $print->State!!} &#10;Zip Code:{!! $print->ZipCode!!} &#10;Country:{!! $print->Country!!}  &#10;Tel:{!! $print->Phone!!} " id="myRadio"> <br>
									                </td>
									            </tr>                            
									            @endforeach 

									        </tbody>
									    </table>

									</div>
									</div>
								</div>
						</div><!-- //End panel -->					
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" onclick ="saveRemit()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
				</div>					
			</div>
			</div>
	</div><!-- //Modal -->

<script>
function saveShipper() {

    var theSrc = document.getElementById("shipper").innerHTML = $('input[name="select_shipper"]:checked').val();
	var str=$("#shipper").val();
	var substr=str.substring(str.indexOf('ID:')+4,str.indexOf('Contact')-2);
	$("#shipperid").val(substr);
	alert(theSrc);
}
function saveTruck() {
	var theSrc = document.getElementById("truck").innerHTML = $('input[name="select_truck"]:checked').val();
	alert(theSrc);
}
function saveConsignee() {
	var theSrc = document.getElementById("consignee").innerHTML = $('input[name="select_consignee"]:checked').val();
	alert(theSrc);
}
function saveExporter()	 {
	var theSrc = document.getElementById("exporter").innerHTML = $('input[name="select_exporter"]:checked').val();
	alert(theSrc);
}
function saveCargo()	{
	var theSrc = document.getElementById("cargo").innerHTML = $('input[name="select_cargo"]:checked').val();
	alert(theSrc);
}
function saveRemit() {
	var theSrc = document.getElementById("remit").innerHTML = $('input[name="select_remit"]:checked').val();
	alert(theSrc);
}

	$(document).ready(function(){
		$( "#datepicker-today" ).datepicker();
		$( "#datepicker-rail" ).datepicker();
		$( "#datepicker-port" ).datepicker();
		$( "#datepicker-ETD" ).datepicker();
		$( "#datepicker-ETA" ).datepicker();
		$( "#datepicker-Laden" ).datepicker();
		$( "#datepicker-Export" ).datepicker();
		$( "#datepicker-issued" ).datepicker();
		$( "#datepicker-lastfree" ).datepicker();
		$( "#datepicker-GO" ).datepicker();
	});
</script>

<!--save draft-->
 <script type="text/javascript">

	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#table-shipper thead th').each( function () {
	        var title = $(this).text();	        
	        if (title == 'Select')
	        {
	        	$(this).html();
	        }
	        else	        	
	        {
	        	$(this).html( '<input type="text" class="form-control input-sm" placeholder=" '+title+'" />' );
	        }
	        
	    } );
	 
	    // DataTable
	    var table = $('#table-shipper').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	} );

	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#table-truck thead th').each( function () {
	        var title = $(this).text();	        
	        if (title == 'Select')
	        {
	        	$(this).html();
	        }
	        else	        	
	        {
	        	$(this).html( '<input type="text" class="form-control input-sm" placeholder=" '+title+'" />' );
	        }
	        
	    } );	 
	    // DataTable
	    var table = $('#table-truck').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	});

	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	   $('#table-consignee thead th').each( function () {
	        var title = $(this).text();	        
	        if (title == 'Select')
	        {
	        	$(this).html();
	        }
	        else	        	
	        {
	        	$(this).html( '<input type="text" class="form-control input-sm" placeholder=" '+title+'" />' );
	        }	        
	    } );
	 
	    // DataTable
	    var table = $('#table-consignee').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search(this.value)
	                    .draw();
	            }
	        } );
	    } );
	} );

	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#table-exporter thead th').each( function () {
	        var title = $(this).text();	        
	        if (title == 'Select')
	        {
	        	$(this).html();
	        }
	        else	        	
	        {
	        	$(this).html( '<input type="text" class="form-control input-sm" placeholder=" '+title+'" />' );
	        }
	        
	    } );
	 
	    // DataTable
	    var table = $('#table-exporter').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	} );

	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#table-cargo thead th').each( function () {
	        var title = $(this).text();	        
	        if (title == 'Select')
	        {
	        	$(this).html();
	        }
	        else	        	
	        {
	        	$(this).html( '<input type="text" class="form-control input-sm" placeholder=" '+title+'" />' );
	        }
	        
	    } );
	 
	    // DataTable
	    var table = $('#table-cargo').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	} );

	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#table-remit thead th').each( function () {
	        var title = $(this).text();	        
	        if (title == 'Select')
	        {
	        	$(this).html();
	        }
	        else	        	
	        {
	        	$(this).html( '<input type="text" class="form-control input-sm" placeholder=" '+title+'" />' );
	        }
	        
	    } );
	 
	    // DataTable
	    var table = $('#table-remit').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	} );
</script>
<script>
	function checkTextField(field) {
    if (field.value == '') {
        alert("Field is empty");
    }
}
</script>

<script>
    $(document).ready(function(){
 
        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".txtadd").each(function() {
 
            $(this).keyup(function(){
                calculateSum();
            });
        });
    });
 
    function calculateSum() {
 
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".txtadd").each(function() {
 
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
        sum = parseFloat(sum);
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $('#total').val(sum.toFixed(2));
    }
</script>

<script>

$(document).ready(function() {
 /*disable non active tabs*/

 
 $('.btnNext').click(function(){
  /*enable next tab*/

  $('.nav-tabs li.active').next('li').find('a').attr("data-toggle","tab")
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
 });
 $('.btnPrevious').click(function(){
  /*enable prev tab*/
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
 });
});

</script>
<script>


/*function checkBookID() {
    var x = document.getElementById("bookid");
    x.value = x.value.toUpperCase();
}
*/
function fixFloatFre() {
    var x = document.getElementById("fre");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
}
function fixFloatHan() {
    var x = document.getElementById("han");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
 }

function fixFloatAms() {
    var x = document.getElementById("ams");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
 }
function fixFloatDdc() {
    var x = document.getElementById("ddc");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
function fixFloatDem() {
    var x = document.getElementById("dem");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
function fixFloatInl() {
    var x = document.getElementById("inl");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
function fixFloatCle() {
    var x = document.getElementById("cle");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
function fixFloatDut() {
    var x = document.getElementById("dut");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
function fixFloatBon() {
    var x = document.getElementById("bon");
   y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
function fixFloatExa() {
    var x = document.getElementById("exa");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
    function fixFloatCfs() {
    var x = document.getElementById("cfs");
   y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
    function fixFloatThc() {
    var x = document.getElementById("thc");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
    function fixFloatOri() {
    var x = document.getElementById("ori");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
    function fixFloatCha() {
    var x = document.getElementById("cha");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
    function fixFloatPie() {
    var x = document.getElementById("pie");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
    }
    function fixFloatIte() {
    var x = document.getElementById("ite");
   	y = parseFloat(x.value);
   	//x.value = y.toFixed(2);
   	if(isNaN(y)){
    x.value = "0.00";
    }
    else
    {
    	x.value = y.toFixed(2);
    }
}
</script>
<SCRIPT LANGUAGE="JavaScript">
    function confirmEditBooking() {
      return confirm("Are you sure to modify the booking for approval?");
    };
</SCRIPT>

@endsection