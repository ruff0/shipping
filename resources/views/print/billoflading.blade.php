<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' media="all" href="{{url('public/shippingtemplate/css/print-table/reset.css')}}"/>
<link rel="stylesheet" type="text/css" media="all" href="{{url('public/shippingtemplate/css/print-table/style.css')}}"/>
<title>BILL OF LADING</title>
<!-- Description, Keywords and Author -->
<meta name="description" content="SERENCO JSC"/>
<meta name="keywords" content="CORE BANKING, BANKING SOFTWARE"/>
<meta name="author" content="serenco jsc">
<style type="text/css">#page-wrap table tbody tr .reset-padding-all table {
}
p{
	font-size:10px;
}
</style>
</head>

<body>
	<div id="page-wrap">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td colspan="2" class="reset-padding-all border_bottom">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							<td class="reset-padding-all" valign ="bottom" width="6%"><img src="{{url('public/shippingtemplate/images/logoacl.png')}}" style="vertical-align:bottom; width:60px;" alt="ACL" /> </td>
						    <td width="40%" valign="middle" class = "border_right "><h2 style="font-size: 20px; font-weight: bold; text-decoration: underline; font-style: Italic;">American Container Line</h2></td>
						    <td width="22%" valign="middle" class = "border_right border_left"><h2 class="tex-center" style="font-size: 16px; font-weight: bold">BILL OF LADING</h2></td>
							  <td width="32%" valign="middle" ><h2 class="tex-center " style="font-family: cambria; font-size: 18px; font-weight: bold" ><?php if($showbook->type == 0) 
							  { 
							  	echo "ORIGINAL";
							  }
							  else{
							  	echo "NON-NEGOTIABLE";
							  }
							   ?></h2></td>
							</tr>
						</table>
				    </td>
				</tr>
				<tr class = "border_bottom">
					<td width="50%" >
						<p class = "fix-tex-zise ">Shipper/exporter (complete name and address)</p>
						<p class = "text-uppercase blue_acl">
						<?php 
		
						$str =$showbook->shipper;					
						$a= strpos($str,'Contact Name:');
						$b= strpos($str,'Address:');
						
						echo substr($str,$a+13,$b-$a-13)."<br/>";

						$str =$showbook->shipper;					
						$a1= strpos($str,'Address:');
						$b1= strpos($str,'Company:');
						
						echo substr($str,$a1+8,$b1-$a1-8)."<br/>";

						$str =$showbook->shipper;					
						$a2= strpos($str,'City:');
						$b2= strpos($str,'State:');
						
						echo substr($str,$a2+5,$b2-$a2-5).", ";

						$str =$showbook->shipper;					
						$a3= strpos($str,'State:');
						$b3= strpos($str,'Zip Code:');
						
						echo substr($str,$a3+6,$b3-$a3-6);

						$str =$showbook->shipper;					
						$a4= strpos($str,'Zip Code:');
						$b4= strpos($str,'Country:');
						
						echo substr($str,$a4+9,$b4-$a4-9);


						$str =$showbook->shipper;					
						$a5= strpos($str,'Country:');
						$b5= strpos($str,'Phone:');
						
						echo substr($str,$a5+8,$b5-$a5-8);

						$str =$showbook->shipper;					
						$a6= strpos($str,'Phone:');
						$b6= strpos($str,'Fax:');
						
						echo "Tel:".substr($str,$a6+6,$b6-$a6-6);
						?>

					</td>
					<td width="50%" class = "border_left reset-padding-all fix_border_size">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr class = "border_bottom">
								<td width="50%" ><p class="fix-tex-zise">Booking No.</p>
							    <p class="blue_acl">{{$book->booking_no}}</p></td>
								<td width="50%" class = "border_left "><p  class="fix-tex-zise">B/L No.</p>
							    <p class="blue_acl">{{$book->BL_no}}</p></td>
							</tr>
							<tr >
								<td colspan="2"><p  class="fix-tex-zise">Export references</p>
							    <p class="blue_acl">{{$book->export_no}}</p>
							    <p> &nbsp;</p>
							    <p> &nbsp;</p>
							    </td>
							</tr>
							
						</table>
					</td>
				</tr>
				<tr class = "border_bottom">
					<td width="50%" >
						<p  class="fix-tex-zise"> Consignee(complete name and address)</p>
					<p class="text-uppercase blue_acl">
						<?php 
						$str =$showbook->consignee;
											
						$a1 = strpos($str,'Company:');
						$b1= strpos($str,'Address:');	
						echo substr($str,$a1+8,$b1-$a1-8)."<br>";
						$a2 = strpos($str,'Address:');
						$b2= strpos($str,'City:');	
						echo substr($str,$a2+8,$b2-$a2-8)."<br>";
						$a3 = strpos($str,'City:');
						$b3= strpos($str,'Country:');	
						echo substr($str,$a3+5,$b3-$a3-5);
						$a= strpos($str,'Country:');						
						echo substr($str,$a+8,strlen($str)-$a-8);	
						?>
					</p>

					</td>
					<td width="59%" class = "border_left fix_border_size reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							
							<tr>
								<td height="54" colspan="2" >
									<p  class="fix-tex-zise ">Forwarding agent - references (F.M.C) No.</p>
									<p> &nbsp;</p>									
								</td>
							</tr>
							<tr class = "border_top">
								<td width="50%"  class="fix-tex-zise">
									<p class= "fix-tex-zise ">Point and Country of Origin</p>
									<p class= "fix-tex-zise blue_acl">  <?php echo substr($showbook->place_receipt,-2); ?> </p>
								</td>
								<td width="50%" class= "border_left  fix-tex-zise">
									<p class= "fix-tex-zise ">Estimate Time Arrival</p>
									<p class= "fix-tex-zise blue_acl">{{date_format(date_create($book->date_export),"m/d/Y") }}</p>
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
				<tr class = "border_bottom">
					<td width="50%" class = " reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							
							<tr>
								<td height="100" colspan="2" >
									<p  class="fix-tex-zise ">Notify Party (complete name and address)</p>
									<p >(SAME AS CONSIGNEE)</p>
									<p class="text-uppercase">
										
									</p>
									
								</td>
							</tr>
							<tr class = "border_top">
								<td width="60%">
									<p  class="fix-tex-zise">Precarriage by</p>
								</td>
								<td width="40%" class= "border_left fix_border_size">
									<p  class="fix-tex-zise">Place of Receipt</p>
									<p class="blue_acl">{{$showbook->place_receipt}}</p>
								</td>
							</tr>
							
						</table>
					</td>
					<td width="50%" class = "border_left fix_border_size">
					<p  class="fix-tex-zise">For Delivery please present to :</p>
					<p class="blue_acl">{{$showbook->delivery}} </p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p></td>
					
				</tr>
				<tr class = "border_bottom">
					<td class = "reset-padding-all" width="50%">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">	
							<tr width = "60%">
								<td width="60%" class = "reset-padding-all" >
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="64%"  ><p class="fix-tex-zise">Vessel</p></td>
											<td width="36%"  ><p class="fix-tex-zise">Voy No.</p></td>
										</tr>
										<tr>
											<td width="64%"><P class="fix-tex-zise" style="font-size: 12px; font-family: Courier New;">MOL CONTINUITY</P></td>
											<td width="36%"><P  class="fix-tex-zise" style="font-size: 12px; font-family: Courier New;">021W</P></td>
										</tr>
									</table>
								</td>
								<td width="40%"  class = "border_left fix_border_size">
									<p  class="fix-tex-zise">Port of Loading</p>
									<p class="blue_acl">{{$showbook->place_receipt}}</p>
									
								</td>
							</tr>
						</table>
					</td>
					<td width="50%" class ="border_left fix_border_size fix-tex-zise ">Loading Pier/Terminal</td>
				</tr>
				<tr class = "border_bottom">
					<td class = "reset-padding-all" width="50%">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">	
							<tr>
								<td width="60%" >
									<p  class="fix-tex-zise">Port of Discharges</p>
									<p class="fix-tex-zise blue_acl">{!! $showbook->port_discharge !!}</p>
								</td>
								<td width="40%"  class = "border_left fix_border_size">
									<p  class="fix-tex-zise ">Place of Delivery</p>
									<p class="fix-tex-zise text-uppercase blue_acl">{!! $showbook->final_dest !!}</p>
									
								</td>
							</tr>
						</table>
					</td>
					<td width="50%" class ="border_left fix_border_size fix-tex-zise ">Type of Move</td>
				</tr>
				<tr class = "border_bottom">
					<td colspan="2" class ="reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">	
							<tr>
								<td width="30%" valign="bottom" >
									<p class="fix-tex-zise ">CARRIER'S RECEIPT</p>
									
								</td>
								<td width="70%" valign="bottom"  class = "border_left fix_border_size">
								  <p class="fix-tex-zise">PARTICULARS FURNISHED By - CARRIER NOT RESPONSIBLE</p>
									
									
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class = "border_bottom">
					<td colspan="2" class ="reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">	
							<tr>
								<td width="17%" class="border_right"><p class="fix-tex-zise ">Container No/Seal No.</p></td>
								<td width="13%" class="border_right fix_border_size" ><p  class="fix-tex-zise " style="font-size: 8.5px">No. of Packages</p></td>
								<td width="40%" ><p  class="fix-tex-zise ">Kind of Packages, description of goods</p></td>
								<td width="10%" class="border_left" ><p  class="fix-tex-zise">Gross Weight</p></td>
								<td width="20%" class="border_left" ><p  class="fix-tex-zise">Measurement</p></td>
							
							</tr>
							<tr>
								<td height="270" width="17%" class ="border_right"><blockquote>
								  <p class="blue_acl">{{$showbook->containerno}}</p>
								  
							    </blockquote></td>
								<td width="13%" class="border_right  fix_border_size" ><p class="blue_acl">{{$showbook->package_no}}</p>
							    <p>&nbsp; </p></td>
							  <td width="40%" >
							  	<pre class="blue_acl" style="white-space: pre-wrap;">{{$showbook->kind_package_no}}</pre>
							  </td>
								<td width="10%" class="border_left blue_acl" ><p>{{$showbook->gross_weight}} </p></td>
								<td width="20%" class="border_left blue_acl" ><p>{{$showbook->measurement}} </p></td>
							
							</tr>
							
						</table>
				  </td>
				</tr>
				<tr class = "border_bottom fix_border_size">
					<td colspan="2" class ="reset-padding-all" style = "position:relative;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">	
							<tr  class="fix-tex-zise">
							  <td height="70" width="30%" class = "border_right fix_border_size" ><p class= "fix-tex-zise">Freight &amp; Charges</p></td>
								<td width="20%" class="border_right " >Rate</td>
								<td width="20%" ><p class= "fix-tex-zise">Unit</p>
							    <p>&nbsp;</p>
						      <p>&nbsp;</p></td>
								<td width="10%" class="border_left" ><p class= "fix-tex-zise ">Prepaid</p></td>
								<td width="20%" class="border_left" ><p class= "fix-tex-zise ">Collect</p></td>
													
							</tr>						
						</table>
						<div style = "position:absolute;top:62px; font-size: 8px; left:50px;">These commodities, technology, or software were exported from the United State in accordance with the export administration regulation. Diversion contrary to U.S law prohibited 
						</div>
				  </td>
				</tr>
				<tr>
					<td width="50.2%" class ="reset-padding-all">
						<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="fix-tex-zise">
							<tr class = "border_bottom tex-line-height">
								<td width="60%"  class="border_right fix_border_size">
                                <p class= "fix-tex-zise ">Declared Value Charges</p>
							    <p class= "fix-tex-zise ">(see clause 10)</p>
                                <p class= "fix-tex-zise ">Declared value of US $</p>
                                </td>
								<td width="40%" class="border_right " >
                                <p class= "fix-tex-zise ">Total Prepaid</p>
							    <p>&nbsp;</p>
							    <p>&nbsp;</p>
                                <p>&nbsp;</p>

								</td>
				              </tr>
							<tr class = "border_bottom tex-line-height">
								<td width="60%" class = "border_right fix_border_size"><p class= "fix-tex-zise ">Number of Original B(s)/L</p>
							    <p class= "fix-tex-zise blue_acl ">{{$showbook->number_original}}</p></td>
								<td width="40%" class="border_right" ><p class= "fix-tex-zise ">Total collect</p></td>
							</tr>
							<tr class = " border_bottom tex-line-height">
								<td width="60%" class = "border_right fix_border_size"><p class= "fix-tex-zise">Place of issue</p>
							    <p class= "fix-tex-zise blue_acl">{{$showbook->place_issue}}</p></td>
								<td width="40%" class="border_right" ><p class= "fix-tex-zise">Date Laden on Board</p>
							    <p class= "fix-tex-zise blue_acl">{{date_format(date_create($book->date_laden),"m/d/Y") }}</p></td>
							</tr>
							<tr>
								<td width="60%" class=" tex-line-height">
									<p class= "fix-tex-zise  tex-line-height" style="font-size: 9px;">*Applicable only when document used </p>
									<p class= "fix-tex-zise tex-line-height" style="font-size: 9px;">
									as Combined Transport Bill of Lading</p>						<p class= "fix-tex-zise font-bold " style="font-size: 9px;">American Container Line Bond No 055912</p>
						      </td>
								<td width="40%">
								</td>
						 	</tr>
													
						</table>
					</td>
					<td width="50%">
						
									<p class = "tex-indent  fix-tex-zise  tex-line-height" >&nbsp;</p>
									<p class = "tex-indent  fix-tex-zise  tex-line-height" style="font-size: 8px;">Received in apparent good order and condition, unless otherwise indicated herein, the total number of goods, container, packages or other unit said to contain the cargo herein metioned, to be carried subject to all the terms and conditions provided for on the face nad back of this Bill of Lading by the vessel named herein or any substitute at the Carrier's option and/or other means of transport from the place of reciept to the place of delivery</p>
					  				<p class = "tex-indent fix-tex-zise  tex-line-height" style="font-size: 8px;">One of the signed Bills of Lading must be surrendered duly endorsed in exchange for the goods or delivery order. On presentation for this document duly endorsed to the Delivery Agent by the Holder, the right and liabilities arising in accordance with the terms hereof shall, without prejudice to any rule of common law or statute rendering them biding on the Holder, become binding in all respects between the Carrier and the Holder as though the contact evidenced hereby had been made between them.</p>
									<p class = "tex-indent fix-tex-zise  tex-line-height" style="font-size: 8px;">In witness whereof, the undersigned has signed three (3) Bills of Lading, all of this tenor and date, one of which being accomplished the others to stand void</p>
									
									<h1 class ="tex-center" style = "font-size:11px;margin-top: 10px; font-weight: bold">AMERICAN CONTAINER LINE AS AGENTS FOR THE CARRIER</h1>
									
									<div class = "tex-center border_top" style = "width:80%;margin: 0 auto; font-weight: bold"><p class= "fix-tex-zise">As Agent(s) only</p></div>
						
					</td>
				</tr>																							 							
			</tbody>
        </table>
				
        <input type="button" class="hide" onClick="window.print()" class="hide" value="Print"/>
    </div>
</body>
</html>