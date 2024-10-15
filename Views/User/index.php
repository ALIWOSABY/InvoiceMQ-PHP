<?php require_once './header.php'; ?>

<?php require_once './menu.php'; ?>

<?php
$test = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<div class="content-wrapper">

    <?php
    if ($test == 'home') {
    ?>
        <section class="content-header">
            <h1>
                الرئيسية
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
                <li class="active"></li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_users_inactive') {  ?>

        <section class="content-header">
            <h1>
                المستخدمين
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">المستخدمين</li>
            </ol>
        </section>





    <?php } elseif ($test == 'p_s') {  ?>

        <section class="content-header">
            <h1>
                الموردين
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">الموردين</li>
            </ol>
        </section>




    <?php } elseif ($test == 'p_c') {  ?>

        <section class="content-header">
            <h1>
                العملاء
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">العملاء</li>
            </ol>
        </section>

    <?php } elseif ($test == 'page_types') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                المستندات
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">المستندات</li>
            </ol>
        </section>


    <?php } elseif ($test == 'page_privilege') { ?>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                البرامج والصلاحيات
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">البرامج والصلاحيات</li>
            </ol>
        </section>




    <?php } elseif ($test == 'p_m_supp') { ?>

        <section class="content-header">
            <h1>
                القيود اليومية للموردين
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">القيود اليومية للموردين</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_rev_supp') { ?>

        <section class="content-header">
            <h1>
                مراجعة القيود اليومية للموردين قبل الترحيل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">القيود اليومية للموردين</li>
            </ol>
        </section>

    <?php } elseif ($test == 'p_rev_v_supp_vt') { ?>

        <section class="content-header">
            <h1>
                عرض بيانات القيد للمورد قبل الترحيل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li><a href="?page=p_rev_supp">مراجعة القيود</a></li>
                <li class="active"> عرض بيانات القيد</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_fin_supp') { ?>

        <section class="content-header">
            <h1>
                الاستعلام عن القيود المرحلة
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">القيود المرحلة للموردين</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_fin_v_supp_vt') { ?>

        <section class="content-header">
            <h1>
                عرض بيانات القيد للمورد بعد الترحيل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li><a href="?page=p_fin_supp">الاستعلام عن القيود</a></li>
                <li class="active"> عرض بيانات القيد</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_dlivd_amnt_supp_vt') { ?>

        <section class="content-header">
            <h1>
                توصيل المبلغ المتبقى من الفلوس
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active"> عرض بيانات القيد</li>
            </ol>
        </section>



    <?php } elseif ($test == 'r_sp_vtd') { ?>

        <section class="content-header">
            <h1>
                تقرير للمورد حسب التأريخ
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active"> عرض بيانات القيد اليومي للمورد</li>
            </ol>
        </section>


    <?php } elseif ($test == 'r_sp_vta') { ?>

        <section class="content-header">
            <h1>
                تقرير يوم كامل للموردين
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active"> عرض بيانات القيود الومية للموردين</li>
            </ol>
        </section>




    <?php } elseif ($test == 'p_dlivd_amnt_supp_vt') { ?>

        <section class="content-header">
            <h1>
                توصيل المبلغ المتبقى من الفلوس
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active"> عرض بيانات القيد</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_m_cust') { ?>

        <section class="content-header">
            <h1>
                القيود اليومية للعملاء
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">القيود اليومية للعملاء</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_add_supp_vt') { ?>
        <section class="content-header">
            <h1>
                اضافة قيد جديد للمورد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=p_m_supp">الحركة</a></li>
                <li class="active">القيود اليومية للمورد</li>
            </ol>
        </section>

    <?php } elseif ($test == 'p_edit_supp_vt') { ?>
        <!--   Content Header (Page header) -->
        <section class="content-header">
            <h1>
                تعديل بيانات القيد للمورد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=p_m_supp">الحركة</a></li>
                <li class="active">تعديل بيانات القيد للمورد</li>
            </ol>
        </section>

    <?php } elseif ($test == 'p_v_supp_vt') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                عرض تفاصيل القيد للمورد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=p_m_supp">الحركة</a></li>
                <li class="active">عرض تفاصيل القيد للمورد </li>
            </ol>
        </section>




    <?php } elseif ($test == 'p_add_cust_vt') { ?>
        <section class="content-header">
            <h1>
                اضافة قيد جديد للعميل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=p_m_cust">الحركة</a></li>
                <li class="active">القيود اليومية للعميل</li>
            </ol>
        </section>

    <?php } elseif ($test == 'p_edit_cust_vt') { ?>
        <!--   Content Header (Page header) -->
        <section class="content-header">
            <h1>
                تعديل بيانات القيد للعميل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=p_m_cust">حركة العميل</a></li>
                <li class="active">تعديل بيانات القيد للعميل</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_v_cust_vt') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                عرض تفاصيل القيد العميل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=p_m_cust">الحركة</a></li>
                <li class="active">عرض تفاصيل القيد العميل </li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_rev_cust') { ?>

        <section class="content-header">
            <h1>
                مراجعة القيود اليومية العميل قبل الترحيل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">القيود اليومية للعملاء</li>
            </ol>
        </section>



    <?php } elseif ($test == 'p_rev_v_cust_vt') { ?>

        <section class="content-header">
            <h1>
                عرض بيانات القيد للعملاء قبل الترحيل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li><a href="?page=p_rev_cust">مراجعة القيود</a></li>
                <li class="active"> عرض بيانات القيد</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_fin_cust') { ?>

        <section class="content-header">
            <h1>
                الاستعلام عن القيود المرحلة
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">القيود المرحلة للعملاء</li>
            </ol>
        </section>

    <?php } elseif ($test == 'r_cust_vtd') { ?>

        <section class="content-header">
            <h1>
                تقرير المشتري (العميل) حسب التأريخ
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active"> عرض بيانات التقرير للمشتري حسب التأريخ</li>
            </ol>
        </section>


    <?php } elseif ($test == 'p_fin_v_cust_vt') { ?>

        <section class="content-header">
            <h1>
                عرض بيانات القيد للعملاء بعد الترحيل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li><a href="?page=p_fin_supp">الاستعلام عن القيود</a></li>
                <li class="active"> عرض بيانات القيد</li>
            </ol>
        </section>




    <?php } elseif ($test == 'profile') { ?>
        <section class="content-header">
            <h1>
                الملف الشخصي
            </h1>
            <ol class="breadcrumb">
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active">الملف الشخصي</li>
            </ol>
        </section>


    <?php } elseif ($test == 'page_security') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                الصلاحيات والمستخدمين
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                <li><a href="../User/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li>
                    <a href="?page=page_users_inactive"><i class="fa fa-dashboard"></i>المستخدمين</a>
                </li>
                <li class="active">الصلاحيات والمستخدمين</li>
            </ol>
        </section>

    <?php } ?>





    <!-- For change content for any page  -->
    <section class="content">
        <?php
        if (!file_exists($test . ".php") && !is_dir($test)) {
            include '404.html';
        } else {
            if (is_dir($test))
                include  $test . '.php';
            else
                include '../User/' . $test . '.php';
        }
        ?>
    </section>
    <!-- /.content -->
