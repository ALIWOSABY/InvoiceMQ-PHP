
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
        url: "../../Controllers/TypeController.php",
        data: "methode=view_type",
        success: function (result) {
            if (result == 'true') {
                 window.location.reload();
            }
        }

    });



    $('.btn_types_show').on('click', function () {
        // alert("edit");
        $('#modal-default_type').css("display", "block");

    });


    var form_add_type = $("#form_add_type").validate({
        rules: {
            TYP_NAME: {
                required: true
            },
            TYP_NAMEE: {
                required: false
            },
            TYP_REP_NAME: {
                required: false
            },
            TYP_TYPE: {
                required: false
            },
            TYP_TYPE: {
                TYP_FREEZE: false
            }


        },
        messages: {
            TYP_NAME: {
                required: ""
            },
            TYP_NAMEE: {
                required: false
            },
            TYP_REP_NAME: {
                required: false
            },
            TYP_TYPE: {
                required: false
            },
            TYP_FREEZE: {
                required: false
            }

        }
    });


    $('#add_ens_type').click(function () {
        // alert('Three');
        //test if form is valid
        if ($('#form_add_type').valid()) {
            //get value of each input for pass in the url ajax
            var TYP_NAME = $('#TYP_NAME').val();
            TYP_NAMEE = $('#TYP_NAMEE').val();
            TYP_REP_NAME = $('#TYP_REP_NAME').val();
            TYP_TYPE = $('#TYP_TYPE').val();
            TYP_Sig_one = $('#TYP_Sig_one').val();
            TYP_Sig_two = $('#TYP_Sig_two').val();
            TYP_Sig_three = $('#TYP_Sig_three').val();
           

            TYP_INS_USER = $('#TYP_INS_USER').val();
            TYP_FREEZE = $('#TYP_FREEZE').val();


             alert(TYP_NAME + TYP_NAMEE + TYP_REP_NAME + TYP_TYPE + TYP_Sig_one +'//'+TYP_Sig_two+ '//'+TYP_Sig_three);

            //ajax 
            $.ajax({
                url: "../../Controllers/TypeController.php",
                data: "methode=add_ens_type&TYP_NAME=" + TYP_NAME + "&TYP_NAMEE=" + TYP_NAMEE + "&TYP_REP_NAME=" + TYP_REP_NAME + "&TYP_TYPE=" + TYP_TYPE + "&TYP_Sig_one=" + TYP_Sig_one + "&TYP_Sig_two=" + TYP_Sig_two + "&TYP_Sig_three=" + TYP_Sig_three + "&TYP_INS_USER=" + TYP_INS_USER + "&TYP_FREEZE=" + TYP_FREEZE + "",
                success: function (result) {
                       alert(result);
                    if (result == 'true') {
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                //   alert(result);
                                $('#modal-default_type').css("display", "none");
                                $('#modal_success').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_success').css("display", "none");
                                     window.location.reload();
                                }, 1000);
                                if (result == 'true') {
                                    $.ajax({
                                        url: "../../Controllers/LoginController.php",
                                        data: "methode=view",
                                        success: function (result) {                                            

                                        }

                                    });

                                }
                            }

                        });

                    }


                }
            });

        }
    });



    $('#cancel_type_add').on('click', function () {
        ////alert("edit");
        $('#modal-default_type').css("display", "none");

    });




    var form_edit_type = $("#form_edit_type").validate({
        rules: {
            TYP_NAME_edit: {
                required: true
            },
            TYP_NAMEE_edit: {
                required: false
            },
            TYP_REP_NAME_edit: {
                required: false
            },
            TYP_TYPE_edit: {
                required: false
            },
            TYP_FREEZE_edit: {
                required: false
            }



        },
        messages: {
            TYP_NAME_edit: {
                required: ""
            },
            TYP_NAMEE_edit: {
                required: false
            },
            TYP_REP_NAME_edit: {
                required: false
            },
            TYP_TYPE_edit: {
                required: false
            },
            TYP_FREEZE_edit: {
                required: false
            }
        }
    });




    $('.box-footer').on('click', '#btn_edit_type', function () {
        $('#TYP_ID_edit').val($(this).attr('TYP_ID'));
        $('#TYP_NAME_edit').val($(this).attr('TYP_NAME'));
        $('#TYP_NAMEE_edit').val($(this).attr('TYP_NAMEE'));
        $('#TYP_REP_NAME_edit').val($(this).attr('TYP_REP_NAME'));
        $('#TYP_TYPE_edit').val($(this).attr('TYP_TYPE'));
        $('#TYP_FREEZE_edit').val($(this).attr('TYP_FREEZE'));

        $('#TYP_Sig_one_edit').val($(this).attr('TYP_Sig_one'));
        $('#TYP_Sig_two_edit').val($(this).attr('TYP_Sig_two'));
        $('#TYP_Sig_three_edit').val($(this).attr('TYP_Sig_three'));
    


        $('#modal_edit_typ').css("display", "block");
    });


    $('#btn_type_edit').click(function () {
        // //alert('fff');
        //test if form is valid
        if ($('#form_edit_type').valid()) {
            //get value of each input for pass in the url ajax
            var TYP_NAME = $('#TYP_NAME_edit').val(),
                TYP_NAMEE = $('#TYP_NAMEE_edit').val(),
                TYP_REP_NAME = $('#TYP_REP_NAME_edit').val(),
                TYP_TYPE = $('#TYP_TYPE_edit').val(),



                TYP_Sig_one = $('#TYP_Sig_one_edit').val(),
                TYP_Sig_two = $('#TYP_Sig_two_edit').val(),
                TYP_Sig_three = $('#TYP_Sig_three_edit').val(),
                

                TYP_UPD_USER = $('#TYP_UPD_USER').val(),
                TYP_FREEZE = $('#TYP_FREEZE_edit').val();





            TYP_ID = $('#TYP_ID_edit').val();




            // //alert(TYP_NAME+TYP_NAMEE+TYP_TYPE);
            //ajax 
            $.ajax({
                url: "../../Controllers/typeController.php",
                data: "methode=Edit_type&TYP_ID=" + TYP_ID + "&TYP_NAME=" + TYP_NAME + "&TYP_NAMEE=" + TYP_NAMEE + "&TYP_REP_NAME=" + TYP_REP_NAME + "&TYP_TYPE=" + TYP_TYPE + "&TYP_Sig_one=" + TYP_Sig_one + "&TYP_Sig_two=" + TYP_Sig_two + "&TYP_Sig_three=" + TYP_Sig_three + "&TYP_UPD_USER=" + TYP_UPD_USER + "&TYP_FREEZE=" + TYP_FREEZE + "",
                success: function (result) {
                    //    alert(result);
                    if (result == 'true') {
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                $('#modal_edit_typ').css("display", "none");
                                $('#modal_edit_t').css("display", "block");
                                setTimeout(function () {
                                    $('#modal_edit_t').css("display", "none");
                                     window.location.reload();
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

                        });

                    }


                }
            });

        }

    });



    $('#cancel_type_edit').on('click', function () {
        ////alert("edit");
        $('#modal_edit_typ').css("display", "none");
    });



    $('.box-footer').on('click', '#del_type', function () {


        $('#TYP_ID_del').val($(this).attr('TYP_ID'));
        $('#modal_del_type').css("display", "block");

    });

    $('#btn_del_type').click(function () {
        var TYP_ID_del = $('#TYP_ID_del').val();
        ////alert(del_brn_id);

        $.ajax({
            type: "POST",
            url: "../../Controllers/typeController.php",
            data: "methode=chk_TYPE&TYP_ID_del=" + TYP_ID_del + "",
            success: function (chktypid) {
                if (chktypid == 'true') {


                    $.ajax({
                        url: "../../Controllers/typeController.php",
                        data: "methode=delt_record_typ&TYP_ID_del=" + TYP_ID_del + "",
                        success: function (result) {
                            ////alert(result);
                            if (result == 'true') {
                                $.ajax({
                                    url: "../../Controllers/LoginController.php",
                                    data: "methode=view",
                                    success: function (result) {
                                        $('#modal_del_type').css("display", "none");
                                        $('#modal_delete_t').css("display", "block");
                                        setTimeout(function () {
                                            $('#modal_delete_t').css("display", "none");
                                             window.location.reload();                                            
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

                                });

                            }
                        }
                    });

                }
                else {
                    alert('لا يمكن حذف المستند لوجود حركة عليه');
                    $('#modal_del_type').css("display", "none");


                }


            }
        });





    });


    $('#cancel_type_delt').on('click', function () {
        ////alert("edit");
        $('#modal_del_type').css("display", "none");

    });



    $('.box-footer').on('click', '#btn_doc', function () {


        // $('#TYP_ID_del').val($(this).attr('TYP_ID'));
        $('#modal_doc_archive').css("display", "block");

    });


    $('#cancel_archive_doc').on('click', function () {
        ////alert("edit");
        $('#modal_doc_archive').css("display", "none");

    });



    var form_arch_doc = $("#form_arch_doc").validate({
        rules: {
            fileToUpload: {
                required: true
            }
        },
        messages: {
            fileToUpload: {
                required: ""
            }
        }
    });

    $('#btn_archive_doc').click(function () {
        // alert('btn_archive_doc');
        if ($('#form_arch_doc').valid()) {

            var fileToUpload = $('#fileToUpload').val();
            //    alert(fileToUpload);
            $('#modal_doc_archive').css("display", "none");

        }

    });








});