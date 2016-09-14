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
							{{ Form::open(array('route'=>array('putbookapprove',$book->id),'method'=>'PUT', 'class'=> 'form-horizontal')) }}
							
							<!-- Tab panes -->
							<div class="tab-content">								
								<!-- Tab FCL BOOKING ORDER -->
							<div role="tabpanel" class="tab-pane active" id="fcl-booking-order">
									<!-- Start row -->															
									<input type="hidden" name="txtBookID" value="{!! old('txtBookID',isset($book) ? $book->id : null) !!}">
									<div class="row">
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group {{ $errors->has('txtBookingID') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">BOOKING #</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtBookingID" class="control-label">{!! old('txtBookingID',isset($showbook) ? $showbook->booking_no : null) !!}</label>
												</div>
												<!--<input type="hidden" id="" name="txtBookid" placeholder="" class="form-control input-sm" value="{{old('txtBookid',isset($book) ? $book->id: null) }}" readonly="readonly"> -->
											</div>
											<div class="form-group {{ $errors->has('txtLogNo') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">LOG NO.</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtLogNo" class="control-label">{!! old('txtLogNo',isset($showbook) ? $showbook->log_no : null) !!}</label>												
												</div>
											</div>
											<div class="form-group {{ $errors->has('txtToday') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">TODAY</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtToday" class="control-label">{!! old('txtToday',isset($showbook) ? date_format(date_create($showbook->today),"m/d/Y") : null) !!}</label>														
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">B/L NO.</label>
												<div class="col-xs-5">
												<label type="text" id="" name="txtBLNo" class="control-label">{!! old('txtBLNo',isset($showbook) ? $showbook->BL_no : null) !!}</label>
													
												</div>
											</div>
											<div class="form-group {{ $errors->has('txtExportRef') ? ' has-error' : '' }}">
												<label class="col-xs-7 control-label" for="business_phone_company">EXPORT REFERENCES M-B/L NO.</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtExportNo" class="control-label">{!! old('txtExportNo',isset($showbook) ? $showbook->export_no : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">BOOKED BY</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtBookedBy" class="control-label">{!! old('txtBookedBy',isset($showbook) ? $showbook->bookedby : null) !!}</label>														
												</div>
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

												</label>
												<div class="col-xs-9" style="width: 72%">
												<label type="text" id="" name="txtShipper" class="control-label">{!! old('txtShipper',isset($showbook) ? $showbook->shipper : null) !!}</label>	
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
												<label type="text" id="" name="txtPortLoadCargo" class="control-label">{!! old('txtPortLoadCargo',isset($showbook) ? $showbook->port_cargo : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">CARRIER</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtCarrier" class="control-label">{!! old('txtCarrier',isset($showbook) ? $showbook->carrier : null) !!}</label>		
													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">VESSEL</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtVessel" class="control-label">{!! old('txtVessel',isset($showbook) ? $showbook->vessel : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">RAIL CUT OFF</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtRailCut" class="control-label">{!! old('txtRailCut',isset($showbook) ? $showbook->rail_cut_off : null) !!}</label>				
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PORT CUT OFF</label>
												<div class="col-xs-5">
												<label type="text" id="" name="txtPortCut" class="control-label">{!! old('txtRailCut',isset($showbook) ? $showbook->port_cut_off : null) !!}</label>	
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">EMPTY EQUIP P/U AT</label>
												<div class="col-xs-5">
												<label type="text" id="" name="txtEmptyEquip" class="control-label">{!! old('txtEmptyEquip',isset($showbook) ? $showbook->empty_equip_pu_at : null) !!}</label>														
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PORT DISCHARGE</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtPortDischarge" class="control-label">{!! old('txtPortDischarge',isset($showbook) ? $showbook->port_discharge : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">FINAL DEST</label>
												<div class="col-xs-5">
												<label type="text" id="" name="txtFinalDest" class="control-label">{!! old('txtFinalDest',isset($showbook) ? $showbook->final_dest : null) !!}</label>												
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">VOYAGE</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtVoyage" class="control-label">{!! old('txtVoyage',isset($showbook) ? $showbook->voyage : null) !!}</label>			
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">ETD</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtETD" class="control-label">{!! old('txtETD',isset($showbook) ? $showbook->ETD : null) !!}</label>												
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">ETA</label>
												<div class="col-xs-5">
												<label type="text" id="" name="txtETA" class="control-label">{!! old('txtETA',isset($showbook) ? $showbook->ETA : null) !!}</label>															
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">FULL LOAD RETURN TO</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtFullLoadReturn" class="control-label">{!! old('txtFullLoadReturn',isset($showbook) ? $showbook->full_load_return_to : null) !!}</label>														
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
												</label>
												<div class="col-xs-9" style="width: 72%">
													<label type="text" id="" name="txtTrucking" class="control-label">{!! old('txtTrucking',isset($showbook) ? $showbook->trucking_company : null) !!}</label>													
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
													<label type="text" id="" name="txtLoadingAddress" class="control-label">{!! old('txtLoadingAddress',isset($showbook) ? $showbook->loading_address : null) !!}</label>													
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
													<label type="text" id="" name="txtNumberContainer" class="control-label">{!! old('txtNumberContainer',isset($showbook) ? $showbook->number_container : null) !!}</label>													
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">COMMODITIES</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtCommodities" class="control-label">{!! old('txtCommodities',isset($showbook) ? $showbook->commodities : null) !!}</label>													
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
												<label type="text" id="" name="txtRemark" class="control-label">{!! old('txtRemark',isset($showbook) ? $showbook->remark : null) !!}</label>														
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
												</label>
												<div class="col-xs-9" style="width: 72%">
												<label type="text" id="" name="txtRemark" class="control-label">{!! old('txtConsignee',isset($showbook) ? $showbook->consignee : null) !!}</label>												
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
												<label type="text" id="" name="txtDelivery" class="control-label">{!! old('txtDelivery',isset($showbook) ? $showbook->delivery : null) !!}</label>													
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
															<label type="text" id="" name="txtNumberContainerinerNo" class="control-label">{!! old('txtNumberContainerinerNo',isset($showbook) ? $showbook->containerno : null) !!}</label>																
															</div>
														</div>
													</div><!-- //End col -->
													<!-- Start col -->
													<div class="col-xs-6">
														<div class="form-group">
															<label class="col-xs-7 control-label" for="business_phone_company">NO. OF PACKAGES</label>
															<div class="col-xs-5">
																<label type="text" id="" name="txtNoPackage" class="control-label">{!! old('txtNoPackage',isset($showbook) ? $showbook->package_no : null) !!}</label>											
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
																<label type="text" id="" name="txtKindPackage" class="control-label">{!! old('txtKindPackage',isset($showbook) ? $showbook->kind_package_no : null) !!}</label>																	
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
																<label type="text" id="" name="txtGross" class="control-label">{!! old('txtGross',isset($showbook) ? $showbook->gross_weight : null) !!}</label>																	
															</div>
														</div>
													</div><!-- //End col -->
													<!-- Start col -->
													<div class="col-xs-6">
														<div class="form-group">
															<label class="col-xs-7 control-label" for="business_phone_company">MEASUREMENT</label>
															<div class="col-xs-5">
																<label type="text" id="" name="txtMeasurement" class="control-label">{!! old('txtMeasurement',isset($showbook) ? $showbook->measurement : null) !!}</label>													
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
													<label type="text" id="" name="txtNumberOriginal" class="control-label">{!! old('txtNumberOriginal',isset($showbook) ? $showbook->number_original : null) !!}</label>	
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PLACE OF ISSUE</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtPlaceIssue" class="control-label">{!! old('txtPlaceIssue',isset($showbook) ? $showbook->place_issue : null) !!}</label>													
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PLACE OF RECEIPT</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtPlaceReceipt" class="control-label">{!! old('txtPlaceReceipt',isset($showbook) ? $showbook->place_receipt : null) !!}</label>											
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">DATE LADEN ON BOARD</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtDateLaden" class="control-label">{!! old('txtDateLaden',isset($showbook) ? date_format(date_create($showbook->date_laden),"m/d/Y") : null) !!}</label>														
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
												</label>
												<div class="col-xs-9" style="width: 72%">
													<label type="text" id="" name="txtExport" class="control-label">{!! old('txtExport',isset($showbook) ? $showbook->exporter : null) !!}</label>														
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
													<label type="text" id="" name="txtExportRef" class="control-label">{!! old('txtExportRef',isset($showbook) ? $showbook->export_ref : null) !!}</label>													
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
													<label type="text" id="" name="txtMethodTrans" class="control-label">{!! old('txtMethodTrans',isset($showbook) ? $showbook->method_trans : null) !!}</label>																									   </div>
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
													<label type="text" id="" name="txtCountryDes" class="control-label">{!! old('txtCountryDes',isset($showbook) ? $showbook->country_des : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">PARTIES TO TRANSACTION</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtPartiesTrans" class="control-label">{!! old('txtCountryDes',isset($showbook) ? $showbook->parties_trans : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">EXPORTING CARRIER</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtExportCarrier" class="control-label">{!! old('txtExportCarrier',isset($showbook) ? $showbook->export_carrier : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">CONTAINERIZED (Vessel only)</label>
												<div class="col-xs-5" style="width: 72%">
												<label type="text" id="" name="txtContainerized" class="control-label">{!! old('txtContainerized',isset($showbook) ? $showbook->containerized : null) !!}</label>														
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">DATE OF EXPORTATION (Not required for vessel shipments)</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtDateExport" class="control-label">{!! old('txtDateExport',isset($showbook) ? date_format(date_create($showbook->date_export),"m/d/Y") : null) !!}</label>												
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">DOMESTIC ROUTING / EXPORT INSTRUCTIONS</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtDomesticRouting" class="control-label">{!! old('txtDomesticRouting',isset($showbook) ? $showbook->domestic_routing : null) !!}</label>
													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">TYPE OF MOVE</label>
												<div class="col-xs-5">
												<label type="text" id="" name="txtTypeMove" class="control-label">{!! old('txtTypeMove',isset($showbook) ? $showbook->type_move : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-7 control-label" for="business_phone_company">VALUE</label>
												<div class="col-xs-5">
													<label type="text" id="" name="txtValue" class="control-label">{!! old('txtValue',isset($showbook) ? $showbook->value : null) !!}</label>															
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
													<label type="text" id="" name="txtMode" class="control-label">{!! old('txtMode',isset($showbook) ? $showbook->mode : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CONTAINER NO.</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtContainerNo" class="control-label">{!! old('txtContainerNo',isset($showbook) ? $showbook->container_no : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">MASTER B/L</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtMasterBL" class="control-label">{!! old('txtMasterBL',isset($showbook) ? $showbook->master_BL : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">HOUSE B/L</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtHouseBL" class="control-label">{!! old('txtHouseBL',isset($showbook) ? $showbook->House_BL : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">IT NO.</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtITNo" class="control-label">{!! old('txtITNo',isset($showbook) ? $showbook->IT_no : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">LAST FREE DATE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtLastFreeDate" class="control-label">{!! old('txtLastFreeDate',isset($showbook) ? date_format(date_create($showbook->last_free_date),"m/d/Y") : null) !!}</label>													
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">P/U NO.</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtPUNo" class="control-label">{!! old('txtPUNo',isset($showbook) ? $showbook->PU_no : null) !!}</label>	
													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">SHIPPING LINE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtShippingLine" class="control-label">{!! old('txtShippingLine',isset($showbook) ? $showbook->shipping_line : null) !!}</label>												
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">AMS B/L</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtAMS" class="control-label">{!! old('txtAMS',isset($showbook) ? $showbook->AMS_BL : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">FINAL E.T.A</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtFinalETA" class="control-label">{!! old('txtFinalETA',isset($showbook) ? $showbook->Final_ETA : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">DATE IT ISSUED</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtDateIssued" class="control-label">{!! old('txtDateIssued',isset($showbook) ? date_format(date_create($showbook->date_it_issued),"m/d/Y") : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">G.O DATE</label>
												<div class="col-xs-7">
												<label type="text" id="" name="txtGODate" class="control-label">{!! old('txtGODate',isset($showbook) ? date_format(date_create($showbook->GO_date),"m/d/Y") : null) !!}</label>
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
												</label>
												<div class="col-xs-9" style="width: 80%">
													<label type="text" id="" name="txtCargoLocation" class="control-label">{!! old('txtCargoLocation',isset($showbook) ? $showbook->cargo_location : null) !!}</label>													
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
												</label>
												<div class="col-xs-9" style="width: 80%">
													<label type="text" id="" name="txtRemitPayment" class="control-label">{!! old('txtRemitPayment',isset($showbook) ? $showbook->remit_payment : null) !!}</label>													
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
													<label type="text" id="" name="txtFreightCollect" class="control-label">{!! old('txtFreightCollect',isset($showbook) ? $showbook->freight_collect : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">HANDLING FEE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtHandlingFee" class="control-label">{!! old('txtHandlingFee',isset($showbook) ? $showbook->handling_fee : null) !!}</label>												
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">AMS FEE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtAMSFee" class="control-label">{!! old('txtAMSFee',isset($showbook) ? $showbook->ams_fee : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">D.D.C</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtDDC" class="control-label">{!! old('txtDDC',isset($showbook) ? $showbook->ddc : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">DEMURRAGE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtDemurrage" class="control-label">{!! old('txtDemurrage',isset($showbook) ? $showbook->demurrage : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">INLAND FREIGHT</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtInlandFreight" class="control-label">{!! old('txtInlandFreight',isset($showbook) ? $showbook->inland_freight : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CUSTOM CLEARANCE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtCustomClearance" class="control-label">{!! old('txtCustomClearance',isset($showbook) ? $showbook->custom_clearance : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CUSTOM DUTY</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtCustomDuty" class="control-label">{!! old('txtCustomDuty',isset($showbook) ? $showbook->custom_duty : null) !!}</label>	
												
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CUSTOM BOND</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtCustomBond" class="control-label">{!! old('txtCustomBond',isset($showbook) ? $showbook->custom_bond : null) !!}</label>														
												</div>
											</div>
										</div><!-- //End col -->
										<!-- Start col -->
										<div class="col-xs-6">
											
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">EXAMINATION FEE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtExamFee" class="control-label">{!! old('txtExamFee',isset($showbook) ? $showbook->examination_fee : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CFS IN & OUT CHARGES</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtCFSCharges" class="control-label">{!! old('txtCFSCharges',isset($showbook) ? $showbook->cfs_charges : null) !!}</label>														
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">T.H.C FEE</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtTHCFee" class="control-label">{!! old('txtTHCFee',isset($showbook) ? $showbook->thc_fee : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">ORIGIN CUSTOME CHARGES</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtOriginCharges" class="control-label">{!! old('txtOriginCharges',isset($showbook) ? $showbook->origin_charges : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">CHASSIS CHARGES</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtChassisCharges" class="control-label">{!! old('txtChassisCharges',isset($showbook) ? $showbook->chassis_charges : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">PIER PASS CHARGES</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtPierPassCharges" class="control-label">{!! old('txtPierPassCharges',isset($showbook) ? $showbook->pier_pass_charges : null) !!}</label>
													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">I.T ENTRY CHARGES</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtITEntryCharges" class="control-label">{!! old('txtITEntryCharges',isset($showbook) ? $showbook->IT_entry_charges : null) !!}</label>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-5 control-label" for="business_phone_company">AMOUNT DUE ($USD)</label>
												<div class="col-xs-7">
													<label type="text" id="" name="txtAmountDue" class="control-label">{!! old('txtAmountDue',isset($showbook) ? $showbook->amount_due : null) !!}</label>												
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
													<label type="text" id="" name="txtPrepareBy" class="control-label">{!! old('txtPrepareBy',isset($showbook) ? $showbook->prepare_by : null) !!}</label>													
												</div>
											</div>
										</div>
									</div><!-- //Row textarea -->
									<!-- Row Button -->
									<hr>
									<div class="row">
										<div class="col-xs-12 text-right">
											<div class="form-group">												
												<input class="btn btn-success" type="submit" value="Approve">
											</div>
										</div>
									</div><!-- //Row Button -->
									
							</div><!-- ARRIVAL NOTICE/INVOICE -->
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

<script>
function saveShipper() {

    //document.getElementById("myTextarea").value = "test test test";
	var theSrc = document.getElementById("shipper").innerHTML = $('input[name="select_shipper"]:checked').val();
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
        $('#table-shipper').DataTable();
        $('#table-truck').DataTable();
        $('#table-consignee').DataTable();
        $('#table-exporter').DataTable();
        $('#table-cargo').DataTable();
        $('#table-remit').DataTable();
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
 $('.nav-tabs li').not('.active').addClass('disabled');
 /*to actually disable clicking the bootstrap tab, as noticed in comments by user3067524*/
 $('.nav-tabs li').not('.active').find('a').removeAttr("data-toggle");
 
 $('.btnNext').click(function(){
  /*enable next tab*/
  $('.nav-tabs li.active').next('li').removeClass('disabled');
  $('.nav-tabs li.active').next('li').find('a').attr("data-toggle","tab")
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
 });
 $('.btnPrevious').click(function(){
  /*enable prev tab*/
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
 });
});

</script>

@endsection