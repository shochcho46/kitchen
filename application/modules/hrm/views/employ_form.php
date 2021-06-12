<style type="text/css">

.rounded-4 {
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}

.error {
  display: none;
  background-color: #ff8181;
  
  color: #fff;
  
  outline: none;
  
}



.error-hide {
  opacity: 0;
  display: none;
  -webkit-transition: opacity 0.7s;
  -moz-transition: opacity 0.7s;
  transition: opacity 0.7s;
}

.error-show {
  opacity: 1;
  display: block;
  -webkit-transition: opacity 0.5s;
  -moz-transition: opacity 0.5s;
  transition: opacity 0.5s;
}

.input__holder3 {
  position: relative;
  width: 250px;
}
input__holder {
  position: relative;
  width: 300px;
}
.input__holder2 {
  position: relative;
  width: 450px;
}
.form__input {
  border-width: 1px;
  border-style: solid;
  border-color: #989898;
  width: 300px;
  line-height: 28px;
  color: #989898;

  outline: none;

  display: block;
}

.form__input--red {
  border-width: 2px;
  border-style: solid;
  border-color: #ff797f;
}

.input__error {
  display: none;
  position: absolute;
  right: 11px;
  top: 12px;
  background-color: #ff797f;
  width: 20px;
  height: 20px;
  text-align: center;
  color: #fff;
  line-height: 20px;
  font-weight: 700;
  font-size: 14px;
  -moz-border-radius: 50%;
  webkit-border-radius: 50%;
  border-radius: 50%;
}
.nav.nav-tabs li a {
  background-color: green;
  color:white;
}

