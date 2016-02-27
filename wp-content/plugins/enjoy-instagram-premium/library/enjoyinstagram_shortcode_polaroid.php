<?php
// Add Shortcode
function enjoyinstagram_polaroid_shortcode($atts) {
    ?>
<script type="text/javascript">
function ReloadEnjoyInstagramPolaroid(id,time_reload){
    var id = id;
    var time_reload = time_reload;
    
console.log('reload #photostack-'+id+' -> '+time_reload);
jQuery('#reload_enjoyinstagram_polaroid_'+id).load(document.URL + " #photostack-"+id,function() {
jQuery(".swipebox_polaroid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_polaroid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_polaroid_hidebarsdelay']; ?>
    });
        
 new Photostack( document.getElementById( 'photostack-'+id ), {
				callback : function( item ) {
					//console.log(item)
				}
			});  
                        
});


 

setTimeout("ReloadEnjoyInstagramPolaroid("+id+","+time_reload+")",time_reload);
}        
</script>

<?php STATIC $i = 1;
if($atts['enjoyinstagram_polaroid_autoreload']=='true'){
?>
<script type="text/javascript">
 ReloadEnjoyInstagramPolaroid(<?php echo $i; ?>,<?php echo $atts['enjoyinstagram_polaroid_autoreload_value']; ?>);
</script>
<?php
}

?>


