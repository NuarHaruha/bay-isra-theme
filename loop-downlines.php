<?php global $cid; ?>    
<?php $downlines = get_downline_by_id($cid);?>        
<?php $incremental_amount = 0; ?>  
<section id="downlines-data"><!-- begin.downlines-data -->
<div class="block bg-trans-50 border-light border-radius">
    <div class="content-header">
        <p class="pull-right">
            <small>
            Total Downlines: <strong><?php echo count($downlines);?></strong> Members &nbsp;
            </small>
        </p>
        <h4 class="page-title">Downlines</h4>
        <hr />
    </div>
    <div class="content">    
    <table id="invoices-table" class="table">
        <thead class="bg-trans">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Member ID</th>
                <th>Telephone</th>
                <th>City</th>
                <th>Status</th>
                <th>Last Purchase</th>
                <th>Order Status</th>
            </tr>
        </thead>
        <tbody>            
            <?php if(!has_count($downlines) || empty($downlines)): ?>
                <tr>
                    <td colspan="7"><i class="icon-info-sign"></i> We are very sorry, there is no information available at this time yet. Please make your <a href="/purchase/product/">purchase</a> first.</td>
                </tr>
            <?php else: ?> 
            <?php $counter = 1; ?>  
            <?php //var_dump($downlines); exit();?>          
            <?php foreach($downlines as $downline): ?>  
            
            <?php $user_id      = $downline->id; ?>
            <?php $name         = mc_get_userinfo($user_id,'name');?>
            <?php $status       = mc_get_userinfo($user_id,'status'); ?>
            
            <?php $lp_date      = get_last_purchased_date($user_id); ?>
            
            
            <?php if (!empty($lp_date)){
                $lp_date = date("D, d M Y", strtotime($lp_date));                
            } ?>
            
            <?php $lp_date      = (!empty($lp_date)) ? _t('i','',array('class'=>'icon-time')).' '.$lp_date : 
                                    _t('span','n/a',array('class'=>'muted')); ?>
            
            <?php $lp_status    = get_last_purchased_status($user_id); ?>
            <?php $lp_status    = (!empty($lp_status)) ? $lp_status :  _t('span','n/a',array('class'=>'muted')); ?>
            
            <tr>
                <td><?php t('small',$counter); ?></td>
                <td><?php t('a',$name,array('href'=>'/profile/?uid='.$user_id)); ?></td>
                <td><?php t('small',mc_get_userinfo($user_id,'code')); ?></td>
                <td><?php t('small',mc_get_userinfo($user_id,'tel')); ?></td>
                <td><?php t('small',mc_get_userinfo($user_id,'city')); ?></td>
                <td><?php t('small', ucwords($status), array('class'=>'status-'.$status) ); ?></td>
                <td><?php t('small',$lp_date); ?></td>
                <td><?php t('small', $lp_status); ?></td>
            </tr>
            <?php $counter++;?>
            <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
        <?php if(has_count($downlines)): ?>
        <tfoot>
            <tr>
                <th colspan="8"></th>
                
            </tr>
        </tfoot>
        <?php endif; ?>
    </table>
    <?php //new dBug($downlines);?>
    </div>
</div>
</section><!-- end.downlines-data -->