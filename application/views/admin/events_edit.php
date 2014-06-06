<?php
	echo validation_errors();
?>
<div class="span8">
	<h4>Edit Event</h4>
	<form action="" method="post" >
	
		<label>Title:</label>
		<input type="text" name="title" size="100" class="m-wrap span8" value="<?php echo $event['title']; ?>"/><br/>	

		<label>Post Content:</label>
		<textarea name="description" rows="10" cols="100" class="m-wrap span8"><?php echo $event['description']; ?>
		</textarea><br/>	

	
		<label>Start Date:</label>
		<input type="date" name="start_date" value="<?php echo $event['start_date']; ?>"  /><br>
		
		<label>End Date:</label>		
		<input type="date" name="end_date"  value="<?php echo $event['end_date']; ?>" /><br>	
		
		<div class="submit-btn">
		<input type="submit" value="Save" class="btn green" />
		<?php 
				$Css_class = array('class' => 'btn');
				echo anchor('Blog/index','Cancel',$Css_class);
		?>
		</div>
	</form>

</div>
