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
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">المستخدمين</li>
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
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">البرامج والصلاحيات</li>
            </ol>
        </section>


    <?php } elseif ($test == 'page_paramerters') { ?>


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                متغيرات النظام
                <small></small>
            </h1>

            <ol class="breadcrumb">
                <li>
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">متغيرات النظام</li>
            </ol>
        </section>

    <?php } elseif ($test == 'page_branches') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                الفروع
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">الفروع</li>
            </ol>
        </section>

    <?php } elseif ($test == 'page_activities') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                مركز التكلفة
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">مركز التكلفة</li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_currency') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                العملات
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">العملات</li>
            </ol>
        </section>

    <?php } elseif ($test == 'page_exchange_rate') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                أسعار الصرف
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">
                    <a href="../Admin/page_exchange_rate.php">أسعار الصرف للعملات</a>
                </li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_general_ledger_accounts') { ?>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                دليل الحسابات
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">دليل الحسابات</li>
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
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">المستندات</li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_main_trans') { ?>

        <section class="content-header">
            <h1>
                القيود اليومية
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a>
                </li>
                <li class="active">القيود اليومية</li>
            </ol>
        </section>


    <?php } elseif ($test == 'page_account_movement_details') { ?>
        <section class="content-header">
            <h1>
                اضافة قيد جديد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=page_main_trans">الحركة</a></li>
                <li class="active">القيود اليومية </li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_edit_move_details') { ?>
        <!--   Content Header (Page header) -->
        <section class="content-header">
            <h1>
                تعديل بيانات القيد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=page_main_trans">الحركة</a></li>
                <li class="active">تعديل بيانات القيد</li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_view_move_details') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                عرض تفاصيل القيد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=page_main_trans">الحركة</a></li>
                <li class="active">عرض تفاصيل القيد </li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_review_restrictions') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                مراجعة القيود اليومية
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li class="active">مراجعة القيود اليومية</li>
            </ol>
        </section>

    <?php } elseif ($test == 'page_view_details_review') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                عرض تفاصيل القيد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=page_review_restrictions">مراجعة القيود اليومية</a></li>
                <li class="active">عرض تفاصيل القيد </li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_inquiries_accounts') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                الاستعلام (حركة القيود)
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li class="active">الاستعلام(حركة القيود)</li>
            </ol>
        </section>
    <?php } elseif ($test == 'page_view_details_inquiries') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                عرض تفاصيل القيد
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="?page=page_inquiries_accounts">الاستعلام (حركة القيود)</a></li>
                <li class="active">عرض تفاصيل القيد </li>
            </ol>
        </section>

    <?php } elseif ($test == 'report_acc_st') { ?>
        <section class="content-header">
            <h1>
                كشف حســـاب
                <small></small>
            </h1>

            <ol class="breadcrumb">
                <li>
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li class="active">كشف حساب</li>
            </ol>
        </section>

    <?php } elseif ($test == 'report_mizan_acc') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ميزان المراجعة
                <small></small>
            </h1>

            <ol class="breadcrumb">
                <li>
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li class="active">ميزان المراجعة</li>
            </ol>
        </section>

    <?php } elseif ($test == 'report_vouch_trans') { ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                طباعة القيود اليومية
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li class="active">طباعة القيود اليومية</li>
            </ol>
        </section>
    <?php } elseif ($test == 'profile') { ?>
        <section class="content-header">
            <h1>
                الملف الشخصي
            </h1>
            <ol class="breadcrumb">
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
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
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li>
                    <a href="?page=page_users_inactive"><i class="fa fa-dashboard"></i>المستخدمين</a>
                </li>
                <li class="active">الصلاحيات والمستخدمين</li>
            </ol>
        </section>
    <?php } elseif ($test == 'report_income_statement') { ?>



        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                قائمة الدخل
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li>
                    <a href="?page=page_users_inactive"><i class="fa fa-dashboard"></i>قائمة الدخل</a>
                </li>
                <li class="active"> قائمة الدخل</li>
            </ol>
        </section>
    <?php } elseif ($test == 'report_statement_financial') { ?>



        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                الميزانية العمومية
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                <li><a href="../Admin/"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </li>
                <li>
                    <a href="?page=page_users_inactive"><i class="fa fa-dashboard"></i> الميزانية العمومية </a>
                </li>
                <li class="active"> الميزانية العمومية </li>
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
                include '../Admin/' . $test . '.php';
        }
        ?>
    </section>
    <!-- /.content -->
