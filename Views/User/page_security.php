<?php
//$sec = $_SESSION['security'];
$Acc  = $_SESSION['accounts'];

$br = $_SESSION['branch'];
$priv =  $_SESSION['Privilege'];
?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">المستخدم :
      <?php for ($i = 0; $i < count($Acc); $i++) {

        if ($Acc[$i]->getCUS_ID() == $_GET['data'])
          echo  $Acc[$i]->getCUS_NAME();
      }
      ?>
    </h3>
    <div class="box-tools pull-right">

    </div>
  </div>
  <!-- /.box-header -->

  <div class="box-body">
    <div class="row">
      <form action="" id="form_add_Securitiy" method="post" enctype="multipart/form-data">
        <?php

        if (isset($_GET['data'])) {
          $id  = $_GET["data"];
        } else {
          $id  = "1";
        }
        $stmt = mysqli_query($conn, "select u.Analytic_Acc_id,u.USE_BRA_ID,u.SYS_User_name,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status from userss u where u.SYS_User_status=1 and u.Analytic_Acc_id =$id");
        while ($row = mysqli_fetch_array($stmt)) :
        ?>


          <div class="col-md-3">
            <div class="form-group">
              <label>رقم المستخدم:</label>
              <input type="text" name="SEC_USE_ID" id="SEC_USE_ID" class="form-control" style="text-align: center;" value="<?= $row['Analytic_Acc_id'] ?>" readonly />

            </div>

          </div>



          <!-- <div class="col-md-3">
                <div class="form-group">
                  <label>أسم المستخدم:</label>
                  <input type="text" class="form-control" name="SEC_USE_NAME" id="SEC_USE_NAME" value="< $row['SYS_User_name'] ?>" readonly />
                </div>
           
              </div> -->





          <div class="col-md-3">
            <div class="form-group has-feedback">
              <label>رقم الفرع:</label>
              <input type="hidden" class="form-control" id="SECBRAID" name="SECBRAID" value="<?= $row['USE_BRA_ID'] ?>">
              <select id="SEC_BRA_ID" name="SEC_BRA_ID" class="form-control" disabled>
                <option value="">تحديد الفرع</option>
                <?php
                for ($i = 0; $i < count($br); $i++) {
                  echo '<option value="' . $br[$i]->getBranch_id() . '">' . $br[$i]->getBranch_desc() . '</option>';
                }
                ?>
              </select>
            </div>
          </div>
        <?php endwhile; ?>

        <!-- /.box-footer -->
      </form>






    </div>
    <!-- /.row -->
  </div>
  <div class="box-body">
    <!-- <button type="button" class="btn btn-success">الغاء</button> -->
    <!-- <button type="button" class="btn btn-success" id="add_ens_security" data-toggle="modal">
          حفظ
        </button> -->
    <button type="button" class="btn btn-primary" id="add_all_security" data-toggle="modal">
      أضافة جميع الصلاحيات
    </button>
  </div>
</div>




