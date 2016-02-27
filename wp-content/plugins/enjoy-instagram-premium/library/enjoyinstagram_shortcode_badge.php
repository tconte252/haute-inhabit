<?php
// Add Shortcode
function enjoyinstagram_shortcode_badge($atts) { 

STATIC $i = 1;

if(get_option('enjoy_instagram_options') || get_option('enjoy_instagram_options') != '') {

extract( shortcode_atts( array(
            
            
	), $atts ) );    
    



global $wpdb;





$array_utenti = get_option('enjoy_instagram_options');


$instagram = new Enjoy_Instagram(array(
  'apiKey'      => $array_utenti[$atts['user_badge']]['apiKey'],
  'apiSecret'   => $array_utenti[$atts['user_badge']]['apiSecret'] )
        );
$instagram->setAccessToken($array_utenti[$atts['user_badge']]['access_token']);


$result = $instagram->getUser(urlencode($array_utenti[$atts['user_badge']]['id']));

$count_data = array();

$show_badge_profile_picture = $atts['show_badge_profile_picture'];
$show_badge_username = $atts['show_badge_username'];
$show_badge_bio = $atts['show_badge_bio'];
$show_badge_website = $atts['show_badge_website'];
$show_badge_full_name = $atts['show_badge_full_name'];
$show_badge_media = $atts['show_badge_media'];
$show_badge_followed_by = $atts['show_badge_followed_by'];
$show_badge_follows = $atts['show_badge_follows'];
$show_badge_images = $atts['show_badge_images'];
$show_badge_view_images = $atts['show_badge_view_images'];
$show_badge_number_images = $atts['show_badge_number_images'];



if($show_badge_media == 'on'){
    array_push($count_data,'show_badge_media');
}
if($show_badge_followed_by == 'on'){
    array_push($count_data,'$show_badge_followed_by');
}
if($show_badge_follows == 'on'){
    array_push($count_data,'$show_badge_follows');
}





$badge_username = $result->data->username;
$badge_bio = $result->data->bio;
$badge_website = $result->data->website;
$badge_profile_image = $result->data->profile_picture;
$badge_full_name = $result->data->full_name;
$badge_number_images = $result->data->counts->media;
$badge_followed_by = $result->data->counts->followed_by;
$badge_follows = $result->data->counts->follows;



if($show_badge_images=='on'){
    
$result_images = $instagram->getUserMedia($array_utenti[$atts['user_badge']]['id']);
$code = $result_images->meta->code;
//$code = '429';
if($code == '200'){
$result_images = $result_images->data; 
}
else{
   $result_images = read_table('user',$atts['user_badge'],'','false');
   $result_images = json_decode(json_encode($result_images),FALSE);
   
}

if(count($result_images)>0){
 foreach ($result_images as $entry){
add_in_table($entry->id,$entry->link,$entry->images->standard_resolution->url,'user',$atts['user_badge'],'',$entry->caption->text,$entry->likes->count,$entry->user->username,$entry->user->profile_picture,$entry->user->username,'',time());
}

 }



switch($show_badge_view_images){
        case 'grid':
        $pre_shortcode_content = '<div id="grid-badge-'.$i.'" class="ri-grid ri-grid-size-2 ri-shadow"><ul>';    
        if(count($result_images)>0){
            foreach($result_images as $entry) {
                if (isHttps()) {

                    $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
                    $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

                }
        $shortcode_content_images .=  '<li><a data-author-image='.$entry->caption->from->profile_picture.' data-likes-count='.$entry->likes->count.' data-author-username='.$entry->caption->from->username.' data-link='.$entry->link.' title='.$entry->caption->text.' target="_blank" href='.$entry->link.'><img  src="'.$entry->images->standard_resolution->url.'"></a></li>';
        }
        }
        if($show_badge_number_images<8){
            $columns_number = 1;
        }else{
            $columns_number = 2;
            $show_badge_number_images = $show_badge_number_images / 2;
        }
        $post_shortcode_content = '</ul></div><script type="text/javascript">jQuery(function() { jQuery(\'#grid-badge-'.$i.'\').gridrotator({
					rows		: 1,
					columns		: '.$show_badge_number_images.',
                                        step            : \'random\',
                                        animSpeed       : 500,
                                        interval        : 3000,
					animType	: \'fadeInOut\',
                                        preventClick    : false,
					w1024           : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},
 
w768            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},
        
w600            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},        
 
w480            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},
        w320            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
},
w150            : {
    rows    : '.$columns_number.',
    columns : '.$show_badge_number_images.'
}
				});});</script>';    
     
        break;
    case 'carousel':
        $pre_shortcode_content = '<div id="owl-badge-'.$i.'" class="owl-example" >';    
        if(count($result_images)>0){
        foreach($result_images as $entry) {
            if (isHttps()) {

                $entry->images->thumbnail->url = str_replace('http://', 'https://', $entry->images->thumbnail->url);
                $entry->images->standard_resolution->url = str_replace('http://', 'https://', $entry->images->standard_resolution->url);

            }
        $shortcode_content_images .=  '<a data-author-image='.$entry->caption->from->profile_picture.' data-likes-count='.$entry->likes->count.' data-author-username='.$entry->caption->from->username.' data-link='.$entry->link.' title='.$entry->caption->text.' target="_blank" href='.$entry->link.'><img  src="'.$entry->images->standard_resolution->url.'"></a>';
        }
}
        $post_shortcode_content = '</div>'
                . '<script type="text/javascript">'
                . 'jQuery(document).ready(function() {
    
