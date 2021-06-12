<div class="row">
<div class="col-md-12">
            <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Apps Addons</h4>
                </div>
            </div>
                <div class="panel-body">
                 <div class="col-md-3" style="background: #f4f4f4;padding-top: 15px;margin-right: 2%;">
                 <img src="http://chart.apis.google.com/chart?cht=qr&chs=200x210&chl=<?php echo $setting2->localhost_url;?>/V3/&chld=H|0" alt="qr1" style="width:100%;" />
                 <p align="center"><strong>kitchen Apps QR Scan</strong></p>
                 </div>
                  <div class="col-md-3" style="background: #f4f4f4;padding-top: 15px;margin-right: 2%;">
                 <img src="http://chart.apis.google.com/chart?cht=qr&chs=200x210&chl=<?php echo $setting2->localhost_url;?>/V1/&chld=H|0" alt="qr1" style="width:100%;" />
                 <p align="center"><strong>Waiter Apps QR Scan</strong></p>
                 </div>
                  <div class="col-md-5" style=";padding-top:0px;">
                  <p style="font-size:16px; padding-bottom:20px; font-weight:600;">Please Download Apps in Playstore</p>
                  <p><a href="https://play.google.com/store/apps/details?id=com.bdtask.kitchenchef" target="_blank"><img src="<?php echo base_url(); ?>assets/img/appsicon.png" alt="apps" width="50px;"/> Kitchen Apps</a></p>
                  <p><a href="https://play.google.com/store/apps/details?id=com.bdtask.waiters" target="_blank"><img src="<?php echo base_url(); ?>assets/img/appsicon.png" alt="apps" width="50px;"/> Waiter Apps</a></p>
                  <p><a href="https://play.google.com/store/apps/details?id=com.bdtask.hungry" target="_blank"><img src="<?php echo base_url(); ?>assets/img/appsicon.png" alt="apps" width="50px;"/> Customer Apps</a></p>
                  </div>
                
             </div>
         </div>
     </div>
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
            		
                <?php /*example dateformat
				$mydate='11-01-2018';
				$sec = strtotime($mydate); 
				$date = date($setting->dateformat, $sec); */
				
				//print_r($setting2); 
				echo form_open_multipart('setting/serversetting/create','class="form-inner"') ?>
                    <?php echo form_hidden('serverid',$setting2->serverid) ?>

                    <div class="form-group row">
                        <label for="ipaddress" class="col-xs-3 col-form-label"><?php echo display('netip') ?> <i class="text-danger">*</i></label>
                        <div class="col-xs-9">
                            <input name="ipaddress" type="text" class="form-control" id="ipaddress" placeholder="<?php echo display('netip') ?>" value="<?php echo $setting2->localhost_url ?>">
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="port" class="col-xs-3 col-form-label"><?php echo display('ip_port') ?></label>
                        <div class="col-xs-9">
                            <input name="port" type="text" class="form-control" required id="port" placeholder="<?php echo display('ip_port') ?>" value="<?php echo $setting2->online_url ?>">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                <?php echo form_close() ?>
                <p>*** If you need above all apps buy your own branding please email us at:<br />
               Email:business@bdtask.com <br />
               Skype:bdtask
                </p>
            </div>
        </div>
    </div>
    
</div>