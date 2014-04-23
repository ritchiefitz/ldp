<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Video Library Settings</h2>

	<form method="post" action="options.php">
		<?php 
			settings_fields('bc_video_library_settings');
			do_settings_fields('bc_video_library_settings');
			submit_button(); 
		?>
	</form>
</div>