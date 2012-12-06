<?php global $current_user; $cid = $current_user->ID;?>
<?php $transactions = false; ?>
<section id="ewallet-data"><!-- begin.ewallet-data -->
<div class="block bg-trans-50 border-light border-radius">     
    <div class="content-header">
        <h4 class="page-title">Transaction Summary</h4>
            <div>
            <p class="pull-right">Total E-Wallet: <strong> <?php echo get_currency(); ?> <?php echo apply_filters('mc_currency', uinfo($cid,MKEY::RM) );?></strong>&nbsp;</p>
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
        <table class="table">
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
<?php if (false == $transactions) $transactions = get_downline_by_id($cid);?>
               <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            
            <tfoot>
                <th colspan="3"></th>
                <th>Total</th>
                <th>RM 0.00</th>
            </tfoot>
        </table>
    </div><!-- end.content -->  
</div>
</section><!-- end.ewallet-data -->                            