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



    $('#Btn_sys_S').click(function () {
        alert('insert Edit');
        //test if form is valid
        if ($('#FVTS_DLIVD').valid()) {
            //get value of each input for pass in the url ajax
            var AMNTS_DAT = $('#AMNTS_DAT').val(),
            VOU_USE_ID = $('#VOU_USE_ID').val(),
            AMTS_BENF = $('#AMTS_BENF').val(),
            TSTOTSALE = $('#TSTOTSALE').val(),
            TSMUS = $('#TSMUS').val(),
            TSHISREMD = $('#TSHISREMD').val(),
            TSONREMD = $('#TSONREMD').val(),
            DLIVAMNT = $('#DLIVAMNT').val();

            alert(AMNTS_DAT+''+VOU_USE_ID+''+AMTS_BENF+''+TSTOTSALE+''+TSMUS+''+TSHISREMD+''+TSONREMD+''+DLIVAMNT);

            //ajax 
            $.ajax({
                type: "POST",
                url: "../../Controllers/SuppController.php",
                data: "methode=add_mtd_dlivd&AMNTS_DAT=" + AMNTS_DAT + "&VOU_USE_ID=" + VOU_USE_ID + "&AMTS_BENF=" + AMTS_BENF + "&TSTOTSALE=" + TSTOTSALE + "&TSMUS=" + TSMUS + "&TSHISREMD=" + TSHISREMD + "&TSONREMD=" + TSONREMD + "&DLIVAMNT=" + DLIVAMNT + "",
                success: function (result) {
                    // alert(result)
                    if (result == 'true') {
                        $('#modal_VTS_DELIVD').css("display", "none");
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
                                    alert(result);




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
