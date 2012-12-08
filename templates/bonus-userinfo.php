<?php
global $current_user, $cid;
get_currentuserinfo();
?>
<div class="accordion" id="accordion2"><!-- start.accordion2 -->
    <div class="accordion-group bg-trans">
        <div class="accordion-heading">
            <div class="content-header">
                <h4 class="page-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Member account details</a></h4>
            </div>
        </div>
        <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner">
                <div class="content">
                    <dl class="dl-horizontal">
                        <dt>Member ID:</dt>
                        <dd><?php t('span',mdag_get_id_ahli($cid));?></dd>
                        <dt>Member Name:</dt>
                        <dd><?php t('a', mdag_get_full_name($cid), array('href'=>'/ahli/ubah-maklumat/'));?></dd>
                        <dt>e-Wallet:</dt>
                        <dd>RM <?php echo mc_currency_filter( (int) get_points_rm($cid));?></dd>
                        <dt>Total PV:</dt>
                        <dd><?php echo get_points_pv($cid);?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>