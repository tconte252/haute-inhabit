<?php
// Add Shortcode
function enjoyinstagram_carousel_shortcode($atts) {
    
    ?>
<script type="text/javascript">
function ReloadEnjoyInstagramCarousel(id,time_reload,resp_480px,resp_600px,resp_768px,resp_1024px){
    var id = id;
    var time_reload = time_reload;
    var resp_480px= resp_480px;
    var resp_600px= resp_600px;
    var resp_768px= resp_768px;
    var resp_1024px= resp_1024px;
    //console.log('resp_480px: '+resp_480px);
//console.log('reload #reload_enjoyinstagram_carousel_'+id+' -> '+time_reload);

jQuery('#reload_enjoyinstagram_carousel_'+id).load(document.URL + " #reload_enjoyinstagram_carousel_"+id, {"resp_480px":resp_480px,"resp_600px":resp_480px,"resp_768px":resp_480px,"resp_1024px":resp_480px}, function() {

//console.log('resp_480px: '+resp_480px);

jQuery("#owl-"+id).owlCarousel({
    autoplay: <?php echo $atts['enjoyinstagram_carousel_autoplay']; ?>,
    autoplayTimeout: <?php echo $atts['enjoyinstagram_carousel_autoplay_timeout']; ?>,
    autoplayHoverPause: <?php echo $atts['enjoyinstagram_carousel_stop_on_hover']; ?>,
    autoplaySpeed:<?php echo $atts['enjoyinstagram_carousel_autoplay_speed']; ?>,
    navSpeed: <?php echo $atts['enjoyinstagram_carousel_slidespeed']; ?>,
    margin: <?php echo $atts['enjoyinstagram_carousel_margin']; ?>,
    lazyLoad: true,
    nav: <?php echo $atts['enjoyinstagram_carousel_navigation']; ?>,
    navText: ['<?php echo $atts['enjoyinstagram_carousel_navigation_prev']; ?>','<?php echo $atts['enjoyinstagram_carousel_navigation_next']; ?>'],
    responsiveClass:true,
    loop: <?php echo $atts['enjoyinstagram_carousel_loop']; ?>,
    dots: <?php echo $atts['enjoyinstagram_carousel_dots']; ?>,
    animateOut: '<?php echo $atts['enjoyinstagram_carousel_animateout']; ?>',
    animateIn: '<?php echo $atts['enjoyinstagram_carousel_animatein']; ?>',
    items: <?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,
    responsive:{
        0:{
            items:resp_480px,
           
        },
        480:{
            items:resp_600px,
            
        },
        600:{
            items:resp_768px,
            
        },
        768:{
            items:resp_1024px,
            
        },
        1024:{
            items:<?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,
            
        }
    }
 });    

jQuery(".swipebox").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_carousel_hidebarsmobile']; ?>,
	hideBarsDelay : false
	});
 
});

setTimeout("ReloadEnjoyInstagramCarousel("+id+","+time_reload+","+resp_480px+","+resp_600px+","+resp_768px+","+resp_1024px+")",time_reload);
}        
</script>
<?php
    STATIC $i = 1;
    
    if($atts['enjoyinstagram_carousel_autoreload']=='true'){
        if($atts['show_resolution_carousel']!='on'){
            $atts['enjoyinstagram_carousel_1024px'] = $atts['enjoyinstagram_carousel_items_number'];
            $atts['enjoyinstagram_carousel_768px'] = $atts['enjoyinstagram_carousel_items_number'];
            $atts['enjoyinstagram_carousel_600px'] = $atts['enjoyinstagram_carousel_items_number'];
            $atts['enjoyinstagram_carousel_480px'] = $atts['enjoyinstagram_carousel_items_number'];
        }
?>
<script type="text/javascript">
 ReloadEnjoyInstagramCarousel(<?php echo $i; ?>,<?php echo $atts['enjoyinstagram_carousel_autoreload_value']; ?>,<?php echo $atts['enjoyinstagram_carousel_480px']; ?>,<?php echo $atts['enjoyinstagram_carousel_600px']; ?>,<?php echo $atts['enjoyinstagram_carousel_768px']; ?>,<?php echo $atts['enjoyinstagram_carousel_1024px']; ?>);
</script>
<?php
}
    
    ?>