</div>





<?php require_once './footer.php'; ?>


<script>
    $(document).ready(function() {
        $(document).on('click', '#checkAll_vts', function() {
            $(".itemRow_vts").prop("checked", this.checked);
        });
        $(document).on('click', '.itemRow_vts', function() {
            if ($('.itemRow_vts:checked').length == $('.itemRow_vts').length) {
                $('#checkAll_vts').prop('checked', true);
            } else {
                $('#checkAll_vts').prop('checked', false);
            }
        });
        var count = $(".itemRow_vts").length;
        $(document).ready(function() {
            $(document).on('change', '#VS_DAT', function() {
                var selectedDate = $(this).val();
                var dateObject = new Date(selectedDate);
                var dayIndex = dateObject.getDay();
                $('.TS_DY').val(dayIndex + 1).trigger('change');
                var formattedDate = dateObject.toISOString().split('T')[0];
                $('.TSDAT').val(formattedDate);
            });
        });


        $(document).on('click', '#addRows_vts', function() {
            count++;
            var htmlRows = '';
            htmlRows += '<tr>';
            htmlRows += '<td><input class="itemRow_vts" type="checkbox"></td>';
            htmlRows += '<td style="text-align: center;display:none;"><input type="number" name="TS_SER[]" id="TS_SER_' + count +
                '" value="' + count +
                '" class="form-control" autocomplete="off" style="width:50px;" readonly ></td>';

            htmlRows += '<td><div class="form-group"><select name="TS_DY[]" id="TS_DY_' + count +
                '" class="form-control js TS_DY" autocomplete="off" style="width:100px;" ><?php for ($i = 0; $i < count($day); $i++) {
                                                                                                echo '<option value="' . $day[$i]->getDYID() . '">' . $day[$i]->getDYName() . '</option>';
                                                                                            } ?></select></div></td>';

            htmlRows += '<td><div class="form-group"><input type="date" value="<?php echo date('Y-m-d') ?>" name="TSDAT[]" id="TSDAT_' + count + '" class="form-control TSDAT" autocomplete="off"  style="width:150px;"></div></td>';


            htmlRows += '<td><div class="form-group"><select name="VS_CUSTID[]" id="VS_CUSTID_' + count +
                '" class="form-control js VS_CUSTID" autocomplete="off" style="width:200px;" ><option value="" selected disabled>اختر اسم المشتري</option> <?php echo $vts->get_custsupnst($connect); ?></select></div></td>';

            htmlRows += '<td><button type="button" class="btn btn-primary btn_add_cust_vts" data-toggle="modal"><i class="fa fa-plus"></i></button></td>';

            htmlRows +=
                '<td><div class="form-group"><input type="text" pattern="[0-9]*" data-line="' + count + '" name="TS_NUM[]" id="TS_NUM_' + count + '" class="form-control TS_NUM" onchange="total_amount_supp()" value="0" autocomplete="off" style="width:100px;"></div></td>';
            htmlRows += '<td><div class="form-group"><input type="text" pattern="[0-9]*" name="TS_PRC[]" id="TS_PRC_' + count + '" class="form-control TS_PRC" onchange="total_amount_supp()" value="0" autocomplete="off" style="width:100px;"></div></td>';
            htmlRows += '<td><div class="form-group"><input type="text" pattern="[0-9]*" name="TS_TOT[]" id="TS_TOT_' + count + '" class="form-control TS_TOT" onchange="total_amount_supp()" value="0" autocomplete="off" style="width:150px;"></div></td>';
            htmlRows +=
                '<td style="display: none;"> <div class="form-group"><input type="text" pattern="[0-9]*" name="TS_DISC[]" id="TS_DISC_' + count + '" class="form-control TS_DISC" autocomplete="off" value="0.00" style="width:150px;"></div></td>';
            htmlRows += '<td style="display: none;"> <div class="form-group"><input type="text" pattern="[0-9]*" name="TSTOTDISC[]" id="TSTOTDISC_' + count + '" class="form-control TSTOTDISC" autocomplete="off" value="0.00" style="width:150px;"></div></td>';
            htmlRows += '<td> <div class="form-group"><input type="text" pattern="[0-9]*" name="TSMUST[]" id="TSMUST_' + count + '" class="form-control TSMUST" onchange="totalTSMUSTAmountsupp_all_day()" autocomplete="off" value="0.00" style="width:150px;"></div></td>';
            htmlRows += '<td><div class="form-group"><input type="text" name="TSNT[]" id="TSNT_' + count + '" class="form-control TSNT" style="width:150px;" autocomplete="off"></div></td>';

            htmlRows += '<td><button class="btn btn-primary" id="addRows_vts" type="button"><span class="glyphicon glyphicon-plus"></span></button></td></td>';
            htmlRows += '<td><button class="btn btn-primary delete" id="removeRows_vts" type="button"><span class="glyphicon glyphicon-minus"></span></button></td>';



            htmlRows += '</tr>';
            $('#moveItem_vts').append(htmlRows);

            initializeSelect2();

        });

        let initializeSelect2 = function() {
            $('.js').select2();
        }

        $(document).on('click', '#removeRows_vts', function() {
            $(".itemRow_vts:checked").each(function() {
                $(this).closest('tr').remove();
            });
            $('#checkAll_vts').prop('checked', false);
        });
    });

    // ===================== الاجمالي ضرب العدد * السعر
    function total_amount_supp() {

        $("[id^='TS_NUM_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TS_NUM_", '');

            var TRI5S = $('#TS_NUM_' + id).val();
            var TRI6S = $('#TS_PRC_' + id).val();
            var TRI7S = $('#TS_TOT_' + id).val();

            var sumamou = 0;

            if (TRI5S > 0 && TRI6S > 0 && TRI7S == 0) {
                var tot_supp = TRI5S * TRI6S;
                tot_supp = tot_supp.toFixed(2);
                $('#TS_TOT_' + id).val(tot_supp);

            } else if (TRI5S > 0 && TRI7S > 0 && TRI6S == 0) {
                var tot_supps = TRI7S / TRI5S;
                tot_supps = tot_supps.toFixed(2);

                $('#TS_PRC_' + id).val(tot_supps);

            } else if (TRI6S > 0 && TRI7S > 0 && TRI5S == 0) {
                var tot_supps_s = TRI7S / TRI6S;
                tot_supps_s = tot_supps_s.toFixed(2);
                $('#TS_NUM_' + id).val(tot_supps_s);


            } else if (TRI6S > 0 && TRI7S > 0 && TRI5S > 0) {
                var tot_supps_s = TRI5S * TRI6S;
                tot_supps_s = tot_supps_s.toFixed(2);
                $('#TS_TOT_' + id).val(tot_supps_s);
                var totalAmountd = parseInt(TRI7S);

            }

        });
        totalAmountsupp_all_day();
        total_afterdisc_supp();
        total_sales_supp();
    }


    // =========== اجمالي يوم كامل
    function totalAmountsupp_all_day() {
        var totalAmouSupp = 0;
        $("[id^='TS_TOT_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TS_TOT_", '');


            var TRI7tS = $('#TS_TOT_' + id).val();

            totalAmouSupp = totalAmouSupp + parseFloat(TRI7tS);

        });
        totalAmouSupp = totalAmouSupp.toFixed(2);
        $('#TSTOTDYCOM').val(totalAmouSupp);
    }

    // =========== الخصم
    function calDISCAMO_supp() {

        var TRI7TOT = $('#TSTOTDYCOM').val();
        var calDISC = $('#TSTOTAMOU').val();
        var TOTRET = calDISC / TRI7TOT;

        TOTRET = TOTRET * 100;
        TOTRET = TOTRET.toFixed(2);

        $('#TSITOTRET').val(TOTRET);

        // calTRI10TOT_supp();
        destribut_discount_supp();
        total_afterdisc_supp();

    }

    function calDISCRET_supp() {
        var TRI7TOT = $('#TSTOTDYCOM').val();
        var calDISC = $('#TSITOTRET').val();
        var TOTRET = calDISC / 100;

        TOTRET = TOTRET * TRI7TOT;
        TOTRET = TOTRET.toFixed(2);

        $('#TSTOTAMOU').val(TOTRET);
        destribut_discount_supp();
        total_afterdisc_supp();
    }


    function destribut_discount_supp() {
        var TSTOTDYCOM = $('#TSTOTDYCOM').val();
        var TSTOTAMOU = $('#TSTOTAMOU').val();

        if (TSTOTDYCOM == 0) {
            x
        } else {
            var des_count = parseFloat(TSTOTAMOU) / parseFloat(TSTOTDYCOM);

            $("[id^='TS_DISC_']").each(function() {
                var id = $(this).attr('id');
                id = id.replace("TS_DISC_", '');

                var TRI7S = $('#TS_TOT_' + id).val();

                var new_descount = parseFloat(TRI7S) * des_count;
                new_descount = new_descount.toFixed(2);
                $('#TS_DISC_' + id).val(new_descount);

            });
        }
        total_amount_supp();
        total_afterdisc_supp();
    }
    // =========== اجمالي بعد الخصم
    function total_afterdisc_supp() {
        $("[id^='TSTOTDISC_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TSTOTDISC_", '');

            var TS_TOT_S = $('#TS_TOT_' + id).val();
            var TS_DISC_S = $('#TS_DISC_' + id).val();

            var des_countafter = parseFloat(TS_TOT_S) - parseFloat(TS_DISC_S);
            // var new_descount = parseFloat(TRI7Ss) - des_countafter;
            new_descount = des_countafter.toFixed(2);
            $('#TSTOTDISC_' + id).val(new_descount);
        });
    }

    // ===========   إجمالي المبيع	
    function total_sales_supp() {
        var tot_supsal = 0;
        $("[id^='TSTOTDISC_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TSTOTDISC_", '');

            var tot_af = $('#TSTOTDISC_' + id).val();
            tot_supsal = tot_supsal + parseFloat(tot_af);
        });
        tot_supsal = tot_supsal.toFixed(2);
        tot_supsal = Math.floor(tot_supsal / 100) * 100;
        $('#TSTOTSALE').val(tot_supsal);
        $('#TSHISREMD').val(tot_supsal);
    }



    // ===========    حساب المسلم والمتبقى له والمتبقى عليه	
    // function cal_remaind_supp() {
    //     var TSTOTSALE = $('#TSTOTSALE').val();
    //     // alert(TSTOTSALE);
    //     var TSMUS = $('#TSMUS').val();
    //     var TSHISREMD = $('#TSHISREMD').val();
    //     var TSONREMD = $('#TSONREMD').val();

    //     // alert(TSMUS);


    //     if (TSMUS < TSTOTSALE || TSHISREMD > 0 || TSMUS < TSHISREMD) {
    //         var remaind_sp = parseFloat(TSTOTSALE) - parseFloat(TSMUS);
    //         remhissup = remaind_sp.toFixed(2);
    //         $('#TSHISREMD').val(remhissup);
    //         $("#TSONREMD").val(0);



    //     } else if (TSMUS > TSTOTSALE || TSHISREMD < 0 || TSMUS > TSHISREMD) {
    //         var remaindson_sp = parseFloat(TSTOTSALE) - parseFloat(TSMUS);
    //         remsonsup = remaindson_sp.toFixed(2) * -1;
    //         $('#TSONREMD').val(remsonsup);
    //         $("#TSHISREMD").val(0);

    //     } else if (TSMUS == TSTOTSALE) {
    //         $("#TSHISREMD").val(0);
    //         $("#TSONREMD").val(0);
    //     }

    // }
    function cal_remaind_supp() {
        var TSTOTSALE = parseFloat($('#TSTOTSALE').val());
        var TSMUS = parseFloat($('#TSMUS').val());
        var TSHISREMD = parseFloat($('#TSHISREMD').val());
        var TSONREMD = parseFloat($('#TSONREMD').val());

        // جمع الفلوس المسلمة كامل
        var totalReceived = TSMUS;

        // حساب المتبقي له والمتبقي عليه
        var remainingForHim = Math.max(0, TSTOTSALE - totalReceived);
        var remainingOnHim = Math.max(0, totalReceived - TSTOTSALE);

        // تحديث حقول النص
        $('#TSHISREMD').val(remainingForHim.toFixed(2));
        $('#TSONREMD').val(remainingOnHim.toFixed(2));
    }




    // ===========    حساب المسلم والمتبقى له والمتبقى عليه	
    // function cal_remaind_supp_edit() {
    //     var TSTOTSALE = $('#TSTOTSALE').val();
    //     // alert(TSTOTSALE);
    //     var TSMUS = $('#TSMUS').val();
    //     var TSHISREMD = $('#TSHISREMD').val();
    //     var TSONREMD = $('#TSONREMD').val();
    //     // alert(TSMUS);


    //     if (TSMUS < TSTOTSALE) {
    //         var remaind_sp = parseFloat(TSTOTSALE) - parseFloat(TSMUS);
    //         remhissup = remaind_sp.toFixed(2);
    //         $('#TSHISREMD').val(remhissup);
    //         $("#TSONREMD").val(0);



    //     } else if (TSMUS > TSTOTSALE) {
    //         var remaindson_sp = parseFloat(TSTOTSALE) - parseFloat(TSMUS);
    //         remsonsup = remaindson_sp.toFixed(2) * -1;
    //         $('#TSONREMD').val(remsonsup);
    //         $("#TSHISREMD").val(0);

    //     } else if (TSMUS == TSTOTSALE) {
    //         $("#TSHISREMD").val(0);
    //         $("#TSONREMD").val(0);
    //     }
    // }

    function cal_remaind_supp_edit() {
        var TSTOTSALE = parseFloat($('#TSTOTSALE').val());
        var TSMUS = parseFloat($('#TSMUS').val());
        var TSHISREMD = parseFloat($('#TSHISREMD').val());
        var TSONREMD = parseFloat($('#TSONREMD').val());

        // جمع الفلوس المسلمة كامل
        var totalReceived = TSMUS;

        // حساب المتبقي له والمتبقي عليه
        var remainingForHim = Math.max(0, TSTOTSALE - totalReceived);
        var remainingOnHim = Math.max(0, totalReceived - TSTOTSALE);

        // تحديث حقول النص
        $('#TSHISREMD').val(remainingForHim.toFixed(2));
        $('#TSONREMD').val(remainingOnHim.toFixed(2));
    }



    // =========== اجمالي مسلم يوم كامل
    function totalTSMUSTAmountsupp_all_day() {
        var totalmusSupp = 0;
        $("[id^='TSMUST_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TSMUST_", '');


            var TSMUSTSup = $('#TSMUST_' + id).val();
            // alert(TSMUSTSup);

            totalmusSupp = totalmusSupp + parseFloat(TSMUSTSup);
            // alert(totalmusSupp);

        });
        totalmusSupp = totalmusSupp.toFixed(2);
        $('#TSMUS').val(totalmusSupp);
        cal_remaind_supp();
        cal_remaind_supp_edit();
    }

    // ==============================================================================================
    // اضافة تفاصيل الحركة للعميل
    $(document).ready(function() {
        $(document).on('click', '#checkAll_cust', function() {
            $(".itemRow_cust").prop("checked", this.checked);
        });
        $(document).on('click', '.itemRow_cust', function() {
            if ($('.itemRow_cust:checked').length == $('.itemRow_cust').length) {
                $('#checkAll_cust').prop('checked', true);
            } else {
                $('#checkAll_cust').prop('checked', false);
            }
        });
        var count = $(".itemRow_cust").length;
        $(document).on('click', '#addRows_cust', function() {
            count++;
            var htmlRows = '';
            htmlRows += '<tr>';
            htmlRows += '<td><input class="itemRow_cust" type="checkbox"></td>';
            htmlRows += '<td><input type="number" name="TC_SER[]" id="TC_SER_' + count +
                '" value="' + count +
                '" class="form-control" autocomplete="off" style="width:50px;" readonly ></td>';

            htmlRows += '<td style="text-align: center;"><div class="form-group"><select name="TC_DY[]" id="TC_DY_' + count +
                '" class="form-control js TC_DY" autocomplete="off" style="width:100px;" ><option value="1">السبت</option><option value="2">الأحد</option><option value="3">الاثنين</option><option value="4">الثلاثاء</option><option value="5">الاربعاء</option><option value="6">الخميس</option><option value="7">الجمعة</option></select></div></td>';


            htmlRows += '<td><div class="form-group"><select name="VC_CUSTID[]" id="VC_CUSTID_' + count +
                '" class="form-control js VC_CUSTID" autocomplete="off" style="width:150px;" ><option value="" selected disabled>اختر اسم المشتري</option> <?php echo $vtc->get_custinst($connect); ?></select></div></td>';


            htmlRows += '<td><div class="form-group"><input type="date" value="<?php echo date('Y-m-d') ?>" name="TC_DAT[]" id="TC_DAT_' + count + '" class="form-control TC_DAT" autocomplete="off"  style="width:150px;"></div></td>';

            htmlRows += '<td> <div class="form-group"><input type="number" name="TCNUM[]" id="TCNUM_' + count + '" class="form-control TCNUM" autocomplete="off" onchange="total_amount_cust()" value="0" style="width: 100px;"></div></td>';

            htmlRows += ' <td> <div class="form-group"><input type="number" name="TC_PRC[]" id="TC_PRC_' + count + '" class="form-control TC_PRC" autocomplete="off" onchange="total_amount_cust()" value="0" style="width: 100px;"></div></td>';

            htmlRows += '<td><input type="text" name="TC_TOT[]" id="TC_TOT_' + count + '" class="form-control TC_TOT" autocomplete="off" onchange="total_amount_cust()" value="0" style="width: 150px;"></td>';

            htmlRows += '<td> <div class="form-group"><input type="number" name="TCCOMIS[]" id="TCCOMIS_' + count + '" class="form-control TCCOMIS" autocomplete="off" value="0" style="width:150px;"></div></td>';

            htmlRows += '<td> <div class="form-group"><input type="number" name="TCTOTDISC[]" id="TCTOTDISC_' + count + '" class="form-control TCTOTDISC" autocomplete="off" value="0.00" style="width:150px;"></div></td>';

            htmlRows += '<td> <div class="form-group"><input type="number" name="TCCOMISM[]" id="TCCOMISM_' + count + '" class="form-control TCCOMISM" autocomplete="off" value="0" style="width:150px;"></div></td>';

            htmlRows += '<td> <div class="form-group"><input type="number" name="TCTOTDISCM[]" id="TCTOTDISCM_' + count + '" class="form-control TCTOTDISCM" autocomplete="off" value="0.00" style="width:150px;"></div></td>';

            htmlRows += '<td><div class="form-group"><select name="TCPST[]" id="TCPST_' + count +
                '" class="form-control TCPST" autocomplete="off" style="width:150px;" ><option value="" selected disabled>اختر اسم الرعوي</option> <?php echo $vtc->get_supcust($connect); ?></select></div></td>';

            htmlRows += '<td> <div class="form-group"><input type="number" name="TCMUST[]" id="TCMUST_' + count + '" class="form-control TCMUST" onchange="TotMUSTcust_all_day()"  autocomplete="off" value="0.00" style="width:150px;"></div></td>';

            htmlRows += '<td><div class="form-group"><input type="text" name="TCNT[]" id="TCNT_' + count + '" class="form-control TCNT" style="width:200px;" autocomplete="off"></div></td>';

            htmlRows += '<td><button class="btn btn-primary" id="addRows_cust" type="button"><span class="glyphicon glyphicon-plus"></span></button></td></td>';
            htmlRows += '<td><button class="btn btn-primary delete" id="removeRows_cust" type="button"><span class="glyphicon glyphicon-minus"></span></button></td>';



            htmlRows += '</tr>';
            $('#moveItem_cust').append(htmlRows);

            initializeSelect2();
        });

        let initializeSelect2 = function() {
            $('.js').select2();
        }

        $(document).on('click', '#removeRows_cust', function() {
            $(".itemRow_cust:checked").each(function() {
                $(this).closest('tr').remove();
            });
            $('#checkAll_cust').prop('checked', false);

        });

    });


    //  ===============================================   حساب المدين مع المعادل ===================================================    


    // $(function() {
    //     $("#VC_TOT, #VC_PD").on("keydown keyup", cal_remaind);

    //     function cal_remaind() {
    //         $("#VC_REMD").val(Number($("#VC_TOT").val()) - Number($("#VC_PD").val()));
    //     }
    // });





    function total_amount_cust() {

        $("[id^='TCNUM_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCNUM_", '');

            var TRI5 = $('#TCNUM_' + id).val();
            var TRI6 = $('#TC_PRC_' + id).val();
            var TRI7 = $('#TC_TOT_' + id).val();

            var sumamou = 0;

            if (TRI5 > 0 && TRI6 > 0 && TRI7 == 0) {
                var totpristo = TRI5 * TRI6;
                totpristo = totpristo.toFixed(2);
                $('#TC_TOT_' + id).val(totpristo);

            } else if (TRI5 > 0 && TRI7 > 0 && TRI6 == 0) {
                var totpriss = TRI7 / TRI5;
                totpriss = totpriss.toFixed(2);

                $('#TC_PRC_' + id).val(totpriss);

            } else if (TRI6 > 0 && TRI7 > 0 && TRI5 == 0) {
                var totpristo = TRI7 / TRI6;
                totpristo = totpristo.toFixed(2);
                $('#TCNUM_' + id).val(totpristo);


            } else if (TRI6 > 0 && TRI7 > 0 && TRI5 > 0) {
                var totpristo = TRI5 * TRI6;
                totpristo = totpristo.toFixed(2);
                $('#TC_TOT_' + id).val(totpristo);
                var totalAmountd = parseInt(TRI7);

            }

        });
        totalAmount_all_day();
        total_afterdisc_cust();
        total_afterdisc_custm();
        total_sales_Cust();
        total_sales_Custm();
    }






    function totalAmount_all_day() {
        var totalAmou = 0;
        $("[id^='TC_TOT_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TC_TOT_", '');


            var TRI7 = $('#TC_TOT_' + id).val();

            totalAmou = totalAmou + parseFloat(TRI7);

        });
        totalAmou = totalAmou.toFixed(2);
        $('#TCTOTDY').val(totalAmou);
    }

    // ===========  =========== =========== =========== حساب العمولة للعميل
    // =========== الخصم للعميل
    function CalDISCRET_Cust() {
        var totalCOMIS = 0;
        var TCITOTRETonee = $('#TCITOTRET').val();
        $("[id^='TCCOMIS_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCCOMIS_", '');

            var TRTCCOMIS = $('#TCCOMIS_' + id).val();
            var TCNUM_ttwo = $('#TCNUM_' + id).val();
            var newdCntCust = parseFloat(TCITOTRETonee) * parseFloat(TCNUM_ttwo);
            totalCOMIS = totalCOMIS + parseFloat(newdCntCust);
            // alert('one' + totalCOMIS)
        });
        totalCOMIS = totalCOMIS;
        $('#TCTOTAMOU').val(totalCOMIS);
        destribut_discount_Cust();
        total_afterdisc_cust();
    }




    // ===========  تابع حساب العمولة للعميل
    function destribut_discount_Cust() {
        // var TCTOTDYCust = $('#TCTOTDY').val();
        var TCTOTAMOUCust = $('#TCTOTAMOU').val();

        // if (TCTOTDYCust == 0) {
        //     x
        // } else {
        // var descountCust = parseFloat(TCTOTAMOUCust) / parseFloat(TCTOTDYCust);
        // alert('discount is' + descountCust);
        var TCITOTRETon = $('#TCITOTRET').val();
        $("[id^='TCCOMIS_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCCOMIS_", '');

            var TCNUM_two = $('#TCNUM_' + id).val();

            var newdCntCut = parseFloat(TCITOTRETon) * parseFloat(TCNUM_two);
            // alert('kjldfsdjlf0' + newdCntCut)
            ndescut = newdCntCut.toFixed(2);
            $('#TCCOMIS_' + id).val(ndescut);

        });
        // }
        total_amount_cust();
        total_afterdisc_cust();
    }
    // =========== =========== =========== نهائة كود حساب العمولة=========== =========== =========== =========== 
    function total_afterdisc_cust() {
        $("[id^='TCTOTDISC_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCTOTDISC_", '');

            var TC_TOT_C = $('#TC_TOT_' + id).val();
            var TC_DISC_C = $('#TCCOMIS_' + id).val();

            var descntcustaft = parseFloat(TC_TOT_C) + parseFloat(TC_DISC_C);
            newdescustaft = descntcustaft.toFixed(2);
            $('#TCTOTDISC_' + id).val(newdescustaft);
        });
    }

    // ===========   إجمالي المبيع	
    function total_sales_Cust() {
        var totcstsal = 0;
        $("[id^='TCTOTDISC_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCTOTDISC_", '');

            var totcaf = $('#TCTOTDISC_' + id).val();
            totcstsal = totcstsal + parseFloat(totcaf);
        });
        totcstsal = totcstsal.toFixed(2);
        $('#TCTOTSALE').val(totcstsal);
    }



    // ===========    حساب المسلم والمتبقى له والمتبقى عليه بالنسبة للعميل	
    // function Cal_remaind_Cust() {
    //     var remhiscus = 0;
    //     var TCTOTSALECust = $('#TCTOTSALEF').val();
    //     // alert(TCTOTSALECust);
    //     var TCMUSCust = $('#TCMUS').val();
    //     // alert(TCMUSCust);

    //     var TCHISREMD = $('#TCHISREMD').val();
    //     var TCONREMD = $('#TCONREMD').val();


    //     if (TCMUSCust < TCTOTSALECust) {
    //         var remaind_cus = parseFloat(TCTOTSALECust) - parseFloat(TCMUSCust);
    //         remhiscus = remaind_cus;

    //         $('#TCHISREMD').val(remhiscus);
    //         $("#TCONREMD").val(0);


    //     } else if (TCMUSCust > TCTOTSALECust) {
    //         var remaindson_Cus = parseFloat(TCTOTSALECust) - parseFloat(TCMUSCust);
    //         remsoncus = remaindson_Cus * -1;
    //         $('#TCONREMD').val(remsoncus);
    //         $("#TCHISREMD").val(0);

    //     } else if (TCMUSCust == TCTOTSALECust) {
    //         $("#TCHISREMD").val(0);
    //         $("#TCONREMD").val(0);
    //     }
    // }


    function Cal_remaind_Cust() {
        var TCTOTSALECust = parseFloat($('#TCTOTSALEF').val()) || 0;
        var TCMUSCust = parseFloat($('#TCMUS').val()) || 0;

        var remaind_cus = Math.max(TCTOTSALECust - TCMUSCust, 0);
        var remsoncus = Math.max(TCMUSCust - TCTOTSALECust, 0);

        $('#TCHISREMD').val(remaind_cus.toFixed(2));
        $('#TCONREMD').val(remsoncus.toFixed(2));
    }




    // ======================================================================================

    // ===========  =========== =========== =========== حساب العمولة للعميل
    // =========== الخصم للعميل
    function CalDISCAMO_Custm() {

        var CustTOTAllC = $('#TCTOTSALE').val();
        var calcusDISCM = $('#TCMTOTAMOU').val();
        var TOTRETM = calcusDISCM / CustTOTAllC;

        TOTAMOCustm = TOTRETM * 100;
        TAMOCustm = TOTAMOCustm.toFixed(2);

        $('#TCMITOTRET').val(TAMOCustm);
        destribut_discount_Custm();
        total_afterdisc_custm();
    }


    function CalDISCRET_Custm() {
        var CustTOTAllC = $('#TCTOTSALE').val();
        // alert(CustTOTAllC);
        var calcusDISCM = $('#TCMITOTRET').val();
        // alert(calcusDISCM);
        var TOTDisCustm = calcusDISCM / 100;
        // alert(TOTDisCustm);

        TotCusDiscm = TOTDisCustm * CustTOTAllC;
        Tcusdiscm = TotCusDiscm.toFixed(2);

        $('#TCMTOTAMOU').val(Tcusdiscm);
        destribut_discount_Custm();
        total_afterdisc_custm();
    }



    // ===========  تابع حساب العمولة للعميل
    function destribut_discount_Custm() {
        var TCTOTDYCustm = $('#TCTOTSALE').val();
        var TCTOTAMOUCustm = $('#TCMTOTAMOU').val();

        if (TCTOTDYCustm == 0) {
            x
        } else {
            var descountCustm = parseFloat(TCTOTAMOUCustm) / parseFloat(TCTOTDYCustm);

            $("[id^='TCCOMISM_']").each(function() {
                var id = $(this).attr('id');
                id = id.replace("TCCOMISM_", '');

                var TCustTOTM = $('#TCTOTDISC_' + id).val();

                var newdCntCutm = parseFloat(TCustTOTM) * descountCustm;
                ndescutm = newdCntCutm.toFixed(2);
                $('#TCCOMISM_' + id).val(ndescutm);

            });
        }
        total_amount_cust();
        total_afterdisc_custm();
    }
    // =========== =========== =========== نهائة كود حساب العمولة=========== =========== =========== =========== 
    function total_afterdisc_custm() {
        $("[id^='TCTOTDISCM_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCTOTDISCM_", '');

            var TC_TOT_CM = $('#TCTOTDISC_' + id).val();
            var TC_DISC_CM = $('#TCCOMISM_' + id).val();

            var descntcustaftm = parseFloat(TC_TOT_CM) - parseFloat(TC_DISC_CM);
            newdescustaftm = descntcustaftm.toFixed(2);
            $('#TCTOTDISCM_' + id).val(newdescustaftm);
        });
    }

    // ===========   إجمالي المبيع	
    function total_sales_Custm() {
        var totcstsalm = 0;
        $("[id^='TCTOTDISCM_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCTOTDISCM_", '');

            var totcafm = $('#TCTOTDISCM_' + id).val();
            totcstsalm = totcstsalm + parseFloat(totcafm);
        });
        totcstsalm = totcstsalm.toFixed(2);
        $('#TCTOTSALEF').val(totcstsalm);
        $('#TCHISREMD').val(totcstsalm);
    }


    // =========== للعميل اجمالي مسلم يوم كامل
    function TotMUSTcust_all_day() {
        var totalmusCust = 0;
        $("[id^='TCMUST_']").each(function() {
            var id = $(this).attr('id');
            id = id.replace("TCMUST_", '');


            var TSMUSTCust = $('#TCMUST_' + id).val();
            // alert(TSMUSTCust);

            totalmusCust = totalmusCust + parseFloat(TSMUSTCust);
            // alert(totalmusCust);

        });
        totalmusCust = totalmusCust;
        $('#TCMUS').val(totalmusCust);
        Cal_remaind_Cust();
    }






    //Securtiy 
    var SECBRAID = $('#SECBRAID').val();
    $("#SEC_BRA_ID").val(SECBRAID);
</script>