.nav.nav-tabs li:not(.active) a {
  pointer-events:none;
  background-color: #2554C7;
  color:white;
}
.nav.nav-tabs li (.active) a{
  background-color: red;
  color:white;
}
ul li a{
  font-size: 13px;
}
.select2-container .select2-selection--single {
    height: 34px;
}
@media (min-width: 1400px){
    .customcon{
        width:100%;
    }
}
@media (min-width: 1200px){
.container {
    width: 1062px;
}
}
</style>
<div class="row">
  <div class="container customcon" style="margin:0;">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home"><?php echo display('basic_info')?></a></li>
      <li><a data-toggle="tab" href="#menu1" ><?php echo display('positional_info')?></a></li>
      <li><a data-toggle="tab" href="#menu2" ><?php echo display('benefits')?></a></li>
      <!--<li><a data-toggle="tab" href="#classmenu" ><?php //echo display('class')?></a></li>-->
      <li><a data-toggle="tab" href="#menu3" ><?php echo display('supervisor')?></a></li>
      <li><a data-toggle="tab" href="#menu4" ><?php echo display('biographical_info')?></a></li>
      <li><a data-toggle="tab" href="#menu5" ><?php echo display('additional_address')?></a></li>
      <li><a data-toggle="tab" href="#menu6" ><?php echo display('emerg_contct')?></a></li>
      <li><a data-toggle="tab" href="#menu7" ><?php echo display('custom')?></a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="row">
          <div class="col-sm-12">
            <div class="panel">
              
              <div class="panel-body">

               <?= form_open_multipart('hrm/Employees/create_employee','id="emp_form"') ?>
               <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="first_name"><?php echo display('first_name')?><sup class="color-red ">*</sup></label>
                    
                    <div class="input__holder">
                      <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First Name">
                      <span id="first_name-error" class="input__error">!</span>
                    </div>
                  </div>
                  
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="l_name"><?php echo display('last_name')?></label>
                    
                    <input type="text" class="form-control" id="last_name"
                    name="last_name" placeholder="Your Last Name">
                    
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="email"><?php echo display('email')?> <sup class="color-red ">*</sup></label>
                    <div class="input__holder">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                      <span id="email-error" class="input__error">!</span>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="phone"><?php echo display('phone')?>  <sup class="color-red ">*</sup></label>
                    <div class="input__holder">
                      <input type="number" class="form-control" id="phone" name="phone" placeholder="Your Phone Number">
                      <span id="phone-error" class="input__error">!</span>
                    </div>
                  </div>
                </div>
              </div>
              
               

              <div class="row">
               <div class="col-sm-3">
                <div class="form-group">
                 <label for="country"><?php echo display('country')?></label>
                  <?php echo form_dropdown('country', $allcountry, (!empty($emp->country)?$emp->country:"Bangladesh"), ' class="form-control" onchange="getstate()" id="country"') ?> 
                </div>
              </div>
               <div class="col-sm-3">
                <div class="form-group" id="state">
                  <label for="state"><?php echo display('state')?></label>
                  <?php echo form_dropdown('state', '', (!empty($emp->state)?$emp->state:"York"), ' class="form-control"') ?> 
                </div>
              </div>
               <div class="col-sm-3">
                <div class="form-group">
                  <label for="city"><?php echo display('city')?> </label>
                  <input type="text" class="form-control" id="city"
                  name="city" placeholder="City">
                </div>
              </div>
               <div class="col-sm-3">
                <div class="form-group">
                  <label for="zip_code"><?php echo display('zip_code')?></label>
                  <input type="number" class="form-control" id="zip_code"
                  name="zip_code" placeholder="Your Zip Code">
                </div>
              </div>
              
            </div>
            <fieldset class="border p-2">
                       <legend  class="w-auto">Login Information</legend>
                    </fieldset>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="city">User Name </label>
                  <input type="text" class="form-control" id="username"
                  name="username" placeholder="User Name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="zip_code">Password</label>
                  <input type="password" class="form-control" id="password"
                  name="password" placeholder="Your Password">
                </div>
              </div>
              
            </div>

            <div class="form-group text-right">
             <input type="button" class="btn btn-primary btnNext" onclick="valid_inf()" value="NEXT">
             
           </div>
           

         </div>  
       </div>
     </div>
   </div>
 </div>
 <div id="menu1" class="tab-pane fade">
   <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="dept_id"><?php echo display('division');?> <sup class="color-red ">*</sup></label><br>
                <div class="input__holder">
                 <select name="division" id="division" class="form-control">
                  <option value=""> Select Division</option>
                  <?php

                  foreach ($dropdowndept as $division) {
                    if ($division_type == 0) {
                      if ($division_type == 0) {
                        echo '</optgroup>';
                      }
                      echo '<optgroup label="'.$division['department_name'].'">';
                    }
                    $vl = $this->db->select('*')->from('department')->where('parent_id',$division['dept_id'])->get()->result();
                    foreach ($vl as $dv) {
                      echo '<option value="'.$dv->dept_id.'">'.$dv->department_name.'</option>';
                    }
                    $division_type = $division['parent_id'];    
                  }
                  if ($division_type == 0) {
                    echo '</optgroup>';
                  }
                  ?>
                </select>
                <span id="division-error" class="input__error">!</span>
              </div>

            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="designation"><?php echo display('designation');?> <sup class="color-red ">*</sup></label>
              <div class="input__holder">
                <select name="pos_id" id="designation" class="form-control">
                  <option value="">select Designation</option>
                  <?php //print_r($dropdown);
                  
                  foreach ($dropdown as $desig) {?>
                    <option value="<?php echo $desig->pos_id?>"><?php echo $desig->position_name;?></option>
                  <?php } ?>
                </select>
                <span id="designation-error" class="input__error">!</span>
              </div>
            </div>
          </div>

          
        </div>
        <div class="row">
          
         <div class="col-sm-6">
          <div class="form-group">
            <label for="period"><?php echo display('duty_type')?> </label><br>
            <select name="duty_type"  class="form-control">
              <option value="1"> Full Time</option>
              <option value="2"> Part Time</option>
              <option value="3"> Contructual</option>
              <option value="4"> Other</option>
            </select>
          </div>
        </div>


        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('hire_date')?> <sup class="color-red ">*</sup></label>
            <div class="input__holder">
              <input type="text" class="form-control datepicker" 
              name="hiredate" id="hiredate" placeholder="Hire date">
              <span id="hiredate-error" class="input__error">!</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('original_h_date')?> <sup class="color-red ">*</sup></label>
            <div class="input__holder">
              <input type="text" class="form-control datepicker" 
              name="ohiredate" id="ohiredate" placeholder="Original Hire date">
              <span id="ohiredate-error" class="input__error">!</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('termination_date')?> </label>
            <input type="text" class="form-control datepicker" 
            name="terminatedate" id="tdate" placeholder="Termination date">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('termination_reason')?></label>
            <textarea class="form-control" 
            name="termreason" id="treason" placeholder="Termination Reason"></textarea> 
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="period"><?php echo display('voluntary_termination')?></label>
            <select name="volunt_termination"  class="form-control">
              <option value="1"> Yes</option>
              <option value="2">No</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('re_hire_date')?></label>
            <input type="text" class="form-control datepicker" 
            name="rehiredate" id="rhdate" placeholder="Rehire date">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="period"><?php echo display('rate_type')?> <sup class="color-red ">*</sup></label>
            <div class="input__holder">
              <select name="rate_type" id="rate_type"  class="form-control">
                <option value="1">Hourly</option>
                <option value="2">Salary</option>
              </select>
              <span id="rate_type-error" class="input__error">!</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('rate')?> <sup class="color-red ">*</sup></label>
            <div class="input__holder">
              <input type="number" class="form-control" 
              name="rate" id="rate" placeholder="Rate">
              <span id="rate-error" class="input__error">!</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="period"><?php echo display('pay_frequency')?> <sup class="color-red ">*</sup></label><br>
            <div class="input__holder">
              <select name="pay_frequency" id="pay_frequency"  class="form-control">
                <option value="">Select Frequency</option>
                <option value="1">Weekly</option>
                <option value="2">Biweekly</option>
                <option value="3">Annual</option>
                <option value="4">Monthly</option>
              </select>
              <span id="pay_frequency-error" class="input__error">!</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('pay_frequency_txt')?></label>
            <input type="text" class="form-control" 
            name="pay_f_text" id="qfre_text" placeholder="Rate">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('hourly_rate2')?></label>
            <input type="number" class="form-control" 
            name="h_rate2" id="rate2" placeholder="Hourly Rate">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('hourly_rate3')?></label>
            <input type="number" class="form-control" 
            name="h_rate3" id="rate3" placeholder="Hourly Rate">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('home_department')?></label>
            <input type="text" class="form-control" 
            name="h_department" id="rate3" placeholder="Hourly Rate">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="work_hour"><?php echo display('department_text')?></label>
            <input type="text" class="form-control" 
            name="h_dep_text" id="hdptext" placeholder="Hourly Rate">
          </div>
        </div>
      </div>
    </div>
    <div class="form-group text-right">
      <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
      <input type="button" class="btn btn-primary btnNext" onclick="valid_inf2()" value="NEXT">
      
    </div>
  </div>
