<div class="box box-solid">
    <div class="box-body">
        <a class="btn btn-app">
            <span class="badge bg-purple">
                <?php
                if (count($vtctwo) > 0) {
                    $vtctwo = count($vtctwo);
                    echo  $vtctwo;
                } else {
                    echo 0;
                }
                ?>
            </span>
            <i class="fa fa-users"></i> عدد القيود قيد التسجيل
        </a>
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

                <a href="<?php echo base_url ?>User/?page=p_add_cust_vt"><button type="button" autofocus class="btn btn-primary"><i class="fa fa-plus"></i>
                        تسجيل قيد
                    </button></a>
            <?php
            } else { ?>


                <a style="pointer-events: none;" href="<?php echo base_url ?>User/?page=p_add_cust_vt"><button type="button" autofocus class="btn btn-primary"><i class="fa fa-plus"></i>
                        تسجيل قيد
                    </button></a>


            <?php
            }
            ?>
        </div>

        <div class="box-body" dir="rtl" style="text-align: center;">
            <table id="Tb_Csut_ID" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;width:10%">رقم الفاتورة</th>
                        <th style="text-align: center;width:10%">تاريخ العملية</th>
                        <th style="text-align: center;width:10%;">اسم العميل</th>
                        <th style="text-align: center;width:15%;">رقم الهاتف</th>
                        <th style="text-align: center;width:30%;">البيان</th>
                        <th style="text-align: center;width:10%;">الحالة</th>
                        <th style="text-align: center;width:15%;">الوظائف</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $Listcusttwo = $vtc->getVTCListtwo($connect);
                    foreach ($Listcusttwo as $Detcustwo) {
                        $Datecust = date("d-m-Y", strtotime($Detcustwo["VS_DAT"]));
                        echo '
                                <tr>
                                    <td>' . $Detcustwo["VS_ID"] . '</td>
                                    <td>' .   $Datecust . '</td>
                                    <td>' . $Detcustwo["CUST_NAME"] . '</td>
                                    <td>' . $Detcustwo["SYS_User_name"] . '</td>   
                                    <td>' . $Detcustwo["VS_NT"] . '</td>
                                                                                                      
                                  ';

                        switch ($Detcustwo["VS_ST"]) {
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

                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y' and SEC_SHOW = 'Y'");
                        $row = mysqli_fetch_array($stmt);
                        if (isset($row['SEC_USE_ID'])) {

                            echo '
                                    <a href="?page=p_fin_v_cust_vt&updatecust_id=' . $Detcustwo["VS_ID"] . '"  data-toggle="tooltip" data-placement="top" title="عرض" class="btn bg-olive"><span class="glyphicon glyphicon-eye-open"> عرض البيانات </span></a></li>';
                        } else {
                            echo '
                                    <a  style="pointer-events: none;"  data-toggle="tooltip" data-placement="top" title="عرض" class="btn bg-olive"><span class="glyphicon glyphicon-eye-open"> عرض البيانات </span></a></li>';
                        }

                        echo ' 
                    <li class="divider"></li>';
                        echo '
                    <li>                                                            
                    <a href="#" id="PrintdataVTCustU"  data-toggle="tooltip" data-placement="top" title="طباعة القيد" VS_ID="' . $Detcustwo["VS_ID"] . '" VOU_USE_name="' . $ens[0]->getSYS_User_name() . '"  VS_TYP_ID="' . $Detcustwo["VS_TYP_ID"] . '" VS_ST="' . $Detcustwo["VS_ST"] . '" " class="btn bg-olive"><span class="glyphicon glyphicon-print"> طباعة القيد </span></a>                                                                    
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
<div class="modal" id="modal_mov_vtc" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">نقل السجل الى مرحلة المراجعة</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_tvc" class="form-control">
                <input type="hidden" id="TCTOTSALE" class="form-control">
                <input type="hidden" id="TCMUS" class="form-control">

                <p>هل تريد نقل هذا السجل الى مرحلة المراجعة ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_mvtc_status" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                <button type="button" id="btn_mov_tvcust" class="btn btn-primary">الانتقال</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- تم نقل السجل الى مرحلة المراجعة -->
<div class="modal modal-primary" id="modal_move_cust" style="display:none">
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




<script>
    $(document).ready(function() {
        $(document).on('click', '#removeRows', function() {
            $(".itemRow:checked").each(function() {
                $(this).closest('tr').remove();
            });
            $('#checkAll').prop('checked', false);
        });



        // لمغرفة
        $(document).on('click', '#print_voucher', function() {
            //    alert("ttt");

            // var VS_ID = $(this).attr('voucher_id');
            // var VOU_Beneficiary_Name = $(this).attr('VOU_Beneficiary_Name');

            //    alert(VS_ID +'//'+VOU_Beneficiary_Name)

            // $.ajax({
            //     type: "POST",
            //     url: "../../Controllers/TransController.php",
            //     data: {
            //         methode: "mov_report",
            //         VS_ID: VS_ID,
            //         vou_desc: VOU_Beneficiary_Name
            //     },
            //     success: function(result) {
            //         alert(result)
            //         window.open(result, "resizeable,scrollbar");
            //     }
            // });
            vo_id = $("#VS_ID").val();
            //  alert(vo_id);
            $.ajax({
                type: "POST",
                url: "../../Controllers/TransController.php",
                data: {
                    methode: "get_count_print",
                    VS_ID: vo_id
                },
                success: function(result) {
                    // //alert(result);

                }
            });



        });


        $(document).on('click', '#print_voucher', function() {
            VS_ID = $(this).attr('voucher_id');
            $('#VS_ID').val(VS_ID);
            //  $('#modal_desc_print').css('display','show');
            $('#modal_desc_print').css("display", "block");

        });

        localStorage.clear()

    });
</script>