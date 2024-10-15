<div class="box box-solid">
    <div class="box-body">
        <a class="btn btn-app">
            <span class="badge bg-purple">
                <?php
                if (count($vtsupo) > 0) {
                    $rev_tvs = count($vtsupo);
                    echo  $rev_tvs;
                } else {
                    echo 0;
                }
                ?>
            </span>
            <i class="fa fa-users"></i> عدد القيود قيد المراجعة
        </a>
    </div>
</div>




<div class="box box-primary">

    <div class="box-header">


        <div class="box-body">
        </div>

        <div class="box-body" dir="rtl" style="text-align: center;">
            <table id="Tb_Sup_ID" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;width:10%">رقم الفاتورة</th>
                        <th style="text-align: center;width:10%">تاريخ العملية</th>
                        <th style="text-align: center;width:10%;">اسم المورد</th>
                        <th style="text-align: center;width:10%;">مدخل البيانات</th>
                        <th style="text-align: center;width:30%;">البيان</th>
                        <th style="text-align: center;width:10%;">الحالة</th>
                        <th style="text-align: center;width:15%;">الوظائف</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SuppList = $vts->getvtsList_rev($connect);
                    foreach ($SuppList as $SuppDetails) {
                        $SuppDate = date("d-m-Y", strtotime($SuppDetails["VS_DAT"]));
                        echo '
                                <tr>
                                    <td>' . $SuppDetails["VS_ID"] . '</td>
                                    <td>' .   $SuppDate . '</td>
                                    <td> ' . $SuppDetails["SUPP_NAME"] . '</td>
                                    <td>' . $SuppDetails["SYS_User_name"] . '</td>   
                                    <td>' . $SuppDetails["VS_NT"] . '</td>
                                                                                                      
                                  <!--  <td>' . $SuppDetails["SYS_User_name"] . '</td>-->
                                  
                                  ';

                        switch ($SuppDetails["VS_ST"]) {
                            case '0':
                                echo ' <td><span class="badge bg-light-blue">' . "تسجيل" . '</span></td>';
                                break;
                            case '1':
                                echo ' <td><span class="badge bg-light-blue">' . "مراجعة" . '</span></td>';
                                break;
                            case '2':
                                echo ' <td><span class="badge bg-light-blue">' . "مُرحل" . '</span></td>';
                                break;
                            default:
                                // echo "لا يوجد عناصر تم تجميدها";
                                echo ' <td><span class="badge bg-light-blue">' . "لا يوجد عناصر " . '</span></td>';
                        }
                        echo '
                                    <td class="box-footer" style="direction:rtl;">
                                    
                                    <div class="btn-group" style="direction:rtl;">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only"></span>
                                    </button>
                                    <button type="button" class="btn btn-info">العمليات</button>
                                    <ul class="dropdown-menu" role="menu">';



                        echo '<li>';

                        echo '
                                    <a href="?page=p_rev_v_supp_vt&update_id=' . $SuppDetails["VS_ID"] . '"  data-toggle="tooltip" data-placement="top" title="عرض" class="btn bg-olive"><span class="glyphicon glyphicon-eye-open"> عرض البيانات </span></a></li>';

                        echo ' <li class="divider"></li>';

                        echo '<li>';
                        echo ' <a href="#" id="' . $SuppDetails["VS_ID"] . '"  data-toggle="tooltip" data-placement="top" title="ترحيل" class="VT_SUP_Agree btn bg-olive"   data-toggle="modal"><span class="glyphicon glyphicon-transfer">  اعتماد القيد </span></a> </li>';
                        echo '<li class="divider"></li>';



                        echo '<li>';



                        echo ' <a href="#" id="' . $SuppDetails["VS_ID"] . '"  data-toggle="tooltip" data-placement="top" title="رفض" class="btn_trans_refused btn bg-olive"  class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-ban-circle"> رفض القيد </span></a></li>';

                        echo '<li class="divider"></li>';




                        echo '
                                    <li>                                                            
                                    <a href="#" id="PrintdataVTSupU"  data-toggle="tooltip" data-placement="top" title="طباعة القيد" voucher_id="' . $SuppDetails["VS_ID"] . '" VOU_USE_name="' . $ens[0]->getSYS_User_name() . '"  VS_TYP_ID="' . $SuppDetails["VS_TYP_ID"] . '" VS_ST="' . $SuppDetails["VS_ST"] . '" " class="btn bg-olive"><span class="glyphicon glyphicon-print"> طباعة القيد </span></a>                                                                    
                                    </li>

                                    </ul>
                                </div>                                                          
                                    </td>                           
                                    </tr>
                                ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div><!-- /.box -->
</div>
<!-- /.col -->


<!-- نقل السجل الى مرحلة المراجعة -->
<div class="modal" id="modal_del_status" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">نقل السجل الى مرحلة المراجعة</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_trans_status" class="form-control">
                <input type="hidden" id="totcrdamount" class="form-control">
                <input type="hidden" id="totaldebitamount" class="form-control">

                <p>هل تريد نقل هذا السجل الى مرحلة المراجعة ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_trans_status" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                <button type="button" id="btn_trans_status" class="btn btn-primary">الانتقال</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- ترحيل السجل -->
<div class="modal" id="modal_agree_status_rev" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">ترحيل السجل</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_vts_stat_rev">
                <p>هل تريد ترحيل هذا السجل ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" id="cancel_move_kied" data-dismiss="modal">الغاء</button>
                <button type="button" id="btn_trans_stat_review" class="btn btn-primary">ترحيل</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<!-- تم نقل السجل بشكل نهائي -->
<div class="modal modal-primary" id="modal_mov_finial" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم نقل السجل بشكل نهائي&hellip;</p>
        </div>
    </div>
</div>



<!-- /.modal-dialog-Refused-->
<!-- رفض السجل وارجاعة الى شاشة وضع التسجيل  -->
<div class="modal" id="modal_return_stat_ref">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">رفض السجل</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_vtsup_stat_ref">
                <p>هل تريد ارجاع السجل الى مرحلة التسجيل ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_mod_stat_ref" class="btn btn-primary pull-left">الغاء</button>
                <button type="button" id="btn_trans_stat_review_ref" class="btn btn-primary">رفض</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- رسالة تأكيد تم رفض نقل السجل  -->
<div class="modal modal-primary" id="refuse_mov_to_finial" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم رفض نقل السجل &hellip;</p>
        </div>
    </div>
</div>