jQuery("#owl-badge-'.$i.'").owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed:2000,
    margin: 0,
    lazyLoad: true,
    nav: false,
    responsiveClass:true,
    loop: true,
    dots: false,
    animateOut: \'fadeOut\',
    animateIn: \'fadeIn\',
    items: '.$show_badge_number_images.',
    responsive:{
        0:{
            items:'.$show_badge_number_images.',
           
        },
        480:{
            items:'.$show_badge_number_images.',
            
        },
        600:{
            items:'.$show_badge_number_images.',
            
        },
        768:{
            items:'.$show_badge_number_images.',
            
        },
        1024:{
            items:'.$show_badge_number_images.',
            
        }
    }
 });
		
		 });</script>'; 
        break;
   
}



}





}
$i++;

if($show_badge_media=='on'){
$shortcode_content_images = $pre_shortcode_content.$shortcode_content_images.$post_shortcode_content;
}else{
    $shortcode_content_images='';
}

if($show_badge_profile_picture=='on'){
   $badge_image_profile_frontend = '<div id="badge_image_profile" style="width: 100%;height:120px;background: url(\''.$badge_profile_image.'\');background-size: cover;"></div>'; 
}else{
    $badge_image_profile_frontend='';
}
if($show_badge_username=='on'){
$badge_username_frontend = '<span class="name-cen">'.$badge_username.'</span>';
}

if($show_badge_profile_picture!='on' && $show_badge_username!='on'){
    $instagram_profile_frontend='';
}else{
$instagram_profile_frontend = '<div class="acco-1-4 instagram_profile">
            <div class="ei_settings_float_block" >'.$badge_image_profile_frontend.'    
                
                <div class="element-block">'.$badge_username_frontend.'
            	</div>
            </div></div>';
}

if($show_badge_bio=='on'){
$bio_badge_frontend ='<span class="bio_badge">'.$badge_bio.'</span>';
}
if($show_badge_website=='on'){
$badge_url_frontend ='<a href="'.$badge_website.'" class="enin-url">'.$badge_website.'</a><br />';
}

if($show_badge_full_name=='on'){
    $badge_full_name_frontend = '<span style="font-size: 20px;font-weight: bold;">'.$badge_full_name.'</span><br />';
}

if($show_badge_images=='on'){
    $badge_number_images_frontend = '<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <span class="num-cen">'.$badge_number_images.'</span>
                	<span class="text-cen">posts</span>
            </div>
            </div>';
}


if($show_badge_followed_by=='on'){
    $badge_followed_by_frontend = '<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <span class="num-cen">'.$badge_followed_by.'</span>
                	<span class="text-cen">followers</span>
            </div>
            </div>';
}

if($show_badge_follows=='on'){
    $badge_follows_frontend = '<div class="acco-1-3">
            <div class="ei_settings_float_block">
            <span class="num-cen">'.$badge_follows.'</span>
                	<span class="text-cen">following</span>
            </div>
            </div>';
}

if($show_badge_images != 'on' && $show_badge_followed_by!='on' && $show_badge_follows!='on'){
    $badge_stats = '';
}else{
$badge_stats = '<div class="acco-1-4 data_value_badge" style="border: 1px solid #ccc;padding: 3px;">
                    <div class="ei_settings_float_block">
                    '.$badge_number_images_frontend.'
                    '.$badge_followed_by_frontend.'
                    '.$badge_follows_frontend.'
                    </div>
            </div>';
}




$shortcode_badge='<div id="div_shortcode_badge"><div class="enin-container">
    	<div class="enin-wall">'.$shortcode_content_images.'
                
            <div class="acco-block" style="margin-top: -10px;z-index: 99;
position: relative;" >
            '.$instagram_profile_frontend.'
                <div class="acco-2-4" style="width: 59%;padding: 10px;">
            <div class="ei_settings_float_block"> 
            <div class="enin-bio">
                '.$badge_full_name_frontend.'
                '.$badge_url_frontend.'
        	'.$bio_badge_frontend.'
        </div>
            </div>
            </div>
'.$badge_stats.'
            
     	</div>  
         <a href="http://instagram.com/'.$entry->user->username.'/" target="_blank"><div style="text-align: center;"><img  src="'.plugins_url('images/followme.png',__FILE__).'"</div>
        </div>

        
    </div></div>';

return $shortcode_badge;


}

add_shortcode( 'enjoyinstagram_badge', 'enjoyinstagram_shortcode_badge' );



?>
