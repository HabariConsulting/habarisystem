<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="pull-right">
											<a href="<?php echo site_url();?>/auth/create_task" class="btn icn-only green">Add Task <i class="m-icon-swapright m-icon-white"></i></a> 									
										</div><br/><br/>
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Tasks</h4>
								<div class="tools">
									
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="clearfix">
									
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#">Print</a></li>
											<li><a href="#">Save as PDF</a></li>
											<li><a href="#">Export to Excel</a></li>
										</ul>
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"></th>
											<th>Title</th>
											<th class="hidden-480">Job</th>
											<th class="hidden-480">Deadline</th>
											<th class="hidden-480">Assigned To</th>
											<th class="hidden-480">Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $num=1;
									
									 foreach ($task_fetch->result() as $row) { ?>
										<tr class="odd gradeX">
											<td><?php echo $num;?></td>
											<td><a href="<?php echo site_url();?>/auth/view_task/<?php echo $row->task_id; ?>"><?php echo $row->title; ?></a></td>
											<td class="hidden-480"><?php echo $row->client_code; ?>-<?php echo $row->job_type; ?>-<?php echo $row->job_id; ?></a></td>
											<td class="hidden-480"><?php echo $row->deadline; ?></td>
											<td class="hidden-480"><?php echo $row->dep_name; ?></td>
											<td class="center hidden-480"><?php if($row->is_active==1){?>
												<a href="<?php echo site_url();?>/auth/inactivate_task/<?php echo $row->task_id; ?>"><span class="label label-success">In Progress</span></a><?php }?>
												<?php if($row->is_active==2){?>
												<a href="#"><span class="label label-inverse">Complete</span></a><?php }?>
												<?php if($row->is_active==0){?>
												
												<a href="<?php echo site_url();?>/auth/activate_task/<?php echo $row->task_id; ?>"><span class="label label-warning">Pending Approval</span></a><?php }?>
											</td>
											<td ><a href="<?php echo base_url();?>index.php/auth/delete_task/<?php echo $row->task_id; ?>" class="btn mini red-stripe">Archive</a></td>
										</tr>
										<?php $num++;}
										  ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>