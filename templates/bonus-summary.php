<?php global $current_user; $cid = $current_user->ID;?>
<section id="ewallet-data"><!-- begin.ewallet-data -->
    <div class="block bg-trans-50 border-light border-radius">
        <div class="content-header">
            <h4 class="page-title">Bonus Summary</h4>
            <div>

                <p>Date <i class="icon-time"></i> <?php echo date("D d M Y");?></p>
            </div>
            <hr />
        </div><!-- end.content-header -->
        <div class="content">
            <nav class="nav-transaction clearfix">
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown"href="#">
                            Bonus type <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="?transaction=products">Products</a></li>
                            <li><a href="?transaction=downlines">Downlines</a></li>
                            <li><a href="?transaction=deposit">Deposit</a></li>
                            <li><a href="?transaction=all">All Transaction</a></li>
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
            <?php
            if (!isset($_GET['transaction']) ){
                get_template_part('/templates/bonus','products');
            } else {
                switch($_GET['transaction']){
                    case 'downlines':
                        get_template_part('/templates/bonus','downlines');
                        break;
                    default:
                        get_template_part('/templates/bonus','products');
                        break;
                }
            }
            ?>
        </div><!-- end.content -->
    </div>
</section><!-- end.ewallet-data -->                            