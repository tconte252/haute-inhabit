<?php
// Add Shortcode
function enjoyinstagram_mb_shortcode_grid($atts) { 
    ?>
<script type="text/javascript">
    
    
    
    
    
    
    
function ReloadEnjoyInstagramGrid(id,time_reload,enjoyinstagram_grid_rows_1024px,enjoyinstagram_grid_cols_1024px,enjoyinstagram_grid_rows_768px,enjoyinstagram_grid_cols_768px,enjoyinstagram_grid_rows_600px,enjoyinstagram_grid_cols_600px,enjoyinstagram_grid_rows_480px,enjoyinstagram_grid_cols_480px){
    var id = id;
    var time_reload = time_reload;
    
//console.log('reload #reload_enjoyinstagram_grid_'+id+' -> '+time_reload);
jQuery('#reload_enjoyinstagram_grid_'+id).load(document.URL + " #reload_enjoyinstagram_grid_"+id, {"enjoyinstagram_grid_rows_1024px":enjoyinstagram_grid_rows_1024px,"enjoyinstagram_grid_cols_1024px":enjoyinstagram_grid_cols_1024px,"enjoyinstagram_grid_rows_768px":enjoyinstagram_grid_rows_768px,"enjoyinstagram_grid_cols_768px":enjoyinstagram_grid_cols_768px,"enjoyinstagram_grid_rows_600px":enjoyinstagram_grid_rows_600px,"enjoyinstagram_grid_cols_600px":enjoyinstagram_grid_cols_600px,"enjoyinstagram_grid_rows_480px":enjoyinstagram_grid_rows_480px,"enjoyinstagram_grid_cols_480px":enjoyinstagram_grid_cols_480px},function() {
jQuery(".swipebox_grid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_grid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_grid_hidebarsdelay']; ?>
	});
	
//console.log(enjoyinstagram_grid_rows_1024px);

				if('<?php echo $atts['enjoyinstagram_grid_step']; ?>' == 'random'){
            jQuery('#grid-'+id).gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                                        step            : 'random',
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
					w1024           : {
    rows    : enjoyinstagram_grid_rows_1024px,
    columns : enjoyinstagram_grid_cols_1024px
},
 
w768            : {
    rows    : enjoyinstagram_grid_rows_768px,
    columns : enjoyinstagram_grid_cols_768px
},
        
w600            : {
    rows    : enjoyinstagram_grid_rows_600px,
    columns : enjoyinstagram_grid_cols_600px
},        
 
w480            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
        w320            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
w150            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
}
				});
        
        }else{
           
        
        
        
	


				jQuery('#grid-'+id).gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                                        step            : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
                                        maxStep         : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
					w1024           : {
    rows    : enjoyinstagram_grid_rows_1024px,
    columns : enjoyinstagram_grid_cols_1024px
},
 
w768            : {
    rows    : enjoyinstagram_grid_rows_768px,
    columns : enjoyinstagram_grid_cols_768px
},
        
w600            : {
    rows    : enjoyinstagram_grid_rows_600px,
    columns : enjoyinstagram_grid_cols_600px
},        
 
w480            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
        w320            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
},
w150            : {
    rows    : enjoyinstagram_grid_rows_480px,
    columns : enjoyinstagram_grid_cols_480px
}
				});
				
			
			}


 
});

setTimeout("ReloadEnjoyInstagramGrid("+id+","+time_reload+","+enjoyinstagram_grid_rows_1024px+","+enjoyinstagram_grid_cols_1024px+","+enjoyinstagram_grid_rows_768px+","+enjoyinstagram_grid_cols_768px+","+enjoyinstagram_grid_rows_600px+","+enjoyinstagram_grid_cols_600px+","+enjoyinstagram_grid_rows_480px+","+enjoyinstagram_grid_cols_480px+")",time_reload);
}        
</script>
<?php
STATIC $i = 1;
 if($atts['enjoyinstagram_grid_autoreload']=='true'){
     if($atts['show_resolution_grid']!='on'){
            $atts['enjoyinstagram_grid_rows_1024px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_1024px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_768px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_768px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_600px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_600px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_480px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_480px'] = $atts['enjoyinstagram_grid_cols'];
            
        }
?>
<script type="text/javascript">
 ReloadEnjoyInstagramGrid(<?php echo $i; ?>,<?php echo $atts['enjoyinstagram_grid_autoreload_value']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_1024px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_1024px']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_768px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_768px']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_600px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_600px']; ?>,<?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,<?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>);
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
            'enjoyinstagram_grid_moderate' => 'false',
            'enjoyinstagram_user_grid_moderate' => '',
            'enjoyinstagram_hashtag_popup_grid_moderate' => ''
	), $atts ) );    

if($atts['show_resolution_grid']!='on'){
            $atts['enjoyinstagram_grid_rows_1024px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_1024px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_768px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_768px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_600px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_600px'] = $atts['enjoyinstagram_grid_cols'];
            $atts['enjoyinstagram_grid_rows_480px'] = $atts['enjoyinstagram_grid_rows'];
            $atts['enjoyinstagram_grid_cols_480px'] = $atts['enjoyinstagram_grid_cols'];
            
        }




