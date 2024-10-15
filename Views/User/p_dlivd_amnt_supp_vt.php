<form action="" id="FVTS_DLIVD" method="post">
    <div class="box box-primary">
        <div class="box-header with-border">


            <!-- modal to ensure that the data was added correctly -->
            <div class="modal" id="modal_VTS_DELIVD" style="display:none">
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
                            <button type="button" class="btn btn-primary pull-left" id="can_save_VTSDLIVD_Add" data-dismiss="modal">لا</button>
                            <input type="submit" name="btn_add_VTSDLIVD" id="btn_add_VTSDLIVD" value="حفظ" class="btn btn-primary">
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
            <a href="?page=p_m_supp"> <button type="button" class="btn btn-primary" data-dismiss="modal">

                    الغاء

                </button> </a>
            <!-- End button cancel -->
            <button type="button" name="btn_valid_frm_Add_vtsdlivd" id="btn_valid_frm_Add_vtsdlivd" class="btn btn-primary">حفظ</button>
            <!-- End button Add -->
        </div>





        <div class="box-body">

            <div class="row">
                <!--    <div class="col-md-2">
                    <div class="form-group">
                        <label>الرقم الالي :</label> -->
                <input disabled type="hidden" id="AMNTS_ID" name="AMNTS_ID" class="form-control" value="<?php echo $vts->getAMNT_DLIVDSID(); ?>" style="text-align: center">
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
                            <input type="date" id="AMNTS_DAT" name="AMNTS_DAT" value="<?php echo date('Y-m-d') ?>" style="text-align: center" class="form-control">
                        <?php   } else { ?>
                            <input type="text" id="AMNTS_DAT" name="AMNTS_DAT" value="<?php echo date('Y-m-d') ?>" style="text-align: center" class="form-control" readonly>


                        <?php
                        }

                        ?>

                    </div>
                </div>


                <input type="hidden" class="form-control" id="VOU_USE_ID" name="VOU_USE_ID" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" style="text-align: center" readonly />


                <input type="hidden" class="form-control txt" name="VOU_USE_name" id="VOU_USE_name" value="<?php echo $ens[0]->getSYS_User_name(); ?>" placeholder=" المستخدم" readonly />



                <div class="col-md-2">
                    <div class="form-group">
                        <label> اسم الرعوي:</label>
                        <select class="form-control select2" onchange="get_Sumsupp_id($(this));" id="AMTS_BENF" name="AMTS_BENF">
                            <?php
                            for ($i = 0; $i < count($SP); $i++) {
                                if ($SP[$i]->getSUPPFREEZE() == 'Y') {
                                    echo '<option value="' . $SP[$i]->getSUPPID() . '">' . $SP[$i]->getSUPPNAME() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="form-group">
                        <label> رقم الفاتورة:</label>
                        <select class="form-control AMNTS_V_ID form-select-sm" id="AMNTS_V_ID" name="AMNTS_V_ID">

                        </select>
                    </div>
                </div>






                <div class="col-md-3">
                    <div class="form-group">
                        <label> اجمالي حساب المورد :</label>
                        <input disabled type="text" id="TSTOTSALE" name="TSTOTSALE" class="form-control" style="text-align: center;color:red">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> اجمالي الفلوس المسلمه :</label>
                        <input disabled type="text" id="TSMUS" name="TSMUS" class="form-control" onchange="cal_amnt_delivred()" style="text-align: center;color:red">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label> المتبقى له :</label>
                        <input disabled type="text" id="TSHISREMD" name="TSHISREMD" class="form-control" onchange="cal_amnt_delivred()" style="text-align: center;color:red">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> المتبقى عليه :</label>
                        <input disabled type="text" id="TSONREMD" name="TSONREMD" class="form-control" onchange="cal_amnt_delivred()" style="text-align: center;color:red">
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group">
                        <label> مبلغ التوصيل :</label>
                        <input type="text" class="form-control" name="DLIVAMNT" id="DLIVAMNT" onchange="cal_amnt_delivred()" value="0" style="text-align: center;color:black">
                    </div>
                </div>


            </div>
        </div>
    </div>
</form>



<script>
    //=========== اظهار رقم المستند عن طريق اختيار نوع المستند ===================================================
    function get_Sumsupp_id(e) {
        // alert('clicks ok')
        var totsup = $('#AMTS_BENF').val();
        // alert(totsup)
        $.ajax({
            url: '../../Models/VTSModel.php',
            method: 'POST',
            data: 'totsup=' + totsup
        }).done(function(TSTOTSALE) {
            TSTOTSALE = JSON.parse(TSTOTSALE);
            // alert(TSTOTSALE);
            TSTOTSALE.forEach(function(cus) {
                $('#TSTOTSALE').val(cus.TSTOTSALE);
            })
        });
        get_remindupp_id();
        get_hisremindupp_id();
        get_Sonremindupp_id();
        get_AMNTS_V_ID(e);
    }


    function get_AMNTS_V_ID(e) {
        $("[id^='AMTS_BENF']").each(function() {
            var id = $(this).attr('id');
            var VS_ID = $('#AMTS_BENF').val();
            // alert(VS_ID);
            $.ajax({
                url: '../../Models/VTSModel.php',
                method: 'post',
                data: 'AMNTS_V_ID=' + VS_ID
            }).done(function(AMNTS_V_ID) {
                AMNTS_V_ID = JSON.parse(AMNTS_V_ID);
                $('#AMNTS_V_ID').empty();
                if (AMNTS_V_ID.length) {
                    AMNTS_V_ID.forEach(function(supd) {
                        // alert('Your fucking supp is :'+supd.AMNTS_V_ID);
                        $('#AMNTS_V_ID').append('<option value=' + supd.AMNTS_V_ID + '>' + supd.AMNTS_V_ID + '</option>')
                    })
                } else {
                    $('#AMNTS_V_ID').append('<option>' + 0 + '</option>')
                }
            });
        });  
    }



    function get_remindupp_id() {
        // alert('clicks ok')
        var remind = $('#AMTS_BENF').val();
        // alert(remind)
        $.ajax({
            url: '../../Models/VTSModel.php',
            method: 'POST',
            data: 'remind=' + remind
        }).done(function(TSMUS) {
            TSMUS = JSON.parse(TSMUS);
            // alert(TSTOTSALE);
            TSMUS.forEach(function(cus) {
                $('#TSMUS').val(cus.TSMUS);
            })
        });
    }



    function get_hisremindupp_id() {
        // alert('clicks ok')
        var hisrm = $('#AMTS_BENF').val();
        // alert(remind)
        $.ajax({
            url: '../../Models/VTSModel.php',
            method: 'POST',
            data: 'hisrm=' + hisrm
        }).done(function(TSHISREMD) {
            TSHISREMD = JSON.parse(TSHISREMD);
            // alert(TSTOTSALE);
            TSHISREMD.forEach(function(cus) {
                if (cus.TSHISREMD > 0) {
                    // alert(cus.TSHISREMD);
                    $('#TSHISREMD').val(cus.TSHISREMD);
                } else if (cus.TSHISREMD < 0) {
                    $('#TSHISREMD').val(0);
                } else if (cus.TSHISREMD == 0) {
                    $('#TSHISREMD').val(0);
                }
            })
        });
    }



    function get_Sonremindupp_id() {
        // alert('clicks ok')
        var Sonrm = $('#AMTS_BENF').val();
        // alert(remind)
        $.ajax({
            url: '../../Models/VTSModel.php',
            method: 'POST',
            data: 'Sonrm=' + Sonrm
        }).done(function(TSONREMD) {
            TSONREMD = JSON.parse(TSONREMD);
            // alert(TSTOTSALE);
            TSONREMD.forEach(function(cus) {
                if (cus.TSONREMD > 0) {
                    // alert('Your t son is :'+cus.TSONREMD);
                    $('#TSONREMD').val(cus.TSONREMD);
                } else if (cus.TSONREMD < 0) {
                    $('#TSONREMD').val(0);
                } else if (cus.TSONREMD == 0) {
                    $('#TSONREMD').val(0);
                }
            })
        });
    }



    // ===========    حساب المسلم والمتبقى له والمتبقى عليه	
    function cal_amnt_delivred() {
        var TSHISREMD = $('#TSHISREMD').val();
        // alert("Your value is "+ TSHISREMD);
        var DLIVAMNT = $('#DLIVAMNT').val();
        var TSMUS = $('#TSMUS').val();
        var TSONREMD = $('#TSONREMD').val();



        // alert(DLIVAMNT);


        if (DLIVAMNT < TSHISREMD) {
            var remaind_dvlid = parseFloat(TSHISREMD) - parseFloat(DLIVAMNT);
            remdvlid = remaind_dvlid.toFixed(2);
            // alert(remdvlid);
            $('#TSHISREMD').val(remdvlid);
            $("#TSONREMD").val(0);

            var TSMUS_dvlid = parseFloat(TSMUS) + parseFloat(DLIVAMNT);
            TSMUSdvlid = TSMUS_dvlid.toFixed(2);
            $('#TSMUS').val(TSMUSdvlid);




        } else if (DLIVAMNT > TSHISREMD && TSHISREMD <= 0) {
            var remaind_dvlidson = parseFloat(TSONREMD) + parseFloat(DLIVAMNT);
            // alert('Your Tson is '+remaind_dvlidson);
            remdvlidson = remaind_dvlidson.toFixed(2);
            // alert(remdvlidson);
            $('#TSONREMD').val(remdvlidson);
            $("#TSHISREMD").val(0);

            var TSMUS_dvlid = parseFloat(TSMUS) + parseFloat(DLIVAMNT);
            TSMUSdvlid = TSMUS_dvlid.toFixed(2);
            $('#TSMUS').val(TSMUSdvlid);

        } else if (DLIVAMNT == TSHISREMD) {
            $("#TSHISREMD").val(0);
            $("#TSONREMD").val(0);
        }

    }
</script>