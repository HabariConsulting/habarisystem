<div class="row-fluid invoice">
					<div class="row-fluid invoice-logo">
						<div class="span6 invoice-logo-space"><img src="<?php echo base_url();?>assets/img/logo.png" alt="" /> </div>
						<div class="span6">
							<p>#<?php echo $jobsum_report['job_number'];?> | <?php $datestring = "%d/ %m/ %Y";
											$time = time();
											echo mdate($datestring, $time);?> 
								<span class="muted">Consectetuer adipiscing elit</span></p>
						</div>
					</div>
					<hr />
					<div class="row-fluid">
						<div class="span4">
							<h4>Client:</h4>
							<ul class="unstyled">
								<li><b><?php echo $jobsum_report['name'];?></b></li>
								<li>Contact Person : <?php echo $jobsum_report['contact_person'];?></li>
								<li>Phone Number : <?php echo $jobsum_report['phone_number'];?></li>
								<li>Email : <?php echo $jobsum_report['company_email'];?></li>
								<li>Address : <?php echo $jobsum_report['company_address'];?></li>
							</ul>
						</div>
						<div class="span4">
							<h4>About:</h4>
							<ul class="unstyled">
								<li><?php echo $jobsum_report['description'];?></li>								
							</ul>
						</div>
						<div class="span4 invoice-payment">
							<h4>Payment Details:</h4>
							<ul class="unstyled">
								<li><strong>V.A.T Reg #:</strong> 542554(DEMO)78</li>
								<li><strong>Account Name:</strong> Habari Consulting Ltd</li>
								<li><strong>SWIFT code:</strong> 45454DEMO545DEMO</li>
								<li><strong>Address :</strong> No. 23, Gatundu Road </li>
								<li><strong>Phone Number :</strong> +254 [0] 717 655 447</li>
								<li><strong>email :</strong> accounts@habariconsulting.com</li>
							</ul>
						</div>
					</div>
					<div class="row-fluid">

						<table class="table table-striped table-hover" id="sum">
							<thead>
								<tr>
									<th>#</th>
									<th>Task Title</th>
									<th class="hidden-480">Description</th>
									<th class="hidden-480">Total Hours</th>
									<th class="hidden-480">Unit Cost</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $num=1;
									
									 foreach ($tasksum_report->result() as $row) { ?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $row->title; ?></td>
									<?php
              									$string = $row->brief; 
              									$string = character_limiter($string, 50);
             								 ?>
									<td class="hidden-480"><?php echo $string; ?></td>
									<td class="hidden-480"><?php echo $row->hours; ?></td>
									<td class="hidden-480"><?php echo $row->rate; ?></td>
									<?php
										$total = $row->rate * $row->hours;										
									?>
									<td>KES : <?php echo $total; ?></td>
								</tr>
								<?php //echo array_sum($row->hours);?>
								<?php $num++;}?>

								
							</tbody>
						</table>
					</div>
					<div class="row-fluid">
						<div class="span4">
							<div class="well">
								<address>
									<h3>Amount Quoted:</h3><br />
									<h4><b>KES :</b> <?php echo $jobsum_report['quote'];?></h4>
								</address>
								<address>
									<strong>Analysis</strong><br />
									<div class="circle-stat block">
											<div class="visual">
												<input class="knobify" data-width="100" data-fgcolor="#A4CD39" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="
												<?php 									
									 $sum = 0;
									 foreach ($tasksum_report->result() as $row) {
									$total = $row->rate * $row->hours;
									$array  = array_map('intval', str_split($row->rate * $row->hours));
									$sum += intval($total);
									//var_dump($total);

									
									//echo array_sum($a);
								}
								//echo $sum;
								?> 
											<?php
												$chart = $sum / $jobsum_report['quote'] * 100;
												echo $chart;
											 ?>
												" data-max="100" data-min="0" />
											</div>
											<div class="details">
												<div class="title">Profit <i class="icon-caret-up"></i></div>
												<div class="number"><?php
												$profit = $jobsum_report['quote'] - $sum;
												echo $profit;
											 ?></div>
												<span class="label label-success"><i class="icon-comment"></i> </span>
												<span class="label label-inverse"><i class="icon-globe"></i> </span>
											</div>
										</div>
								</address>
							</div>
						</div>
						
												
												
						<div class="span8 invoice-block">
							<ul class="unstyled">
								<li><strong>Sub - Total amount:</strong> -----</li>
								<li><strong>Discount:</strong> -----</li>
								<li><strong>VAT:</strong> -----</li>
								
								<li><strong>Grand Total (KES) : </strong><?php echo $sum;?></li>
								 
							</ul>
							<br />
							<a class="btn green big">Submit Your Invoice <i class="m-icon-big-swapright m-icon-white"></i></a>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->

				
				