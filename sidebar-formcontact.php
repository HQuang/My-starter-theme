<?php
    if ( is_active_sidebar('form_contact') ) :
    	dynamic_sidebar('form_contact' );
    else :
    	_e('', 'hongquang');
    endif;
?>