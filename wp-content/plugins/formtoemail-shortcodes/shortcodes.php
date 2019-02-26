<?php
/*
Plugin Name: FormToEmail [shortcodes]
Plugin URI: https://formtoemail.com
Version: 1.0
Author: FormToEmail
Author URI: https://formtoemail.com
Description: Create shortcodes for the forms you create in your FromToEmail account.
*/
add_shortcode('formtoemail', 'formtoemail_shortcode');
function formtoemail_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts(array(
		'id' => false
	), $atts) );
	
	if ( !isset($id) || !$id ) 
		return '';
	
	$snippet = get_option('formtoemail_shortcodes-' . $id);
	
	return $snippet;
}

add_action('admin_menu', 'formtoemail_admin_menu');
function formtoemail_admin_menu() {
        add_menu_page('FormToEmail', 'FormToEmail', 'edit_posts', 'formtoemail-shortcodes', 'formtoemail_settings', 'dashicons-feedback');
}

function formtoemail_settings() {
	
	if ( isset($_GET['edit']) && $_GET['edit'] )
		return formtoemail_editor();
		
	if ( isset($_GET['add']) && $_GET['add'] )
		return formtoemail_add();
	
	$errors = array();
	$clean = array();
	
	if ( isset($_GET['rhs_del']) && $_GET['rhs_del'] && wp_verify_nonce($_GET['rhs_nonce'], 'rhs_delete') ) {
		delete_option('formtoemail_shortcodes-' . $_GET['rhs_del']);
		$snippet_list = get_option('formtoemail_shortcodes_list');
		if ( is_array($snippet_list) && in_array($_GET['rhs_del'], $snippet_list) ) {
			$snippet_list = array_diff( $snippet_list, array( $_GET['rhs_del'] ) );
			update_option('formtoemail_shortcodes_list', $snippet_list);
			$success = 'Snippet with ID &quot;' . esc_html($_GET['rhs_del']) . '&quot; successfully deleted.';
		}
	}

	
	$snippet_list = get_option('formtoemail_shortcodes_list');
	if ( !is_array($snippet_list) )
		$snippet_list = array();
	
?>
<div class="wrap">
	<h1 style="background: #e73254;  background: -moz-linear-gradient(left, #e73254, #ffb65e);  background: -webkit-linear-gradient(left, #e73254, #ffb65e);  background: linear-gradient(left, #e73254, #ffb65e);margin:-10px -20px 20px -22px;padding:28px 22px;color:#fff;"><img src="https://s3-us-west-2.amazonaws.com/formtoemail/shortcodes/logo.png" alt="FormToEmail" style="width:215px;vertical-align:top;margin-right:1em;"> [shortcodes]</h1>
	<h3>Manage your form HTML and shortcodes for use with your <a href="https://formtoemail.com"  style="vertical-align:bottom;" target="_blank">FormToEmail Account</a></h3>

<ul style="list-style:outside;margin-left:20px;">
 	 
  	<li>Create a unique "Form Name"</li>
  	<li>Paste / Edit the form HTML from your <a href="https://formtoemail.com" target="_blank">FormToEmail User Panel</a></li>
  	<li>Insert your form to any page using it's shortcode:
		<code>[formtoemail id="my_form_name"]</code>
	</li>
	</ul>
		<p><a href="?page=formtoemail-shortcodes&amp;add=1" class="button-primary">Add a New Form +</a></p>
	<?php if ( count($snippet_list) > 0 ) : ?>
	
	<table class="widefat striped">
	<thead>
	<tr>
		<th>Form Name</th>
		<th>Shortcode</th>
	</tr>
	</thead>
	<tbody>
	
	<?php foreach ( $snippet_list as $snippet_id ) : ?>
	<tr>
		<td>
			
		<strong>
			<a href="?page=formtoemail-shortcodes&amp;edit=<?php echo rawurlencode($snippet_id); ?>">
			<?php echo esc_html($snippet_id);?>
			</a>
		</strong>
			<div class="row-actions">
				<a href="?page=formtoemail-shortcodes&amp;edit=<?php echo rawurlencode($snippet_id); ?>">Edit</a> | 
				<span class="trash"><a class="submitdelete" onclick="return confirm('Are you sure you want to delete this form\'s HTML permanently?');" href="?page=formtoemail-shortcodes&amp;rhs_nonce=<?php echo esc_attr(wp_create_nonce('rhs_delete')); ?>&amp;rhs_del=<?php echo esc_attr($snippet_id); ?>">Delete</a></span>
			</div>
		</td>
		<td>
			<code>[formtoemail id="<?php echo esc_html($snippet_id); ?>"]</code>
		</td>
	</tr>
	<?php endforeach; ?>
	
	</tbody>
	</table>
	
	<?php else : ?><!-- If no forms -->
		<p class="bounce">&#x2b06;</p>
<style>  
.bounce {
    font-size: 5em;
    line-height: 1em;
    margin: 10px 0 0 30px
}
@-moz-keyframes bounce {
  0%,
  20%,
  50%,
  80%,
  100% {
    -moz-transform: translateY(0);
    transform: translateY(0);
  }
  40% {
    -moz-transform: translateY(30px);
    transform: translateY(30px);
  }
  60% {
    -moz-transform: translateY(15px);
    transform: translateY(15px);
  }
}
@-webkit-keyframes bounce {
  0%,
  20%,
  50%,
  80%,
  100% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  40% {
    -webkit-transform: translateY(30px);
    transform: translateY(30px);
  }
  60% {
    -webkit-transform: translateY(15px);
    transform: translateY(15px);
  }
}
@keyframes bounce {
  0%,
  20%,
  50%,
  80%,
  100% {
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  40% {
    -moz-transform: translateY(30px);
    -ms-transform: translateY(30px);
    -webkit-transform: translateY(30px);
    transform: translateY(30px);
  }
  60% {
    -moz-transform: translateY(15px);
    -ms-transform: translateY(15px);
    -webkit-transform: translateY(15px);
    transform: translateY(15px);
  }
}
.bounce {
  -moz-animation: bounce 2s infinite;
  -webkit-animation: bounce 2s infinite;
  animation: bounce 2s infinite;
}

  </style>
	<?php endif; ?>
</div>
<?php 
} // end no forms

function formtoemail_editor() {
	$snippet_id = $_GET['edit'];
	$errors = array();
	if ( !empty($_POST) && wp_verify_nonce($_POST['rhs_nonce'], 'rhs_nonce') ) {
		$snippet = stripslashes($_POST['snippet_code']);
		if ( empty($snippet) ) 
			$errors[] = 'Enter some HTML for this snippet.';
		if ( count($errors) <= 0 ) {
			update_option('formtoemail_shortcodes-' . $snippet_id, $snippet);
			$success = 'Your changes have been saved. Your shortcode is: <code>[formtoemail id="'.esc_html($snippet_id).'"]</code>';
		}
	}
	$snippet = get_option('formtoemail_shortcodes-' . $snippet_id);
	$clean = array(
		'snippet_code' => $snippet
	);
?>
<div class="wrap">
<h1 style="background: #e73254;  background: -moz-linear-gradient(left, #e73254, #ffb65e);  background: -webkit-linear-gradient(left, #e73254, #ffb65e);  background: linear-gradient(left, #e73254, #ffb65e);margin:-10px -20px 20px -22px;padding:28px 22px;color:#fff;"><img src="https://fte.jlmweb.net/images/logo2.png" alt="FormToEmail" style="width:215px;vertical-align:top;margin-right:1em;"> [shortcodes]</h1>

		<?php if ( count($errors) > 0 ) : ?>
		<div class="message error"><?php echo wpautop(implode("\n", $errors)); ?></div>
		<?php endif; ?>
		<?php if ( isset($success) && !empty($success) ) : ?>
		<div class="message updated"><?php echo wpautop($success); ?></div>
		<?php endif; ?>

	<h3>Edit Form HTML <a class="page-title-action fade-out" href="?page=formtoemail-shortcodes">Back to Form List</a></h3>

	<form method="post" action="">

		
		<?php wp_nonce_field('rhs_nonce', 'rhs_delete'); ?>
		<p>
		Form Name: <code><?php echo esc_html($snippet_id); ?></code></strong>
                </p>
		<p>
		Shortcode: <code>[formtoemail id="<?php echo esc_html($snippet_id); ?>"]</code>
		</p>
		<p><label for="snippet_code">Form HTML Code:</label>
		<textarea dir="ltr" dirname="ltr" id="snippet_code" name="snippet_code" data-editor="html" rows="25" style="font-family:Monaco,'Courier New',Courier,monospace;font-size:12px;width:100%;color:#555;"><?php
			if ( isset($clean['snippet_code']) )
				echo esc_attr($clean['snippet_code']);
		?></textarea>
                </p>
		
		<p>
			<input type="submit" class="button-primary" value="Save Form HTML" /> 
			<?php wp_nonce_field('rhs_nonce', 'rhs_nonce'); ?>
		</p>
	</form>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js"></script>
<script>
    // Hook up ACE editor to all textareas with data-editor attribute
    jQuery(function () {
        jQuery('textarea[data-editor]').each(function () {
            var textarea = jQuery(this);
 
            var mode = textarea.data('editor');
 
            var editDiv = jQuery('<div>', {
                position: 'absolute',
                width: textarea.width(),
                height: textarea.height(),
                'class': textarea.attr('class')
            }).insertBefore(textarea);
 
            textarea.css('display', 'none');
 
            var editor = ace.edit(editDiv[0]);
            editor.renderer.setShowGutter(true);
            editor.renderer.setShowPrintMargin(false);
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode("ace/mode/" + mode);
            editor.setTheme("ace/theme/dreamweaver");
            
            // copy back to textarea on form change...         
            editor.getSession().on('change', function(){ 
                textarea.val(editor.getSession().getValue());
                jQuery( ".fade-out" ).fadeTo( "slow", 0 );
            })
 
        });
    });
</script>

</div>
<?php
}

function formtoemail_add() {
	$snippet_list = get_option('formtoemail_shortcodes_list');
	if ( !is_array($snippet_list) )
		$snippet_list = array();
		
	$errors = array();
	$clean = array();
	
	if ( !empty($_POST) && wp_verify_nonce($_POST['rhs_nonce'], 'rhs_nonce') ) {

		foreach ( $_POST as $k => $v )
			$clean[$k] = stripslashes($v); 
			
		if ( empty($clean['snippet_id']) ) 
			$errors[] = 'Please enter a unique Form Name.';
		elseif ( in_array(strtolower($clean['snippet_id']), $snippet_list) )
			$errors[] = 'You have entered a Form Name that already exists. Names are NOT case-sensitive.';
		
		if ( empty($clean['snippet_code']) ) 
			$errors[] = 'Enter the HTML for this Form.';
		
		if ( count($errors) <= 0 ) {
			// save snippet
			$snippet_id = strtolower($clean['snippet_id']);
                        $snippet_id = str_replace(' ', '_', $snippet_id);
			$snippet_id =preg_replace('/[^A-Za-z0-9\_]/', '', $snippet_id);
			$snippet_list[] = $snippet_id;
			update_option('formtoemail_shortcodes_list', $snippet_list);
			update_option('formtoemail_shortcodes-' . $snippet_id, $clean['snippet_code']);
			$success = 'Your form\'s HTML has been saved successfully.';
			$clean = array();
		}
	}
	
?>
<div class="wrap">
<h1 style="background: #e73254;  background: -moz-linear-gradient(left, #e73254, #ffb65e);  background: -webkit-linear-gradient(left, #e73254, #ffb65e);  background: linear-gradient(left, #e73254, #ffb65e);margin:-10px -20px 20px -22px;padding:28px 22px;color:#fff;"><img src="https://fte.jlmweb.net/images/logo2.png" alt="FormToEmail" style="width:215px;vertical-align:top;margin-right:1em;"> [shortcodes]</h1>

		<?php if ( count($errors) > 0 ) : ?>
		<div class="message error"><?php echo wpautop(implode("\n", $errors)); ?></div>
		<?php endif; ?>
		<?php if ( $success ) : ?>
		<div class="message updated"><?php echo wpautop($success); ?></div>
                
                <br><h3>Insert your form to any page using the shortcode: <code>[formtoemail id="<?php echo esc_html($snippet_id) ?>"]</code></h3><br>
		<p><a class="button" href="?page=formtoemail-shortcodes">&laquo; Back to Form List</a> or <a class="button" href="?page=formtoemail-shortcodes&amp;add=1">Add a New Form +</a></p>

                <?php else: ?>



	<h3>New Form Shortcode &amp; HTML <a class="page-title-action fade-out" href="?page=formtoemail-shortcodes"> Back to Form List</a></h3>
		
	<form method="post" action="" >
		
		<?php wp_nonce_field('rhs_nonce', 'rhs_nonce'); ?>
		
		<p>
			<label for="snippet_id">Form Name: <span style="color:#999;font-size:.9em;">(doesn't show on website)</span></label>
			<br />
			<input type="text" name="snippet_id" id="snippet_id" size="40" value="<?php
			if ( isset($clean['snippet_id']) ) 
				echo esc_attr($clean['snippet_id']);
		?>" />
		</p>
		
		<p><label for="snippet_code">Form HTML Code:</label><br>
		<textarea dir="ltr" dirname="ltr" id="snippet_code" name="snippet_code" data-editor="html" rows="25" style="font-family:Monaco,'Courier New',Courier,monospace;font-size:12px;width:100%;color:#555;"><?php
			if ( isset($clean['snippet_code']) )
				echo esc_attr($clean['snippet_code']);
		?></textarea>
		</p>
		<p><input type="submit" class="button-primary" value="Save Form HTML" /></p>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js"></script>
<script>
    // Hook up ACE editor to all textareas with data-editor attribute
    jQuery(function () {
        jQuery('textarea[data-editor]').each(function () {
            var textarea = jQuery(this);
 
            var mode = textarea.data('editor');
 
            var editDiv = jQuery('<div>', {
                position: 'absolute',
                width: textarea.width(),
                height: textarea.height(),
                'class': textarea.attr('class')
            }).insertBefore(textarea);
 
            textarea.css('display', 'none');
 
            var editor = ace.edit(editDiv[0]);
            editor.renderer.setShowGutter(true);
            editor.renderer.setShowPrintMargin(false);
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode("ace/mode/" + mode);
            editor.setTheme("ace/theme/dreamweaver");
            
            // copy back to textarea on form change...         
            editor.getSession().on('change', function(){ 
                textarea.val(editor.getSession().getValue());
                jQuery( ".fade-out" ).fadeTo( "slow", 0 );
            })
 
        });
    });
</script>
	</form>	
<?php endif; // end no success ?>
</div>
<?php	
}