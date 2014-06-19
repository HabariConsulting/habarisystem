<div class="row-fluid invoice">
					<div class="row-fluid invoice-logo">
						<div class="span6 invoice-logo-space"><img src="<?php echo base_url();?>assets/img/logo.png" alt="" /> </div>
						<div class="span6">
							<p> <?php $datestring = "%d/ %m/ %Y";
											$time = time();
											echo mdate($datestring, $time);?> 
								<span class="muted">Consectetuer adipiscing elit</span></p>
						</div>
					</div>
					<hr />
					<div class="row-fluid">
						<div class="span4">
							<h4>Employee:</h4>
							<ul class="unstyled">
								<li><b><?php echo $userjobsum_report['first_name'];?> <?php echo $userjobsum_report['last_name'];?></b></li>
								<li>Phone Number : <?php echo $userjobsum_report['phone_number'];?></li>
								<li>Email : <?php echo $userjobsum_report['email'];?></li>
								<li>Address : <?php echo $userjobsum_report['company_address'];?></li>
							</ul>
						</div>
						<div class="span4">
							<h4></h4>
							<ul class="unstyled">
								<li></li>								
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
									<th class="hidden-480">Job</th>
									<th class="hidden-480">Total Hours</th>
									<th class="hidden-480">Unit Cost</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $num=1;
									
									 foreach ($usertasksum_report->result() as $row) { ?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $row->title; ?></td>
									<?php
              									$string = $row->brief; 
              									$string = character_limiter($string, 50);
             								 ?>
									<td class="hidden-480"><?php echo $row->client_code; ?>-<?php echo $row->job_type; ?>-<?php echo $row->job_id; ?></td>
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
					<?php 									
									 $sum = 0;
									 foreach ($usertasksum_report->result() as $row) {
									$total = $row->rate * $row->hours;
									$array  = array_map('intval', str_split($row->rate * $row->hours));
									$sum += intval($total);
									//var_dump($total);

									
									//echo array_sum($a);
								}
								//echo $sum;
								?> 
					
						
												
												
						<div class="span8 invoice-block">
							<ul class="unstyled">
								<li><strong>Sub - Total amount:</strong> -----</li>
								<li><strong>Discount:</strong> -----</li>
								<li><strong>VAT:</strong> -----</li>
								
								<li><strong>Grand Total (KES) : </strong><?php echo $sum;?></li>
								 
							</ul>
							<br />
							
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->

				
				