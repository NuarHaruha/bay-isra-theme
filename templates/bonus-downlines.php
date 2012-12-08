<?php global $current_user; $cid = $current_user->ID;?>
<table class="table">
    <thead class="bg-trans">
    <tr>
        <th>LV</th>
        <th style="text-align: center;">Downlines</th>
        <th style="text-align: center;"><small>Ttl. Orders</small></th>
        <th style="text-align:center"><i class="icon-group"></i> Group PV</th>
        <th align="right">75PV</th>
        <th>Total</th>
        <th align="right">35PV</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody id="data-results">

    <?php $downlines    = get_count_downlines($cid);?>
    <?php $sales        = mc_get_all_downlines_orders_count($cid,'sales');?>
    <?php $total_sales  = mc_get_all_downlines_orders_count($cid);?>
    <?php $pv = mc_get_all_downlines_pv($cid);?>

    <?php $bonus75_pv = array(1=>10,2=>8,3=>7,4=>6,5=>5,6=>4,7=>3,8=>2);?>
    <?php $bonus35_pv = array(1=>5,2=>4,3=>3.5,4=>3,5=>2.5,6=>2,7=>1.5,8=>1);?>
    <?php $total75 = $total35 = 0;?>
        <?php foreach(range(1,8) as $i): ?>
        <tr>
            <td align="center"><?php t('strong', $i) ?></td>
            <td style="text-align:center"><?php echo $downlines[$i];?></td>
            <td style="text-align:center">
                <?php echo $sales[$i].'/'.$total_sales[$i]; ?>
            </td>
            <td style="text-align:center"><?php echo $pv[$i];?></td>
            <td class="text-right active">
                <div class="progress progress-striped active">
                    <div class="bar bar-success" style="width:<?php echo $bonus75_pv[$i]*10;?>%;"><?php echo $bonus75_pv[$i];?>%</div>
                </div>
            </td>
            <td>
                <?php $max = get_amount_percent($pv[$i], $bonus75_pv[$i] ); ?>
                <?php $total75 += $max; ?>
                RM <?php echo mc_currency_filter($max);?>
            </td>
            <td align="right">
                <div class="progress progress-striped active">
                    <div class="bar bar-warning" style="width:<?php echo $bonus35_pv[$i]*10;?>%;"><?php echo $bonus35_pv[$i];?>%</div>
                </div>
            </td>
            <td>
                <?php $min = get_amount_percent($pv[$i], $bonus35_pv[$i] ); ?>
                <?php $total35 += $min; ?>
                RM <?php echo mc_currency_filter($min);?>
           </td>
        </tr>
       <?php endforeach?>
    </tbody>
    <tfoot>
        <th>Sum</th>
        <th class="txt-c"><?php echo array_sum($downlines);?></th>
        <th class="txt-c">
            <?php echo array_sum($sales);?>/<?php echo array_sum($total_sales);?>
        </th>
        <th class="txt-c"><?php echo array_sum($pv);?></th>
        <th class="txt-c"><?php echo array_sum($bonus75_pv);?>%</th>
        <th class="">RM <?php echo mc_currency_filter($total75);?></th>
        <th class="txt-c"><?php echo array_sum($bonus35_pv);?>%</th>
        <th class="">RM <?php echo mc_currency_filter($total35);?></th>
    </tfoot>
</table>