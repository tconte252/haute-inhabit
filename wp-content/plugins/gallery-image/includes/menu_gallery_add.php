<?php

//menu data page
function gallery_image_add() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	?>
	
	<?php

	//process image upload
	if(isset($_FILES['file'])){	
		if ((($_FILES["file"]["type"] == "image/png") or ($_FILES["file"]["type"] == "image/jpeg") or ($_FILES["file"]["type"] == "image/gif")) and ($_FILES["file"]["size"] < 2000000)){
			if ($_FILES["file"]["error"] > 0){
				$messages[]='<div class="error"><p>Return Code: '.$_FILES["file"]["error"].'</p></div>';
			}
			else{  
			  $unique_file_name=uniqid()."-".$_FILES["file"]["name"];
			  move_uploaded_file($_FILES["file"]["tmp_name"],WP_PLUGIN_DIR."/gallery-image/upload/" . $unique_file_name);
			  gi_save_gallery_temp($unique_file_name);
			}
		}else{
			$messages[]='<div class="error"><p>'.$counter.'Invalid file</p></div>';
		}
	}
	
	//process save gallery
	if(isset($_POST['name1'])){
		gi_save_gallery();
		gi_delete_temp_gallery();
		//echo '<div class="updated"><p>Gallery Saved</p></div>';
		//return;
	}
	
	?>

	<!-- OUTPUT START -->

	<div class="wrap">
		
	<div class="gallery-image-title">
		<h2>Add Gallery</h2>
	</div>		
	
	<!-- display update/error messages -->
	<?php if(!empty($messages)){foreach($messages as $message){echo $message;}}	?>
		
		<?php if(!isset($_POST['gallery-name'])): ?>
		
			<!-- set gallery name -->
			<form action="" method="post">
			<label for="gallery-name">Set the gallery name</label>
			<input type="text" value="" name="gallery-name" id="gallery-name" maxlength="255">
			<input type="submit" value="Proceed">
			</form>
			
			<?php gi_delete_temp_gallery(); ?>
		
		<?php else: ?>
			
			<?php if(gi_count_temp_gallery()<12): ?>
			
				<p>Gallery name: <b><?php echo $_POST['gallery-name']; ?></b></p>
				<!-- import form -->
				<div class="icon-title"><h2>Import images</h2></div>
				<p>Add images to the gallery ( <?php echo gi_count_temp_gallery(); ?> of 12 )</p>
				<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="gallery-name" value="<?php echo $_POST['gallery-name']; ?>">
				<input type="file" name="file" id="file" >
				<input class="button-primary" type="submit" name="submit" value="Import Image" >
				</form>
			
			<?php endif; ?>
			
			<?php gi_show_temp_gallery(); ?>
		
		<?php endif; ?>
	
		<!-- display credits -->
		<?php gi_danycode_credits('Gallery Image','http://www.danycode.com/gallery-image/'); ?>	
	
	</div>

	<?php
	
}

//save the uploaded image to the temporary gallery
function gi_save_gallery_temp($image_name){
		
		global $wpdb;
		$table_name=$wpdb->prefix."gallery_image_temp_table";
		$sql = "INSERT INTO $table_name SET image_url='$image_name'";
		//require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$wpdb->query($sql);
		
}

//show the temporary gallery images
function gi_show_temp_gallery(){
	
	global $wpdb;
	$table_name=$wpdb->prefix."gallery_image_temp_table";
	$results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
	echo '<div class="gi-menu-image-preview-container clearfix">';
	echo '<form action="" method="post">';
	foreach($results as $key => $result){
		echo '<div class="gi-menu-image-add-row clearfix">';
			echo '<img class="gi-menu-image-preview" title="'.$result['image_url'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url'].'">';
			echo '<input name="name'.($key+1).'" type="hidden" value="'.$result['image_url'].'" >';
			echo '<input name="alt'.($key+1).'" class="gi-add-image-alt" type="text" value="'.$result['image_url'].'">';
		echo '</div>';
	}
	echo '<input name="gallery-name-save" type="hidden" value="'.$_POST['gallery-name'].'">'; 
	if(count($results)>0){
		echo '<p>Before saving the gallery edit every image <b>alt attribute</b>, this is useful for Search Engine Optimization and for users that browse your website without images.</p>';
		echo '<input type="submit" value="Save Gallery" class="button-primary">';
	}
	echo '</form>';
	echo '</div>';	

}

//count the number of items in the temporary gallery
function gi_count_temp_gallery(){

	global $wpdb;
	$table_name=$wpdb->prefix."gallery_image_temp_table";
	$results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
	return count($results);

}

//delete the temporary gallery images
function gi_delete_temp_gallery(){
	
	global $wpdb;
	$table_name=$wpdb->prefix."gallery_image_temp_table";
	$sql = "DELETE FROM $table_name WHERE 0=0";
	//require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$wpdb->query($sql);

}

function gi_save_gallery(){

	global $wpdb;
	
	$image_url_1=$_POST['name1'];
	$image_url_2=$_POST['name2'];
	$image_url_3=$_POST['name3'];
	$image_url_4=$_POST['name4'];
	$image_url_5=$_POST['name5'];
	$image_url_6=$_POST['name6'];
	$image_url_7=$_POST['name7'];
	$image_url_8=$_POST['name8'];
	$image_url_9=$_POST['name9'];
	$image_url_10=$_POST['name10'];
	$image_url_11=$_POST['name11'];
	$image_url_12=$_POST['name12'];
	
	$image_alt_1=$_POST['alt1'];
	$image_alt_2=$_POST['alt2'];
	$image_alt_3=$_POST['alt3'];
	$image_alt_4=$_POST['alt4'];
	$image_alt_5=$_POST['alt5'];
	$image_alt_6=$_POST['alt6'];
	$image_alt_7=$_POST['alt7'];
	$image_alt_8=$_POST['alt8'];
	$image_alt_9=$_POST['alt9'];
	$image_alt_10=$_POST['alt10'];
	$image_alt_11=$_POST['alt11'];
	$image_alt_12=$_POST['alt12'];	
	
	$gallery_name=$_POST['gallery-name-save'];
	
	//save the temporary database in the gallery database
	$table_name=$wpdb->prefix."gallery_image_table";
	$sql = "INSERT INTO $table_name SET name='$gallery_name',image_url_1='$image_url_1',image_url_2='$image_url_2',image_url_3='$image_url_3',image_url_4='$image_url_4',image_url_5='$image_url_5',image_url_6='$image_url_6',image_url_7='$image_url_7',image_url_8='$image_url_8',image_url_9='$image_url_9',image_url_10='$image_url_10',image_url_11='$image_url_11',image_url_12='$image_url_12',image_alt_1='$image_alt_1',image_alt_2='$image_alt_2',image_alt_3='$image_alt_3',image_alt_4='$image_alt_4',image_alt_5='$image_alt_5',image_alt_6='$image_alt_6',image_alt_7='$image_alt_7',image_alt_8='$image_alt_8',image_alt_9='$image_alt_9',image_alt_10='$image_alt_10',image_alt_11='$image_alt_11',image_alt_12='$image_alt_12'";
	//require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$wpdb->query($sql);
	
}



?>
