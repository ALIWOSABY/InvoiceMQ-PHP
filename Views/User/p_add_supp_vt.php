<form action="" id="FVTS_S" method="post">
    <div class="box box-primary">
        <div class="box-header with-border">


            <!-- modal to ensure that the data was added correctly -->
            <div class="modal" id="modal_VTS" style="display:none">
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
                            <button type="button" class="btn btn-primary pull-left" id="can_save_VTS_Add" data-dismiss="modal">لا</button>
                            <input type="submit" name="btn_add_VTS" id="btn_add_VTS" value="حفظ" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal -->

            <!-- button return you to page main trans  -->
            <a href="?page=page_main_trans"> <button type="button" class="btn btn-primary" data-dismiss="modal">

                    الغاء

                </button> </a>
            <!-- End button cancel -->
            <button type="button" name="btn_valid_frm_Add_vts" id="btn_valid_frm_Add_vts" class="btn btn-primary">حفظ</button>
            <!-- End button Add -->
        </div>





        <div class="box-body">

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label> رقم الفاتورة :</label>
                        <input disabled type="text" id="VS_ID" name="VS_ID" class="form-control" value="<?php echo $vts->getvtsId(); ?>" style="text-align: center">
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
                            <input type="date" id="VS_DAT" name="VS_DAT" value="<?php echo date('Y-m-d') ?>" style="text-align: center" class="form-control">
                        <?php   } else { ?>
                            <input type="date" id="VS_DAT" name="VS_DAT" value="<?php echo date('Y-m-d') ?>" style="text-align: center" class="form-control">


                        <?php
                        }

                        ?>

                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group has-success">
                        <label>نوع المستند:</label>
                        <select name="VS_TYP_ID" id="VS_TYP_ID" class="form-control select2 form-group" onchange="get_vts_id();">
                            <option value="" selected disabled>تحديد نوع المستند</option>
                            <?php echo $vts->get_types_insert($connect); ?>
                        </select>
                    </div>
                </div>



                <input type="hidden" class="form-control" name="VS_TYP_NO" id="VS_TYP_NO" value="" placeholder="رقم السند" readonly>


                <input type="hidden" class="form-control" id="VOU_USE_ID" name="VOU_USE_ID" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" style="text-align: center" readonly />


                <input type="hidden" class="form-control txt" name="VOU_USE_name" id="VOU_USE_name" value="<?php echo $ens[0]->getSYS_User_name(); ?>" placeholder=" المستخدم" readonly />


                <div class="col-md-2">
                    <div class="form-group">
                        <label> تسجيل المورد :</label>
                        <button type="button" class="form-control btn btn-primary btn_supp_A_vt" data-toggle="modal"><i class="fa fa-plus"></i>
                            تسجيل المورد
                        </button>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label> اسم الرعوي:</label>
                        <select class="form-control select2" onchange="get_Sumsupp_id($(this));" id="VS_BENF" name="VS_BENF">
                            <?php echo $vts->get_suppinst($connect); ?>
                        </select>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label> اجمالي حساب المورد :</label>
                        <input disabled type="text" id="total_supp_all" name="total_supp_all" class="form-control" value="0" style="text-align: center;color:red">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> اجمالي الفلوس المسلمه :</label>
                        <input disabled type="text" id="remind_supp_all" name="remind_supp_all" value="0" class="form-control" value="" style="text-align: center;color:red">
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label> المتبقى له :</label>
                        <input disabled type="text" id="mhisrm_supp_all" name="mhisrm_supp_all" value="0" class="form-control" value="" style="text-align: center;color:red">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label> المتبقى عليه :</label>
                        <input disabled type="text" id="msonrm_supp_all" name="msonrm_supp_all" value="0" class="form-control" value="" style="text-align: center;color:red">
                    </div>
                </div>



                <div class="col-md-5">
                    <div class="form-group">
                        <label> الملاحظة :</label>
                        <input type="text" class="form-control" name="VS_NT" id="VS_NT" value="" placeholder="اضف ملاحظة">
                    </div>
                </div>


                <input type="hidden" value="0" class="form-control txt" name="VS_ST" id="VS_ST" placeholder="حالة القيد" />

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 VOU_ACC">
                    <table class="table table-bordered table-hover" id="moveItem_vts">
                        <tr>
                            <th width="20px;"><input id="checkAll_vts" class="formcontrol" type="checkbox"></th>
                            <th style="display:none;" width="50px;" style="text-align: center;">مسلسل</th>
                            <th  width="100px;" style="text-align: center;"> اليوم</th>
                            <th  width="150px;" style="text-align: center;">التأريخ</th>
                            <th width="100px;" style="text-align: center;">المشتري</th>
                            <th width="50px;" style="text-align: center;"> اضافة</th>
                            <th width="100px;" style="text-align: center;">العدد</th>
                            <th width="100px;" style="text-align: center;">السعر</th>
                            <th width="150px;" style="text-align: center;">الإجمالي</th>
                            <th style="display:none;" width="150px;" style="text-align: center;">الخصم</th>
                            <th style="display:none;" width="150px;" style="text-align: center;">اجمالي بعد الخصم</th>
                            <th width="150px;" style="text-align: center;">المسلم</th>
                            <th width="200px;" style="text-align: center;">الملاحظات</th>

                            <th><button class="btn btn-primary" id="addRows_vts" type="button"><span class="glyphicon glyphicon-plus"></span></button></th>
                            <th> <button class="btn btn-primary delete" id="removeRows_vts" type="button"><span class="glyphicon glyphicon-minus"></span></button></th>
                        </tr>

                        <tr>
                            <td style="text-align: center;"><input class="itemRow_vts" type="checkbox"></td>
                            <td style="display:none;"><input type="number" name="TS_SER[]" id="TS_SER_1" value="<?= $count ?>" class="form-control TS_SER" autocomplete="off" style="width:50px;" readonly></td>
                            <td style="text-align: center;">
                                <div class="form-group"><select name="TS_DY[]" id="TS_DY_1" class="form-control select2 TS_DY" autocomplete="off" style="width:100px;">
                                        <?php for ($i = 0; $i < count($day); $i++) {
                                            echo '<option value="' . $day[$i]->getDYID() . '">' . $day[$i]->getDYName() . '</option>';
                                        } ?>
                                </div>
                            </td>
                            <td><input type="date" value="<?php echo date('Y-m-d') ?>" name="TSDAT[]" id="TSDAT_1" class="form-control TSDAT" autocomplete="off" style="width:150px;"></td>

                            <td>
                                <div class="form-group">
                                    <select name="VS_CUSTID[]" id="VS_CUSTID_1" class="form-control select2 VS_CUSTID" autocomplete="off" style="width:200px;">
                                        <option value="" selected disabled>اختر اسم المشتري</option>
                                        <?php echo $vts->get_custsupnst($connect); ?>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary btn_add_cust_vts" data-toggle="modal"><i class="fa fa-plus"></i></button>
                            </td>

                            <td>
                                <div class="form-group"><input type="text" pattern="[0-9]*" name="TS_NUM[]" id="TS_NUM_1" class="form-control TS_NUM" onchange="total_amount_supp()" value="0" autocomplete="off" style="width:100px;"></div>
                            </td>

                            <td>
                                <div class="form-group"><input type="text" pattern="[0-9]*" name="TS_PRC[]" id="TS_PRC_1" class="form-control TS_PRC" onchange="total_amount_supp()" value="0" autocomplete="off" style="width:100px;"></div>
                            </td>

                            <td>
                                <div class="form-group"><input type="text" pattern="[0-9]*" name="TS_TOT[]" id="TS_TOT_1" class="form-control TS_TOT" onchange="total_amount_supp()" value="0" autocomplete="off" style="width:150px;"></div>
                            </td>
                            <td style="display: none;">
                                <div class="form-group"><input type="text" pattern="[0-9]*" name="TS_DISC[]" id="TS_DISC_1" class="form-control TS_DISC" value="0.00" autocomplete="off" style="width:150px;"></div>
                            </td>
                            <td style="display: none;">
                                <div class="form-group"><input type="text" pattern="[0-9]*" name="TSTOTDISC[]" id="TSTOTDISC_1" class="form-control TSTOTDISC" value="0.00" autocomplete="off" style="width:150px;"></div>
                            </td>
                            <td>
                                <div class="form-group"><input type="text" pattern="[0-9]*" name="TSMUST[]" id="TSMUST_1" class="form-control TSMUST" onchange="totalTSMUSTAmountsupp_all_day()" value="0.00" autocomplete="off" style="width:150px;"></div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="TSNT[]" id="TSNT_1" class="form-control TSNT" style="width:150px;" autocomplete="off">
                                </div>
                            </td>



                            <td><button class="btn btn-primary" id="addRows_vts" type="button"><span class="glyphicon glyphicon-plus"></span></button></td>
                            <td><button class="btn btn-primary delete" id="removeRows_vts" type="button"><span class="glyphicon glyphicon-minus"></span></button></td>
                        </tr>

                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">إجمالي يوم كامل</th>
                                <th colspan="2"><input type="text" pattern="[0-9]*" class="form-control" id="TSTOTDYCOM" name="TSTOTDYCOM" value=0 placeholder="0.00" readonly style="width:100%;text-align: center;color:black;" /></th>
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
                                <th colspan="2"><input type="text" class="form-control" onchange="calDISCRET_supp()" id="TSITOTRET" name="TSITOTRET" placeholder="%0" style="width:100%;text-align: center;color:red;" /></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                            <tr style="display:none">
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none" colspan="2">ملبغ التخفيض</th>
                                <th style="display:none" colspan="2"><input type="text" pattern="[0-9]*" class="form-control" onchange="calDISCAMO_supp()" id="TSTOTAMOU" name="TSTOTAMOU" value=0 placeholder="0" readonly style="width:100%;text-align: center;color:black;" /></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                                <th style="display:none"></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">الصافي</th>
                                <th colspan="2"><input type="text" pattern="[0-9]*" name="TSTOTSALE" id="TSTOTSALE" class="form-control TSTOTSALE" autocomplete="off" value=0 readonly style="width:100%;text-align: center;color:red;"></th>
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
                                <th colspan="2"><input type="text" pattern="[0-9]*" name="TSMUS" id="TSMUS" class="form-control TSMUS" onchange="totalTSMUSTAmountsupp_all_day()" autocomplete="off" value="0.00" style="width:100%;text-align: center;color:black;" readonly></th>
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
                                <th colspan="2"><input type="text" pattern="[0-9]*" name="TSHISREMD" id="TSHISREMD" class="form-control TSHISREMD" autocomplete="off" value="0.00" onchange="cal_remaind_supp()" readonly style="width:100%;text-align: center;color:red;"></th>
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
                                <th colspan="2"><input type="text" pattern="[0-9]*" name="TSONREMD" id="TSONREMD" class="form-control TSONREMD" autocomplete="off" value="0.00" onchange="cal_remaind_supp()" readonly style="width:100%;text-align: center;color:red;"></th>
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
</form>

