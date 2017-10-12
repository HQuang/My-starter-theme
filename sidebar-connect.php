<?php
    if ( is_active_sidebar('footer_connect') ) :
    	dynamic_sidebar('footer_connect' );
    else :
    	_e('', 'hongquang');
    endif;
?>