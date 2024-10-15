<form action="" id="FVTS_S_Edit" method="post">
    <div class="box box-primary">
        <div class="box-header with-border">
            <input type="hidden" value="<?php echo $SuppValues['VS_ID']; ?>" class="form-control" name="VS_ID" id="VS_ID">
            <!-- modal to ensure that the data was added correctly -->
            <div class="modal" id="modal_VTS_edit" style="display:none">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                            <h4 class="modal-title">تأكيد تعديل بيانات القيد</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_active_del">
                            <p>هل تريد تعديل بيانات هذا القيد ؟ </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-left" id="can_save_VTS_Edit" data-dismiss="modal">لا</button>
                            <input type="submit" name="btn_edit_VTS" id="btn_edit_VTS" value="حفظ" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal -->

            <!-- button return you to page main trans  -->
            <a href="?page=p_m_supp"> <button type="button" class="btn btn-primary" data-dismiss="modal">

                    الغاء

                </button> </a>
            <!-- End button cancel -->
            <button type="button" name="btn_valid_frm_Edit_vts" id="btn_valid_frm_Edit_vts" class="btn btn-primary">حفظ</button>
            <!-- End button Add -->
        </div>





        <div class="box-body">

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label> رقم الفاتورة :</label>
                        <input disabled type="text" id="VS_ID" name="VS_ID" class="form-control" value="<?php echo $SuppValues['VS_ID']; ?>" style="text-align: center" readonly>
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
                            <input type="date" id="VS_DAT" name="VS_DAT" value="<?php echo date("Y-m-d", strtotime($SuppValues['VS_DAT'])); ?>" style="text-align: center" readonly class="form-control">
                        <?php   } else { ?>
                            <input type="text" id="VS_DAT" name="VS_DAT" value="<?php echo date("Y-m-d", strtotime($SuppValues['VS_DAT'])); ?>" style="text-align: center" readonly class="form-control" readonly>
                        <?php
                        }

                        ?>

                    </div>
                </div>



                <div class="col-md-2">
                    <div class="form-group">
                        <label>رقم المدخل:</label>
                        <input type="text" class="form-control" id="VOU_USE_ID" name="VOU_USE_ID" value="<?php echo $SuppValues['VOU_USE_ID']; ?>" style="text-align: center" readonly />
                    </div>

                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label> المدخل :</label>
                        <input type="text" class="form-control txt" name="VOU_USE_name" id="VOU_USE_name" value="<?php echo $ens[0]->getSYS_User_name(); ?>" placeholder=" المستخدم" readonly />
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label> اسم الرعوي:</label>
                        <select class="form-control form-select-sm" id="VS_BENF" name="VS_BENF" disabled>
                            <?php echo $vts->getnamesupp($connect, $SuppValues['VS_BENF']); ?>
                        </select>
                    </div>
                </div>



                <div class="col-md-5">
                    <div class="form-group">
                        <label> الملاحظة :</label>
                        <input type="text" class="form-control" name="VS_NT" id="VS_NT" value="<?php echo $SuppValues['VS_NT']; ?>" placeholder="اضف ملاحظة" readonly>
                    </div>
                </div>


                <input type="hidden" value="0" class="form-control txt" name="VS_ST" id="VS_ST" value="<?php echo $SuppValues['VS_ST']; ?>" placeholder="حالة القيد" />

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 VOU_ACC">
                    <table class="table table-bordered table-hover" id="moveItem_vts">
                        <tr>
                            <th width="20px;"><input id="checkAll_vts" class="formcontrol" type="checkbox" disabled></th>
                            <th width="50px;" style="text-align: center;">مسلسل</th>
                            <th width="150px;" style="text-align: center;"> اليوم</th>
                            <th width="150px;" style="text-align: center;">التأريخ</th>
                            <th width="100px;" style="text-align: center;">المشتري</th>
                            <th width="100px;" style="text-align: center;">العدد</th>
                            <th width="100px;" style="text-align: center;">السعر</th>
                            <th width="150px;" style="text-align: center;">الإجمالي</th>
                            <th width="150px;" style="text-align: center;">الخصم</th>
                            <th width="150px;" style="text-align: center;">اجمالي بعد الخصم</th>
                            <th width="150px;" style="text-align: center;">المسلم</th>
                            <th width="200px;" style="text-align: center;">الملاحظات</th>
                        </tr>
                        <?php
                        $count = 0;
                        foreach ($detItems_sup as $supp_det_item) {
                            $count++;
                        ?>

                            <tr>
                                <td style="text-align: center;"><input class="itemRow_vts" type="checkbox" disabled></td>
                                <td><input type="number" name="TS_SER[]" id="TS_SER_<?php echo $count ?>" value="<?php echo $supp_det_item["TS_SER"]; ?>" class="form-control TS_SER" autocomplete="off" style="width:50px;" readonly></td>
                                <td style="text-align: center;">
                                    <div class="form-group"><select name="TS_DY[]" id="TS_DY_<?php echo $count ?>" class="form-control select2 TS_DY" autocomplete="off" style="width:350px;" disabled>
                                            <?php echo $vts->get_days_selected($connect, $supp_det_item['TS_DY']); ?>
                                        </select>
                                    </div>
                                </td>

                                <td><input type="date" value="<?php echo date("Y-m-d", strtotime($supp_det_item['TSDAT'])); ?>" name="TSDAT[]" id="TSDAT_<?php echo $count ?>" class="form-control TSDAT" style="width:150px;" autocomplete="off" disabled></td>

                                <td style="text-align: center;">
                                    <div class="form-group">
                                        <select name="VS_CUSTID[]" id="VS_CUSTID_<?php echo $count ?>" class="form-control select2 VS_CUSTID" autocomplete="off" style="width:200px;" disabled>
                                            <option value="" selected disabled>اختر اسم المشتري</option>
                                            <?php echo $vts->get_suppc_selected_edit($connect, $supp_det_item["VS_CUSTID"]); ?>
                                        </select>
                                    </div>
                                </td>


                                <td>
                                    <div class="form-group"><input type="number" name="TS_NUM[]" id="TS_NUM_<?php echo $count ?>" class="form-control TS_NUM" onchange="total_amount_supp()" value="<?php echo $supp_det_item["TS_NUM"]; ?>" autocomplete="off" style="width:250px;" readonly></div>
                                </td>

                                <td>
                                    <div class="form-group"><input type="number" name="TS_PRC[]" id="TS_PRC_<?php echo $count ?>" class="form-control TS_PRC" onchange="total_amount_supp()" value="<?php echo $supp_det_item["TS_PRC"]; ?>" autocomplete="off" style="width:200px;" readonly></div>
                                </td>

                                <td>
                                    <div class="form-group"><input type="number" name="TS_TOT[]" id="TS_TOT_<?php echo $count ?>" class="form-control TS_TOT" onchange="total_amount_supp()" value="<?php echo $supp_det_item["TS_TOT"]; ?>" autocomplete="off" style="width:200px;" readonly></div>
                                </td>
                                <td>
                                    <div class="form-group"><input type="number" name="TS_DISC[]" id="TS_DISC_<?php echo $count ?>" class="form-control TS_DISC" value="<?php echo $supp_det_item["TS_DISC"]; ?>" autocomplete="off" style="width:200px;" readonly></div>
                                </td>
                                <td>
                                    <div class="form-group"><input type="number" name="TSTOTDISC[]" id="TSTOTDISC_<?php echo $count ?>" class="form-control TSTOTDISC" value="<?php echo $supp_det_item["TSTOTDISC"]; ?>" autocomplete="off" style="width:200px;" readonly></div>
                                </td>
                                <td>
                                    <div class="form-group"><input type="number" name="TSMUST[]" id="TSMUST_<?php echo $count ?>" class="form-control TSMUST" onchange="totalTSMUSTAmountsupp_all_day()" value="<?php echo $supp_det_item["TSMUST"]; ?>" autocomplete="off" style="width:150px;" readonly></div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="TSNT[]" id="TSNT_<?php echo $count ?>" class="form-control TSNT" value="<?php echo $supp_det_item["TSNT"]; ?>" style="width:350px;" autocomplete="off" readonly>
                                    </div>
                                </td>

                                <td style="display: none;"><input type="date" name="TSDAT[]" id="TSDAT_<?php echo $count ?>" class="form-control TSDAT" value="<?php echo $supp_det_item["TSDAT"]; ?>" autocomplete="off" readonly></td>

                                <td></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">إجمالي يوم كامل</th>
                                <th colspan="2"><input type="number" class="form-control" id="TSTOTDYCOM" name="TSTOTDYCOM" value="<?php echo $SuppValues["TSTOTDYCOM"]; ?>" placeholder="0.00" readonly style="width:100%;text-align: center;color:black" readonly /></th>
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
                                <th colspan="2"><input type="text" class="form-control" onchange="calDISCRET_supp()" id="TSITOTRET" name="TSITOTRET" value="<?php echo $SuppValues["TSITOTRET"]; ?>" readonly style="width:100%;text-align: center;color:red" /></th>
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
                                <th colspan="2"><input type="number" value="<?php echo $SuppValues["TSTOTAMOU"]; ?>" class="form-control" onchange="calDISCAMO_supp()" id="TSTOTAMOU" name="TSTOTAMOU" readonly style="width:100%;text-align: center;color:black" /></th>
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
                                <th colspan="2">الصافي</th>
                                <th colspan="2"><input type="number" value="<?php echo $SuppValues["TSTOTSALE"]; ?>" name="TSTOTSALE" id="TSTOTSALE" class="form-control TSTOTSALE" autocomplete="off" readonly style="width:100%;text-align: center;color:red"></th>
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
                                <th colspan="2"><input type="number" value="<?php echo $SuppValues["TSMUS"]; ?>" name="TSMUS" id="TSMUS" class="form-control TSMUS" onchange="totalTSMUSTAmountsupp_all_day()" autocomplete="off" readonly style="width:100%;text-align: center;color:black;" readonly></th>
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
                                <th colspan="2"><input type="number" value="<?php echo $SuppValues["TSHISREMD"]; ?>" name="TSHISREMD" id="TSHISREMD" class="form-control TSHISREMD" onchange="cal_remaind_supp()" autocomplete="off" readonly style="width:100%;text-align: center;color:red"></th>
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
                                <th colspan="2"><input type="number" value="<?php echo $SuppValues["TSONREMD"]; ?>" name="TSONREMD" id="TSONREMD" class="form-control TSONREMD" autocomplete="off" value="0.00" onchange="cal_remaind_supp()" readonly style="width:100%;text-align: center;color:red"></th>
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