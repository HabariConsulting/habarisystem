 <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>New Department</h4>
                        <div class="tools">
                           
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo site_url();?>/auth/save_dep" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
                           <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                           <div class="control-group">
                              <label class="control-label">Department Name:<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="title" id="title" data-required="1" class="span6 m-wrap" />
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              <label class="control-label">Department Rate (KES):<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="rate" id="rate" data-required="1" class="span6 m-wrap" />
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              <label class="control-label">Description:<span class="required">*</span></label>
                              <div class="controls">
                                 <textarea class="span12 ckeditor m-wrap" name="editor1" id="editor1" rows="6"></textarea>
                              </div>
                           </div>
                           
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Save Department</button>
                              <a href="<?php echo site_url();?>/auth/departments"><button type="button" class="btn">Cancel</button></a>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
           