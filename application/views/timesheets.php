<div class="row-fluid">
	
					<div class="span6 responsive" data-tablet="span12 fix-offset" data-desktop="span6">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box grey">
							<div class="portlet-title">
								<h4><i class="icon-user"></i>Jobs</h4>
								<div class="actions">
									
									<div class="btn-group">										
										<a href="#" class="btn blue"><i class="icon-print"></i> Print</a>
									</div>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
										<tr>
											<th style="width:8px;"></th>
											<th>Job</th>
											<th class="hidden-480">Hours</th>
											<th class="hidden-480"></th>
										</tr>
									</thead>
									<tbody>
										<?php $num=1;
									
									 foreach ($jobsum_fetch->result() as $row) { ?>
										<tr class="odd gradeX">
											<td><?php echo $num;?></td>
											<td><?php echo $row->client_code; ?>-<?php echo $row->job_type; ?>-<?php echo $row->job_id; ?></td>
											<td class="hidden-480"><?php echo $row->hours;?></td>
											<td><a href="<?php echo site_url();?>/quote/report/<?php echo $row->job_id; ?>"><span class="label label-success">Get Report</span></a></td>
										</tr><?php $num++;}?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
					<div class="span6 responsive" data-tablet="span12 fix-offset" data-desktop="span6">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box purple">
							<div class="portlet-title">
								<h4><i class="icon-cogs"></i>All Entries</h4>
								<div class="actions">
									
									<a href="#" class="btn green"><i class="icon-print"></i> Print</a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="sample_3">
									<thead>
										<tr>
											<th style="width:8px;"></th>
											<th>Employee</th>
											<th class="hidden-480">Task</th>
											<th class="hidden-480">Hours</th>
											<th class="hidden-480">Dated</th>
										</tr>
									</thead>
									<tbody>
										<?php $num=1;
									
									 foreach ($sheet_fetch->result() as $row) { ?>
										<tr class="odd gradeX">
											<td><?php echo $num;?></td>
											<td><?php echo $row->first_name; ?></td>
											<td class="hidden-480"><?php echo $row->title; ?></td>
											<td><?php echo $row->hours; ?></td>
											<td class="hidden-480"><?php echo $row->dated; ?></td>
										</tr><?php $num++;}
										  ?>
										
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>