</div>
</div>
</div>
<div id="menu2" class="tab-pane fade">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        
        <div class="panel-body">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="dfs"><?php echo display('benifit_class_code')?></label>
                <input type="text" class="form-control" id="bnfid"
                name="benifit_c_code[]"  placeholder="Benifit Class Code">
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="l_name"><?php echo display('benifit_desc')?></label>
                <input type="text" class="form-control" id="benifit_c_code_d"
                name="benifit_c_code_d[]" placeholder="<?php echo display('benifit_desc')?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="l_name"><?php echo display('benifit_acc_date')?> </label>
                <input type="text" class="form-control datepicker" 
                name="benifit_acc_date[]" placeholder="Benefit Accrual Date">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="status"><?php echo display('benifit_sta')?> <sup class="color-red "></sup></label>
                <select name="benifit_sst[]"  class="form-control">
                  <option value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
              </div>
            </div>
            

          </div>
          <div id="addbenifit" class="toggle">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="dfs"><?php echo display('benifit_class_code')?></label>
                  <input type="text" class="form-control" id="bnfid"
                  name="benifit_c_code[]"  placeholder="Benifit Class Code">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="l_name"><?php echo display('benifit_desc')?></label>
                  <input type="text" class="form-control" id="benifit_c_code_d"
                  name="benifit_c_code_d[]" placeholder="<?php echo display('benifit_desc')?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="l_name"><?php echo display('benifit_acc_date')?> </label>
                  <input type="text" class="form-control datepicker" 
                  name="benifit_acc_date[]" placeholder="Benefit Accrual Date">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="status"><?php echo display('benifit_sta')?> <sup class="color-red "></sup></label>
                  <select name="benifit_sst[]"  class="form-control">
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                  </select>
                </div>
              </div>
              
              
            </div>
            
            <div id="addbenifit" class="toggle">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="dfs"><?php echo display('benifit_class_code')?></label>
                    <input type="text" class="form-control" id="bnfid"
                    name="benifit_c_code[]"  placeholder="Benifit Class Code">
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="l_name"><?php echo display('benifit_desc')?></label>
                    <input type="text" class="form-control" id="benifit_c_code_d"
                    name="benifit_c_code_d[]" placeholder="<?php echo display('benifit_desc')?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="l_name"><?php echo display('benifit_acc_date')?> </label>
                    <input type="text" class="form-control datepicker" 
                    name="benifit_acc_date[]" placeholder="Benefit Accrual Date">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="status"><?php echo display('benifit_sta')?> <sup class="color-red "></sup></label>
                    <select name="benifit_sst[]"  class="form-control">
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                    </select>
                  </div>
                </div>
                
                
              </div>
              <div id="addbenifit" class="toggle">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="dfs"><?php echo display('benifit_class_code')?></label>
                      <input type="text" class="form-control" id="bnfid"
                      name="benifit_c_code[]"  placeholder="Benifit Class Code">
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="l_name"><?php echo display('benifit_desc')?></label>
                      <input type="text" class="form-control" id="benifit_c_code_d"
                      name="benifit_c_code_d[]" placeholder="<?php echo display('benifit_desc')?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="l_name"><?php echo display('benifit_acc_date')?> </label>
                      <input type="text" class="form-control datepicker" 
                      name="benifit_acc_date[]" placeholder="Benefit Accrual Date">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="status"><?php echo display('benifit_sta')?> <sup class="color-red "></sup></label>
                      <select name="benifit_sst[]"  class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
          </div>

          <div class="form-group text-right">
           
            <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
            <input type="button" class="btn btn-primary btnNext" onclick="valid_inf3()" value="NEXT">
          </div>
          

        </div>  
      </div>
    </div>
  </div>
</div>
<!-- class -->

