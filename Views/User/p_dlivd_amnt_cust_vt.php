<form action="" id="FVTC_DLIVD" method="post">
    <div class="box box-primary">
        <div class="box-header with-border">


            <!-- modal to ensure that the data was added correctly -->
            <div class="modal" id="modal_VTC_DELIVD" style="display:none">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                            <h4 class="modal-title">تأكيد حفظ القيد</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حفظ هذا القيد ؟ </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-left" id="can_save_VTCDLIVD_Add" data-dismiss="modal">لا</button>
                            <input type="submit" name="btn_add_VTCDLIVD" id="btn_add_VTCDLIVD" value="حفظ" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal modal-primary" id="modal_success_amnt" style="display:none">
                <div class="modal-dialog">
                    <div class="modal-body">
                        <p style="text-align: center;">تم حفظ البيانات بنجاح&hellip;</p>
                    </div>
                </div>
            </div>
            <!-- End modal -->

            <!-- button return you to page main trans  -->
            <a href="?page=p_m_cust"> <button type="button" class="btn btn-primary" data-dismiss="modal">

                    الغاء

                </button> </a>
            <!-- End button cancel -->
            <button type="button" name="btn_valid_frm_Add_vtcdlivd" id="btn_valid_frm_Add_vtcdlivd" class="btn btn-primary">حفظ</button>
            <!-- End button Add -->
        </div>





        <div class="box-body">

            <div class="row">
                <!--    <div class="col-md-2">
                    <div class="form-group">
                        <label>الرقم الالي :</label> -->
                <input disabled type="hidden" id="AMNTS_ID_cust" name="AMNTS_ID_cust[]" class="form-control" value="<?php echo $vtc->getAMNT_DLIVDCID(); ?>" style="text-align: center">
                <!-- </div>
                </div> -->


                


                <div class="col-md-2">
                    <div class="form-group">
                        <label>التاريخ:</label>
                        <?php
                        require_once '../../db/config.php';
                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y' and SEC_14 = 'Y'");
                        $row = mysqli_fetch_array($stmt);

                        if (isset($row['SEC_USE_ID'])) { ?>
                            <input type="date" id="AMNTS_DAT_cust" name="AMNTS_DAT_cust[]" value="<?php echo date('Y-m-d') ?>" style="text-align: center" class="form-control">
                        <?php   } else { ?>
                            <input type="text" id="AMNTS_DAT_cust" name="AMNTS_DAT_cust[]" value="<?php echo date('Y-m-d') ?>" style="text-align: center" class="form-control" readonly>


                        <?php
                        }

                        ?>

                    </div>
                </div>


                <input type="hidden" class="form-control" id="VOU_USE_ID" name="VOU_USE_ID[]" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" style="text-align: center" readonly />


                <input type="hidden" class="form-control txt" name="VOU_USE_name[]" id="VOU_USE_name" value="<?php echo $ens[0]->getSYS_User_name(); ?>" placeholder=" المستخدم" readonly />


