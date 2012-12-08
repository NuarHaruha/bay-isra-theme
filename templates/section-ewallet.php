<?php global $current_user; $cid = $current_user->ID;?>
<?php $transactions = get_bonus_rm($cid); ?>
<section id="ewallet-data"><!-- begin.ewallet-data -->
<div class="block bg-trans-50 border-light border-radius">     
    <div class="content-header">
        <h4 class="page-title">Transaction Summary</h4>
            <div>
            <p class="pull-right">Total E-Wallet: <strong> <?php echo get_currency(); ?> <?php echo apply_filters('mc_currency', (int) uinfo($cid,MKEY::RM) );?></strong>&nbsp;</p>
        <p>Date <i class="icon-time"></i> <?php echo date("D d M Y");?></p>
    </div>
        <hr />
    </div><!-- end.content-header -->
    <div class="content">      
        <nav class="nav-transaction clearfix">        
            <ul class="nav nav-pills">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown"href="#">
                    Transaction type <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">In: Bonus</a></li>
                    <li><a href="#">In: Deposit</a></li>
                    <li><a href="#">Out: Withdraw</a></li>
                    <li><a href="#">Out: Internal Usage</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown"href="#">
                    Duration <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">1 Weeks</a></li>
                    <li><a href="#">2 Weeks</a></li>
                    <li><a href="#">1 Months</a></li>
                    <li><a href="#">1 years</a></li>
                    <li><a href="#">All</a></li>
                </ul>
              </li>  
            </ul>
        </nav> 
        <table id="data-products" class="table">
            <thead class="bg-trans">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Descriptions</th>
                    <th>Status</th>
                    <th>Total (<?php echo get_currency(); ?>)</th>                    
                </tr>
            </thead>
            <tbody id="data-results">
            <?php $total = 0; ?>
<?php if (!empty($transactions) ): ?>

            <?php $cnt = 1; ?>
           <?php foreach($transactions as $k=>$v):?>
               <tr>
                   <td><?php echo $cnt;?></td>
                    <td>
                        <i class="icon-time"></i>  <small class=""><?php echo date("d M, Y");?></small>
                        <?php t('small',get_relative_time($v->timestamp), array('class'=>'muted'));?>
                    </td>
                    <td>
                        <small style=""><?php echo $v->bonus_title;?></small>
                    </td>
                    <td><small style="">PAID</small></td>
                    <td><?php echo $v->bonus_type.' '.mc_currency_filter( (int) $v->bonus_value);?></td>
                </tr>
    <?php
     if ($v->bonus_type == BTYPE::BONUS_TYPE_RM){
        $total += $v->bonus_value;
    }
    ?>
    <?php $cnt++; ?>
           <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="5">Sorry there is no transaction available yet.</td>
    </tr>
    <?php endif; ?>
            </tbody>
            
            <tfoot>
                <th colspan="3"></th>
                <th>Total</th>
                <th>
                    <?php if (!empty($transactions) ): ?>
                    RM <?php echo mc_currency_filter($total);?>
                    <?php endif; ?>
                </th>
            </tfoot>
        </table>
    </div><!-- end.content -->  
</div>
</section><!-- end.ewallet-data -->
<?php if (!empty($transactions) ): ?>
<script>jQuery(document).ready(function($){
    $('#data-products').dataTable({
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });

    // paginate wrapper
    $('#data-products_paginate').addClass('btn-group');
    // paginate links
    $('#data-products_paginate a').addClass('btn btn-small');

})  ;</script>
<script src="<?php echo get_template_directory_uri(); ?>/library/js/dtable.min.js"></script>
<?php endif; ?>