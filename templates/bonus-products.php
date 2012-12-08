<?php global $current_user; $cid = $current_user->ID;?>
<?php $transactions = get_bonus_pv($cid); ?>
<table id="data-products" class="table">
    <thead class="bg-trans">
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Descriptions</th>
        <th>Status</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody id="data-results">
    <?php if (!empty($transactions) ): ?>
        <?php $total = 0; ?>
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
            <td><small style=""></small></td>
            <td><?php echo $v->bonus_value;?></td>
        </tr>
            <?php if ($v->bonus_type == BTYPE::BONUS_TYPE_PV){
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
        <?php echo $total;?> PV
        <?php endif; ?>
    </th>
    </tfoot>
</table>
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