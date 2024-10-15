<!-- ?php
include('../../Controllers/functions.php');
?> -->
<div class="box box-solid">
    <div class="box-body">

        <a class="btn btn-app">
            <span class="badge bg-purple">
                <?php
                if (count($mt) > 0) {
                    $typ_cp = count($mt);
                    echo  $typ_cp;
                } else {
                    echo 0;
                }
                ?>
            </span>
            <i class="fa fa-users"></i> عدد المستندات
        </a>

        <?php

        ?>
    </div>

</div>


<!-- <div class="row">
    <div class="col-xs-12">
        <div class="box box">
            <div class="box-body">
                <form action="../../Controllers/functions.php" method="post" name="upload_excel" enctype="multipart/form-data">

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
</div> -->

<div class="box box-primary">
    <!-- <div class="box-header with-border">           
          </div> -->
    <div class="box-header">
        <div class="card-header">
            <!-- <h3 class="box-title">المستندات</h3> -->
        </div>
        <?php
        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =10 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
        $row = mysqli_fetch_array($stmt);

        if (isset($row['SEC_USE_ID'])) { ?>
            <button type="button" class="btn btn-primary btn_types_show" data-toggle="modal"><i class="fa fa-plus"></i>
                اضافة
            </button>
        <?php
        } else { ?>
            <button type="button" disabled class="btn btn-primary btn_types_show" data-toggle="modal"><i class="fa fa-plus"></i>
                اضافة
            </button>
        <?php
        }
        ?>

        <!-- /.box-header -->
        <div class="box-body" dir="rtl" style="text-align: center;">
            <table id="TYP_ID" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;">رمز المستند</th>
                        <th style="text-align: center;">أسم المستند (عربي)</th>
                        <th style="text-align: center;">أسم المستند (انجليزي) </th>
                        <th style="text-align: center;">أسم الملف</th>
                        <th style="text-align: center;">نوع المستند</th>
                        <th style="text-align: center;">الحالة</th>
                        <th style="text-align: center;">الوظائف</th>

                    </tr>
                </thead>
                <tbody>

                    <?php for ($i = 0; $i < count($mt); $i++) { ?>

                        <tr>
                            <td><?php echo $mt[$i]->getTYP_ID(); ?></td>
                            <td><?php echo $mt[$i]->getTYP_NAME(); ?></td>
                            <td><?php echo $mt[$i]->getTYP_NAMEE(); ?></td>
                            <td><?php echo $mt[$i]->getTYP_REP_NAME(); ?></td>
                            <td><?php echo $mt[$i]->getTYP_TYPE(); ?></td>
                            <!-- <td>?php echo $mt[$i]->getTYP_FREEZE(); ?></td> -->
                            <td>
                                <?php
                                switch ($mt[$i]->getTYP_FREEZE()) {
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
                                            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =10 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                            $row = mysqli_fetch_array($stmt);

                                            if (isset($row['SEC_USE_ID'])) { ?>
                                                <button type="button" id="btn_edit_type" TYP_NAME="<?php echo $mt[$i]->getTYP_NAME(); ?>" TYP_NAMEE="<?php echo $mt[$i]->getTYP_NAMEE(); ?>" TYP_REP_NAME="<?php echo $mt[$i]->getTYP_REP_NAME(); ?>" TYP_TYPE="<?php echo $mt[$i]->getTYP_TYPE(); ?>" TYP_FREEZE="<?php echo $mt[$i]->getTYP_FREEZE(); ?>"  TYP_Sig_one="<?php echo $mt[$i]->getTYP_Sig_one(); ?>" TYP_Sig_two="<?php echo $mt[$i]->getTYP_Sig_two(); ?>" TYP_Sig_three="<?php echo $mt[$i]->getTYP_Sig_three(); ?>"  TYP_ID="<?php echo $mt[$i]->getTYP_ID(); ?>" class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            } else { ?>
                                                <button type="button" disabled id="btn_edit_type" TYP_NAME="<?php echo $mt[$i]->getTYP_NAME(); ?>" TYP_NAMEE="<?php echo $mt[$i]->getTYP_NAMEE(); ?>" TYP_REP_NAME="<?php echo $mt[$i]->getTYP_REP_NAME(); ?>" TYP_TYPE="<?php echo $mt[$i]->getTYP_TYPE(); ?>" TYP_FREEZE="<?php echo $mt[$i]->getTYP_FREEZE(); ?>" TYP_Sig_one="<?php echo $mt[$i]->getTYP_Sig_one(); ?>" TYP_Sig_two="<?php echo $mt[$i]->getTYP_Sig_two(); ?>" TYP_Sig_three="<?php echo $mt[$i]->getTYP_Sig_three(); ?>"  TYP_ID="<?php echo $mt[$i]->getTYP_ID(); ?>" class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                    </i>
                                                </button>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <?php
                                            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =10 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                            $row = mysqli_fetch_array($stmt);

                                            if (isset($row['SEC_USE_ID'])) { ?>
                                                <button type="button" id="del_type" class="btn bg-olive" TYP_ID="<?php echo $mt[$i]->getTYP_ID(); ?>" data-toggle="modal"> حـذف السجل <i class="fa fa-trash" aria-hidden="true">

                                                    </i>
                                                </button>
                                            <?php
                                            } else { ?>
                                                <button type="button" disabled id="del_type" class="btn bg-olive" TYP_ID="<?php echo $mt[$i]->getTYP_ID(); ?>" data-toggle="modal"> حـذف السجل <i class="fa fa-trash" aria-hidden="true">

                                                    </i>
                                                </button>
                                            <?php
                                            }
                                            ?>
                                        </li>

                                    </ul>
                                </div>

                                <!-- <button type="button" onchange="displayVals();" id="btn_doc_show" class="btn btn-primary" TYP_archve="?php echo $mt[$i]->getTYP_archve(); ?>" data-toggle="modal"> <i class="fa fa-eye" aria-hidden="true"> -->
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

<div class="modal " id="modal-default_type" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">اضافة مستند جديد</h4>
            </div>
            <div class="modal-body">

                <input type="hidden" id="TYP_INS_USER" name="TYP_INS_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" class="form-control">

                <form action="" id="form_add_type" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم المستند</label>
                                <input type="text" id="TYP_NAME" name="TYP_NAME" class="form-control" placeholder="أدخل أسم المستند">
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم المستند بالاجنبي</label>
                                <input type="text" id="TYP_NAMEE" name="TYP_NAMEE" class="form-control" placeholder="أدخل أسم المستند بالاجنبي">
                            </div>
                        </div>




                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم الملف</label>
                                <input type="text" id="TYP_REP_NAME" name="TYP_REP_NAME" class="form-control" placeholder="أدخل أسم الملف">
                            </div>
                        </div>




                        <div class="col-md-6">
                            <div class="form-group">
                                <label>نوع المستند</label>
                                <select name="TYP_TYPE" id="TYP_TYPE" class="form-control">
                                    <option value="">تحديد نوع المستند</option>
                                    <option value="نقد">نقد</option>
                                    <option value="تحويل">تحويل</option>
                                    <option value="مقاصة">مقاصة</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموقع (1)</label>
                                <input type="text" id="TYP_Sig_one" name="TYP_Sig_one" class="form-control" placeholder="اسم الموقع (1)">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموقع (2)</label>
                                <input type="text" id="TYP_Sig_two" name="TYP_Sig_two" class="form-control" placeholder="اسم الموقع (2)">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموقع (3)</label>
                                <input type="text" id="TYP_Sig_three" name="TYP_Sig_three" class="form-control" placeholder="اسم الموقع (3)">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="">
                                <label for="CEN_FREEZE"> التجميد:
                                </label>
                                <select class="form-control form-select-sm" id="TYP_FREEZE" name="TYP_FREEZE">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>


                        <!-- <input type="text" id="doc_archve" name="doc_archve" class="form-control" placeholder="الوثائق"> -->

                    </div>
                    <div class="row">
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary pull-left" id="cancel_type_add" data-dismiss="modal">الغاء</button>
                            <button type="button" id="add_ens_type" class="btn btn-primary">حفظ</button>
                            <!-- <button type="button" disabled id="btn_doc" class="btn btn-primary" data-toggle="modal">ارفاق وثيقة</button> -->
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal" id="modal_edit_typ" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تعديل بيانات المستند</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="TYP_UPD_USER" name="TYP_UPD_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" class="form-control">

                <form action="" id="form_edit_type" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" id="TYP_ID_edit">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم المستند</label>
                                <input type="text" id="TYP_NAME_edit" name="TYP_NAME_edit" class="form-control" placeholder="أدخل اسم المستند">
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم المستند بالاجنبي</label>
                                <input type="text" id="TYP_NAMEE_edit" name="TYP_NAMEE_edit" class="form-control" placeholder=" أدخل أسم المستند بالاجنبي ">
                            </div>
                        </div>





                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم الملف</label>
                                <input type="text" id="TYP_REP_NAME_edit" name="TYP_REP_NAME_edit" class="form-control" placeholder="أدخل  أسم الملف">
                            </div>
                        </div>




                        <div class="col-md-6">
                            <div class="form-group">
                                <label>نوع المستند</label>
                                <select name="TYP_TYPE_edit" id="TYP_TYPE_edit" class="form-control">
                                    <option value="">تحديد نوع المستند</option>
                                    <option value="نقد">نقد</option>
                                    <option value="تحويل">تحويل</option>
                                    <option value="مقاصة">مقاصة</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموقع (1)</label>
                                <input type="text" id="TYP_Sig_one_edit" name="TYP_Sig_one_edit" class="form-control" placeholder="اسم الموقع (1)">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموقع (2)</label>
                                <input type="text" id="TYP_Sig_two_edit" name="TYP_Sig_two_edit" class="form-control" placeholder="اسم الموقع (2)">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموقع (3)</label>
                                <input type="text" id="TYP_Sig_three_edit" name="TYP_Sig_three_edit" class="form-control" placeholder="اسم الموقع (3)">
                            </div>
                        </div>

                    
                        <div class="col-md-6">
                            <div class="">
                                <label for="CEN_FREEZE"> التجميد:
                                </label>
                                <select class="form-control form-select-sm" id="TYP_FREEZE_edit" name="TYP_FREEZE_edit">
                                    <option value="Y">مفعل</option>
                                    <option value="N">غير مفعل</option>
                                </select>

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-left" id="cancel_type_edit" data-dismiss="modal">الغاء</button>
                            <button type="button" id="btn_type_edit" class="btn btn-primary">حفظ</button>
                        </div>


                    </div>
                </form>



            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal " id="modal_del_type" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">حذف بيانات المستند</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="TYP_ID_del">
                <p>هل تريد حذف هذا المستند ؟ </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" id="cancel_type_delt" data-dismiss="modal">الغاء</button>
                <button type="button" id="btn_del_type" class="btn btn-primary">حذف</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal " id="modal_doc_archive" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">ارفاق الوثيقة</h4>
            </div>
            <div class="modal-body">


                <form action="/system_account/Controllers/TypeController.php?methode=add_photo" id="form_arch_doc" method="post" enctype="multipart/form-data">
                    <!-- <input type="hidden" id="TYP_ID_edit"> -->
                    <div class="box-body">


                        <div class="col-xs-12">
                            <div class="form-group" id="divPhoto">
                                <div class="col-xs-12" id="divPhoto1">
                                    <img id="output" style="width:100%;height:450px;" />
                                    <input type="file" name="fileToUpload" id="fileToUpload" style="margin-top:7px;" />
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-left" id="cancel_archive_doc" data-dismiss="modal">رجوع</button>
                            <button type="button" id="btn_archive_doc" class="btn btn-primary">جلب</button>
                        </div>

                    </div>
                </form>



            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal modal-primary" id="modal_success" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حفظ البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>


<div class="modal modal-primary" id="modal_edit_t" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم تعديل البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>



<div class="modal modal-primary" id="modal_delete_t" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حذف البيانات بنجاح&hellip;</p>
        </div>
    </div>

</div>