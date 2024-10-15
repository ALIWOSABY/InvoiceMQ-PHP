
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


    //  ===============================================   Validation for Add page voucher trans (اضافة قيد جديد للعميل)  ===================================================
    $("#FVTC_Add").validate({
        rules: {
            VS_ID: {
                required: true,
            },
            VS_TYP_ID: {
                required: true,
            },
            VC_CUSTID: {
                required: true,
            },
            VS_NT: {
                required: false,
            },
            'TC_DY[]': {
                required: true,
            },
            'TCNUM[]': {
                required: true,
            },
            'TC_PRC[]': {
                required: true,
            },
            'TC_TOT[]': {
                required: true,
            },
            'TCTOTDISC[]': {
                required: true,
            },
            'TCPST[]': {
                required: true,
            }
        },
        messages: {
            VS_ID: {
                required: "",
            },
            VS_TYP_ID: {
                required: "",
            },
            VC_CUSTID: {
                required: "",
            },
            VS_NT: {
                required: false,
            },
            'TC_DY[]': {
                required: "",
            },
            'TCNUM[]': {
                required: "",
            },
            'TC_PRC[]': {
                required: "",
            },
            'TC_TOT[]': {
                required: "",
            },
            'TCTOTDISC[]': {
                required: "",
            },
            'TCPST[]': {
                required: "",
            }
        },
    });

    // =================Add VT
    $('#btn_valid_FTVC_Add').click(function () {
        localStorage.clear()
        let TRA_ACC_ID_validForm, TRA_CUS_ID_validForm, TRA_CEN_ID_validForm,
            TRA_CUR_ID_validForm = $('#FVTC_Add').valid();
        $("[name^='TC_DY']").each(function () {
            TRA_ACC_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_ACC_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TCNUM']").each(function () {
            TRA_CUS_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUS_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TC_PRC']").each(function () {
            TRA_CEN_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CEN_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TCPST']").each(function () {
            TRA_CUR_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUR_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });

        TRA_ACC_ID_validForm = $('#FVTC_Add').valid();
        if (TRA_ACC_ID_validForm && TRA_CUS_ID_validForm && TRA_CEN_ID_validForm && TRA_CUR_ID_validForm) {
            $('#modal_VTC_F_Add').css("display", "block");
            document.getElementById('btn_add_VTC').addEventListener('submit')
            $.ajax({
                type: 'POST',
                success: function (result) {
                    // alert(result);
                    if (result == 'true') {
                        window.location.href = 'p_m_cust';
                        window.location.reload();
                    }
                }

            });
        }
    });


    //modal cancel Add
    $('#can_save_VTC_Add').on('click', function () {
        $('#modal_VTC_F_Add').css("display", "none");
    });



    // =================Edit VT Sup
    $("#FVTC_Edit").validate({
        rules: {
            VS_ID: {
                required: true,
            },
            VS_TYP_ID: {
                required: true,
            },
            VC_CUSTID: {
                required: true,
            },
            VS_NT: {
                required: false,
            },
            'TC_DY[]': {
                required: true,
            },
            'TCNUM[]': {
                required: true,
            },
            'TC_PRC[]': {
                required: true,
            },
            'TC_TOT[]': {
                required: true,
            },
            'TCTOTDISC[]': {
                required: true,
            },
            'TCPST[]': {
                required: true,
            }
        },
        messages: {
            VS_ID: {
                required: "",
            },
            VS_TYP_ID: {
                required: "",
            },
            VC_CUSTID: {
                required: "",
            },
            VS_NT: {
                required: false,
            },
            'TC_DY[]': {
                required: "",
            },
            'TCNUM[]': {
                required: "",
            },
            'TC_PRC[]': {
                required: "",
            },
            'TC_TOT[]': {
                required: "",
            },
            'TCTOTDISC[]': {
                required: "",
            },
            'TCPST[]': {
                required: "",
            }
        },
    });

    // =================Add VT
    $('#btn_valid_FTVC_Edit').click(function () {
        localStorage.clear()
        let TRA_ACC_ID_validForm, TRA_CUS_ID_validForm, TRA_CEN_ID_validForm,
            TRA_CUR_ID_validForm = $('#FVTC_Edit').valid();
        $("[name^='TC_DY']").each(function () {
            TRA_ACC_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_ACC_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TCNUM']").each(function () {
            TRA_CUS_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUS_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TC_PRC']").each(function () {
            TRA_CEN_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CEN_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TCPST']").each(function () {
            TRA_CUR_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUR_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });

        TRA_ACC_ID_validForm = $('#FVTC_Edit').valid();
        if (TRA_ACC_ID_validForm && TRA_CUS_ID_validForm && TRA_CEN_ID_validForm && TRA_CUR_ID_validForm) {
            $('#modal_VTC_F_Edit').css("display", "block");
            document.getElementById('btn_Edit_VTC').addEventListener('submit')
            $.ajax({
                type: 'POST',
                success: function (result) {
                    // alert(result);
                    if (result == 'true') {
                        window.location.href = 'p_m_cust';
                        window.location.reload();
                    }
                }

            });
        }
    });


    // modal cancel Add
    $('#can_save_VTC_Edit').on('click', function () {
        $('#modal_VTC_F_Edit').css("display", "none");

    });

    //  ===============================================   Validation For VTS (End Code )  ===================================================



    // =========================     كود نقل السجل من مرحلة التسجيل الى مرحلة المراجعة   ============================================================ 
    $('.box-footer').on('click', '.trans_status_cust', function () {
        $('#id_tvc').val($(this).attr('id'));
        $('#TCTOTSALE').val($(this).attr('TCTOTSALE'));
        $('#TCMUS').val($(this).attr('TCMUS'));
        $('#modal_mov_vtc').css("display", "block");
    });


    $('#btn_mov_tvcust').click(function () {
        var vtc_id = $('#id_tvc').val();
        var TCTOTSALE = $('#TCTOTSALE').val();
        var TCMUS = $('#TCMUS').val();

        // alert(vtc_id);
        // alert(TCTOTSALE);
        // alert(TCMUS);



        $.ajax({
            url: "../../Controllers/CustController.php",
            data: "methode=check_and_changecust&vtc_id=" + vtc_id + "",
            success: function (changevousupid) {

                //  alert(changevousupid);
                if (changevousupid == 'true') {
                    // alert('المدين يساوي الدائن');
                    $.ajax({
                        url: "../../Controllers/CustController.php",
                        data: "methode=trans_recordcust&vtc_id=" + vtc_id + "",
                        success: function (result) {
                            // alert(result);
                            if (result == 'true') {
                                $('#modal_mov_vtc').css("display", "none");
                                $('#modal_move_cust').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_move_cust').css("display", "none");
                                    window.location.reload();
                                }, 1000);
                                $.ajax({
                                    url: "../../Controllers/LoginController.php",
                                    data: "methode=view",
                                    success: function (result) {
                                        // //////alert(result);
                                        window.location.reload();
                                    }
                                });

                            }
                        }
                    });

                }
                else {
                    alert('الصافي لا يساوي المسلم');
                    $('#modal_mov_vtc').css("display", "none");
                }
            }
        });
    });



    $(document).on('click', '#cancel_mvtc_status', function () {
        $('#modal_mov_vtc').css("display", "none");
    });
    // =========================       نهاية كود نقل السجل من مرحلة التسجيل الى مرحلة المراجعة




    // =========================   كود اعتماد القيد   =============================================================

    $('.box-footer').on('click', '.VT_CUS_Agree', function () {
        $('#id_vtc_stat_rev').val($(this).attr('id'));
        $('#modal_agrcus_status_rev').css("display", "block");

    });

    $('#btn_vtc_stat_review').click(function () {
        var movidcusvt = $('#id_vtc_stat_rev').val();
        // //alert("Review Id is :"+ movidcusvt);
        $.ajax({
            url: "../../Controllers/CustController.php",
            data: "methode=review_cust_record&movidcusvt=" + movidcusvt + "",
            success: function (result) {
                // //alert(result);
                if (result == 'true') {
                    $('#modal_agrcus_status_rev').css("display", "none");
                    $('#modal_mov_fincus').css("display", "block");
                    setTimeout(function () {
                        $('#modal_mov_fincus').css("display", "none");
                        window.location.reload();
                    }, 1000);

                    $.ajax({
                        url: "../../Controllers/LoginController.php",
                        data: "methode=view",
                        success: function (result) {
                            // //alert(result);
                            window.location.reload();
                        }
                    });

                }
            }
        });
    });


    $('#cancel_move_cust').on('click', function () {
        ////alert("edit");
        $('#modal_agrcus_status_rev').css("display", "none");

    });
    // =========================      نهاية كود اعتماد القيد    ===============================================


    // =========================   كود رفض القيد   =============================================================

    $('.box-footer').on('click', '.btn_vtc_refused', function () {
        $('#id_vtcus_stat_ref').val($(this).attr('id'));
        $('#mod_retcus_stat_ref').css("display", "block");
    });

    $('#btn_vtc_stat_review_ref').click(function () {
        var upd_ref_idvtc = $('#id_vtcus_stat_ref').val();
        ////alert("Refused Id is :"+ upd_ref_idvtc);
        $.ajax({
            url: "../../Controllers/CustController.php",
            data: "methode=updcust_ref_review&upd_ref_idvtc=" + upd_ref_idvtc + "",
            success: function (result) {
                //  //alert(result);
                if (result == 'true') {
                    $('#mod_retcus_stat_ref').css("display", "none");
                    $('#refuse_mov_to_fincus').css("display", "block");
                    setTimeout(function () {
                        $('#refuse_mov_to_fincus').css("display", "none");
                        window.location.reload();
                    }, 1000);

                    $.ajax({
                        url: "../../Controllers/LoginController.php",
                        data: "methode=view",
                        success: function (result) {
                            // //alert(result);
                            window.location.reload();
                        }
                    });

                }
            }
        });
    });


    $('#cancus_mod_stat_ref').on('click', function () {
        ////alert("edit");
        $('#mod_retcus_stat_ref').css("display", "none");

    });

    // =========================      نهاية كود رفض القيد    =============================================================





});