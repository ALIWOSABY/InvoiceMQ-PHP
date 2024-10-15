<?php
error_reporting(0);
session_start();


require_once '../Models/SuppModel.php';
require_once '../Assets/mpdf/vendor/autoload.php';
require_once '../Classes/tn_s.class.php';
require_once '../Classes/v_s.class.php';
require_once '../Classes/types.php';
require_once '../Models/paramerterModel.php';
require_once '../Classes/paramerters.class.php';
require_once '../Classes/types.php';
require_once '../db/config.php';
require_once 'Arabic.php';


function char_num($num)
{
  $Arabic = new I18N_Arabic('Numbers');
  $str = $Arabic->money2str($num, 'YER', 'ar');
  return $str . ' فقط لاغير ';
}



//  تقرير الموردين
if ($_POST['methode'] == "Prt_Supp_Frm") {

  $tm = new SuppModel();
  $v = new v_s();

  $vou_id = $_POST['id'];
  $name_user =  $_POST['VOU_USE_name'];
  $VOU_STATUS =  $_POST['VS_ST'];
  $VS_TYP_ID =  $_POST['VS_TYP_ID'];


  $m = new paramerterModel();
  $info = $m->getallParamter();
  $company = $info[0]->getPar_Addr1();
  $city = $info[0]->getPar_Addr2();
  $par_name = $info[0]->getpar_name();
  $center = $info[0]->getPar_Addr3();
  $title = $info[0]->getPar_logo();


  $companyy = $info[0]->getPar_Addr1e();
  $par_namee = $info[0]->getpar_namee();
  $cityy = $info[0]->getPar_Addr2e();
  $centerr = $info[0]->getPar_Addr3e();



  $x = $tm->get_prin_VT_Supp($vou_id);
  $VTS_ID = $x[0]->getVSID();
  $VTS_date = $x[0]->getVSDAT();
  $VTS_NT = $x[0]->getVSNT();
  $VTS_TYP_NO = $x[0]->getVSTYPNO();


  $stmtACC = mysqli_query($conn, "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`,`SUPP_ID`, `SUPP_NAME`,`TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD` FROM `v_s`,`supp` where VS_ID =$vou_id and VS_BENF=SUPP_ID");
  while ($row = mysqli_fetch_array($stmtACC)) :
    $SUPP_NAME = $row['SUPP_NAME'];
    $TSTOTDYCOM = $row['TSTOTDYCOM'];
    $TSITOTRET = $row['TSITOTRET'];
    $TSTOTSALE = $row['TSTOTSALE'];
    $TSMUS = $row['TSMUS'];
    $TSHISREMD = $row['TSHISREMD'];
    $TSONREMD = $row['TSONREMD'];
  endwhile;




  $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal', 'orientation' => 'L', 'margin_top' => 30]);
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->autoScriptToLang = True;
  $mpdf->autoLangToFont = True;

  $header = '
  <table class="tabh" width="100%" height="48%" >
  <tr class="tabh">
  <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $companyy . '</small></td>       
  <td class="tabh"  width="40%" align="center" rowspan="3" > <img width="20%" height="60px" src="' . $title . '" class="logo" /></td>
  <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $company . '</small></td>  
    
      </tr>
<tr class="tabh">
        <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_namee . '</small></td>
        <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_name . '</small></td>   
      </tr>
<tr>

<td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $cityy . '-' .   $centerr . '</small></td>
<td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $city . '-' .   $center . '</small></td>                      
      </tr>



      <tr>

      <td class="tabh"  width="30%"><small style="font-size:12px; font-weight: bold">المستخدم : ' . $name_user . '</small></td>
      <td  class="tabh" width="30%" align="center"><small style="font-size:20px; font-weight: bold" ></small></td>
            
      <td class="tabh" width="40%" align="center" ><small style="font-size:12px; font-weight: bold" >اسم الرعوي : ' . $SUPP_NAME . '</small></td>        
    </tr>


<tr>

<td class="tab_td1"  width="30%"><small style="font-size:10px;">صفحة :{PAGENO}</small></td>
<td  class="tab_td" width="40%" align="center"><small style="font-size:20px; font-weight: bold" >فاتورة للمورد</small></td>
      
<td class="tab_td3" width="40%" align="center" ><small style="font-size:12px;" >{DATE j-m-Y} : تاريخ الطبع</small></td>
    

</tr>

</table>';
  $mpdf->SetHeader($header);
  $mpdf->SetFooter('');
  $mpdf->AddPage('L', '', '', '', '', 10, 10, 42, 20, 10, 10);



  $content_num = '
    <div style="white-space: nowrap;   border-width: 1px;">  
    <table width="100%" style="direction:rtl; text-align: right;">
                             <tr>  
                             <td width="8%" style="text-align: right; font-weight:bold;font-size:15px;color:blue">رقم الفاتورة :</td>
                             <td  width="10%" style="text-align: right;float:right;border: 1px solid black;border-collapse: collapse;text-align: center; font-weight:bold;font-size:15px;color:blue;">' . $VTS_TYP_NO . '</td>
                             <td width="15%" style="text-align: right; font-weight:bold;font-size:15px;color:blue"></td>                      
                             <td width="15%" style="text-align: right; font-weight:bold;font-size:15px;color:blue"></td>
                             <td width="57%" style="text-align: right; font-weight:bold;font-size:15px;color:blue"></td>                              
                             </tr>                            
        </table>
   
  </div>
';
  $mpdf->WriteHTML($content_num);



  $html1 = '
  <link rel="stylesheet" href="../Assets/css/style.css" />  
    <table  width="100%" style="direction:rtl;" height="30%" >                              
                                  <tr class="haed_acc" style="text-align: center;">
                                  <!-- <th class="haed_acc"  width="10%"  style="text-align: center;"> الفاتورة</th> -->
                                      <th class="haed_acc"  width="10%"   style="text-align: center;">التأريخ</th>
                                      <!--<th class="haed_acc" width="20%" style="text-align: center;">اسم الرعوي</th>   -->                                   
                                      <th class="haed_acc" width="8%" style="text-align: center;">الملاحظة</th>                                              
                                      ';
  $html1 .= '</tr></thead><tbody>';
  $html1 .= '<tr>             
  <!--<td  rowspan="2"  width="10%" style="text-align: center;font-size:10px;font-weight:bold;"> . $VTS_ID . </td>-->

  <td width="10%" rowspan="2" style="text-align: center;font-size:10px;font-weight:bold;">' . date("d-m-Y", strtotime($VTS_date)) . '</td>       
  <!--<td  rowspan="2"  width="8%" style="text-align: center;font-size:10px;font-weight:bold;"> . SUPP_NAME . </td>-->
  <td  rowspan="2" width="12%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $VTS_NT . '</td>';



  $html1 .= '</tr></tbody>';
  $html1 .= '</table>';
  $mpdf->WriteHTML($html1);


  $sqlOne = mysqli_query($conn, "SELECT `TS_V_ID`, `TS_SER`, `TS_DY`, `TS_NUM`, `TS_PRC`, `TS_TOT`, `TS_DISC`, `TSTOTDISC`,`TSNT`, `TSDAT`,`DY_ID`, `DY_name` FROM `tn_s`,`days` Where TS_DY= DY_ID and TS_V_ID =$vou_id");


  $html2 = '
  <link rel="stylesheet" href="../Assets/css/style.css" />   
    <table  width="100%" style="direction:rtl;" height="30%" >                    
                                  <tr class="haed_acc" style="text-align: center;">
                                      <th class="haed_acc"  width="10%"  style="text-align: center;">الرقم</th>
                                      <th class="haed_acc"  width="10%"   style="text-align: center;">اليوم</th>
                                      <th class="haed_acc"  width="10%"  style="text-align: center;">العدد</th>
                                      <th class="haed_acc"  width="10%" style="text-align: center;">السعر</th>
                                      <th class="haed_acc" width="20%" style="text-align: center;">الإجمالي</th>                                      
                                      <th class="haed_acc"  width="10%"  style="text-align: center;">الخصم</th>
                                      <th class="haed_acc"  width="10%"  style="text-align: center;">اجمالي بعد الخصم</th>
                                      <th class="haed_acc"  width="10%"  style="text-align: center;">الملاحظات</th>
                                      ';
  $html2 .= '</tr></thead><tbody>';
  while ($rsupon = mysqli_fetch_array($sqlOne)) {

    $html2 .= '<tr>       
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['TS_SER'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['DY_name'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['TS_NUM'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['TS_PRC'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['TS_TOT'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['TS_DISC'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['TSTOTDISC'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupon['TSNT'] . '</td>';
  }
  $html2 .= '</tr></tbody><tfoot>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">أجمالي يوم كامل</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TSTOTDYCOM . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">نسبة التخفيض</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSITOTRET . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">الصافي</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSTOTSALE . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المسلم</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TSMUS . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';

  $html2 .= '</tr>';

  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى علية</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSHISREMD . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';

  $html2 .= '</tr>';

  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى له</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSONREMD . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr></tfoot>';


  $html2 .= '</table>';
  $mpdf->WriteHTML($html2);



  $mpdf->Output('../Assets/mpdf/RSR.pdf');
  echo '../../Assets/mpdf/RSR.pdf';
}



// ===========================================================================================================================
//R all V T S for one day
if ($_POST['methode'] == "pnt_all_vts") {

  $tm = new SuppModel();
  $v = new v_s();

  $date_start =  $_POST['i_date1'];
  $date_end =  $_POST['i_date2'];


  $name_user =  $_POST['VOU_USE_name'];
  $BRA_NAMEE = $_POST['Branch_desc'];


  $m = new paramerterModel();
  $info = $m->getallParamter();


  $company = $info[0]->getPar_Addr1();
  $city = $info[0]->getPar_Addr2();
  $par_name = $info[0]->getpar_name();
  $center = $info[0]->getPar_Addr3();
  $title = $info[0]->getPar_logo();


  $companyy = $info[0]->getPar_Addr1e();
  $par_namee = $info[0]->getpar_namee();
  $cityy = $info[0]->getPar_Addr2e();
  $centerr = $info[0]->getPar_Addr3e();



  // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236],    'margin_top' => 30]);
  $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal', 'orientation' => 'L', 'margin_top' => 30]);
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->autoScriptToLang = True;
  $mpdf->autoLangToFont = True;

  $header = '
          <table class="tabh" width="100%" height="48%" >  
          <tr class="tabh">
          <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $companyy . '</small></td>       
          <td class="tabh"  width="40%" align="center" rowspan="3" > <img width="20%" height="60px" src="' . $title . '" class="logo" /></td>
          <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $company . '</small></td>  
            
              </tr>
        <tr class="tabh">
                <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_namee . '</small></td>
                <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_name . '</small></td>   
              </tr>
        <tr>

        <td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $cityy . '-' .   $centerr . '</small></td>
        <td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $city . '-' .   $center . '</small></td>                      
              </tr>

      <tr>

      <td class="tabh"  width="30%"><small style="font-size:12px; font-weight: bold">المستخدم : ' . $name_user . '</small></td>
      <td  class="tabh" width="30%" align="center"><small style="font-size:12px; font-weight: bold" >{DATE j-m-Y} : تاريخ الطبع</small></td>
            
      <td class="tabh" width="40%" align="center" ><small style="font-size:12px; font-weight: bold" >' . $BRA_NAMEE . '</small></td>
          

    </tr>


      <tr>

    <td class="tab_td1"  width="30%"><small style="font-size:10px;">صفحة :{PAGENO}</small></td>
    <td  class="tab_td" width="40%" align="center"><small style="font-size:20px; font-weight: bold" > فاتورة للمورد </small></td>
          
    <td  class="tab_td3" width="30%" align="right"><small style="font-size:10px;"> الفترة من: ' . $date_start . '  الى : ' . $date_end . '</small></td>                                  
        

    </tr>

</table>';
  $mpdf->SetHeader($header);
  $mpdf->SetFooter('');
  $date = date("Y-m-d");


  $sql_one = mysqli_query($conn, "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`, `TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`,`TYP_ID`, `TYP_NAME`,`SUPP_ID`, `SUPP_NAME` FROM v_s,types,`supp` WHERE VS_ST = '0' and VS_DAT  BETWEEN '$date_start' and '$date_end' and VS_TYP_ID=TYP_ID and VS_BENF=SUPP_ID ORDER BY VS_DAT,VS_ID");
  while ($rlt1 = mysqli_fetch_array($sql_one)) {
    $VOUID = $rlt1['VS_ID'];
    $SUPP_NAME = $rlt1['SUPP_NAME'];
    $TSTOTDYCOM = $rlt1['TSTOTDYCOM'];
    $TSITOTRET = $rlt1['TSITOTRET'];
    $TSTOTSALE = $rlt1['TSTOTSALE'];
    $TSMUS = $rlt1['TSMUS'];
    $TSHISREMD = $rlt1['TSHISREMD'];
    $TSONREMD = $rlt1['TSONREMD'];
    $sql_two = mysqli_query($conn, "SELECT `TS_V_ID`, `TS_SER`, `TS_DY`, `TS_NUM`, `TS_PRC`, `TS_TOT`, `TS_DISC`, `TSTOTDISC`,`TSNT`, `TSDAT`,`DY_ID`, `DY_name` FROM `tn_s`,`days` WHERE TS_V_ID=$VOUID and TS_DY= DY_ID");

    $html1 = '  
      <br/>
      <link rel="stylesheet" href="../Assets/css/style.css" />  
        <table  width="100%" style="direction:rtl;" height="30%" >

        <tr class="haed_acc">                                        
        <th class="haed_acc"  style="text-align: center;">تاريخ العملية</th>
        <th class="haed_acc" colspan="2">' . date("d-m-Y", strtotime($rlt1['VS_DAT'])) . '</th>
        <th class="haed_acc" width="10%" style="text-align: center;">اسم المورد</div></th>                                                                                                                    
        <th class="haed_acc" width="15%" style="text-align: center;" colspan="2">' . $rlt1['SUPP_NAME'] . '</th>                                                                                                        
        <th class="haed_acc" width="10%" style="text-align: center;" colspan="1">البيان</th>
        <th class="haed_acc" width="20%" style="text-align: center;" colspan="5">' . $rlt1['VS_NT'] . '</th>
    </tr>
    <tr class="haed_acc">
              <th class="haed_acc"  width="10%"  style="text-align: center;">الرقم</th>
              <th class="haed_acc"  width="10%"   style="text-align: center;">اليوم</th>
              <th class="haed_acc"  width="10%"  style="text-align: center;">العدد</th>
              <th class="haed_acc"  width="10%" style="text-align: center;">السعر</th>
              <th class="haed_acc" width="20%" style="text-align: center;">الإجمالي</th>                                      
              <th class="haed_acc"  width="15%"  style="text-align: center;">الخصم</th>
              <th class="haed_acc"  width="15%"  style="text-align: center;">اجمالي بعد الخصم</th>
              <th class="haed_acc"  width="20%"  style="text-align: center;">الملاحظات</th>
              ';
    $html1 .= '</tr></thead><tbody>';
    while ($rsupa = mysqli_fetch_array($sql_two)) {
      $html1 .= '<tr>               
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_SER'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['DY_name'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_NUM'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_PRC'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_TOT'] . '</td>
      <td   width="15%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_DISC'] . '</td>
      <td   width="15%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TSTOTDISC'] . '</td>
      <td   width="20%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TSNT'] . '</td>';
    }
    $html1 .= '</tr>';
    $html1 .=  $mpdf->AddPage('L', '', '', '', '', 10, 10, 37, 20, 10, 10);
    $html1 .= '</tbody>';

    $html1 .= '<tfoot><tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">أجمالي يوم كامل</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TSTOTDYCOM . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr>';
    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">نسبة التخفيض</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSITOTRET . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr>';
    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">الصافي</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSTOTSALE . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr>';
    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المسلم</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TSMUS . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';

    $html1 .= '</tr>';

    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى علية</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSHISREMD . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';

    $html1 .= '</tr>';

    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى له</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSONREMD . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr></tfoot>';
    $html1 .= '</table>';
    $mpdf->WriteHTML($html1);
  }
  $mpdf->Output('../Assets/mpdf/PVTS_A.pdf');
  echo '../../Assets/mpdf/PVTS_A.pdf';
}





// ==================================== All supp for all days

// ===========================================================================================================================
//R all V T S for one day
if ($_POST['methode'] == "get_id_supprcomp") {

  $tm = new SuppModel();
  $v = new v_s();


  $sup_id = $_POST['idsupp'];
  $date_start =  $_POST['i_date1'];
  $date_end =  $_POST['i_date2'];


  $name_user =  $_POST['VOU_USE_name'];
  $BRA_NAMEE = $_POST['Branch_desc'];


  $m = new paramerterModel();
  $info = $m->getallParamter();


  $company = $info[0]->getPar_Addr1();
  $city = $info[0]->getPar_Addr2();
  $par_name = $info[0]->getpar_name();
  $center = $info[0]->getPar_Addr3();
  $title = $info[0]->getPar_logo();


  $companyy = $info[0]->getPar_Addr1e();
  $par_namee = $info[0]->getpar_namee();
  $cityy = $info[0]->getPar_Addr2e();
  $centerr = $info[0]->getPar_Addr3e();



  // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236],    'margin_top' => 30]);
  $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal', 'orientation' => 'L', 'margin_top' => 30]);
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->autoScriptToLang = True;
  $mpdf->autoLangToFont = True;

  $header = '
          <table class="tabh" width="100%" height="48%" >  
          <tr class="tabh">
          <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $companyy . '</small></td>       
          <td class="tabh"  width="40%" align="center" rowspan="3" > <img width="20%" height="60px" src="' . $title . '" class="logo" /></td>
          <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $company . '</small></td>  
            
              </tr>
        <tr class="tabh">
                <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_namee . '</small></td>
                <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_name . '</small></td>   
              </tr>
        <tr>

        <td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $cityy . '-' .   $centerr . '</small></td>
        <td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $city . '-' .   $center . '</small></td>                      
              </tr>

      <tr>

      <td class="tabh"  width="30%"><small style="font-size:12px; font-weight: bold">المستخدم : ' . $name_user . '</small></td>
      <td  class="tabh" width="30%" align="center"><small style="font-size:12px; font-weight: bold" >{DATE j-m-Y} : تاريخ الطبع</small></td>
            
      <td class="tabh" width="40%" align="center" ><small style="font-size:12px; font-weight: bold" >' . $BRA_NAMEE . '</small></td>
          

    </tr>


      <tr>

    <td class="tab_td1"  width="30%"><small style="font-size:10px;">صفحة :{PAGENO}</small></td>
    <td  class="tab_td" width="40%" align="center"><small style="font-size:20px; font-weight: bold" > فاتورة للمورد</small></td>
          
    <td  class="tab_td3" width="30%" align="right"><small style="font-size:10px;"> الفترة من: ' . $date_start . '  الى : ' . $date_end . '</small></td>                                  
        

    </tr>

</table>';
  $mpdf->SetHeader($header);
  $mpdf->SetFooter('');
  $date = date("Y-m-d");
  $mpdf->AddPage('L', '', '', '', '', 10, 10, 37, 20, 10, 10);


  $sql_sup = mysqli_query($conn, "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`,`TYP_ID`, `TYP_NAME`,`SUPP_ID`, `SUPP_NAME` FROM v_s,types INNER JOIN supp ON supp.SUPP_ID LIKE '$sup_id' WHERE VS_ST = '0' and VS_DAT  BETWEEN '$date_start' and '$date_end' and VS_TYP_ID=TYP_ID and VS_BENF LIKE '$sup_id' ORDER BY VS_DAT,VS_ID");
  while ($rlt_sup = mysqli_fetch_array($sql_sup)) {
    $VOUID = $rlt_sup['VS_ID'];
    $Nsup = $rlt_sup['SUPP_NAME'];
    $Nvnot = $rlt_sup['VS_NT'];
  }



  $sql_one = mysqli_query($conn, "SELECT `AMNTS_ID`,`SUPP_ID`, `SUPP_NAME`, `AMNTS_V_ID`, `AMNTS_DAT`,`AMTS_BENF`,
  IFNULL(SUM(TSTOTSALE),0) AS TSTOTSALE,IFNULL(SUM(`TSMUS`),0) As TSMUS,
  IFNULL(SUM(TSHISREMD),0) - IFNULL(SUM(DLIVAMNT),0) -IFNULL(SUM(TSONREMD),0) + IFNULL(SUM(DLIVAMNT),0) AS TSHISREMD,
  IFNULL(SUM(TSONREMD),0) + IFNULL(SUM(DLIVAMNT),0) -IFNULL(SUM(TSHISREMD),0) AS TSONREMD,
  IFNULL(SUM(DLIVAMNT),0) AS DLIVAMNT FROM `amnt_dlivd` INNER JOIN supp ON supp.SUPP_ID LIKE '$sup_id'  WHERE AMNTS_DAT  BETWEEN '$date_start' and '$date_end'  and AMTS_BENF LIKE '$sup_id' ORDER BY AMNTS_DAT,AMNTS_ID");
  while ($rlt1 = mysqli_fetch_array($sql_one)) {
    // $SUPP_NAME = $rlt1['SUPP_NAME'];
    // // $TSTOTDYCOM = $rlt1['TSTOTDYCOM'];
    // // $TSITOTRET = $rlt1['TSITOTRET'];
    $TSTOTSALE = $rlt1['TSTOTSALE'];
    $TSMUS = $rlt1['TSMUS'];

    if ($rlt1['TSHISREMD'] > 0) {
      $TSHISREMD = $rlt1['TSHISREMD'];
    } else {
      $TSHISREMD = 0;
    }


    if ($rlt1['TSONREMD'] > 0) {
      $TSONREMD = $rlt1['TSONREMD'];
    } else {
      $TSONREMD = 0;
    }

    $DLIVAMNT = $rlt1['DLIVAMNT'];
  }
  $sql_two = mysqli_query($conn, "SELECT s.TSTOTSALE, s.TS_SER,days.DY_name, s.TS_NUM, s.TS_PRC, s.TS_TOT, s.TS_DISC,s.TSTOTDISC,
  s.TSNT, s.TSDAT,s.TSMUS,typ.TYP_ID,typ.TYP_NAME,supp.SUPP_ID, supp.SUPP_NAME,(SELECT COUNT(*) 
  FROM tn_s s2 WHERE s2.TS_V_ID = s.TS_V_ID) 
  FROM v_s,types typ,tn_s s INNER JOIN supp ON supp.SUPP_ID LIKE '$sup_id' INNER JOIN `days`
  ON s.TS_DY=days.DY_ID  WHERE VS_ST = '0' and TSDAT  BETWEEN '$date_start' and '$date_end' 
  and VS_TYP_ID=TYP_ID and VS_BENF LIKE '$sup_id' and TS_V_ID = VS_ID  ORDER BY TSDAT,TS_V_ID;");
  $html1 = '
      <br/>
      <link rel="stylesheet" href="../Assets/css/style.css" />  
        <table  width="100%" style="direction:rtl;" height="30%" >

        <tr class="haed_acc">                                               
        <th class="haed_acc"  width="10%" style="text-align: center;">اسم المورد</div></th>                                                                                                                    
        <th class="haed_acc" width="15%" style="text-align: center;" colspan="2">' . $Nsup  . '</th>                                                                                                        
        <th class="haed_acc" width="10%" style="text-align: center;" colspan="1">البيان</th>
        <th class="haed_acc" width="20%" style="text-align: center;" colspan="4">' . $Nvnot  . '</th>
    </tr>
	
	
        <thead>
    <tr class="haed_acc">
              <th class="haed_acc"  width="10%"  style="text-align: center;">الرقم</th>
              <th class="haed_acc"  width="10%"   style="text-align: center;">اليوم</th>
              <th class="haed_acc"  width="15%"   style="text-align: center;">التأريخ</th>
              <th class="haed_acc"  width="10%"  style="text-align: center;">العدد</th>
              <th class="haed_acc"  width="12%" style="text-align: center;">السعر</th>       
              <th class="haed_acc"  width="15%"  style="text-align: center;">اجمالي بعد الخصم</th>
              <th class="haed_acc"  width="12%"  style="text-align: center;">المسلم</th>
              <th class="haed_acc"  width="18%"  style="text-align: center;">الملاحظات</th>
              ';
  $html1 .= '</tr>

  
  
  
  </thead><tbody>';
  $html1 .= '<tr>               
  <td  colspan="5" width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">متبقي البيان السابق</td>
  <td     style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . 0.00 . '</td>
  <td   style="text-align: center;font-size:10px;font-weight:bold;"></td>
  <td    style="text-align: center;font-size:10px;font-weight:bold;"></td>';
  $html1 .= '</tr>';
  $html1 .= '</tr>';
  $tmpAlbum = '';
  while ($rsupa = mysqli_fetch_array($sql_two)) {
    $html1 .= '<tr>               
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_SER'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['DY_name'] . '</td>
      <td   width="15%"  style="text-align: center;font-size:10px;font-weight:bold;">' . date("d-m-Y", strtotime($rsupa["TSDAT"])) . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_NUM'] . '</td>
      <td   width="12%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_PRC'] . '</td>';
    if ($rsupa[0] != $tmpAlbum || $rsupa[0] == '0' ) {
      $html1 .= '<td width="15%"  style="text-align: center;font-size:10px;font-weight:bold;" rowspan=\'' . $rsupa[15] . '\'>' . $rsupa['TSTOTSALE'] . '</td>';
      $html1 .= '<td width="12%"  style="text-align: center;font-size:10px;font-weight:bold;" rowspan=\'' . $rsupa[15] . '\'>' . $rsupa['TSMUS'] . '</td>';

    }
    
    $html1 .= '
    <td  width="18%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TSNT'] . '</td>';
    $tmpAlbum = $rsupa[0];
    $html1 .= '</tr>';
    $html1 .= '</tbody>';
  }
  $html1 .= '<tfoot><tr>             
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">الصافي</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSTOTSALE . '</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';
  $html1 .= '</tr>';
  $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">اجمالي المسلم</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TSMUS . '</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';

  $html1 .= '</tr>';

  $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى له</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSHISREMD . '</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';

  $html1 .= '</tr>';

  $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى عليه</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSONREMD . '</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';

  $html1 .= '</tr>';

  $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">الفلوس الموصله</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $DLIVAMNT . '</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';
  $html1 .= '</tr></tfoot>';
  $html1 .= '</table>';
  $mpdf->WriteHTML($html1);


  $query = "SELECT s.TSTOTSALE, s.TS_SER,days.DY_name, s.TS_NUM, s.TS_PRC, s.TS_TOT, s.TS_DISC,s.TSTOTDISC,
  s.TSNT, s.TSDAT,typ.TYP_ID,typ.TYP_NAME,supp.SUPP_ID, supp.SUPP_NAME,(SELECT COUNT(*) 
  FROM tn_s s2 WHERE s2.TS_V_ID = s.TS_V_ID) 
  FROM v_s,types typ,tn_s s INNER JOIN supp ON supp.SUPP_ID LIKE '$sup_id' INNER JOIN `days`
  ON s.TS_DY=days.DY_ID  WHERE VS_ST = '0' and TSDAT  BETWEEN '$date_start' and '$date_end' 
  and VS_TYP_ID=TYP_ID and VS_BENF LIKE '$sup_id' and TS_V_ID = VS_ID  ORDER BY TSDAT,TS_V_ID;";
  $result = mysqli_query($conn, $query);

  // $html2 = '
  // <br/>
  // <br/>
  // <br/>
  // <br/>
  // <br/>
  // <br/>
  // <br/>
  // <link rel="stylesheet" href="../Assets/css/style.css" />  
  //   <table  width="100%" style="direction:rtl;" height="30%" >
  //   <thead>
  //   <tr class="haed_acc">
  //   <th class="haed_acc" width="10%"  style="text-align: center;">id one</th>
  //   <th class="haed_acc" width="10%"  style="text-align: center;">id </th>
  //   ';

  // // <th  class="haed_acc" width="10%"   style="text-align: center;">serial id</th>
  // $html2 .= '</tr></thead><tbody>';


  // $tmpAlbum = '';

  // while ($data = mysqli_fetch_array($result)) {
  //   $html2 .= '<tr>';
  //   $html2 .= '<td>' . $data['TS_SER'] . '</td>';
  //   if ($data[0] != $tmpAlbum) {
  //     $html2 .= '<td rowspan=\'' . $data[14] . '\'>' . $data['TSTOTSALE'] . '</td>';
  //   }
  //   $tmpAlbum = $data[0];

  //   $html2 .= '</tr></tbody>';
  // }

  // $html2 .= '</table>';
  // $mpdf->WriteHTML($html2);





  $mpdf->Output('../Assets/mpdf/P_A_S.pdf');
  echo '../../Assets/mpdf/P_A_S.pdf';
}

// ===========================================================================================================================
//R all V T S for one day when st = 2
if ($_POST['methode'] == "get_id_supprcompfinish") {

  $tm = new SuppModel();
  $v = new v_s();


  $sup_id = $_POST['idsupp'];
  $date_start =  $_POST['i_date1'];
  $date_end =  $_POST['i_date2'];


  $name_user =  $_POST['VOU_USE_name'];
  $BRA_NAMEE = $_POST['Branch_desc'];


  $m = new paramerterModel();
  $info = $m->getallParamter();


  $company = $info[0]->getPar_Addr1();
  $city = $info[0]->getPar_Addr2();
  $par_name = $info[0]->getpar_name();
  $center = $info[0]->getPar_Addr3();
  $title = $info[0]->getPar_logo();


  $companyy = $info[0]->getPar_Addr1e();
  $par_namee = $info[0]->getpar_namee();
  $cityy = $info[0]->getPar_Addr2e();
  $centerr = $info[0]->getPar_Addr3e();



  // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236],    'margin_top' => 30]);
  $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal', 'orientation' => 'L', 'margin_top' => 30]);
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->autoScriptToLang = True;
  $mpdf->autoLangToFont = True;

  $header = '
          <table class="tabh" width="100%" height="48%" >  
          <tr class="tabh">
          <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $companyy . '</small></td>       
          <td class="tabh"  width="40%" align="center" rowspan="3" > <img width="20%" height="60px" src="' . $title . '" class="logo" /></td>
          <td class="tabh"  width="30%" align="center"><small style="font-size:15px; font-weight: bold">' . $company . '</small></td>  
            
              </tr>
        <tr class="tabh">
                <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_namee . '</small></td>
                <td class="tabh"  width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $par_name . '</small></td>   
              </tr>
        <tr>

        <td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $cityy . '-' .   $centerr . '</small></td>
        <td class="tabh" width="30%" align="center"  ><small style="font-size:14px; font-weight: bold">' . $city . '-' .   $center . '</small></td>                      
              </tr>

      <tr>

      <td class="tabh"  width="30%"><small style="font-size:12px; font-weight: bold">المستخدم : ' . $name_user . '</small></td>
      <td  class="tabh" width="30%" align="center"><small style="font-size:12px; font-weight: bold" >{DATE j-m-Y} : تاريخ الطبع</small></td>
            
      <td class="tabh" width="40%" align="center" ><small style="font-size:12px; font-weight: bold" >' . $BRA_NAMEE . '</small></td>
          

    </tr>


      <tr>

    <td class="tab_td1"  width="30%"><small style="font-size:10px;">صفحة :{PAGENO}</small></td>
    <td  class="tab_td" width="40%" align="center"><small style="font-size:20px; font-weight: bold" > فاتورة للمورد</small></td>
          
    <td  class="tab_td3" width="30%" align="right"><small style="font-size:10px;"> الفترة من: ' . $date_start . '  الى : ' . $date_end . '</small></td>                                  
        

    </tr>

</table>';
  $mpdf->SetHeader($header);
  $mpdf->SetFooter('');
  $date = date("Y-m-d");


  $sql_one = mysqli_query($conn, "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`, `TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`,`TYP_ID`, `TYP_NAME`,`SUPP_ID`, `SUPP_NAME` FROM v_s,types INNER JOIN supp ON supp.SUPP_ID LIKE '$sup_id' WHERE VS_ST = '2' and VS_DAT  BETWEEN '$date_start' and '$date_end' and VS_TYP_ID=TYP_ID and VS_BENF LIKE '$sup_id' ORDER BY VS_DAT,VS_ID");
  while ($rlt1 = mysqli_fetch_array($sql_one)) {
    $VOUID = $rlt1['VS_ID'];
    $SUPP_NAME = $rlt1['SUPP_NAME'];
    $TSTOTDYCOM = $rlt1['TSTOTDYCOM'];
    $TSITOTRET = $rlt1['TSITOTRET'];
    $TSTOTSALE = $rlt1['TSTOTSALE'];
    $TSMUS = $rlt1['TSMUS'];
    $TSHISREMD = $rlt1['TSHISREMD'];
    $TSONREMD = $rlt1['TSONREMD'];
    $sql_two = mysqli_query($conn, "SELECT `TS_V_ID`, `TS_SER`, `TS_DY`, `TS_NUM`, `TS_PRC`, `TS_TOT`, `TS_DISC`, `TSTOTDISC`,`TSNT`, `TSDAT`,`DY_ID`, `DY_name` FROM `tn_s`,`days` WHERE TS_V_ID=$VOUID and TS_DY= DY_ID");

    $html1 = '  
      <br/>
      <link rel="stylesheet" href="../Assets/css/style.css" />  
        <table  width="100%" style="direction:rtl;" height="30%" >

        <tr class="haed_acc">                                        
        <th class="haed_acc"  style="text-align: center;">تاريخ العملية</th>
        <th class="haed_acc" colspan="2">' . date("d-m-Y", strtotime($rlt1['VS_DAT'])) . '</th>
        <th class="haed_acc" width="10%" style="text-align: center;">اسم المورد</div></th>                                                                                                                    
        <th class="haed_acc" width="15%" style="text-align: center;" colspan="2">' . $rlt1['SUPP_NAME'] . '</th>                                                                                                        
        <th class="haed_acc" width="10%" style="text-align: center;" colspan="1">البيان</th>
        <th class="haed_acc" width="20%" style="text-align: center;" colspan="5">' . $rlt1['VS_NT'] . '</th>
    </tr>
    <tr class="haed_acc">
              <th class="haed_acc"  width="10%"  style="text-align: center;">الرقم</th>
              <th class="haed_acc"  width="10%"   style="text-align: center;">اليوم</th>
              <th class="haed_acc"  width="10%"  style="text-align: center;">العدد</th>
              <th class="haed_acc"  width="10%" style="text-align: center;">السعر</th>
              <th class="haed_acc" width="20%" style="text-align: center;">الإجمالي</th>                                      
              <th class="haed_acc"  width="10%"  style="text-align: center;">الخصم</th>
              <th class="haed_acc"  width="10%"  style="text-align: center;">اجمالي بعد الخصم</th>
              <th class="haed_acc"  width="10%"  style="text-align: center;">الملاحظات</th>
              ';
    $html1 .= '</tr></thead><tbody>';
    while ($rsupa = mysqli_fetch_array($sql_two)) {
      $html1 .= '<tr >               
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_SER'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['DY_name'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_NUM'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_PRC'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_TOT'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TS_DISC'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TSTOTDISC'] . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TSNT'] . '</td>';
    }
    $html1 .= '</tr>';
    $html1 .=  $mpdf->AddPage('L', '', '', '', '', 10, 10, 37, 20, 10, 10);
    $html1 .= '</tbody>';

    $html1 .= '<tfoot><tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">أجمالي يوم كامل</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TSTOTDYCOM . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr>';
    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">نسبة التخفيض</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSITOTRET . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr>';
    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">الصافي</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSTOTSALE . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr>';
    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المسلم</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TSMUS . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';

    $html1 .= '</tr>';

    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى علية</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSHISREMD . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';

    $html1 .= '</tr>';

    $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى له</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TSONREMD . '</td>
  <td   class="tabh"></td>
  <td  class="tabh"></td>
  <td   class="tabh"></td>';
    $html1 .= '</tr></tfoot>';
    $html1 .= '</table>';
    $mpdf->WriteHTML($html1);
  }
  $mpdf->Output('../Assets/mpdf/P_A_S_A.pdf');
  echo '../../Assets/mpdf/P_A_S_A.pdf';
}
