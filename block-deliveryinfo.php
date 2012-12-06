<?php global $current_user, $cid;  get_currentuserinfo(); ?>
<section id="delivery-info">
    <div class="block bg-trans-50 border-light">
            <div class="content-header">
                <h4 class="page-title">Delivery Info</h4>
                <hr />
            </div>                        
            <div class="content">
                <div class="row-fluid">
                        <div class="span5">
                    	<div class="control-group">
                    		<label class="control-label" for="recipient_name">
                    			Receipient Name<small class="db muted">Nama Penerima</small>
                    		</label>
                    		<div class="controls">
                                <div class="input-append">
                    			 <input type="text" class="capwords" name="delivery[recipient_name]" id="recipient_name" placeholder="Nama" value="<?php mc_full_name($cid);?>">                        
                                </div>
                                <span id="username-info" class="help-inline"></span>
                    		</div>
                        </div>
                    	<div class="control-group">
                    		<label class="control-label" for="alamat">
                    			Alamat<small class="db muted">Address</small>
                    		</label>
                    		<div class="controls">
                    			<textarea name="delivery[address]" id="alamat" class="capwords"><?php mc_userinfo($cid, 'address');?></textarea>
                    		</div>
                    	</div>
                    	<div class="control-group">
                    		<label class="control-label" for="daerah">
                    			Daerah<small class="db muted">County/City</small>                        
                    		</label>
                    		<div class="controls">
                    			<input type="text" name="delivery[city]" id="daerah" class="capwords" value="<?php mc_userinfo($cid, 'city');?>">
                    		</div>
                    	</div>
                        </div>
                        <div class="span7">                
                    	<div class="control-group">
                    		<label class="control-label" for="poskod">
                    			Poskod<small class="db muted">Postcode</small>
                    		</label>
                    		<div class="controls">
                    			<input type="text" name="delivery[postcode]" id="poskod" value="<?php mc_userinfo($cid, 'postcode');?>">
                    		</div>
                    	</div>  
                    	<div class="control-group">
                    		<label class="control-label" for="negeri">
                    			Negeri<small class="db muted">State</small>
                    		</label>
                    		<div class="controls">
                    			<select id="negeri" name="delivery[state]">
                                <option value="">--pilih negeri--</option>
                                <option value="johor">Johor</option>
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
                    			<select id="negara" name="delivery[country]">
                                <option value="">--pilih negara--</option>
                                <option value="malaysia">Malaysia</option>
                                <option value="singapura">Singapura</option>
                                <option value="indonesia">Indonesia</option>
                                <option value="brunei">Brunei</option>
                                <option value="thailand">Thailand</option>      
                              </select>
                    		</div>
                    	</div>
                    </div>
                </div> <!-- end.row-fluid -->
            </div> <!-- end.content -->
    </div>
</section>
<script>
jQuery(document).ready(function(){
    $("#negeri").val('<?php mc_userinfo($cid,'state');?>');
    $("#negara").val('<?php mc_userinfo($cid,'country');?>');
});
</script>