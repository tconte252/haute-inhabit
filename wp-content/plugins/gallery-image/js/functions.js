jQuery(document).ready(function () {
	
	//assign clicked thumb image to the main gallery image
	jQuery(".gi-front-image-thumb").click(function() {
	  
	  //get src attribute from the thumb image
	  thumbSrc=jQuery(this).attr("src");
	  
	  //get the id of the gallery from thumb container
	  galleryId=parseInt(jQuery(this).parent().attr("id"),10);	  
	  
	  //remove the selected class from all the image thumbs in this gallery
	  jQuery(".gi-front-image-thumb-"+galleryId).removeClass("selected");
	  
	  //add the selected class to the selected thumb
	  jQuery(this).addClass("selected");
	  
	  //set the new src attribute for the main gallery image
	  jQuery('#gi-front-image-'+galleryId).attr('src', thumbSrc);
	  
	});
	
});
