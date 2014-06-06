 <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Assign Yourself a Department</h4>
                        <div class="tools">
                           
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo site_url();?>/auth/edituser_dep/<?php echo $this->session->userdata("user_id");?>" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
                           <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                            <div class="control-group">
                              <label class="control-label">Department: <span class="required">*</span></label>
                              <div class="controls">
                                 <select name="selCSI" data-placeholder="Select Client from Database" class="chosen-with-diselect span6" tabindex="-1" id="selCSI">
                                    <!--<option selected value="<?php echo $dep_user['dep_id'];?>"><?php echo $dep_user['dep_name'];?></option>-->
                                    <?php
                           
                            foreach ($department_fetch->result() as $row) { ?>
                                    <option value="<?php echo $row->dep_id; ?>"><?php echo $row->dep_name; ?></option><?php }?>
                                    
                                 </select>
                              </div>
                           </div>
                           
                           
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Assign Department</button>
                              <a href="<?php echo site_url();?>/auth/departments"><button type="button" class="btn">Cancel</button></a>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
           