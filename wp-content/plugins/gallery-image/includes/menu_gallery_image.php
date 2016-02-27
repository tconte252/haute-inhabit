<?php

//menu data page
function gallery_image_menu() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	//process delete
	if(isset($_POST['delete'])){
		gi_delete_gallery($_POST['delete']);
		$messages[]='<div class="updated"><p>Gallery deleted</p></div>';
	}
	
	?>
	
	<!-- start output -->
	
	<div class="wrap">		
		
		<div class="gallery-image-title">
			<h2>Manage Galleries</h2>
		</div>
		
		<!-- display update/error messages -->
		<?php //if(!empty($messages)){foreach($messages as $message){echo $message;}}	?>	
		
		<!-- show the pagination -->
		<?php gi_show_pagination(); ?>
		
		<!-- show the galleries -->
		<?php gi_show_table_gallery(); ?>
		
		<!-- display credits -->
		<?php gi_danycode_credits('Gallery Image','http://www.danycode.com/gallery-image/'); ?>	
	
	</div>
	
	<?php
	

	
}

//show the galleries
function gi_show_table_gallery(){
	
	//show table header
	echo '<div class="gi-menu-gallery-image-header">';
	echo '<div class="gi-menu-gallery-image-name-header">Name</div>';
	echo '<div class="gi-menu-gallery-image-shortcode-header">Embed Code</div>';
	echo '<div class="gi-menu-gallery-image-galleries-header">Images</div>';
	echo '<div class="gi-menu-gallery-image-delete-header">Delete</div>';
	echo '</div>';
	
	global $wpdb;
	$table_name=$wpdb->prefix."gallery_image_table";
	$results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
	
	//get current page
	if(isset($_POST['pagination'])){
		$current_page=$_POST['pagination'];
	}else{
		$current_page=1;
	}	
	
	foreach($results as $key => $result){	
		
		if( $key>=(($current_page*10)-10) and  $key<(($current_page*10)) ){
		
			echo '<div class="gi-menu-gallery-image-container clearfix">';
			echo '<p class="gi-menu-gallery-image-name">'.$result['name'].'</p>';
			echo '<p class="gi-menu-gallery-image-shortcode">[galleryimage id=\''.$result['id'].'\']</p>';
			
			if (strlen($result['image_url_1'])>0){echo '<img title="'.$result['image_url_1'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_1'].'">';}
			if (strlen($result['image_url_2'])>0){echo '<img title="'.$result['image_url_2'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_2'].'">';}
			if (strlen($result['image_url_3'])>0){echo '<img title="'.$result['image_url_3'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_3'].'">';}
			if (strlen($result['image_url_4'])>0){echo '<img title="'.$result['image_url_4'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_4'].'">';}
			if (strlen($result['image_url_5'])>0){echo '<img title="'.$result['image_url_5'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_5'].'">';}
			if (strlen($result['image_url_6'])>0){echo '<img title="'.$result['image_url_6'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_6'].'">';}
			if (strlen($result['image_url_7'])>0){echo '<img title="'.$result['image_url_7'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_7'].'">';}
			if (strlen($result['image_url_8'])>0){echo '<img title="'.$result['image_url_8'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_8'].'">';}
			if (strlen($result['image_url_9'])>0){echo '<img title="'.$result['image_url_9'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_9'].'">';}
			if (strlen($result['image_url_10'])>0){echo '<img title="'.$result['image_url_10'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_10'].'">';}
			if (strlen($result['image_url_11'])>0){echo '<img title="'.$result['image_url_11'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_11'].'">';}
			if (strlen($result['image_url_12'])>0){echo '<img title="'.$result['image_url_12'].'" class="gi-menu-gallery-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_12'].'">';}
							
			echo '<form action="" method="post" class="gi-menu-gallery-image-delete" >';
			echo '<input type="hidden" name="delete" value="'.$result['id'].'">';
			echo '<input type="submit" value="">';
			echo '</form>';
							
			echo '</div>';
			
		}
			
	}	

}

function gi_delete_gallery($id){

	global $wpdb;
	$table_name=$wpdb->prefix."gallery_image_table";
	$sql = "DELETE FROM $table_name WHERE id='$id'";
	//require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$wpdb->query($sql);
	
}

function gi_show_pagination(){

	//get current page
	if(isset($_POST['pagination'])){
		$current_page=$_POST['pagination'];
	}else{
		$current_page=1;
	}

	echo '<div class="gi-menu-gallery-image-pagination-container">';

		//previous
		if($current_page>1){
			echo '<form action="" method="post" class="gi-menu-gallery-image-pagination" >';
			echo '<input type="hidden" name="pagination" value="'.($current_page-1).'">';
			echo '<input type="submit" value="Previous">';
			echo '</form>';
		}
		
		//next
		if( ($current_page*10) < gi_count_galleries() ){  
			echo '<form action="" method="post" class="gi-menu-gallery-image-pagination" >';
			echo '<input type="hidden" name="pagination" value="'.($current_page+1).'">';
			echo '<input type="submit" value="Next">';
			echo '</form>';
		}
	
	echo '</div>';
	
}

//return the number of galleries
function gi_count_galleries(){

	global $wpdb;
	$table_name=$wpdb->prefix."gallery_image_table";
	$results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
	return count($results);
	
}

?>
