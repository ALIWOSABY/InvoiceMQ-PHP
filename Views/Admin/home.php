<div class="row">


    <div class="col-lg-3 col-xs-6" style="direction:rtl;float:right;">
        <!-- small box -->
        <div class="small-box bg-yellow">
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
                <p> العملاء </p>
            </div>
            <div class="icon">
                <i class="fa fa-fw fa-list-ol"></i>
            </div>
            <a href="<?php echo base_url ?>Admin/?page=p_c" class="small-box-footer"> عرض <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6" style="direction:rtl;float:right;">
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
            <a href="<?php echo base_url ?>Admin/?page=p_s" class="small-box-footer"> عرض <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div><!-- ./col -->
</div>