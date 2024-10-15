
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

    //  ===============================================   Validation for Add page voucher trans (اضافة قيد جديد في النظام المحاسبي)  ===================================================
    $("#FVTS_S").validate({
        rules: {
            VS_ID: {
                required: true,
            },
            VS_TYP_ID: {
                required: true,
            },
            VS_BENF: {
                required: true,
            },
            VS_NT: {
                required: false,
            },
            'TS_DY[]': {
                required: true,
            },
            'TS_NUM[]': {
                required: true,
            },
            'TS_PRC[]': {
                required: true,
            },
            'TS_TOT[]': {
                required: true,
            },
            'TS_DISC[]': {
                required: true,
            },
            'TSTOTDISC[]': {
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
            VS_BENF: {
                required: "",
            },
            VS_NT: {
                required: false,
            },
            'TS_DY[]': {
                required: "",
            },
            'TS_NUM[]': {
                required: "",
            },
            'TS_PRC[]': {
                required: "",
            },
            'TS_TOT[]': {
                required: "",
            },
            'TS_DISC[]': {
                required: "",
            },
            'TSTOTDISC[]': {
                required: "",
            }
        },
    });

    // =================Add VT Sup
    $('#btn_valid_frm_Add_vts').click(function () {
        localStorage.clear()
        let TRA_ACC_ID_validForm, TRA_CUS_ID_validForm, TRA_CEN_ID_validForm,
            TRA_CUR_ID_validForm = $('#FVTS_S').valid();
        $("[name^='TS_DY']").each(function () {
            TRA_ACC_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_ACC_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TS_NUM']").each(function () {
            TRA_CUS_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUS_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TS_NUM']").each(function () {
            TRA_CEN_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CEN_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });
        $("[name^='TS_PRC']").each(function () {
            TRA_CUR_ID_validForm = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUR_ID_validForm) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm = false;
            }
        });

        TRA_ACC_ID_validForm = $('#FVTS_S').valid();
        if (TRA_ACC_ID_validForm && TRA_CUS_ID_validForm && TRA_CEN_ID_validForm && TRA_CUR_ID_validForm) {
            $('#modal_VTS').css("display", "block");
            document.getElementById('btn_add_VTS').addEventListener('submit')
            $.ajax({
                type: 'POST',
                success: function (result) {
                    //alert(result);
                    if (result == 'true') {
                        window.location.href = 'p_m_supp.php';
                        window.location.reload();
                    }
                }

            });
        }
    });


    //modal cancel Add
    $('#can_save_VTS_Add').on('click', function () {
        $('#modal_VTS').css("display", "none");

    });



    // =================Edit VT Sup
    $("#FVTS_S_Edit").validate({
        rules: {
            VS_ID: {
                required: true,
            },
            VS_TYP_ID: {
                required: true,
            },
            VS_BENF: {
                required: true,
            },
            VS_NT: {
                required: false,
            },
            'TS_DY[]': {
                required: true,
            },
            'TS_NUM[]': {
                required: true,
            },
            'TS_PRC[]': {
                required: true,
            },
            'TS_TOT[]': {
                required: true,
            },
            'TS_DISC[]': {
                required: true,
            },
            'TSTOTDISC[]': {
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
            VS_BENF: {
                required: "",
            },
            VS_NT: {
                required: false,
            },
            'TS_DY[]': {
                required: "",
            },
            'TS_NUM[]': {
                required: "",
            },
            'TS_PRC[]': {
                required: "",
            },
            'TS_TOT[]': {
                required: "",
            },
            'TS_DISC[]': {
                required: "",
            },
            'TSTOTDISC[]': {
                required: "",
            }
        },
    });

    // =================Edit sup VT
    $('#btn_valid_frm_Edit_vts').click(function () {
        localStorage.clear()
        let TRA_ACC_ID_validForm_e, TRA_CUS_ID_validForm_e, TRA_CEN_ID_validForm_e,
            TRA_CUR_ID_validForm_e = $('#FVTS_S_Edit').valid();
        $("[name^='TS_DY']").each(function () {
            TRA_ACC_ID_validForm_e = !($(this).val() == null || $(this).val() === '');
            if (!TRA_ACC_ID_validForm_e) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm_e = false;
            }
        });
        $("[name^='TS_NUM']").each(function () {
            TRA_CUS_ID_validForm_e = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUS_ID_validForm_e) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm_e = false;
            }
        });
        $("[name^='TS_NUM']").each(function () {
            TRA_CEN_ID_validForm_e = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CEN_ID_validForm_e) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm_e = false;
            }
        });
        $("[name^='TS_PRC']").each(function () {
            TRA_CUR_ID_validForm_e = !($(this).val() == null || $(this).val() === '');
            if (!TRA_CUR_ID_validForm_e) {
                $(this).addClass('has-error');
                TRA_ACC_ID_validForm_e = false;
            }
        });

        TRA_ACC_ID_validForm_e = $('#FVTS_S_Edit').valid();
        if (TRA_ACC_ID_validForm_e && TRA_CUS_ID_validForm_e && TRA_CEN_ID_validForm_e && TRA_CUR_ID_validForm_e) {
            $('#modal_VTS_edit').css("display", "block");
            document.getElementById('btn_edit_VTS').addEventListener('submit')
            $.ajax({
                type: 'POST',
                success: function (result) {
                    //alert(result);
                    if (result == 'true') {
                        window.location.href = 'p_m_supp.php';
                        window.location.reload();
                    }
                }

            });
        }
    });


    //modal cancel Add
    $('#can_save_VTS_Edit').on('click', function () {
        $('#modal_VTS_edit').css("display", "none");

    });
    //  ===============================================   Validation For VTS (End Code )  ===================================================



    // =========================         نهاية كود حذف سجل في الحركة قيد التسجيل    =============================================================
    // =========================     كود نقل السجل من مرحلة التسجيل الى مرحلة المراجعة   ============================================================ 
    $('.box-footer').on('click', '.trans_status_sup', function () {
        $('#id_tvs').val($(this).attr('id'));
        $('#TSTOTSALE').val($(this).attr('TSTOTSALE'));
        $('#TSMUS').val($(this).attr('TSMUS'));
        $('#modal_mov_vts').css("display", "block");
    });


    $('#btn_mov_tvsup').click(function () {
        var vts_id = $('#id_tvs').val();
        var TSTOTSALE = $('#TSTOTSALE').val();
        var TSMUS = $('#TSMUS').val();

        //    alert(vts_id);
        //    alert(TSTOTSALE);
        //    alert(TSMUS);



        $.ajax({
            url: "../../Controllers/SuppController.php",
            data: "methode=check_and_change&vts_id=" + vts_id + "",
            success: function (changevouid) {

                //  alert(changevouid);
                if (changevouid == 'true') {
                    // alert('المدين يساوي الدائن');
                    $.ajax({
                        url: "../../Controllers/SuppController.php",
                        data: "methode=trans_record&vts_id=" + vts_id + "",
                        success: function (result) {
                            // alert(result);
                            if (result == 'true') {
                                $('#modal_mov_vts').css("display", "none");
                                $('#modal_move_sup').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_move_sup').css("display", "none");
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
                    $('#modal_mov_vts').css("display", "none");
                }
            }
        });
    });



    $(document).on('click', '#cancel_mvts_status', function () {
        $('#modal_mov_vts').css("display", "none");
    });
    // =========================       نهاية كود نقل السجل من مرحلة التسجيل الى مرحلة المراجعة




    // =========================   كود اعتماد القيد   =============================================================

    $('.box-footer').on('click', '.VT_SUP_Agree', function () {
        $('#id_vts_stat_rev').val($(this).attr('id'));
        $('#modal_agree_status_rev').css("display", "block");

    });

    $('#btn_trans_stat_review').click(function () {
        var movidsupvt = $('#id_vts_stat_rev').val();
        // //alert("Review Id is :"+ movidsupvt);
        $.ajax({
            url: "../../Controllers/SuppController.php",
            data: "methode=review_rest_record&movidsupvt=" + movidsupvt + "",
            success: function (result) {
                // //alert(result);
                if (result == 'true') {
                    $('#modal_agree_status_rev').css("display", "none");
                    $('#modal_mov_finial').css("display", "block");
                    setTimeout(function () {
                        $('#modal_mov_finial').css("display", "none");
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


    $('#cancel_move_kied').on('click', function () {
        ////alert("edit");
        $('#modal_agree_status_rev').css("display", "none");

    });
    // =========================      نهاية كود اعتماد القيد    ===============================================
    // =========================   كود رفض القيد   =============================================================

    $('.box-footer').on('click', '.btn_trans_refused', function () {
        $('#id_vtsup_stat_ref').val($(this).attr('id'));
        $('#modal_return_stat_ref').css("display", "block");
    });

    $('#btn_trans_stat_review_ref').click(function () {
        var upd_ref_idvts = $('#id_vtsup_stat_ref').val();
        ////alert("Refused Id is :"+ upd_ref_idvts);
        $.ajax({
            url: "../../Controllers/SuppController.php",
            data: "methode=update_ref_review&upd_ref_idvts=" + upd_ref_idvts + "",
            success: function (result) {
                //  //alert(result);
                if (result == 'true') {
                    $('#modal_return_stat_ref').css("display", "none");
                    $('#refuse_mov_to_finial').css("display", "block");
                    setTimeout(function () {
                        $('#refuse_mov_to_finial').css("display", "none");
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


    $('#cancel_mod_stat_ref').on('click', function () {
        ////alert("edit");
        $('#modal_return_stat_ref').css("display", "none");

    });

    // =========================      نهاية كود رفض القيد    =============================================================



    $('.btn_supp_A_vt').click(function () {
        //alert('test')
        $.ajax({
            url: "../../Controllers/SuppController.php",
            data: "methode=get_id_S",
            success: function (res) {
                $('#SUPP_ID').val(res);
                //    alert(res);
            }
        });
        $('#modal_default_supp_vts').css("display", "block");

    });


    $('.btn_supp_A_vt').on('click', function () {
        // alert("edit");
        $('#modal_default_supp_vts').css("display", "block");
    });







    var f_A_S_vts = $("#f_A_S_vts").validate({
        rules: {
            SUPP_ID: {
                required: false
            },
            SUPP_NAME: {
                required: true
            },
            SUPP_PHONE: {
                required: true
            },
            SUPP_EMAIL: {
                required: false
            },
            SUPP_FREEZE: {
                required: false
            }
        },
        messages: {
            SUPP_ID: {
                required: ""
            },
            SUPP_NAME: {
                required: ""
            },
            SUPP_PHONE: {
                required: ""
            },
            SUPP_EMAIL: {
                required: ""
            },
            SUPP_FREEZE: {
                required: ""
            }
        }
    });


    $('#Btn_sys_SVTS').click(function () {
        // alert('insert Edit');
        //test if form is valid
        if ($('#f_A_S_vts').valid()) {
            //get value of each input for pass in the url ajax
            var pc0 = $('#SUPP_ID').val(),
                pc1 = $('#SUPP_NAME').val(),
                pc2 = $('#SUPP_PHONE').val(),
                pc3 = $('#SUPP_EMAIL').val(),
                pc4 = $('#SUPP_INS_USER').val(),
                pc5 = $('#SUPP_FREEZE').val();
            // alert(pc0+''+pc1+''+pc2+''+pc3+''+pc4+''+pc5);

            //ajax 
            $.ajax({
                type: "POST",
                url: "../../Controllers/SuppController.php",
                data: "methode=A_f_s&pc0=" + pc0 + "&pc1=" + pc1 + "&pc2=" + pc2 + "&pc3=" + pc3 + "&pc4=" + pc4 + "&pc5=" + pc5 + "",
                success: function (result) {
                    if (result == 'true') {
                        $("[id^='VS_BENF']").each(function () {

                            var id = $(this).attr('id');
                            id = id.replace("VS_BENF", '');
                            // alert(id)
                            $('#VS_BENF' + id).append("<option value='" + result.SUPP_ID + "'>" + pc1 + "</option>")
                            $('#VS_BENF' + id).trigger("chosen:updated");
                        });
                        $('#SUPP_NAME, #SUPP_PHONE , #SUPP_EMAIL').val('');


                        $('#modal_default_supp_vts').css("display", "none");
                        $('#modal_success_vts').css("display", "block");
                        setTimeout(function () {
                            $('#modal_success_vts').css("display", "none");
                            // location.reload();
                        }, 1000);
                    }
                }
            });

        }

    });


    $('#cancel_model_supp_vts').on('click', function () {
        $('#modal_default_supp_vts').css("display", "none");

    });


    //    =============== End Code To Add supp ================



    $('.btn_add_cust_vts').click(function () {
        // alert('test')
        $.ajax({
            url: "../../Controllers/CustController.php",
            data: "methode=get_id_Cus",
            success: function (res) {
                $('#CUST_ID').val(res);
                //    alert(res);
            }
        });
        $('#modal_default_cust_vts').css("display", "block");
    });


    $('.btn_add_cust_vts').on('click', function () {
        // alert("edit");
        $('#modal_default_cust_vts').css("display", "block");

    });







    var F_A_C_VT = $("#F_A_C_VT").validate({
        rules: {
            CUST_ID: {
                required: true
            },
            CUST_NAME: {
                required: true
            },
            CUST_PHONE: {
                required: true
            },
            CUST_EMAIL: {
                required: false
            },
            CUST_FREEZE: {
                required: false
            }
        },
        messages: {
            CUST_ID: {
                required: ""
            },
            CUST_NAME: {
                required: ""
            },
            CUST_PHONE: {
                required: ""
            },
            CUST_EMAIL: {
                required: ""
            },
            CUST_FREEZE: {
                required: ""
            }
        }
    });


    $('#btn_save_c_vts').click(function () {
        // alert('insert data in tb cus vt');
        //test if form is valid
        if ($('#F_A_C_VT').valid()) {
            //get value of each input for pass in the url ajax
            var pc0 = $('#CUST_ID').val(),
                pc1 = $('#CUST_NAME').val(),
                pc2 = $('#CUST_PHONE').val(),
                pc3 = $('#CUST_EMAIL').val(),
                pc4 = $('#CUST_INS_USER').val(),
                pc5 = $('#CUST_FREEZE').val();
            //    alert(CEN_ID+CEN_NAME+''+CEN_NAMEE+''+CEN_FREEZE);
            // alert(pc0 + '' + pc1 + '' + pc2 + '' + pc3 + '' + pc4 + '' + pc5);

            //ajax 
            $.ajax({
                type: "POST",
                url: "../../Controllers/CustController.php",
                data: "methode=add_contr_cust&pc0=" + pc0 + "&pc1=" + pc1 + "&pc2=" + pc2 + "&pc3=" + pc3 + "&pc4=" + pc4 + "&pc5=" + pc5 + "",
                success: function (result) {
                    // alert(result);
                    if (result == 'true') {
                        $("[id^='VS_CUSTID_']").each(function () {

                            var id = $(this).attr('id');
                            id = id.replace("VS_CUSTID_", '');
                            // alert(id)
                            $('#VS_CUSTID_' + id).append("<option value='" + result.CUST_ID + "'>" + pc1 + "</option>")
                            $('#VS_CUSTID_' + id).trigger("chosen:updated");
                        });
                        $('#CUST_NAME, #CUST_PHONE, #CUST_EMAIL').val('');

                        $('#modal_default_cust_vts').css("display", "none");
                        $('#modal_success_vtc').css("display", "block");
                        setTimeout(function () {
                            $('#modal_success_vtc').css("display", "none");
                            // location.reload();
                        }, 1000);
                        if (result == 'true') {
                            $.ajax({
                                url: "../../Controllers/LoginController.php",
                                data: "methode=view",
                                success: function (result) {
                                    // // //////alert(result);




                                }

                            });

                        }


                    }
                }
            });

        }

    });


    $('#canl_mod_c_vts').on('click', function () {
        ////alert("edit");
        $('#modal_default_cust_vts').css("display", "none");

    });



    //   ========================  call modal from js for add cust
    function inset_cust() {
        $(document).delegate('.btn_add_cust_vts', 'click', function () {

            //alert('test')
            $.ajax({
                url: "../../Controllers/CustController.php",
                data: "methode=get_id_Cus",
                success: function (res) {
                    $('#CUST_ID').val(res);
                    //    alert(res);
                }
            });
            $('#modal_default_cust_vts').css("display", "block");

        });
    }

    $(document).ready(function () {
        // Delete record via ajax
        inset_cust();
    });



});