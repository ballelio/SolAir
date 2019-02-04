<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'instagram-badges' ) ?></label>
  <input type="text" class="widefat" value="<?php esc_attr_e( $instance['title'] ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" placeholder="<?php _e( 'Leave blank to disable title', 'instagram-badges' ); ?>">
</p>

<p>
  <label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Username:', 'instagram-badges' ) ?></label>
  <input type="text" class="widefat" value="<?php esc_attr_e( $instance['username'] ); ?>" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" placeholder="<?php _e( 'Instagram username', 'instagram-badges' ); ?>">
</p>

<p>
  <label for="<?php echo $this->get_field_id( 'badge_size' ); ?>"><?php _e( 'Badge Size:', 'instagram-badges' ); ?></label>
	<select id="<?php echo $this->get_field_id( 'badge_size' ); ?>" name="<?php echo $this->get_field_name( 'badge_size' ); ?>">
		<option value="48"   <?php selected( '48',   $instance['badge_size'], true ); ?>><?php _e( 'Large (48px)', 'instagram-badges' ); ?></option>
		<option value="32"   <?php selected( '32',   $instance['badge_size'], true ); ?>><?php _e( 'Medium (32px)', 'instagram-badges' ); ?></option>
		<option value="24"   <?php selected( '24',   $instance['badge_size'], true ); ?>><?php _e( 'Small (24px)', 'instagram-badges' ); ?></option>
		<option value="16"   <?php selected( '16',   $instance['badge_size'], true ); ?>><?php _e( 'Tiny (16px)', 'instagram-badges' ); ?></option>
		<option value="v_24" <?php selected( 'v_24', $instance['badge_size'], true ); ?>><?php _e( 'Medium with Title (24px)', 'instagram-badges' ); ?></option>
	</select>
</p>

<p>
  <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('new_window'); ?>" name="<?php echo $this->get_field_name('new_window'); ?>" value="1" <?php checked( '1', $instance['new_window'] ); ?>>
  <label for="<?php echo $this->get_field_id('new_window'); ?>"><?php _e('Open profile in new winodow'); ?></label>
</p>

<p style="color: #3a87ad; background: #d9edf7; padding: 4px !important; border: 1px solid #bce8f1; border-radius: 2px; font-size: 12px; float: left; clear: left;">
	<?php _e( '<strong>Like this plugin?</strong> Consider <a href="http://sparanoid.com/donate/" target="_blank">donating</a>. Check out my <a href="http://profiles.wordpress.org/sparanoid/#content-plugins" target="_blank">other plugins</a>, too.', 'instagram-badges' ); ?>
</p>