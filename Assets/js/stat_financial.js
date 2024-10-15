
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


    var frm_stat_financial = $("#frm_stat_financial").validate({
        rules: {
            i_date1: {
                required: true
            },
            i_date2: {
                required: true
            },
            income_stat_ACC_LEV_F: {
                required: true
            },
            income_stat_ACC_LEV_T: {
                required: true
            },
            income_stat_TYP: {
                required: true
            }
        },
        messages: {
            i_date1: {
                required: "****"
            },
            i_date2: {
                required: "****"
            },
            income_stat_ACC_LEV_F: {
                required: "****"
            },
            income_stat_ACC_LEV_T: {
                required: "****"
            },
            income_stat_TYP: {
                required: "****"
            }
        }
    });

    $('#pnt_stat_financial_acc').click(function () {
        // alert('Mizan Account');

        if ($('#frm_stat_financial').valid()) {
            // var id = $('#MIZAN_ACC_TYP').val(),
            i_date1 = $('#i_date1').val(),
                i_date2 = $('#i_date2').val(),
                VOU_USE_name = $('#VOU_USE_name').val(),
                income_stat_ACC_LEV_F = $('#income_stat_ACC_LEV_F').val(),
                income_stat_ACC_LEV_T = $('#income_stat_ACC_LEV_T').val(),
                income_stat_TYP = $('#income_stat_TYP').val();

            // alert("//" + i_date1 + "//" + i_date2 + "//" + VOU_USE_name);
            // alert(income_stat_ACC_LEV_F + income_stat_ACC_LEV_T);

            if (income_stat_TYP == 1) {
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/stat_financial_Controller.php",
                    data: "method=print_stat_financial1_all&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&income_stat_ACC_LEV_F=" + income_stat_ACC_LEV_F + "&income_stat_ACC_LEV_T=" + income_stat_ACC_LEV_T + "",
                    success: function (result) {
                        // alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "../../Controllers/stat_financial_Controller.php",
                    data: "method=print_stat_financial2_all&i_date1=" + i_date1 + "&i_date2=" + i_date2 + "&VOU_USE_name=" + VOU_USE_name + "&income_stat_ACC_LEV_F=" + income_stat_ACC_LEV_F + "&income_stat_ACC_LEV_T=" + income_stat_ACC_LEV_T + "",
                    success: function (result) {
                        // alert(result);
                        window.open(result, "resizeable,scrollbar");
                    }
                });
            }



        }
    });







});