<?php
global $current_user, $cid;
      get_currentuserinfo();
?>
<div class="accordion" id="accordion2"><!-- start.accordion2 -->  
  <?php if(current_user_can('transfer_pin')): ?>
  <div class="accordion-group bg-trans-50">
    <div class="accordion-heading">
        <div class="content-header">
            <h4 class="page-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Pin Summary</a></h4>
        </div>          
    </div>      
<?php 
$products_loop = new WP_Query(array('post_type' => 'products'));
if ( $products_loop->have_posts() ) :
$counter = 1;
?>    
    <div id="collapseTwo" class="accordion-body collapse in">
      <div class="accordion-inner">
        <div class="content">
        <table class="table">
            <thead class="bg-trans">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Rerserved</th>
                    <th>Activated</th>
                    <th>Total</th>
                </tr>
            </thead>    
            <tbody>
            <?php while ( $products_loop->have_posts() ) : $products_loop->the_post(); ?>
                <tr>
                    <td><?php t('small',$counter);?></td>
                    <td>
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            <?php $counter++; ?>                
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
            </tbody>
        </table>
        </div><!-- end.content -->
      </div><!-- end.accordion-inner -->
    </div><!-- end.accordion-body -->
  </div>
<?php endif; // end.product.loop; ?>  
<?php endif;?>
    
  <div class="accordion-group bg-trans">
    <div class="accordion-heading">
        <div class="content-header">
            <h4 class="page-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Member account details</a></h4>
        </div>          
    </div>
    <div id="collapseOne" class="accordion-body collapse out">
      <div class="accordion-inner">
            <div class="content">
                <dl class="dl-horizontal">
                    <dt>Member ID:</dt>
                        <dd><?php t('span',mdag_get_id_ahli($cid));?></dd>
                    <dt>Member Name:</dt>
                        <dd><?php t('a', mdag_get_full_name($cid), array('href'=>'/ahli/ubah-maklumat/'));?></dd>
                    <dt>Member Package:</dt>
                        <dd>Stockist <?php echo ucwords(mc_get_userinfo($cid,'stockist_type'));?></dd>      
                    <dt>Last Purchase Valid Until:</dt>
                        <dd>unlimited ( month(s), day(s) more)</dd>            
                     <?php if (is_page_template('page-products.php')): ?>   
                    <dt>Auto Purchase Mode:</dt>   
                        <dd>Enabled Disable</dd>              
                    <dt>e-Wallet Balance:</dt>
                        <dd><a href="/finances/e-wallet/">RM 4354.00</a><small class="db">Your e-wallet balance is not sufficient. You will need to make offline payment if you wish to proceed with a purchase.</small></dd>
                    <?php endif; ?>          
                </dl>
            </div>
      </div>
    </div>
  </div>    
  
</div><!-- end.accordion2 -->  