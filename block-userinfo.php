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
        <dt>Member Package:</dt>
            <dd>Basic</dd>      
        <dt>Last Purchase Valid Until:</dt>
            <dd>unlimited ( month(s), day(s) more)</dd>
         <?php if (is_page_template('page-products.php')): ?>   
        <dt>Auto Purchase Mode:</dt>   
            <dd>Enabled Disable</dd>              
        <dt>e-Wallet Balance:</dt>
            <dd><a href="/finances/e-wallet/">RM <?php echo apply_filters('mc_currency',uinfo($cid,MKEY::RM) );?></a><small class="db">Your e-wallet balance is not sufficient. You will need to make offline payment if you wish to proceed with a purchase.</small></dd>
        <?php endif; ?>          
    </dl>
    </div>
      </div>
    </div>
  </div>