<!-- supervisor -->
<div id="menu3" class="tab-pane fade">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        
        <div class="panel-body">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="s_name"><?php echo display('super_visor_name')?></label>
                <select name="supervisorname"  class="form-control">
                  <?php foreach ($supervisor as $suplist) {?>
                    <option value="<?php echo $suplist->employee_id?>"><?php echo $suplist->first_name.' '.$suplist->last_name?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="l_name"><?php echo display('is_super_visor')?></label>
                <select name="is_supervisor"  class="form-control">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="reports"><?php echo display('supervisor_report')?> </label>
                <input type="text" class="form-control" 
                name="reports" placeholder="Reports">
              </div>
            </div>

          </div>

          <div class="form-group text-right">
           
           <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
           <input type="button" class="btn btn-primary btnNext" onclick="valid_inf4()" value="NEXT">
         </div>
         

       </div>  
     </div>
   </div>
 </div>
</div>
<div id="menu4" class="tab-pane fade">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        
        <div class="panel-body">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="s_name"><?php echo display('dob')?><sup class="color-red ">*</sup></label>
                <div class="input__holder">
                  <input type="text" class="form-control datepicker" id="dob"
                  name="dob" placeholder="<?php echo display('dob')?>">
                  <span id="dob-error" class="input__error">!</span>
                </div>
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gender"><?php echo display('gender')?><sup class="color-red ">*</sup></label>
                <div class="input__holder">
                 <select name="gender" id="gender" class="form-control">
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                  <option value="2">Other</option>
                </select>
                <span id="gender-error" class="input__error">!</span>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reports"><?php echo display('marital_stats')?> </label>
              <select name="marital_status"  class="form-control">
                <option value="1">Single</option>
                <option value="2">Married</option>
                <option value="3">Divorced</option>
                <option value="4">Widowed</option>
                <option value="5">Other</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="s_name"><?php echo display('ethnic_group')?></label>
              <input type="text" class="form-control" id="ethnic"
              name="ethnic" placeholder="<?php echo display('ethnic_group')?>">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="eeo_class"><?php echo display('eeo_class_gp')?></label>
              <input type="text" class="form-control" id="eeo_class"
              name="eeo_class" placeholder="<?php echo display('eeo_class_gp')?>">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="ssn"><?php echo display('ssn')?></label>
              <div class="input__holder">
                <input type="text" class="form-control" id="ssn"
                name="ssn" placeholder="<?php echo display('ssn')?>">
                <span id="ssn-error" class="input__error">!</span>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="w_s"><?php echo display('work_in_state')?></label>
              <select name="w_s"  class="form-control">
                <option value="1">Yes</option>
                <option value="2">No</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="l_in_s"><?php echo display('live_in_state')?></label>
              <select name="l_in_s"  class="form-control">
                <option value="1">Yes</option>
                <option value="2">No</option>
              </select>
            </div>
          </div>


          <div class="col-sm-6">
            <div class="form-group">
              <label for="citizenship"><?php echo display('citizenship')?></label>
              <select name="citizenship"  class="form-control">
                <option value="1"> Citizen</option>
                <option value="0"> Non-citizen</option>
              </select>
            </div>
          </div>


          <div class="col-sm-6">
            <label for="picture"><?php echo display('picture')?></label>
            <input type="file" accept="image/*" name="picture" onchange="loadFile(event)">
            <small id="fileHelp" class="text-muted"><img src="<?php echo base_url();?>event/css/images/user.jpg" id="output" style="height: 150px;width: 200px" class="img-thumbnail"/>
            </small>
          </div>

        </div>

        <div class="form-group text-right">
         
         <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
         <input type="button" class="btn btn-primary btnNext" onclick="valid_inf5()" value="NEXT">
       </div>
       

     </div>  
   </div>
 </div>
</div>
</div>
<div id="menu5" class="tab-pane fade">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        
        <div class="panel-body">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="s_name"><?php echo display('home_email')?></label>
                <input type="email" class="form-control" id="h_email"
                name="h_email" placeholder="Home Email">
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="b_email"><?php echo display('business_email')?></label>
                <input type="email" class="form-control" id="b_email"
                name="b_email" placeholder="<?php echo display('business_email')?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="h_phone"><?php echo display('home_phone')?> <sup class="color-red ">*</sup></label>
                <div class="input__holder">
                  <input type="text" class="form-control" id="h_phone"
                  name="h_phone" placeholder="<?php echo display('home_phone')?>">
                  <span id="h_phone-error" class="input__error">!</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="w_phone"><?php echo display('business_phone')?> </label>
                <input type="text" class="form-control" id="w_phone"
                name="w_phone" placeholder="<?php echo display('business_phone')?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="c_phone"><?php echo display('cell_phone')?> <sup class="color-red ">*</sup></label>
                <div class="input__holder">
                  <input type="text" class="form-control" id="c_phone"
                  name="c_phone" placeholder="<?php echo display('cell_phone')?>">
                  <span id="c_phone-error" class="input__error">!</span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group text-right">
           
           <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
           <input type="button" class="btn btn-primary btnNext" onclick="valid_inf6()" value="NEXT">
         </div>
         

       </div>  
     </div>
   </div>
 </div>
</div>
<div id="menu6" class="tab-pane fade">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        
        <div class="panel-body">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="s_name"><?php echo display('emerg_contct')?> <sup class="color-red ">*</sup></label>
                <div class="input__holder">
                 <input type="text" class="form-control" id="em_contact"
                 name="em_contact" placeholder="Emergency Contact">
                 <span id="em_contact-error" class="input__error">!</span>
               </div>
             </div>
           </div>
           
           <div class="col-sm-6">
            <div class="form-group">
              <label for="e_h_phone"><?php echo display('emerg_home_phone')?> <sup class="color-red ">*</sup></label>
              <div class="input__holder">
                <input type="text" class="form-control" id="e_h_phone"
                name="e_h_phone" placeholder="<?php echo display('emerg_home_phone')?>">
                <span id="e_h_phone-error" class="input__error">!</span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="e_w_phone"><?php echo display('emrg_w_phone')?> <sup class="color-red ">*</sup></label>
              <div class="input__holder">
                <input type="text" class="form-control" id="e_w_phone"
                name="e_w_phone" placeholder="<?php echo display('emrg_w_phone')?>">
                <span id="e_w_phone-error" class="input__error">!</span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="e_c_relation"><?php echo 'Emergency Contact Relation'?> </label>
              <input type="text" class="form-control" id="e_c_relation"
              name="e_c_relation" placeholder="<?php echo display('emer_con_rela')?>">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="alt_em_cont"><?php echo display('alt_em_contct')?></label>
              <input type="text" class="form-control" id="alt_em_cont"
              name="alt_em_cont" placeholder="<?php echo display('alt_em_contct')?>">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="a_e_h_phone"><?php echo display('alt_emg_h_phone')?> </label>
              <input type="text" class="form-control" id="a_e_h_phone"
              name="a_e_h_phone" placeholder="<?php echo display('alt_emg_h_phone')?>">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="a_e_w_phone"><?php echo display('alt_emg_w_phone')?></label>
              <input type="text" class="form-control" id="a_e_w_phone"
              name="a_e_w_phone" placeholder="<?php echo display('alt_emg_w_phone')?>">
            </div>
          </div>
        </div>

        

        <div class="form-group text-right">
          <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
          <input type="button" class="btn btn-success" value="Next" onclick="valid_inf7()">
        </div>
        
      </div>  
    </div>
  </div>
</div>
</div>
<div id="menu7" class="tab-pane fade">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        
       <div class="panel-body">
        <span>        
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="c_f_name"><?php echo 'Custom Field Name';?></label>
                <input type="text" class="form-control" id="c_f_name"
                name="c_f_name[]" placeholder="Custom Field Name">
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="c_f_type"><?php echo 'Custom Field Type';?></label>
                <select name="c_f_type[]"  class="form-control">
                  <option value="1">Text</option>
                  <option value="2">Date</option>
                  <option value="3">Text Area</option>
                </select>
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group">
                <label for="reports"><?php echo 'Custom Value'?> </label>
                <input type="text" name="customvalue[]" class="form-control" placeholder="custom value">

              </div>
            </div>
            
          </div>

        </span>
        <div id="add" class="toggle">
          <span>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="c_f_name"><?php echo 'Custom Field Name';?></label>
                  <input type="text" class="form-control" id="c_f_name"
                  name="c_f_name[]" placeholder="Custom Field Name">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="c_f_type"><?php echo 'Custom Field Type';?></label>
                  <select name="c_f_type[]"  class="form-control">
                    <option value="1">Text</option>
                    <option value="2">Date</option>
                    <option value="3">Text Area</option>
                  </select>
                </div>
              </div>
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reports"><?php echo 'Custom Value'?> </label>
                  <input type="text" name="customvalue[]" class="form-control" placeholder="custom value">

                </div>
              </div>
              
            </div>
          </span>
          <div id="add" class="toggle">
            <span>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="c_f_name"><?php echo 'Custom Field Name';?></label>
                    <input type="text" class="form-control" id="c_f_name"
                    name="c_f_name[]" placeholder="Custom Field Name">
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="c_f_type"><?php echo 'Custom Field Type';?></label>
                    <select name="c_f_type[]"  class="form-control">
                      <option value="1">Text</option>
                      <option value="2">Date</option>
                      <option value="3">Text Area</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="reports"><?php echo 'Custom Value'?> </label>
                    <input type="text" name="customvalue[]" class="form-control" placeholder="custom value">

                  </div>
                </div>
                
              </div>
            </span>
          </div>
        </div>

        <div class="form-group text-right">
          <input type="button" class="btn btn-primary btnPrevious"  value="Previous">  
          <input type="submit" class="btn btn-success" onclick="valid_inf8()" value="Save">
        </div>
        
        <?php echo form_close() ?>
      </div>    
    </div>
  </div>
</div>
</div>

</div>
</div>
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script>

  $('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
  });

  $("#first_name").on('keyup', function() {
    var errfirstname = document.getElementById('first_name-error');
    var inpfirstname = document.getElementById('first_name');
    if (inpfirstname.value.length === 0) return;
    errfirstname.style.display = 'none';
    inpfirstname.className = 'form-control';
  });
  $("#phone").on('keyup', function() {
    var errphone = document.getElementById('phone-error');
    var inputphone = document.getElementById('phone');
    if (inputphone.value.length === 0) return;
    errphone.style.display = 'none';
    inputphone.className = 'form-control';
  });
  $("#email").on('keyup', function() {
    var erremail = document.getElementById('email-error');
    var inpemail = document.getElementById('email');
    if (inpemail.value.length === 0) return;
    erremail.style.display = 'none';
    inpemail.className = 'form-control';
  });
