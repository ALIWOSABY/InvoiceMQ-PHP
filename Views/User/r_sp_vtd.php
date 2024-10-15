<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> تقرير حســب الطلب للمورد :</h3>
        <div class="box-tools pull-right">

        </div>
    </div>

    <div class="box-body">
        <form action="" id="form_print_supp" method="post" enctype="multipart/form-data">
            <div class="box-body">

                <!-- <input type="hidden" disabled class="form-control txt" name="VOU_USE_name" id="VOU_USE_name" value="?php echo $ens[0]->getSYS_User_name(); ?>" placeholder=" المستخدم" readonly /> -->

                <div class="col-md-4">
                    <div class="form-group">
                        <label>التأريخ من يوم</label>
                        <input type="date" id="i_date1" name="i_date1" value="" class="form-control">
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label>الى يوم</label>
                        <input type="date" id="i_date2" name="i_date2" value="<?php echo DATE('Y-m-d'); ?>" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>النوع</label>
                        <select name="accp_stat_TYP" id="accp_stat_TYP" class="form-control">
                            <option value="">تحديد</option>
                            <option value="1">مبدائي</option>
                            <option value="2">مرحل</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label> اسم الرعوي:</label>
                        <select class="form-control select2" id="VS_BENF" name="VS_BENF">
                        <option value="" disabled>تحديد</option>
                            <?php
                            for ($i = 0; $i < count($SP); $i++) {
                                if ($SP[$i]->getSUPPFREEZE() == 'Y') {
                                    echo '<option value="' . $SP[$i]->getSUPPID() . '">' . $SP[$i]->getSUPPNAME() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>



        



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-info"  VOU_USE_name="<?php echo $ens[0]->getSYS_User_name(); ?>"  Branch_desc="<?php echo $ens[0]->getName_branch(); ?>"   id="print_data_supp"><i class="fa fa-print"></i>
                    طباعة
                </button>
            </div>
        </form>
    </div>
</div>