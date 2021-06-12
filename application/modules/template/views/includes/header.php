<a href="<?php echo base_url('dashboard/home') ?>" class="logo"> 
    <span class="logo-lg">
        <img src="<?php echo base_url((!empty($setting->logo)?$setting->logo:'assets/img/icons/mini-logo.png')) ?>" alt="">
    </span>
</a>
<style>
	@keyframes anim_opa {
	  50%  {opacity: 0.2}
	}
</style>
<?php 
 $new_version  = file_get_contents('https://update.bdtask.com/bhojon/autoupdate/update_info');
 $myversion = current_version();
function current_version(){

        //Current Version
        $product_version = '';
        $path = FCPATH.'system/core/compat/lic.php'; 
        if (file_exists($path)) {
            
            // Open the file
            $whitefile = file_get_contents($path);

            $file = fopen($path, "r");
            $i    = 0;
            $product_version_tmp = array();
            $product_key_tmp = array();
            while (!feof($file)) {
                $line_of_text = fgets($file);

                if (strstr($line_of_text, 'product_version')  && $i==0) {
                    $product_version_tmp = explode('=', strstr($line_of_text, 'product_version'));
                    $i++;
                }                
            }
            fclose($file);

            $product_version = trim(@$product_version_tmp[1]);
            $product_version = ltrim(@$product_version, '\'');
            $product_version = rtrim(@$product_version, '\';');

            return @$product_version;
            
        } else {
            //file is not exists
            return false;
        }
        
    }

?>
<!-- Header Navbar -->
<nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
        <span class="sr-only">Toggle navigation</span>
        <span class="pe-7s-keypad"></span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Order Alert -->
             <?php if ($new_version!=$myversion) { ?><li><a href="<?php echo base_url("dashboard/autoupdate") ?>" style="display: flex;align-items: center;background: #f81111;padding: 0 10px;margin-top: 12px;color: #fff;animation-name: anim_opa; animation-duration: 0.8s; animation-iteration-count: infinite;"><i class="fa fa-warning" style="background: transparent; border: 0; color: #fff;"></i><span style="font-size: 16px;font-weight: 600;">Update Available</span></a></li><?php } ?>
            <li><a id="fullscreen" href="#" class="getid1"><i class="pe-7s-expand1"></i></a></li>
            <li class="dropdown messages-menu">
            <?php  //$this->load->model(array('dashboard/home_model','home_model')); 
			//$totalorder= $this->home_model->latestoredercount();?>
                <a href="<?php echo base_url("reservation/reservation") ?>" class="dropdown-toggle">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-success reservenotif">0</span>
                </a>
            </li> 
            <!-- Messages -->
            
            <!-- settings -->
            <li class="dropdown dropdown-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('dashboard/home/profile') ?>"><i class="pe-7s-users"></i> <?php echo display('profile') ?></a></li>
                    <li><a href="<?php echo base_url('dashboard/home/setting') ?>"><i class="pe-7s-settings"></i> <?php echo display('setting') ?></a></li>
                    <li><a href="<?php echo base_url('logout') ?>"><i class="pe-7s-key"></i>  <?php echo display('logout') ?></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>