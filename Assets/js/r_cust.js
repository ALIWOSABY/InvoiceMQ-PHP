
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



    // =================  تقرير كامل حسب اسم المورد
    $('.modal-footer').on('click', '#print_data_cust', function () {
        $('#VC_CUSTID').val($(this).attr('VC_CUSTID'));

        $('#i_date1').val($(this).attr('TC_DAT'));
        $('#i_date2').val($(this).attr('TC_DAT'));
    });


    $('#print_data_cust').click(function () {
        // alert('clicks is run')
        if ($('#form_print_cust').valid()) {
            var idcust = $('#VC_CUSTID').val(),
                i_date1 = $('#i_date1').val(),
                i_date2 = $('#i_date2').val(),
                accp_stat_TYP = $('#accp_stat_TYP').val();

            var VOU_USE_name = $(this).attr('VOU_USE_name');
            var Branch_desc = $(this).attr('Branch_desc');


            // alert(idcust + '//' + i_date1 + '//' + '//' + i_date2 + '//' + VOU_USE_name + '//' + Branch_desc);

            if (accp_stat_TYP == 1) {

                $.ajax({
                    type: "POST",
                    url: "../../Controllers/R_C.php",
                    data: "methode=get_id_custcomp&idcust=" + idcust + "&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&Branch_desc=" + Branch_desc + "",
                    success: function (result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }
            else {

                $.ajax({
                    type: "POST",
                    url: "../../Controllers/R_C.php",
                    data: "methode=get_id_supprcompfinish&idcust=" + idcust + "&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&Branch_desc=" + Branch_desc + "",
                    success: function (result) {
                        //alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }
        }
    });




        //  ===============================================   توصيل مبلغ جديد للمورد  ===================================================
        $("#FVTC_DLIVD").validate({
            rules: {
                AMNTS_ID_cust: {
                    required: true,
                },
                AMNTS_DAT_cust: {
                    required: true,
                },
                VC_CUSTID_cust: {
                    required: true,
                },
                DLIVAMNT_cust: {
                    required: true,
                }
    
            },
            messages: {
                AMNTS_ID_cust: {
                    required: "",
                },
                AMNTS_DAT_cust: {
                    required: "",
                },
                VC_CUSTID_cust: {
                    required: "",
                },
                DLIVAMNT_cust: {
                    required: "",
                }
            },
        });
    
    
    
        $('#btn_valid_frm_Add_vtcdlivd').click(function () {
            // alert('insert amount');
            //test if form is valid
            if ($('#FVTC_DLIVD').valid()) {
                //get value of each input for pass in the url ajax
                var AMNTS_ID_cust = $('#AMNTS_ID_cust').val(),
                    AMNTS_V_ID_cust = $('#AMNTS_V_ID_cust').val(),
                    AMNTS_DAT_cust = $('#AMNTS_DAT_cust').val(),
                    VOU_USE_ID = $('#VOU_USE_ID').val(),
                    VC_CUSTID_cust = $('#VC_CUSTID_cust').val(),
                    TSTOTSALE_cust = $('#TSTOTSALE_cust').val(),
                    TSMUS_cust = $('#TSMUS_cust').val(),
                    TSHISREMD_cust = $('#TSHISREMD_cust').val(),
                    TSONREMD_cust = $('#TSONREMD_cust').val(),
                    DLIVAMNT_cust = $('#DLIVAMNT_cust').val();
                // alert(DLIVAMNT_cust + '/////' + AMNTS_V_ID_cust);
                // alert(AMNTS_ID_cust+'//'+AMNTS_DAT_cust + '//' + VOU_USE_ID + '//' + VC_CUSTID_cust + '//' + TSTOTSALE_cust + '//' + TSMUS_cust + '//' + TSHISREMD_cust + '//' + TSONREMD_cust + '///' + DLIVAMNT_cust);
    
                //ajax 
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/CustController.php",
                    data: "methode=add_mtd_dlivdcust&AMNTS_ID_cust=" + AMNTS_ID_cust + "&AMNTS_V_ID_cust=" + AMNTS_V_ID_cust + "&AMNTS_DAT_cust=" + AMNTS_DAT_cust + "&VOU_USE_ID=" + VOU_USE_ID + "&VC_CUSTID_cust=" + VC_CUSTID_cust + "&TSTOTSALE_cust=" + TSTOTSALE_cust + "&TSMUS_cust=" + TSMUS_cust + "&TSHISREMD_cust=" + TSHISREMD_cust + "&TSONREMD_cust=" + TSONREMD_cust + "&DLIVAMNT_cust=" + DLIVAMNT_cust + "",
                    success: function (result) {
                        // alert(result)
                        if (result == 'true') {
                            $('#modal_VTC_DELIVD').css("display", "none");
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
        $('#can_save_VTCDLIVD_Add').on('click', function () {
            $('#modal_VTC_DELIVD').css("display", "none");
    
        });






});