<?php






	
	
	if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {
	extract( shortcode_atts( array(
            'type' => 'user',
            'user' => 'mediabetasrl',
            'hashtag' => 'enjoyinstagram',
            'enjoyinstagram_carousel_items_number' => '5',
            'enjoyinstagram_carousel_1024px' => '5',
            'enjoyinstagram_carousel_navigation' => 'false',
            'enjoyinstagram_carousel_link' => 'swipebox',
            'enjoyinstagram_carousel_link_altro' => '#',
            'enjoyinstagram_carousel_navigation_prev' => 'prev',
            'enjoyinstagram_carousel_navigation_next'=> 'next',
            'enjoyinstagram_carousel_autoplay' => 'false',
            'enjoyinstagram_carousel_autoplay_speed' => '3000',
            'enjoyinstagram_carousel_autoplay_timeout' => '3000',
            'enjoyinstagram_carousel_stop_on_hover' =>'false',
            'enjoyinstagram_carousel_slidespeed' =>'3000',
            'enjoyinstagram_carousel_margin' => '10',
            'enjoyinstagram_carousel_loop' => 'false',
            'enjoyinstagram_carousel_dots' => 'true',
            'enjoyinstagram_carousel_animatein' => 'bounceIn',
            'enjoyinstagram_carousel_animateout' => 'bounceOut',
            'enjoyinstagram_carousel_image_author' => 'true',
            'enjoyinstagram_carousel_likes_count' => 'true',
            'enjoyinstagram_carousel_hidebarsmobile' => 'true',
            'enjoyinstagram_carousel_hidebarsdelay' => '3000',
            'enjoyinstagram_carousel_moderate' => 'false',
            'enjoyinstagram_carousel_autoreload_default' => 'false',
            'enjoyinstagram_carousel_autoreload_value_default' => '20000',
            'enjoyinstagram_hashtag_popup_moderate' => '',
            'enjoyinstagram_user_carousel_moderate' => ''
	), $atts ) );
        
        if($atts['show_resolution_carousel']!='on'){
            $atts['enjoyinstagram_carousel_1024px'] = $atts['enjoyinstagram_carousel_items_number'];
            $atts['enjoyinstagram_carousel_768px'] = $atts['enjoyinstagram_carousel_items_number'];
            $atts['enjoyinstagram_carousel_600px'] = $atts['enjoyinstagram_carousel_items_number'];
            $atts['enjoyinstagram_carousel_480px'] = $atts['enjoyinstagram_carousel_items_number'];
        }
?>
<script>
    jQuery(function(){
      jQuery(document.body)
          .on('click touchend','#swipebox-slider .current', function(e){
              jQuery('#swipebox-close').trigger('click');
          });
    });
</script>
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_carousel_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_carousel_hidebarsdelay']; ?>
	});
	
});   
jQuery(document).ready(function() {
    
jQuery("#owl-<?php echo $i; ?>").owlCarousel({
    autoplay: <?php echo $atts['enjoyinstagram_carousel_autoplay']; ?>,
    autoplayTimeout: <?php echo $atts['enjoyinstagram_carousel_autoplay_timeout']; ?>,
    autoplayHoverPause: <?php echo $atts['enjoyinstagram_carousel_stop_on_hover']; ?>,
    autoplaySpeed:<?php echo $atts['enjoyinstagram_carousel_autoplay_speed']; ?>,
    navSpeed: <?php echo $atts['enjoyinstagram_carousel_slidespeed']; ?>,
    margin: <?php echo $atts['enjoyinstagram_carousel_margin']; ?>,
    lazyLoad: true,
    nav: <?php echo $atts['enjoyinstagram_carousel_navigation']; ?>,
    navText: ['<?php echo $atts['enjoyinstagram_carousel_navigation_prev']; ?>','<?php echo $atts['enjoyinstagram_carousel_navigation_next']; ?>'],
    responsiveClass:true,
    loop: <?php echo $atts['enjoyinstagram_carousel_loop']; ?>,
    dots: <?php echo $atts['enjoyinstagram_carousel_dots']; ?>,
    animateOut: '<?php echo $atts['enjoyinstagram_carousel_animateout']; ?>',
    animateIn: '<?php echo $atts['enjoyinstagram_carousel_animatein']; ?>',
    items: <?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,
    responsive:{
        0:{
            items:<?php echo $atts['enjoyinstagram_carousel_480px']; ?>,
           
        },
        480:{
            items:<?php echo $atts['enjoyinstagram_carousel_600px']; ?>,
            
        },
        600:{
            items:<?php echo $atts['enjoyinstagram_carousel_768px']; ?>,
            
        },
        768:{
            items:<?php echo $atts['enjoyinstagram_carousel_1024px']; ?>,
            
        },
        1024:{
            items:<?php echo $atts['enjoyinstagram_carousel_items_number']; ?>,
            
        }
    }
 });
		
		 });
</script>

<?php


global $wpdb;


$array_utenti = get_option('enjoy_instagram_options');
$array_hashtag_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND hashtag = '".$atts['enjoyinstagram_hashtag_popup_moderate']."' ORDER BY id DESC");

$array_users_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '".$atts['enjoyinstagram_user_carousel_moderate']."' ORDER BY id DESC");



