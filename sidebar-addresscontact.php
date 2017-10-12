<?php
    if ( is_active_sidebar('footer_addresscontact') ) :
    	dynamic_sidebar('footer_addresscontact' );
    else :
    	_e('', 'hongquang');
    endif;
?>