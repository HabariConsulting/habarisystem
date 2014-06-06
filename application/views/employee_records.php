<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Habari Employees</h4>
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
											<th>Full Name</th>
											<th class="hidden-480">Email</th>
											<th class="hidden-480">Phone Number</th>
											<th class="hidden-480">Department</th>
											<th ></th>
										</tr>
									</thead>
									<tbody>
										<?php $num=1;
									
									 foreach ($employeerec_fetch->result() as $row) { ?>
										<tr class="odd gradeX">
											<td><?php echo $num;?></td>
											<td><a href="<?php echo site_url();?>/auth/edit_employeerec/<?php echo $row->id; ?>"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></a></td>
											<td class="hidden-480"><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
											<td class="hidden-480"><?php echo $row->phone; ?></td>
											<td class="center hidden-480"><?php echo $row->dep_name; ?></td>
											<td ><a href="<?php echo base_url();?>index.php/auth/delete_employeerec/<?php echo $row->id; ?>" class="btn mini red-stripe">Archive</a></td>
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