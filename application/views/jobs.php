<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Current Jobs</h4>
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
											<th>Job Number</th>
											<th class="hidden-480">Client</th>
											<th class="hidden-480">Timeline</th>
											<th class="hidden-480">Quote</th>
											<th ></th>
										</tr>
									</thead>
									<tbody>
										<?php $num=1;
									
									 foreach ($job_fetch->result() as $row) { ?>
										<tr class="odd gradeX">
											<td><?php echo $num;?></td>
											<td><a href="<?php echo site_url();?>/auth/view_job/<?php echo $row->job_id; ?>"><?php echo $row->client_code; ?>-<?php echo $row->job_type; ?>-<?php echo $row->job_id; ?></a></td>
											<td class="hidden-480"><a href="<?php echo site_url();?>/auth/view_client/<?php echo $row->client_id; ?>"><?php echo $row->name; ?></a></td>
											<td class="hidden-480"><?php echo $row->timeline; ?></td>
											<td class="center hidden-480"><?php echo $row->quote; ?></td>
											<td ><a href="<?php echo base_url();?>index.php/auth/delete_job/<?php echo $row->job_id; ?>" class="btn mini red-stripe">Archive</a></td>
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