//hire date
$("#hiredate").on('change', function() {
  var errhiredate = document.getElementById('hiredate-error');
  var inputhiredate = document.getElementById('hiredate');
  if (inputhiredate.value.length === 0) return;
  errhiredate.style.display = 'none';
  inputhiredate.className = 'form-control';
});
$("#ohiredate").on('change', function() {
  var errhiredate = document.getElementById('ohiredate-error');
  var inputhiredate = document.getElementById('ohiredate');
  if (inputhiredate.value.length === 0) return;
  errhiredate.style.display = 'none';
  inputhiredate.className = 'form-control';
});
$("#designation").on('change', function() {
  var errdesignaiton = document.getElementById('designation-error');
  var inputdesignaiton = document.getElementById('designation');
  if (inputdesignaiton.value.length === 0) return;
  errdesignaiton.style.display = 'none';
  //inputdesignaiton.className = 'form-control';
});
$("#division").on('change', function() {
  var errdivision = document.getElementById('division-error');
  var inputdivision = document.getElementById('division');
  if (inputdivision.value.length === 0) return;
  errdivision.style.display = 'none';
  /*inputdivision.className = 'form-control';*/
});
$("#rate_type").on('change', function() {
  var errrate_type = document.getElementById('rate_type-error');
  var inputrate_type = document.getElementById('rate_type');
  if (inputrate_type.value.length === 0) return;
  errrate_type.style.display = 'none';
  //inputrate_type.className = 'form-control';
});

