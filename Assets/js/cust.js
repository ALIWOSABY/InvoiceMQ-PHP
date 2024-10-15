
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


    //get all VT cust stat = 0
    $.ajax({
        url: "../../Controllers/CustController.php",
        data: "methode=get_count_vtc",
        success: function (result) {
            if (result == 'true') {
                window.location.reload();
            }
        }
    });


    //get all VT cust stat = 1
    $.ajax({
        url: "../../Controllers/CustController.php",
        data: "methode=get_count_vtcone",
        success: function (result) {
            if (result == 'true') {
                window.location.reload();
            }
        }

    });


    //get all VT cust stat = 2
    $.ajax({
        url: "../../Controllers/CustController.php",
        data: "methode=get_count_vtctwo",
        success: function (result) {
            if (result == 'true') {
                window.location.reload();
            }
        }
    });



    setInterval(function () {
        // //alert("me");
        $.ajax({
            url: "../../Controllers/CustController.php",
            data: "methode=V_all_C",
            success: function (result) {
                if (result == 'true') {
                    location.reload();
                }
            }

        });
    }, 5000);



    $('.btn_add_cust').click(function () {
        // alert('test')
        $.ajax({
            url: "../../Controllers/CustController.php",
            data: "methode=get_id_Cus",
            success: function (res) {
                $('#CUST_ID').val(res);
                //    alert(res);
            }
        });
        $('#modal_default_cust').css("display", "block");
    });


    $('.btn_add_cust').on('click', function () {
        // alert("edit");
        $('#modal_default_cust').css("display", "block");

    });







    var F_A_C = $("#F_A_C").validate({
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


    $('#btn_save_c').click(function () {
      //  alert('insert data in tb customer');
        //test if form is valid
        if ($('#F_A_C').valid()) {
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
                        $('#modal_default_cust').css("display", "none");
                        $('#modal_success').css("display", "block");
                        setTimeout(function () {
                            $('#modal_success').css("display", "none");
                            location.reload();
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


    $('#canl_mod_c').on('click', function () {
        ////alert("edit");
        $('#modal_default_cust').css("display", "none");

    });


    var F_E_C = $("#F_E_C").validate({
        rules: {
            CUST_NAME_edit: {
                required: true
            },
            CUST_PHONE_edit: {
                required: false
            },
            CUST_EMAIL_edit: {
                required: false
            },
            CUST_FREEZE_edit: {
                required: false
            }
        },
        messages: {
            CUST_NAME_edit: {
                required: ""
            },
            CUST_PHONE_edit: {
                required: ""
            },
            CUST_EMAIL_edit: {
                required: false
            },
            CUST_FREEZE_edit: {
                required: ""
            }
        }
    });


    $('.box-footer').on('click', '#edt_btn_c', function () {
        $('#CUST_ID_edit').val($(this).attr('CUST_ID'));
        $('#CUST_NAME_edit').val($(this).attr('CUST_NAME'));
        $('#CUST_PHONE_edit').val($(this).attr('CUST_PHONE'));
        $('#CUST_EMAIL_edit').val($(this).attr('CUST_EMAIL'));
        $('#CUST_FREEZE_edit').val($(this).attr('CUST_FREEZE'));


        $('#modal_edit_c').css("display", "block");
    });



    $('#btn_valide_edit_c').click(function () {
        // alert('Edit Customer');
        //test if form is valid
        if ($('#F_E_C').valid()) {
            //get value of each input for pass in the url ajax
            var pc1 = $('#CUST_NAME_edit').val(),
                pc2 = $('#CUST_PHONE_edit').val(),
                pc3 = $('#CUST_EMAIL_edit').val(),
                pc4 = $('#CUST_UPD_USER').val(),
                pc6 = $('#CUST_FREEZE_edit').val(),
                pc0 = $('#CUST_ID_edit').val();

            ////alert(CEN_NAME+''+CEN_NAMEE+''+CEN_FREEZE+''+CEN_ID);
            // alert(pc0+''+pc1+''+pc2+''+pc3+''+pc4+''+pc5);


            //ajax 
            $.ajax({
                type: "POST",
                url: "../../Controllers/CustController.php",
                data: "methode=Edit_cust&pc0=" + pc0 + "&pc1=" + pc1 + "&pc2=" + pc2 + "&pc3=" + pc3 + "&pc4=" + pc4 + "&pc6=" + pc6 + "",
                success: function (result) {
                    // alert(result);
                    if (result == 'true') {
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                $('#modal_edit_c').css("display", "none");
                                $('#modal_edit_cust').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_edit_cust').css("display", "none");
                                    location.reload();
                                }, 1000);



                            }

                        });

                    }


                }
            });

        }

    });

    $('#edit_cust_cancel').on('click', function () {
        ////alert("edit");
        $('#modal_edit_c').css("display", "none");

    });


});