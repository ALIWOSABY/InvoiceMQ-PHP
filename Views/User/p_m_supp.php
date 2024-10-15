<div class="box box-solid">
    <div class="box-body">
        <a class="btn btn-app">
            <span class="badge bg-purple">
                <?php
                if (count($vtsup) > 0) {
                    $VT_S = count($vtsup);
                    echo  $VT_S;
                } else {
                    echo 0;
                }
                ?>
            </span>
            <i class="fa fa-users"></i> عدد القيود قيد التسجيل
        </a>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="box box">
            <div class="box-body">
                <form action="../../Controllers/impsupvts.php" method="post" name="upload_excel" enctype="multipart/form-data">

                    <div class="form-group has-feedback">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="file" name="file" id="file" class="input-large" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">استدعاء البيانات من الاكسل (راس القيد)</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12">
        <div class="box box">
            <div class="box-body">
                <form action="../../Controllers/impsupvts_d.php" method="post" name="upload_excel" enctype="multipart/form-data">

                    <div class="form-group has-feedback">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="file" name="file" id="file" class="input-large" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" id="submit" name="Import_d" class="btn btn-primary button-loading" data-loading-text="Loading...">استدعاء بيانات تفاصل القيود من الاكسل (تفاصيل القيد)</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="box box-primary">

    <div class="box-header">


        <div class="box-body">
            <?php
            require_once '../../db/config.php';
            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
            $row = mysqli_fetch_array($stmt);

            if (isset($row['SEC_USE_ID'])) { ?>

                <a href="<?php echo base_url ?>User/?page=p_add_supp_vt"><button type="button" autofocus class="btn btn-primary"><i class="fa fa-plus"></i>
                        تسجيل قيد جديد للمورد
                    </button></a>
            <?php
            } else { ?>


                <a style="pointer-events: none;" href="<?php echo base_url ?>User/?page=p_add_supp_vt"><button type="button" autofocus class="btn btn-primary"><i class="fa fa-plus"></i>
                        تسجيل قيد جديد للمورد
                    </button></a>


            <?php
            }
            ?>
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
                    $SuppList = $vts->getvtsList($connect);
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
                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                        $row = mysqli_fetch_array($stmt);
                        if (isset($row['SEC_USE_ID'])) {
                            echo '

                                    <a id="edit_trans_voucher" data-voucher="' . $SuppDetails["VS_ID"] . '" href="?page=p_edit_supp_vt&update_id=' . $SuppDetails["VS_ID"] . '" data-toggle="tooltip" data-placement="top" title="تعديل" class="btn bg-olive"><span class="glyphicon glyphicon-edit"> تعديل البيانات </span></a></li>';
                        } else {

                            echo '                                     
                                    <a id="edit_trans_voucher" style="pointer-events: none;"  data-toggle="tooltip" data-placement="top" title="تعديل" class="btn bg-olive"><span class="glyphicon glyphicon-edit"> تعديل البيانات </span></a>  </li>';
                        }

                        echo ' 
                                    <li class="divider"></li>';


                        echo '<li>';

                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y' and SEC_SHOW = 'Y'");
                        $row = mysqli_fetch_array($stmt);
                        if (isset($row['SEC_USE_ID'])) {

                            echo '
                                    <a href="?page=p_v_supp_vt&update_id=' . $SuppDetails["VS_ID"] . '"  data-toggle="tooltip" data-placement="top" title="عرض" class="btn bg-olive"><span class="glyphicon glyphicon-eye-open"> عرض البيانات </span></a></li>';
                        } else {
                            echo '
                                    <a  style="pointer-events: none;"  data-toggle="tooltip" data-placement="top" title="عرض" class="btn bg-olive"><span class="glyphicon glyphicon-eye-open"> عرض البيانات </span></a></li>';
                        }
                        echo '
                                    <li class="divider"></li>';

                        echo '<li>';

                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                        $row = mysqli_fetch_array($stmt);
                        if (isset($row['SEC_USE_ID'])) {

                            echo '
                                    <a href="#" id="' . $SuppDetails["VS_ID"] . '" class="deleterecords_move  btn bg-olive"  data-toggle="tooltip" data-placement="top" title="حــذف"><span class="glyphicon glyphicon-remove"> حــذف السـجل </span></a></li>';
                        } else {

                            echo '
                                    <a href="#"  style="pointer-events: none;" class="deleterecords_move  btn bg-olive"  data-toggle="tooltip" data-placement="top" title="حــذف"><span class="glyphicon glyphicon-remove"> حــذف السـجل </span></a></li>';
                        }

                        echo ' <li class="divider"></li>';


                        echo '<li>';



                        echo '<a href="#" id="' . $SuppDetails["VS_ID"] . '" TSTOTSALE="' . $SuppDetails["TSTOTSALE"] . '" TSMUS="' . $SuppDetails["TSMUS"] . '"  data-toggle="tooltip" data-placement="top" title="تحويل" class="trans_status_sup btn bg-olive" data-toggle="modal"><span class="glyphicon glyphicon-transfer"> نقل السجل </span></a></li>';





                        echo ' <li class="divider"></li>';


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
<div class="modal" id="modal_mov_vts" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">نقل السجل الى مرحلة المراجعة</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_tvs" class="form-control">
                <input type="hidden" id="TSTOTSALE" class="form-control">
                <input type="hidden" id="TSMUS" class="form-control">

                <p>هل تريد نقل هذا السجل الى مرحلة المراجعة ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_mvts_status" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                <button type="button" id="btn_mov_tvsup" class="btn btn-primary">الانتقال</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- تم نقل السجل الى مرحلة المراجعة -->
<div class="modal modal-primary" id="modal_move_sup" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم نقل السجل الى مرحلة المراجعة&hellip;</p>
        </div>
    </div>
</div>



<!-- حذف السجل -->
<div class="modal" id="modal_del_records" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">حذف السجل</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_del_record">
                <p>هل تريد حذف هذا السجل ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" id="cancel_model_tran_vouch" data-dismiss="modal">الغاء</button>
                <button type="button" id="btn_del_record" class="btn btn-primary">حــــذف</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- تم حذف البيانات بنجاح -->
<div class="modal modal-primary" id="modal_delete_trans_vou" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حذف البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>