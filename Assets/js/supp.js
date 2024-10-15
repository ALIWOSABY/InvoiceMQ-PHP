
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


    //get all VT supp stat = 0
    $.ajax({
        url: "../../Controllers/SuppController.php",
        data: "methode=get_count_vts",
        success: function (result) {
            if (result == 'true') {
                window.location.reload();
            }
        }

    });


    //get all VT supp stat = 1
    $.ajax({
        url: "../../Controllers/SuppController.php",
        data: "methode=get_count_vtsone",
        success: function (result) {
            if (result == 'true') {
                window.location.reload();
            }
        }

    });

    //get all VT supp stat = 2
    $.ajax({
        url: "../../Controllers/SuppController.php",
        data: "methode=get_count_vtstwo",
        success: function (result) {
            if (result == 'true') {
                window.location.reload();
            }
        }

    });


    $.ajax({
        url: "../../Controllers/SuppController.php",
        data: "methode=view_days",
        success: function (result) {
            if (result == 'true') {
                window.location.reload();
            }
        }
    });


    setInterval(function () {
        // alert("me me");
        $.ajax({
            url: "../../Controllers/SuppController.php",
            data: "methode=view_all_Supp",
            success: function (result) {
                // alert(result);
                if (result == 'true') {
                    location.reload();
                }
            }

        });
    }, 5000);






    $('.btn_supp_A').click(function () {
        //alert('test')
        $.ajax({
            url: "../../Controllers/SuppController.php",
            data: "methode=get_id_S",
            success: function (res) {
                $('#SUPP_ID').val(res);
                //    alert(res);
            }
        });
        $('#modal_default_supp').css("display", "block");

    });


    $('.btn_supp_A').on('click', function () {
        // alert("edit");
        $('#modal_default_supp').css("display", "block");

    });







    var f_A_S = $("#f_A_S").validate({
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


    $('#Btn_sys_S').click(function () {
        // alert('insert Edit');
        //test if form is valid
        if ($('#f_A_S').valid()) {
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
                    // alert(result)
                    if (result == 'true') {
                        $('#modal_default_supp').css("display", "none");
                        $('#modal_success').css("display", "block");
                        setTimeout(function () {
                            $('#modal_success').css("display", "none");
                            location.reload();
                        }, 1000);
                        // if (result == 'true') {
                        //     $.ajax({
                        //         url: "../../Controllers/LoginController.php",
                        //         data: "methode=view",
                        //         success: function (result) {
                        //             alert(result);




                        //         }

                        //     });

                        // }


                    }
                }
            });

        }

    });


    $('#cancel_model_supp').on('click', function () {
        $('#modal_default_supp').css("display", "none");

    });


    var F_E_S = $("#F_E_S").validate({
        rules: {
            SUPP_NAME_edit: {
                required: true
            },
            SUPP_PHONE_edit: {
                required: false
            },
            SUPP_EMAIL_edit: {
                required: false
            },
            SUPP_FREEZE_edit: {
                required: false
            }
        },
        messages: {
            SUPP_NAME_edit: {
                required: ""
            },
            SUPP_PHONE_edit: {
                required: ""
            },
            SUPP_EMAIL_edit: {
                required: false
            },
            SUPP_FREEZE_edit: {
                required: ""
            }
        }
    });


    $('.box-footer').on('click', '#edt_btn_Sup', function () {
        $('#SUPP_ID_edit').val($(this).attr('SUPP_ID'));
        $('#SUPP_NAME_edit').val($(this).attr('SUPP_NAME'));
        $('#SUPP_PHONE_edit').val($(this).attr('SUPP_PHONE'));
        $('#SUPP_EMAIL_edit').val($(this).attr('SUPP_EMAIL'));
        $('#SUPP_UPD_USER').val($(this).attr('SUPP_UPD_USER'));
        $('#SUPP_FREEZE_edit').val($(this).attr('SUPP_FREEZE'));
        $('#modal_edit_supp').css("display", "block");
    });



    $('#btn_Valid_ed_cust').click(function () {
        // alert('Edit Suppliers');
        //test if form is valid
        if ($('#F_E_S').valid()) {
            //get value of each input for pass in the url ajax
            var pc1 = $('#SUPP_NAME_edit').val(),
                pc2 = $('#SUPP_PHONE_edit').val(),
                pc3 = $('#SUPP_EMAIL_edit').val(),
                pc4 = $('#SUPP_UPD_USER').val(),
                pc6 = $('#SUPP_FREEZE_edit').val(),
                pc0 = $('#SUPP_ID_edit').val();
            // alert(pc0 + '' + pc1 + '' + pc2 + '' + pc3 + '' + pc4 + '' + pc6);

            ////alert(CEN_NAME+''+CEN_NAMEE+''+CEN_FREEZE+''+CEN_ID);



            //ajax 
            $.ajax({
                type: "POST",
                url: "../../Controllers/SuppController.php",
                data: "methode=Edit_Supp&pc0=" + pc0 + "&pc1=" + pc1 + "&pc2=" + pc2 + "&pc3=" + pc3 + "&pc4=" + pc4 + "&pc6=" + pc6 + "",
                success: function (result) {
                    // alert(result);
                    if (result == 'true') {
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                $('#modal_edit_supp').css("display", "none");
                                $('#mod_editsup').css("display", "block");
                                setTimeout(function () {
                                    $('#mod_editsup').css("display", "none");
                                    location.reload();
                                }, 1000);
                            }

                        });

                    }
                }
            });
        }

    });

    $('#edit_Sup_cancel').on('click', function () {
        ////alert("edit");
        $('#modal_edit_supp').css("display", "none");

    });


    //  ===============================================   توصيل مبلغ جديد للمورد  ===================================================
    $("#FVTS_DLIVD").validate({
        rules: {
            AMNTS_ID: {
                required: true,
            },
            AMNTS_DAT: {
                required: true,
            },
            AMTS_BENF: {
                required: true,
            },
            DLIVAMNT: {
                required: true,
            }

        },
        messages: {
            AMNTS_ID: {
                required: "",
            },
            AMNTS_DAT: {
                required: "",
            },
            AMTS_BENF: {
                required: "",
            },
            DLIVAMNT: {
                required: "",
            }
        },
    });



    $('#btn_valid_frm_Add_vtsdlivd').click(function () {
        // alert('insert amount');
        //test if form is valid
        if ($('#FVTS_DLIVD').valid()) {
            //get value of each input for pass in the url ajax
            var AMNTS_ID = $('#AMNTS_ID').val(),
                AMNTS_V_ID = $('#AMNTS_V_ID').val(),
                AMNTS_DAT = $('#AMNTS_DAT').val(),
                VOU_USE_ID = $('#VOU_USE_ID').val(),
                AMTS_BENF = $('#AMTS_BENF').val(),
                TSTOTSALE = $('#TSTOTSALE').val(),
                TSMUS = $('#TSMUS').val(),
                TSHISREMD = $('#TSHISREMD').val(),
                TSONREMD = $('#TSONREMD').val(),
                DLIVAMNT = $('#DLIVAMNT').val();
            // alert(DLIVAMNT + '/////' + AMNTS_V_ID);
            // alert(AMNTS_ID+'//'+AMNTS_DAT + '//' + VOU_USE_ID + '//' + AMTS_BENF + '//' + TSTOTSALE + '//' + TSMUS + '//' + TSHISREMD + '//' + TSONREMD + '///' + DLIVAMNT);

            //ajax 
            $.ajax({
                type: "POST",
                url: "../../Controllers/SuppController.php",
                data: "methode=add_mtd_dlivd&AMNTS_ID=" + AMNTS_ID + "&AMNTS_V_ID=" + AMNTS_V_ID + "&AMNTS_DAT=" + AMNTS_DAT + "&VOU_USE_ID=" + VOU_USE_ID + "&AMTS_BENF=" + AMTS_BENF + "&TSTOTSALE=" + TSTOTSALE + "&TSMUS=" + TSMUS + "&TSHISREMD=" + TSHISREMD + "&TSONREMD=" + TSONREMD + "&DLIVAMNT=" + DLIVAMNT + "",
                success: function (result) {
                    // alert(result)
                    if (result == 'true') {
                        $('#modal_VTS_DELIVD').css("display", "none");
                        $('#modal_success_amnt').css("display", "block");
                        setTimeout(function () {
                            $('#modal_success_amnt').css("display", "none");
                            location.reload();
                        }, 1000);
                        if (result == 'true') {
                            $.ajax({
                                url: "../../Controllers/LoginController.php",
                                data: "methode=view",
                                success: function (result) {
                                    // alert(result);
                                }
                            });
                        }
                    }
                }
            });

        }

    });




    //modal cancel Add
    $('#can_save_VTSDLIVD_Add').on('click', function () {
        $('#modal_VTS_DELIVD').css("display", "none");

    });



});