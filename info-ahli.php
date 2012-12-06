            <div id="my_account">
                <h4>My Akaun <small>Status Ahli</small></h4>
                
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <small>Info</small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                <?php
                    
                    
                    $ahli_info = array(
                        'Jenis Keahlian <small class="muted">(membership)</small>' => '',
                        'ID Ahli'    => '',
                        'Nama'  => mdag_display_name()
                    );
                    
                    foreach($ahli_info as $k=>$v){
                        echo "\t\t".'<tr><td>'.$k.'</td><td>'.$v.'</td></tr>'."\n";
                    }
                ?>                  
                        </tbody>
                    </table>
<?php
 //var_dump(mdag_display_name());
?>                    
                </div>
                
            </div>