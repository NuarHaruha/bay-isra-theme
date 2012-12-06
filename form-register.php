 <?php global $current_user; $cid = $current_user->ID;?>
 <div class="row-fluid">
     <div class="span9" id="form-content">
     <ul class="nav nav-tabs outer-border" id="tabDaftar">
      <li class="active"><a href="#tab-login" data-toggle="tab" data-percentage="20"><span class="badge">1</span> Login</a></li>           
      <li><a href="#tab-butiran" data-toggle="tab" data-percentage="40"><span class="badge">2</span> Maklumat Ahli</a></li>
      <li><a href="#tab-alamat" data-toggle="tab" data-percentage="60"><span class="badge">3</span> Butiran Alamat</a></li>
      <li><a href="#tab-waris" data-toggle="tab" data-percentage="80"><span class="badge">4</span> Butiran Waris</a></li>
      <li><a href="#tab-bank" data-toggle="tab" data-percentage="99"><span class="badge">5</span> Butiran Bank Akaun</a></li>
      
    </ul>
    
    <form class="form-horizontal" id="daftar-baru" method="POST" action="">
        <?php if (mc_get_userinfo($cid, 'stockist_type')): ?>
        <input type="hidden" name="stockist_id" value="<?php echo mc_get_userinfo($cid, 'code'); ?>"/>
        <?php endif; ?>
        <input type="hidden" name="registrant_id" value="<?php echo mc_get_userinfo($cid, 'code'); ?>"/>
        <div class="tab-content"><!-- start.tab-content -->            
            <!-- tab.login -->
            <div id="tab-login" class="tab-pane active">
            	<div class="control-group">
            		<label class="control-label" for="user_login">
            			Nama<small class="db muted">Login Name</small>
            		</label>
            		<div class="controls">
                        <div class="input-append">
            			<input minlength="3" type="text" name="user_login" id="user_login" placeholder="">
                        <button id="check-username" class="btn" type="button"><i class="icon-search" title="Check username"></i></button>
                        </div>
                        <span id="username-info" class="help-inline"></span>
            		</div>
                </div>                
            	
            	<div class="control-group">
            		<label class="control-label" for="pwd">
            			Kata Laluan<small class="db muted">Password</small>
            		</label>
            		<div class="controls">
            			<input type="password" name="pwd" id="pwd" placeholder="">
            		</div>
            	</div>
            	<div class="control-group">
            		<div class="controls">
            			<a href="#" class="btn btn-success next-tab">Next</a>
            		</div>
            	</div>
            </div>
            <!-- tab.butiran -->
            <div id="tab-butiran" class="tab-pane">
            	<div class="control-group">
            		<label class="control-label" for="nama_penuh">
            			Nama Penuh<small class="db muted">Full Name</small>
            		</label>
            		<div class="controls">
            			<input type="text" name="nama_penuh" id="nama_penuh" placeholder="">
            		</div>
            	</div>
            	<div class="control-group">
            		<label class="control-label" for="nric">
            			No. K/P <small class="muted">(NRIC)</small>                        
            		</label>
            		<div class="controls">
            			<input type="text" name="nric" id="nric" placeholder="">
            		</div>
            	</div>
            	<div class="control-group">
            		<label class="control-label" for="tel">
            			No. Tel<small class="db muted">Phone</small>
            		</label>
            		<div class="controls">
            			<input type="text" name="tel" id="tel" placeholder="">
            		</div>
            	</div>  
            	<div class="control-group">
            		<label class="control-label" for="user_email">
            			Email
            		</label>
            		<div class="controls">
            			<input type="text" name="user_email" id="user_email" placeholder="">
            		</div>
            	</div>                       
            	<div class="control-group">
            		<div class="controls">
                        <a href="#" class="btn btn-info prev-tab">
            				Previous
            			</a>
            			<a href="#" class="btn btn-success next-tab">
            				Next
            			</a>
            		</div>
            	</div>
            </div>
            <!-- tab.alamat -->
            <div id="tab-alamat" class="tab-pane">
            	<div class="control-group">
            		<label class="control-label" for="alamat">
            			Alamat<small class="db muted">Address</small>
            		</label>
            		<div class="controls">
            			<textarea name="alamat" id="alamat"></textarea>
            		</div>
            	</div>
            	<div class="control-group">
            		<label class="control-label" for="daerah">
            			Daerah<small class="db muted">County/City</small>                        
            		</label>
            		<div class="controls">
            			<input type="text" name="daerah" id="daerah" placeholder="">
            		</div>
            	</div>
            	<div class="control-group">
            		<label class="control-label" for="poskod">
            			Poskod<small class="db muted">Poscode</small>
            		</label>
            		<div class="controls">
            			<input type="text" name="poskod" id="poskod" placeholder="">
            		</div>
            	</div>  
            	<div class="control-group">
            		<label class="control-label" for="negeri">
            			Negeri<small class="db muted">State</small>
            		</label>
            		<div class="controls">
            			<select id="negeri" name="negeri">
                        <option value="">--pilih negeri--</option>
                        <option value="johor" selected="selected">Johor</option>
                        <option value="kedah">Kedah</option>
                        <option value="kelantan">Kelantan</option>
                        <option value="melaka">Melaka</option>
                        <option value="negeri-sembilan">Negeri Sembilan</option>
                        <option value="pahang">Pahang</option>
                        <option value="perak">Perak</option>
                        <option value="perlis">Perlis</option>
                        <option value="pulau-pinang">Pulau Pinang</option>
                        <option value="sabah">Sabah</option>
                        <option value="sarawak">Sarawak</option>
                        <option value="selangor">Selangor</option>
                        <option value="terrenganu">Terrenganu</option>
                        <option value="wilayah-persekutuan-kuala-lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                        <option value="wilayah-persekutuan-labuan">Wilayah Persekutuan Labuan</option>
                        <option value="wilayah-persekutuan-putrajaya">Wilayah Persekutuan Putrajaya</option>      
                      </select> 
            		</div>
            	</div>   
            	<div class="control-group">
            		<label class="control-label" for="negara">
            			Negara<small class="db muted">Country</small>
            		</label>
            		<div class="controls">
            			<select id="negara" name="negara">
                        <option value="">--pilih negara--</option>
                        <option selected="selected" value="malaysia">Malaysia</option>
                        <option value="singapura">Singapura</option>
                        <option value="indonesia">Indonesia</option>
                        <option value="brunei">Brunei</option>
                        <option value="thailand">Thailand</option>      
                      </select>
            		</div>
            	</div>                                     
            	<div class="control-group">                                
            		<div class="controls">
                        <a href="#" class="btn btn-info prev-tab">
            				Previous
            			</a>
            			<a href="#" class="btn btn-success next-tab">
            				Next
            			</a>
            		</div>
            	</div>
            </div>      
            <!-- tab.waris -->
            <div id="tab-waris" class="tab-pane">
               	    <div class="control-group">
                		<label class="control-label" for="nama_pewaris">
                			Nama waris<small class="db muted">Full name</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="nama_pewaris" id="nama_pewaris" placeholder="">
                		</div>
                	</div>                     
               	    <div class="control-group">
                		<label class="control-label" for="nric_pewaris">
                			No. K/P <small class="muted">(NRIC)</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="nric_pewaris" id="nric_pewaris" placeholder="">
                		</div>
                	</div>   
                	<div class="control-group">
                		<label class="control-label" for="tel_pewaris">
                			No. Tel<small class="db muted">Phone</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="tel_pewaris" id="tel_pewaris">
                		</div>
                	</div>             
            <div class="control-group">
            		<div class="controls">
                        <a href="#" class="btn btn-info prev-tab">
            				Previous
            			</a>
            			<a href="#" class="btn btn-success next-tab">
            				Next
            			</a>
            		</div>
            	</div>
            </div>
            <!-- tab.bank -->
            <div id="tab-bank" class="tab-pane">
               	    <div class="control-group">
                		<label class="control-label" for="nama_bank">
                			Nama Bank<small class="db muted">Bank Name</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="nama_bank" id="nama_bank" placeholder="Nama">
                		</div>
                	</div>                     
               	    <div class="control-group">
                		<label class="control-label" for="no_bank">
                			No. Akaun<small class="db muted">Account No.</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="no_bank" id="no_bank" placeholder="">
                		</div>
                	</div>   
                	<div class="control-group">
                		<label class="control-label" for="cawangan_bank">
                			Cawangan<small class="db muted">Branch</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="cawangan_bank" id="cawangan_bank">
                		</div>
                	</div>  
                	<div class="control-group">
                		<label class="control-label" for="jenis_akaun_bank">
                			Jenis Akaun<small class="db muted">Account type</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="jenis_akaun_bank" id="jenis_akaun_bank">
                		</div>
                	</div>  
              	<div class="control-group">
                		<label class="control-label" for="id_penaja">
                			ID Penaja<small class="db muted">Sponsor ID</small>
                		</label>
                		<div class="controls">
                			<input type="text" name="id_penaja" id="id_penaja">
                		</div>
                	</div>                     
            <div class="control-group">
            		<div class="controls">
                        <a href="#" class="btn btn-info prev-tab">
            				Previous
            			</a>
                        <input type="hidden" name="action" value="mc_jsonp">
                        <input type="hidden" name="fn" value="register_new_user">
            			<button id="btn-daftarbaru" class="btn btn-success" type="submit"><span>Hantar</span></button>
            		</div>
            	</div>
            </div>
            
        </div><!-- end.tab-content -->
        <hr />
        <section id="error-box" style="display:none">
            <div class="alert alert-block">
            <h4>Error</h4>
                <div class="error"></div>
            </div>
        </section>
    </form>
    </div>
    <div class="span3" id="sidebar-form">
        <div class="alert alert-info">
            <p><span class="label label-info">Notis!</span> Pastikan semua maklumat lengkap &amp; tepat sebelum di hantar.</p>
        </div>
    </div>


</div>