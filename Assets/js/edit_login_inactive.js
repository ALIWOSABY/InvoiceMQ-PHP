
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


    // ==========================================================================================================================
    //      View all data in page main user 
    // ==========================================================================================================================


    $.ajax({
        url: "../../Controllers/LoginController.php",
        data: "methode=view_branch",
        success: function (result) {
            // //alert(result);
            if (result == 'true') {
                window.location.reload();
            }
        }

    });


    function view_customers() {
        $.ajax({
            url: "../../Controllers/AnyaccountsController.php",
            data: "methode=view_customers",
            success: function (result) {
                // ////alert(result);
                if (result == 'true') {
                    // window.location.reload();
                }
            }

        });
    }
    view_customers();




    // ==========================================================================================================================
    //      Start code Add User 
    // ==========================================================================================================================


    $('.btn_user_Add').on('click', function () {
        // //alert("edit");
        $('#modal_default_User').css("display", "block");

    });




    //validation du formulaire d'inscription
    var form_usr_add = $("#form_usr_add").validate({
        rules: {
            Add_SYS_User_name: {
                required: true
            },
            Add_USE_NAMEE: {
                required: false
            },
            Add_USE_BRA_ID: {
                required: true
            },
            Add_SYS_User_email: {
                required: true,
                email: true,
                remote: {
                    url: "../Controllers/LoginController.php?methode=check_email",
                    type: "post",
                    data: {
                        SYS_User_email: function () {
                            return $('#SYS_User_email').val();
                        }
                    }
                }
            },
            Add_SYS_User_login: {
                required: true,
                remote: {
                    url: "../Controllers/LoginController.php?methode=check_username",
                    type: "post",
                    data: {
                        SYS_User_login: function () {
                            return $('#SYS_User_login').val();
                        }
                    }
                }
            },
            Add_PasswordHash: {
                required: true,
                minlength: 8

            },
            Add_confirm_etu: {
                required: true,
                minlength: 8,
                equalTo: "#Add_PasswordHash"
            }
        },
        messages: {
            Add_SYS_User_name: {
                required: ""
            },
            Add_USE_NAMEE: {
                required: false
            },
            Add_USE_BRA_ID: {
                required: ""
            },
            Add_SYS_User_email: {
                required: "",
                email: "البريد الإلكتروني غير صالح"
            },
            Add_SYS_User_login: {
                required: ""
            },
            Add_PasswordHash: {
                required: "",
                minlength: "يجب أن تكون كلمة المرور أكبر من 8"
            },
            Add_confirm_etu: {
                required: "",
                equalTo: "تأكيد كلمة المرور غير متطابقة",
                minlength: "يجب أن تكون كلمة المرور أكبر من 8"
            }

        }
    });


    $('#btn_user_Add').click(function () {
        //test if form is valid
        // alert('Add New User in sys');
        if ($('#form_usr_add').valid()) {
            //get value of each input for pass in the url ajax
            var SYS_User_name = $('#Add_SYS_User_name').val(),
                USE_NAMEE = $('#Add_USE_NAMEE').val(),
                USE_BRA_ID = $('#Add_USE_BRA_ID').val(),
                SYS_User_email = $('#Add_SYS_User_email').val(),
                SYS_User_login = $('#Add_SYS_User_login').val(),
                PasswordHash = $('#Add_PasswordHash').val();
            //alert(Analytic_Acc_id+'//'+USE_BRA_ID+'//'+SYS_User_email+'//'+SYS_User_login+'//'+PasswordHash);
            //ajax 
            $.ajax({
                url: "../../Controllers/LoginController.php",
                data: "methode=ins_etu&SYS_User_name=" + SYS_User_name + "&USE_NAMEE=" + USE_NAMEE + "&USE_BRA_ID=" + USE_BRA_ID + "&SYS_User_email=" + SYS_User_email + "&SYS_User_login=" + SYS_User_login + "&PasswordHash=" + PasswordHash + "",
                success: function (result) {
                    //alert(result);
                    if (result == 'true') {
                        // $('#modal_default_User').modal('hide');
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                $('#modal_default_User').css("display", "none");
                                $('#modal_success').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_success').css("display", "none");
                                    window.location.reload();
                                    view_customers();
                                }, 1000);



                            }

                        });

                    }


                }
            });
        }

    });


    $('#cancel_model_user').on('click', function () {
        //////alert("edit");
        $('#modal_default_User').css("display", "none");
    });

    // ==========================================================================================================================
    //      End code Add User 
    // ==========================================================================================================================          



    // ==========================================================================================================================
    //     Start code Edit data For any User
    // ==========================================================================================================================
    var form_edit_inactive = $("#form_edit_inactive").validate({
        rules: {
            edit_SYS_User_name: {
                required: true
            },
            edit_USE_NAMEE: {
                required: false
            },
            USE_BRA_ID: {
                required: true
            },
            SYS_User_email: {
                required: true,
                email: true,
            },
            SYS_User_login: {
                required: true,
            },
            SYS_User_status: {
                required: true
            }
        },
        messages: {
            edit_SYS_User_name: {
                required: ""
            },
            edit_USE_NAMEE: {
                required: false
            },
            USE_BRA_ID: {
                required: ""
            },
            SYS_User_email: {
                required: "",
                email: ""
            },
            SYS_User_login: {
                required: ""
            },
            SYS_User_status: {
                required: true
            }

        }
    });

    $('.box-footer').on('click', '#btn_edit', function () {

        $('#Analytic_Acc_id').val($(this).attr('Analytic_Acc_id'));
        $('#edit_SYS_User_name').val($(this).attr('SYS_User_name'));
        $('#edit_USE_NAMEE').val($(this).attr('USE_NAMEE'));

        $('#USE_BRA_ID').val($(this).attr('USE_BRA_ID'));
        $('#SYS_User_email').val($(this).attr('SYS_User_email'));
        $('#SYS_User_login').val($(this).attr('SYS_User_login'));
        $('#SYS_User_status').val($(this).attr('SYS_User_status'));
        $('#modal_edit_user_inactive').css("display", "block");


    });


    $('#btn_edit_valide_inc').click(function () {
        //alert('Edit login one');
        //test if form is valid
        if ($('#form_edit_inactive').valid()) {
            //get value of each input for pass in the url ajax
            //alert('Edit login tow');
            // var  USE_PARENT_ID = $('#USE_PARENT_ID').val(),
            var SYS_User_name = $('#edit_SYS_User_name').val(),
                USE_NAMEE = $('#edit_USE_NAMEE').val(),

                USE_BRA_ID = $('#USE_BRA_ID').val(),
                SYS_User_email = $('#SYS_User_email').val(),
                SYS_User_login = $('#SYS_User_login').val(),
                SYS_User_status = $('#SYS_User_status').val(),
                Analytic_Acc_id = $('#Analytic_Acc_id').val();
            // //alert(USE_PARENT_ID);
            //alert(USE_BRA_ID+'//'+SYS_User_email+'//'+PasswordHash+'//'+SYS_User_status+'//'+Analytic_Acc_id);
            //ajax 
            $.ajax({
                url: "../../Controllers/LoginController.php",
                data: "methode=Edit_inactive&Analytic_Acc_id=" + Analytic_Acc_id + "&SYS_User_name=" + SYS_User_name + "&USE_NAMEE=" + USE_NAMEE + "&USE_BRA_ID=" + USE_BRA_ID + "&SYS_User_email=" + SYS_User_email + "&SYS_User_login=" + SYS_User_login + "&SYS_User_status=" + SYS_User_status + "",
                success: function (result) {
                    // alert(result);
                    if (result == 'true') {
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                $('#modal_edit_user_inactive').css("display", "none");
                                $('#modal_edit_inactive').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_edit_inactive').css("display", "none");
                                    window.location.reload();
                                }, 1000);
                            }

                        });

                    }


                }
            });

        }

    });

    $('#cancel_edit_user').on('click', function () {
        //////alert("edit");
        $('#modal_edit_user_inactive').css("display", "none");

    });


    // ==========================================================================================================================
    //     End code Edit data For any User
    // ==========================================================================================================================          



    //==========================================================================================================================
    // Start code Delete data For any User
    //==========================================================================================================================

    $('.box-footer').on('click', '#del_user_inactive', function () {
        $('#id_Analytic_Accdel').val($(this).attr('Analytic_Acc_id'));
        // $("#modal_del_userinactive").modal('show');
        $('#modal_del_userinactive').css("display", "block");

    });

    $('#btn_del_inactive').click(function () {
        var delete_txtid = $('#id_Analytic_Accdel').val();
        // //////alert(delete_txtid);
        $.ajax({
            url: "../../Controllers/LoginController.php",
            data: "methode=del_userinactive&delete_txtid=" + delete_txtid + "",
            success: function (result) {
                ////////alert(result);
                if (result == 'true') {
                    $.ajax({
                        url: "../../Controllers/LoginController.php",
                        data: "methode=view",
                        success: function (result) {
                            $('#modal_del_userinactive').css("display", "none");
                            $('#modal_delete_inactive').css("display", "block");
                            setTimeout(function () {
                                $('#modal_delete_inactive').css("display", "none");
                                window.location.reload();
                            }, 1000);



                        }

                    });

                }


            }
        });
    });



    $('#cancel_del_user').on('click', function () {
        //////alert("edit");
        $('#modal_del_userinactive').css("display", "none");

    });

    //   ==========================================================================================================================
    // End code Delete 
    //   ==========================================================================================================================


    //   ==========================================================================================================================
    // Start code Chage your Password 
    //   ==========================================================================================================================

    var form_edit_inactive_pwd = $("#form_edit_inactive_pwd").validate({
        rules: {
            PasswordHash: {
                required: true,
                minlength: 8

            },
            confirm_etu: {
                required: true,
                minlength: 8,
                equalTo: "#PasswordHash"
            }
        },
        messages: {
            PasswordHash: {
                required: "",
                minlength: "يجب أن تكون كلمة المرور أكبر من 8"
            },
            confirm_etu: {
                required: "",
                equalTo: "تأكيد كلمة المرور غير متطابقة",
                minlength: "يجب أن تكون كلمة المرور أكبر من 8"
            }
        }
    });

    $('.box-footer').on('click', '#btn_edit_pwd', function () {

        $('#Analytic_Acc_id').val($(this).attr('Analytic_Acc_id'));
        $('#PasswordHash').val($(this).attr('PasswordHash'));
        $('#confirm_etu').val($(this).attr('PasswordHash'));
        $('#modal_edit_user_inactive_pwd').css("display", "block");


    });

    $('#btn_edit_valide_inc_pwd').click(function () {
        if ($('#form_edit_inactive_pwd').valid()) {
            var PasswordHash = $('#PasswordHash').val(),
                Analytic_Acc_id = $('#Analytic_Acc_id').val();
            // alert(PasswordHash + '//'+ Analytic_Acc_id);           
            //ajax 
            $.ajax({
                url: "../../Controllers/LoginController.php",
                data: "methode=Edit_inactive_pwd&Analytic_Acc_id=" + Analytic_Acc_id + "&PasswordHash=" + PasswordHash + "",
                success: function (result) {
                    // alert(result);
                    if (result == 'true') {
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                $('#modal_edit_user_inactive_pwd').css("display", "none");
                                $('#modal_edit_inactive_pwd').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_edit_inactive_pwd').css("display", "none");
                                    window.location.reload();
                                }, 1000);
                            }

                        });

                    }


                }
            });

        }

    });


    $('#cancel_edit_user_pwd').on('click', function () {
        //////alert("edit");
        $('#modal_edit_user_inactive_pwd').css("display", "none");

    });





});