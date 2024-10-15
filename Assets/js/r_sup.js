
$(document).ready(function () {
    $.validator.setDefaults({
        //edit class for error message
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.form-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        //function enleve whene a error 
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success');
            //ajouter la class has-error pour le premier div de la class form-control pour l'element qui a l'erreur
            $(element).closest('.form-group').parent().addClass('has-error');

        },
        //function whene the error is corrected
        unhighlight: function (element) {
            //supprimer la class has-error
            $(element).closest('.form-group').removeClass('has-error');
            //ajouter la class has-success
            $(element).closest('.form-group').addClass('has-success');
        }
    });



    //================ طباعة التقرير اليومي بشكل مفصل لمورد واحد  =======================
    $('.box-footer').on('click', '#PrintdataVTSupU', function () {
        var id = $(this).attr('voucher_id');
        var VOU_USE_name = $(this).attr('VOU_USE_name');
        var VS_TYP_ID = $(this).attr('VS_TYP_ID');
        var VS_ST = $(this).attr('VS_ST');

        // alert(id+'//'+VOU_USE_name+''+VS_TYP_ID+'//'+VS_ST);

        if (VS_TYP_ID == 111) {
            // alert("تقرير المودرين");
            $.ajax({
                type: "POST",
                url: "../../Controllers/R_S.php",
                data: "methode=Prt_Supp_Frm&id=" + id + "&VOU_USE_name=" + VOU_USE_name + "&VS_ST=" + VS_ST + "&VS_TYP_ID=" + VS_TYP_ID + "",
                success: function (result) {
                    //alert(result);
                    window.open(result, "resizeable,scrollbar");
                }
            });

        }
    });

    //================== طباعة المستندات للقيد اليومي  للمورد  ==================================
    $('.box-footer').on('click', '#PrintdataVTCustU', function () {
        var VS_ID = $(this).attr('VS_ID');
        var VOU_USE_name = $(this).attr('VOU_USE_name');
        var VS_TYP_ID = $(this).attr('VS_TYP_ID');
        var VS_ST = $(this).attr('VS_ST');


        // alert(VS_ID + '//' + VOU_USE_name + '' + VS_TYP_ID + '//' + VS_ST);

        if (VS_TYP_ID == 111) {
            // alert("تقرير العملاء");
            $.ajax({
                type: "POST",
                url: "../../Controllers/R_C.php",
                data: "method=Prt_Cust_Frm&VS_ID=" + VS_ID + "&VOU_USE_name=" + VOU_USE_name + "&VS_TYP_ID=" + VS_TYP_ID + "&VS_ST=" + VS_ST + "",
                success: function (result) {
                    //alert(result);
                    window.open(result, "resizeable,scrollbar");
                }
            });

        }
    });




    // ===========  طباعة تقرير لليوم كامل لجميع المودرين حسب التأريخ
    $('#prnt_all_fvts').click(function () {
        // alert('prnt_all_fvts');
        if ($('#frm_vts_all').valid()) {
            var i_date1 = $('#i_date1').val();
            var i_date2 = $('#i_date2').val();
            var VOU_USE_name = $('#VOU_USE_name').val();
            var Branch_desc = $(this).attr('Branch_desc');
            // alert("Acc Level :" + i_date1 + "//" + i_date2 + "//" + VOU_USE_name);
            $.ajax({
                type: "POST",
                url: "../../Controllers/R_S.php",
                data: "methode=pnt_all_vts&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&Branch_desc=" + Branch_desc + "",
                success: function (result) {
                    // alert(result);
                    window.open(result, "resizeable,scrollbar");
                }
            });
        }
    });
    // =================  تقرير كامل حسب اسم المورد


    $('.modal-footer').on('click', '#print_data_supp', function () {
        $('#VS_BENF').val($(this).attr('SUPP_ID'));

        $('#i_date1').val($(this).attr('VS_DAT'));
        $('#i_date2').val($(this).attr('VS_DAT'));
    });


    $('#print_data_supp').click(function () {
        // alert('clicks is run')
        if ($('#form_print_supp').valid()) {
            var idsupp = $('#VS_BENF').val(),
                i_date1 = $('#i_date1').val(),
                i_date2 = $('#i_date2').val(),
                accp_stat_TYP = $('#accp_stat_TYP').val();

            var VOU_USE_name = $(this).attr('VOU_USE_name');
            var Branch_desc = $(this).attr('Branch_desc');


            // alert(idsupp + '//' + i_date1 + '//' + '//' + i_date2 + '//' + VOU_USE_name + '//' + Branch_desc);

            if (accp_stat_TYP == 1) {

                $.ajax({
                    type: "POST",
                    url: "../../Controllers/R_S.php",
                    data: "methode=get_id_supprcomp&idsupp=" + idsupp + "&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&Branch_desc=" + Branch_desc + "",
                    success: function (result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }
            else {

                $.ajax({
                    type: "POST",
                    url: "../../Controllers/R_S.php",
                    data: "methode=get_id_supprcompfinish&idsupp=" + idsupp + "&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&Branch_desc=" + Branch_desc + "",
                    success: function (result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }
        }
    });









});