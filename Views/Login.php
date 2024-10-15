<!DOCTYPE php>
<php>

  <head>
    <meta charset="UTF-8">
    <title> ســــجل حسابات الرعية | تسجيل الدخول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="../Assets/img/favicon.ico" type="image/x-icon">
    <!-- <link rel="icon" type="image/png" href="http://example.com/myicon.png"> -->
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Assets/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="../Assets/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../Assets/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../Assets/css/blue.css">
  </head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="Views/Login.php"><b>ســــجل حسابات الرعية</b></a>
      </div>
      <div class="login-box-body">

        <p class="login-box-msg">صفحة تسجيل الدخول</p>
        <form action="" method="post" class="needs-validation" novalidate>
          <div class="form-group has-feedback">
            <label>اسم المستخدم :</label>
            <input type="email" id="login" name="login" class="form-control" placeholder="اسم المستخدم او الايميل">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>


          <div class="form-group has-feedback">
            <label> كلمة المرور :</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="كلمة المرور">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-7">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox">تذكرني
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-5">
              <button type="button" id="btn_login" name="btn_login" onclick="return foo();" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="modal modal-info fade" id="nonactive_modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body" style="text-align: center;">
                <p>لم يتم تنشيط حسابك ، اطلب من المسؤول تفعيل حسابك</p>
                <br>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">الغاء</button>
                <div class="clearfix"></div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-danger fade" id="donnee_incorrect_modal">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-body" style="text-align: center;">
                <p>اسم المستخدم أو البريد الإلكتروني أو كلمة المرور غير صحيحة</p>
                <br>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">الغاء</button>
                <div class="clearfix"></div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>

        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->

      <script src="../Assets/js/jquery.min.js"></script>
      <!-- Bootstrap 3.3.4 -->
      <script src="../Assets/js/bootstrap.min.js"></script>
      <!-- iCheck -->
      <script src="../Assets/js/icheck.min.js"></script>
      <script src="../Assets/js/demo.js"></script>
      <script src="../Assets/js/login.js"></script>
      <script src="../Assets/js/validate.min.js"></script>

      <script>
        $(function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
          });
        });
      </script>


      <script>
        function setCookie(cname, cvalue, exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
          let expires = "expires=" + d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function foo() {
          var nameShopecookeies = $("#login").val();
          var number_cookeies = $("#login").val();

          setCookie("username", nameShopecookeies, 3000);
          setCookie("number_cookeies", number_cookeies, 3000);




          return true;
        }
      </script>

      <!-- <script>
        function checktxtbox() {
          if (document.urfrm.login.value != '' && document.urfrm.password.value != '') {
            document.urfrm.btn_login.disabled = false;
          } else {
            document.urfrm.btn_login.disabled = true;
          }
        }
      </script> -->

  </body>
</php>