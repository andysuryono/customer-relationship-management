<!DOCTYPE html>
<html>
    <?php $this->load->view('header'); ?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php $this->load->view('top'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <?php $this->load->view('sidebar-userpanel'); ?>
                    <!-- search form -->
                    <?php $this->load->view('sidebar-search'); ?>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $this->load->view('sidebar-menu'); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $top_title;?>
                        <small><?php echo $top_desc;?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $top_title;?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
                //if wanna add any more type, just add the array value here!!! 
                $arr = array(
                             array('text' => $this->session->flashdata('save'), 'alert_type' => 'alert-success'),
                             array('text' => $this->session->flashdata('record'), 'alert_type' => 'alert-success'),
                             array('text' => $this->session->flashdata('error'), 'alert_type' => 'alert-danger'),
                             array('text' => $this->session->flashdata('email'), 'alert_type' => 'alert-success')
                             
                            );

                foreach ($arr as $key => $value) {

                    if($value['text']){
                        ?>
                        <div class="alert <?php echo $value['alert_type'];?> alert-dismissable">
                             <i class="fa fa-check"></i>
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <b><?php echo $value['text'];?> </b> 
                         </div>
                     <?php

                    }
                    
                }
               
                ?>
                <form action="" method="post">
                <div class="row">
                        <div class="col-md-4">
                            <div class="box">


                            




                                <div class="box-header">

                                    <h3 class="box-title">Edit Job</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                
                               
                                <table class="table table-striped">
                                        <tbody>
                                       
                                        <tr>
                                            
                                            <td align="right" width="100">Job Title</td>
                                            <td>
                                            
                                               <div class="col-xs-9">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_title" value="<?php echo $jobs['job_title'];?>">
                                                </div>
                                            
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Type</td>
                                            <td>
                                            <div class="row">
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_type_id" REQUIRED>
                                                        <option value="">Please select</option>
                                                        <?php
                                                        foreach($groupData['job_type'] as $type)
                                                        {
                                                            ?>
                                                        
                                                        <option value="<?php echo $type['job_type_id'];?>" <?php if($jobs['job_type_id']==$type['job_type_id']) echo 'selected';?>><?php echo $type['job_type_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-xs-3">
                                                    <button class="btn btn-warning btn-sm" type="reset" onclick="window.location.href='<?php echo base_url();?>jobs/job_type'">Add Job Type</button>
                                                </div>
                                            </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Hourly Rate</td>
                                            <td>
                                               <div class="col-xs-3">
                                                     <input type="text" class="form-control input-sm" placeholder="" name="job_hour" id="job_hour" value="<?php echo $jobs['job_hour'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Status</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_status">
                                                        <option value="" <?php if($jobs['job_status']=="") echo 'selected';?>>Please Select</option>
                                                        <option value="0" <?php if($jobs['job_status']==0) echo 'selected';?>>New</option>
                                                        <option value="1" <?php if($jobs['job_status']==1) echo 'selected';?>>Existing</option>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Quote Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_quote_date" value="<?php echo $jobs['job_quote_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Start Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_date_start" value="<?php echo $jobs['job_date_start'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Start Time</td>
                                            <td>
                                               <div class="col-xs-6">
                                                    <div class="input-group">
                                                         <div class="input-group-addon">
                                                                    <i class="fa fa-clock-o"></i>
                                                         </div>
                                                        <input type="text" class="form-control timepicker" name="job_start_time" value="<?php echo $jobs['job_start_time'];?>">
                                                           
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right">End Time</td>
                                            <td>
                                               <div class="col-xs-6">
                                                    <div class="input-group">
                                                         <div class="input-group-addon">
                                                                    <i class="fa fa-clock-o"></i>
                                                         </div>
                                                        <input type="text" class="form-control timepicker" name="job_end_time" value="<?php echo $jobs['job_end_time'];?>">
                                                           
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Due Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control input-sm datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_due_date" value="<?php echo $jobs['job_due_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Finished Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control input-sm datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_complete_date" value="<?php echo $jobs['job_complete_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right">Staff Member</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="user_id">
                                                     <option value="">Please Select</option>
                                                        <?php 
                                                        foreach ($groupData['staff'] as $key => $value) {?>
                                                            <option value="<?php echo $value['user_id']; ?>" <?php if($jobs['user_id']==$value['user_id']) echo 'selected';?>><?php echo $value['first_name'].' '.$value['last_name'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Tax</td>
                                            <td>
                                               <div class="col-xs-3">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_tax" value="<?php echo $jobs['job_tax'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <!-- <tr>
                                            
                                            <td align="right">Currency</td>
                                            <td>
                                             <?php
                                            //waiting nizam make the universal code for this one
                                            //currently use standard style
                                            ?>
                                               <div class="col-xs-5">
                                                    <select class="form-control" name="job_currency">
                                                        <option value="">Please Select</option>
                                                        <option value="0" <?php if($jobs['job_currency']==0) echo 'selected';?>>RM</option>
                                                        <option value="1" <?php if($jobs['job_currency']==1) echo 'selected';?>>USD</option>
                                                        <option value="2" <?php if($jobs['job_currency']==2) echo 'selected';?>>AUD</option>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr> -->
                                         <tr>
                                            
                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>
                                           
                                        </tr>
                                        
                                    </tbody></table>

                                    
                               
                                    
                                </div><!-- /.box-body -->
                               


                               
                            </div><!-- /.box -->

















                             <!-- job description part -->
                        <div class="col-bg-6">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Job Description</h3>
                                        </div>
                                         <div class="box-body">
                                                <table class="table table-striped">
                                                        <tbody>
                                                       
                                                        <tr>
                                                            
                                                            
                                                            <td>
                                                            
                                                               <div class="col-xs-12">
                                                                    <textarea class="form-control" rows="3" placeholder="" name="job_description"><?php echo $jobs['job_description'];?></textarea>
                                                                </div>
                                                            
                                                            </td>
                                                           
                                                        </tr>
                                                        
                                                        
                                                    </tbody></table>
                                        </div>
                                    </div>
                        </div>
                        <!-- end job description -->

                        <!-- job notes part -->
                        <div class="col-bg-6">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Job Notes</h3>
                                        </div>
                                         <div class="box-body">
                                                <table class="table table-striped">
                                                        <tbody>
                                                       
                                                        <tr>
                                                            
                                                            
                                                            <td>
                                                            
                                                               <div class="col-xs-12">
                                                                    <textarea class="form-control" rows="3" placeholder="" name="job_note"><?php echo $jobs['job_note'];?></textarea>
                                                                </div>
                                                            
                                                            </td>
                                                           
                                                        </tr>
                                                        
                                                        
                                                    </tbody></table>
                                        </div>
                                    </div>
                        </div>
                        <!-- end job notes -->


                        










                        <div class="col-bg-6">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Advanced</h3>
                                        </div>
                                         <div class="box-body">
                                                <table class="table table-striped">
                                        <tbody>
                                       
                                        <tr>
                                            
                                            <td align="right" width="100">Assign Website</td>
                                            <td>
                                            
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="website_id">
                                                    <option value="">Please Select</option>
                                                        <?php 
                                                        foreach ($groupData['website'] as $value ) {
                                                            ?>
                                                            <option value="<?php echo $value['website_id'];?>" <?php if($jobs['website_id']==$value['website_id']) echo 'selected';?>><?php echo $value['website_url'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right" width="100">Assign Customers</td>
                                            <td>
                                            
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="customer_id">
                                                     <option value="">Please Select</option>
                                                        <?php 
                                                        foreach ($groupData['customer'] as $value ) {
                                                            ?>
                                                            <option value="<?php echo $value['customer_id'];?>" <?php if($jobs['customer_id']==$value['customer_id']) echo 'selected';?>><?php echo $value['customer_name'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            
                                            </td>
                                           
                                        </tr>
                                      <!--  
                                    Database Quote not ready yet...waiting from ZACK
                                      <tr>
                                            
                                            <td align="right" width="100">Assign Customers</td>
                                            <td>
                                            
                                               <div class="col-xs-5">
                                                    <select class="form-control" name="job_type">
                                                        <?php 
                                                        foreach ($customer as $value ) {
                                                            ?>
                                                            <option value="<?php echo $value['customer_id'];?>"><?php echo $value['customer_name'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            
                                            </td>
                                           
                                        </tr> -->


                                        <!-- need to add automatic renewal tick checkbox -->
                                        <tr>
                                            
                                            <td align="right">Renewal Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_renewal_date" value="<?php echo $jobs['job_renewal_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Task type</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_task_type">
                                                    <option value="">Please Select</option>
                                                        <option value="0" <?php if($jobs['job_task_type']==0) echo 'selected';?>>Hourly rate & Amount</option>
                                                        <option value="1" <?php if($jobs['job_task_type']==1) echo 'selected';?>>Quantity & Amount</option>
                                                        <option value="2" <?php if($jobs['job_task_type']==2) echo 'selected';?>>Amount Only</option>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Discount Amount</td>
                                            <td>
                                               <div class="col-xs-3">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_discount_amount" value="<?php echo $jobs['job_discount_amount'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right">Discount Name</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_discount_name" value="<?php echo $jobs['job_discount_name'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Discount type</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_discount_type">
                                                    <option value="">Please Select</option>
                                                        <option value="0" <?php if($jobs['job_discount_type']==0) echo 'selected';?>>Before Tax</option>
                                                        <option value="1" <?php if($jobs['job_discount_type']==1) echo 'selected';?>>After Tax</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>
                                           
                                        </tr>
                                        
                                    </tbody></table>
                                        </div>
                                    </div>
                        </div>
 























                            
                        </div><!-- /.col -->




                        <div class="col-md-8">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Job Task</h3>
                                    <!-- <div class="box-tools">
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            <li><a href="#">«</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul>
                                    </div> -->
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">

                                    <table class="table table-striped" id="task">
                                        
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 430px">Description</th>
                                            <th>Hours</th>
                                            <th>Amount(<?php echo $this->config->item("currency");?>)</th>
                                            <th>Due Date</th>
                                            <!-- <th>Done Date</th> -->
                                            <th>Staff</th>
                                            <th style="width:100px">%</th>
                                            <th style="width:200px">Action</th>
                                        </tr>
                                        <tr id="loading" style="display:none">
                                            <td colspan="8" align="center"><span><img src="<?php echo base_url().'assets/img/725.GIF';?>" /></span></td>
                                        </tr>
                                        <tr id="error" style="display:none;">
                                            <td colspan="8" align="center" style="color:red"></td>
                                        </tr>
                                         <tr>
                                            <td>
                                               
                                                    <!-- <input type="text" class="form-control input-sm" placeholder="" name="job_discount_name" style="width:40px;">
                                                 -->
                                            </td>
                                            <td>
                                          
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_description" id="job_task_description"> <span class="fa fa-plus add_product" style="position:absolute;top:95px;left:10px;cursor:pointer" data-add_product="add"></span>
                                                    <input type="hidden" value="" name="pro_id" id="pro_id" class="form-control input-sm">
                                                   
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_hour" id="job_task_hour" style="width:40px;">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" id="job_task_amount" style="width:40px;">
                                            </td>
                                            <td>
                                               
                                                <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_task_due_date" id="job_task_due_date" style="width:150px">
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                <select class="form-control" name="user_id" id="user_id" style="width:100px">
                                                        <?php 
                                                        foreach ($groupData['staff'] as $key => $value) {?>
                                                            <option value="<?php echo $value['user_id']; ?>"><?php echo $value['first_name'].' '.$value['last_name'];?></option>
                                                      <?php  } ?>
                                                        
                                               </select>
                                            </td>
                                            <td style="width:30px">
                                                   
                                                 <input type="checkbox" style="position: absolute; opacity: 0;" name="job_task_percentage" id="job_task_percentage" value="1">
                                           
                                            </td>
                                            <td>
                                            <!-- <input type="submit" class="btn btn-success btn-sm" value="New Task" name="save_task"> -->
                                            <input type="button" class="btn btn-success btn-sm button_task" value="New Task" name="save_task">
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" id="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $token_val; ?>" />
                                            </td>
                                        </tr>
                                        
                                        
                                    
                                    <!-- <tbody id="new_task">-->
                                     
                                    </table>
                                    <div class="col-md-13">
                                    <!-- Primary box -->
                                    <div class="box box-solid box-danger">
                                        <div class="box-header" >
                                            <h3 class="box-title">Total</h3>
                                            
                                        </div>
                                        <div class="box-body" id="total">
                                            
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                                
                               <!-- <a class="fancybox" rel="group" href="big_image_1.jpg"><img src="small_image_1.jpg" alt="" /></a>
                                <a class="fancybox" rel="group" href="big_image_2.jpg"><img src="small_image_2.jpg" alt="" /></a> -->


                                    <!-- <div class="table-responsive">
                                        <table class="table no-border" style="border:none">
                                            <tbody><tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>$250.30</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (9.3%)</th>
                                                <td>$10.34</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping:</th>
                                                <td>$5.80</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>$265.24</td>
                                            </tr>
                                        </tbody></table>
                                    </div> -->
                                    

                                    <script type="text/javascript">
                                   
                                    jQuery(function()
                                    {
                                        /*----------------------------------------------------------------------
                                        / ColorBOX
                                        /-----------------------------------------------------------------------*/
                                       
                                         $(".add_product").colorbox({ 
                                                                        href : "<?php echo base_url();?>jobs/ajax_product",
                                                                        data :{ jenis       : 'display', 
                                                                                add_product : function(){
                                                                                    var jenis_proses = $('.add_product');
                                                                                    //alert(jenis_proses.attr('class'));
                                                                            return jenis_proses.data('add_product');
                                                                                    }
                                                                                }

                                                                       
                                                                    });

                                               

                                           



                                        /*----------------------------------------------------------------------
                                        / All job task
                                        /-----------------------------------------------------------------------*/     
                                        
                                        var myObj = {

                                            /**
                                             * default configuration
                                             * Don't modified this if not sure
                                             */
                                            colorBoxUrl     : '<?php echo base_url();?>jobs/ajax_product',
                                            table_selector  : $('#task'),
                                            loading_part    : $(loading),
                                            idJob           : <?php echo $job_id;?>,
                                            select_tr       : $('#task tbody tr:last'), 
                                            token           : '<?php echo $this->security->get_csrf_hash(); ?>',
                                            error_selector  :  $('#error'),
                                            error_msg       : 'There is a problem requesting. Please try again!!',
                                            ajax_timeOut    : 5000,
                                            ajax_method     : 'POST',
                                            ajax_cache      : false
                                        ,
                                        displayContent : function(url, loading, data){

                                            $.ajax({
                                                type        : myObj.ajax_method,
                                                url         : url,
                                                data        : data,
                                                cache       : myObj.ajax_cache,
                                                beforeSend  : function(){  myObj.loading_part.show(); },
                                                success     : function(a){
                                                        myObj.error_selector.hide();
                                                        myObj.select_tr.after(a);
                                                        myObj.loading_part.hide();
                                                        myObj.dispTotal();
                                                },
                                                error       : function(x, t, m) {
                                                    if(t){
                                                        
                                                        myObj.error_selector.show().find('td').html(myObj.error_msg);
                                                        myObj.loading_part.hide();

                                                    }        
                                                },timeout     : myObj.ajax_timeOut // if reached this 5 seconds, error msg triggered
                                            });
                                        }
                                        ,
                                        addEditContent     : function(url, dataString, display_part, jenis){

                                            $.ajax({
                                                type        : myObj.ajax_method,
                                                url         : url,
                                                data        : dataString,
                                                cache       : myObj.ajax_cache,
                                                beforeSend  : function(){  myObj.loading_part.show(); },
                                                success     : function(a){
                                                        myObj.error_selector.hide();

                                                        if(jenis=="edit")
                                                        {
                                                            display_part.append(a);
                                                            myObj.dispTotal();
                                                        }
                                                        else /** for DELETE and DISPLAY --no need to show up any DOM elements **/
                                                        {
                                                            myObj.dispTotal();
                                                        }

                                                        
                                                        myObj.loading_part.hide();
                                                },
                                                error       : function(x, t, m){
                                                    if(t){
                                                        myObj.error_selector.show().find('td').html(myObj.error_msg);
                                                        myObj.loading_part.hide();
                                                    }   
                                                },
                                                timeout     : myObj.ajax_timeOut // if reached this 5 seconds, error msg triggered
                                            });
                                        }
                                        ,
                                        dispTotal          : function(){
                                            $('#total').load('<?php echo base_url();?>jobs/ajax_job_task',{job_id : myObj.idJob, jenis : 'total'});
                                        },
                                        resetForm           : function(){
                                            /*$('#job_task_description').val("");
                                            $('')*/
                                            $('#task input[type!=button]').each(function(index, el) {
                                                
                                                $(this).val("");
                                            });
                                        }
                                        
                                        


                                    }

                                    /** DISPLAY
                                     * display content
                                     * 
                                     */
                                            var disp_data = "job_id="+myObj.idJob+"&jenis=display&<?php echo $this->security->get_csrf_token_name(); ?>="+myObj.token,
                                            url           = '<?php echo base_url();?>jobs/ajax_job_task',
                                            load_selector = '#loading';

                                            myObj.displayContent(url,load_selector,disp_data);

                                    /* end display content */



                                     /** LOAD TOTAL PART
                                     * when edit button clicked
                                     */
                                        
                                                  
                                            
                                        

                                    /* end editing content */




                                    /** ADD NEW ENTRY
                                     * when new task button was clicked
                                     * adding content
                                     */
                                       $('#task input[type=button]').on('click', function(){

                                                /* value from form to insert into database */
                                                var url                  = '<?php echo base_url();?>jobs/ajax_job_task';
                                                var job_task_description = $('#job_task_description').val(),
                                                job_task_hour            = $('#job_task_hour').val(),
                                                job_task_amount          = $('#job_task_amount').val(),
                                                job_task_due_date        = $('#job_task_due_date').val(),
                                                user_id                  = $('#user_id').val(),
                                                product_id                   = $('#pro_id').val(),
                                                csrf_test_name           = $('#<?php echo $this->security->get_csrf_token_name(); ?>').val();

                                                var checkbox_p = $('#job_task_percentage');
                                                var job_task_percentage;

                                                    if(checkbox_p.is(':checked'))
                                                    {
                                                        job_task_percentage = 1;
                                                        
                                                        
                                                    }
                                                    else
                                                    {
                                                        job_task_percentage = 0;
                                                        
                                                    }


                                                /** string that become the value in ajax post data -see function parameter **/
                                                var dataString = "job_id="+myObj.idJob+"&jenis=add"+
                                                                 "&job_task_description="+job_task_description+
                                                                 "&job_task_hour="+job_task_hour+
                                                                 "&job_task_amount="+job_task_amount+
                                                                 "&job_task_due_date="+job_task_due_date+
                                                                 "&user_id="+user_id+
                                                                 "&product_id="+product_id+
                                                                 "&job_task_percentage="+job_task_percentage+
                                                                 "&csrf_test_name="+csrf_test_name;

                                                /** part that want to display the data  after insert **/
                                                var display_part =   myObj.table_selector.find('tbody'); 
                                                myObj.addEditContent(url,dataString, display_part, 'edit');
                                                myObj.resetForm();
                                                
                                        });
                                        /* end adding content */



                                    /** OPEN EDIT FORM
                                     * when edit button clicked
                                     */
                                        $('#task').on('click','.button_edit_task',function(){
                                        
                                            /** store the task job id for using in update query**/
                                            var job_task_id = $(this).data('job_task_id');
                                            var current_tr = $(this).closest('tr');
                                            /**  numbering value store for displaying in each part(edit,display etc.. **/
                                            var num_disp = current_tr.find('td .num').text();

                                            /** remove the <TD> html tag **/
                                            current_tr.find('td').remove();
                                            /** after remove, then add the new one with new set of <TD> react as a form**/
                                            current_tr.load('<?php echo base_url();?>jobs/ajax_job_task_edit',{job_task_id : job_task_id, jenis : 'edit',num_display : num_disp });
                                            
                                            
                                        });

                                    /* end editing content */







                                    /** SAVE
                                     * when save button clicked
                                     */
                                     $('#task').on('click','.button_save_task',function(){

                                             var job_task_id = $(this).data('job_task_id');
                                             var current_tr = $(this).closest('tr');
                                             var num_disp = $(this).data('num_display');

                                             
                                                var url                  = '<?php echo base_url();?>jobs/ajax_job_task_edit';
                                                var job_task_description = $('#job_task_description1').val(),
                                                job_task_hour            = $('#job_task_hour1').val(),
                                                job_task_amount          = $('#job_task_amount1').val(),
                                                job_task_due_date        = $('#job_task_due_date1').val(),
                                                user_id                  = $('#user_id1').val(),
                                                product_id               = $('#product_id1').val(),
                                                csrf_test_name           = $('#<?php echo $this->security->get_csrf_token_name(); ?>').val();


                                                /** want to check either chekcbok is tick or not**/
                                                var checkbox_p = $('#job_task_percentage1');
                                                var job_task_percentage;

                                                    if(checkbox_p.is(':checked'))
                                                    {
                                                        job_task_percentage = 1;
                                                        
                                                        
                                                    }
                                                    else
                                                    {
                                                        job_task_percentage = 0;
                                                        
                                                    }

                                               
                                                var dataString = "job_task_id="+job_task_id+"&jenis=save"+
                                                                 "&num_display="+num_disp+
                                                                 "&job_task_description="+job_task_description+
                                                                 "&job_task_hour="+job_task_hour+
                                                                 "&job_task_amount="+job_task_amount+
                                                                 "&job_task_due_date="+job_task_due_date+
                                                                 "&product_id="+product_id+
                                                                 "&user_id="+user_id+
                                                                 "&job_task_percentage="+job_task_percentage+
                                                                 "&csrf_test_name="+csrf_test_name;

                                                               
                                                var display_part =   current_tr;
                                                myObj.addEditContent(url,dataString, display_part,'save');

                                                /** remove td then load the new one-like edit part**/
                                                current_tr.find('td').remove();
                                                current_tr.load('<?php echo base_url();?>jobs/ajax_job_task_edit',{job_task_id : job_task_id, jenis : 'display',num_display : num_disp });
                                                

                                    });
                                    /* end save content */




                                    /** DELETE task
                                     * 
                                     */
                                    $('#task').on('click','.button_delete_task', function(){

                                             var job_task_id = $(this).data('job_task_id');
                                             var current_tr  = $(this).closest('tr');
                                             var num_disp    = $(this).data('num_display');
                                             var dataString  = "job_task_id="+job_task_id+"&jenis=delete";
                                             var url         = '<?php echo base_url();?>jobs/ajax_job_task_edit';

                                             /** remove the <TD> html tag **/
                                             current_tr.find('td').remove();
                                             myObj.addEditContent(url,dataString, "no_need",'delete');
                                            
                                           
                                             
                                    })
                                     /* end delete task */




                                     




                                   
                                   /** TASK HOUR
                                    * [description] Code to call function hour in js file in assets folder
                                    * automatic calculate amount when enter hour in job task
                                    * @return {[type]} [description]
                                    */
                                         $('#job_task_hour').on('keyup',function(){

                                                var groupVar = varDeclare();
                                                if(groupVar[0].val()!=""){                                                    
                                                    var new_amount = cal(groupVar[0],groupVar[2]);
                                                        groupVar[1].val(new_amount);
                                                        return true;
                                                }
                                                else{
                                                    alert("Please enter the hours rate!!");
                                                    groupVar[0].focus();
                                                    return false;
                                                }
                                        });


                                        $('#job_hour').on('keyup',function(){

                                                var groupVar = varDeclare();
                                                if(groupVar[2].val()!=""){                                                    
                                                    var new_amount = cal(groupVar[0],groupVar[2]);
                                                        groupVar[1].val(new_amount);
                                                        return true;
                                                }
                                                else{
                                                    alert("Please enter the hours rate!!");
                                                    groupVar[2].focus();
                                                    return false;
                                                }
                                        });
                                   
                                    /**
                                     * END TASK HOUR
                                     */


                                        
                                    });
                                    </script>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            
                        </div><!-- /.col -->
                    </div>
</form>
                
                
               
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>
