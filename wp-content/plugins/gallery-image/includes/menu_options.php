<?php

//menu options
function gi_menu_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	//process data
	if(isset($_POST['vertical-margin']) and isset($_POST['images-width'])){
		if(is_numeric($_POST['vertical-margin'])){update_option('gallery_image_vertical_margin',$_POST['vertical-margin']);}
		if(is_numeric($_POST['images-width'])){update_option('gallery_image_images_width',$_POST['images-width']);}
		if(isset($_POST['authorlink'])){update_option('gallery_image_author_link',"1");}else{update_option('gallery_image_author_link',"0");}
	}
	
	?>

	<!-- OUTPUT START -->

	<div class="wrap">
		
		<div class="gallery-image-title">
			<h2>Options</h2>
		</div>		
		
		<form action="" method="post" id="gi-options-form" >
			
			<label for="gi-images-width">Images width</label>
			<input name="images-width" type="text" value="<?php echo get_option('gallery_image_images_width'); ?>" id="gi-images-width" >
			
			<label for="gi-vertical-margin">Vertical Margin</label>
			<input name="vertical-margin" type="text" value="<?php echo get_option('gallery_image_vertical_margin'); ?>" id="gi-vertical-margin" >
			
			<label>Official Page link - This is a little optional kindnees to the plugin author</label>
			<input name="authorlink" type="checkbox" value="true" <?php if(get_option('gallery_image_author_link')=="1"){echo 'checked="checked"';} ?> /><span>Show a little link to the plugin Official Page</span>
			
			<input type="Submit" value="Save" class="button-primary" >
		</form>
	
		<!-- display credits -->
		<?php gi_danycode_credits('Gallery Image','http://www.danycode.com/gallery-image/'); ?>	
	
	</div>

	<?php
	
}

?>