</div>



<?php require_once './footer.php'; ?>
<script>
    //   ===================================
    //  ===============================================   طباعة كشف حساب ===================================================
    function print_raport_acc() {
        $("[id^='TRA_ACC_ID_']").each(function() {
            //  alert('TEDDTET');

            var acc_id = $(this).attr('id');

            id_a = acc_id.replace("TRA_ACC_ID_", '');

            var id = $('#TRA_ACC_ID_' + id_a).val();


            if (id != null) {
                // alert("Your id is"+ id);
                //$('#Acc_number_id_' + id).val(grid);
                //  alert('Your id is:'+id);
                const start_date = new Date();
                // alert(start_date);
                currency_id = 1,
                    i_date1 = '2021-11-10',
                    i_date2 = start_date.getFullYear() + "-" + start_date.getMonth() + "-" + start_date.getDate();

                var VOU_USE_name = $('#VOU_USE_name').val();
                var Branch_desc = $('#Branch_desc').val();

                // alert(VOU_USE_name +'//'+Branch_desc)
                // VOU_USE_name = 'qqqqq qqwdrr';
                alert("ACC is :" + id + "//" + currency_id + "//" + i_date1 + "//" + i_date2 + "//" + VOU_USE_name);
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=print_reprt_vouchers&id=" + id + "&currency_id=" + currency_id +
                        "&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&Branch_desc=" + Branch_desc +
                        "",
                    success: function(result) {
                        // alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            } else {
                alert(false);
                disableLoginButton();
            }
        });
    }



    function disableLoginButton() {
        const loginButton = document.getElementById("print_vouch_acc_1");
        loginButton.disabled = true;
    }

    function enablePrintingButton() {
        const printButton = document.getElementById("print_vouch_acc_1");
        printButton.disabled = false;
    }
    //  =======================  كود فلترة رقم الحساب وتحديد الجروب وعرض الحسابات التحليلة ضمن كل جروب    ===================================================
    function get_group_id(e) {
        enablePrintingButton()
        var id = e.attr('id');
        id = id.replace("TRA_ACC_ID_", '');
        var grid = $('#TRA_ACC_ID_' + id).val();
        $.ajax({
            url: '../../Models/movement.php',
            method: 'post',
            data: 'grid=' + grid
        }).done(function(ACC_GRO_ID_1) {
            ACC_GRO_ID_1 = JSON.parse(ACC_GRO_ID_1);
            $('#ACC_GRO_ID_' + id).empty();
            ACC_GRO_ID_1.forEach(function(cus) {
                $('#ACC_GRO_ID_' + id).val(cus.ACC_GRO_ID);
                selectcust_acc(id);
            })
        });
    }





    function selectcust_acc(id) {
        var gcrid = $('#ACC_GRO_ID_' + id).val();
        $.ajax({
            url: '../../Models/movement.php',
            method: 'post',
            data: 'aid=' + gcrid
        }).done(function(TRA_CUS_ID_1) {
            TRA_CUS_ID_1 = JSON.parse(TRA_CUS_ID_1);
            $('#TRA_CUS_ID_' + id).empty();

            if (TRA_CUS_ID_1.length) {
                if (localStorage.getItem('line' + id) == id) {
                    TRA_CUS_ID_1.forEach(function(cus) {
                        let selectAccount = localStorage.getItem(id + cus.CUS_ID)
                        var s = 'test'
                        if ((selectAccount == cus.CUS_ID)) {
                            s = 'selected'
                        }
                        $('#TRA_CUS_ID_' + id).append('<option ' + s + ' value="' + cus.CUS_ID +
                            '">' + cus.CUS_NAME + '</option>')

                    })
                } else {
                    TRA_CUS_ID_1.forEach(function(cus) {
                        $('#TRA_CUS_ID_' + id).append('<option value="' + cus.CUS_ID + '">' +
                            cus.CUS_NAME + '</option>')
                    })
                }
            } else {

                $('#TRA_CUS_ID_' + id).append('<option>' + 0 + '</option>')

            }
        });
    }

    function selectAction(e) {
        const valueSelect = e.val();
        let id = e.attr('id');
        id = id.replace("TRA_CUS_ID_", '');
        localStorage.setItem('line' + id, id)
        localStorage.setItem(id + valueSelect, valueSelect)
    }


    function selectAction_exchange(e) {
        // const value_s_exchange = e.val();
        // alert('Your value is'+value_s_exchange)
        let id = e.attr('data-line');
        // alert('slect action exchange'+id)
        // id = id.replace("TRA_CUS_ID_", '');
        var curid = $('#TRA_CUR_ID_' + id).val();
        var curid_R = $('#exchange_rate_pric_' + id).val();
        $.ajax({
            type: "POST",
            url: "../../Controllers/CurrenciesController.php",
            data: {
                method: "get_CURID_MAX",
                curid: curid,
            },
            success: function(curidmax) {
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/CurrenciesController.php",
                    data: {
                        method: "get_CURID_MIN",
                        curid: curid,
                    },
                    success: function(curidmin) {
                        $.ajax({
                            type: "POST",
                            url: "../../Controllers/CurrenciesController.php",
                            data: {
                                method: "get_CURID_R",
                                curid: curid,
                            },
                            success: function(curidR) {
                                // alert(curid);
                                // alert(curid_R);
                                // alert(curidR); 
                                // alert(curidmax);
                                // alert(curidmin);
                                var TOTRMAX = parseInt(curidR) + parseInt(curidmax);
                                var TOTRMIN = curidR - curidmin;

                                // alert(TOTRMAX);
                                // alert(TOTRMIN); 
                                if (curid_R <= TOTRMAX && curid_R >= TOTRMIN) {
                                    calculateTotal_credit();
                                    calculateTotal();

                                } else {
                                    alert(" لقد تجاوزت الحد المسموح به يجب ان يكون سعر الصرف مابين " + (TOTRMAX + ' و ' + TOTRMIN));
                                    $('#exchange_rate_pric_' + id).val(curidR);
                                    calculateTotal_credit();
                                    calculateTotal();
                                }




                            }
                        });


                    }
                });

            }
        });





    }


    //  =======================  نهاية كود فلترة رقم الحساب وتحديد الجروب وعرض الحسابات التحليلة ضمن كل جروب    ===================================================
    $(document).ready(function() {
        //===========   طباعة جميع السندات  ===================================================
        //===========   استمارة صرف شيك     ====================================================
        //===========   سند قيد يومية=      ====================================================
        //===========   سند اضافة بنكية     ====================================================
        //===========   استمارة صرف نقدي    ====================================================

        $('.box-footer').on('click', '#print_data_cabd_naked', function() {
            var id = $(this).attr('voucher_id');
            var VOU_USE_name = $('#VOU_USE_name').val();
            var VOU_TYP_ID = $(this).attr('VOU_TYP_ID');
            var VOU_STATUS = $(this).attr('VOU_STATUS');
            var Branch_desc = $('#Branch_desc').val();

            // alert(id+'//'+VOU_USE_name+''+VOU_TYP_ID+'//'+VOU_STATUS+'//'+Branch_desc)


            if (VOU_TYP_ID == 111) {
                // alert("استمارة صرف نقدا");

                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_Saraf_cashing&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 112) {
                //  alert("استمارة صرف شيك");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_Check_cashing_frm&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            } else if (VOU_TYP_ID == 113) {
                // alert("سند صرف حوالة");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_sarf_hawlah&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 121) {
                // alert("سند قبض نقدي");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_cabd_naked&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 122) {
                // alert("استمارة قبض شيك");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_kabd_check&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });


            } else if (VOU_TYP_ID == 123) {
                // alert("سند قبض حوالة");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_cabd_hawlah&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });


            } else if (VOU_TYP_ID == 151) {
                //   alert("قيد تسوية");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_keid_days&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 272) {
                //  alert("سند أضافة بنكية");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_add_bank&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }
        });

        // طباعة جميع السندات من صفحة ال Page Main Trans Admin
        $('.box-footer').on('click', '#print_data_cabd_naked_VTA', function() {
            var id = $(this).attr('voucher_id');
            var VOU_USE_name = $(this).attr('VOU_USE_name');
            var VOU_TYP_ID = $(this).attr('VOU_TYP_ID');
            var VOU_STATUS = $(this).attr('VOU_STATUS');
            var Branch_desc = $(this).attr('Branch_desc');

            // alert(id+'//'+VOU_USE_name+''+VOU_TYP_ID+'//'+VOU_STATUS+'//'+Branch_desc)

            if (VOU_TYP_ID == 111) {
                // alert("استمارة صرف نقدا");

                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_Saraf_cashing&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 112) {
                //  alert("استمارة صرف شيك");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_Check_cashing_frm&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            } else if (VOU_TYP_ID == 113) {
                // alert("سند صرف حوالة");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_sarf_hawlah&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 121) {
                // alert("سند قبض نقدي");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_cabd_naked&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 122) {
                // alert("استمارة قبض شيك");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_kabd_check&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });


            } else if (VOU_TYP_ID == 123) {
                // alert("سند قبض حوالة");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_cabd_hawlah&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });


            } else if (VOU_TYP_ID == 151) {
                //   alert("قيد تسوية");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_keid_days&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });

            } else if (VOU_TYP_ID == 272) {
                //  alert("سند أضافة بنكية");
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/Report_Acc_StController.php",
                    data: "method=prt_doc_add_bank&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VOU_STATUS=" + VOU_STATUS + "&VOU_TYP_ID=" + VOU_TYP_ID + "&Branch_desc=" + Branch_desc + "",
                    success: function(result) {
                        // //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }


        });



    });


    //======================Report Mizan Account================
    $('#filter_data').click(function() {
        alert("cvcvcv");
        if ($('#frm_mznp').valid()) {
            var i_date1 = $('#i_date1').val(),
                i_date2 = $('#i_date2').val();
            var MIZAN_ACC_TYP = $('#MIZAN_ACC_TYP').val();
            var MIZAN_CUR = $('#MIZAN_CUR').val();

            // alert(MIZAN_ACC_TYP);

            // alert(i_date1 + "//" + i_date2);
            alert("MIZAN_ACC_TYP :" + MIZAN_ACC_TYP + "//" + i_date1 + "//" + i_date2 + "//" + VOU_USE_name);
            $.ajax({
                url: '../../Views/Admin/report_mizan_acc.php',
                method: 'POST',
                data: {
                    i_date1: i_date1,
                    i_date2: 'i_date2',
                    MIZAN_ACC_TYP: MIZAN_ACC_TYP,
                    MIZAN_CUR: MIZAN_CUR
                },
                success: function(result) {
                    alert(result);
                    window.open(result, "resizeable,scrollbar");
                }
            });
        }
    });

    //Securtiy 
    var SECBRAID = $('#SECBRAID').val();
    $("#SEC_BRA_ID").val(SECBRAID);
</script>