<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' media="all" href="{{url('public/shippingtemplate/css/print-table/reset.css')}}" />
<link rel="stylesheet" type="text/css" media="all" href="{{url('public/shippingtemplate/css/print-table/style.css')}}" />
    <title>SHIPPER'S EXPORT DECLARATION</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="SERENCO JSC" />
    <meta name="keywords" content="CORE BANKING, BANKING SOFTWARE" />
    <meta name="author" content="serenco jsc">
    <style type="text/css">
        .fix_height{
            height:25px;
        }
        .fix-tex-zise-1{
            font-size:9px;
        }
        @media print {
            @page {
                size: landscape ;
             
                margin: 0 auto;
            }
            body {
                font-size: 11px;
                margin: 0 auto;
            }
            p {
                font-size: 10px;
            }
            #page-wrap {
                width: 1000px;
                margin: 5mm auto !important;
            }
            table#test p {
                line-height: 13px;
            }
            
        }
    </style>
</head>
<body>
    <div id="page-wrap">
        <table width="842" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr class = "border_bottom" style="display: block;">
                <td colspan="5" class="reset-padding-all" >
                    <table width="842" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td width="750" class="reset-padding-all ">
                                <table width="750" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr class="border_bottom">
                                        <td width="487" class="reset-padding-all border_right">
                                            <p class="fix-tex-zise" style="font-size: 8px">U.S DEPARTMENT OF COMMERCE<span> -BUREAU OF THE CEN CUS - INTERNATIONAL TRADE ADMINISTRATION</span>
                                            </p>
                                            <p><span style="font-size: 11px">FORM </span><span class="fix-tex-zise">7525-V-ALT.(Intermodal) (1-1-88) </span> <strong style="font-size: 13px"> SHIPPER'S EXPORT DECLARATION </strong> </p>
                                        </td>
                                        <td width="253" class="reset-padding-all">
                                            <p><strong style="font-size: 12px">CONFIDENTAL </strong> <span class="fix-tex-zise" style="font-size: 9px">- For use solely offical purposes</span>
                                            </p>
                                            <p style="font-size: 9px">authorized by the Secretary of Commerce (13 U.S.C 301(g)).</p>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td class="reset-padding-all" colspan="2">
                                            <table width="750" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td rowspan="2" scope="row" width="375" class="reset-padding-all border_right">
                                                        <p>EXPORTER (Principal or Seller- lisence and address including ZIP Code)</p>
                                                        <p class="blueacl font-bold">
                                                        <?php 
                                                        $str =$showbook->exporter;                  
                                                        $a= strpos($str,'Company:');
                                                        $b= strpos($str,'Address:');                        
                                                        echo substr($str,$a+8,$b-$a-8)."<br>";

                                                        $a2 = strpos($str,'Address:');
                                                        $b2= strpos($str,'City:');  
                                                        echo substr($str,$a2+8,$b2-$a2-8)."<br>";

                                                        $a3 = strpos($str,'City:');
                                                        $b3= strpos($str,'State:'); 
                                                        echo substr($str,$a3+5,$b3-$a3-5);

                                                        $a4 = strpos($str,'State:');
                                                        $b4= strpos($str,'Zip');    
                                                        echo substr($str,$a4+6,$b4-$a4-6);

                                                        $a5 = strpos($str,'Zip Code:');
                                                        $b5= strpos($str,'Country');    
                                                        echo substr($str,$a5+9,$b5-$a5-9);

                                                        $a6 = strpos($str,'Country:');
                                                        $b6= strpos($str,'Tel');    
                                                        echo substr($str,$a6+8,$b6-$a6-8);

                                                        $a7 = strpos($str,'Tel:');
                                                        $b7= strpos($str,'Fax');    
                                                        echo substr($str,$a7,$b7-$a7);
                                                            
                                                        $a8= strpos($str,'Fax:');                       
                                                        echo substr($str,$a8,strlen($str)-$a8);                         
                                                        ?></p>
                                                    </td>
                                                    <td width="187" height="27" class="reset-padding-all border_right">
                                                     <p>BOOKING NUMBER </p>
                                                       <p class="blueacl font-bold">{{$showbook->booking_no}}</p>
                                                    </td>
                                                    <td width="187" height="27" class="reset-padding-all">
                                                   <p>B/L OR AWB NUMBER</p>
                                                       <p class="blueacl font-bold">{{$showbook->BL_no}}</p>
                                                  </td>
                                                </tr>
                                                <tr class="border_top">
                                                    <td height="47" colspan="2" class="reset-padding-all">
                                                        <p>EXPORT REFERENCES</p>
                                                        <p class="blueacl font-bold">{{$showbook->export_ref}}</p>


                                                    </td>
                                                </tr>
                                            </tbody></table>

                                        </td>
                                    </tr>

                                    <tr class="border_bottom">
                                        <td class="reset-padding-all" colspan="2">
                                            <table width="750" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td rowspan="2" scope="row" class="reset-padding-all border_right" width="375">
                                                        <p>CONSIGNED TO </p>
                                                            <p style="white-space: pre-wrap;" class="blueacl font-bold">{{$showbook->delivery }}      
                                                          </p>
                                                    </td>
                                                    <td width="375" height="50" class="reset-padding-all border_bottom">
                                                      <p>FORWARDING AGENT (Name and Address - references)</p>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="375" height="28" class="reset-padding-all">
                                                            <p>POINT (STATE) OF ORIGIN OR FTZ NUMBER</p> 
                                                            <p>&nbsp; </p>
                                                    </td>
                                                </tr>
                                            </tbody></table>

                                        </td>
                                    </tr>



                                    <tr class="border_bottom">
                                        <td class="reset-padding-all" colspan="2">


                                            <table width="750" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td height="85" colspan="2" class="reset-padding-all border_bottom" scope="row">
                                                        <p>NOTIFY PARTY/INTERMEDIATE CONSIGNEE(Name and address)</p>
                                                            <p>(SAME AS CONSIGNEE)</p>
                                                            <p>&nbsp;</p>



                                                    </td>
                                                    <td width="375" rowspan="2" class="reset-padding-all border_left">
                                                <p>DOMESTIC ROUTING/EXPORT INSTRUCTIONS</p>
                                                                                                
                                                        <P class="blueacl font-bold" style="white-space: pre-wrap;"><?php echo $showbook->domestic_routing ?>
                                                        </P>
                                                    </td>



                                                </tr>
                                                <tr>
                                                    <td width="187" class="reset-padding-all border_right" scope="row">
                                                        <p>PRE-CARRIAGE BY</p>
                                                    </td>
                                                    <td class="reset-padding-all" width="187">
                                                    <P>PLACE OF RECEIPT BY PRE-CARRIER</P>
                                                    <P class="blueacl font-bold">{{$showbook->place_receipt }}</P>
                                                    </td>
                                                </tr>
                                            </tbody></table>

                                        </td>
                                    </tr>



                                    <tr class="border_bottom">
                                        <td class="reset-padding-all" colspan="2">
                                            <table width="750" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>


                                                    <td width="187" class="reset-padding-all border_right">
                                                        <p>EXPORTING CARRIER</p>
                                                        <p class="blueacl font-bold">{{$showbook->export_carrier }}</p>
                                                    </td>
                                                    <td width="187" class="reset-padding-all ">
                                                    <p>PORT OF LOADING/EXPORT</p>
                                                        <p class="blueacl font-bold">{{$showbook->place_receipt}} </p>
                                                    </td>


                                                    <td width="375" class="reset-padding-all border_left">
                                                      <p>LOADING PIER/TERMINAL</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>



                                    <tr class="border_bottom">
                                        <td class="reset-padding-all" colspan="2">
                                        
                                        
                                        
                                              <table width="750" border="0" cellspacing="0" cellpadding="0">
                                                  <tbody><tr>
                                                    <td rowspan="2" scope="row" class="reset-padding-all border_right" width="187" style="font-size: 10px;"> <p>FOREIGN PORT OF UNLOADING (Vessel and Air only)</p>
                                                    </td>
                                              <td rowspan="2" class = "reset-padding-all border_right" width = "187" style="font-size: 10px;"> <p>PLACE OF DELIVERY BY ON-CARRIER</p>
                                                        <p class="blueacl font-bold">{!! $showbook->final_dest !!}</p></td>
                                              <td width="187" rowspan="2" class="reset-padding-all border_right"> <p>TYPE OF MOVE</p>
                                                        <p class="blueacl font-bold">{{$showbook->type_move}}</p></td>
                                                    <td colspan="2" class="reset-padding-all">  
                                                    <p>CONTAINERIZED (Vessel only)</p></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="94" class = "reset-padding-all">
                                                                    <input type="checkbox" value="yes" <?php if ($showbook->containerized == 'Yes'): ?>checked='checked'<?php endif; ?> disabled=""> 
                                                                    <label> Yes</label>
                                                                    </td>
                                  <td width="94" class = "reset-padding-all">
                                                                        <input type="checkbox" value="no" <?php if ($showbook->containerized == 'No'): ?>checked='checked'<?php endif; ?> disabled="">
                                                                        <label> No</label>
                                                                   </td>
                                                  </tr>
                                            </tbody></table>                                                                                                                              
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="reset-padding-all" colspan="2">
                                            <table width="750" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td class="reset-padding-all border_right" width="105">
                                                        <p>MARKS AND NUMBERS </p>
                                                    </td>
                                                    <td width="81" align="center" valign="middle" class="reset-padding-all border_right">
                                                      <p>NUMBER OF PACKAGES</p>
                                                    </td>
                                                    <td width="300" valign="middle" class="reset-padding-all border_right">
                                                      <p>DESCRIPTION OF COMMODITIES in Schedule B detail  </p>                                                     
                                                    </td>
                                                    <td width="120" align="left" valign="middle" class="reset-padding-all border_right">
                                                      <p>GROSS WEIGHT(KILOS) </p>
                                              </td>
                                                    <td width="142" align="center" valign="middle" class="reset-padding-all">
                                                      <p>MEASUREMENT</p>
                                                    </td>
                                                </tr>

                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                            <td width= "250" class="reset-padding-all border_left">
                                <table width="250" border="0" cellspacing="0" cellpadding="0" id="test">
                                    <tbody><tr>
                                        <td align="center" valign="middle" class="reset-padding-all">
                                            <p class="fix-tex-zise-10">OMB No. </p>
                                        </td>
                                    </tr>

                                    <tr class="border_all">
                                        <td class="reset-padding-all">
                                        
                             
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                          
                                        </td>

                                    </tr>
                                    <tr class="border_bottom fix_height" >
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <p class="fix-tex-zise-10">AUTHENTICATION (When required)</p>

                                        </td>

                                    </tr>

                                    <tr class="border_bottom">
                                        <td class="reset-padding-all">
                                            <p class="fix-tex-zise-10">THE UNDERSIGNED HEREBY AUTHORIZES</p>
                                            <p class="fix-tex-zise-10">&nbsp;</p>
                                            <p class="fix-tex-zise-10">&nbsp;</p>
                                        <p class="fix-tex-zise-10">EXPORTER________________________</p>
                                            <p class="fix-tex-zise-10">(BY DULY AUTHORIZED </p>
                                            <p class="fix-tex-zise-10">OFFICER OR EMPLOYEE)________________________</p>
                                    </td>

                                    </tr>
                                    <tr class="border_bottom">
                                        <td class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td colspan="2" class="reset-padding-all">
                                                        <p class="fix-tex-zise-10">METHOD OF TRANSPORTATION (Mark one)</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class = "reset-padding-all">
                                                           <input type="checkbox" value="Vessel" <?php if ($showbook->method_trans == 'Vessel'): ?>checked='checked'<?php endif; ?> disabled="" />
                                                           <label>Vessel</label>                  
                                                    </td>
                                                    <td width="50%" rowspan="2" valign="middle" class = "reset-padding-all">
                                                        
                                                            <input  type="checkbox" value="Other-Speclfys" <?php if ($showbook->method_trans == 'Other - Special'): ?>checked='checked'<?php endif; ?> disabled=""> 
                                                             <label>Other-Specify</label>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class ="reset-padding-all">
                                                     
                                                            <input type="checkbox" value="Air" <?php if ($showbook->method_trans == 'Air'): ?>checked='checked'<?php endif; ?> disabled=""> 
                                                            <label>Air</label> 
                                                    </td>
                                                </tr>

                                            </tbody></table>

                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td class="reset-padding-all">
                                            <p class="fix-tex-zise-10">ULTIMATE CONSIGNEE (Give name and Address if this party is not shown in item 3) </p>
                                        </td>
                                    </tr>

                                    <tr class="border_bottom">
                                        <td class="reset-padding-all">
                                            <p class="fix-tex-zise-10">DATE OF EXPORTATION (Not required for vessel shipments)
                                        <font color="#033264"> {{date_format(date_create($showbook->date_export),"m/d/Y") }}</font></p>
                                        </td>
                                    </tr>

                                    <tr class="border_bottom">
                                        <td class="reset-padding-all">
                                            <p class="fix-tex-zise-10">COUNTRY OF ULTIMATE DESTINATION</p>
                                            <p class="blueacl font-bold"> {!! $showbook->country_des !!} </p>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td height="30" class="reset-padding-all">
                                            <p class="fix-tex-zise-10">EXPORTER'S EIN(IRS) NUMBER  </p>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td height="30" colspan="2" class="reset-padding-all">
                                                        <p class="fix-tex-zise-10">METHOD OF TRANSPORTATION 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="50%" class = "reset-padding-all">
                                                        <p>
                                                            <input  class = "fix-style-input" type="checkbox" value="Related" <?php if ($showbook->parties_trans == 'Related'): ?>checked='checked'<?php endif; ?> disabled=""> Related </p>
                                                    </td>
                                                    <td width="50%" class = "reset-padding-all">
                                                        <p>
                                                            <input  class = "fix-style-input" type="checkbox" value="Non-Related" <?php if ($showbook->parties_trans == 'Non-Related'): ?>checked='checked'<?php endif; ?> disabled=""> Non-Related</p>
                                                    </td>
                                                </tr>

                                            </tbody></table>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="reset-padding-all" >
                                            <div class="arrow-text"><p style="font-size: 8px;">Export shipments are subject to inspection by U.S</p>
                                             
                                            <p style="font-size: 8px;">Customs Service add/or Office of Export Enforcement</p></div>
                                             
                                        </td>
                                    </tr>

                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                </td>


            </tr>





            <tr style = "display:block;">
                <td colspan="5" class="reset-padding-all">
                    <table width="1000" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td width="105" class="reset-padding-all ">
                                <p>FCL/FCL</p>
                               
                                <p>GRSD3584</p>

                            </td>
                            <td width="81" class="reset-padding-all border_right border_left" >

                               

                              <p class="blueacl font-bold">{{$showbook->package_no}}</p>


                            </td>
                            <td width="300" height="180" class="reset-padding-all border_right border_bottom">
                                <pre class="blueacl font-bold" style="white-space: pre-wrap;">{{$showbook->kind_package_no}}</pre>
                            </td>
                            <td class="reset-padding-all border_right border_bottom" width="120">

                              <p class="blueacl font-bold">{{$showbook->gross_weight}}</p>

                            </td>
                            <td width="142" class="reset-padding-all border_bottom" >


                              <p class="blueacl font-bold">{{$showbook->measurement}}</p>


                            </td>
                            <td width="212" class="reset-padding-all border_left  border_bottom">
                              <table width="250" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr class="border_bottom">
                                        <td class="reset-padding-all">
                                            <p class="fix-tex-zise-10">CD - Check digit</p>
                                            <p style="font-size:7px">Value - Selling price or cost if not sold (U.S dollars, omit certs) </p>
                                            <p style="font-size:7px">Quantity - Schedule B unit(s) (Nearest whole unit)</p>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr class = "fix_height">
                                                    <td width="175" align="left" valign="top" class="reset-padding-all">
                                                        <p class="fix-tag-p reset-padding-all">SCHEDULE B NO.</p>
                                                    </td>
                                                    <td width="75" align="left" valign="top" class="border_left reset-padding-all">
                                                      <p class="fix-tag-p">CD</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>

                                    </tr>
                                    <tr class="border_bottom">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr class = "fix_height">
                                                    <td width="125" align="left" valign="top" class="reset-padding-all"> 
                                                        <p class="fix-tag-p reset-padding-all">QUANTILY 1</p>
                                                    </td>
                                                    <td width="125" align="left" valign="top" class="border_left reset-padding-all">
                                                      <p class="fix-tag-p">QUANTILY 2</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>

                                    </tr>
                                    <tr class="border_bottom fix_height">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <p class="fix-tag-p reset-padding-all font-bold">VALUE: <font color="#033264"> {!! $showbook->value !!} </font></p>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr class = "fix_height">
                                                    <td width="175" align="left" valign="top" class="reset-padding-all">
                                                        <p class="fix-tag-p reset-padding-all">SCHEDULE B NO.</p>
                                                    </td>
                                                    <td width="75" align="left" valign="top" class="border_left reset-padding-all">
                                                        <p class="fix-tag-p">CD</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>

                                    </tr>
                                    <tr class="border_bottom">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr class = "fix_height">
                                                    <td width="125" align="left" valign="top" class="reset-padding-all">
                                                      <p class="fix-tag-p">QUANTILY 1</p>
                                                    </td>
                                                    <td width="125" align="left" valign="top" class="border_left reset-padding-all">
                                                      <p class="fix-tag-p">QUANTILY 2</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>

                                    </tr>
                                    <tr class="border_bottom fix_height">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <p class="fix-tag-p reset-padding-all">VALUE</p>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr class = "fix_height">
                                                    <td width="175" align="left" valign="top" class="reset-padding-all">
                                                        <p class="fix-tag-p ">SCHEDULE B NO.</p>
                                                    </td>
                                                    <td width="75" align="left" valign="top" class="border_left reset-padding-all">
                                                        <p class="fix-tag-p">CD</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                <tbody><tr class = "fix_height">
                                                    <td width="175" align="left" valign="top" class="reset-padding-all">
                                                        <p>QUANTILY 1</p>
                                                    </td>
                                                    <td width="175" align="left" valign="top" class="border_left reset-padding-all">
                                                      <p class="fix-tag-p">QUANTILY 2</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                    <tr class = "fix_height">
                                        <td align="left" valign="top" class="reset-padding-all">
                                            <p>VALUE</p>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>

            <tr style = "display:block;">
                <td colspan="5" class="reset-padding-all">
                    <table width="1000" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td width="106" class="reset-padding-all border_bottom " >
                            </td>
                            <td width="81" class="reset-padding-all  border_left border_bottom" >
                    </td>
                            <td class="reset-padding-all  border_right border_left" width="228">
                      <p>VALIDATED LICENSE NO./GENERAL LICENSE SYMBOL</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <pre class="font-bold">     G-DEST</pre>
                            </td>
                            <td width="69" align="center" valign="top" class="reset-padding-all ">
                              <p>ECCN (When repired)</p>
                            </td>
                            <td width="438" class="reset-padding-all border_left border_bottom" >
