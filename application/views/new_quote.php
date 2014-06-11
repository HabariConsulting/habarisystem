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
        background-color:#f8f8f8;
        margin-top: 20px;
        border: 1px solid #f1f1f1;
		height:auto;
	}
	
	.selections_nxt{
	 	padding: 10px 20px;
        margin-top: 20px;
        border: 1px solid #ddd;
		height:auto;	
	}
 
     
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="red"){
                $(".box").hide();
                $(".red").show();
            }
            if($(this).attr("value")=="green"){
                $(".box").hide();
                $(".green").show();
            }
             
        });
    });
</script>
 <form action="<?php echo site_url();?>/quote/save_quote" name="form" method="post" enctype="multipart/form-data">
 
<div class="Page-title">Create Job Quote :  Step 1</div>
<div id="Accordion1" class="Accordion" tabindex="0">
  <div class="AccordionPanel">
    <div class="AccordionPanelTab"><div class="quote_title">Fill Client Details</div></div>
    <div class="AccordionPanelContent">
    


 <div class="control-group">
 
 <div class="selections">
 <table width="50%">
     <tr>
        <td width="25%">Existing Client ?</td>
        <td width="12%"><label><input type="radio" name="colorRadio" value="red"> Yes</label></td>
        <td width="13%"><label><input type="radio" name="colorRadio" value="green"> No</label></td>
     </tr>
 </table>

        
        
         
    </div>
    <div class="red box" style="margin-bottom:20px;height:auto;">
     <div class="control-group">
                               <div class="controls" style="padding-bottom:20px;height:auto;">
                                 <select name="selCSI" data-placeholder="Select Client from Database" class="chosen-with-diselect span6" tabindex="-1" id="selCSI" style="width:500px">
                                    <option value=""></option>
                                    <?php
                           
                            foreach ($client_fetch->result() as $row) { ?>
                                    <option value="<?php echo $row->client_id; ?>"><?php echo $row->name; ?></option><?php }?>
                                    
                                 </select>
                              </div>
                           </div>
    </div>
    <div class="green box">
    
     <!-- BEGIN FORM-->
                         
                           
                           <div class="control-group">
                              
                              <div class="controls">
                                 <input type="text" name="client_name" id="client_name" data-required="1" class="span6 m-wrap" placeholder="Client Name"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                               <div class="controls">
                                 <input type="text" name="email" id="email" data-required="1" class="span6 m-wrap" placeholder="E-mail Address"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                               
                              <div class="controls">
                                 <input type="text" name="p_number" id="p_number" data-required="1" class="span6 m-wrap" placeholder="Phone Number"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              
                              <div class="controls">
                                 <input type="text" name="location" id="location" data-required="1" class="span6 m-wrap" placeholder="Physical Location"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                               
                              <div class="controls">
                                 <input type="text" name="address" id="address" data-required="1" class="span6 m-wrap" placeholder="Postal Address"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                               <div class="controls">
                                 <input type="text" name="contact" id="contact" data-required="1" class="span6 m-wrap" placeholder="Contact Person"/>
                                 
                              </div>
                           </div> 
                           <div class="control-group">
                              
                              <div class="controls">
                                 <input type="text" name="c_number" id="c_number" data-required="1" class="span6 m-wrap" placeholder="Contact Person Number"/>
                                 
                              </div>
                           </div> 
                          
                           
                            
                         
                        <!-- END FORM-->
    </div>
     
                              
                              

                              
                              
                           </div> 
                           
                       
                     
    </div>
  </div>
  <div class="AccordionPanel">
    <div class="AccordionPanelTab"><div class="quote_title">Fill Job Information</div></div>
    <div class="AccordionPanelContent">
     
                            <div class="selections_nxt" style="height:auto">
                           
                           <div class="control-group">
                               
                              <div class="controls">
                                 <input type="text" name="job_title" id="job_number" data-required="1" class="span6 m-wrap" placeholder="Job Title"/>
                                 
                              </div>
                           </div> 
                           
                           <div class="control-group">
                               <div class="controls">
                                  <textarea class="span8 ckeditor m-wrap" name="job_summary" rows="6">Job Summary</textarea>
                              </div>
                           </div>
                               
                              <div class="control-group">
                              
                              <div class="controls">
                              
                               <table>
                                     <tr>
                                         <td>
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                       <div class="uneditable-input">
                                          <i class="icon-file fileupload-exists"></i> 
                                          <span class="fileupload-preview"></span>
                                       </div>
                                       <span class="btn btn-file">
                                       <span class="fileupload-new">Select file</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" class="default" name="project_brief"/>
                                       </span>
                                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                 </div>
                                         </td>
                                         <td>&nbsp;&nbsp;&nbsp;<span style="color:#F00">*</span>&nbsp;Project Brief</td>
                                     </tr>
                                 </table>
                                
                              </div>
                           </div> 
                           <div class="control-group">
                               <div class="controls">
                                 <table>
                                     <tr>
                                         <td>
                                          
                                 <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" name="project_start_date" value="Project Start Date" />
                              
                                         </td>
                                         <td>&nbsp;&nbsp;&nbsp;<input class="m-wrap m-ctrl-medium date-picker" name="project_end_date" size="16" type="text" value="Project End Date" /></td>
                                     </tr>
                                 </table>
                                 
                              </div>
                           </div> 
                           
                           
                           <div class="control-group">
                                        
                                       <div class="controls">
                                          <select name="contract_type" data-placeholder="Type of Contract" class="selectquote span6" tabindex="-1" id="selCSI">
                                    <option  >Type of Contract</option>
                                    <option value="Retainer">Retainer</option>
                                    <option value="Non-Retainer">Non-Retainer</option>
                                               
                                 </select> 
                                           
                                       </div>
                           </div>
                           <div class="control-group">
                               <div class="controls">
                                  <select name="job_category" data-placeholder="Job Category" class="selectquote span6" tabindex="-1" id="selCSI">
                                     <option >Job Category</option>
                                    <option value="Retainer">Websites</option>
                                    <option value="Retainer">Print</option>
                                    <option value="Retainer">Production</option>
                                    <option value="Retainer">Articles & Magazines </option>
                                    <option value="Non-Retainer">Corporate Identity (CI)</option>
                                    <option value="Non-Retainer">Event Setup</option>
                                               
                                 </select> 
                                 
                              </div>
                           </div> 
               
                           
                          
                           <div class="control-group">
                               <div class="controls">
                                 <input type="text" name="total_cost" id="timeline" data-required="1" class="span6 m-wrap"  placeholder="Total Cost"/>
                                 
                              </div>
                           </div>
                           
                           <div class="control-group">
                              
                              <div class="controls">
                              
                               <table>
                                     <tr>
                                         <td>
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                       <div class="uneditable-input">
                                          <i class="icon-file fileupload-exists"></i> 
                                          <span class="fileupload-preview"></span>
                                       </div>
                                       <span class="btn btn-file">
                                       <span class="fileupload-new">Select file</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" class="default" name="other_docs" />
                                       </span>
                                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                 </div>
                                         </td>
                                         <td>&nbsp;&nbsp;&nbsp;<span style="color:#F00">*</span>&nbsp;Other Document</td>
                                     </tr>
                                 </table>
                                
                              </div>
                           </div>    
                           
                           
                           </div>
                          
                           
                            
                        
                           
                          
                            
    </div>
  </div>
   
</div>

 <div class="form-actions">
                              <button type="submit" class="btn blue" style="padding:10px 40px">Save Quote</button>
                              <a href="<?php echo site_url();?>/auth/departments"><button type="button" class="btn" style="padding:10px 40px">Cancel</button></a>
                           </div>
                           </form>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
 