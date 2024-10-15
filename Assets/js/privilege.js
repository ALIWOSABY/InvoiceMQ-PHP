
$(document).ready(function () {
  $.validator.setDefaults({
    //edit class for error message
    errorClass: "help-block",
    errorPlacement: function (error, element) {
      if (element.parent(".form-group").length) {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    },
    //function enleve whene a error
    highlight: function (element) {
      $(element).closest(".form-group").removeClass("has-success");
      //ajouter la class has-error pour le premier div de la class form-control pour l'element qui a l'erreur
      $(element).closest(".form-group").parent().addClass("has-error");
    },
    //function whene the error is corrected
    unhighlight: function (element) {
      //supprimer la class has-error
      $(element).closest(".form-group").removeClass("has-error");
      //ajouter la class has-success
      $(element).closest(".form-group").addClass("has-success");
    },
  });
  var form_add_privilege = $("#form_add_Privilege").validate({
    rules: {
      privilege_id: {
        required: true,
      },
      Privilege_name: {
        required: true,
      },
      Privilege_name2: {
        required: false,
      },
      Privilege_file: {
        required: false,
      },
      Privilege_sys: {
        required: true,
      },
      Privilege_status: {
        required: true,
      },
      // privilege_fractional_unit2: {
      //   required: true,
      // },
    },
    messages: {
      Privilege_name: {
        required: "",
      },
      privilege_id: {
        required: '',
      },
      Privilege_name2: {
        required: false,
      },
      Privilege_file: {
        required: "",
      },
      Privilege_sys: {
        required: "",
      },
      Privilege_status: {
        required: "",
      },
      // privilege_fractional_unit2: {
      //   required:"",
      // },
    },
  });

  var form_edit_privilege = $("#form_edit_Privilege").validate({
    rules: {
      edit_Privilege_name: {
        required: true,
      },
      edit_privilege_iso: {
        required: true,
      },
      edit_Privilege_file: {
        required: false,
      },
      edit_privilege_unit: {
        required: true,
      },
      edit_privilege_value: {
        required: true,
      },
    },
    messages: {
      edit_Privilege_name: {
        required: "",
      },

      edit_privilege_iso: {
        required: "",
      },
      edit_Privilege_file: {
        required: "",
      },
      edit_privilege_unit: {
        required: "",
      },
      edit_privilege_value: {
        required: "",
      },
    },
  });
  function view_privilege() {
    $.ajax({
      type: "POST",
      url: "../../Controllers/PrivilegeController.php",
      data: {
        method: "view_Privilege",
      },
      success: function (result) {
        if (result == 'true') {

          window.location.reload();
        }




      }
    });
  }

  $("#all_privilege").click(function () {
    view_privilege();
  });
  view_privilege();

  $('.btn_add_privilege').on('click', function () {
    //alert("btn_add_privilege");
    $('#modal-default_privilege').css("display", "block");

  });
  $('.btn_add_privilege').on('click', function () {
    //alert("btn_add_privilege");
    $('#modal-default_privilege').css("display", "block");

  });

  $('.btn_add_privilege').click(function () {
    $.ajax({
      type: "POST",
      url: "../../Controllers/PrivilegeController.php",
      data: "method=get_id_Privilege",
      success: function (res) {
        $('#privilege_id').val(res);
        // alert(res);
      }
    });
    $('#modal-default_privilege').css("display", "block");

  });


  $("#add_new_Privilege").click(function () {

    if ($("#form_add_Privilege").valid()) {
      //alert("add_new_Privilege");
      //get value of each input for pass in the url ajax
      var privilege_id = $("#privilege_id").val(),
        Privilege_name = $("#Privilege_name").val(),
        Privilege_name2 = $("#Privilege_name2").val(),
        Privilege_file = $("#Privilege_file").val(),
        Privilege_sys = $("#Privilege_sys").val(),
        Privilege_status = $("#Privilege_status").val(),
        PRO_INS_USER = $("#PRO_INS_USER").val();
        // alert(PRO_INS_USER)

        
      //alert($('#privilege_id').val());
      // //alert($('#privilege_status').val());
      // if ($("#privilege_status").is(":checked")) {
      //   privilege_status = 1;
      // } else {
      //   // //alert($('#privilege_status').is(":checked"));
      //   privilege_status = 0;
      // }
      $.ajax({
        type: "POST",
        url: "../../Controllers/PrivilegeController.php",
        data: {
          method: "add_new_privilege",
          privilege_id: privilege_id,
          Privilege_name: Privilege_name,
          Privilege_name2: Privilege_name2,
          Privilege_file: Privilege_file,
          Privilege_sys: Privilege_sys,
          Privilege_status: Privilege_status,
          PRO_INS_USER: PRO_INS_USER


        },
        success: function (result) {
          // window.location.reload();
          if (result == "true") {
            //alert(true);
            //alert("added successfully");
            view_privilege();
            // window.location.reload();
            // $('#modal-default_privilege').css("display", "none");

            $('#modal-default_privilege').css("display", "none");
            $('#modal_success').css("display", "block");
            setTimeout(function () {
              $('#modal_success').css("display", "none");
              window.location.reload();
            }, 1000);

          }
          else {
            //alert("error" );
          }
        },
      });
    }
  });
  $('#cancel_new_Privilege').on('click', function () {
    //alert("edit");
    $('#modal-default_privilege').css("display", "none");

  });

  $('.btn_edit_Privilege').on('click', function () {
    //alert("hello"+$(this).attr('CUR_ID'));
    $('#edit_privilege_id').val($(this).attr('PRO_ID'));
    $('#edit_Privilege_name').val($(this).attr('PRO_NAME'));
    $('#edit_Privilege_name2').val($(this).attr('PRO_NAMEE'));
    $('#edit_Privilege_file').val($(this).attr('PRO_FILE_NAME'));
    $('#edit_Privilege_sys').val($(this).attr('PRO_SYS_NAME'));
    $('#edit_Privilege_status').val($(this).attr('PRO_FREEZE'));
    // if($(this).attr('privilege_status')==1)
    // {
    //   $('#edit_privilege_status').prop('checked', true);
    //   //$('#edit_privilege_status').val($(this).attr('privilege_status'));
    // }


    $('#modal-warning_privilege').show();

  });
  $('#edit_Privilege_cancel').on('click', function () {
    //alert("edit");
    $('#modal-warning_privilege').css("display", "none");

  });

  $('.btn_delete_Privilege').on('click', function () {
    //alert("btn_delete_Privilege");
    $('#delete_Privilege').val($(this).attr('PRO_ID'));
    $('#modal-danger_Privilege').css("display", "block");

  });




  $('#delete_Privilege_cancel').on('click', function () {
    //alert("delete_Privilege_cancel");
    $('#modal-danger_Privilege').css("display", "none");

  });





  $("#edit_Privilege").click(function () {

    if ($("#form_edit_Privilege").valid()) {
      //alert("check");
      //get value of each input for pass in the url ajax
      var privilege_id = $("#edit_privilege_id").val(),
        Privilege_name = $("#edit_Privilege_name").val(),
        Privilege_name2 = $("#edit_Privilege_name2").val(),
        Privilege_file = $("#edit_Privilege_file").val(),
        privilege_sys = $("#edit_Privilege_sys").val(),
        PRO_UPD_USER = $("#PRO_UPD_USER").val(),
        privilege_status = $('#edit_Privilege_status').val();
      
      
        // alert(privilege_id + '//'+Privilege_name+ '//'+ + '//'+ + '//'+ + '//'+);



      // if ($("#edit_privilege_status").is(":checked")) {
      //   privilege_status = 1;
      // } else {
      //   // //alert($('#privilege_status').is(":checked"));
      //   privilege_status = 0;
      // }

      $.ajax({
        type: "POST",
        url: "../../Controllers/PrivilegeController.php",
        data: {
          method: "edit_privilege",
          privilege_id: privilege_id,
          Privilege_name: Privilege_name,
          Privilege_name2: Privilege_name2,
          Privilege_file: Privilege_file,
          privilege_sys: privilege_sys,
          PRO_UPD_USER: PRO_UPD_USER,
          privilege_status: privilege_status,
        },
        success: function (result) {
          // alert(result)
          if (result == "true") {
            // //alert("data edited successfully");
            view_privilege();
            $('#modal-warning_privilege').css("display", "none");
            $('#modal_edit_privilege').css("display", "block");
            setTimeout(function () {
              $('#modal_edit_privilege').css("display", "none");
              window.location.reload();
            }, 1000);
          }
          else {
            //alert("error"+ result);
          }
        },
      });
    }
  });













  $("#delete_Privilege_btn").click(function () {
    privilege_id = $('#delete_Privilege').val();
    // alert(privilege_id);


    $.ajax({
      type: "POST",
      url: "../../Controllers/PrivilegeController.php",
      // data: "methode=chk_prog&privilege_id=" + privilege_id + "",
      data: {
        method: "chk_prog",
        privilege_id: privilege_id,
      },
      success: function (chkprogid) {
        // alert(chkprogid);

          if(chkprogid =='true')
          {

            $.ajax({
              type: "POST",
              url: "../../Controllers/PrivilegeController.php",
              data: {
                method: "delete_privilege",
                privilege_id: privilege_id,
              },
              success: function (result) {
                if (result == 'true') {
                  view_privilege();
                  $('#modal-default_Privilege').css("display", "none");
                  $('#modal_delete_privilege').css("display", "block");
                  setTimeout(function () {
                    $('#modal_delete_privilege').css("display", "none");
                    window.location.reload();
                  }, 1000);
                }
                else {
                  ////alert("error");
                }
              },
            });

          }
          else
          {
            alert("لا يمكنك حذف هذه الصلاحية لارتباطها بمستخدمين");
            $('#modal-danger_Privilege').css("display", "none");


          }
        }
          });



  });

});