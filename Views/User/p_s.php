<!-- الموردين -->
<div class="box box-solid">
    <div class="box-body">
        <a class="btn btn-app">
            <span class="badge bg-purple">
                <?php
                if (count($SP) > 0) {
                    $sp_cp = count($SP);
                    echo  $sp_cp;
                } else {
                    echo 0;
                }
                ?>
            </span>
            <i class="fa fa-users"></i> عدد الموردين
        </a>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="box box">
            <div class="box-body">
                <form action="../../Controllers/impsup.php" method="post" name="upload_excel" enctype="multipart/form-data">

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
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">جلب البيانات من الاكسل</button>
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

            <table class="table table-bordered" style="display:none">
                <?php
                $SQLSELECT = "SELECT * FROM supp";
                $result_set =  mysqli_query($conn, $SQLSELECT);
                while ($row = mysqli_fetch_array($result_set)) {
                ?>
                    <tr style="display:none">
                        <td style="display:none"><?php echo $row['SUPP_ID']; ?></td>
                        <td style="display:none"><?php echo $row['SUPP_NAME']; ?></td>
                        <td style="display:none"><?php echo $row['SUPP_PHONE']; ?></td>
                        <td style="display:none"><?php echo $row['SUPP_EMAIL']; ?></td>
                        
                        <td style="display:none"><?php echo $row['SUPP_INS_USER']; ?></td>
                        <td style="display:none"><?php echo $row['SUPP_INS_DATE']; ?></td>
                        <td style="display:none"><?php echo $row['SUPP_FREEZE']; ?></td>
                    </tr>
                <?php
                }
                ?>



                <?php
                $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =5 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
                $row = mysqli_fetch_array($stmt);

                if (isset($row['SEC_USE_ID'])) { ?>
                    <button type="button" class="btn btn-primary btn_supp_A" data-toggle="modal"><i class="fa fa-plus"></i>
                        تسجيل المورد
                    </button>
                <?php
                } else { ?>
                    <button type="button" disabled class="btn btn-primary btn_supp_A" data-toggle="modal"><i class="fa fa-plus"></i>
                        تسجيل المورد
                    </button>
                <?php
                }

                ?>

        </div>
        <!-- /.box-header -->
        <div class="box-body" dir="rtl" style="text-align: center;">
            <table id="supp_id_tb" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;">الرقم</th>
                        <th style="text-align: center;">الاسم الرباعي</th>
                        <th style="text-align: center;">رقم الهاتف</th>
                        <th style="text-align: center;">الايميل</th>
                        <th style="text-align: center;">الحالة</th>
                        <th style="text-align: center;">الوظائف</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($SP); $i++) { ?>
                        <tr>
                            <td><?php echo $SP[$i]->getSUPPID(); ?></td>
                            <td><?php echo $SP[$i]->getSUPPNAME(); ?></td>
                            <td><?php echo $SP[$i]->getSUPPPHONE(); ?></td>
                            <td><?php echo $SP[$i]->getSUPPEMAIL(); ?></td>
                            <!-- <td>?php echo $SP[$i]->getACT_STATUS(); ?></td> -->
                            <td>
                                <?php
                                switch ($SP[$i]->getSUPPFREEZE()) {
                                    case 'Y':
                                        echo '<span class="badge bg-light-blue">مفعل</span>';
                                        break;
                                    case 'N':
                                        echo '<span class="badge bg-red">غير مفعل</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-green">لا يوجد عناصر تم تجميدها</span>';
                                }
                                ?>
                            </td>

                            <td class="box-footer">

                                <div class="btn-group" style="direction:rtl;">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only"></span>
                                    </button>
                                    <button type="button" class="btn btn-info">العمليات</button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>



                                            <?php
                                            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =5 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                            $row = mysqli_fetch_array($stmt);

                                            if (isset($row['SEC_USE_ID'])) { ?>
                                                <button type="button" id="edt_btn_Sup" SUPP_NAME="<?php echo $SP[$i]->getSUPPNAME(); ?>" SUPP_PHONE="<?php echo $SP[$i]->getSUPPPHONE(); ?>" SUPP_EMAIL="<?php echo $SP[$i]->getSUPPEMAIL(); ?>" SUPP_FREEZE="<?php echo $SP[$i]->getSUPPFREEZE(); ?>" SUPP_ID="<?php echo $SP[$i]->getSUPPID(); ?>" class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            } else { ?>
                                                <button type="button" disabled id="edt_btn_Sup" class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li class="divider"></li>
                                        <li>




                                            <?php
                                            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =5 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                            $row = mysqli_fetch_array($stmt);

                                            if (isset($row['SEC_USE_ID'])) { ?>
                                                <button type="button" id="del_activity" SUPP_ID="<?php echo $SP[$i]->getSUPPID(); ?>" class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            } else { ?>
                                                <button type="button" disabled id="del_activity" SUPP_ID="<?php echo $SP[$i]->getSUPPID(); ?>" class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            }
                                            ?>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div><!-- /.box -->
</div>
<!-- /.col -->





<div class="modal" id="modal_default_supp" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تسجيل المورد</h4>
            </div>
            <div class="modal-body">

                <form action="" id="f_A_S" method="post" enctype="multipart/form-data">
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
                        <button type="button" id="cancel_model_supp" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                        <button type="button" id="Btn_sys_S" class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal " id="modal_edit_supp" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تعديل بيانات المورد</h4>
            </div>
            <div class="modal-body">
                <form action="" id="F_E_S" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الرقم
                                    :</label>
                                <input type="text" class="form-control" id="SUPP_ID_edit" name="SUPP_ID_edit" placeholder="الرقم" readonly />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الاسم الرباعي
                                    :</label>
                                <input type="text" class="form-control" id="SUPP_NAME_edit" name="SUPP_NAME_edit" placeholder="الاسم الرباعي" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> رقم الهاتف
                                    :</label>
                                <input type="text" style="text-align: left;" class="form-control" id="SUPP_PHONE_edit" name="SUPP_PHONE_edit" placeholder="  (رقم الهاتف)" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الايميل :</label>
                                <input type="email" name="SUPP_EMAIL_edit" id="SUPP_EMAIL_edit" class="form-control" placeholder="ادخل الايميل">

                            </div>
                        </div>


                        <input type="hidden" class="form-control" id="SUPP_UPD_USER" name="SUPP_UPD_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" style="text-align: center" readonly />

                        <div class="col-md-6">
                            <div class="">
                                <label for="SUPP_FREEZE_edit"> التجميد:
                                </label>
                                <select class="form-control form-select-sm" id="SUPP_FREEZE_edit" name="SUPP_FREEZE_edit">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" id="edit_Sup_cancel" data-dismiss="modal">الغاء</button>
                        <button type="button" id="btn_Valid_ed_cust" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- <div class="modal modal-danger fade" id="modal_del_activity"> -->
<div class="modal" id="modal_del_activity" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">حذف المورد</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_active_del">
                <p>هل تريد حذف هذا المورد ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" id="delete_activity_cancel" data-dismiss="modal">لا</button>
                <button type="button" id="btn_del_act" class="btn btn-primary">نعم</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal modal-primary" id="modal_success" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حفظ البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>


<div class="modal modal-primary" id="modal_imported_success" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم استدعاء البيانات من الاكسل بشكل صحيح &hellip;</p>
        </div>
    </div>
</div>

<div class="modal modal-primary" id="mod_editsup" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم تعديل البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>



<div class="modal modal-primary" id="modal_delete_activity" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حذف البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>