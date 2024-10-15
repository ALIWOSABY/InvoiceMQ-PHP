<footer class="main-footer">
  <div class="pull-left hidden-xs">
    <b>اصدار</b> V1.0.1
  </div>
  <strong>حقوق النشر &copy; 2023-2024 <a href="<?php echo base_url ?>User/">حسابات الرعية</a>.</strong> جميع الحقوق محفوظة.
</footer>






<script src="../../Assets/js/jquery.min.js"></script>
<script src="../../Assets/js/validate.min.js"></script>
<script src="../../Assets/js/adminlte.min.js"></script>
<script>
  CKEDITOR.replace('txtcorp');
</script>
<script src="../../Assets/js/bootstrap.min.js"></script>
<script src="../../Assets/js/select2.full.min.js"></script>
<script src="../../Assets/js/jquery.inputmask.js"></script>
<script src="../../Assets/js/jquery.inputmask.date.extensions.js"></script>
<script src="../../Assets/js/jquery.inputmask.extensions.js"></script>
<script src="../../Assets/js/moment.min.js"></script>
<script src="../../Assets/js/daterangepicker.js"></script>
<script src="../../Assets/js/bootstrap-colorpicker.min.js"></script>
<script src="../../Assets/js/bootstrap-timepicker.min.js"></script>
<script src="../../Assets/js/jquery.slimscroll.min.js"></script>
<script src="../../Assets/js/icheck.min.js"></script>
<script src="../../Assets/js/fastclick.min.js"></script>
<script src="../../Assets/js/app.min.js"></script>
<script src="../../Assets/js/jquery.dataTables.min.js"></script>
<script src="../../Assets/js/dataTables.bootstrap.min.js"></script>
<script src="../../Assets/js/lib/fastclick.js"></script>
<script src="../../Assets/js/demo.js"></script>
<script src="../../Assets/js/file-explore.js"></script>
<script src="../../Assets/js/jquery-ui.min.js"></script>
<script src="../../Assets/js/dataTables.buttons.min.js"></script>
<script src="../../Assets/js/jszip.min.js"></script>
<script src="../../Assets/js/pdfmake.min.js"></script>
<script src="../../Assets/js/vfs_fonts.js"></script>
<script src="../../Assets/js/buttons.html5.min.js"></script>





<script src="../../Assets/js/edit_login_inactive.js"></script>
<script src="../../Assets/js/edit_login_active.js"></script>
<script src="../../Assets/js/useractive.js"></script>
<script src="../../Assets/js/privilege.js"></script>
<script src="../../Assets/js/security.js"></script>
<script src="../../Assets/js/paramerters.js"></script>
<script src="../../Assets/js/supp.js"></script>
<script src="../../Assets/js/cust.js"></script>
<script src="../../Assets/js/VT_C .js"></script>
<script src="../../Assets/js/VT_S.js"></script>
<script src="../../Assets/js/typ.js"></script>
<script src="../../Assets/js/r_sup.js"></script>
<script src="../../Assets/js/r_cust.js"></script>






<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<script>
  $(function() {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {
      placeholder: "dd/mm/yyyy"
    });
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {
      placeholder: "mm/dd/yyyy"
    });
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $("#reservation").daterangepicker();
    //Date range picker with time picker
    $("#reservationtime").daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: "MM/DD/YYYY h:mm A",
    });
    //Date range as a button
    $("#daterange-btn").daterangepicker({
        ranges: {
          Today: [moment(), moment()],
          Yesterday: [
            moment().subtract(1, "days"),
            moment().subtract(1, "days"),
          ],
          "Last 7 Days": [moment().subtract(6, "days"), moment()],
          "Last 30 Days": [moment().subtract(29, "days"), moment()],
          "This Month": [
            moment().startOf("month"),
            moment().endOf("month"),
          ],
          "Last Month": [
            moment().subtract(1, "month").startOf("month"),
            moment().subtract(1, "month").endOf("month"),
          ],
        },
        startDate: moment().subtract(29, "days"),
        endDate: moment(),
      },
      function(start, end) {
        $("#reportrange span").html(
          start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
        );
      }
    );

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: "icheckbox_minimal-blue",
      radioClass: "iradio_minimal-blue",
    });
    //Red color scheme for iCheck
    $(
      'input[type="checkbox"].minimal-red, input[type="radio"].minimal-red'
    ).iCheck({
      checkboxClass: "icheckbox_minimal-red",
      radioClass: "iradio_minimal-red",
    });
    //Flat red color scheme for iCheck
    $(
      'input[type="checkbox"].flat-red, input[type="radio"].flat-red'
    ).iCheck({
      checkboxClass: "icheckbox_flat-green",
      radioClass: "iradio_flat-green",
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false,
    });
  });
</script>

<script>
  $(document).ready(function() {
    $(".file-tree").filetree();
  });
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + './Assets/js/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
  })();
</script>




<script>
  $(function() {
    $("#user_id").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });

    $("#supp_id_tb").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });


    $("#cust_id_tb").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });

    $("#any_acct_id").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });

    
    $("#Group_table").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });


 
    $("#privilege_table").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });

    $("#Tb_Sup_ID").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });

    $("#Tb_Csut_ID").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });

    $("#securtiy_id").DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]
    });
  });

  document.getElementById('errorAlert').addEventListener('click', function() {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Something went wrong!',
      footer: '<a href>Why do I have this issue?</a>'
    })
  });
</script>

<script>
  $(document).ready(function() {
    var empDataTable = $('#TYP_ID').DataTable({
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "ابحث:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },
      "info": false,
      dom: 'Blfrtip',
      buttons: [{
          extend: 'copy',
        },
        // {
        //   extend: 'pdf',
        //   exportOptions: {
        //     columns: [0, 1] // Column index which needs to export
        //   }
        // },
        // {
        //   extend: 'csv',
        // },
        {
          extend: 'excel',
        }
      ]

    });

  });
</script>


<script>
  var page;
  $(document).ready(function() {
    page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    page = page.replace(/\//gi, '_');
    // alert(page)

    if ($('.nav-link' + page).length > 0) {
      alert(page)
      $('.nav-link' + page).addClass('active')
      $('.nav-link' + page).removeClass('text-light text-dark text-primary')
      $('.nav-link' + page).addClass('text-reset')
      if ($('.nav-link' + page).hasClass('tree-item') == true) {
        $('.nav-link' + page).closest('.treeview').siblings('a').addClass('active')
        $('.nav-link' + page).closest('.treeview').siblings('a').removeClass('text-light text-dark text-primary')
        $('.nav-link' + page).closest('.treeview').siblings('a').addClass('text-reset')
        $('.nav-link' + page).closest('.treeview').parent().addClass('menu-open')
      }
      if ($('.nav-link' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link' + page).parent().addClass('menu-open')
      }

    }

    $('#receive-nav').click(function() {
      $('#uni_modal').on('shown.bs.modal', function() {
        $('#find-transaction [name="tracking_code"]').focus();
      })
      uni_modal("Enter Tracking Number", "transaction/find_transaction.php");
    })
  })
</script>



</body>

</html>