<div class="box box-solid">
    <div class="box-body">

        <a class="btn btn-app" style="margin-bottom:0%">
            <span class="badge bg-purple" id="count_currencies">

                <?php
                if (isset($_SESSION['Privilege'])) {
                    echo count($_SESSION['Privilege']);
                } else {
                    echo "tt";
                }
                ?>
            </span>
            <i class="fa fa-money"></i> البرامج والصلاحيات
        </a>


    </div>
</div>









<div class="row" style="margin-top:0%">

    <div class="col-md-12">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">البرامج والصلاحيات</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <!-- /.col -->
                    <div class="row" style="margin-top:0%">

                    </div>


                    <!-- <div class="box-header with-border">           
          </div> -->

                    <div class="box-header" style="margin-top:0%; padding-top:0%">
                        <!-- <div class="col-xs-12"> -->
                        <!-- <div class="box box-default"> -->
                        <!-- <div class="box-body"> -->
                        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i>
                  اضافة
                </button> -->
                        <div class="bg-light clearfix">
                            <div class="pull-right">
                                <?php
                                $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =2 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
                                $row = mysqli_fetch_array($stmt);

                                if (isset($row['SEC_USE_ID'])) { ?>
                                    <button type="button" class="btn btn-primary btn_add_privilege" data-toggle="modal"><i class="fa fa-plus"></i> اضافة
                                    </button>
                                <?php
                                } else { ?>
                                    <button type="button" disabled class="btn btn-primary btn_add_privilege" data-toggle="modal"><i class="fa fa-plus"></i> اضافة
                                    </button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-print"></i>
                  طباعة مسودة
                </button>

                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning"><i class="fa fa-print"></i>
                  اعتماد بدون طباعة
                </button> -->
                        <!-- </div> -->
                        <!-- </div> -->
                        <!-- </div> -->
                        <div class="card-header">
                            <!-- <h3 class="box-title">البرامج والصلاحيات</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" dir="rtl" style="text-align: center;">
                            <table id="privilege_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th> رقم الصلاحية</th>
                                        <th> اسم الصلاحية</th>
                                        <th> اسم الصلاحية الاجنبي</th>
                                        <th>اسم الملف </th>
                                        <th>اسم التطبيق </th>
                                        <!-- <th>مستخدم الإضافة </th>
                                                <th> تاريخ الإضافة </th>
                                                <th> مستخدم التعديل </th>
                                                <th> تاريخ التعديل </th> -->
                                        <th> تجميد</th>
                                        <th style="text-align: center;">الوظائف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($_SESSION['Privilege'])) {

                                        $x = $_SESSION['Privilege'];
                                        for ($i = 0; $i < count($x); $i++) {

                                    ?>
                                            <tr>
                                                <td><?php echo $x[$i]->getPRO_ID();  ?></td>
                                                <td> <?php echo $x[$i]->getPRO_NAME();  ?></td>
                                                <td><?php echo $x[$i]->getPRO_NAMEE();  ?></td>
                                                <td> <?php echo $x[$i]->getPRO_FILE_NAME();  ?></td>
                                                <td><?php echo $x[$i]->getPRO_SYS_NAME();  ?></td>
                                                <!-- <td> <php echo $x[$i]->getPRO_INS_USER();  ?></td>
                                                <td>?php echo $x[$i]->getPRO_INS_DATE();  ?></td>
                                                <td> ?php echo $x[$i]->getPRO_UPD_USER();  ?></td>
                                                <td>?php echo $x[$i]->getPRO_UPD_DATE();  ?></td> -->

                                                <td>
                                                    <?php
                                                    switch ($x[$i]->getPRO_FREEZE()) {
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

                                                <td>
                                                    <div class="btn-group" style="direction:rtl;">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-info">العمليات</button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>


                                                                <!-- data-target="#btn_edit_Privilege" -->
                                                                <?php
                                                                $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =2 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                                $row = mysqli_fetch_array($stmt);

                                                                if (isset($row['SEC_USE_ID'])) { ?>
                                                                    <button type="button" class="btn bg-olive btn_edit_Privilege" data-toggle="modal" PRO_ID="<?php echo $x[$i]->getPRO_ID(); ?>" PRO_NAME="<?php echo $x[$i]->getPRO_NAME(); ?>" PRO_NAMEE="<?php echo $x[$i]->getPRO_NAMEE(); ?>" PRO_FILE_NAME="<?php echo $x[$i]->getPRO_FILE_NAME(); ?>" PRO_SYS_NAME="<?php echo $x[$i]->getPRO_SYS_NAME(); ?>" PRO_FREEZE="<?php echo $x[$i]->getPRO_FREEZE(); ?>">
                                                                        تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                <?php
                                                                } else { ?>
                                                                    <button type="button" disabled class="btn bg-olive btn_edit_Privilege" data-toggle="modal" PRO_ID="<?php echo $x[$i]->getPRO_ID(); ?>" PRO_NAME="<?php echo $x[$i]->getPRO_NAME(); ?>" PRO_NAMEE="<?php echo $x[$i]->getPRO_NAMEE(); ?>" PRO_FILE_NAME="<?php echo $x[$i]->getPRO_FILE_NAME(); ?>" PRO_SYS_NAME="<?php echo $x[$i]->getPRO_SYS_NAME(); ?>" PRO_FREEZE="<?php echo $x[$i]->getPRO_FREEZE(); ?>">
                                                                        تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                <?php
                                                                }
                                                                ?>

                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>




                                                                <?php
                                                                $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =2 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                                                $row = mysqli_fetch_array($stmt);

                                                                if (isset($row['SEC_USE_ID'])) { ?>
                                                                    <button type="button" class="btn bg-olive btn_delete_Privilege" data-toggle="modal" PRO_ID="<?php echo $x[$i]->getPRO_ID(); ?>">
                                                                        حـذف السجل <i class="fa fa-trash" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                <?php
                                                                } else { ?>
                                                                    <button type="button" disabled class="btn bg-olive btn_delete_Privilege" data-toggle="modal" PRO_ID="<?php echo $x[$i]->getPRO_ID(); ?>">
                                                                        حـذف السجل <i class="fa fa-trash" aria-hidden="true">
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
                                    <?php

                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->





                </div>
                <!-- /.tab-pane -->












                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->












</div>
<!-- /.row -->
<!-- نهاية كود سند  البرامج والصلاحيات-->



<!-- /.Privilege Add -->
<div class="modal " id="modal-default_privilege" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">البرامج والصلاحيات</h4>
            </div>
            <div class="modal-body">

                <form id="form_add_Privilege">

                    <div class="box-body">
                        <input type="hidden" id="PRO_INS_USER" name="PRO_INS_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="privilege_id"> رقم الصلاحية
                                    :</label>
                                <input type="number" readonly class="form-control" id="privilege_id" name="privilege_id" placeholder=" رمز الصلاحية" />
                            </div>
                        </div>
                        <!-- <input type="hidden" name="method" value="add_new_Privilege"> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Privilege_name"> اسم الصلاحية (عربي)
                                    :</label>
                                <input type="text" class="form-control" id="Privilege_name" name="Privilege_name" placeholder="اسم الصلاحية (عربي) " />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Privilege_name2"> اسم الصلاحية (انجليزي)
                                    :</label>
                                <input type="text" class="form-control" id="Privilege_name2" name="Privilege_name2" placeholder="اسم الصلاحية (انجليزي)" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Privilege_file">
                                    نموذج الطباعة </label>
                                <input type="text" class="form-control" id="Privilege_file" name="Privilege_file" placeholder="نموذج الطباعة" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Privilege_sys"> اسم التطبيق:
                                </label>
                                <select class="form-control" id="Privilege_sys" name="Privilege_sys">
                                    <option value="" selected>تحديد</option>
                                    <option value="ACC">حسابات</option>
                                    <option value="INN">مخازن</option>
                                    <option value="PAY">مرتبات</option>
                                    <option value="HR">موارد بشرية</option>
                                    <option value="SAL">مبيعات </option>
                                    <option value="PUR">مشتريات </option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="Privilege_status"> التجميد:
                                </label>

                                <select class="form-control form-select-sm" id="Privilege_status" name="Privilege_status">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>




                    </div>

                    <!-- /.box-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" id="cancel_new_Privilege" data-dismiss="modal">الغاء</button>
                        <button type="button" id="add_new_Privilege" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.Privilege Edit -->
<div class="modal " id="modal-warning_privilege" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تعديل بيانات البرامج والصلاحيات</h4>
            </div>
            <div class="modal-body">
                <form action="" id="form_edit_Privilege" method="post">
                    <div class="box-body">
                        <input type="hidden" id="PRO_UPD_USER" name="PRO_UPD_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" class="form-control">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_privilege_id"> رقم الصلاحية
                                    :</label>
                                <input type="number" readonly class="form-control" id="edit_privilege_id" name="edit_privilege_id" placeholder=" رمز الصلاحية" />
                            </div>
                        </div>
                        <!-- <input type="hidden" name="method" value="add_new_Privilege"> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_Privilege_name"> اسم الصلاحية (عربي)
                                    :</label>
                                <input type="text" class="form-control" id="edit_Privilege_name" name="edit_Privilege_name" placeholder="اسم الصلاحية (عربي)" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_Privilege_name2"> اسم الصلاحية (انجليزي)
                                    :</label>
                                <input type="text" class="form-control" id="edit_Privilege_name2" name="edit_Privilege_name2" placeholder="اسم الصلاحية (انجليزي)" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_Privilege_file">
                                    نموذج الطباعة</label>
                                <input type="text" class="form-control" id="edit_Privilege_file" name="edit_Privilege_file" placeholder="نموذج الطباعة" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="">
                                <label for="edit_Privilege_sys"> اسم التطبيق:
                                </label>

                                <select class="form-control form-select-sm" id="edit_Privilege_sys" name="edit_Privilege_sys">
                                    <option value="ACC">حسابات</option>
                                    <option value="INN">مخازن</option>
                                    <option value="PAY">مرتبات</option>
                                    <option value="HR">موارد بشرية</option>
                                    <option value="SAL">مبيعات </option>
                                    <option value="PUR">مشتريات </option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="edit_Privilege_status"> التجميد:
                                </label>

                                <select class="form-control form-select-sm" id="edit_Privilege_status" name="edit_Privilege_status">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>



                    </div>
                    <!-- /.box-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" id="edit_Privilege_cancel" data-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-primary" id="edit_Privilege">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal" id="modal-danger_Privilege" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">حذف البرامج والصلاحيات</h4>
            </div>
            <div class="modal-body">
                <p>هل تريد حذف هذا السجل من البرامج والصلاحيات؟ </p>
                <input type="hidden" id="delete_Privilege" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" id="delete_Privilege_cancel" data-dismiss="modal">لا</button>
                <button type="button" class="btn btn-primary" id="delete_Privilege_btn">نعم</button>
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


<div class="modal modal-primary" id="modal_edit_privilege" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم تعديل البيانات بنجاح&hellip;</p>
        </div>
    </div>

</div>



<div class="modal modal-primary" id="modal_delete_privilege" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حذف البيانات بنجاح&hellip;</p>
        </div>
    </div>

</div>

