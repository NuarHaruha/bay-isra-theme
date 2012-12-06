<?php global $current_user; $cid = $current_user->ID;?>
<?php $stockist_id = mc_get_userinfo($cid, 'stockist_id'); ?>
  <div class="accordion-group bg-trans">
    <div class="accordion-heading">
        <div class="content-header">
            <h4 class="page-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Stokis Info
            </a></h4>
        </div>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        <div class="content">
        <?php if (has_stockist() ): ?>
        <dl class="dl-horizontal">
            <dt>Stockist ID:</dt>
                <dd><?php t('span',mc_get_userinfo($cid, 'stockist_id'));?></dd>
            <dt>Name:</dt>
                <dd><?php t('a', mc_get_userinfo($cid, 'stockist_name'), array('href'=>'/ahli/'.mc_get_userinfo($cid, 'stockist_id').'/' ));?></dd>
            <dt>Payment Details:</dt>
                <dd>
                <?php $stockist = array(
                    'id'=> mc_get_current_user_stockist_id($cid),
                    'acc_name' => mc_get_userinfo($cid,'stockist_bank_account_name'),
                    'acc_no'   => mc_get_userinfo($cid,'stockist_bank_account_no'),
                    'acc_bank' => mc_get_userinfo($cid,'stockist_bank'),
                    'acc_branch' => mc_get_userinfo($cid,'stockist_bank_branch')
                );?>
                <?php echo $stockist['acc_name'].' - '.$stockist['acc_no'].' ('.$stockist['acc_bank'].', '.$stockist['acc_branch'].')'; ?></dd>
            <dt>Address</dt>
                <dd><?php mc_userinfo($stockist['id'],'address'); ?>, <?php mc_userinfo($stockist['id'],'city'); ?>, <?php echo ucwords(mc_get_userinfo($stockist['id'],'state')); ?></dd>
            <dt>Telephone:</dt>
                <dd><?php mc_userinfo($stockist['id'],'tel'); ?></dd>
            <dt>Email:</dt>   
                <dd><?php mc_userinfo($stockist['id'],'email'); ?></dd>  
        </dl>
        <input type="hidden" name="stockist_id" value="<?php echo $stockist['id'];?>"/>
        <?php else: ?>
            <div class="bg-trans-70 border-radius">
                <p class="block"> <i class="icon-warning-sign"></i> Sorry, it seem like you have no stockist assign to your account yet. Please contact your stockist or use our <a href="/hubungi-kami/">contact form</a>.</p>
            </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	/**
	 * @todo
     * 1. check current user location
     * 2. match current user stockist
     * 3. if not match found find the closet stokist
	 */
?>