<?php

//menu options
function gi_menu_tutorial() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	?>

	<!-- OUTPUT START -->

	<div class="wrap">
		
		<div class="gallery-image-title">
			<h2>Tutorial</h2>
		</div>		
		
		<ol>
		<li>Go to the <b>Option</b> page and set the gallery width and the vertical margin.</li>
		<li>Go to the <b>Add Gallery</b> page, set a name for the gallery and add images for the gallery ( to have a great result in a single gallery use images with the same width and height ) , click on the save button to complete the submission.</li>
		<li>Go to the <b>Manage Galleries</b> page and pick up the code under the <b>Embed Code</b> column.</li>
		<li>Go in a post or in a page and paste the <b>Embed Code</b> inside the HTML of your post or page.</li>
		<li>Check your post or page to see the result.</li>
		</ol>
		
		<div class="gi-menu-tutorial-example-image"></div>
		
		<!-- display credits -->
		<?php gi_danycode_credits('Gallery Image','http://www.danycode.com/gallery-image/'); ?>	
	
	</div>

	<?php
	
}

?>
