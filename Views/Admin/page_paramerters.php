
<?php
$mm = $ens[0]->getAnalytic_Acc_id();
?>
<?php
$prm = $_SESSION['paramerter'];
//$prm = $_SESSION['param'];
?>



    <div class="modal" id="modal_del_paramerter" style="display:none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                    <h4 class="modal-title">حذف بيانات متغيرات النظام</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_pram_del">
                    <p>هل تريد حذف بيانات هذ السجل؟ </p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete_param_cancel" class="btn btn-primary pull-left" data-dismiss="modal">لا</button>
                    <button type="button" id="btn_del_param" class="btn btn-primary">نعم</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



      
        <?php if (count($_SESSION['paramerter']) > 0) {
        ?>




            <!-- Edit Paramerter -->
            <form action="/InvoiceMQ-PHP/Controllers/paramerterController.php?methode=edit_paramerter" action="" id="form_edit_pram" method="post" enctype="multipart/form-data">

                <div class="box box-solid">
                    <div class="box-body">
                        <div class="box-footer">



                            <?php
                            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =2 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                            $row = mysqli_fetch_array($stmt);

                            if (isset($row['SEC_USE_ID'])) { ?>
                                <button type="button" class="btn btn-success" id="btn_edit_pram"><i class="fa fa-save"></i>
                                    تعديل
                                </button>
                            <?php
                            } else { ?>
                                <button type="button" disabled class="btn btn-success" id="btn_edit_pram"><i class="fa fa-save"></i>
                                    تعديل
                                </button>
                            <?php
                            }
                            ?>

                            <?php
                            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =2 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                            $row = mysqli_fetch_array($stmt);

                            if (isset($row['SEC_USE_ID'])) { ?>

                                <?php

                                for ($i = 0; $i < count($prm); $i++) {
                                ?>

                                    <button type="button" id="del_pram" par_id="<?php echo $prm[$i]->getpar_id(); ?>" class="btn btn-danger" data-toggle="modal"> <i class="fa fa-trash" aria-hidden="true">
                                        </i>
                                        حذف
                                    </button>
                                <?php } ?>
                            <?php
                            } else { ?>
                                <button type="button" disabled id="del_pram" class="btn btn-danger" data-toggle="modal"> <i class="fa fa-trash" aria-hidden="true">
                                    </i>
                                    حذف
                                </button>
                            <?php
                            }
                            ?>









                        </div>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-body">
                        <?php

                        for ($i = 0; $i < count($prm); $i++) {
                        ?>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>الرمز</label>
                                    <input type="text" id="par_id_e" name="par_id_e" value="<?php echo $prm[$i]->getPar_id(); ?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>الاسم عربي</label>
                                    <input type="text" id="par_name_e" name="par_name_e" value="<?php echo $prm[$i]->getpar_name(); ?>" class="form-control" placeholder="أدخل الاسم عربي">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>الاسم انجليزي</label>
                                    <input style="text-align: left;" type="text" id="par_namee_e" name="par_namee_e" value="<?php echo $prm[$i]->getpar_namee(); ?>" class="form-control" />
                                </div>
                            </div>


                            <div class="form-group has-feedback">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text" id="Par_phone_e" name="Par_phone_e" value="<?php echo $prm[$i]->getPar_phone(); ?>" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group has-feedback">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الموقع الالكتروني</label>
                                            <input type="text" id="Par_website_e" name="Par_website_e" value="<?php echo $prm[$i]->getPar_website(); ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>العنوان(1)</label>
                                            <input type="text" id="Par_Addr1_e" name="Par_Addr1_e" value="<?php echo $prm[$i]->getPar_Addr1(); ?>" class="form-control" placeholder="أدخل العنوان">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>العنوان(2)</label>
                                            <input type="text" id="Par_Addr2_e" name="Par_Addr2_e" value="<?php echo $prm[$i]->getPar_Addr2(); ?>" class="form-control" placeholder="أدخل العنوان (2)">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group has-feedback">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>العنوان(3)</label>
                                            <input type="text" id="Par_Addr3_e" name="Par_Addr3_e" value="<?php echo $prm[$i]->getPar_Addr3(); ?>" class="form-control" placeholder="أدخل العنوان(3)">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group has-feedback">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>رقم الواتساب</label>
                                            <input type="text" id="Par_whatsapp_e" name="Par_whatsapp_e"  class="form-control" value="<?php echo $prm[$i]->getPar_whatsapp(); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الشعار</label>
                                            <img src="../<?php echo $prm[$i]->getPar_logo(); ?>" style="width:30%;height:20%" />
                                            <input type="file" id="Par_logo_e" name="Par_logo_e[]" class="form-control" value="../Piecejointe/a.jpeg" placeholder="Code" multiple="true">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group has-feedback">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>المدخل</label>
                                            <input type="text" id="Par_INS_USER" name="Par_INS_USER" disabled value="<?php echo $prm[$i]->getPar_INS_USER(); ?>" class="form-control" style="text-align:right;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>أسم المدخل</label>
                                            <input type="text" id="Par_INS_USER_NAME" name="Par_INS_USER_NAME" disabled value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>تاريخ الأضافة</label>
                                            <input type="datetime" id="Par_INS_DATE" name="Par_INS_DATE" disabled value="<?php echo $prm[$i]->getPar_INS_DATE(); ?>" class="form-control" style="text-align:right;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>المعدل</label>
                                            <input type="text" id="Par_UPD_USER" name="Par_UPD_USER" disabled value="<?php echo $prm[$i]->getPar_UPD_USER(); ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>أسم المعدل</label>
                                            <input type="text" id="Par_UPD_USER_NAME" name="Par_UPD_USER_NAME" disabled value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>تاريخ التعديل</label>
                                            <input type="datetime" id="Par_UPD_DATE" name="Par_UPD_DATE" disabled value="<?php echo $prm[$i]->getPar_UPD_DATE(); ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>





            </form>




        <?php } else { ?>


            <form action="/InvoiceMQ-PHP/Controllers/paramerterController.php?methode=add_photo" id="form_pram" method="post" enctype="multipart/form-data">

                <div class="box box-solid">
                    <div class="box-body">


                        <?php
                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =2 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
                        $row = mysqli_fetch_array($stmt);

                        if (isset($row['SEC_USE_ID'])) { ?>
                            <button type="submit" class="btn btn-primary" id="add"><i class="fa fa-save"></i>
                                حفظ
                            </button>
                        <?php
                        } else { ?>
                            <button type="submit" class="btn btn-primary" id="add"><i class="fa fa-save"></i>
                                حفظ
                            </button>
                        <?php
                        }
                        ?>

                        <a href="../Admin/index.php"><button type="button" id="exit" class="btn btn-primary"> <i class="fa fa-close" aria-hidden="true">
                                </i>
                                الغاء
                            </button></a>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-body">




                        <input type="hidden" id="par_id" name="par_id" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />


                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم عربي</label>
                                    <input type="text" id="par_name" name="par_name" value="" class="form-control" placeholder="أدخل الاسم عربي">
                                </div>
                            </div>
                       
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم أجنبي</label>
                                    <input type="text" id="par_namee" name="par_namee" value="" class="form-control" />
                                </div>
                            </div>
                     

            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="number" id="Par_phone" style="text-align:left;" name="Par_phone" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                </div>
                            </div>
                         
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الموقع الإلكتروني</label>
                                        <input type="text" id="Par_website" name="Par_website" value="" class="form-control">
                                    </div>
                                </div>
                         
                 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>العنوان(1)</label>
                                        <input type="text" id="Par_Addr1" name="Par_Addr1" value="" class="form-control" placeholder="أدخل العنوان">
                                    </div>
                                </div>
                                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>العنوان (1)انجليزي</label>
                                        <input type="text" id="Par_Addr1e" name="Par_Addr1e" style="text-align:left;" value="" class="form-control" placeholder="أدخل العنوان">
                                    </div>
                                </div>
                    
                      
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>العنوان(2)</label>
                                        <input type="text" id="Par_Addr2" name="Par_Addr2" value="" class="form-control" placeholder="أدخل العنوان (2)">
                                    </div>
                                </div>
                          
                          
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>العنوان (2)انجليزي</label>
                                        <input type="text" id="Par_Addr2e" name="Par_Addr2e" style="text-align:left;" value="" class="form-control" placeholder="أدخل العنوان (2)">
                                    </div>
                                </div>
                         

                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>العنوان(3)</label>
                                        <input type="text" id="Par_Addr3" name="Par_Addr3" value="" class="form-control" placeholder="أدخل العنوان(3)">
                                    </div>
                                </div>
                           

                          
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>العنوان (3)انجليزي</label>
                                        <input type="text" id="Par_Addr3e" name="Par_Addr3e" style="text-align:left;" value="" class="form-control" placeholder="أدخل العنوان(3)">
                                    </div>
                                </div>
                          
                          
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم الواتساب</label>
                                        <input type="number" id="Par_whatsapp" name="Par_whatsapp" style="text-align:left;" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>
                                </div>
                                                       
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الشعار</label>
                                        <input type="file" id="Par_logo" name="Par_logo[]" class="form-control" placeholder="Code" multiple="true">
                                    </div>
                                </div>
                            
                        </div>
                    </div>
            </form>
        <?php  }  ?>