<!-- /.modal For add supp -->
<div class="modal" id="modal_default_supp_vts" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تسجيل المورد</h4>
            </div>
            <div class="modal-body">

                <form action="" id="f_A_S_vts" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="SUPP_ID"> الرقم
                                    :</label>
                                <input type="text" class="form-control" id="SUPP_ID" name="SUPP_ID" placeholder="الرقم" readonly />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CEN_NAME"> الاسم الرباعي
                                    :</label>
                                <input type="text" class="form-control" id="SUPP_NAME" name="SUPP_NAME" placeholder="الاسم الرباعي" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CEN_NAMEE"> رقم الهاتف
                                    :</label>
                                <input type="text" style="text-align: left;" class="form-control" id="SUPP_PHONE" name="SUPP_PHONE" placeholder="  (رقم الهاتف)" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الايميل :</label>
                                <input type="email" name="SUPP_EMAIL" id="SUPP_EMAIL" class="form-control" placeholder="ادخل الايميل">

                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="SUPP_INS_USER" name="SUPP_INS_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" style="text-align: center" readonly />

                        <div class="col-md-6">
                            <div class="">
                                <label for="SUPP_FREEZE"> التجميد:
                                </label>
                                <select class="form-control form-select-sm" id="SUPP_FREEZE" name="SUPP_FREEZE">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" id="cancel_model_supp_vts" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                        <button type="button" id="Btn_sys_SVTS" class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- modal SccessFully Add supp -->
