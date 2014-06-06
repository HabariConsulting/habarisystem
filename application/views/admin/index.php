<?php
	//echo '<p>Welcome To The Admin Page '.$username.'! All posts available for edit or deletion is listed below.</p><br/>';
	
	?> <h3><?php echo anchor('Blog/create','Create New Post'); ?> </h3> <?php

?>

<table class="table table-striped table-bordered table-advance table-hover">
	<thead>
		<tr>
			<th><i class="icon-briefcase"></i> Title</th>
			<th class="hidden-phone" width="35%"><i class="icon-question-sign"></i> Action</th>		
			<th width="15%">Published ?</th>
		</tr>
	</thead>
	<tbody>	


	<?php	
	foreach($post as $product)
	{?>
	
		<tr>
			<td>
				<?php echo $product->title; ?>
			</td>
			<td>
				<?php 
					$Css_class = array('class' => 'btn mini blue-stripe');
					 echo anchor('Blog/edit/'.$product->id, 'Edit', $Css_class);								
				?>

				<?php 
					$Css_class = array('class' => 'btn mini green-stripe');
					 echo anchor('Blog/publish_post/'.$product->id, 'Publish', $Css_class);								
				?>		
				
				<?php 
					$Css_class = array('class' => 'btn mini red-stripe');
					 echo anchor('Blog/unpublish_post/'.$product->id, 'Unpublish', $Css_class);								
				?>
				
			</td>	
			<td>
			
			
			<?php
			if ($product->published == '1'):
				echo "Yes";
			elseif ($product->published == '0'):
				echo "no";
			else:
				echo " This is wierd";
			endif;
			?>
				<?php
					//$product->published == '1' ? echo "Yes' : echo "No";				
					// echo $product->published; 				
				?>				
			</td>
			
		</tr>
	<?php } ?>	
	
	
	</tbody>
</table>