<div class="box box-primary">
  <!-- <div class="box-header with-border">           
          </div> -->
  <div class="box-header">
    <div class="card-header">
      <h3 class="box-title" style="text-align:center;">الصلاحيات</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body SCU_ID" dir="rtl" style="text-align: center;">

      <table id="securtiy_id" class="table table-bordered table-striped" style="text-align: center;">
        <thead>
          <tr>
            <th style="text-align:center;">رمز الصلاحية</th>
            <th style="text-align:center;">وصف الصلاحية</th>
            <th style="text-align:center;">أضافة</th>
            <th style="text-align:center;">تعديل</th>
            <th style="text-align:center;">حذف</th>
            <th style="text-align:center;">عرض</th>
            <th style="text-align:center;">التفعيل</th>
            <th style="text-align:center;">تفعيل/الغاء تفعيل مستخدم</th>
            <th style="text-align:center;">منح الصلاحيات لامستخدم</th>
            <th style="text-align:center;">تعديل سعر الصرف</th>
            <th style="text-align:center;">ترحيل قيد للمراجعه</th>
            <th style="text-align:center;">تعديل تاريخ العملية</th>
            <th style="text-align:center;">أعتماد القيد</th>
            <th style="text-align:center;">رفض القيد</th>

            <th style="text-align:center;">العمليات</th>

          </tr>
        </thead>
        <tbody>

          <?php

          if (isset($_GET['data'])) {
            $id  = $_GET["data"];
          } else {
            $id  = "1";
          }
          $stmt = mysqli_query($conn, "select * from securities where SEC_USE_ID = $id");
          while ($row = mysqli_fetch_array($stmt)) :
          ?>

            <td><?php echo $row['SEC_PRO_ID'] ?></td>
            <td> <?php
                  $p = $_SESSION['Privilege'];
                  for ($N = 0; $N < count($p); $N++) {
                    if ($p[$N]->getPRO_ID() == $row['SEC_PRO_ID']) {
                      echo $p[$N]->getPRO_NAME();
                    }
                  }  ?></td>


            <td> <?php if ($row['SEC_INSERT'] == 'Y') { ?>
                <input type="checkbox" id="myCheck_INSERT" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="myCheck_INSERT" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_UPDATE'] == 'Y') { ?>
                <input type="checkbox" id="myCheck_UPDATE" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="myCheck_UPDATE" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_DELETE'] == 'Y') { ?>
                <input type="checkbox" id="myCheck_DELETE" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="myCheck_DELETE" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_SHOW'] == 'Y') { ?>
                <input type="checkbox" id="myCheck_SHOW" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="myCheck_SHOW" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_FREEZE'] == 'Y') { ?>
                <input type="checkbox" id="myCheck_FREEZE" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="myCheck_REEZE" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_10'] == 'Y') { ?>
                <input type="checkbox" id="mySEC_10" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="mySEC_10" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_11'] == 'Y') { ?>
                <input type="checkbox" id="mySEC_11" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="mySEC_11" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_12'] == 'Y') { ?>
                <input type="checkbox" id="mySEC_12" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="mySEC_12" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_13'] == 'Y') { ?>
                <input type="checkbox" id="mySEC_13" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="mySEC_13" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_14'] == 'Y') { ?>
                <input type="checkbox" id="mySEC_14" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="mySEC_14" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_15'] == 'Y') { ?>
                <input type="checkbox" id="mySEC_15" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="mySEC_15" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td> <?php if ($row['SEC_16'] == 'Y') { ?>
                <input type="checkbox" id="mySEC_16" value='Y' checked style="pointer-events: none;">

              <?php } else { ?>
                <input type="checkbox" id="mySEC_16" value='N' style="pointer-events: none;">
              <?php  }  ?>

            </td>
            <td class="box-footer">
              <button type="button" id="btn_edit_security" SEC_BRA_ID="<?php echo $row['SEC_BRA_ID']; ?>" SEC_USE_ID="<?php echo $row['SEC_USE_ID']; ?>" SEC_PRO_ID="<?php echo $row['SEC_PRO_ID']; ?>" SEC_INSERT="<?php echo $row['SEC_INSERT']; ?>" SEC_UPDATE="<?php echo $row['SEC_UPDATE']; ?>" SEC_DELETE="<?php echo $row['SEC_DELETE']; ?>" SEC_SHOW="<?php echo $row['SEC_SHOW']; ?>" SEC_FREEZE="<?php echo $row['SEC_FREEZE']; ?>" SEC_10="<?php echo $row['SEC_10'] ?>" SEC_11="<?php echo $row['SEC_11'] ?>" SEC_12="<?php echo $row['SEC_12'] ?>" SEC_13="<?php echo $row['SEC_13'] ?>" SEC_14="<?php echo $row['SEC_14'] ?>" SEC_15="<?php echo $row['SEC_15'] ?>" SEC_16="<?php echo $row['SEC_16'] ?>" SEC_ID="<?php echo $row['SEC_ID']; ?>" class="btn btn-primary" data-toggle="modal"> <i class="fa fa-edit" aria-hidden="true">
                </i>
              </button>
            </td>
            <!-- <td><input type="checkbox" id="myCheck_show"></td> -->
            </tr>
          <?php endwhile; ?>


        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div><!-- /.box -->
</div>
<!-- /.col -->

<div class="modal" id="modal_edit_security" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
        <h4 class="modal-title">تعديل الصلاحيات للمستخدم </h4>
      </div>
      <div class="modal-body">


        <form action="" id="form_edit_security" method="post" enctype="multipart/form-data">

          <input type="hidden" id="SEC_ID_edit">
          <div class="box-body">
            <div dir="rtl" style="text-align: center;">
              <table class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                  <tr>
                    <th width="10%" style="text-align: center;">رقم الصلاحية</th>
                    <th width="40%" style="text-align: center;">أسم الصلاحية</th>
                    <th width="10%" width="10%" style="text-align: center;">اضافة</th>
                    <th width="10%" style="text-align: center;">تعديل</th>
                    <th width="10%" style="text-align: center;">حذف</th>
                    <th width="10%" style="text-align: center;">عرض</th>
                    <th width="10%" style="text-align: center;">تفعيل</th>

                    <th width="10%" style="text-align: center;">تفعيل/الغاء مستخدم</th>
                    <th width="10%" style="text-align: center;">منح الصلاحيات لامستخدم</th>
                    <th width="10%" style="text-align: center;">تعديل سعر الصرف</th>
                    <th width="10%" style="text-align: center;">ترحيل قيد للمراجعه</th>
                    <th width="10%" style="text-align: center;">فتح التاريخ العملية</th>
                    <th width="10%" style="text-align: center;">أعتماد القيد</th>
                    <th width="10%" style="text-align: center;">رفض القيد</th>

                  </tr>
                </thead>


                <tbody>
                  <tr>
                    <td> <input type="text" id="SEC_PRO_ID_edit" name="SEC_PRO_ID_edit" class="form-control" style="width:100%;text-align: center;" disabled></td>
                    <td> <select name="PRO_NAME_edit" id="PRO_NAME_edit" class="form-control" style="width:100%;" disabled>
                        <?php
                        $pg = $_SESSION['Privilege'];
                        for ($v = 0; $v < count($pg); $v++) {
                          echo '<option value="' . $pg[$v]->getPRO_ID() . '">' . $pg[$v]->getPRO_NAME() . '</option>';
                        }
                        ?>
                      </select></td>
                    <td> <input type="checkbox" id="SEC_INSERT_edit" name="SEC_INSERT_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_UPDATE_edit" name="SEC_UPDATE_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_DELETE_edit" name="SEC_DELETE_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_SHOW_edit" name="SEC_SHOW_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_FREEZE_edit" name="SEC_FREEZE_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_10_edit" name="SEC_12_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_11_edit" name="SEC_13_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_12_edit" name="SEC_14_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_13_edit" name="SEC_13_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_14_edit" name="SEC_14_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_15_edit" name="SEC_15_edit" style="width:100%;"></td>
                    <td> <input type="checkbox" id="SEC_16_edit" name="SEC_16_edit" style="width:100%;"></td>



                  </tr>
                </tbody>
              </table>
            </div>



          </div>




      </div>

      <!-- <div class="row"> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" id="btn_cancel_sec" data-dismiss="modal">الغاء</button>
        <button type="button" id="btn_security_edit" class="btn btn-primary">حفظ</button>
      </div>
      <!-- </div> -->








    </div>





    </form>









  </div>
</div>


<div class="modal modal-primary" id="mod_edt_security" style="display:none">
  <div class="modal-dialog">
    <div class="modal-body">
      <p style="text-align: center;">تم تعديل البيانات بنجاح&hellip;</p>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
