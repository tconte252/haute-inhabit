<?php

class Badge_Widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			'enjoyinstagram_widget_badge', // Base ID
			__('EnjoyInstagram - Badge', 'text_domain'), // Name
			array( 'description' => __( 'EnjoyInstagram Widget for Badge View', 'text_domain' ), ) // Args
		);
	}
	
	

	
	public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$first_select_enjoyinstagram_badge_or_hashtag_widget = apply_filters( 'widget_content', $instance['first_select_enjoyinstagram_badge_or_hashtag_widget'] );

$show_badge_profile_picture = apply_filters( 'widget_content', $instance['show_badge_profile_picture'] );
$show_badge_username = apply_filters( 'widget_content', $instance['show_badge_username'] );
$show_badge_bio = apply_filters( 'widget_content', $instance['show_badge_bio'] );
$show_badge_website = apply_filters( 'widget_content', $instance['show_badge_website'] );
$show_badge_full_name = apply_filters( 'widget_content', $instance['show_badge_full_name'] );
$show_badge_media = apply_filters( 'widget_content', $instance['show_badge_media'] );
$show_badge_followed_by = apply_filters( 'widget_content', $instance['show_badge_followed_by'] );
$show_badge_follows = apply_filters( 'widget_content', $instance['show_badge_follows'] );
$show_badge_images = apply_filters( 'widget_content', $instance['show_badge_images'] );
$show_badge_number_images = apply_filters( 'widget_content', $instance['show_badge_number_images'] );


     
                

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
               
                do_shortcode('[enjoyinstagram_badge_widget user_badge="'.$instance['user_badge'].'" show_badge_profile_picture="'.$instance['show_badge_profile_picture'].'" show_badge_username="'.$instance['show_badge_username'].'" show_badge_bio="'.$instance['show_badge_bio'].'" show_badge_website="'.$instance['show_badge_website'].'" show_badge_full_name="'.$instance['show_badge_full_name'].'" show_badge_media="'.$instance['show_badge_media'].'" show_badge_followed_by="'.$instance['show_badge_followed_by'].'" show_badge_follows="'.$instance['show_badge_follows'].'" show_badge_images="'.$instance['show_badge_images'].'" show_badge_view_images="'.$instance['show_badge_view_images'].'" show_badge_number_images="'.$instance['show_badge_number_images'].'"]');
 
               
		
                
                
		echo $args['after_widget'];
	}
	
	

	
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( ' EnjoyInstagram ', 'text_domain' );
		}
		
                
                
		$instance = wp_parse_args( (array) $instance, array( 
		'show_badge_profile_picture' => 'on',
'show_badge_username' => 'on',
'show_badge_bio' => 'on',
'show_badge_website' => 'on',
'show_badge_full_name' => 'on',
'show_badge_media' => 'on',
'show_badge_followed_by' => 'on',
'show_badge_follows' => 'on',
'show_badge_images' => 'on',
'show_badge_number_images' => '8'
                
  ) );
		
		?>
<?php
$array_utenti = get_option('enjoy_instagram_options');
$array_users_moderate = get_option('users_moderate');
$array_hashtag_moderate = get_option('hashtag_moderate');
?>

 <div class="acco-block" >
     <br />
     		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
     	</div>

            
      <div class="acco-block zebra" >
           <div class="enin-medium-header">USER</div>
     		
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            <select id="<?php echo $this->get_field_id('user_badge'); ?>" name="<?php echo $this->get_field_name('user_badge'); ?>">
                                                     <?php 
                                                     
                                                     
                                                     foreach($array_utenti as $singolo_utente) { 
                                                         if($singolo_utente[username]!=''){ ?>
<option value ="<?php echo $singolo_utente['username']; ?>" <?php if(esc_attr($instance['user_badge']) == $singolo_utente['username']) echo 'selected'; ?>><?php echo $singolo_utente['username']; ?></option>
                                                     <?php } } ?>
</select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            
            </div>
            </div>
     	</div>           
               



 <div class="acco-block" >
     <div class="enin-medium-header">WHAT DO YOU WANNA SHOW IN YOUR BADGE</div>
     		
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            <input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_profile_picture'); ?>" name="<?php echo $this->get_field_name( 'show_badge_profile_picture'); ?>" <?php if(esc_attr($instance['show_badge_profile_picture'])=='on'){ echo 'checked'; } ?>/>Profile Picture<br />
<input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_username'); ?>" name="<?php echo $this->get_field_name( 'show_badge_username'); ?>"  <?php if(esc_attr($instance['show_badge_username'])=='on'){ echo 'checked'; } ?>/>Username<br />
<input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_bio'); ?>" name="<?php echo $this->get_field_name( 'show_badge_bio'); ?>"  <?php if(esc_attr($instance['show_badge_bio'])=='on'){ echo 'checked'; } ?>/>Bio<br />  

            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
                <input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_website'); ?>" name="<?php echo $this->get_field_name( 'show_badge_website'); ?>"  <?php if(esc_attr($instance['show_badge_website'])=='on'){ echo 'checked'; } ?>/>Website<br />
            <input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_full_name'); ?>" name="<?php echo $this->get_field_name( 'show_badge_full_name'); ?>"  <?php if(esc_attr($instance['show_badge_full_name'])=='on'){ echo 'checked'; } ?>/>Full Name<br />
