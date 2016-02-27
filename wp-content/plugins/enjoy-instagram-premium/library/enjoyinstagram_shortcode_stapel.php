<?php
// Add Shortcode
function enjoyinstagram_shortcode_album($atts) { 

STATIC $i = 1;

if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {

extract( shortcode_atts( array(
            
            
	), $atts ) );    
    



global $wpdb;

$users = explode(',',$atts['user_album']);
$users_moderate = explode(',',$atts['user_moderate_album']);
$hashtag = array_map('trim', explode(',',$atts['hashtag_album']));
$hashtag_moderate = explode(',',$atts['hashtag_moderate_album']);




$array_utenti = get_option('enjoy_instagram_options');

foreach($array_utenti as $singolo_utente){
    if($singolo_utente['username']!=''){
        $apikey = $singolo_utente['apiKey'];
        $apisecret = $singolo_utente['apiSecret'];
        $access_token = $singolo_utente['access_token'];
    }
}



$instagram = new Enjoy_Instagram(array(
  'apiKey'      => $apikey,
  'apiSecret'   => $apisecret
        )
        );



$instagram->setAccessToken($access_token);






$pre_shortcode_content = '<div class="topbar">
						<span id="close-'.$i.'" class="back">&larr;</span>
						<h4 id="name-'.$i.'"></h4>
					</div><ul id="tp-grid-'.$i.'" class="tp-grid">';

foreach($users as $user){
  $result = $instagram->getUserMedia(urlencode($array_utenti[$user]['id']));
 $code = $result->meta->code;
 //$code = '429';
if($code == '200'){
$result = $result->data;
}
else{
    
   $result = read_table_thumb('user',$array_utenti[$user],'','false');
   $result = json_decode(json_encode($result),FALSE);
}
if(count($result)>0){
 foreach ($result as $entry){
add_in_table_thumb($entry->id,$entry->link,$entry->images->standard_resolution->url,$entry->images->thumbnail->url,'user',$array_utenti[$user],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
}
}
   if(!in_array($user,$users_moderate)){
$result = $instagram->getUserMedia(urlencode($array_utenti[$user]['id']));
$result = $result->data;    
if(count($result)>0){
foreach ($result as $entry) {

    if (isHttps()) {

        $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
        $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

    }

if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry->likes->count."</span>";
}else{
    if($entry->caption->text!='' && strlen($entry->caption->text)>20){
        $hover = substr($entry->caption->text,0,20).' [..]';
    }else{
        $hover = $entry->caption->text;
    }
    
}


switch($atts['enjoyinstagram_album_link']) {
                case 'swipebox' :
                    
                $link .= "<li data-pile=\"@".$user."\">
							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" class=\"swipebox_album\" href=\"{$entry->images->standard_resolution->url}\">
<span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
              break;
                case 'instagram':
                $link .= "<li data-pile=\"@".$user."\"><a data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";    
                
                break;
                case 'nolink':
                $link .= "<li data-pile=\"@".$user."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</li>";    
                
                break;
                case 'altro':
                $link .= "<li data-show-author = ".$atts['enjoyinstagram_carousel_image_author']." data-show-likes = ".$atts['enjoyinstagram_carousel_likes_count']." data-pile=\"@".$user."\"><a data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
                break;
                    
                
                }





                                                                
}
}
}
}










$hashtag_empty = array_filter($hashtag);
if(!empty($hashtag_empty)){
foreach($hashtag as $hash){
if(!in_array($hash,$hashtag_moderate)){
$result = $instagram->getTagMedia(urlencode($hash));
$code = $result->meta->code;
//$code = '429';
if($code == '200'){
$result = $result->data;
}
else{
   $result = read_table_thumb('hashtag','',$hash,'false');
   $result = json_decode(json_encode($result),FALSE);
}

if(count($result)>0){
 foreach ($result as $entry){
add_in_table_thumb($entry->id,$entry->link,$entry->images->standard_resolution->url,$entry->images->thumbnail->url,'hashtag','',$hash,$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
 }
}

 if(count($result)>0){   
foreach ($result as $entry) {
    if (isHttps()) {

        $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
        $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

    }
if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry->likes->count."</span>";
}else{
    if($entry->caption->text!='' && strlen($entry->caption->text)>20){
        $hover = substr($entry->caption->text,0,20).' [..]';
    }else{
        $hover = $entry->caption->text;
    }
    
}

switch($atts['enjoyinstagram_album_link']) {
                case 'swipebox' :
                    
                $link .= "<li data-pile=\"#".$hash."\">
							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" class=\"swipebox_album\" href=\"{$entry->images->standard_resolution->url}\">
<span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
              break;
                case 'instagram':
                $link .= "<li data-pile=\"#".$hash."\"><a data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";    
                
                break;
                case 'nolink':
                $link .= "<li data-pile=\"#".$hash."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</li>";    
                
                break;
                case 'altro':
                $link .= "<li data-pile=\"#".$hash."\"><a data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
                break;
                    
                
                }

                                                                
}
}
}
}
}


foreach($users_moderate as $user_moderate){
$array_users_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='user' AND user = '".$user_moderate."'");

$result_accepted = array();

foreach ($array_users_accepted as $singolo_user_accepted){
    
    $result = $instagram->getUserMedia(urlencode($array_utenti[$user_moderate]['id']));
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
    
   $result = read_table_thumb('user',$user_moderate,'','true');
   $result = json_decode(json_encode($result),FALSE);
  // echo '<pre>'; print_r($result); echo '</pre>';
}
   if(count($result)>0){
foreach ($result as $entry) {
    if (isHttps()) {

        $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
        $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

    }
    if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry->likes->count."</span>";
}else{
    if($entry->caption->text!='' && strlen($entry->caption->text)>20){
        $hover = substr($entry->caption->text,0,20).' [..]';
    }else{
        $hover = $entry->caption->text;
    }
    
}
switch($atts['enjoyinstagram_album_link']) {
                case 'swipebox' :
                    
                $link .= "<li data-pile=\"@".$user_moderate."\">
							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" class=\"swipebox_album\" href=\"{$entry->images->standard_resolution->url}\">
<span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
              break;
                case 'instagram':
                $link .= "<li data-pile=\"@".$user_moderate."\"><a data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";    
                
                break;
                case 'nolink':
                $link .= "<li data-pile=\"@".$user_moderate."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</li>";    
                
                break;
                case 'altro':
                $link .= "<li data-pile=\"@".$user_moderate."\"><a data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
                break;
                    
                
                }
                                                                
}
}
}

foreach($hashtag_moderate as $hash_moderate){
$array_hashtag_accepted = $wpdb->get_results("SELECT image_id FROM ".$wpdb->prefix . "enjoy_instagram_moderate_accepted WHERE type='hashtag' AND hashtag = '".$hash_moderate."'");

$result_accepted = array();

foreach ($array_hashtag_accepted as $singolo_hashtag_accepted){
$image = $instagram -> getMedia($singolo_hashtag_accepted->image_id);
array_push($result_accepted,$image->data);
}
$result = $result_accepted;
   
foreach ($result as $entry) {
    if (isHttps()) {

        $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
        $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

    }
   if($atts['enjoyinstagram_album_hover']=='likes'){
    $hover = "<span id=\"likes_count\">".$entry->likes->count."</span>";
}else{
    if($entry->caption->text!='' && strlen($entry->caption->text)>20){
        $hover = substr($entry->caption->text,0,20).' [..]';
    }else{
        $hover = $entry->caption->text;
    }
    
}

switch($atts['enjoyinstagram_album_link']) {
                case 'swipebox' :
                    
                $link .= "<li data-pile=\"#".$hash_moderate."\">
							<a data-show-author = ".$atts['enjoyinstagram_album_image_author']." data-show-likes = ".$atts['enjoyinstagram_album_likes_count']." data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" class=\"swipebox_album\" href=\"{$entry->images->standard_resolution->url}\">
<span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
              break;
                case 'instagram':
                $link .= "<li data-pile=\"#".$hash_moderate."\"><a data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"{$entry->link}\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";    
                
                break;
                case 'nolink':
                $link .= "<li data-pile=\"#".$hash_moderate."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</li>";    
                
                break;
                case 'altro':
                $link .= "<li data-pile=\"#".$hash_moderate."\"><a data-author-image=\"{$entry->user->profile_picture}\" data-likes-count=\"{$entry->likes->count}\" data-author-username=\"{$entry->user->username}\" data-link=\"{$entry->link}\" title=\"{$entry->caption->text}\" target=\"_blank\" href=\"".$atts["enjoyinstagram_album_link_altro"]."\"><span class=\"tp-info\"><span>".$hover."</span></span>
								<img alt=\"{$entry->caption->text}\" src=\"{$entry->images->thumbnail->url}\" />
							</a></li>";
                break;
                    
                
                }
                                                                
}

}
$shortcode_content =  $link;

$post_shortcode_content = '</ul>';




?>

    

<script type="text/javascript">	
			
    
    jQuery(function() {
                            
                            
                              
	jQuery(".swipebox_album").swipebox({
        hideBarsOnMobile: <?php echo $atts['enjoyinstagram_album_hidebarsmobile']; ?>,
	hideBarsDelay : <?php echo $atts['enjoyinstagram_album_hidebarsdelay']; ?>
	});
        });
    
    
    
    
    
    jQuery(function($) {
                            
				var $grid = $( '#tp-grid-<?php echo $i; ?>' ),
					$name = $( '#name-<?php echo $i; ?>' ),
					$close = $( '#close-<?php echo $i; ?>' ),
					$loader = $( '<div class="loader"><i></i><i></i><i></i><i></i><i></i><i></i><span>Loading...</span></div>' ).insertBefore( $grid ),
					stapel = $grid.stapel( {
						randomAngle : <?php echo $atts['enjoyinstagram_album_random_angle']; ?>,
						delay : <?php echo $atts['enjoyinstagram_album_delay']; ?>,
						gutter : <?php echo $atts['enjoyinstagram_album_margin']; ?>,
						pileAngles : 0,
                                                pileAnimation : { 
                                                openSpeed : <?php echo $atts['enjoyinstagram_album_animation_in']; ?>,
                                                closeSpeed : <?php echo $atts['enjoyinstagram_album_animation_out']; ?>
                                                },
						onLoad : function() {
							$loader.remove();
						},
						onBeforeOpen : function( pileName ) {
							$name.html( pileName );
						},
						onAfterOpen : function( pileName ) {
							$close.show();
						}
					} );

				$close.on( 'click', function() {
					$close.hide();
					$name.empty();
					stapel.closePile();
				} );

			} );
		</script>
<?php

}
$i++;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return  $shortcode_content;

}

add_shortcode( 'enjoyinstagram_album', 'enjoyinstagram_shortcode_album' );



?>
