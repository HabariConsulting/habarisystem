<?php
	echo validation_errors();
?>
<div class="span12">
	<h4>Create A New Post Below</h4>
	<form action="create_event" method="post" >
	
		<label>Title:</label>
		<input type="text" name="title" size="50" class="m-wrap span8"/><br/>	
		
		<label>Event Description:</label>
		<textarea name="description" rows="8" cols="50" class="m-wrap span8"></textarea><br/>
		
		<label>Event Date:</label>
		<input type="date" name="start_date" value="2014-01-01"><br>		
		
		<label>Event Date:</label>
		<input type="date" name="end_date" value="2014-01-31"><br>
		<div class="submit-btn">
		<input type="submit" value="Save" class="btn green"  />
		
		<?php 
			$Css_class = array('class' => 'btn');			
			echo anchor('Blog/index','Cancel',$Css_class); 
		?>
		</div>
	</form>

</div>