if($atts['enjoyinstagram_grid_likes_count']=='false'){
    ?>
<style type="text/css">
    #likes_count , #likes_count_text{
        display: none;
    }
</style>
        <?php
}
if($atts['enjoyinstagram_grid_image_author']=='false'){
    ?>
<style type="text/css">
    #author_image , #author_username{
        display: none;
    }
</style>
        <?php
}

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
    
if($atts['enjoyinstagram_grid_moderate']=='true'){

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
    
//$result = $result->data;
}
else{
  // echo '<h1 style="color:red;">CODE 429</h1>';
   $result = read_table('hashtag','',$atts['hashtag_grid'],'false');
   $result = json_decode(json_encode($result),FALSE);
}

}

foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'hashtag','',$atts['hashtag_grid'],$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }

}

else if($atts['type_grid']=='user'){
if($atts['enjoyinstagram_grid_moderate']=='true'){
    

    
    
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
    // echo '<h1 style="color:red;">CODE 429</h1>';
   $result = read_table('user',$atts['user_grid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
}
foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'user',$atts['user_grid'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}
else if($atts['type_grid']=='likes'){
    
$result = $instagram->getUserLikes(urlencode($array_utenti[$atts['user_grid']]['id']));
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
   $result = read_table('likes',$atts['user_grid'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'likes',$atts['user_grid'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }

}
//echo 'Result: <br />'.$result[0]->id;

if(count($result)>0){
$pre_shortcode_content = "<div id=\"reload_enjoyinstagram_grid_".$i."\"><div id=\"grid-".$i."\" class=\"ri-grid ri-grid-size-2 ri-shadow\"><ul>";


    $shortcode_content = '';

foreach ($result as $entry) {

    if (isHttps()) {

        $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
        $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

    }


	 switch($atts['enjoyinstagram_grid_link']) {
                case 'swipebox' :
                $link = "<a data-show-author = ".$atts['enjoyinstagram_grid_image_author']." data-show-likes = ".$atts['enjoyinstagram_grid_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" class=\"swipebox_grid\" href=\"{$entry->images->standard_resolution->url}\">";    
                $link_close = "</a>";
                break;
                case 'instagram':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_grid_image_author']." data-show-likes = ".$atts['enjoyinstagram_grid_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->caption->from->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\">";    
                $link_close = "</a>";
                break;
                case 'nolink':
                $link = ""; 
                $link_close = "";    
                break;
                case 'altro':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_grid_image_author']." data-show-likes = ".$atts['enjoyinstagram_grid_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->caption->from->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_grid_link_altro"]."\">";
                $link_close = "</a>";
                break;
                    
                
                }
	$shortcode_content .=  "<li>".$link."<img  src=\"{$entry->images->standard_resolution->url}\">".$link_close."</li>";
	
  }




$post_shortcode_content = "</ul></div></div>";
  
}


?>

    

<script type="text/javascript">	
    
			jQuery(function() {
                            
                            
                              
	jQuery(".swipebox_grid").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_grid_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_grid_hidebarsdelay']; ?>
	});
        
        if('<?php echo $atts['enjoyinstagram_grid_step']; ?>' == 'random'){
            jQuery('#grid-<?php echo $i; ?>').gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                    step            : 'random',
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                    animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                    interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                    preventClick    : false,
					w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_1024px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_1024px']; ?>
},
 
w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_768px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_768px']; ?>
},
        
w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_600px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_600px']; ?>
},        
 
w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
        w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
}
				});
        
        }else{
           
        
        
        
	


				jQuery('#grid-<?php echo $i; ?>').gridrotator({
					rows		: <?php echo $atts['enjoyinstagram_grid_rows']; ?>,
					columns		: <?php echo $atts['enjoyinstagram_grid_cols']; ?>,
                                        step            : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
                                        maxStep         : <?php echo $atts['enjoyinstagram_grid_step']; ?>,
					animType	: '<?php echo $atts['enjoyinstagram_grid_animation']; ?>',
                                        animSpeed       : <?php echo $atts['enjoyinstagram_grid_animation_speed']; ?>,
                                        interval        : <?php echo $atts['enjoyinstagram_grid_interval']; ?>,
					onhover         : <?php echo $atts['enjoyinstagram_grid_onhover']; ?>,
                                        preventClick    : false,
					w1024           : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_1024px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_1024px']; ?>
},
 
w768            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_768px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_768px']; ?>
},
        
w600            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_600px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_600px']; ?>
},        
 
w480            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
        w320            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
},
w150            : {
    rows    : <?php echo $atts['enjoyinstagram_grid_rows_480px']; ?>,
    columns : <?php echo $atts['enjoyinstagram_grid_cols_480px']; ?>
}
				});
				
			
			}
			
			});
			
		</script>
<?php

}
$i++;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return $shortcode_content;
}

add_shortcode( 'enjoyinstagram_grid', 'enjoyinstagram_mb_shortcode_grid' );



?>
