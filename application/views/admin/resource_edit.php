<?php
	echo validation_errors();
?>
<div class="span12">
	<h4>Edit Resource</h4>
	<form action="" method="post" >
	
		<label class="control-label">Title:</label>
		<input type="text" name="title" size="100" class="m-wrap span8"  value="<?php echo $resourc['title']; ?>"/><br/>	

		<label class="control-label">Resource Description:</label>
		<textarea name="description" rows="10" cols="100" class="m-wrap span8" ><?php echo $resourc['description']; ?>
		</textarea><br/>	

	
		<label class="control-label">Resource URL (Source):</label>
		<input type="text" name="url" class="m-wrap span8" value="<?php echo $resourc['url']; ?>" /><br>
				
		<label  class="control-label">Upload:</label>
		<input type="file" name="resource_file"  value="<?php echo $resourc['resource_file']; ?>" class="m-wrap span8"><br>
				
		<input type="submit" value="Save" class="btn green" />
		<?php 
			$Css_class = array('class' => 'btn');
			echo anchor('resources/index','Cancel',$Css_class);
		?>
	</form>

</div>