$("#rate").on('keyup', function() {
  var errrate = document.getElementById('rate-error');
  var inputrate = document.getElementById('rate');
  if (inputrate.value.length === 0) return;
  errrate.style.display = 'none';
  //inputrate.className = 'form-control';
});
$("#pay_frequency").on('change', function() {
  var errpay_frequency = document.getElementById('pay_frequency-error');
  var inputpay_frequency = document.getElementById('pay_frequency');
  if (inputpay_frequency.value.length === 0) return;
  errpay_frequency.style.display = 'none';
  //inputpay_frequency.className = 'form-control';
});
$("#dob").on('change', function() {
  var errdob = document.getElementById('dob-error');
  var inputdob = document.getElementById('dob');
  if (inputdob.value.length === 0) return;
  errdob.style.display = 'none';
  inputdob.className = 'form-control';
});
$("#gender").on('change', function() {
  var errgender = document.getElementById('gender-error');
  var inputgender = document.getElementById('gender');
  if (inputgender.value.length === 0) return;
  errgender.style.display = 'none';
  inputgender.className = 'form-control';
});
$("#ssn").on('keyup', function() {
  var errssn = document.getElementById('ssn-error');
  var inputssn = document.getElementById('ssn');
  if (inputssn.value.length === 0) return;
  errssn.style.display = 'none';
  inputssn.className = 'form-control';
});
$("#h_phone").on('keyup', function() {
  var errh_phone = document.getElementById('h_phone-error');
  var inputh_phone = document.getElementById('h_phone');
  if (inputh_phone.value.length === 0) return;
  errh_phone.style.display = 'none';
  inputh_phone.className = 'form-control';
});
$("#c_phone").on('keyup', function() {
  var errc_phone = document.getElementById('c_phone-error');
  var inputc_phone = document.getElementById('c_phone');
  if (inputc_phone.value.length === 0) return;
  errc_phone.style.display = 'none';
  inputc_phone.className = 'form-control';
});
$("#e_h_phone").on('keyup', function() {
  var erre_h_phone = document.getElementById('e_h_phone-error');
  var inpute_h_phone = document.getElementById('e_h_phone');
  if (inpute_h_phone.value.length === 0) return;
  erre_h_phone.style.display = 'none';
  inpute_h_phone.className = 'form-control';
});
$("#e_w_phone").on('keyup', function() {
  var erre_w_phone = document.getElementById('e_w_phone-error');
  var inpute_w_phone = document.getElementById('e_w_phone');
  if (inpute_w_phone.value.length === 0) return;
  erre_w_phone.style.display = 'none';
  inpute_w_phone.className = 'form-control';
});
$("#em_contact").on('keyup', function() {
  var errem_contact = document.getElementById('em_contact-error');
  var inputem_contact = document.getElementById('em_contact');
  if (inputem_contact.value.length === 0) return;
  errem_contact.style.display = 'none';
  inputem_contact.className = 'form-control';
});
function valid_inf() {
  var errorUsername = document.getElementById('first_name-error');
  var usernameInput = document.getElementById('first_name');
  var errphone = document.getElementById('phone-error');
  var phoneInput = document.getElementById('phone');
  var erroremail = document.getElementById('email-error');
  var emailInput = document.getElementById('email');
  var firstname = $('#first_name').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  if (firstname == "") {
    errorUsername.style.display = 'block';
    usernameInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#first_name").on('keyup', function(){
     errorUsername.style.display = 'none';
     usernameInput.className = 'form__input rounded-4';
   });

  }
  if (phone == "") {
    errphone.style.display = 'block';
    phoneInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#phone").on('keyup', function(){
     errphone.style.display = 'none';
     phoneInput.className = 'form__input rounded-4';
   });

  }
  if (email == "") {
    erroremail.style.display = 'block';
    emailInput.className = 'form__input form__input--red rounded-4';
    return false;
  }else{
    $("#email").on('keyup', function(){
     erroremail.style.display = 'none';
     emailInput.className = 'form__input rounded-4';
   });
  }
  if(email !== "" && phone !== "" && firstname !== ""){
   $('.nav-tabs > .active').next('li').find('a').trigger('click');
 }
} 

