


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
        url: "../../Controllers/SecuritiyController.php",
        data: "methode=view_all_secrty",
        success: function (result) {
           // //alert(result);
            if (result == 'true') {
                window.location.reload();
            }
        }

    });


   



    var form_add_Securitiy = $("#form_add_Securitiy").validate({
        rules: {
            SEC_USE_ID: {
                required: true
            },
            SEC_BRA_ID: {
                required: true
            }
        },
        messages: {
            SEC_USE_ID: {
                required: "الحقل مطلوب"
            },
            SEC_BRA_ID: {
                required: "الحقل مطلوب"
            }
        }

    });


    $('#add_ens_security').click(function () {
     //alert('Three');
        //test if form is valid
        if ($('#form_add_Securitiy').valid()) {
            //get value of each input for pass in the url ajax
            var SEC_USE_ID = $('#SEC_USE_ID').val(),
                SEC_BRA_ID = $('#SEC_BRA_ID').val();
            //alert(SEC_USE_ID+''+SEC_BRA_ID);

            //ajax 
            $.ajax({
                url: "../../Controllers/SecuritiyController.php",
                data: "methode=add_ens_security&SEC_USE_ID=" + SEC_USE_ID + "&SEC_BRA_ID=" + SEC_BRA_ID + "",
                success: function (result) {
                    //alert(result);
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

    $('#add_all_security').click(function () {
        //alert('Foure//');
           //test if form is valid
           if ($('#form_add_Securitiy').valid()) {
               //get value of each input for pass in the url ajax
               var SEC_USE_ID = $('#SEC_USE_ID').val(),
                    SEC_BRA_ID = $('#SEC_BRA_ID').val();
               //alert(SEC_USE_ID+'//'+SEC_BRA_ID);
   
               //ajax 
               $.ajax({
                   url: "../../Controllers/SecuritiyController.php",
                   data: "methode=add_all_security&SEC_USE_ID=" + SEC_USE_ID + "&SEC_BRA_ID=" + SEC_BRA_ID + "",
                   success: function (result) {
                       //alert(result);
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




       var form_edit_security = $("#form_edit_security").validate({
        rules: {
            SEC_PRO_ID_edit: {
                required: true
            },
            SEC_INSERT_edit: {
                required: false
            },
            SEC_UPDATE_edit: {
                required: false
            },
            SEC_DELETE_edit: {
                required: false
            },
            SEC_SHOW_edit: {
                required: false
            },
            SEC_FREEZE_edit: {
                required: false
            }

        },
        messages: {
            SEC_PRO_ID_edit: {
                required: "الحقل مطلوب"
            },
            SEC_INSERT_edit: {
                required: "---"
            },
            SEC_UPDATE_edit: {
                required: "---"
            },
            SEC_DELETE_edit: {
                required: "---"
            },
            SEC_SHOW_edit: {
                required: "---"
            },
            SEC_FREEZE_edit: {
                required: "---"
            }
        }
    });




    $('.box-footer').on('click', '#btn_edit_security', function () {
        $('#SEC_ID_edit').val($(this).attr('SEC_ID'));
     
       // $('#hh').val($(this).attr('SEC_PRO_ID'));
      //  document.documentElement(hh).val=$(this).attr('SEC_PRO_ID');
        // $('#SEC_BRA_ID_edit').val($(this).attr('SEC_BRA_ID'));
        // $('#SEC_USE_ID_edit').val($(this).attr('SEC_USE_ID'));
        $('#SEC_PRO_ID_edit').val($(this).attr('SEC_PRO_ID'));
        $('#PRO_NAME_edit').val($(this).attr('SEC_PRO_ID'));
        
       // $pn = $('#SEC_PRO_ID_edit').val(),
      // $p_n=('SELECT pro_name FROM programs WHERE PRO_ID = 1');
      //  $('#PRO_NAME_edit').val($pn);

        if($(this).attr('SEC_INSERT')=='Y')
    {
        $('#SEC_INSERT_edit').attr('checked', true)
    }
        else{

            $('#SEC_INSERT_edit').removeAttr('checked')
        }


        if($(this).attr('SEC_UPDATE')=='Y')
    {
        $('#SEC_UPDATE_edit').attr('checked', true)
    }
        else{

            $('#SEC_UPDATE_edit').removeAttr('checked')
        }


        if($(this).attr('SEC_DELETE')=='Y')
    {
        $('#SEC_DELETE_edit').attr('checked', true)
    }
        else{

            $('#SEC_DELETE_edit').removeAttr('checked')
        }

    
        if($(this).attr('SEC_SHOW')=='Y')
    {
        $('#SEC_SHOW_edit').attr('checked', true)
    }
        else{

            $('#SEC_SHOW_edit').removeAttr('checked')
        }

        if($(this).attr('SEC_FREEZE')=='Y')
    {
        $('#SEC_FREEZE_edit').attr('checked', true)
    }
        else{

            $('#SEC_FREEZE_edit').removeAttr('checked')
        }


        if($(this).attr('SEC_10')=='Y')
        {
            $('#SEC_10_edit').attr('checked', true)
        }
            else{
    
                $('#SEC_10_edit').removeAttr('checked')
            }

            if($(this).attr('SEC_11')=='Y')
            {
                $('#SEC_11_edit').attr('checked', true)
            }
                else{
        
                    $('#SEC_11_edit').removeAttr('checked')
                }

                if($(this).attr('SEC_12')=='Y')
                {
                    $('#SEC_12_edit').attr('checked', true)
                }
                    else{
            
                        $('#SEC_12_edit').removeAttr('checked')
                    }

                    if($(this).attr('SEC_13')=='Y')
                    {
                        $('#SEC_13_edit').attr('checked', true)
                    }
                        else{
                
                            $('#SEC_13_edit').removeAttr('checked')
                        }

                        if($(this).attr('SEC_14')=='Y')
                        {
                            $('#SEC_14_edit').attr('checked', true)
                        }
                            else{
                    
                                $('#SEC_14_edit').removeAttr('checked')
                            }

                            if($(this).attr('SEC_15')=='Y')
                            {
                                $('#SEC_15_edit').attr('checked', true)
                            }
                                else{
                        
                                    $('#SEC_15_edit').removeAttr('checked')
                                }

                                if($(this).attr('SEC_16')=='Y')
                                {
                                    $('#SEC_16_edit').attr('checked', true)
                                }
                                    else{
                            
                                        $('#SEC_16_edit').removeAttr('checked')
                                    }
         // $('#SEC_INSERT_edit').val($(this).attr('SEC_INSERT')
        // $('#SEC_UPDATE_edit').val($(this).attr('SEC_UPDATE'));
        // $('#SEC_DELETE_edit').val($(this).attr('SEC_DELETE'));
        // $('#SEC_SHOW_edit').val($(this).attr('SEC_SHOW'));
        // $('#SEC_FREEZE_edit').val($(this).attr('SEC_FREEZE'));
        // $('#modal_edit_security').modal('show');
        $('#modal_edit_security').css("display", "block")
    });

    $('#btn_security_edit').click(function () {
    //alert('Edit login Three');
        //test if form is valid
        if ($('#form_edit_security').valid()) {
            //get value of each input for pass in the url ajax
            var SEC_PRO_ID = $('#SEC_PRO_ID_edit').val(),
          //  SEC_INSERT = $('#SEC_INSERT_edit').val(),
          //  SEC_UPDATE = $('#SEC_UPDATE_edit').val(),
          //  SEC_DELETE = $('#SEC_DELETE_edit').val(),
          //  SEC_SHOW = $('#SEC_SHOW_edit').val(),
            SEC_FREEZE = $('#SEC_FREEZE_edit').val(),
            SEC_ID = $('#SEC_ID_edit').val();

            // checkBox = document.getElementById('#SEC_INSERT_edit');
            if($('#SEC_INSERT_edit').is(':checked')){
                var   SEC_INSERT = 'Y';
            }
            else{
                var   SEC_INSERT = 'N';
            }

             if($('#SEC_UPDATE_edit').is(':checked')){
                var   SEC_UPDATE = 'Y';
            }
            else{
                var   SEC_UPDATE = 'N';
            }

            if($('#SEC_DELETE_edit').is(':checked')){
                var   SEC_DELETE = 'Y';
            }
            else{
                var   SEC_DELETE = 'N';
            }

            if($('#SEC_SHOW_edit').is(':checked')){
                var   SEC_SHOW = 'Y';
            }
            else{
                var   SEC_SHOW = 'N';
            }

            if($('#SEC_FREEZE_edit').is(':checked')){
                var   SEC_FREEZE = 'Y';
            }
            else{
                var   SEC_FREEZE = 'N';
            }

            if($('#SEC_10_edit').is(':checked')){
                var   SEC_10 = 'Y';
            }
            else{
                var   SEC_10 = 'N';
            }

            if($('#SEC_11_edit').is(':checked')){
                var   SEC_11 = 'Y';
            }
            else{
                var   SEC_11 = 'N';
            }
            if($('#SEC_12_edit').is(':checked')){
                var   SEC_12 = 'Y';
            }
            else{
                var   SEC_12 = 'N';
            }
            if($('#SEC_13_edit').is(':checked')){
                var   SEC_13 = 'Y';
            }
            else{
                var   SEC_13 = 'N';
            }
            if($('#SEC_14_edit').is(':checked')){
                var   SEC_14 = 'Y';
            }
            else{
                var   SEC_14 = 'N';
            }
            if($('#SEC_15_edit').is(':checked')){
                var   SEC_15 = 'Y';
            }
            else{
                var   SEC_15 = 'N';
            }
            if($('#SEC_16_edit').is(':checked')){
                var   SEC_16 = 'Y';
            }
            else{
                var   SEC_16 = 'N';
            }
      //alert(SEC_ID+SEC_PRO_ID+SEC_INSERT+SEC_UPDATE+SEC_DELETE+SEC_SHOW+SEC_FREEZE);
            //ajax 
            $.ajax({
                url: "../../Controllers/SecuritiyController.php",
                data: "methode=Edit_security&SEC_ID=" + SEC_ID + "&SEC_PRO_ID=" + SEC_PRO_ID + "&SEC_INSERT=" + SEC_INSERT + "&SEC_UPDATE=" + SEC_UPDATE + "&SEC_DELETE=" + SEC_DELETE + "&SEC_SHOW=" + SEC_SHOW +"&SEC_FREEZE=" + SEC_FREEZE +"&SEC_10=" + SEC_10 +"&SEC_11=" + SEC_11 +"&SEC_12=" + SEC_12 +"&SEC_13=" + SEC_13 +"&SEC_14=" + SEC_14 +"&SEC_15=" + SEC_15 +"&SEC_16=" + SEC_16 + "",
                success: function (result) {
                    //alert(result);
                    if (result == 'true') {
                        // $('#modal_edit_brn').modal('hide');
                        $('#modal_edit_security').css("display", "none");
                        $('#mod_edt_security').css("display", "block");
                            setTimeout(function () {
                              $('#mod_edt_security').css("display", "none");
                              window.location.reload();
                            }, 1000);
                        $.ajax({
                            url: "../../Controllers/LoginController.php",
                            data: "methode=view",
                            success: function (result) {
                                //////alert(result);
                                window.location.reload();



                            }

                        });

                    }


                }
            });

        }

    });

    

    $('#btn_cancel_sec').on('click', function () {
        ////alert("edit");
        $('#modal_edit_security').css("display", "none");
    
      });
    





});