<div class="modal modal-primary" id="modal_success_vts" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حفظ البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>



<!-- Add cust form Screen Suppvt-->
<div class="modal" id="modal_default_cust_vts" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تسجيل العميل</h4>
            </div>
            <div class="modal-body">

                <form action="" id="F_A_C_VT" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CUST_ID"> الرقم
                                    :</label>
                                <input type="text" class="form-control" id="CUST_ID" name="CUST_ID" placeholder="الرقم" readonly />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CUST_NAME"> الاسم الرباعي
                                    :</label>
                                <input type="text" class="form-control" id="CUST_NAME" name="CUST_NAME" placeholder="الاسم الرباعي" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CUST_PHONE"> رقم الهاتف
                                    :</label>
                                <input type="text" style="text-align: left;" class="form-control" id="CUST_PHONE" name="CUST_PHONE" placeholder="  (رقم الهاتف)" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الايميل :</label>
                                <input type="email" name="CUST_EMAIL" id="CUST_EMAIL" class="form-control" placeholder="ادخل الايميل">

                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="CUST_INS_USER" name="CUST_INS_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" style="text-align: center" readonly />

                        <div class="col-md-6">
                            <div class="">
                                <label for="CUST_FREEZE"> التجميد:
                                </label>
                                <select class="form-control form-select-sm" id="CUST_FREEZE" name="CUST_FREEZE">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" id="canl_mod_c_vts" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                        <button type="button" id="btn_save_c_vts" class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-primary" id="modal_success_vtc" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حفظ البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>






