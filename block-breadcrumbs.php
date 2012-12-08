<p class="pull-right block">
<?php t('strong',date("l, d M Y", $_SERVER['REQUEST_TIME']),array('class'=>'muted','id'=>"nav-date"));?></p>
<?php if (!isset($_REQUEST['view_invoice'])): ?>
<?php mdag_breadcrumbs();?>
<?php endif;?>