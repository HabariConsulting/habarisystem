<?php
	echo validation_errors();
?>

<div class="span8">
	<h4>Add a Resource</h4>
		<?php echo form_open_multipart('resources/create');   ?>

		<label  class="control-label">Title:</label>
		<input type="text" name="title" size="50" class="m-wrap span8"/><br/>	
		
		<label  class="control-label">Resource Description:</label>
		<textarea name="description" rows="8" cols="50" class="m-wrap span8"></textarea><br/>
		
		<label class="control-label">Source:</label>
		<input type="text" name="url" class="m-wrap span8"><br><br>		
		
		<label  class="control-label">Upload:</label>
		<input type="file" name="resource_file" class="m-wrap span8"><br>
		
		<br>
		<input type="hidden" name="published" value="0" >
		
		<div class="submit-btn">
			<input type="submit" name="upload" value="Save" class="btn green" />
			<?php 
				$Css_class = array('class' => 'btn');
				echo anchor('resources/index','Cancel',$Css_class);
			?>
		</div>

</div>
