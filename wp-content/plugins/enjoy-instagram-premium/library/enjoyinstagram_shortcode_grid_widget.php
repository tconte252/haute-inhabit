<?php
// Add Shortcode
function enjoyinstagram_grid_shortcode_widget($atts) { 
?>
<script type="text/javascript">
function ReloadEnjoyInstagramGrid(id,time_reload){
    var id = id;
    var time_reload = time_reload;
    
console.log('reload #reload_enjoyinstagram_grid_widget_'+id+' -> '+time_reload);
jQuery('#reload_enjoyinstagram_grid_widget_'+id).load(document.URL + " #reload_enjoyinstagram_grid_widget_"+id,function() {
jQuery(".swipebox_grid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_grid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_grid_hidebarsdelay']; ?>
	});
	


				if('<?php echo $atts['enjoyinstagram_grid_step']; ?>' == 'random'){
            jQuery('#grid-widget-'+id).gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                                        step            : 'random',
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
	w1400           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},				
            w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
 
w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        
w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},        
 
w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
}
				});
        
        }else{
           
        
        
        
	


				jQuery('#grid-widget'+id).gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                                        step            : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
                                        maxStep         : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
                                        w1400           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
					w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
 
w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        
w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},        
 
w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
}
				});
				
			
			}


 
});

setTimeout("ReloadEnjoyInstagramGrid("+id+","+time_reload+")",time_reload);
}        
</script>
<?php
STATIC $i = 1;
 if($atts['enjoyinstagram_grid_autoreload']=='true'){
?>
<script type="text/javascript">
 ReloadEnjoyInstagramGrid(<?php echo $i; ?>,<?php echo $atts['enjoyinstagram_grid_autoreload_value']; ?>);
</script>
<?php
}

if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {

extract( shortcode_atts( array(
            'type_grid' => 'user',
            'user_grid' => 'mediabetasrl',
            'hashtag_grid' => 'enjoyinstagram',
            'enjoyinstagram_grid_rows' => '2',
            'enjoyinstagram_grid_cols' => '4',
            'enjoyinstagram_grid_link' => 'swipebox',
            'enjoyinstagram_grid_link_altro' => '#',
            'enjoyinstagram_grid_step' => 'random',
            'enjoyinstagram_grid_animation' => 'random',
            'enjoyinstagram_grid_animation_speed' => '500',
            'enjoyinstagram_grid_interval' => '3000',
            'enjoyinstagram_grid_onhover' => 'false',
            'enjoyinstagram_grid_cols_480px' => '4',
            'enjoyinstagram_grid_rows_480px' => '2',
            'enjoyinstagram_grid_cols_600px' => '4',
            'enjoyinstagram_grid_rows_600px' => '2',
            'enjoyinstagram_grid_rows_768px' => '2',
            'enjoyinstagram_grid_cols_768px' => '4',
            'enjoyinstagram_grid_rows_1024px' => '2',
            'enjoyinstagram_grid_cols_1024px' => '4',
            'enjoyinstagram_grid_image_author' => 'true',
            'enjoyinstagram_grid_likes_count' => 'true',
            'enjoyinstagram_grid_hidebarsmobile' => 'true',
            'enjoyinstagram_grid_hidebarsdelay' => '3000',
            'enjoyinstagram_grid_autoreload' => 'false',
            'enjoyinstagram_grid_autoreload' => '20000',
            'enjoyinstagram_grid_moderate_widget' => 'false',
            'enjoyinstagram_user_grid_moderate' => '',
            'enjoyinstagram_hashtag_popup_grid_moderate' => ''
	), $atts ) );    
    




global $wpdb;

$array_utenti = get_option('enjoy_instagram_options');

$array_users_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '".$atts['enjoyinstagram_user_grid_moderate']."'");

$array_hashtag_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND hashtag = '".$atts['enjoyinstagram_hashtag_popup_grid_moderate']."'");

$instagram = new Enjoy_Instagram(array(
  'apiKey'      => $array_utenti[$atts['user_grid']]['apiKey'],
  'apiSecret'   => $array_utenti[$atts['user_grid']]['apiSecret'] )
        );
$instagram->setAccessToken($array_utenti[$atts['user_grid']]['access_token']);

if($atts['type_grid']=='hashtag'){
    
if($atts['enjoyinstagram_grid_moderate_widget']=='true'){

    $result_accepted = array();
$result = $instagram->getTagMedia(urlencode($atts['enjoyinstagram_hashtag_popup_grid_moderate']));

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
   $result = read_table('hashtag','',$atts['enjoyinstagram_hashtag_popup_grid_moderate'],'true');
   $result = json_decode(json_encode($result),FALSE);
}

    
}
else{    
    
$result = $instagram->getTagMedia(urlencode($atts['hashtag_grid']));
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$result = $result->data;
}
else{
   $result = read_table('hashtag','',$atts['hashtag_grid'],'false');
   $result = json_decode(json_encode($result),FALSE);
}
}

foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'hashtag','',$atts['hashtag_grid'],$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }

}
else
if($atts['type_grid']=='user'){
    
if($atts['enjoyinstagram_grid_moderate_widget']=='true'){
    

    
    
$result_accepted = array();
$result = $instagram->getUserMedia(urlencode($array_utenti[$atts['user_grid']]['id']));
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
   $result = read_table('user',$atts['user_grid'],'','true');
   $result = json_decode(json_encode($result),FALSE);
}



    }
else{
   
$result = $instagram->getUserMedia(urlencode($array_utenti[$atts['user_grid']]['id']));
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$result = $result->data;
}
else{
   $result = read_table('user',$atts['user_grid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}

}
foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'user',$atts['user_grid'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}
else
if($atts['type_grid']=='likes'){   
$result = $instagram->getUserLikes(urlencode($array_utenti[$atts['user_grid']]['id']));
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$result = $result->data;
}
else{
   $result = read_table('likes',$atts['user_grid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
if(count($result)>0){
foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'likes',$atts['user_grid'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}

}
$pre_shortcode_content = "<div id=\"reload_enjoyinstagram_grid_widget_".$i."\"><div id=\"grid-widget-".$i."\" class=\"ri-grid ri-grid-size-2 ri-shadow\"><ul>";

    

if(count($result)>0){
foreach ($result as $entry) {

    if (isHttps()) {

        $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
        $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

    }


	 switch($atts['enjoyinstagram_grid_link']) {
                case 'swipebox' :
                $link = "<a data-show-author = ".$atts['enjoyinstagram_grid_image_author']." data-show-likes = ".$atts['enjoyinstagram_grid_likes_count']."  data-author-image=\"{$entry->caption->from->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->caption->from->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" class=\"swipebox_grid\" href=\"{$entry->images->standard_resolution->url}\">";    
                $link_close = "</a>";
                break;
                case 'instagram':
                $link = "<a data-author-image=\"{$entry->caption->from->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->caption->from->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\">";    
                $link_close = "</a>";
                break;
                case 'nolink':
                $link = ""; 
                $link_close = "";    
                break;
                case 'altro':
                $link = "<a data-author-image=\"{$entry->caption->from->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->caption->from->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_carousel_link_altro"]."\">";    
                $link_close = "</a>";
                break;
                    
                
                }
	$shortcode_content .=  "<li>".$link."<img  src=\"{$entry->images->standard_resolution->url}\">".$link_close."</li>";
	
  }
}
$post_shortcode_content = "</ul></div></div>";
  
?>

    

<script type="text/javascript">	
    
			jQuery(function() {
                            
                            
                              
	jQuery(".swipebox_grid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_grid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_grid_hidebarsdelay']; ?>
	});
        
        if('<?php echo $atts['enjoyinstagram_grid_step']; ?>' == 'random'){
            jQuery('#grid-widget-<?php echo $i; ?>').gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                                        step            : 'random',
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
                                        w1400           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
					w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
 
w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        
w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},        
 
w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        w240            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
}
				});
        
        }else{
           
        
        
        
	


				jQuery('#grid-widget-<?php echo $i; ?>').gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                                        step            : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
                                        maxStep         : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
                                        w1400           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
					w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
 
w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        
w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},        
 
w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
        w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols']; ?>
}
				});
				
			
			}
			
			});
			
		</script>
<?php

}
$i++;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

echo  $shortcode_content;
}

add_shortcode( 'enjoyinstagram_grid_widget', 'enjoyinstagram_grid_shortcode_widget' );



?>
