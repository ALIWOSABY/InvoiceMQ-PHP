<div class="box box-solid">
    <div class="box-body">
        <a class="btn btn-app">
            <span class="badge bg-purple">
                <?php
                if (count($CT) > 0) {
                    $ct_cp = count($CT);
                    echo  $ct_cp;
                } else {
                    echo 0;
                }
                ?>
            </span>
            <i class="fa fa-users"></i> عدد العملاء
        </a>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="box box">
            <div class="box-body">
                <form action="../../Controllers/impcus.php" method="post" name="upload_excel" enctype="multipart/form-data">

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




            <?php
            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =5 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
            $row = mysqli_fetch_array($stmt);

            if (isset($row['SEC_USE_ID'])) { ?>
                <button type="button" class="btn btn-primary btn_add_cust" data-toggle="modal"><i class="fa fa-plus"></i>
                    تسجيل العميل
                </button>
            <?php
            } else { ?>
                <button type="button" disabled class="btn btn-primary btn_add_cust" data-toggle="modal"><i class="fa fa-plus"></i>
                    تسجيل العميل
                </button>
            <?php
            }

            ?>

        </div>
        <!-- /.box-header -->
        <div class="box-body" dir="rtl" style="text-align: center;">
            <table id="cust_id_tb" class="table table-bordered table-striped" style="text-align: center;">
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
                    <?php for ($i = 0; $i < count($CT); $i++) { ?>
                        <tr>
                            <td><?php echo $CT[$i]->getCUSTID(); ?></td>
                            <td><?php echo $CT[$i]->getCUSTNAME(); ?></td>
                            <td><?php echo $CT[$i]->getCUSTPHONE(); ?></td>
                            <td><?php echo $CT[$i]->getCUSTEMAIL(); ?></td>
                            <!-- <td>?php echo $CT[$i]->getACT_STATUS(); ?></td> -->
                            <td>
                                <?php
                                switch ($CT[$i]->getCUSTFREEZE()) {
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
                                                <button type="button" id="edt_btn_c" CUST_NAME="<?php echo $CT[$i]->getCUSTNAME(); ?>" CUST_PHONE="<?php echo $CT[$i]->getCUSTPHONE(); ?>" CUST_EMAIL="<?php echo $CT[$i]->getCUSTEMAIL(); ?>" CUST_FREEZE="<?php echo $CT[$i]->getCUSTFREEZE(); ?>" CUST_ID="<?php echo $CT[$i]->getCUSTID(); ?>" class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            } else { ?>
                                                <button type="button" disabled id="edt_btn_c" class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
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
                                                <button type="button" id="del_activity" CUST_ID="<?php echo $CT[$i]->getCUSTID(); ?>" class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            } else { ?>
                                                <button type="button" disabled id="del_activity" CUST_ID="<?php echo $CT[$i]->getCUSTID(); ?>" class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash" aria-hidden="true">
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

<div class="modal" id="modal_default_cust" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تسجيل العميل</h4>
            </div>
            <div class="modal-body">

                <form action="" id="F_A_C" method="post" enctype="multipart/form-data">
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
                        <button type="button" id="canl_mod_c" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                        <button type="button" id="btn_save_c" class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal " id="modal_edit_c" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تعديل بيانات العميل</h4>
            </div>
            <div class="modal-body">


                <form action="" id="F_E_C" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      
                        <div class="col-md-6">
                            <div class="form-group">
                            <label> الرقم
                                    :</label>
                                <input type="text" class="form-control" id="CUST_ID_edit" name="CUST_ID_edit" placeholder="الرقم" readonly />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label> الاسم الرباعي
                                    :</label>
                                <input type="text" class="form-control" id="CUST_NAME_edit" name="CUST_NAME_edit" placeholder="الاسم الرباعي" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label> رقم الهاتف
                                    :</label>
                                    <input type="text" style="text-align: left;" class="form-control" id="CUST_PHONE_edit" name="CUST_PHONE_edit" placeholder="  (رقم الهاتف)" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الايميل :</label>
                                <input type="email" name="CUST_EMAIL_edit" id="CUST_EMAIL_edit" class="form-control" placeholder="ادخل الايميل">

                            </div>
                        </div>


                        <input type="hidden" class="form-control" id="CUST_UPD_USER" name="CUST_UPD_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" style="text-align: center" readonly />

                        <div class="col-md-6">
                            <div class="">
                                <label for="CUST_FREEZE_edit"> التجميد:
                                </label>
                                <select class="form-control form-select-sm" id="CUST_FREEZE_edit" name="CUST_FREEZE_edit">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" id="edit_cust_cancel" data-dismiss="modal">الغاء</button>
                        <button type="button" id="btn_valide_edit_c" class="btn btn-primary">حفظ</button>
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
                <h4 class="modal-title">حذف العميل</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_active_del">
                <p>هل تريد حذف هذا العميل ؟ </p>
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

<div class="modal modal-primary" id="modal_edit_cust" style="display:none">
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