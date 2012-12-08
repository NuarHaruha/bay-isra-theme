<?php global $current_user; $cid = $current_user->ID;?>
<?php
    $is_view = false;
    if (!isset($_REQUEST['view_invoice'])){
        $invoices = (isset($_REQUEST['get_invoice'])) ? mc_get_last_invoices_by_id($cid, $_REQUEST['get_invoice']) : mc_get_last_invoices_by_id($cid);
        $invoice = $invoices[0];
        $is_view = false;
    } else {
        $is_view = true;
        $invoices = get_order_invoice($_REQUEST['ordered_by'], $_REQUEST['get_invoice']);
        $invoice = $invoices[0];
    }
?>


<section id="invoice-summary-data"><!-- begin.invoice-chart-data -->
<div class="block bg-trans-50 border-light border-radius">
    <div class="content-header">
        <h4 class="page-title">Invoice Summary</h4>
            <div>
            <p class="pull-right">Invoice ID: <strong><?php echo mc_get_invoice_id($invoice->invoice_id,$invoice->stockist_id);?></strong>&nbsp;

            </p>
        <p>Ordered on <i class="icon-time"></i> <?php echo date("D d M Y", strtotime($invoice->created_date));?></p>
    </div>
        <hr />
    </div>
    <?php //var_dump($invoices);?>
    <div class="content">        
        <table class="table">
            <thead class="bg-trans">
                <tr>
                    <th>No.</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
<?php $items = get_invoice_meta($invoice->invoice_id, 'orders', false); ?>
                <?php if (count($items) >= 0): ?>
                <?php $counter = 1; ?> 
                <?php $item = $items[0]; ?> 
                <?php foreach($item['product_id'] as $index => $price_amount): ?>
                <tr>
                    <td><small><?php echo $counter; ?></small></td>
                    <td>
                        <?php t('a', _t('small',get_the_title($index)), array('href'=> get_permalink($index)) );?>
                    </td>
                    <td><?php t('small',$item['quantity'][$index]); ?></td>
                    <td><?php t('small', 'RM '.apply_filters('mc_currency',$item['price'][$index])); ?></td>
                    <td><?php t('span', 'RM '.apply_filters('mc_currency',$price_amount) ); ?></td>
                </tr>
                <?php $counter++;?>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <th><?php t('span', 'RM '.apply_filters('mc_currency',$invoice->total_amount) ); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</section>
<script src="<?php echo get_template_directory_uri(); ?>/library/js/print.js"></script>