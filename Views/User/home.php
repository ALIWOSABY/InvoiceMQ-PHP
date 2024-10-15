<div class="row">


    <div class="col-lg-3 col-xs-6" style="direction:rtl; float: right;">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    <?php
                    if (count($SP) > 0) {
                        $count1 = count($SP);
                        echo  $count1;
                    } else {
                        echo 0;
                    }
                    ?>
                </h3>
                <p>الموردين</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url ?>User/?page=p_s" class="small-box-footer"> عرض <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>


    <div class="col-lg-3 col-xs-6" style="direction:rtl; float: right;">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    <?php
                    if (count($CT) > 0) {
                        $count_b = count($CT);
                        echo  $count_b;
                    } else {
                        echo 0;
                    }
                    ?>
                </h3>
                <p>العملاء</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url ?>User/?page=p_c" class="small-box-footer"> عرض <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>


    <div class="col-lg-3 col-xs-6" style="direction:rtl; float: right;">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php
                    if (count($vtsup) > 0) {
                        $VT_S = count($vtsup);
                        echo  $VT_S;
                    } else {
                        echo 0;
                    }
                    ?>
                </h3>
                <p> القيود اليومية للموردين </p>
            </div>
            <div class="icon">
                <i class="fa fa-fw fa-tasks"></i>
            </div>
            <a href="<?php echo base_url ?>User/?page=p_m_supp" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>


    <div class="col-lg-3 col-xs-6" style="direction:rtl; float: right;">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php
                    if (count($vtsup) > 0) {
                        $VT_S = count($vtsup);
                        echo  $VT_S;
                    } else {
                        echo 0;
                    }
                    ?>
                </h3>
                <p>القيود اليومية للعملاء</p>
            </div>
            <div class="icon">
                <i class="fa fa-fw fa-tasks"></i>
            </div>
            <a href="<?php echo base_url ?>User/?page=p_m_cust" class="small-box-footer">عرض<i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>



</div>
<!-- /.row -->