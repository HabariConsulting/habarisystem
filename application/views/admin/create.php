<?php
	echo validation_errors();
?>
<div class="span8">
	<h4>Create A New Post Below</h4>
	<form action="" method="post" >
		<label class="control-label">Title:</label>
		
		<input type="text" name="title" size="50" class="m-wrap span8"/><br/>	
		
		<label class="control-label">Post Content:</label>
		
		<textarea name="content" rows="6" cols="50" class="m-wrap span8"></textarea><br/>		
		<input type="hidden" name="published" value="0">
		<div class="submit-btn">
			<input type="submit" value="Save" class="btn green" />		
			<?php 
				$Css_class = array('class' => 'btn');
				echo anchor('Blog/index','Cancel',$Css_class);
			?>
		</div>
	</form>
	

</div>
