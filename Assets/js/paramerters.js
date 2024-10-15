
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


    $.ajax({
        url: "../../Controllers/paramerterController.php",
        data: "methode=view_all_paramerter",
        success: function (result) {
            // // ////alert(result);
            if (result == 'true') {
                window.location.reload();
            }
        }

    });



    var form_pram = $("#form_pram").validate({
        rules: {
            par_id: {
                required: false
            },
            par_name: {
                required: true
            },
            par_namee: {
                required: true
            },
            Par_phone: {
                required: true
            },
            Par_website: {
                required: true
            },
            Par_Addr1: {
                required: true
            },
            Par_Addr2: {
                required: false
            },
            Par_Addr3: {
                required: false
            },
            Par_whatsapp: {
                required: false
            },
            Par_logo: {
                required: false
            }

        },
        messages: {
            par_id: {
                required:""
            },
            par_name: {
                required:""
            },
            par_namee: {
                required:""
            },
            Par_phone: {
                required:""
            },
            Par_website: {
                required:""
            },
            Par_Addr1: {
                required:""
            },
            Par_Addr2: {
                required:""
            },
            Par_Addr3: {
                required:""
            },
            Par_whatsapp: {
                required:""
            },
            Par_logo: {
                required:""
            }
        }
    });


    $('#btn_save_pram').click(function () {
      //  alert('Three');
        //test if form is valid
        if ($('#form_pram').valid()) {
            //get value of each input for pass in the url ajax
            // var par_id = $('#par_id').val(),
            par_name = $('#par_name').val();
            par_namee = $('#par_namee').val();

            Par_phone = $('#Par_phone').val();
            Par_website = $('#Par_website').val();

            Par_Addr1 = $('#Par_Addr1').val();
            Par_Addr2 = $('#Par_Addr2').val();
            Par_Addr3 = $('#Par_Addr3').val();

            Par_whatsapp = $('#Par_whatsapp').val();
            Par_logo = $('#Par_logo').val();

       alert(par_id+par_name+par_namee+Par_phone+Par_website+Par_Addr1+Par_Addr2+Par_Addr3+Par_whatsapp+"logo is:"+Par_logo);

            //ajax 
            $.ajax({
                url: "../../Controllers/paramerterController.php",
                data: "methode=btn_save_pram&par_name=" + par_name + "&par_namee=" + par_namee + "&Par_phone=" + Par_phone + "&Par_website=" + Par_website + "&Par_Addr1=" + Par_Addr1 + "&Par_Addr2=" + Par_Addr2 + "&Par_Addr3=" + Par_Addr3 + "&Par_whatsapp=" + Par_whatsapp + "&Par_logo=" + Par_logo +"",
                success: function (result) {

             //   alert(result);
                    if (result == 'true') {
                        window.location.reload();
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                //alert(result);
                                window.location.reload();



                            }

                        });

                    }


                }
            });

        }

    });



  //Edit Form 

    var form_edit_pram = $("#form_edit_pram").validate({
        rules: {
            par_id_e: {
                required: true
            },
            par_name_e: {
                required: true
            },
            par_namee_e: {
                required: true
            },
            Par_phone_e: {
                required: true
            },
            Par_website_e: {
                required: true
            },
            Par_Addr1_e: {
                required: true
            },
            Par_Addr2_e: {
                required: false
            },
            Par_Addr3_e: {
                required: false
            },
            Par_whatsapp_e: {
                required: false
            },
            Par_logo_e: {
                required: false
            }

        },
        messages: {
            par_id_e: {
                required: ""
            },
            par_name_e: {
                required: ""
            },
            par_namee_e: {
                required: ""
            },
            Par_phone_e: {
                required: ""
            },
            Par_website_e: {
                required: ""
            },
            Par_Addr1_e: {
                required: ""
            },
            Par_Addr2_e: {
                required: ""
            },
            Par_Addr3_e: {
                required: ""
            },
            Par_whatsapp_e: {
                required: ""
            },
            Par_logo_e: {
                required: ""
            }
        }
    });


    $('#btn_edit_pram').click(function () {
       alert('btn_edit_pram');
        //test if form is valid
        if ($('#form_edit_pram').valid()) {
            //get value of each input for pass in the url ajax
            var par_name = $('#par_name_e').val(),
            par_namee = $('#par_namee_e').val(),
            Par_phone = $('#Par_phone_e').val(),
            Par_website = $('#Par_website_e').val(),
            Par_Addr1 = $('#Par_Addr1_e').val(),
            Par_Addr2 = $('#Par_Addr2_e').val(),
            Par_Addr3 = $('#Par_Addr3_e').val(),
            Par_whatsapp = $('#Par_whatsapp_e').val(),
            Par_logo_e = $('#Par_logo_e').val(),
            par_id_e = $('#par_id_e').val();
            alert(par_id_e+par_name+par_namee+Par_phone+Par_website+Par_Addr1+Par_Addr2+Par_Addr3);

            //ajax 
            $.ajax({
                type: "POST",
                url: "../../Controllers/paramerterController.php",
                data: "methode=edit_paramerter&par_id_e=" + par_id_e + "&par_name=" + par_name + "&par_namee=" + par_namee + "&Par_phone=" + Par_phone + "&Par_website=" + Par_website + "&Par_Addr1=" + Par_Addr1 + "&Par_Addr2=" + Par_Addr2 + "&Par_Addr3=" + Par_Addr3 + "&Par_whatsapp=" + Par_whatsapp + "&Par_logo_e=" + Par_logo_e + "",
                success: function (result) {
                alert(result);
                    if (result == 'true') {
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                //alert(result);
                                window.location.reload();



                            }

                        });

                    }


                }
            });

        }

    });



    $('.box-footer').on('click', '#del_pram', function () {
        $('#id_pram_del').val($(this).attr('par_id'));
        $('#modal_del_paramerter').css("display", "block");
    });


    $('#btn_del_param').click(function () {
        var del_prm_id = $('#id_pram_del').val();
       alert(del_prm_id);
        $.ajax({
            url: "../../Controllers/paramerterController.php",
            data: "methode=delt_record_paramerter&del_prm_id=" + del_prm_id + "",
            success: function (result) {
          //  alert(result);
                if (result == 'true') {
                  //  alert("تم الحذف السجل بنجاح");
                    $('#modal_del_paramerter').modal('hide');
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



    $('#delete_param_cancel').on('click', function () {
        //alert("delete_Privilege_cancel");
        $('#modal_del_paramerter').css("display", "none");
    
      });


});