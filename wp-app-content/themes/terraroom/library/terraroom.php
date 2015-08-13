<?php 
	
add_action( 'init', 'ter_add_excerpts_to_pages' );
function ter_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_filter( 'pre_option_link_manager_enabled', '__return_true' );


class Ter_About_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'ter_about', // Base ID
			__( 'A Propos', 'ter' ) // Name
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		
		echo get_the_post_thumbnail(102,'bones-thumb-200');
		
		echo "<h2>".get_the_title(102)."</h2>";
		
		echo apply_filters('the_excerpt', get_post_field('post_excerpt', 102));
		
		echo '<a href="'.get_the_permalink(102).'">'.__("lire la suite","ter").'</a>';
		
		echo $args['after_widget'];
	}
	
}

class Ter_Bookmark_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'ter_bookmark', // Base ID
			__( 'I Love Bookmarks', 'ter' ) // Name
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		
		echo "<h2>".__("I Love ❤","ter")."</h2>";
				
		echo "<ol>";
		wp_list_bookmarks('categorize=0&title_li=0&show_images=0&orderby=rand&show_rating=0&show_updated=1');
		echo "</ol>";
		
		echo $args['after_widget'];
	}
	
}


class Ter_Social_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'ter_social', // Base ID
			__( 'Social Links', 'ter' ) // Name
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		
		if ( ! empty( $instance['facebook_url'] ) ) {
			echo '<a href="'.$instance['facebook_url'].'" target="_blank" class="fb social">FB</a> - ';
		}
		
		if ( ! empty( $instance['pinterest_url'] ) ) {
			echo '<a href="'.$instance['pinterest_url'].'" target="_blank" class="pt social">P</a> - ';
		}
		
		if ( ! empty( $instance['instagram_url'] ) ) {
			echo '<a href="'.$instance['instagram_url'].'" target="_blank" class="ig social">IG</a> - ';
		}
		

		echo '<a href="'.get_permalink(29).'" class="email social">@</a>';
		
		echo $args['after_widget'];
	}
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$facebook_url = ! empty( $instance['facebook_url'] ) ? $instance['facebook_url'] : "";
		$pinterest_url = ! empty( $instance['pinterest_url'] ) ? $instance['pinterest_url'] : "";
		$instagram_url = ! empty( $instance['instagram_url'] ) ? $instance['instagram_url'] : "";
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook URL:','ter' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'pinterest_url' ); ?>"><?php _e( 'Pinterest  URL:','ter' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'pinterest_url' ); ?>" name="<?php echo $this->get_field_name( 'pinterest_url' ); ?>" type="text" value="<?php echo esc_attr( $pinterest_url ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'instagram_url' ); ?>"><?php _e( 'Instagram URL:','ter' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" type="text" value="<?php echo esc_attr( $instagram_url ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['facebook_url'] = ( ! empty( $new_instance['facebook_url'] ) ) ? strip_tags( $new_instance['facebook_url'] ) : '';
		$instance['pinterest_url'] = ( ! empty( $new_instance['pinterest_url'] ) ) ? strip_tags( $new_instance['pinterest_url'] ) : '';
		$instance['instagram_url'] = ( ! empty( $new_instance['instagram_url'] ) ) ? strip_tags( $new_instance['instagram_url'] ) : '';

		return $instance;
	}
	
}

function ter_register_widgets() {
    register_widget( 'Ter_About_Widget' );
    register_widget( 'Ter_Social_Widget' );
    register_widget( 'Ter_Bookmark_Widget' );
}
add_action( 'widgets_init', 'ter_register_widgets' );

?>