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





    $('#btn_login').on("click", function () {
        //alert("Testing");

        var login = $('#login').val(),
            password = $('#password').val();

        //alert("First login is :"+login+"Password :"+password);

        $.ajax({
            url: "../Controllers/LoginController.php",
            data: "methode=login&login=" + login + "&password=" + password + "",

            success: function (result) {
                //alert("Seconde login is :"+login+"Password :"+password);
                if (result == "false") {
                    //alert("false");
                    $('#donnee_incorrect_modal').modal('show');
                }
                else if (result == "activefalse") {
                    alert("activefalse");
                    $('#nonactive_modal').modal('show');
                }
                else if (result == "user") {

                    // alert("user js");
                    window.location.href = "../Views/User/";
                }
                else if (result == "admin") {
                    // alert("Test Enter on page admin");

                    window.location.href = "../Views/Admin/";
                }

            }
        });
    });



    //validation du formulaire d'inscription
    // var form_etu = $("#form_etu").validate({
    //     rules: {
    //         SYS_User_name: {
    //             required: true
    //         },
    //         USE_NAMEE: {
    //             required: true
    //         },
    //         USE_PARENT_ID: {
    //             required: false
    //         },
    //         USE_BRA_ID: {
    //             required: false
    //         },
    //         SYS_User_email: {
    //             required: true,
    //             email: true,
    //             remote: {
    //                 url: "../Controllers/LoginController.php?methode=check_email",
    //                 type: "post",
    //                 data: {
    //                     SYS_User_email: function () {
    //                         return $('#SYS_User_email').val();
    //                     }
    //                 }
    //             }
    //         },
    //         SYS_User_login: {
    //             required: true,
    //             remote: {
    //                 url: "../Controllers/LoginController.php?methode=check_username",
    //                 type: "post",
    //                 data: {
    //                     SYS_User_login: function () {
    //                         return $('#SYS_User_login').val();
    //                     }
    //                 }
    //             }
    //         },
    //         PasswordHash: {
    //             required: true,
    //             minlength: 8

    //         },
    //         confirm_etu: {
    //             required: true,
    //             minlength: 8,
    //             equalTo: "#PasswordHash"
    //         }
    //     },
    //     messages: {
    //         SYS_User_name: {
    //             required: " الاسم الرباعي (مطلوب)"
    //         },
    //         USE_NAMEE: {
    //             required: "حقل الاسم الرباعي (مطلوب)"
    //         },
    //         USE_PARENT_ID: {
    //             required: false
    //         },
    //         USE_BRA_ID: {
    //             required: false
    //         },
    //         SYS_User_email: {
    //             required: "حقل الايميل مطلوب",
    //             email: "البريد الإلكتروني غير صالح"
    //         },
    //         SYS_User_login: {
    //             required: "حقل اسم المستخدم مطلوب"
    //         },
    //         PasswordHash: {
    //             required: "كلمة المرور مطلوبة",
    //             minlength: "يجب أن تكون كلمة المرور أكبر من 8"
    //         },
    //         confirm_etu: {
    //             required: "تأكيد كلمة المرور مطلوب",
    //             equalTo: "تأكيد كلمة المرور غير متطابقة",
    //             minlength: "يجب أن تكون كلمة المرور أكبر من 8"
    //         }

    //     }
    // });


    // $('#btn_ins_etu').click(function () {
    //     //test if form is valid
    //     ////alert('Add New User');
    //     if ($('#form_etu').valid()) {
    //         //get value of each input for pass in the url ajax
    //         var SYS_User_name = $('#SYS_User_name').val(),
    //             USE_NAMEE = $('#USE_NAMEE').val(),
    //             USE_PARENT_ID = $('#USE_PARENT_ID').val(),
    //             USE_BRA_ID = $('#USE_BRA_ID').val(),
    //             SYS_User_email = $('#SYS_User_email').val(),
    //             SYS_User_login = $('#SYS_User_login').val(),
    //             PasswordHash = $('#PasswordHash').val();
    //         ////alert(SYS_User_name+'//'+USE_NAMEE+'//'+USE_PARENT_ID+'//'+USE_BRA_ID+'//'+SYS_User_email+'//'+SYS_User_login+'//'+PasswordHash);
    //         //ajax 
    //         $.ajax({
    //             url: "../Controllers/LoginController.php",
    //             data: "methode=ins_etu&SYS_User_name=" + SYS_User_name + "&USE_NAMEE=" + USE_NAMEE +"&USE_PARENT_ID=" + USE_PARENT_ID +"&USE_BRA_ID=" + USE_BRA_ID + "&SYS_User_email=" + SYS_User_email + "&SYS_User_login=" + SYS_User_login + "&PasswordHash=" + PasswordHash + "",

    //             // success: function (result) {
    //             //     // //////alert(result);
    //             //     // SYS_User_name + SYS_User_email+ SYS_User_login+ PasswordHash
    //             //     window.location.href = "../Views/Login.php";
    //             // }

    //             success: function (result) {
    //                 ////alert(result);
    //                 if (result == 'true') {
    //                     window.location.reload();
    //                 }
    //             }
    //         });
    //     }

    // });


});