$instagram = new Enjoy_Instagram(array(
  'apiKey'      => $array_utenti[$atts['user']]['apiKey'],
  'apiSecret'   => $array_utenti[$atts['user']]['apiSecret'] )
        );
$instagram->setAccessToken($array_utenti[$atts['user']]['access_token']);

  //      echo 'Rigga 220<pre>'; print_r($instagram); echo '</pre>';



if($atts['type']=='hashtag'){
if($atts['enjoyinstagram_carousel_moderate']=='true'){

$result_accepted = array();
$result = $instagram->getTagMedia(urlencode($atts['enjoyinstagram_hashtag_popup_moderate']));
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
   $result = read_table('hashtag','',$atts['hashtag'],'true');
   $result = json_decode(json_encode($result),FALSE);
}



    
}
else{
    
$result = $instagram->getTagMedia(urlencode($atts['hashtag']));
   // $result = file_get_contents("https://api.instagram.com/v1/tags/".$atts['hashtag']."/media/recent?access_token=".$array_utenti[$atts['user']]['access_token']);
    //$result = json_decode($result);

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

    //echo '<pre>'; print_r($result); echo '</pre>';

    foreach($result->data as $test) if($tmp2++ < $images_captured){
array_push($rr,$test);        
    $tmp++;
    }

}while((($result->pagination->next_url) && $result = json_decode(file_get_contents($result->pagination->next_url))) && ($tmp < $images_captured));
    
$result = $rr;
}
}
else{
   $result = read_table('hashtag','',$atts['hashtag'],'false');
   $result = json_decode(json_encode($result),FALSE);
}
}  
if(count($result)>0){
 foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'hashtag','',$atts['hashtag'],$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}
}
else if($atts['type']=='user'){
    
if($atts['enjoyinstagram_carousel_moderate']=='true'){
    
    
$result_accepted = array();
$result = $instagram->getUserMedia(urlencode($array_utenti[$atts['user']]['id']));
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
   $result = read_table('user',$atts['user'],'','true');
   $result = json_decode(json_encode($result),FALSE);
}

}
else{
    
$result = $instagram->getUserMedia(urlencode($array_utenti[$atts['user']]['id']));
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
   $result = read_table('user',$atts['user'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}


}


//echo '<pre>'; print_r($result); echo '</pre>';
if(count($result)>0){
 foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'user',$atts['user'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
}

 }
}
else if($atts['type']=='likes'){
    
$result = $instagram->getUserLikes(urlencode($array_utenti[$atts['user']]['id']));
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
   $result = read_table('likes',$atts['user'],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
if(count($result)>0){
foreach ($result as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'likes',$atts['user'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}
}




if(count($result)>0){
$pre_shortcode_content = "<div id=\"reload_enjoyinstagram_carousel_".$i."\"><div id=\"owl-".$i."\" class=\"owl-example\" >";
 
 foreach ($result as $entry){



     if (isHttps()) {

             $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
             $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

     }
     
    if($atts['enjoyinstagram_carousel_items_number']!='1'){

            switch($atts['enjoyinstagram_carousel_link']) {



                case 'swipebox' :




                $link = "<a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" rel=\"gallery_swypebox\" class=\"swipebox\" href=\"{$entry->images->standard_resolution->url}\">";    
                $link_close = "</a>";
                
                break;
                case 'instagram':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"".$entry->user->profile_picture."\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\">";    
                $link_close = "</a>";
                break;
                case 'nolink':
                $link = ""; 
                $link_close = "";    
                break;
                case 'altro':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_carousel_link_altro"]."\">";    
                $link_close = "</a>";
                break;
                }
                
                
    $shortcode_content .=  "<div class=\"box\">"
            . $link
            . "<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->standard_resolution->url}\">"
            . $link_close
            . "</div>";
	
            
            
            }else{

        switch($atts['enjoyinstagram_carousel_link']) {



            case 'swipebox' :




                $link = "<a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" rel=\"gallery_swypebox\" class=\"swipebox\" href=\"{$entry->images->standard_resolution->url}\">";
                $link_close = "</a>";

                break;
            case 'instagram':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"".$entry->user->profile_picture."\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\">";
                $link_close = "</a>";
                break;
            case 'nolink':
                $link = "";
                $link_close = "";
                break;
            case 'altro':
                $link = "<a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_carousel_link_altro"]."\">";
                $link_close = "</a>";
                break;
        }

	    $shortcode_content .=  "<div class=\"box\">"
                    . $link
                    . "<img style=\"width:100%;\" src=\"{$entry->images->standard_resolution->url}\">"
                    . $link_close
                            . "</div>";
	}
  }
  
$post_shortcode_content = "</div></div>";
}


}
$i++;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return $shortcode_content;

}



add_shortcode( 'enjoyinstagram_carousel', 'enjoyinstagram_carousel_shortcode' );




?>