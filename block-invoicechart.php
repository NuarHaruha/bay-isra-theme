<?php global $invoices;?>
<?php 

$all_order = $approved = $pending = $app_date = $pend_date = $all_date = array();

foreach($invoices as $item){
    
    if (strtolower($item->order_status) == 'pending'){
         array_push($pending, (float) number_format($item->total_amount,2) );
    } else {
        array_push($approved, (float) number_format($item->total_amount,2) );
    }
    
    $all_order[] = (float) $item->total_amount ;
    $all_date[] = date("d M Y", strtotime($item->created_date));
}

$chart = new Highchart();

$chart->chart->renderTo = "chart-container";
$chart->chart->type = "line";
$chart->title->text = "All Purchase History";
$chart->subtitle->text = "";
$chart->xAxis->labels->formatter = new HighchartJsExpr("function() { return this.value;}");
$chart->xAxis->type = 'datetime';
$chart->yAxis->title->text = "Total amount spend";
$chart->yAxis->labels->formatter = new HighchartJsExpr("function() { return 'RM ' + this.value +'';}");
$chart->tooltip->formatter = new HighchartJsExpr("function() {
                              return 'Spend <b>RM ' + Highcharts.numberFormat(this.y, 2,'.',',') + '</b><br/>on '+ this.x;}");
//$chart->plotOptions->area->pointStart = 10;
/*
$chart->plotOptions->area->marker->enabled = true;
$chart->plotOptions->area->marker->symbol = "circle";
$chart->plotOptions->area->marker->radius = 2;
$chart->plotOptions->area->marker->states->hover->enabled = true;
*/
$chart->plotOptions->line->dataLabels->enabled = true;
$chart->tooltip->crosshairs = true;

$chart->xAxis = array('categories' => $all_date);

$chart->credits->enabled = false;

//$chart->series[] = array('name' => 'Approved','data' => new HighchartJsExpr(json_encode($approved)));
                         
//$chart->series[] = array('name' => 'Pending','data' => new HighchartJsExpr(json_encode($pending)));

$chart->series[] = array('name' => 'All','data' => new HighchartJsExpr(json_encode($all_order)));      
                                            

//$chart->series[] = array('name' => 'Pending','data' => new HighchartJsExpr(json_encode($pending)) );
?>
<section id="invoice-chart-data"><!-- begin.invoice-chart-data -->
<div class="block">
    <!--
    <div class="content-header">
        <h4 class="page-title">Purchase History Charts</h4>
        <hr />
    </div>
    -->
    <div class="content">
        <div class="chart-wrapper">
            <div id="chart-container"></div>
            <script type="text/javascript">
            jQuery(document).ready(function(){                               
            <?php echo $chart->render("chart_invoice"); ?>
            });
            </script>            
        </div>
    </div>
</div>
</section><!-- end.invoice-chart-data -->