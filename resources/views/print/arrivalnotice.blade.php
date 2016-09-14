<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' media="all" href="{{url('public/shippingtemplate/css/print-table/reset.css')}}" />
<link rel="stylesheet" type="text/css" media="all" href="{{url('public/shippingtemplate/css/print-table/style.css')}} "/>
<title>ARRIVAL NOTICE/INVOICE</title>
<!-- Description, Keywords and Author -->
<meta name="description" content="SERENCO JSC"/>
<meta name="keywords" content="CORE BANKING, BANKING SOFTWARE"/>
<meta name="author" content="serenco jsc">
<style type="text/css" media="print"> 
p{
	font-size:10px;
}
.footer-print{
	bottom:0.5cm;
}


</style>
</head>

<body>
	<div id="page-wrap">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td style="font-size: 26px; font-weight: bold; text-decoration: underline ; font-style: Italic;"><img src="{{url('public/shippingtemplate/images/logo_acl.png')}}" alt="ACL" width="80" height="40" /> American Container Line</td>
					<td>
						<p>&nbsp;</p>
						<p>&nbsp;</p>

					</td>
				</tr>
				<tr>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="100%" align="center"><h1 class="font-bold" style="text-decoration: underline; display:inline;">ARRIVAL NOTICE/INVOICE</h1> 
							<p class="font-bold" style="display: inline; margin-left: 35px; font-size: 15px;"> File No.    </p>								
							</td>
							
						</tr>
					</table>			
				</tr>
				<tr>
					<td class="reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="16%" class="tex-underline font-bold"><p>DATE:</p></td>
							<td colspan="2" class="text-uppercase blueacl"><p class="font-bold">{{date_format(date_create($showbook->today),"m/d/Y") }}</p></td>
							<td width="15%" class="text-uppercase font-bold"><p class="tex-underline">MODE: </p></td>
							<td width="8%" class="font-bold blueacl"><p class="text-uppercase">{{$showbook->mode}}</p></td>
							<td width="10%" class="tex-underline font-bold"><p class="text-uppercase">P/U NO. </p></td>
							<td width="10%" class="font-bold blueacl"><p class="text-uppercase">{{$showbook->PU_no}} </p></td>
						  </tr>
						  <tr>
							<td class=" text-uppercase tex-underline font-bold"><p>SHIPPER:</p></td>
							<td colspan="2" class="text-uppercase blueacl font-bold"><p><?php 								
								$str =$showbook->shipper;					
								$a= strpos($str,'Company:');
								$b= strpos($str,'City:');
								
								echo substr($str,$a+8,$b-$a-8);
						?> </p></td>
							<td class="text-uppercase"><p class="tex-underline font-bold">CONSIGNEE:</p></td>
							<td colspan="2" class="font-bold blueacl"><p class="text-uppercase">
							<?php 
								$str =$showbook->consignee;					
								$a= strpos($str,'Company:');
								$b= strpos($str,'Address:');
								
								echo substr($str,$a+8,$b-$a-8);
							?>
						</p></td>
						  </tr>
						  <tr>
							<td class="tex-underline font-bold"><p>Vessel/voyage:</p></td>
							<td colspan="2" class="font-bold blueacl"><p>{{$showbook->vessel}}</p></td>
							<td class="text-uppercase font-bold"><p class="tex-underline ">master b/l:</p></td>
							<td colspan="2" class="font-bold blueacl"><p>{{$showbook->master_BL}}</p></td>						
						  </tr>
						  <tr>
							<td class=" tex-underline text-uppercase font-bold"><p>container no:</p></td>
							<td colspan="2" class="text-uppercase blueacl"><p class="font-bold">{{$showbook->container_no}}</p></td>
							<td class="text-uppercase font-bold"><p class="tex-underline">ams b/l:</p></td>
							<td colspan="2" class="text-uppercase blueacl"><p class="font-bold">{{$showbook->AMS_BL}}</p></td>						
						  </tr>
						  <tr>
							<td class="tex-underline font-bold"><p>Port of Loading:</p></td>
							<td colspan="2" class="text-uppercase blueacl"><p class="font-bold">{{$showbook->port_cargo}}</p></td>								
							<td class="text-uppercase font-bold"><p class="tex-underline">house b/l:</p></td>
							<td colspan="2" class="text-uppercase blueacl"><p class="font-bold">{{$showbook->House_BL}}</p></td>							
						  </tr>
						  <tr>
							<td class="tex-underline font-bold"><p>Port of Discharge:</p></td>
							<td colspan="2" class="text-uppercase blueacl"><p class="font-bold">{{$showbook->port_discharge}}</p></td>							
							<td class="text-uppercase font-bold"><p class="tex-underline">final dest:</p></td>
							<td colspan="2" class="font-bold blueacl"><p>{{$showbook->final_dest}}</p></td>
						  </tr>
						  <tr>
							<td class=" tex-underline text-uppercase font-bold"><p>e.t.d date: </p></td>
							<td colspan="2" class="text-uppercase font-bold blueacl"><p>{{date_format(date_create($showbook->ETD),"m/d/Y")}}</p></td>							
							<td class="text-uppercase font-bold"><p class="tex-underline">final e.t.a:</p></td>
							<td colspan="2" class="font-bold blueacl"><p>{{$showbook->Final_ETA}}</p></td>
						  </tr>
						  <tr>
							<td class="tex-underline text-uppercase font-bold"><p>e.t.a date:</p></td>
							<td colspan="2" class="text-uppercase font-bold blueacl"><p>{{date_format(date_create($showbook->ETA),"m/d/Y")}}</p></td>
							
							<td class="text-uppercase "><p class="tex-underline font-bold">I.T No</p></td>
							<td colspan="2" class="font-bold blueacl"><p>{{$showbook->IT_no}}</p></td>
						  </tr>
						  <tr>
						    <td class=" tex-underline text-uppercase font-bold"><p>shipping line:</p></td>
						    <td colspan="2" class="font-bold blueacl"><p>{{$showbook->shipping_line}}</p>
						    <p class="font-bold"> B/L SURRENDER:   NEED O B/L</p>						    	
						    </td>
						    <td class="text-uppercase"><p class="tex-underline font-bold">date i.t issued</p></td>
						    <td class="font-bold blueacl"> <p > {{date_format(date_create($showbook->date_it_issued),"m/d/Y")}}
						    </p>
						   </td>
						   <td width="15%" class="text-uppercase"><p class="tex-underline font-bold">last free date:  </p>
						   										<p class="tex-underline font-bold">g.o date:  </p>
						   </td>
						   <td width="15%" class="text-uppercase font-bold blueacl"><p>{{date_format(date_create($showbook->last_free_date),"m/d/Y")}} </p>
						   <p>{{date_format(date_create($showbook->GO_date),"m/d/Y")}} </p>
						     </td>											   
					      </tr>

						  
						</table>
				  </td>
				</tr>
				<tr>
					<td class="reset-padding-all">
						<table width="100%" border="1" cellspacing="0" cellpadding="0">
						  <tr class="border_all">
							<th ><p class = "text-left font-bold">Container No/Seal No.</p></th>
							<th ><p class = "text-left font-bold">No of Packages</p></th>
							<th ><p class = "text-left font-bold">Description of goods</p></th>
							<th ><p class = "text-left font-bold">Gross weight</p></th>
							<th ><p class = "text-left font-bold">Measurement</p></th>
						  </tr>
						  <tr class="border_all">
			  <td height="210"  width="19%" class="text-uppercase font-bold blueacl">
			  					<p>{{$showbook->containerno}}</p>	
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								
								
															
							</td>
							<td width="13%" class="text-uppercase font-bold blueacl"><p>{{$showbook->package_no}}</p></td>
							<td width="44%" class="text-uppercase blueacl">
						    <p  style="white-space: pre-wrap;" class="font-bold">{{$showbook->kind_package_no}} 						
						    </p>
						    <p class="font-bold">&nbsp;</p>
						    <p class="font-bold">&nbsp;</p>
						    <p class="font-bold">&nbsp;</p>
						    <p class="font-bold">&nbsp; </p></td>
							<td width="12%" class="text-uppercase blueacl"><p><span class="font-bold">{{$showbook->gross_weight}}</span></p></td>
							<td width="12%" class="text-uppercase blueacl"><p> <span class="font-bold">{{$showbook->measurement}} </span></p></td>
						  </tr>
						 
						</table>
					</td>
				</tr>
				<tr>
					<td class="reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr class="text-left">
								<th><p class="font-bold">CARGO LOCATION: </p></th>
								<th><p></p></th>
								<th><p class="font-bold">REMIT PAYMENT TO: </p></th>
							</tr>
							<tr>
								<td class="blueacl font-bold" width="37%">
								<p>
								<?php 
									$str =$showbook->cargo_location;
									$a1 = strpos($str,'Company:');
									$b1= strpos($str,'Address:');	
									echo substr($str,$a1+8,$b1-$a1-8)."<br>";	

									$a2 = strpos($str,'Address:');
									$b2= strpos($str,'City:');	
									echo substr($str,$a2+8,$b2-$a2-8).", ";

									$a3 = strpos($str,'City:');
									$b3= strpos($str,'State:');	
									echo substr($str,$a3+5,$b3-$a3-5).", ";

									$a4 = strpos($str,'State:');
									$b4= strpos($str,'Zip');	
									echo substr($str,$a4+6,$b4-$a4-6);

									$a5 = strpos($str,'Zip Code:');
									$b5= strpos($str,'Country');	
									echo substr($str,$a5+9,$b5-$a5-9);

									$a6 = strpos($str,'Country:');
									$b6= strpos($str,'Tel:');	
									echo substr($str,$a6+8,$b6-$a6-8).". ";

									$a7= strpos($str,'Tel:');						
									echo substr($str,$a7,strlen($str)-$a7);	
								?>
							</p>
								<!---<p class="font-bold">ITS TERMINAL</p>
							    <p class="font-bold">FIRM CODE: Y309. PIER G AVE</p>
							    <p class="font-bold">LONG BEACH, CA 90820 t: 562-1241736477</p></td>
							    -->
								</td>
							  <td width="26%" >&nbsp;</td>
								<td width="37%" class="text-uppercase blueacl font-bold" >
								<p>
									<?php 
									$str =$showbook->remit_payment;
									$a1 = strpos($str,'Company:');
									$b1= strpos($str,'Address:');	
									echo substr($str,$a1+8,$b1-$a1-8)."<br/>";																
									$a2 = strpos($str,'Address:');
									$b2= strpos($str,'City:');	
									echo substr($str,$a2+8,$b2-$a2-8).", ";

									$a3 = strpos($str,'City:');
									$b3= strpos($str,'State:');	
									echo substr($str,$a3+5,$b3-$a3-5).", ";

									$a4 = strpos($str,'State:');
									$b4= strpos($str,'Zip');	
									echo substr($str,$a4+6,$b4-$a4-6)."<br/>";


									$a7= strpos($str,'Tel:');						
									echo substr($str,$a7,strlen($str)-$a7);	
								?>
							</p>
								</td>
							</tr>
						 
						</table>
					</td>
				</tr>
				<tr>
					<td class ="reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="53%" class ="reset-padding-all lheight" >
									<table width="91%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="5%"><p>1.<p></td>
								
											<td width="95%" class="text-uppercase font-bold" ><p>personal checks will not be accepted </p>
										    <p>cashier's check, money</p>
										    <p>order and company check only.</p></td>
										</tr>
										<tr>
											<td width="5%"><p>2.</p></td>
								
											<td width="95%" class="text-uppercase font-bold" >
											<p>we will release the freight to you upon receiving </p>
											<p> your full payment and your endorsed original </p>
											<p>bill of lading</p></td>
										</tr>
										<tr>
											<td width="5%"><p>3.</p></td>
								
											<td width="95%" class="text-uppercase font-bold" ><p>prior to cargo pick-up consignee must clear</p>
										    <p>custom and confirm freight release with pier/cfs</p></td>
										</tr>
										<tr>
											<td width="5%"><p>4.</p></td>
								
											<td width="95%" class="text-uppercase font-bold" >
											<p>for lcl shipment before pick up cargo. please </p>
											<p> contact local warehouse for any additional </p>
											<p> charges</p></td>
										</tr>
										<tr>
											<td width="5%"><p>5.</p></td>
								
											<td width="95%" class="text-uppercase font-bold" >
											<p>please pick-up your cargo a.s.a.p to void unnecessary <p/>
											<p>charges.</p></td>
										</tr>
							 
									</table>
								</td>
					
								<td width="42%" class="font-bold reset-padding-all lheight" >

									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										
										<tr>
										<td width="60%" class="text-uppercase font-bold"><p>freight collect: </p></td>
										  <td width="10%" class="font-bold" ><p>$</p></td>
										  <td width="30%"  class="text-right blueacl font-bold"><p>{{$showbook->freight_collect}}</p></td>
									  </tr>
										<tr>
											<td class="text-uppercase font-bold"><p> handling fee: </p></td>
								
											<td class="font-bold" ><p>$</p></td>
											<td class="text-right blueacl font-bold"><p>{{$showbook->handling_fee}}</p></td>
										</tr>
										<tr>
											<td class="text-uppercase font-bold"><p> ams fee : </p></td>
								
											<td class="font-bold" ><p>$</p></td>
											 <td class="text-right blueacl font-bold"><p>{{$showbook->ams_fee}}</p></td>
										</tr>
										<tr>
											<td class="text-uppercase font-bold"><p> d.d.c: </p></td>
								
											<td  class="font-bold" ><p>$</p></td>
											 <td  class="text-right blueacl font-bold"><p>{{$showbook->ddc}}</p></td>
										</tr>
										<tr>
											<td class="text-uppercase font-bold"><p> demurrage: </p></td>
								
											<td class="font-bold" ><p>$</p></td>
											 <td class="text-right blueacl font-bold"><p>{{$showbook->demurrage}}</p></td>
										</tr>
										<tr>
											<td class="text-uppercase font-bold"><p> inland freight: </p></td>
											<td class="font-bold"><p>$</p></td>
											<td class="text-right blueacl font-bold"><p>{{$showbook->inland_freight}}</p></td>
									  </tr>
										<tr>
											<td class="text-uppercase font-bold"><p> custom clearance: </p></td>
											<td class=" font-bold"><p>$</p></td>
										  <td class="text-right blueacl font-bold"><p>{{$showbook->custom_clearance}}</p></td>
									  </tr>
									  <tr>
									  	<td class="text-uppercase font-bold"><p> custom duty: </p></td>
									  	<td class="font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->custom_duty}}</p></td>
									  </tr>
									  <tr>
									  	<td class="text-uppercase font-bold"><p> custom bound:</p></td>
									  	<td class=" font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->custom_bond}}</p></td>
									  </tr>
									  <tr>
									  	<td class="text-uppercase font-bold"><p> examination fee: </p></td>
									  	<td class="font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->examination_fee}}</p></td>
									  </tr>
									  <tr>
									  	<td><p> CFS In &amp; Out Charges </p></td>
									  	<td class=" font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->cfs_charges}}</p></td>
									  </tr>
									  <tr>
									  	<td><p> T.H.C FEE: </p></td>
									  	<td class=" font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->thc_fee}}</p></td>
									  </tr>
									  <tr>
									  	<td class="font-bold"><p> Origin Custom Charges: </p></td>
									  	<td class="text-uppercase font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->origin_charges}}</p></td>
									  </tr>
									  <tr>
									  	<td class="font-bold"><p> Chassis Charges: </p></td>
									  	<td class="text-uppercase font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->chassis_charges}}</p></td>
									  </tr>
									  <tr>
									  	<td class="font-bold"><p> Pier Pass Charges: </p></td>
									  	<td class="text-uppercase font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->pier_pass_charges}}</p></td>
									  </tr>
									  <tr>
									  	<td class="font-bold"><p> I.T Entry Charges: </p></td>
									  	<td class="text-uppercase font-bold" ><p>$</p></td>
									  	<td class="text-right blueacl font-bold"><p>{{$showbook->IT_entry_charges}}</p></td>
										
									  </tr>
									  
										
							 
									</table>
								
								</td>
							</tr>
							<br/>
							<tr>
								<td width="58%" style="padding-top: 20px;">
								
									<p class="font-bold" style="font-size: 15px">Prepare By: <font color="#033264">{{$showbook->prepare_by}} </font></p>
								
								</td>
					
								<td width="42%" class="font-bold reset-padding-all" >
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="60%" class="text-uppercase"><p>Amount due</p></td>
											<td width="15%" class="text-uppercase font-bold" ><p>$usd</p></td>
											<td width="25%" class="text-right blueacl font-bold"><p>{{$showbook->amount_due}}</p></td>
										</tr>
									</table>
								</td>
							</tr>
						 
						</table>
					</td>
				</tr>
			</tbody>
        </table>
			<div class = "border_top footer-print hidden">
			<div width="50%" style="float:left;text-align:left;">
				<p>{{Auth::user()->address}}</p>
				<p>{{Auth::user()->city}}, {{Auth::user()->zip_code}} {{Auth::user()->country}}</p>
				<p>Website: www.shipping.americancontainerline.com</p>
			</div>
			<div width="50%" style="float:right; text-align:right;">
				<p>Tel: {{Auth::user()->phone}}</p>
				<p>Fax: {{Auth::user()->fax}}</p>
				<p>Email: {{Auth::user()->email}}</p>
			</div>
		</div>
        <input type="button" class="hide" onClick="window.print()" class="hide" value="Print"/>
    </div>
</body>
</html>