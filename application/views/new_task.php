 <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>New Task</h4>
                        <div class="tools">
                           
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo site_url();?>/auth/save_task" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
                           <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                           <div class="control-group">
                              <label class="control-label">Task Title:<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="title" id="title" data-required="1" class="span6 m-wrap" />
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              <label class="control-label">Attach to a Job: <span class="required">*</span></label>
                              <div class="controls">
                                 <select name="selCSI" data-placeholder="Select Job Number from Database" class="chosen-with-diselect span6" tabindex="-1" id="selCSI">
                                    <option value=""></option>
                                    <?php
                           
                            foreach ($job_fetch->result() as $row) { ?>
                                    <option value="<?php echo $row->job_id; ?>"><?php echo $row->job_number; ?></option><?php }?>
                                    
                                 </select>
                              </div>
                           </div>
                          
                           <div class="control-group">
                              <label class="control-label">Brief:<span class="required">*</span></label>
                              <div class="controls">
                                 <textarea class="span12 ckeditor m-wrap" name="editor1" id="editor1" rows="6"></textarea>
                              </div>
                           </div>
                            <div class="control-group">
                              <label class="control-label">Assigned Department:<span class="required">*</span> </label>
                              <div class="controls">
                                 <select name="employee" id="employee" data-placeholder="Select Department" class="chosen-with-diselect span6" tabindex="-1">
                                    <option value=""></option>
                                    <?php
                           
                            foreach ($employeedep_fetch->result() as $row) { ?>
                            <option value="<?php echo $row->dep_id; ?>"><?php echo $row->dep_name; ?></option><?php }?>
                                    <!--<optgroup label="<?php echo $row->dep_name; ?> Department">
                                       <option value="<?php echo $row->id; ?>"><?php echo $row->first_name; ?></option>                                       
                                    </optgroup>-->
                                    
                                   </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Deadline: <span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="deadline" id="deadline" data-required="1" class="span6 m-wrap" />
                                 <span class="help-inline">In the format 2014-02-27</span>
                              </div>
                           </div> 
                           
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Save Task</button>
                              <a href="<?php echo site_url();?>/auth/view_tasks"><button type="button" class="btn">Cancel</button></a>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
           