<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php   //echo count($errors);
		foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
