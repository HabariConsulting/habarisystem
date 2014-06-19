<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Managed Clients</h4>
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
											<th>Name</th>
											<th class="hidden-480">Client Code</th>
											<th class="hidden-480">Email</th>
											<th class="hidden-480">Phone Number</th>											
											<th ></th>
										</tr>
									</thead>
									<tbody>
										<?php $num=1;
									
									 foreach ($client_fetch->result() as $row) { ?>
										<tr class="odd gradeX">
											<td><?php echo $num;?></td>
											<td><a href="<?php echo site_url();?>/auth/view_client/<?php echo $row->client_id; ?>"><?php echo $row->name; ?></a></td>
											<td class="hidden-480"><?php echo $row->client_code; ?></td>
											<td class="hidden-480"><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
											<td class="hidden-480"><?php echo $row->p_number; ?></td>
											<td ><a href="<?php echo base_url();?>index.php/auth/delete_client/<?php echo $row->client_id; ?>" class="btn mini red-stripe">Archive</a></td>
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