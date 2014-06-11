<script src="<?php echo base_url();?>assets/SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>assets/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<style type="text/css">
   
    .box{
        padding: 20px;
        display: none;
        margin-top: 20px;
        border: 1px solid #ddd;
		height:auto;
    }
	
    .red{ 
		background: #fff; 
	}
    
	.green{ 
		background: #fff; 
	}
	
	.selections{
		padding: 10px 20px;
        background-color:#f2f2f2;
        margin-top: 20px;
        border: 1px solid #ddd;
		height:auto;
	}
	
	.selections_nxt{
	 	padding: 10px 20px;
        margin-top: 20px;
        border: 1px solid #ddd;
		height:auto;
		min-height:500px
		 
	}
 
     
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<div class="AccordionPanelTab"><div class="quote_title">step 2 : Enter Job tasks   &nbsp;&nbsp;<span> &raquo;&nbsp;&nbsp; <?php echo $job['job_title'];?></span></div></div>
  <?php if(!empty($success)){?>
  <div class="alert alert-block alert-success fade in">
									<button type="button" class="close" data-dismiss="alert"></button>
									<h4 class="alert-heading">Success!</h4>
									<p>
										<?php echo $success;?>
									</p>
									<p>
										<a class="btn green" href="<?php echo base_url();?>index.php/auth/view_jobs">No, Finish</a> 
									</p>
								</div>
  
 
  <?php } ?>
  
 <div class="selections_nxt">
<form action="<?php echo site_url();?>/quote/save_task" name="form" method="post" enctype="multipart/form-data">
                           <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                           <div class="control-group">
                               <div class="controls">
                                 <input type="text" name="title" id="title" data-required="1" class="span6 m-wrap" placeholder="Task Title" />
                                 
                              </div>
                           </div> 
                     
                          
                           <div class="control-group">
                               <div class="controls">
                                 <input name="job_id" type="hidden" value="<?php echo $job['job_id'];?>"/>
                                 <textarea class="span12 ckeditor m-wrap" name="task_brief" id="editor1" rows="6">Task Brief</textarea>
                              </div>
                           </div>
                            <div class="control-group">
                               <div class="controls">
                                 <table>
                                     <tr>
                                         <td>
                                          
                                 <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" name="task_start_date" value="Task Start Date" />
                              
                                         </td>
                                         <td>&nbsp;&nbsp;&nbsp;<input class="m-wrap m-ctrl-medium date-picker" name="task_end_date" size="16" type="text" value="Task End Date" /></td>
                                     </tr>
                                 </table>
                              </div>
                           </div> 
                            <div class="control-group">
                               <div class="controls">
                                 <select name="task_dept" data-placeholder="Select Client from Database" class="chosen-with-diselect span6" tabindex="-1" id="selCSI" style="width:500px">
                                    <option value="Dept. assigned to">Dept. assigned to</option>
                                    <?php
                           
                            foreach ($dept_fetch->result() as $row) { ?>
                                    <option value="<?php echo $row->dep_id; ?>"><?php echo $row->dep_name; ?></option><?php }?>
                                    
                                 </select>
                              </div>
                           </div>
                          
                           
                    

 </div>

 <div class="form-actions">
                              <button type="submit" class="btn blue" style="padding:10px 40px">Save Task</button>
                              <a href="<?php echo site_url();?>/auth/departments"><button type="button" class="btn" style="padding:10px 40px">Cancel</button></a>
                           </div>
                           </form>




<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
 