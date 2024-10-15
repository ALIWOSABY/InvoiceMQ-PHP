<form action="" id="FVTC_Edit" method="post">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label> رقم الفاتورة :</label>
                        <input disabled type="text" id="VS_ID" name="VS_ID" class="form-control" value="<?php echo $CustValues['VS_ID']; ?>" style="text-align: center" readonly>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="form-group">
                        <label>التاريخ:</label>
                        <?php
                        require_once '../../db/config.php';
                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y' and SEC_14 = 'Y'");
                        $row = mysqli_fetch_array($stmt);

                        if (isset($row['SEC_USE_ID'])) { ?>
                            <input type="date" id="VS_DAT" name="VS_DAT" value="<?php echo date("Y-m-d", strtotime($CustValues['VS_DAT'])); ?>" style="text-align: center" class="form-control" readonly>
                        <?php   } else { ?>
                            <input type="text" id="VS_DAT" name="VS_DAT" value="<?php echo date("Y-m-d", strtotime($CustValues['VS_DAT'])); ?>" style="text-align: center" class="form-control" readonly>
                        <?php
                        }
                        ?>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="form-group has-success">
                        <label>نوع المستند:</label>
                        <select name="VS_TYP_ID" id="VS_TYP_ID" class="form-control select2 form-group" onchange="get_vtc_id();" disabled>
                            <option value="" selected disabled>تحديد نوع المستند</option>
                            <?php echo $vtc->get_types_cust_edit($connect, $CustValues['VS_TYP_ID']); ?>
                        </select>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label> رقم المستند:</label>
                        <input type="text" class="form-control" name="VS_TYP_NO" id="VS_TYP_NO" value="<?php echo $CustValues['VS_TYP_NO']; ?>" placeholder="رقم السند" readonly>
                    </div>
                </div>




                <!-- <div class="col-md-4">
                    <div class="form-group">
                        <label> اسم العميل:</label>
                        <select class="form-control form-select-sm" id="VC_CUSTID" name="VC_CUSTID" onchange="get_Sumcust_id($(this));" disabled>
                            <option value="" selected disabled>اختر اسم العميل</option>
                            ?php echo $vtc->get_cust_edit($connect, $CustValues['VC_CUSTID']); ?>
                        </select>
                    </div>
                </div> -->




                <input type="hidden" class="form-control" id="VOU_USE_ID" name="VOU_USE_ID" value="<?php echo $CustValues['VOU_USE_ID']; ?>" style="text-align: center" readonly />


                <div class="col-md-4">
                    <div class="form-group">
                        <label> المدخل :</label>
                        <input type="text" class="form-control txt" name="VC_UNAM" id="VC_UNAM" value="<?php echo $ens[0]->getSYS_User_name(); ?>" placeholder=" المستخدم" readonly />
                    </div>
                </div>


                <div class="col-md-5">
                    <div class="form-group">
                        <label> الملاحظة :</label>
                        <input type="text" class="form-control" name="VS_NT" id="VS_NT" value="<?php echo $CustValues['VS_NT']; ?>" value="" placeholder="اضف ملاحظة" readonly>
                    </div>
                </div>

                <input type="hidden" value="0" class="form-control txt" name="VS_ST" id="VS_ST" value="<?php echo $CustValues['VS_ST']; ?>" placeholder="حالة القيد" readonly />


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 VOU_ACC">
                    <table class="table table-bordered table-hover" id="moveItem_cust">
                        <tr>
                            <th width="20px;"><input id="checkAll" class="formcontrol" type="checkbox" disabled></th>
                            <th width="50px;" style="text-align: center;">مسلسل</th>
                            <th width="100px;" style="text-align: center;"> اليوم</th>
                            <th width="150px;" style="text-align: center;">المشتري</th>
                            <th width="150px;" style="text-align: center;">التأريخ</th>
                            <th width="100px;" style="text-align: center;">العدد</th>
                            <th width="100px;" style="text-align: center;">السعر</th>
                            <th width="150px;" style="text-align: center;">الإجمالي</th>
                            <th width="150px;" style="text-align: center;">العمولة(اضافة)</th>
                            <th width="150px;" style="text-align: center;">إجمالي بعد العمولة</th>
                            <th width="150px;" style="text-align: center;">العمولة(الخصم)</th>
                            <th width="150px;" style="text-align: center;">الأجمالي (الصافي)</th>
                            <th width="150px;" style="text-align: center;">الرعوي</th>
                            <th width="150px;" style="text-align: center;">المسلم</th>
                            <th width="200px;" style="text-align: center;">الملاحظات</th>
                            <!-- <th><button class="btn btn-primary" id="addRows_cust" type="button"><span class="glyphicon glyphicon-plus"></span></button></th>
                            <th> <button class="btn btn-primary delete" id="removeRows_cust" type="button"><span class="glyphicon glyphicon-minus"></span></button></th> -->
                        </tr>
                        <?php
                        $count = 0;
                        foreach ($detItems_cust as $cust_det_item) {
                            $count++;
                        ?>
                            <tr>
                                <td style="text-align: center;"><input class="itemRow_cust" type="checkbox" disabled></td>
                                <td><input type="number" name="TC_SER[]" id="TC_SER_<?php echo $count ?>" value="<?php echo $cust_det_item["TC_SER"]; ?>" class="form-control TC_SER" autocomplete="off" style="width:50px;" readonly></td>
                                <td style="text-align: center;">
                                    <div class="form-group"><select name="TC_DY[]" id="TC_DY_<?php echo $count ?>" class="form-control select2 TC_DY" autocomplete="off" style="width:100px;" disabled>
                                            <?php echo $vtc->get_dayscust_selected($connect, $cust_det_item["TC_DY"]); ?>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <select name="VC_CUSTID[]" id="VC_CUSTID_1" class="form-control select2 VC_CUSTID" autocomplete="off" style="width:150px;" disabled>
                                            <option value="" selected disabled>اختر اسم المشتري</option>
                                            <?php echo $vtc->get_idcust_selected($connect, $cust_det_item["VC_CUSTID"]); ?>
                                        </select>
                                    </div>
                                </td>

                                <td><input type="date" name="TC_DAT[]" id="TC_DAT_<?php echo $count ?>" value="<?php echo date("Y-m-d", strtotime($cust_det_item['TC_DAT'])); ?>" class="form-control TC_DAT" autocomplete="off" style="width:150px;" disabled></td>

                                <td>
                                    <div class="form-group"><input type="number" name="TCNUM[]" id="TCNUM_<?php echo $count ?>" class="form-control TCNUM" value="<?php echo $cust_det_item["TCNUM"]; ?>" autocomplete="off" onchange="total_amount_cust()" style="width:100px;" readonly></div>
                                </td>

                                <td>
                                    <div class="form-group"><input type="number" name="TC_PRC[]" id="TC_PRC_<?php echo $count ?>" value="<?php echo $cust_det_item["TC_PRC"]; ?>" class="form-control TC_PRC" autocomplete="off" onchange="total_amount_cust()" style="width:100px;" readonly></div>
                                </td>

                                <td><input type="text" name="TC_TOT[]" id="TC_TOT_<?php echo $count ?>" value="<?php echo $cust_det_item["TC_TOT"]; ?>" class="form-control TC_TOT" autocomplete="off" onchange="total_amount_cust()" style="width:150px;" readonly></td>
                                </td>
                                <td>
                                    <div class="form-group"><input type="number" name="TCCOMIS[]" id="TCCOMIS_<?php echo $count ?>" value="<?php echo $cust_det_item["TCCOMIS"]; ?>" class="form-control TCCOMIS" autocomplete="off" style="width:150px;" readonly></div>
                                </td>
                                <td>
                                    <div class="form-group"><input type="number" name="TCTOTDISC[]" id="TCTOTDISC_<?php echo $count ?>" value="<?php echo $cust_det_item["TCTOTDISC"]; ?>" class="form-control TCTOTDISC" autocomplete="off" style="width:150px;" readonly></div>
                                </td>

                                <td>
                                    <div class="form-group"><input type="number" name="TCCOMISM[]" id="TCCOMISM_<?php echo $count ?>" value="<?php echo $cust_det_item["TCCOMISM"]; ?>" class="form-control TCCOMISM" autocomplete="off" style="width:150px;" disabled></div>
                                </td>
                                <td>
                                    <div class="form-group"><input type="number" name="TCTOTDISCM[]" id="TCTOTDISCM_<?php echo $count ?>" value="<?php echo $cust_det_item["TCTOTDISCM"]; ?>" class="form-control TCTOTDISCM" autocomplete="off" style="width:150px;" disabled></div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select name="TCPST[]" id="TCPST_<?php echo $count ?>" class="form-control TCPST" autocomplete="off" style="width:150px;" disabled>
                                            <option value="" selected disabled>اختر اسم الرعوي</option>
                                            <?php echo $vtc->get_suppc_selected($connect, $cust_det_item["TCPST"]); ?>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group"><input type="number" name="TCMUST[]" id="TCMUST_<?php echo $count ?>" class="form-control TCMUST" onchange="TotMUSTcust_all_day()" value="<?php echo $cust_det_item["TCMUST"]; ?>" autocomplete="off" style="width:150px;"></div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="TCNT[]" id="TCNT_<?php echo $count ?>" class="form-control TCNT" value="<?php echo $cust_det_item["TCNT"]; ?>" style="width:200px;" autocomplete="off" readonly>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>
                        <tfoot>
                            <tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">الإجمالي عليكم</th>
                                <th colspan="2"><input type="number" class="form-control" id="TCTOTDY" name="TCTOTDY" value="<?php echo $CustValues["TCTOTDY"]; ?>" placeholder="0.00" readonly style="width:100%;text-align: center;" disabled /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">نسبة الاضافة</th>
                                <th colspan="2"><input type="text" class="form-control" onchange="CalDISCRET_Cust()" id="TCITOTRET" name="TCITOTRET" value="<?php echo $CustValues["TCITOTRET"]; ?>" style="width:100%;text-align: center;color:red;" disabled /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">ملبغ الاضافة</th>
                                <th colspan="2"><input type="number" class="form-control" onchange="CalDISCAMO_Cust()" id="TCTOTAMOU" name="TCTOTAMOU" value="<?php echo $CustValues["TCTOTAMOU"]; ?>" placeholder="0" readonly style="width:100%;text-align: center;color:black;" disabled /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">صافي الاضافة</th>
                                <th colspan="2"><input type="number" name="TCTOTSALE" id="TCTOTSALE" value="<?php echo $CustValues["TCTOTSALE"]; ?>" class="form-control TCTOTSALE" autocomplete="off" readonly style="width:100%;text-align: center;color:red;" disabled></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">نسبة التخفيض</th>
                                <th colspan="2"><input type="text" value="<?php echo $CustValues["TCMITOTRET"]; ?>" class="form-control" onchange="CalDISCRET_Custm()" id="TCMITOTRET" name="TCMITOTRET" placeholder="%0" style="width:100%;text-align: center;color:red;" disabled /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">ملبغ التخفيض</th>
                                <th colspan="2"><input type="number" value="<?php echo $CustValues["TCMTOTAMOU"]; ?>" class="form-control" onchange="CalDISCAMO_Custm()" id="TCMTOTAMOU" name="TCMTOTAMOU" value=0 placeholder="0" readonly style="width:100%;text-align: center;color:black;" disabled /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">الصافي النهائي</th>
                                <th colspan="2"><input type="number" value="<?php echo $CustValues["TCTOTSALEF"]; ?>" name="TCTOTSALEF" id="TCTOTSALEF" class="form-control TCTOTSALEF" autocomplete="off" readonly style="width:100%;text-align: center;color:red;" disabled /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">المسلم</th>
                                <th colspan="2"><input type="number" name="TCMUS" id="TCMUS" class="form-control TCMUS" value="<?php echo $CustValues["TCMUS"]; ?>" autocomplete="off" onchange="TotMUSTcust_all_day()" style="width:100%;text-align: center;color:black;" disabled></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">المتبقى عليه</th>
                                <th colspan="2"><input type="number" name="TCHISREMD" id="TCHISREMD" class="form-control TCHISREMD" value="<?php echo $CustValues["TCHISREMD"]; ?>" autocomplete="off" onchange="Cal_remaind_Cust()" readonly style="width:100%;text-align: center;color:red;" disabled></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">المتبقى له</th>
                                <th colspan="2"><input type="number" name="TCONREMD" id="TCONREMD" class="form-control TCONREMD" value="<?php echo $CustValues["TCONREMD"]; ?>" autocomplete="off" onchange="Cal_remaind_Cust()" readonly style="width:100%;text-align: center;color:red;" disabled></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    //=========== اظهار رقم المستند عن طريق اختيار نوع المستند ===================================================
    function get_vtc_id() {
        const VS_TYP_NO_INPUT = document.getElementById('VS_TYP_NO');
        $('#VS_TYP_ID').on('select2:select', function(e) {
            var VS_DAT = document.getElementById('VS_DAT').value;
            var d = new Date(VS_DAT);
            var VS_DAT = $('#VS_DAT').val();
            year = d.getFullYear();
            let newVouTypNo;
            $.ajax({
                url: '../../Controllers/CustController.php',
                method: 'post',
                data: {
                    methode: 'VS_TYP_NO',
                    VS_DAT: year,
                    VS_TYP_NO: +e.target.value
                }
            }).done(function(VS_TYP_NO) {
                VS_TYP_NO = JSON.parse(VS_TYP_NO);
                if (VS_TYP_NO.length) {
                    VS_TYP_NO.forEach(e => {
                        //console.log(e.VS_TYP_NO);
                        newVouTypNo = Number(e.VS_TYP_NO) + 1
                    })
                    VS_TYP_NO_INPUT.value = newVouTypNo
                } else {
                    VS_TYP_NO_INPUT.value = 1
                }
            });
        });
    }



    function get_Sumcust_id() {
        // alert('clicks ok')
        var totcust = $('#VC_CUSTID').val();
        // alert(totcust)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'totcust=' + totcust
        }).done(function(TCTOTSALE) {
            TCTOTSALE = JSON.parse(TCTOTSALE);
            // alert(TCTOTSALE);
            TCTOTSALE.forEach(function(cus) {
                $('#total_cust_all').val(cus.TCTOTSALE);
            })
        });
        get_remindcust_id();
        get_hisremindcust_id();
        get_Sonremindcust_id();
    }



    function get_remindcust_id() {
        // alert('clicks ok')
        var remindcust = $('#VC_CUSTID').val();
        // alert(remindcust)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'remindcust=' + remindcust
        }).done(function(TCMUS) {
            TCMUS = JSON.parse(TCMUS);
            // alert(TCTOTSALE);
            TCMUS.forEach(function(cus) {
                $('#remind_cust_all').val(cus.TCMUS);
            })
        });
    }



    function get_hisremindcust_id() {
        // alert('clicks ok')
        var hisrmc = $('#VC_CUSTID').val();
        // alert(hisrmc)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'hisrmc=' + hisrmc
        }).done(function(TCHISREMD) {
            TCHISREMD = JSON.parse(TCHISREMD);
            // alert(TCTOTSALE);
            TCHISREMD.forEach(function(cus) {
                if (cus.TCHISREMD > 0) {
                    $('#mhisrm_cust_all').val(cus.TCHISREMD);
                } else if (cus.TCHISREMD < 0) {
                    $('#mhisrm_cust_all').val(0);
                } else if (cus.TCHISREMD == 0) {
                    $('#mhisrm_cust_all').val(0);
                }
            })
        });
    }



    function get_Sonremindcust_id() {
        // alert('clicks ok')
        var Sonrmc = $('#VC_CUSTID').val();
        // alert(Sonrmc)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'Sonrmc=' + Sonrmc
        }).done(function(TCONREMD) {
            TCONREMD = JSON.parse(TCONREMD);
            // alert(TCTOTSALE);
            TCONREMD.forEach(function(cus) {
                if (cus.TCONREMD > 0) {
                    $('#msonrm_cust_all').val(cus.TCONREMD);
                } else if (cus.TCONREMD < 0) {
                    $('#msonrm_cust_all').val(0);
                } else if (cus.TCONREMD == 0) {
                    $('#msonrm_cust_all').val(0);
                }
            })
        });
    }
</script>