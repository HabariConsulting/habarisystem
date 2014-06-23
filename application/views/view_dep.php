 <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Edit/Delete <?php echo $department['dep_name'];?> Department</h4>
                        <div class="tools">
                           
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo site_url();?>/auth/edit_dep/<?php echo $department['dep_id'];?>" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
                           
                           <div class="control-group">
                              <label class="control-label">Department Name:<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="title" id="title" data-required="1" class="span6 m-wrap" value="<?php echo $department['dep_name'];?>"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              <label class="control-label">Department Rate (KES):<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="rate" id="rate" data-required="1" class="span6 m-wrap" value="<?php echo $department['rate'];?>"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              <label class="control-label">Description:</label>
                              <div class="controls">
                                 <textarea class="span12 ckeditor m-wrap" name="editor1" id="editor1" rows="6"><?php echo $department['description'];?></textarea>
                              </div>
                           </div>
                           
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Edit Department</button>
                              <a href="<?php echo site_url();?>/auth/departments"><button type="button" class="btn">Cancel</button></a>
                              <a href="<?php echo site_url();?>/auth/delete_dep/<?php echo $department['dep_id'];?>"><button type="button" class="btn red">Delete Department</button></a>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
           