<input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_media'); ?>" name="<?php echo $this->get_field_name( 'show_badge_media'); ?>"  <?php if(esc_attr($instance['show_badge_media'])=='on'){ echo 'checked'; } ?>/>Media<br />

            </div>
            </div>
     <div class="acco-1-3">
            <div class="ei_settings_float_block">
<input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_followed_by'); ?>" name="<?php echo $this->get_field_name( 'show_badge_followed_by'); ?>"  <?php if(esc_attr($instance['show_badge_followed_by'])=='on'){ echo 'checked'; } ?>/>Followed By<br />
<input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_follows'); ?>" name="<?php echo $this->get_field_name( 'show_badge_follows'); ?>"  <?php if(esc_attr($instance['show_badge_follows'])=='on'){ echo 'checked'; } ?>/>Follows<br />
<input type="checkbox" id="<?php echo $this->get_field_id( 'show_badge_images'); ?>" name="<?php echo $this->get_field_name( 'show_badge_images'); ?>"  <?php if(esc_attr($instance['show_badge_images'])=='on'){ echo 'checked'; } ?>/>Posts<br />
            </div>
            </div>
     	</div>

   <div class="acco-block zebra" >
       <div class="enin-medium-header">GENERAL OPTIONS</div>
     		
            <div class="acco-1-3">
            <div class="ei_settings_float_block">
            Style View Images:<br />
                 <select id="<?php echo $this->get_field_id( 'show_badge_view_images'); ?>" name="<?php echo $this->get_field_name( 'show_badge_view_images'); ?>">
    
    <option value="grid" <?php if(esc_attr($instance['show_badge_view_images']) == 'grid') echo 'selected'; ?>>Grid</option>       
    <option value="carousel" <?php if(esc_attr($instance['show_badge_view_images']) == 'carousel') echo 'selected'; ?>>Carousel</option>
</select>
            </div>
            </div>
            	<div class="acco-1-3">
            <div class="ei_settings_float_block">
            Number of Images:<br />
<select id="<?php echo $this->get_field_id( 'show_badge_number_images'); ?>" name="<?php echo $this->get_field_name( 'show_badge_number_images'); ?>">
    <option value="2" <?php if(esc_attr($instance['show_badge_number_images']) == '2') echo 'selected'; ?>>2</option>
    <option value="4" <?php if(esc_attr($instance['show_badge_number_images']) == '4') echo 'selected'; ?>>4</option>  
    <option value="6" <?php if(esc_attr($instance['show_badge_number_images']) == '6') echo 'selected'; ?>>6</option> 
    <option value="8" <?php if(esc_attr($instance['show_badge_number_images']) == '8') echo 'selected'; ?>>8</option> 
    <option value="10" <?php if(esc_attr($instance['show_badge_number_images']) == '10') echo 'selected'; ?>>10</option> 
</select>
            </div>
            </div>
     	</div>        
 
     
           

            <br /><br />
 <br /><br />


 	
     

      
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';





$instance['user_badge'] = ( ! empty( $new_instance['user_badge'] ) ) ? strip_tags( $new_instance['user_badge'] ) : '';
$instance['show_badge_profile_picture'] = $new_instance['show_badge_profile_picture'];
$instance['show_badge_username'] = $new_instance['show_badge_username'];
$instance['show_badge_bio'] = $new_instance['show_badge_bio'];
$instance['show_badge_website'] = $new_instance['show_badge_website'];
$instance['show_badge_full_name'] = $new_instance['show_badge_full_name'];
$instance['show_badge_media'] = $new_instance['show_badge_media'];
$instance['show_badge_followed_by'] = $new_instance['show_badge_followed_by'];
$instance['show_badge_follows'] = $new_instance['show_badge_follows'];
$instance['show_badge_images'] = $new_instance['show_badge_images'];

$instance['show_badge_view_images'] = ( ! empty( $new_instance['show_badge_view_images'] ) ) ? strip_tags( $new_instance['show_badge_view_images'] ) : '';

$instance['show_badge_number_images'] = ( ! empty( $new_instance['show_badge_number_images'] ) ) ? strip_tags( $new_instance['show_badge_number_images'] ) : '';


		return $instance;
	}

} 

function register_Badge_Widget() {
    register_widget( 'Badge_Widget' );
}
add_action( 'widgets_init', 'register_Badge_Widget' );



?>