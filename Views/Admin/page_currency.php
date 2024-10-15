        <div class="box box-solid">
            <div class="box-body">

                <a class="btn btn-app" style="margin-bottom:0%">
                    <span class="badge bg-purple" id="count_currencies">

                        <?php
                        if (isset($_SESSION['currencies'])) {
                            echo count($_SESSION['currencies']);
                        } else {
                            echo 0;
                        }
                        ?>
                    </span>
                    <i class="fa fa-money"></i> العملات
                </a>


            </div>
        </div>

        <div class="row" style="margin-top:0%">

            <div class="col-md-12">
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#tab_1-1" data-toggle="tab">العملات</a></li>

                    </ul>
                    <div class="tab-content " style="overflow: auto;">
                        <div class="tab-pane active " id="tab_1-1">
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
                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =6 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
                                        $row = mysqli_fetch_array($stmt);

                                        if (isset($row['SEC_USE_ID'])) { ?>
                                            <button type="button" class="btn btn-primary btn_add_currency" data-toggle="modal"><i class="fa fa-plus"></i> اضافة عملة
                                            </button>
                                        <?php
                                        } else { ?>
                                            <button type="button" disabled class="btn btn-primary btn_add_currency" data-toggle="modal"><i class="fa fa-plus"></i> اضافة عملة
                                            </button>
                                        <?php
                                        }
                                        ?>
                                        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info"><i class="fa fa-print"></i>
                                            طباعة
                                        </button> -->
                                    </div>
                                </div>
                                <div class="card-header">
                                    <!-- <h3 class="box-title">العملات</h3> -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" dir="rtl" style="text-align: center;">
                                    <table id="current_id" class="table table-bordered table-striped " style="overflow: auto;">
                                        <thead>
                                            <tr>


                                                <th> رقم العملة</th>
                                                <th> اسم العملة</th>
                                                <th> اسم العملةالاجنبي</th>
                                                <th>الاسم المختصر </th>
                                                <th> اسم الوحدة الصغرى</th>
                                                <th>الحالة</th>
                                                <th>الوظائف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            if (isset($_SESSION['currencies'])) {

                                                $x = $_SESSION['currencies'];
                                                for ($i = 0; $i < count($x); $i++) {

                                            ?>
                                                    <tr>


                                                        <td><?php echo $x[$i]->getCUR_ID();  ?></td>
                                                        <td> <?php echo $x[$i]->getCUR_NAME();  ?></td>
                                                        <td><?php echo $x[$i]->getCUR_NAMEE();  ?></td>
                                                        <td> <?php echo $x[$i]->getCUR_SHORT_NAME();  ?></td>

                                                        <td><?php echo $x[$i]->getCUR_FRACT_NAME();  ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($x[$i]->getCUR_FREEZE()) {
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

                                                                        <?php
                                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =6 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                                        $row = mysqli_fetch_array($stmt);

                                                                        if (isset($row['SEC_USE_ID'])) { ?>
                                                                            <button type="button" class="btn bg-olive btn_edit_currency" data-toggle="modal" CUR_ID="<?php echo $x[$i]->getCUR_ID(); ?>" CUR_NAME="<?php echo $x[$i]->getCUR_NAME(); ?>" CUR_NAMEE="<?php echo $x[$i]->getCUR_NAMEE(); ?>" CUR_SHORT_NAME="<?php echo $x[$i]->getCUR_SHORT_NAME(); ?>" CUR_SHORT_NAMEE="<?php echo $x[$i]->getCUR_SHORT_NAMEE(); ?>" CUR_FRACT_NAME="<?php echo $x[$i]->getCUR_FRACT_NAME(); ?>" CUR_FRACT_NAMEE="<?php echo $x[$i]->getCUR_FRACT_NAMEE(); ?>" CUR_MAX="<?php echo $x[$i]->getCUR_MAX(); ?>" CUR_MIN="<?php echo $x[$i]->getCUR_MIN(); ?>" CUR_FREEZE="<?php echo $x[$i]->getCUR_FREEZE(); ?>">
                                                                                تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                                                </i>
                                                                            </button>
                                                                        <?php
                                                                        } else { ?>
                                                                            <button type="button" disabled class="btn bg-olive btn_edit_currency" data-toggle="modal">
                                                                                تعديل البيانات<i class="fa fa-edit" aria-hidden="true">
                                                                                </i>
                                                                            </button>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>



                                                                        <?php
                                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =6 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                                                        $row = mysqli_fetch_array($stmt);

                                                                        if (isset($row['SEC_USE_ID'])) { ?>
                                                                            <button type="button" class="btn bg-olive btn_delete_currency" data-toggle="modal" CUR_ID="<?php echo $x[$i]->getCUR_ID(); ?>">
                                                                                حـذف السجل <i class="fa fa-trash" aria-hidden="true">
                                                                                </i>
                                                                            </button>
                                                                        <?php
                                                                        } else { ?>
                                                                            <button type="button" disabled class="btn bg-olive btn_delete_currency" data-toggle="modal" CUR_ID="<?php echo $x[$i]->getCUR_ID(); ?>">
                                                                                حـذف السجل <i class="fa fa-trash" aria-hidden="true">
                                                                                </i>
                                                                            </button>
                                                                        <?php
                                                                        }
                                                                        ?>

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
        <!-- نهاية كود سند  العملات-->
        <!-- /.Currency Add -->
        <div class="modal " id="modal-default_currency" style="display:none">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                        <h3 class="modal-title">اضافة عملة جديدة</h3>
                    </div>
                    <div class="modal-body">

                        <form id="form_add_currency" method="post">

                            <div class="box-body">

                                <input type="hidden" id="CUR_INS_USER" name="CUR_INS_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" class="form-control">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_id"> رقم العملة
                                            :</label>
                                        <input type="number" class="form-control" id="currency_id" name="currency_id" placeholder=" رمز العملة" readonly />
                                    </div>
                                </div>
                                <!-- <input type="hidden" name="method" value="add_new_currency"> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_name"> اسم العملة
                                            :</label>
                                        <input type="text" class="form-control" id="currency_name" name="currency_name" placeholder="اسم العملة " />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_name2"> اسم العملة الاجنبي
                                            :</label>
                                        <input type="text" class="form-control" id="currency_name2" name="currency_name2" placeholder="اسم العملةالاجنبي" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_symbol"> الاسم المختصر:
                                        </label>
                                        <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" placeholder=" الاسم المختصر" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_symbol2"> الاسم المختصر الاجنبي:
                                        </label>
                                        <input type="text" class="form-control" id="currency_symbol2" name="currency_symbol2" placeholder=" الاسم المختصر الاجنبي" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_price"> السعر مقابل العملة المحلية:</label>
                                        <input type="number" class="form-control" id="currency_price" name="currency_price" value="1" placeholder=" السعر مقابل العملة المحلية" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_fractional_unit"> اسم الوحدة الصغرى
                                            :</label>
                                        <input type="text" class="form-control" name="currency_fractional_unit" id="currency_fractional_unit" placeholder=" اسم الوحدة الصغرى" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_fractional_unit2"> اسم الوحدة الصغرى الاجنبي
                                            :</label>
                                        <input type="text" class="form-control" name="currency_fractional_unit2" id="currency_fractional_unit2" placeholder=" اسم الوحدة الصغرى الاجنبي" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_fractional_unit2">الحد الاعلى لسعر الصرف
                                            :</label>
                                        <input type="number" class="form-control" name="CUR_MAX" id="CUR_MAX" placeholder="0" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_fractional_unit2"> الحد الادنى لسعر الصرف
                                            :</label>
                                        <input type="number" class="form-control" name="CUR_MIN" id="CUR_MIN" placeholder="0" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="currency_status"> التجميد:
                                        </label>

                                        <select class="form-control form-select-sm" id="currency_status" name="currency_status">
                                            <option value="Y">مفعل</option>
                                            <option value="N">غير مفعل</option>
                                        </select>

                                    </div>
                                </div>



                            </div>

                            <!-- /.box-body -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary pull-left" id="cancel_new_currency" data-dismiss="modal">الغاء</button>
                                <button type="button" id="add_new_currency" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- /.Currency Edit -->
        <div class="modal " id="modal-warning_currency" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                        <h4 class="modal-title">تعديل بيانات العملات</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form_edit_currency" method="post">
                            <input type="hidden" name="method" value="edit_currency">
                            <div class="box-body">
                                <input type="hidden" id="CUR_UPD_USER" name="CUR_UPD_USER" value="<?php echo $ens[0]->getAnalytic_Acc_id(); ?>" class="form-control">

                                <div class="col-md-6">
                                    <div class="">
                                        <label for="edit_currency_id"> رقم العملة
                                            :</label>
                                        <input type="number" class="form-control" readonly id="edit_currency_id" name="edit_currency_id" placeholder=" رمز العملة" />
                                    </div>
                                </div>
                                <!-- <input type="hidden" name="method" value="add_new_currency"> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_currency_name"> اسم العملة
                                            :</label>
                                        <input type="text" class="form-control" id="edit_currency_name" name="edit_currency_name" placeholder="اسم العملة " />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_currency_name2"> اسم العملة الاجنبي
                                            :</label>
                                        <input type="text" class="form-control" id="edit_currency_name2" name="edit_currency_name2" placeholder="اسم العملةالاجنبي" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_currency_symbol"> الاسم المختصر:
                                        </label>
                                        <input type="text" class="form-control" id="edit_currency_symbol" name="edit_currency_symbol" placeholder=" الاسم المختصر" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_currency_symbol2"> الاسم المختصر الاجنبي:
                                            :</label>
                                        <input type="text" class="form-control" id="edit_currency_symbol2" name="edit_currency_symbol2" placeholder=" الاسم المختصر الاجنبي" />
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_currency_rate"> السعر مقابل العملة المحلية:
                                    :</label>
                                <input type="text" class="form-control" id="edit_currency_rate" name="edit_currency_rate" placeholder=" السعر مقابل العملة المحلية" />
                            </div>
                        </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_currency_unit"> اسم الوحدة الصغرى
                                            :</label>
                                        <input type="text" class="form-control" name="edit_currency_unit" id="edit_currency_unit" placeholder=" اسم الوحدة الصغرى" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_currency_unit2"> اسم الوحدة الصغرى الاجنبي
                                            :</label>
                                        <input type="text" class="form-control" name="edit_currency_unit2" id="edit_currency_unit2" placeholder=" اسم الوحدة الصغرى الاجنبي" />
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_fractional_unit2">الحد الاعلى لسعر الصرف
                                            :</label>
                                        <input type="number" class="form-control" name="edit_CUR_MAX" id="edit_CUR_MAX" placeholder="0" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_fractional_unit2"> الحد الادنى لسعر الصرف
                                            :</label>
                                        <input type="number" class="form-control" name="edit_CUR_MIN" id="edit_CUR_MIN" placeholder="0" />
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="">
                                        <label for="edit_currency_status"> التجميد:
                                        </label>

                                        <select class="form-control form-select-sm" id="edit_currency_status" name="edit_currency_status">
                                            <option value="Y">مفعل</option>
                                            <option value="N">غير مفعل</option>
                                        </select>

                                    </div>
                                </div>


                            </div>

                            <!-- /.box-body -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary pull-left" id="edit_currency_cancel" data-dismiss="modal">الغاء</button>
                                <button type="button" class="btn btn-primary" id="edit_currency">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal" id="modal-danger_currency" style="display:none">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                        <h4 class="modal-title">حذف الحقل</h4>
                    </div>
                    <div class="modal-body">
                        <p>هل تريد حذف هذاالحقل؟ </p>
                        <input type="hidden" id="delete_currency" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" id="delete_currency_cancel" data-dismiss="modal">لا</button>
                        <button type="button" class="btn btn-primary" id="delete_currency_btn">نعم</button>
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


        <div class="modal modal-primary" id="modal_edit_curcy" style="display:none">
            <div class="modal-dialog">
                <div class="modal-body">
                    <p style="text-align: center;">تم تعديل البيانات بنجاح&hellip;</p>
                </div>
            </div>
        </div>


        <div class="modal modal-primary" id="modal_delete_curcy" style="display:none">
            <div class="modal-dialog">
                <div class="modal-body">
                    <p style="text-align: center;">تم حذف البيانات بنجاح&hellip;</p>
                </div>
            </div>
        </div>