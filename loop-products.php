
<section id="product-account-info">
<div class="block bg-trans-50 border-light border-radius">
    <div class="content-header">
        <h4 class="page-title">Purchase Types</h4>
        <hr />
    </div>
    <div class="content">
<?php
    $product_args = array( 'post_type' => 'products');
    $loop = new WP_Query( $product_args );
    ?>
    <table class="table" id="products-cart">   
        <thead class="bg-trans">     
            <tr>
            <th><input type="checkbox" class="checkall" title="Select All Products"></th>
            <th>Product</th>
            <th>Price</th>
            <th title="Recommended retail price">Retail Price</th>
            <th>Quantity</th>
            <th>Total</th>
            </tr>
        </thead>

        <tbody><?php $xi= 0; while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php
            // metainfo
            $custom = get_post_custom($post->ID); 
            $tr_class = ($xi % 2) ? '' : 'bg-trans-70';
            $price = $custom[mc_products::MK_PRICE][0];
            $retail_price = $custom[mc_products::MK_RETAIL_PRICE][0];
        ?>
            <tr class="<?php echo $tr_class;?>">
                <td>
                    <input type="checkbox" id="cb_<?php echo $post->ID;?>" class="add_cart" name="order_id[<?php echo $post->ID;?>]" data-pid="<?php echo $post->ID;?>" value="<?php echo $post->ID;?>">
                    <input type="hidden" name="metadata[<?php echo $post->ID;?>]" value="<?php echo $custom[mc_products::MK_SKU][0].','.$price.','.$retail_price;?>"/>
                    <input type="hidden" name="sku[<?php echo $post->ID;?>]" value="<?php echo $custom[mc_products::MK_SKU][0];?>"/>
                </td>
                <td>
                    <label for="cb_<?php echo $post->ID;?>">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </label>
                </td>
                <td title="Price, Harga Ahli">
                    <label for="cb_<?php echo $post->ID;?>">
                    RM<?php echo $price; ?>
                    <input type="hidden" name="price[<?php echo $post->ID;?>]" value="<?php echo $price;?>"/>
                    </label>
                </td>
                <td title="Retail Price, Harga Pasaran">
                    <label for="cb_<?php echo $post->ID;?>">
                    RM<?php echo $retail_price;?>
                    <input type="hidden" name="retail_price[<?php echo $post->ID;?>]" value="<?php echo $retail_price;?>"/>
                    </label>
                </td>
                <td class="txt-c">
                    <div class="input-append">
                        <input type="text" name="quantity[<?php echo $post->ID;?>]" id="quantity_<?php echo $post->ID;?>" class="input-small span3" value="1">
                        <button class="btn update-quantity" title="update quantity" type="button" data-pid="<?php echo $post->ID;?>" data-price="<?php echo $price; ?>"><i class="icon-refresh"></i></button>
                    </div>
                </td>
                <td class="min-widht-80">
                <?php t('span','', array('id'=>'ttl_price_'.$post->ID, 'data-pid'=>$post->ID,'data-amount'=> $price,'class'=>'item_amount'));?>
                
                </td>
            </tr>
            <?php $xi++; endwhile; wp_reset_query();?>
        </tbody>      

        <tfoot class="bg-trans">
            <tr>
            <th colspan="2">Sub Total</th>
            
            <th></th>
            <th></th>
            <th></th>
            <th><span id="cart-total"></span><input type="hidden" name="ordered_amount" id="ordered_amount"/></th>
            </tr>
        </tfoot> 
    </table>        
    
    </div><!-- end.content -->
</div>    
</section>     
<?php  
    