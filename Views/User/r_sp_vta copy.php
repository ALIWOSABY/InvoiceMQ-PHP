<?php
error_reporting(0);
function format_num($number)
{
    $decimals = 0;
    $num_ex = explode('.', $number);
    $decimals = isset($num_ex[1]) ? strlen($num_ex[1]) : 0;
    return number_format($number, $decimals);
}
$i_date1 = isset($_POST['i_date1']) ? $_POST['i_date1'] : date("Y-m-d", strtotime(date('Y-m-d') . " -1 week"));
$i_date2 = isset($_POST['i_date2']) ? $_POST['i_date2'] : date("Y-m-d");
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> طباعة القيود اليومية للموردين :</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse">
                <!-- <i class="fa fa-minus"></i> -->
            </button>
            <button class="btn btn-box-tool" data-widget="remove">
                <!-- <i class="fa fa-remove"></i> -->
            </button>
        </div>
    </div>
    <div class="box-body">


        <form action="" id="frm_vts_all" method="post" enctype="multipart/form-data">
            <div class="box-body">

                <input type="hidden" disabled class="form-control txt" name="VOU_USE_name" id="VOU_USE_name" value="<?php echo $ens[0]->getSYS_User_name(); ?>" placeholder=" المستخدم" readonly />

                <div class="col-md-4">
                    <div class="form-group">
                        <label>الفترة من </label>
                        <input type="date" id="i_date1" name="i_date1" value="<?= $i_date1 ?>" class="form-control">
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label>الى </label>
                        <input type="date" id="i_date2" name="i_date2" value="<?= $i_date2 ?>" class="form-control">
                    </div>
                </div>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">الغاء</button>
                <!-- <button type="button" id="btn_valide_edit" parent_id='0' id="print_data" class="btn btn-print"<i class="fa fa-print"></i>>طباعة</button> -->
                <button type="button" class="btn btn-info" id="prnt_all_fvts" Branch_desc="<?php echo $ens[0]->getName_branch(); ?>"><i class="fa fa-print"></i>
                    طباعة
                </button>
            </div>

        </form>

    </div>