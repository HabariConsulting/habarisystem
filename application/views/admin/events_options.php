
<h3><?php echo anchor('Blog/create_event','Add Event'); ?> </h3>

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
if(isset($records)) : foreach($records as $row) : ?>
		<tr>
			<td>
				<?php echo $row->title; ?>
			</td>
			<td>
				<?php 
					$Css_class = array('class' => 'btn mini blue-stripe');
					 echo anchor('Blog/edit_event/'.$row->id, 'Edit', $Css_class);								
				?>

				<?php 
					$Css_class = array('class' => 'btn mini green-stripe');

					if ($row->published == '1'):
						echo anchor('Blog/unpublish_event/'.$row->id, 'Unpublish', $Css_class);
					elseif ($row->published == '0'):
						echo anchor('Blog/publish_event/'.$row->id, 'Publish', $Css_class);
					else:
						echo anchor('Blog/publish_event/'.$row->id, 'Publish', $Css_class);
					endif;
					
				?>		
				
				<?php 
					//$Css_class = array('class' => 'btn mini red-stripe');
					// echo anchor('Blog/unpublish_post/'.$row->id, 'Unpublish', $Css_class);								
				?>
				
			</td>	
			<td>
			
				<?php
					if ($row->published == '1'):
						echo "Yes";
					elseif ($row->published == '0'):
						echo "no";
					else:
						echo "no";
					endif;
				?>			
			
			</td>
		</tr>
		<?php
		
endforeach;	
else :
 echo "Zero records Returned";
endif;

?>


</tbody>
</table>