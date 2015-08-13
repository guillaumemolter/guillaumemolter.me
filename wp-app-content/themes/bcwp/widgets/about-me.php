<?php

class bcwp_About extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'bcwp_about', 'description' => __('About me widget.', 'bcwp'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('bcwp_about', __('bcwp: About me', 'bcwp'), $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {
		
		if(isset($instance['pageid']) && is_numeric($instance['pageid'])){
			$pageid = (int)$instance['pageid'];
			$page = get_post($pageid);
			
			echo $args['before_widget'];
	
			if ( has_post_thumbnail() ) {
				echo '<div class="photo-wrapper">' . get_the_post_thumbnail ( $pageid,'thumbnail',array('class'=>'about-photo')) . '</div>';
			}

				echo $args['before_title'] . $page->post_title . $args['after_title'];
			?>
				<div class="textwidget"><?php echo wp_html_excerpt( $page->post_content, 300, ' [...]' ); ?></div>
				<div class="next"><a href="<?php echo get_the_permalink($pageid); ?>">More about Kristen</a></div>
			<?php
			echo $args['after_widget'];
		}
		else{
			return false;
		}
		

	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['pageid'] = esc_html($new_instance['pageid']);
		$instance['pageid'] = (int)$instance['pageid'];

		return $instance;
	}

	public function form( $instance ) {
		$instance 	= wp_parse_args( (array) $instance, array('pageid' => '') );
		$pageid 		= (int)$instance['pageid'];
?>
		<p><label for="<?php echo $this->get_field_id('pageid'); ?>"><?php _e('About page ID:', 'bcwp'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('pageid'); ?>" name="<?php echo $this->get_field_name('pageid'); ?>" type="text" value="<?php echo esc_attr($pageid); ?>" /></p>
<?php
	}
}