// second tab validation
function valid_inf2() {
  var errorhiredate = document.getElementById('hiredate-error');
  var hiredateInput = document.getElementById('hiredate');
  var oerrorhiredate = document.getElementById('ohiredate-error');
  var ohiredateInput = document.getElementById('ohiredate');
  var errordivision = document.getElementById('division-error');
  var divisionInput = document.getElementById('division');
  var errordesignation = document.getElementById('designation-error');
  var designationInput = document.getElementById('designation');
  var errorrate_type = document.getElementById('rate_type-error');
  var rate_typeInput = document.getElementById('rate_type');
  var errorrate = document.getElementById('rate-error');
  var rateInput = document.getElementById('rate');
  var errorpay_frequency = document.getElementById('pay_frequency-error');
  var pay_frequencyInput = document.getElementById('pay_frequency');

  var hiredate = $('#hiredate').val();
  var ohiredate = $('#ohiredate').val();
  var designation = $('#designation').val();
  var division = $('#division').val();
  var rate_type = $('#rate_type').val();
  var rate = $('#rate').val();
  var pay_frequency = $('#pay_frequency').val();
  if (division == "") {
    errordivision.style.display = 'block';
    divisionInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#division").on('keyup', function(){
     errordivision.style.display = 'none';
     divisionInput.className = 'form__input rounded-4';
   });

  }
  if (designation == "") {
    errordesignation.style.display = 'block';
    designationInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#designation").on('keyup', function(){
     errordesignation.style.display = 'none';
     designationInput.className = 'form__input rounded-4';
   });

  }

  if (hiredate == "") {
    errorhiredate.style.display = 'block';
    hiredateInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#hiredate").on('keyup', function(){
     errorhiredate.style.display = 'none';
     hiredateInput.className = 'form__input rounded-4';
   });
    

  }
  if (ohiredate == "") {
    oerrorhiredate.style.display = 'block';
    ohiredateInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#ohiredate").on('keyup', function(){
     oerrorhiredate.style.display = 'none';
     ohiredateInput.className = 'form__input rounded-4';
   });
    

  }
  if (rate_type == "") {
    errorrate_type.style.display = 'block';
    rate_typeInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#rate_type").on('keyup', function(){
     errorrate_type.style.display = 'none';
     rate_typeInput.className = 'form__input rounded-4';
   });
    

  }
  if (rate == "") {
    errorrate.style.display = 'block';
    rateInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#rate").on('keyup', function(){
     errorrate.style.display = 'none';
     rateInput.className = 'form__input rounded-4';
   });
    

  }
  if (pay_frequency == "") {
    errorpay_frequency.style.display = 'block';
    pay_frequencyInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#pay_frequency").on('keyup', function(){
     errorpay_frequency.style.display = 'none';
     pay_frequencyInput.className = 'form__input rounded-4';
   });
    

  }
  if(division !== "" && designation !== "" && hiredate !== "" && ohiredate !== "" && rate_type !== "" && rate !== "" && pay_frequency !== ""){
   $('.nav-tabs > .active').next('li').find('a').trigger('click');
 }
}