<table width="514" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                        <td colspan="3" class="reset-padding-all ">
                                            <p class="fix-tex-zise-1" style="padding-left: 20px">I certify that all statements made and all information contained herein are true and correct and that I have read and understand the instruction for preparation of this document, set forth in the "Correct Way to Fill out the Shipper's Export Declaration."  I understand that civil and criminal penalties, including forfeitrue and sale, may be imposed for making false or fraudulent statements herein, failing to provide the requested information, or for violation of U.S laws on exportation (13 U.S.C sec. 305; 22 U.S.C Sec 401; 18 U.S.C Sec. 1001; 50 U.S.C App. 2410)</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="180" class="reset-padding-all">
                                            <p class="blueacl font-bold" style="padding-left: 20px">{{$showbook->bookedby}}</p>
                                        </td>
                                        <td width="152" class="reset-padding-all">                                       
                                        </td>
                                        <td width="180" class="text-right reset-padding-all">
                                            <p class="blueacl font-bold"><?php echo date("m/d/Y"); ?></p>
                                        </td>
                                    </tr>
                                </tbody></table>

                            </td>
                        </tr>
                    </tbody></table>

                </td>


            </tr>
            <tr style = "display:block;">
                <td colspan="5" class="reset-padding-all">
                    <table width="1000" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td width="415" class="reset-padding-all">
                                <p style="font-size: 7px;">
                                The "Correct Way to Fill out the Shipper's Export Declaration" is vailable from the Bureau of the Census, Washington, D.C.20233.
                                </p>
                            </td>
                            <td width="71" class="reset-padding-all"></td>
                            <td width="438" class="reset-padding-all">
                                <table width="514" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                        <td style="padding-left: 20px" width="180" class="reset-padding-all border-left">(Signature)</td>
                                        <td width="152" class="reset-padding-all ">(Title)</td>
                                        <td width="180" align="right" class="reset-padding-all">(Date)</td>
                                    </tr>
                                </tbody>
                                </table>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody></table>

        <input type="button" class="hide" onclick="window.print()" value="Print"/>
    </div>
</body>
</html>