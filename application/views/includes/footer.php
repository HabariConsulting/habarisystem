			</div>
			<!-- END PAGE CONTAINER-->	
		</div>
		
    <!-- END PAGE -->	 	
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	 <div class="footer">
      2014 &copy; Habari Consulting Timesheet System v1.0.3
      <div class="span pull-right">
         <span class="go-top"><i class="icon-angle-up"></i></span>
      </div>
   </div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
	<!-- Load javascripts at bottom, this will reduce page load time -->
    
    <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="assets/js/excanvas.js"></script>
   <script src="assets/js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo base_url();?>assets/jquery-validation/dist/additional-methods.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/jquery-validation/dist/jquery.validate.min.js"></script>
 	<script src="<?php echo base_url();?>assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>			
	<script src="<?php echo base_url();?>assets/breakpoints/breakpoints.js"></script>			
	<script src="<?php echo base_url();?>assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>	
	<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.blockui.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
	<script src="<?php echo base_url();?>assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>	
	<script type="text/javascript" src="<?php echo base_url();?>assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>   <script src="<?php echo base_url();?>assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script> 
   <script type="text/javascript" src="<?php echo base_url();?>assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/clockface/js/clockface.js"></script>

	
		
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>assets/js/excanvas.js"></script>
	<script src="<?php echo base_url();?>assets/js/respond.js"></script>
	<![endif]-->
	<script src="<?php echo base_url();?>assets/jquery-knob/js/jquery.knob.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.pulsate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/data-tables/DT_bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>		
	<?php if ($page_location=='Quotes'){?>
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			//App.setPage("table_managed");
			App.setPage("sliders");
			App.init();
		});
	</script>
	<?php }else{?>
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage("table_managed");
			//App.setPage("sliders");
			App.init();
		});
	</script>
	<?php }?>
	
 </body>
<!-- END BODY -->
</html>