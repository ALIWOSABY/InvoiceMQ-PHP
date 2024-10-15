<div class="row">
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#settings" data-toggle="tab" style="font-weight:bolder;">البيانات الشخصية</a></li>
            </ul>
            <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label pull-right">الاسم</label>
                            <div class="col-sm-10">
                                <label for="inputName" class="col-sm-2 control-label pull-right"> <?php echo $ens[0]->getSYS_User_name(); ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label pull-right">الفرع</label>

                            <div class="col-sm-10">
                                <label for="inputEmail" class="col-sm-2 control-label pull-right"><?php echo $ens[0]->getName_branch(); ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label pull-right">الايميل</label>

                            <div class="col-sm-10">
                                <label for="inputName" class="col-sm-2 control-label pull-right"> <?php echo $ens[0]->getSYS_User_email(); ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label pull-right">اسم المتسخدم</label>

                            <div class="col-sm-10">
                                <label for="inputExperience" class="col-sm-2 control-label pull-right"> <?php echo $ens[0]->getSYS_User_login(); ?></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="../../Assets/img/users.png" alt="User profile picture">
                <h3 class="profile-username text-center"><?php echo $ens[0]->getSYS_User_name(); ?></h3>

                <!-- <p class="text-muted text-center">مهندسة اعلامية</p> -->

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>مستخدمين نشطين</b> <a class="pull-left">

                            <?php
                            if (count($c_u_a) > 0) {
                                $c_u_active = count($c_u_a);
                                echo '<span class="label label-warning">' . $c_u_active . '</span>';
                            }
                            ?>


                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>مستخدمين غير نشطين</b> <a class="pull-left">
                            <?php
                            if (count($c_u_n_a) > 0) {
                                $c_u_not_active = count($c_u_n_a);
                                echo '<span class="label label-warning">' . $c_u_not_active . '</span>';
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>