<script>
    //=========== اظهار رقم المستند عن طريق اختيار نوع المستند ===================================================
    function get_vts_id() {
        const VS_TYP_NO_INPUT = document.getElementById('VS_TYP_NO');
        $('#VS_TYP_ID').on('select2:select', function(e) {
            var VS_DAT = document.getElementById('VS_DAT').value;
            var d = new Date(VS_DAT);
            var VS_DAT = $('#VS_DAT').val();
            year = d.getFullYear();
            let newVouTypNo;
            $.ajax({
                url: '../../Controllers/SuppController.php',
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




    function get_vts_id() {
        const VS_TYP_NO_INPUT = document.getElementById('VS_TYP_NO');
        $('#VS_TYP_ID').on('select2:select', function(e) {
            var VS_DAT = document.getElementById('VS_DAT').value;
            var d = new Date(VS_DAT);
            var VS_DAT = $('#VS_DAT').val();
            year = d.getFullYear();
            let newVouTypNo;
            $.ajax({
                url: '../../Controllers/SuppController.php',
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






    function get_Sumsupp_id() {
        // alert('clicks ok')
        var totsup = $('#VS_BENF').val();
        // alert(totsup)
        $.ajax({
            url: '../../Models/VTSModel.php',
            method: 'POST',
            data: 'totsup=' + totsup
        }).done(function(TSTOTSALE) {
            TSTOTSALE = JSON.parse(TSTOTSALE);
            // alert(TSTOTSALE);
            TSTOTSALE.forEach(function(cus) {
                $('#total_supp_all').val(cus.TSTOTSALE);
            })
        });
        get_remindupp_id();
        get_hisremindupp_id();
        get_Sonremindupp_id();
    }



    function get_remindupp_id() {
        // alert('clicks ok')
        var remind = $('#VS_BENF').val();
        // alert(remind)
        $.ajax({
            url: '../../Models/VTSModel.php',
            method: 'POST',
            data: 'remind=' + remind
        }).done(function(TSMUS) {
            TSMUS = JSON.parse(TSMUS);
            // alert(TSTOTSALE);
            TSMUS.forEach(function(cus) {
                $('#remind_supp_all').val(cus.TSMUS);
            })
        });
    }



    function get_hisremindupp_id() {
        // alert('clicks ok')
        var hisrm = $('#VS_BENF').val();
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
                    $('#mhisrm_supp_all').val(cus.TSHISREMD);
                } else if (cus.TSHISREMD < 0) {
                    $('#mhisrm_supp_all').val(0);
                } else if (cus.TSHISREMD == 0) {
                    $('#mhisrm_supp_all').val(0);
                }
            })
        });
    }



    function get_Sonremindupp_id() {
        // alert('clicks ok')
        var Sonrm = $('#VS_BENF').val();
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
                    $('#msonrm_supp_all').val(cus.TSONREMD);
                } else if (cus.TSONREMD < 0) {
                    $('#msonrm_supp_all').val(0);
                } else if (cus.TSONREMD == 0) {
                    $('#msonrm_supp_all').val(0);
                }
            })
        });
    }
</script>