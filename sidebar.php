<?php
    if ( is_active_sidebar('header-slide') ) :
    	dynamic_sidebar('header-slide' );
    else :
    	_e('', 'hongquangpt');
    endif;
?>