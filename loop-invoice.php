<section id="product-history-data"><!-- begin.product-history-data -->
<div class="block bg-trans-50 border-light border-radius">
    <div class="content-header">
        <h4 class="page-title">Purchase Invoice Records</h4>
        <hr />
    </div>
    <div class="content">
    <?php global $cid; ?>    
    <?php $invoices = (isset($_REQUEST['get_invoice'])) ? mc_get_invoices_by_id($cid,$_REQUEST['get_invoice']) : mc_get_invoices_by_id($cid);?>        
    <?php $incremental_amount = 0; ?>      
    <table id="invoices-table" class="table">
        <thead class="bg-trans">
            <tr>
                <th>No.</th>
                <th>Invoice ID</th>
                <th>Date Ordered</th>
                <th>Total Items</th>
                <th>Product(s)</th>
                <th>Total Amount</th>
                <th>Status</th>
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
            <?php $incremental_amount += $invoice->total_amount;?>
            <?php $items = get_invoice_meta($invoice->invoice_id, 'orders'); ?>
            <?php $invoice_code = mc_get_invoice_id($invoice->invoice_id, $invoice->stockist_id);?>
            <tr>
                <td><small><?php echo $counter;?></small></td>
                <td><?php t('a',_t('small',$invoice_code), array('href'=>'/purchase/checkout-complete/?get_invoice='.$invoice->invoice_id) );?></td>
                <td><i class="icon-time"></i> 
                    <?php t('small',date("D, d M Y - h:m",strtotime($invoice->created_date)),array('class'=>'date date-invoice'));?>
                </td>
                <td><?php echo count($items['product_id']); ?></td>
                <td>
                <?php echo get_sku_list($items['sku']); ?>
                </td>
                <td>RM <?php echo apply_filters('mc_currency',$invoice->total_amount);?></td>
                <td><?php t('small',$invoice->order_status,array('class'=> 'status-'.$invoice->order_status));?></td>
            </tr>
            <?php $counter++;?>
            <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
        <?php if(has_invoices($cid)): ?>
        <tfoot>
            <tr>
                <th colspan="5">Total</th>
                <th><span id="total-amount-spend">RM <?php echo apply_filters('mc_currency',$incremental_amount); ?>   </span></th>
                <th></th>
            </tr>
        </tfoot>
        <?php endif; ?>
    </table>
    <?php //new dBug($invoices);?>
    </div>
</div>
</section><!-- end.product-history-data -->