// third tab validation
function valid_inf3() {
  
 $('.nav-tabs > .active').next('li').find('a').trigger('click');

}
/*function valid_class() {
  
 $('.nav-tabs > .active').next('li').find('a').trigger('click');

}*/
// third tab validation
function valid_inf4() {
  
 
 $('.nav-tabs > .active').next('li').find('a').trigger('click');

}
function valid_inf5() {
  var errordob = document.getElementById('dob-error');
  var dobInput = document.getElementById('dob');
  var errorgender = document.getElementById('gender-error');
  var genderInput = document.getElementById('gender');
  var errorssn = document.getElementById('ssn-error');
  var ssnInput = document.getElementById('ssn');
  var dob = $('#dob').val();
  var gender = $('#gender').val();
  var ssn = $('#ssn').val();
  if (dob == "") {
    errordob.style.display = 'block';
    dobInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#dob").on('keyup', function(){
     errordob.style.display = 'none';
     dobInput.className = 'form__input rounded-4';
   });
    

  }
  if (gender == "") {
    errorgender.style.display = 'block';
    genderInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#gender").on('keyup', function(){
     errorgender.style.display = 'none';
     genderInput.className = 'form__input rounded-4';
   });
    

  }
  /*if (ssn == "") {
    errorssn.style.display = 'block';
    ssnInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#ssn").on('keyup', function(){
     errorssn.style.display = 'none';
     ssnInput.className = 'form__input rounded-4';
   });
    

  }*/
  if(dob !== "" && gender !== ""){
   $('.nav-tabs > .active').next('li').find('a').trigger('click');
 }

}
function valid_inf6() {
  
  var errh_phone = document.getElementById('h_phone-error');
  var h_phoneInput = document.getElementById('h_phone');
  var errc_phone = document.getElementById('c_phone-error');
  var c_phoneInput = document.getElementById('c_phone');
  var h_phone = $('#h_phone').val();
  var c_phone = $('#c_phone').val();
  if (h_phone == "") {
    errh_phone.style.display = 'block';
    h_phoneInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#h_phone").on('keyup', function(){
     errh_phone.style.display = 'none';
     h_phoneInput.className = 'form__input rounded-4';
   });

  }
  if (c_phone == "") {
    errc_phone.style.display = 'block';
    c_phoneInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#c_phone").on('keyup', function(){
     errc_phone.style.display = 'none';
     c_phoneInput.className = 'form__input rounded-4';
   });

  }
  if(h_phone !== "" && c_phone !== ""){
   $('.nav-tabs > .active').next('li').find('a').trigger('click');
 }

}
function valid_inf7() {
 var errem_contact = document.getElementById('em_contact-error');
 var em_contactInput = document.getElementById('em_contact');
 var em_contact = $('#em_contact').val();
 var erre_h_phone = document.getElementById('e_h_phone-error');
 var e_h_phoneInput = document.getElementById('e_h_phone');
 var e_h_phone = $('#e_h_phone').val();
 var erre_w_phone = document.getElementById('e_w_phone-error');
 var e_w_phoneInput = document.getElementById('e_w_phone');
 var e_w_phone = $('#e_w_phone').val();
 if (em_contact == "") {
  errem_contact.style.display = 'block';
  em_contactInput.className = 'form__input form__input--red rounded-4';

}else{
  $("#em_contact").on('keyup', function(){
   errem_contact.style.display = 'none';
   em_contactInput.className = 'form__input rounded-4';
 });

}
if (e_h_phone == "") {
  erre_h_phone.style.display = 'block';
  e_h_phoneInput.className = 'form__input form__input--red rounded-4';

}else{
  $("#e_h_phone").on('keyup', function(){
   erre_h_phone.style.display = 'none';
   e_h_phoneInput.className = 'form__input rounded-4';
 });

}
if (e_w_phone == "") {
  erre_w_phone.style.display = 'block';
  e_w_phoneInput.className = 'form__input form__input--red rounded-4';

}else{
  $("#e_w_phone").on('keyup', function(){
   erre_w_phone.style.display = 'none';
   e_w_phoneInput.className = 'form__input rounded-4';
 });

}
if(em_contact !== "" && e_h_phone !== "" && e_w_phone !== ""){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
}

}

function valid_inf8() {
  
 document.getElementById("emp_form").submit();

}

</script>

<script type="text/javascript">
// $(function() {
//     $('input[name="working_period[]"]').daterangepicker();
// });
// </script>


<script type="text/javascript">


  $(document).ready(function() {
   
// choose text for the show/hide link - can contain HTML (e.g. an image)
var showText='<span class="btn btn-primary" >Add More</span>';
var hideText='<span class="btn btn-danger" >Close</span>';

// initialise the visibility check
var is_visible = false;

// append show/hide links to the element directly preceding the element with a class of "toggle"
$('.toggle').prev().append(' <a href="#" class="toggleLink">'+showText+'</a>');

// hide all of the elements with a class of 'toggle'
$('.toggle').hide();

// capture clicks on the toggle links
$('a.toggleLink').click(function() {
 
// switch visibility
is_visible = !is_visible;

// change the link depending on whether the element is shown or hidden
$(this).html( (!is_visible) ? showText : hideText);

// toggle the display - uncomment the next line for a basic "accordion" style
//$('.toggle').hide();$('a.toggleLink').html(showText);
$(this).parent().next('.toggle').toggle('slow');

// return false so any link destination is not followed
return false;

});
});

function getstate(){
	var country=$("#country").val();
	   var myurl ='<?php echo base_url();?>hrm/Employees/statelist';
	    var dataString = "country="+country;
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('#state').html(data);
			  $("select.form-control:not(.dont-select-me)").select2({
				placeholder: "Select State",
				allowClear: true
			});
		 } 
	});
	}
</script>

