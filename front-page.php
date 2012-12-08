<?php get_header('frontpage'); $cid = $current_user->ID; ?>
<section id="primary-content">
    <div class="row-fluid">
        <section id="userinfo">
            <ul class="breadcrumb bg-trans">
            <?php $full_name = mdag_get_full_name($cid); ?>
            <?php $members_code = mdag_get_id_ahli($cid); ?>
                <?php t('li',
                        'Welcome '. _t('a', $full_name, array('href'=>'/ahli/ubah-maklumat/')). 
                        _t('span', ' ('.$members_code.')')  
                        ); ?>
            </ul>                
                <?php //var_dump(mc_get_user_role()); ?>
            
        </section>   
        <section id="content">
            
            <?php //get_template_part('info','ahli'); ?>
            <?php
                if ($wp_query->get('process')){
                    
                    if ( empty($_POST) || !wp_verify_nonce($_POST['mdag_proc_save'],'mdag_process') )
                    {
                        ?>
                        <div class="alert">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Sorry!</strong> your nonce did not verify.
                        </div>
                        <?php                       
                       exit();
                       
                    } else {
                       do_action('mdag_process', array('type'=>$wp_query->get('process'), 'request'=> $_REQUEST));
                    }                    
                    
                }
            ?>
            <div class="row-fluid">
            
            <div class="span5">
            <h4 class="heading heading-ahli">Maklumat Keahlian</h4>
                <div class="pad-top-bottom">
                <div class="row-fluid">                   
                    
                    <div class="span4 main-icon">
                        <a href="/ahli/ubah-maklumat/">
                        <span class="db txt-c"><i class="icn-48 icn-note"></i>Personal Details</span>
                        </a>
                    </div>
               
                    <div class="span4 main-icon">
                        <a href="/ahli/ubah-kata-laluan/">
                        <span class="db txt-c"><i class="icn-48 icn-key"></i>Password Change</span>
                        </a>
                    </div>
                
                    <div class="span4 main-icon">
                        <a href="/ahli/ubah-alamat">
                        <span class="db txt-c"><i class="icn-48 icn-home"></i>Change Address</span>
                        </a>
                    </div>
                    
                    
                </div>
                </div>
            </div> <!-- end block #1 -->
             
            <div class="span5 offset1">
            <h4 class="heading heading-downlines">Maklumat Ahli &amp; Downlines</h4>
                <div class="pad-top-bottom">
                <div class="row-fluid">    
                    <?php if(current_user_can('add_users')): ?>
                    <div class="span4 main-icon">
                        <a href="/add-new-user">
                        <span class="db txt-c"><i class="icn-48 icn-man"></i>Register</span>
                        </a>
                    </div>                    
                    <?php endif;?>
                    <div class="span4 main-icon">
                        <a href="/laporan/genealogy">
                        <span class="db txt-c"><i class="icn-48 icn-chartarea"></i>View Geneleogy</span>
                        </a>
                    </div>
                
                    <div class="span4 main-icon">
                        <a href="/laporan/downlines">
                        <span class="db txt-c"><i class="icn-48 icn-chartdown"></i>View Downline(s)</span>
                        </a>
                    </div>
                    
                    
                </div>
                </div>            
           
           </div><!-- end block #2 -->
           
           </div>
           
           <div class="row-fluid">
           
           <div class="span5">
            <h4 class="heading heading-belian">Maklumat Pembelian</h4>
                <div class="pad-top-bottom">
                <div class="row-fluid">
                
                    <?php if(current_user_can('transfer_pin')): ?>
                    <div class="span4 main-icon">
                        <a href="/purchase/order/" title="Recent Order">
                        <span class="db txt-c"><i class="icn-48 icn-order"></i>Members Order</span>
                        </a>
                    </div>                    
                    <?php endif; ?>    
               
                    <div class="span4 main-icon">
                        <a href="/purchase/product/" title="Make Purchase">
                        <span class="db txt-c"><i class="icn-48 icn-cart"></i>Make Purchase</span>
                        </a>
                    </div>
                
                    <div class="span4 main-icon">
                        <a href="/purchase/invoices/">
                        <span class="db txt-c"><i class="icn-48 icn-calendar"></i>Purchase History</span>
                        </a>
                    </div>
                    
                    
                    
                    
                </div>
                </div>   
            </div> <!-- end block #3 -->
            
            <div class="span5 offset1">
            <h4 class="heading heading-bonus">Maklumat Bonus</h4>
                <div class="pad-top-bottom">
                <div class="row-fluid">    
               
                    <div class="span4 main-icon">
                        <a href="/finances/bonus/?transaction=downlines">
                        <span class="db txt-c"><i class="icn-48 icn-money"></i>Bonus Statement</span>
                        </a>
                    </div>
                
                    <div class="span4 main-icon">
                        <a href="#">
                        <span class="db txt-c"><i class="icn-48 icn-calculator"></i>Income Statement</span>
                        </a>
                    </div>
                    
                    <div class="span4 main-icon">
                        <a href="/finances/e-wallet/">
                        <span class="db txt-c"><i class="icn-48 icn-wallet"></i>e-Wallet</span>
                        </a>
                    </div>  
                                      
                </div>
                </div>     
            </div> <!-- end block #4 -->
                  
            </div>
                                   
        </section>  
        <!--
        <section id="sidebar" class="span3">
            <?php get_sidebar('mdag'); // sidebar 1 ?>       
        </section>
        -->                      
    </div>  
</section>
<?php get_footer('frontpage'); ?>