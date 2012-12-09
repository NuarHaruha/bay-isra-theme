<?php global $current_user; $cid = $current_user->ID;?>
<?php $invoices = mc_get_invoices_for_id($cid, 'pending');?>
<section id="product-history-data"><!-- begin.product-history-data -->
<div class="block bg-trans-50 border-light border-radius">
    <div class="content-header">
        <h4 class="page-title">Members PIN request / Product Orders (<?php echo count($invoices);?>)</h4>
        <hr />
    </div>
    <div class="content">
    <?php $incremental_amount = 0; ?>
    <?php $incremental_unit = 0; ?>         
    <table id="data-products" class="table">
        <thead class="bg-trans">
            <tr>
                <!--
                <th>#</th> -->
                <th>Date</th>
                <th>Order by</th><!--
                <th>Sponsor</th>-->
                <th>Invoice</th>                
                <th>Items</th>
                <th>Amount</th>                
                <th>Reserved</th>
                <th></th>
            </tr>
        </thead>
        <tbody>            
            <?php if(!has_invoices($cid)): ?>
                <tr>
                    <td colspan="7"><i class="icon-info-sign"></i> We are very sorry, there is no information available at this time yet. Please make your <a href="/purchase/product/">purchase</a> first.</td>
                </tr>
            <?php else: ?> 
            <?php $counter = 1; ?>            
            <?php foreach($invoices as $invoice): ?>
            <?php $iid = $invoice->invoice_id; ?>
            <?php $items = get_invoice_meta($iid, 'orders'); ?>     
                               
            <?php $incremental_amount += $invoice->total_amount;?>
            <?php $incremental_unit += count($items['product_id']);?>

            <?php $invoice_code = mc_get_invoice_id($iid, $invoice->stockist_id);?>
            
            <?php $name = mc_get_userinfo($invoice->ordered_by,'name');?>
            <?php $code = mc_get_userinfo($invoice->ordered_by,'code');?>
            
            <?php
            // sponsor
            $sponsor_id = mc_get_userinfo($invoice->ordered_by,'parent_id');
            $sponsor_code = mc_get_userinfo($sponsor_id,'code');
            $sponsor_name = mc_get_userinfo($sponsor_id,'name');
            
            ?>
            <tr><!--
                <td><small><?php echo $counter;?></small></td>-->
                <td><i class="icon-time"></i> 
                    <?php t('small',date("D, d/m/Y",strtotime($invoice->created_date)),array('class'=>'date date-invoice'));?>
                    <?php t('small','since '.apply_filters('relative_time',$invoice->created_date), array('class'=>'db muted')); ?>
                </td>      
                <td class="row-name">
                    <?php t('small',$name);?>
                    <?php t('small',$code, array('class'=>'db muted'));?>
                </td> <!--
                <td class="row-sponsor">
                    <?php t('small',$sponsor_name);?>
                    <?php t('small',$sponsor_code, array('class'=>'db muted'));?>
                </td> -->
                <td>
                    <?php
                        $uri = '/purchase/checkout-complete/?get_invoice='.$invoice->invoice_id.'&ordered_by='.$invoice->ordered_by.'&view_invoice=1';
                    ?>
                    <?php t('a',_t('small',$invoice_code), array('href'=> $uri) );?>
                </td>
                <td>
                    <span class="muted"><?php echo get_sku_list($items['sku']); ?></span>
                    
                </td>
                <td><small>
                    RM <?php echo apply_filters('mc_currency',$invoice->total_amount);?></small>                    
                </td>                
                <td class="row-reserved-pin">
                    <input type="text" name="reserved_pin[<?php echo $iid;?>]" value="<?php echo generate_epin($cid);?>" class="muted bg-trans-50 border-light">
                </td>
                <td>
                    <div class="btn-group">
                      <button class="btn btn-success btn-mini" title="Accept Pin Request"><i class="icon-ok"></i></button>
                      <button class="btn btn-danger btn-mini" title="Cancel Pin Request" data-invoice="<?php echo $iid;?>" data-toggle="modal" data-target="#cancel-modal"><i class="icon-remove"></i></a>
                    </div>                
                </td>
            </tr>
            <?php $counter++;?>
            <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
        <?php if(has_invoices($cid)): ?>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>Quantity <?php echo $incremental_unit;?></th>
                <th colspan="3"><span id="total-amount-spend">RM <?php echo apply_filters('mc_currency',$incremental_amount); ?>   </span></th>
                
            </tr>
        </tfoot>
        <?php endif; ?>
    </table>
    <script>
        jQuery(document).ready(function($){
            $('.btn-danger').click(function(){
               $('#cancel_invoice_id').val($(this).data('invoice')); 
               if (console){
                console.log($(this).data('invoice'));
               }
            }); 
        });
    </script>
                    <!-- cancel modal -->
                    <div id="cancel-modal" class="modal hide fade">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3>Cancel PIN Transfer</h3>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure! do you really want to cancel this request?</p>
                      </div>
                      <div class="modal-footer">
                        <form action="" method="post">
                            <input name="action" type="hidden" value="modal_delete">
                            <input id="cancel_invoice_id" name="invoice_id" type="hidden" value="">
                            <input name="order_status" type="hidden" value="cancel">
                            <a href="#" class="btn" data-dismiss="modal">Close</a>
                            <button class="btn" type="submit">Proceed</button>                        
                        </form>
                      </div>
                    </div>  
                    <!-- end.modal -->      
    <?php //new dBug($invoices);?>
    </div>
</div>
</section><!-- end.product-history-data -->
<?php if (!empty($invoices) ): ?>
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