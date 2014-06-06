 <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>New Timesheet</h4>
                        <div class="tools">
                           
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo site_url();?>/auth/save_sheet" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
                          
                           
                           <div class="control-group">
                              <label class="control-label">Task: <span class="required">*</span></label>
                              <div class="controls">
                                 <select name="selCSI" data-placeholder="Select from Assigned Tasks" class="chosen-with-diselect span6" tabindex="-1" id="selCSI">
                                    <option value=""></option>
                                    <?php foreach ($task_user->result() as $row) { ?>
                                    <option value="<?php echo $row->task_id; ?>"><?php echo $row->title; ?></option><?php }?>
                                    
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">No. of Hours: <span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="hours" id="hours" data-required="1" class="span6 m-wrap" />
                                 
                              </div>
                           </div> 
                           
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Save Timesheet</button>
                              <a href="<?php echo site_url();?>/auth/view_sheets"><button type="button" class="btn">Cancel</button></a>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
           