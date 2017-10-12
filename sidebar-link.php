<?php
    if ( is_active_sidebar('view_more_link') ) :
    	dynamic_sidebar('view_more_link' );
    else :
    	_e('', 'hongquang');
    endif;
?>