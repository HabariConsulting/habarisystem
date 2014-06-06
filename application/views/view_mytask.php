 <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Edit Task: <?php echo $view_task['title'];?></h4>
                        <div class="tools">
                           
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo site_url();?>/auth/edit_task/<?php echo $view_task['task_id'];?>" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
                           
                           <div class="control-group">
                              <label class="control-label">Task Title:<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="title" id="title" data-required="1" class="span6 m-wrap" value="<?php echo $view_task['title'];?>" />
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              <label class="control-label">Client: <span class="required">*</span></label>
                              <div class="controls">
                                 <select name="selCSI" data-placeholder="Select Client from Database" class="chosen-with-diselect span6" tabindex="-1" id="selCSI">
                                    <option selected value="<?php echo $view_task['client_id'];?>"><?php echo $view_task['name'];?></option>
                                    <?php
                           
                            foreach ($client_fetch->result() as $row) { ?>
                                    <option value="<?php echo $row->client_id; ?>"><?php echo $row->name; ?></option><?php }?>
                                    
                                 </select>
                              </div>
                           </div>
                          
                           <div class="control-group">
                              <label class="control-label">Brief:<span class="required">*</span></label>
                              <div class="controls">
                                 <textarea class="span12 ckeditor m-wrap" name="editor1" id="editor1" rows="6"><?php echo $view_task['brief'];?></textarea>
                              </div>
                           </div>
                            <div class="control-group">
                              <label class="control-label">Assigned To:<span class="required">*</span> </label>
                              <div class="controls">
                                 <select name="employee" id="employee" data-placeholder="Select who to assign task to" class="chosen span6" multiple="multiple" tabindex="6">
                                    <option selected value="<?php echo $view_task['id'];?>"><?php echo $view_task['first_name'];?></option>
                                    <?php
                           
                            foreach ($employeedep_fetch->result() as $row) { ?>
                                    <optgroup label="<?php echo $row->dep_name; ?> Department">
                                       <option value="<?php echo $row->id; ?>"><?php echo $row->first_name; ?></option>                                       
                                    </optgroup>
                                    <?php }?>
                                   </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Deadline: <span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="deadline" id="deadline" data-required="1" class="span6 m-wrap" value="<?php echo $view_task['deadline'];?>"/>
                                 <span class="help-inline">In the format 2014-02-27</span>
                              </div>
                           </div> 
                           
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Edit Task</button>
                              <a href="<?php echo site_url();?>/auth/view_tasks"><button type="button" class="btn">Cancel</button></a>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
           