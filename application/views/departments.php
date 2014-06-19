
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid profile">
					<div class="span12">
						<div class="row-fluid add-portfolio">
										<div class="pull-left">
											<span><?php if(isset($count_dep)): foreach($count_dep as $row): ?>
														<?php echo $row->num; ?><?php endforeach; ?>
									                       <?php else :?>
									                                
									                    <?php endif; ?> Departments at Habari Consulting</span>
										</div>
										<div class="pull-right">
											<a href="<?php echo site_url();?>/auth/new_dep" class="btn icn-only green">Add a new Department <i class="m-icon-swapright m-icon-white"></i></a> 									
										</div>
									</div>
									<!--end add-portfolio-->
									 <?php 
									
									 foreach ($department_fetch->result() as $row) { ?>
									<div class="row-fluid portfolio-block">
										
										<div class="span5 portfolio-text">
											<img src="<?php echo base_url();?>assets/img/logo.png" alt="" width="80px"/>
											<?php
              									$string = $row->description; 
              									$string = character_limiter($string, 70);
             								 ?>
											<div class="portfolio-text-info">
												<a href="<?php echo site_url();?>/auth/view_dep/<?php echo $row->dep_id; ?>"><h4><?php echo $row->dep_name; ?></h4></a>
												<p><?php echo $string ;?></p>
											</div>
										</div>
										
										<div class="span5" style="overflow:hidden;">
											<div class="portfolio-info">
												Staff
												<span><?php echo $row->num; ?></span>
											</div>
											<!--<div class="portfolio-info">
												Hours in past week
												<span>1789</span>
											</div>-->
											<div class="portfolio-info">
												Rate
												<span>KES:<?php echo $row->rate; ?></span>
											</div>
										</div>
										<div class="span2 portfolio-btn">
											<?php if($row->is_active==0){?>
											<a href="<?php echo site_url();?>/auth/inactivate_dep/<?php echo $row->dep_id; ?>" class="btn bigicn-only"><span>Activate</span></a>
											<?php } else{?>
											<a href="<?php echo site_url();?>/auth/activate_dep/<?php echo $row->dep_id; ?>" class="btn bigicn-only"><span>Inactivate</span></a>
											<?php }?>								
										</div>
									</div>
									<?php ;}
										  ?>
									<!--end row-fluid-->
									
						<!--END TABS-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