<?php

    if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {
	extract( shortcode_atts( array(
            'type_polaroid' => 'user',
            'user_polaroid' => 'mediabetasrl',
            'hashtag_polaroid' => 'enjoyinstagram',
            
	), $atts ) );
        
        



global $wpdb;

$array_utenti = get_option('enjoy_instagram_options');
$array_hashtag_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND hashtag = '".$atts['enjoyinstagram_hashtag_popup_polaroid_moderate']."' ORDER BY id DESC");

$array_users_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '".$atts['enjoyinstagram_user_polaroid_moderate']."' ORDER BY id DESC");



$instagram = new Enjoy_Instagram(array(
  'apiKey'      => $array_utenti[$atts['user_polaroid']]['apiKey'],
  'apiSecret'   => $array_utenti[$atts['user_polaroid']]['apiSecret'] )
        );
$instagram->setAccessToken($array_utenti[$atts['user_polaroid']]['access_token']);

if($atts['type_polaroid']=='hashtag'){
if($atts['enjoyinstagram_polaroid_moderate']=='true'){

$result_accepted = array();
$result = $instagram->getTagMedia(urlencode($atts['enjoyinstagram_hashtag_popup_polaroid_moderate']));
foreach ($array_hashtag_accepted as $singolo_hashtag_accepted){
$image = $instagram -> getMedia($singolo_hashtag_accepted->image_id);
array_push($result_accepted,$image->data);
}
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$result = $result_accepted;
//echo 'result: '; print_r($result);
}
else{
   $result = read_table('hashtag','',$atts['enjoyinstagram_hashtag_popup_polaroid_moderate'],'true');
   $result = json_decode(json_encode($result),FALSE);
}

    
}
else{
    
$result = $instagram->getTagMedia(urlencode($atts['hashtag_polaroid']));
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$images_captured = get_option('enjoyinstagram_images_captured');
    $rr = array();
    if($images_captured <= 20){
    $result = $result->data;
}
else{
    $tmp = 0;
do{
    
    foreach($result->data as $test) if($tmp2++ < $images_captured){
array_push($rr,$test);        
    $tmp++;
    }

}while((($result->pagination->next_url) && $result = json_decode(file_get_contents($result->pagination->next_url))) && ($tmp < $images_captured));
    
$result = $rr;
}
}
else{
   $result = read_table('hashtag','',$atts['hashtag_polaroid'],'false');
   $result = json_decode(json_encode($result),FALSE);
}
}    
if(count($result)>0){
    foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'hashtag','',$atts['hashtag_polaroid'],$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}
}
else
if($atts['type_polaroid']=='user'){
if($atts['enjoyinstagram_polaroid_moderate']=='true'){
    
    
$result_accepted = array();
$result = $instagram->getUserMedia(urlencode($array_utenti[$atts['enjoyinstagram_user_polaroid_moderate']]['id']));

foreach ($array_users_accepted as $singolo_user_accepted){
$image = $instagram -> getMedia($singolo_user_accepted->image_id);
array_push($result_accepted,$image->data);
}
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$result = $result_accepted;
//echo 'result: '; print_r($result);
}
else{
   $result = read_table('user',$atts['enjoyinstagram_user_polaroid_moderate'],'','true');
   $result = json_decode(json_encode($result),FALSE);
}
}
else{
    
$result = $instagram->getUserMedia(urlencode($array_utenti[$atts['user_polaroid']]['id']));
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$images_captured = get_option('enjoyinstagram_images_captured');
    $rr = array();
    if($images_captured <= 20){
    $result = $result->data;
}
else{
    $tmp = 0;
do{
    
    foreach($result->data as $test) if($tmp2++ < $images_captured){
array_push($rr,$test);        
    $tmp++;
    }

}while((($result->pagination->next_url) && $result = json_decode(file_get_contents($result->pagination->next_url))) && ($tmp < $images_captured));
    
$result = $rr;
}
}
else{
   $result = read_table('user',$atts['user_polaroid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
}
if(count($result)>0){
 foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'user',$atts['user_polaroid'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
}

 }
}
else
if($atts['type_polaroid']=='likes'){
    
$result = $instagram->getUserLikes(urlencode($array_utenti[$atts['user_polaroid']]['id']));
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$images_captured = get_option('enjoyinstagram_images_captured');
    $rr = array();
    if($images_captured <= 20){
    $result = $result->data;
}
else{
    $tmp = 0;
do{
    
    foreach($result->data as $test) if($tmp2++ < $images_captured){
array_push($rr,$test);        
    $tmp++;
    }

}while((($result->pagination->next_url) && $result = json_decode(file_get_contents($result->pagination->next_url))) && ($tmp < $images_captured));
    
$result = $rr;
}
}
else{
   $result = read_table('likes',$atts['user_polaroid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
if(count($result)>0){
foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'likes',$atts['user_polaroid'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}

}


$pre_shortcode_content = "<div id=\"reload_enjoyinstagram_polaroid_".$i."\"><section id=\"photostack-".$i."\" class=\"photostack\" style=\"background: #".$atts['enjoyinstagram_polaroid_background']."\"><div>";    





foreach ($result as $entry) {
    if (isHttps()) {

        $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
        $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

    }
	 switch($atts['enjoyinstagram_polaroid_link']) {
                case 'swipebox' :
                $link = "<a data-show-author = ".$atts['enjoyinstagram_polaroid_image_author']." data-show-likes = ".$atts['enjoyinstagram_polaroid_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" class=\"swipebox_polaroid photostack-img\" href=\"{$entry->images->standard_resolution->url}\">";    
                $link_close = "</a>";
                break;
                case 'instagram':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_polaroid_image_author']." data-show-likes = ".$atts['enjoyinstagram_polaroid_likes_count']." class=\"photostack-img\" data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\">";    
                $link_close = "</a>";
                break;
                case 'nolink':
                $link = ""; 
                $link_close = "";    
                break;
                case 'altro':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_polaroid_image_author']." data-show-likes = ".$atts['enjoyinstagram_polaroid_likes_count']." class=\"photostack-img\" data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_polaroid_link_altro"]."\">";    
                $link_close = "</a>";
                break;
                    
                
                }
	
                if($atts['enjoyinstagram_polaroid_back'] == 'true'){
                if($atts['enjoyinstagram_polaroid_likes_count']=='false'){
                    $entry->likes->count ='';
                }
                if($atts['enjoyinstagram_polaroid_image_author']=='false'){
                    $entry->user->username = '';
                }
                $shortcode_content .=  "<figure class=\"photostack-current photostack-flip\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\">".$link."<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->standard_resolution->url}\">".$link_close."<figcaption><h2 class=\"photostack-title\"><a target=\"_blank\" href=\"{$entry->link}\"><span id=\"likes_count\">{$entry->likes->count}</span></a><a href=\"http://instagram.com/{$entry->user->username}\" target=\"_blank\">{$entry->user->username}</a></h2><div class=\"photostack-back\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\"><p>{$entry->caption->text}</p></div></figcaption></figure>";
                }else{
                 $shortcode_content .=  "<figure class=\"photostack-current photostack-flip\" style=\"border: ".$atts['enjoyinstagram_polaroid_border_width']."px solid #".$atts['enjoyinstagram_polaroid_border_color']."\">".$link."<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->standard_resolution->url}\">".$link_close."<figcaption><h2 class=\"photostack-title\"><a target=\"_blank\" href=\"{$entry->link}\"><span id=\"likes_count\">{$entry->likes->count}</span></a><a href=\"http://instagram.com/{$entry->user->username}\" target=\"_blank\">{$entry->user->username}</a></h2></figcaption></figure>";
                }
  }
  
$post_shortcode_content = "</div></section></div><script type=\"text/javascript\">	
                        new Photostack( document.getElementById( 'photostack-".$i."' ), {
				callback : function( item ) {
					//console.log(item)
				}
			});   
                       </script>";

?>


<script type="text/javascript">	
    
			jQuery(function() {
                            
                            
                              
	jQuery(".swipebox_polaroid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_polaroid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_polaroid_hidebarsdelay']; ?>,
        afterClose: function(){
            jQuery('#reload_enjoyinstagram_polaroid_<?php echo $i; ?>').load(document.URL + " #photostack-<?php echo $i; ?>",function() {
jQuery(".swipebox_polaroid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_polaroid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_polaroid_hidebarsdelay']; ?>,
    });	
    
    new Photostack( document.getElementById( 'photostack-<?php echo $i; ?>' ), {
				callback : function( item ) {
					//console.log(item)
				}
			})
    
    
    }); 
        }
			
			});
                        });
			
		</script>


    <?php 

}
$i++;


$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return $shortcode_content;


 }



add_shortcode( 'enjoyinstagram_polaroid', 'enjoyinstagram_polaroid_shortcode' );




?>