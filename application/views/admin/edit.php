<?php
	echo validation_errors();
?>

<div class="span8">

	<h3>Edit "<?php echo $post['title']; ?>" Below</h3>
	<form action="" method="post" >
		<label class="control-label">Title:</label>
		<input type="text" name="title" size="100" class="m-wrap span8" value="<?php echo $post['title']; ?>"/> <br/>	
		
		<label class="control-label">Post Content:</label>
		<textarea name="content" rows="10" cols="100" class="m-wrap span8"><?php echo $post['content']; ?>
		</textarea><br/>
		<div class="submit-btn">
			<input type="submit" value="Save" class="btn green" />
			<?php 
				$Css_class = array('class' => 'btn');
				echo anchor('Blog/index','Cancel',$Css_class);
			?>
		</div>
	</form>
</div>
