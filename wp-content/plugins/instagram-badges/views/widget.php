<?php if ( $title ) echo $before_title . $title . $after_title; ?>

<a href="http://instagram.com/<?php echo $username; ?>?ref=badge"
   class="ig-b- ig-b-<?php if ( 'v_24' == $badge_size ) : ?>v-24<?php else : ?><?php echo $badge_size; ?><?php endif; ?>"
   <?php if ( '1' == $new_window ) : ?> target="_blank"<?php else : ?><?php endif; ?>>
  <img src="//badges.instagram.com/static/images/ig-badge-<?php if ( 'v_24' == $badge_size ) : ?>view-24<?php else : ?><?php echo $badge_size; ?><?php endif; ?>.png" alt="Instagram">
</a>