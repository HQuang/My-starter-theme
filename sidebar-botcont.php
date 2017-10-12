<?php
    if ( is_active_sidebar('bot_content') ) :
    	dynamic_sidebar('bot_content' );
    else :
    	_e('', 'hongquang');
    endif;
?>