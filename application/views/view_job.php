 <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="pull-right">
                                 <a href="<?php echo site_url();?>/auth/add_job_type" class="btn icn-only green">Add Job Type <i class="m-icon-swapright m-icon-white"></i></a>                           
                              </div><br/><br/>
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i><?php echo $job_fetch['name'];?> : <?php echo $job_fetch['client_code'];?>-<?php echo $job_fetch['job_type'];?>-<?php echo $job_fetch['job_id'];?></h4>
                        <div class="tools">
                           
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo site_url();?>/auth/edit_job/<?php echo $job_fetch['job_id'];?>" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
                           
                           
                           <div class="control-group">
                              <label class="control-label">Client: <span class="required">*</span></label>
                              <div class="controls">
                                 <select name="selCSI" data-placeholder="Select Client from Database" class="chosen-with-diselect span6" tabindex="-1" id="selCSI">
                                    <option selected value="<?php echo $job_fetch['client_id'];?>"><?php echo $job_fetch['name'];?></option
                                    <?php
                           
                            foreach ($client_fetch->result() as $row) { ?>
                                    <option value="<?php echo $row->client_id; ?>"><?php echo $row->name; ?></option><?php }?>
                                    
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Job Type: <span class="required">*</span></label>
                              <div class="controls">
                                 <select name="selCSI2" data-placeholder="Select Job Type" class="chosen-with-diselect span6" tabindex="-1" id="selCSI2">
                                    <option value="<?php echo $job_fetch['job_type_id'];?>"><?php echo $job_fetch['job_type_name'];?></option>
                                    
                                    <?php
                           
                            foreach ($job_type_fetch->result() as $row) { ?>
                                    <option value="<?php echo $row->job_type_id; ?>"><?php echo $row->job_type_name; ?></option>
                                    <?php }?>
                                    
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Description:<span class="required">*</span></label>
                              <div class="controls">
                                 <textarea class="span12 ckeditor m-wrap" name="editor1" id="editor1" rows="6"><?php echo $job_fetch['description'];?></textarea>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Timeline:<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="timeline" id="timeline" data-required="1" class="span6 m-wrap" value="<?php echo $job_fetch['timeline'];?>" />
                                 
                              </div>
                           </div>
                           <div class="control-group">
                                       <label class="control-label">Contract Type<span class="required">*</span></label>
                                       <div class="controls">
                                          <label class="radio">
                                          <input type="radio" name="optionsRadios1" value="Yes" />
                                          Retainer
                                          </label>
                                          <label class="radio">
                                          <input type="radio" name="optionsRadios1" value="No" checked />
                                          Non-Retainer
                                          </label>  
                                           
                                       </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Category if Non-retainer:</label>
                              <div class="controls">
                                 <input type="text" name="category" id="category" data-required="1" class="span6 m-wrap" value="<?php echo $job_fetch['category'];?>" />
                                 
                              </div>
                           </div>  
                           <div class="control-group">
                              <label class="control-label">Quote:<span class="required">*</span></label>
                              <div class="controls">
                                 <input type="text" name="quote" id="quote" data-required="1" class="span6 m-wrap" value="<?php echo $job_fetch['quote'];?>" />
                                 
                              </div>
                           </div>  
                           
                          
                           
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Edit Job</button>
                              <a href="<?php echo site_url();?>/auth/view_jobs"><button type="button" class="btn">Cancel</button></a>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
           