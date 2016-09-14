<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' media="all" href="{{url('public/shippingtemplate/css/print-table/reset.css')}}" />
<link rel="stylesheet" type="text/css" media="all" href="{{url('public/shippingtemplate/css/print-table/style.css')}}" />
<title>FCL BOOKING ORDER</title>
<!-- Description, Keywords and Author -->
<meta name="description" content="SERENCO JSC"/>
<meta name="keywords" content="CORE BANKING, BANKING SOFTWARE"/>
<meta name="author" content="serenco jsc">
</head>

<body>
	<div id="page-wrap">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td style="font-size: 26px; font-weight: bold; text-decoration: underline ; font-style: Italic;"><img src="{{url('public/shippingtemplate/images/logo_acl.png')}}" alt="ACL" width="80" height="40" /> AMERICAN CONTAINER LINE</td>	

				</tr>
				<tr>
					<td align="right" style="font-family: Courier New;"><p>LOG NO.
						<font color="#033264">{!! $book["log_no"]  !!} </font></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td align="center"><h1 class="font-bold">FCL BOOKING ORDER</h1></td>
				</tr>
				<tr>
					<td>
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td class="reset-padding-all"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="18%" class="text-uppercase font-bold font_cambria"><p>Today:</p></td>
						<td width="28%" class="text-uppercase blue_acl "><p>{{ date_format(date_create($book["today"]),"m/d/Y") }} </p></td>
						<td width="20%" class="text-uppercase font-bold font_cambria"><p>shipper</p></td>
						<td width="34%" class="text-uppercase blue_acl "><p><?php 
		
						$str =$book['shipper'];					
						$a= strpos($str,'Contact Name:');
						$b= strpos($str,'Address:');
						
						echo substr($str,$a+13,$b-$a-13);
						
						?> </p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>Booked by:</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["bookedby"] !!}</p></td>
						<td class="text-uppercase font-bold font_cambria"><p>phone#</p></td>
						<td class="text-uppercase blue_acl"><p>
						<?php 
						$str =$book['shipper'];					
						$a= strpos($str,'Phone:');
						$b= strpos($str,'Fax:');						
						echo substr($str,$a+6,$b-$a-6);
						?> 
						</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>PORT OF LOAD CARGO ORIGIN:</p></td>						
						<td class="text-uppercase blue_acl"><p>{!! $book["port_cargo"] !!}</p></td>
						<td class="text-uppercase font-bold font_cambria"><p>fax#</p> <p>email</p></td>
						<td class="text-uppercase blue_acl"><p>
						<?php 
						$str =$book['shipper'];					
						$a= strpos($str,'Fax:');
						$b= strpos($str,'Email:');
						$print = substr($str,$a+4,$b-$a-4);															
							echo $print;	
							echo '.'								
						?>
					</p>
						<p>
						<?php 
						$str =$book['shipper'];					
						$a= strpos($str,'Email:');
						//$b= strpos($str,'');
						
						echo substr($str,$a+6,strlen($str)-$a-6);
						?> 
						</p>
						</td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>carrier:</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["carrier"] !!}</p></td>
						<td class="text-uppercase font-bold font_cambria"><p>port discharge:</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["port_discharge"] !!}</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>vessel:</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["vessel"] !!}</p></td>
						<td class="text-uppercase font-bold font_cambria"><p>final dest:</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["final_dest"] !!}</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>voyage:</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["voyage"] !!}</p></td>
						<td class="text-uppercase font-bold font_cambria"><p>booking#</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["booking_no"] !!}</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>RAIL CUT OFF:</p></td>
						<td class="text-uppercase blue_acl"><p> {{ date_format(date_create($book["rail_cut_off"]),"m/d/Y") }} </p></td>
						<td class="text-uppercase font-bold font_cambria"><p>etd:</p></td>
						<td class="text-uppercase blue_acl"><p>{{ date_format(date_create($book["ETD"] ),"m/d/Y") }} </p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>port cut off:</p></td>
						<td class="text-uppercase blue_acl"><p>{{ date_format(date_create($book["port_cut_off"]),"m/d/Y") }}</p></td>
						<td class="text-uppercase font-bold font_cambria"><p>eta:</p></td>
						<td class="text-uppercase blue_acl"><p>{{ date_format(date_create($book["ETA"]),"m/d/Y") }}</p></td>
					  </tr>
					  
					</table></td>
				</tr>
				<tr>
				  <td align="center"><p>&nbsp;</p></td>
				</tr>
				<tr>
					<td class="reset-padding-all">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="36%" class="text-uppercase font-bold font_cambria"><p>empty equip p/u at: </p></td>
						<td width="64%" class="text-uppercase blue_acl"><p>{!! $book["empty_equip_pu_at"] !!}</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>full load return to:</p></td>
						<td class="text-uppercase blue_acl"><p>{!! $book["full_load_return_to"] !!}</p></td>
					  </tr>
					   <tr>
						<td class="text-uppercase font-bold"><p>&nbsp;</p></td>
						<td><p>&nbsp;</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>TRUCKING COMPANY</p></td>
						<td class=" blue_acl">				
						<?php 					
						$str =$book['trucking_company'];	
						echo "<p class='text-uppercase'>";

						$a1= strpos($str,'Company:');
						$b1= strpos($str,'Address:');							
						echo substr($str,$a1+8,$b1-$a1-8)."<br>";

						$a2 = strpos($str,'Address:');
						$b2= strpos($str,'City:');	
						echo substr($str,$a2+8,$b2-$a2-8)."<br>";

						$a3 = strpos($str,'City:');
						$b3= strpos($str,'State:');	
						echo substr($str,$a3+5,$b3-$a3-5);

						$a4 = strpos($str,'State:');
						$b4= strpos($str,'Zip Code:');	
						echo substr($str,$a4+6,$b4-$a4-6);

						$a5 = strpos($str,'Zip Code:');
						$b5= strpos($str,'Country');	
						echo substr($str,$a5+9,$b5-$a5-9);

						$a6 = strpos($str,'Country:');
						$b6= strpos($str,'Phone');	
						echo substr($str,$a6+8,$b6-$a6-8)."<br>";	
						echo "</p>";
						$a7 = strpos($str,'Phone:');
						$b7= strpos($str,'Fax');	
						echo substr($str,$a7,$b7-$a7);

						$a8 = strpos($str,'Fax:');
						$b8= strpos($str,'Email');	
						echo substr($str,$a8,$b8-$a8);

						$a9= strpos($str,'Email:');						
						echo substr($str,$a9,strlen($str)-$a9);								
						?>
						</td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold"><p>&nbsp;</p></td>
						<td><p>&nbsp;</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>LOADING ADDRESS</p></td>
						<td><p class="blue_acl" style="white-space: pre-wrap;">{!! $book["loading_address"] !!}</p>
							<p> &nbsp;</p>
							<p> &nbsp;</p>
							<p> &nbsp;</p>						
						</td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold" ><p>&nbsp;</p></td>
						<td><p>&nbsp;</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>NUMBER OF CONTAINER</p></td>
						<td class="text-uppercase blue_acl">{!! $book["number_container"] !!}</td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>commodities</p></td>
						<td><p class="text-uppercase blue_acl">{!! $book["commodities"] !!}</p></td>
					  </tr>
					  <tr>
						<td class="text-uppercase font-bold font_cambria"><p>remark</p></td>
						<td><p class="text-uppercase blue_acl" style="white-space: pre-wrap;">{!! $book["remark"] !!}</p></td>
					  </tr>
					</table></td>
				</tr>				
				
			</tbody>
        </table>
		<div class = "border_top footer-print hidden ">
			<div width="50%" style="float:left;text-align:left; ">
				<p>{{Auth::user()->address}}</p>
				<p>{{Auth::user()->city}}, {{Auth::user()->zip_code}} {{Auth::user()->country}}</p>
				<p>WebSite: www.americancontainerline.com</p>
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