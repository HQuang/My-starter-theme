<?php
    if ( is_active_sidebar('footer_address') ) :
    	dynamic_sidebar('footer_address' );
    else :
    	_e('', 'hongquang');
    endif;
?>