<!-- 
                <div class="col-md-2">
                    <div class="form-group">
                        <label> اسم العميل:</label>
                        <select class="form-control select2" onchange="get_Sumcust_id($(this));" id="VC_CUSTID_cust" name="VC_CUSTID_cust">
                            ?php
                            for ($i = 0; $i < count($SP); $i++) {
                                if ($SP[$i]->getSUPPFREEZE() == 'Y') {
                                    echo '<option value="' . $SP[$i]->getSUPPID() . '">' . $SP[$i]->getSUPPNAME() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div> -->


                <div class="col-md-2">
                    <div class="form-group">
                        <label> اسم المشتري:</label>
                        <select class="form-control select2"  onchange="get_Sumcust_id($(this));" id="VC_CUSTID_cust" name="VC_CUSTID_cust[]">
                        <option value="" disabled>تحديد</option>
                            <?php
                            for ($i = 0; $i < count($CT); $i++) {
                                if ($CT[$i]->getCUSTFREEZE() == 'Y') {
                                    echo '<option value="' . $CT[$i]->getCUSTID() . '">' . $CT[$i]->getCUSTNAME() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="form-group">
                        <label> رقم الفاتورة:</label>
                        <select class="form-control AMNTS_V_ID_cust form-select-sm" id="AMNTS_V_ID_cust" name="AMNTS_V_ID_cust[]">

                        </select>
                    </div>
                </div>






                <div class="col-md-3">
                    <div class="form-group">
                        <label> اجمالي حساب المورد :</label>
                        <input disabled type="text" id="TSTOTSALE_cust" name="TSTOTSALE_cust[]" class="form-control" style="text-align: center;color:red">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> اجمالي الفلوس المسلمه :</label>
                        <input disabled type="text" id="TSMUS_cust" name="TSMUS_cust[]" class="form-control" onchange="cal_amnt_delivred()" style="text-align: center;color:red">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label> المتبقى له :</label>
                        <input disabled type="text" id="TSHISREMD_cust" name="TSHISREMD_cust[]" class="form-control" onchange="cal_amnt_delivred()" style="text-align: center;color:red">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> المتبقى عليه :</label>
                        <input disabled type="text" id="TSONREMD_cust" name="TSONREMD_cust[]" class="form-control" onchange="cal_amnt_delivred()" style="text-align: center;color:red">
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group">
                        <label> مبلغ التوصيل :</label>
                        <input type="text" class="form-control" name="DLIVAMNT_cust[]" id="DLIVAMNT_cust" onchange="cal_amnt_delivred()" value="0" style="text-align: center;color:black">
                    </div>
                </div>


            </div>
        </div>
    </div>
</form>



<script>
    //=========== اظهار رقم المستند عن طريق اختيار نوع المستند ===================================================
    function get_Sumcust_id(e) {
        // alert('clicks ok')
        var totcust = $('#VC_CUSTID_cust').val();
        alert(totcust)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'totcust=' + totcust
        }).done(function(TSTOTSALE_cust) {
            TSTOTSALE_cust = JSON.parse(TSTOTSALE_cust);
            alert(TSTOTSALE_cust);
            TSTOTSALE_cust.forEach(function(cus) {
                $('#TSTOTSALE_cust').val(cus.TSTOTSALE_cust);
            })
        });
        get_remindupp_id();
        get_hisremindupp_id();
        get_Sonremindupp_id();
        get_AMNTS_V_ID_cust(e);
    }


    function get_AMNTS_V_ID_cust(e) {
        $("[id^='VC_CUSTID_cust']").each(function() {
            var id = $(this).attr('id');
            var VC_ID = $('#VC_CUSTID_cust').val();
            alert(VS_ID);
            $.ajax({
                url: '../../Models/VTCModel.php',
                method: 'post',
                data: 'AMNTS_V_ID_cust=' + VC_ID
            }).done(function(AMNTS_V_ID_cust) {
                AMNTS_V_ID_cust= JSON.parse(AMNTS_V_ID_cust);
                $('#AMNTS_V_ID_cust').empty();
                if (AMNTS_V_ID_cust.length) {
                    AMNTS_V_ID_cust.forEach(function(supd) {
                        alert('Your fucking supp is :'+supd.AMNTS_V_ID_cust);
                        $('#AMNTS_V_ID_cust').append('<option value=' + supd.AMNTS_V_ID_cust+ '>' + supd.AMNTS_V_ID_cust+ '</option>')
                    })
                } else {
                    $('#AMNTS_V_ID_cust').append('<option>' + 0 + '</option>')
                }
            });
        });  
    }



    function get_remindupp_id() {
        // alert('clicks ok')
        var remind = $('#VC_CUSTID_cust').val();
        // alert(remind)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'remind=' + remind
        }).done(function(TSMUS_cust) {
            TSMUS_cust = JSON.parse(TSMUS_cust);
            // alert(TSTOTSALE_cust);
            TSMUS_cust.forEach(function(cus) {
                $('#TSMUS_cust').val(cus.TSMUS_cust);
            })
        });
    }



    function get_hisremindupp_id() {
        // alert('clicks ok')
        var hisrm = $('#VC_CUSTID_cust').val();
        // alert(remind)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'hisrm=' + hisrm
        }).done(function(TSHISREMD_cust) {
            TSHISREMD_cust = JSON.parse(TSHISREMD_cust);
            // alert(TSTOTSALE_cust);
            TSHISREMD_cust.forEach(function(cus) {
                if (cus.TSHISREMD_cust > 0) {
                    // alert(cus.TSHISREMD_cust);
                    $('#TSHISREMD_cust').val(cus.TSHISREMD_cust);
                } else if (cus.TSHISREMD_cust < 0) {
                    $('#TSHISREMD_cust').val(0);
                } else if (cus.TSHISREMD_cust == 0) {
                    $('#TSHISREMD_cust').val(0);
                }
            })
        });
    }



    function get_Sonremindupp_id() {
        // alert('clicks ok')
        var Sonrm = $('#VC_CUSTID_cust').val();
        // alert(remind)
        $.ajax({
            url: '../../Models/VTCModel.php',
            method: 'POST',
            data: 'Sonrm=' + Sonrm
        }).done(function(TSONREMD_cust) {
            TSONREMD_cust = JSON.parse(TSONREMD_cust);
            // alert(TSTOTSALE_cust);
            TSONREMD_cust.forEach(function(cus) {
                if (cus.TSONREMD_cust > 0) {
                    // alert('Your t son is :'+cus.TSONREMD_cust);
                    $('#TSONREMD_cust').val(cus.TSONREMD_cust);
                } else if (cus.TSONREMD_cust < 0) {
                    $('#TSONREMD_cust').val(0);
                } else if (cus.TSONREMD_cust == 0) {
                    $('#TSONREMD_cust').val(0);
                }
            })
        });
    }



    // ===========    حساب المسلم والمتبقى له والمتبقى عليه	
    function cal_amnt_delivred() {
        var TSHISREMD_cust = $('#TSHISREMD_cust').val();
        // alert("Your value is "+ TSHISREMD_cust);
        var DLIVAMNT_cust = $('#DLIVAMNT_cust').val();
        var TSMUS_cust = $('#TSMUS_cust').val();
        var TSONREMD_cust = $('#TSONREMD_cust').val();



        // alert(DLIVAMNT_cust);


        if (DLIVAMNT_cust < TSHISREMD_cust) {
            var remaind_dvlid = parseFloat(TSHISREMD_cust) - parseFloat(DLIVAMNT_cust);
            remdvlid = remaind_dvlid.toFixed(2);
            // alert(remdvlid);
            $('#TSHISREMD_cust').val(remdvlid);
            $("#TSONREMD_cust").val(0);

            var TSMUS_cust_dvlid = parseFloat(TSMUS_cust) + parseFloat(DLIVAMNT_cust);
            TSMUS_custdvlid = TSMUS_cust_dvlid.toFixed(2);
            $('#TSMUS_cust').val(TSMUS_custdvlid);




        } else if (DLIVAMNT_cust > TSHISREMD_cust && TSHISREMD_cust <= 0) {
            var remaind_dvlidson = parseFloat(TSONREMD_cust) + parseFloat(DLIVAMNT_cust);
            // alert('Your Tson is '+remaind_dvlidson);
            remdvlidson = remaind_dvlidson.toFixed(2);
            // alert(remdvlidson);
            $('#TSONREMD_cust').val(remdvlidson);
            $("#TSHISREMD_cust").val(0);

            var TSMUS_cust_dvlid = parseFloat(TSMUS_cust) + parseFloat(DLIVAMNT_cust);
            TSMUS_custdvlid = TSMUS_cust_dvlid.toFixed(2);
            $('#TSMUS_cust').val(TSMUS_custdvlid);

        } else if (DLIVAMNT_cust == TSHISREMD_cust) {
            $("#TSHISREMD_cust").val(0);
            $("#TSONREMD_cust").val(0);
        }

    }
</script>