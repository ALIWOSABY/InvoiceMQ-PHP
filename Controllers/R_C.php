<?php
error_reporting(0);
session_start();


require_once '../Models/CustModel.php';
require_once '../Assets/mpdf/vendor/autoload.php';
require_once '../Classes/tn_c.class.php';
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



//  تقرير العملاء
if ($_POST['method'] == "Prt_Cust_Frm") {

  $cust = new CustModel();
  $v = new v_s();

  $vou_id = $_POST['VS_ID'];
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



  $x = $cust->get_prin_VT_Cust($vou_id);
  $VTC_ID = $x[0]->getVCID();
  $VTC_date = $x[0]->getVCDAT();
  $VTC_NT = $x[0]->getVCNT();
  $VTC_TYP_NO = $x[0]->getVCTYPNO();


  $stmtACC = mysqli_query($conn, "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `TCTOTDY`, `TCITOTRET`, `TCTOTAMOU`, `TCTOTSALE`, `TCMUS`, `TCHISREMD`, `TCONREMD`, `VS_NT`, `VS_ST`,`CUST_ID`, `CUST_NAME` FROM `v_s`,`cust` where VS_ID =$vou_id and VC_CUSTID=CUST_ID");
  while ($row = mysqli_fetch_array($stmtACC)) :
    $CUST_NAME = $row['CUST_NAME'];
    $TCTOTDY = $row['TCTOTDY'];
    $TCITOTRET = $row['TCITOTRET'];
    // $TSTOTAMOU = $row['TSTOTAMOU'];
    $TCTOTSALE = $row['TCTOTSALE'];
    $TCMUS = $row['TCMUS'];
    $TCHISREMD = $row['TCHISREMD'];
    $TCONREMD = $row['TCONREMD'];
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
            
      <td class="tabh" width="40%" align="center" ><small style="font-size:12px; font-weight: bold" >اسم الرعوي : ' . $CUST_NAME . '</small></td>        
    </tr>


<tr>

<td class="tab_td1"  width="30%"><small style="font-size:10px;">صفحة :{PAGENO}</small></td>
<td  class="tab_td" width="40%" align="center"><small style="font-size:20px; font-weight: bold" >تقرير الموردين</small></td>
      
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
                             <td width="8%" style="text-align: right; font-weight:bold;font-size:15px;color:blue">رقم المستند :</td>
                             <td  width="10%" style="text-align: right;float:right;border: 1px solid black;border-collapse: collapse;text-align: center; font-weight:bold;font-size:15px;color:blue;">' . $VTC_TYP_NO . '</td>
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
                                      <th class="haed_acc"  width="10%"  style="text-align: center;"> الفاتورة</th>
                                      <th class="haed_acc"  width="10%"   style="text-align: center;">التأريخ</th>
                                      <!--<th class="haed_acc" width="20%" style="text-align: center;">اسم الرعوي</th>   -->                                   
                                      <th class="haed_acc" width="8%" style="text-align: center;">الملاحظة</th>                                              
                                      ';
  $html1 .= '</tr></thead><tbody>';
  $html1 .= '<tr>             
  <td  rowspan="2"  width="10%" style="text-align: center;font-size:10px;font-weight:bold;">' . $VTC_ID . '</td>

  <td width="10%" rowspan="2" style="text-align: center;font-size:10px;font-weight:bold;">' . date("d-m-Y", strtotime($VTC_date)) . '</td>       
  <!--<td  rowspan="2"  width="8%" style="text-align: center;font-size:10px;font-weight:bold;"> . SUPP_NAME . </td>-->
  <td  rowspan="2" width="12%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $VTC_NT . '</td>';



  $html1 .= '</tr></tbody>';
  $html1 .= '</table>';
  $mpdf->WriteHTML($html1);


  $sql = mysqli_query($conn, "SELECT `TC_V_ID`, `TC_SER`, `TC_DY`, `TCNUM`, `TC_PRC`, `TC_TOT`, `TCCOMIS`, `TCTOTDISC`, `TCPST`,`TCNT`, `TC_DAT`,`DY_ID`, `DY_name` FROM `tn_c`,`days` Where TC_DY= DY_ID and TC_V_ID =$vou_id");


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
  while ($rsup = mysqli_fetch_array($sql)) {
    $html2 .= '<tr>       
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['TC_SER'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['DY_name'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['TCNUM'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['TC_PRC'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['TC_TOT'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['TCCOMIS'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['TCTOTDISC'] . '</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsup['TCNT'] . '</td>';
  }
  $html2 .= '</tr></tbody><tfoot>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">أجمالي يوم كامل</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TCTOTDY . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">نسبة التخفيض</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TCITOTRET . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">الصافي</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TCTOTSALE . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr>';
  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المسلم</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TCMUS . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';

  $html2 .= '</tr>';

  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى له</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TCHISREMD . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';

  $html2 .= '</tr>';

  $html2 .= '<tr>       
          <td class="tabh"></td>
          <td   class="tabh"></td>
          <td   class="tabh"></td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى عليه</td>
          <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TCONREMD . '</td>
          <td   class="tabh"></td>
          <td  class="tabh"></td>
          <td   class="tabh"></td>';
  $html2 .= '</tr></tfoot>';


  $html2 .= '</table>';
  $mpdf->WriteHTML($html2);



  $mpdf->Output('../Assets/mpdf/RCR.pdf');
  echo '../../Assets/mpdf/RCR.pdf';
}




// ===========================================================================================================================
//R all V T S for one day
if ($_POST['methode'] == "get_id_custcomp") {

  $tm = new CustModel();
  $v = new v_s();


  $idcust = $_POST['idcust'];
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
    <td  class="tab_td" width="40%" align="center"><small style="font-size:20px; font-weight: bold" >فاتورة المشتري(العميل)</small></td>          
    <td  class="tab_td3" width="30%" align="right"><small style="font-size:10px;"> الفترة من: ' . $date_start . '  الى : ' . $date_end . '</small></td>                                          
    </tr>
</table>';
  $mpdf->SetHeader($header);
  $mpdf->SetFooter('');
  $date = date("Y-m-d");
  $mpdf->AddPage('L', '', '', '', '', 10, 10, 37, 20, 10, 10);


  $sql_cust = mysqli_query($conn, "SELECT `TC_V_ID`, `TC_SER`,`DY_name`, `CUST_ID`, `CUST_NAME`, `TCNUM`, `TC_PRC`, `TC_TOT`, `TCCOMIS`, `TCCOMISM`, `TCTOTDISC`, `TCTOTDISCM`, `TCPST`, `TCNT`, `TC_DAT`, `TCMUST`,`DY_ID` FROM `tn_c`,`days`,`cust` WHERE `VC_CUSTID` LIKE '$idcust' and TC_DY = DY_ID and TC_DAT  BETWEEN '$date_start' and '$date_end' and VC_CUSTID = CUST_ID;");
  while ($rlt_cust = mysqli_fetch_array($sql_cust)) {
    $Ncust = $rlt_cust['CUST_NAME'];
  }



  $sql_one = mysqli_query($conn, "SELECT sum(TCMUST) As TCMUST,round(sum(TCTOTDISCM)) As TCTOTDISCM,IFNULL(round(sum(TCTOTDISCM)),0) - IFNULL(SUM(TCMUST),0) AS TCHISREMD,IFNULL(round(sum(TCTOTDISCM)),0) - IFNULL(SUM(TCMUST),0) AS TCONREMD  FROM tn_c,cust WHERE VC_CUSTID = '$idcust' and VC_CUSTID = CUST_ID and TC_DAT BETWEEN '$date_start' and '$date_end';");
  while ($rlt1 = mysqli_fetch_array($sql_one)) {

    $TCTOTDISCM = $rlt1['TCTOTDISCM'];
    $TCMUST = $rlt1['TCMUST'];

    if ($rlt1['TCHISREMD'] > 0) {
      $TCHISREMD = $rlt1['TCHISREMD'];
      $TCONREMD = 0;      
    } else {
      $TCONREMD = $rlt1['TCONREMD'] *-1;
      $TCHISREMD = 0;
    }


    // if ($rlt1['TCONREMD'] < 0) {
     
    // } else {
    //   $TCHISREMD = 0;
    // }

    // $DLIVAMNT = $rlt1['DLIVAMNT'];
  }
  $sql_two = mysqli_query($conn, "SELECT `TC_V_ID`, `TC_SER`,`DY_name`, `CUST_ID`, `CUST_NAME`, `TCNUM`, `TC_PRC`, `TC_TOT`, `TCCOMIS`, `TCCOMISM`, `TCTOTDISC`, `TCTOTDISCM`, `TCPST`, `TCNT`, `TC_DAT`, `TCMUST`,`DY_ID` FROM `tn_c`,`days`,`cust` WHERE `VC_CUSTID` LIKE '$idcust' and TC_DY = DY_ID and TC_DAT  BETWEEN '$date_start' and '$date_end' and VC_CUSTID = CUST_ID;");
  $html1 = '
      <br/>
      <link rel="stylesheet" href="../Assets/css/style.css" /> 
      <table  width="100%" style="direction:rtl;" height="30%" >
      <tr class="haed_acc">                                               
      <th class="haed_acc"  width="30%" style="text-align: center;">اسم المشتري (العميل)</div></th>                                                                                                                    
      <th class="haed_acc" width="20%" style="text-align: center;" colspan="2">' . $Ncust  . '</th>                                                                                                        
      <th class="haed_acc" width="20%" style="text-align: center;" colspan="1">البيان</th>
      <th class="haed_acc" width="30%" style="text-align: center;" colspan="4"></th>
  </tr>
        <thead> 
          <tr class="haed_acc">
          <th class="haed_acc"  width="10%"   style="text-align: center;">اليوم</th>
          <th class="haed_acc"  width="15%"   style="text-align: center;">التأريخ</th>
          <th class="haed_acc"  width="10%"  style="text-align: center;">العدد</th>
          <th class="haed_acc"  width="15%" style="text-align: center;">السعر</th>       
          <th class="haed_acc"  width="15%"  style="text-align: center;">اجمالي بعد الخصم</th>
          <th class="haed_acc"  width="15%"  style="text-align: center;">المسلم</th>
          <th class="haed_acc"   width="20%"  colspan="5" style="text-align: center;">الملاحظات</th>
              ';
  $html1 .= '</tr>

  
  
  </thead><tbody>';
  $html1 .= '<tr>               
  <td  colspan="4" width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">متبقي البيان السابق</td>
  <td     style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . 0.00 . '</td>
  <td  width="15%" style="text-align: center;font-size:10px;font-weight:bold;"></td>
  <td  colspan="5" style="text-align: center;font-size:10px;font-weight:bold;"></td>';
  $html1 .= '</tr>';
  $html1 .= '</tr>';
  $tmpAlbum = '';
  while ($rsupa = mysqli_fetch_array($sql_two)) {
    $html1 .= '<tr>               

      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['DY_name'] . '</td>
      <td   width="15%"  style="text-align: center;font-size:10px;font-weight:bold;">' . date("d-m-Y", strtotime($rsupa["TC_DAT"])) . '</td>
      <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TCNUM'] . '</td>
      <td   width="15%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TC_PRC'] . '</td>
      <td   width="15%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TCTOTDISCM'] . '</td>
      <td   width="15%"  style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TCMUST'] . '</td>';
    $html1 .= '
    <td  width="20%" colspan="5" style="text-align: center;font-size:10px;font-weight:bold;">' . $rsupa['TCNT'] . '</td>';
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
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">' . $TCTOTDISCM . '</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';
  $html1 .= '</tr>';
  $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">اجمالي المسلم</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:black;">' . $TCMUST . '</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';

  $html1 .= '</tr>';

  $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى له</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">'.$TCHISREMD.'</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';

  $html1 .= '</tr>';

  $html1 .= '<tr>       
  <td class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;">المتبقى عليه</td>
  <td   width="10%"  style="text-align: center;font-size:10px;font-weight:bold;color:red;">'.$TCONREMD.'</td>
  <td   class="tabh"></td>
  <td   class="tabh"></td>';

  $html1 .= '</tr>';
  $html1 .= '</tr></tfoot>';
  $html1 .= '</table>';
  $mpdf->WriteHTML($html1);

  $mpdf->Output('../Assets/mpdf/P_A_C.pdf');
  echo '../../Assets/mpdf/P_A_C.pdf';
}
