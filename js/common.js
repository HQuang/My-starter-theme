$(document).ready(function(){
    
    $(window).on("load resize scroll",function(e){
        var $abc = $(window).width();
        if($abc<768){
            $('nav#menu').mmenu({
            	extensions	: [ 'effect-slide-menu', 'pageshadow' ],
            	searchfield	: true,
            	counters	: false,
            	navbar 		: {
            		title		: ''
            	},
                offCanvas   : {
                   position  : "left",
                   zposition : "front"
                }
            });     
        }
        //alert ($abc);
    });
    
    $('.carousel').swipe({
    swipe: function(event, direction, distance, duration, fingerCount, fingerData){
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev'); 
    },
    allowPageScroll:"vertical"
    });
    
    $('.dangkima').click(function(){
        $.fancybox({
            type: 'inline',
            padding:0,
            content: jQuery('#popup-ma').html()
        });
    });
    
    //initiate the plugin and pass the id of the div containing gallery images
    $("#zoom_03").elevateZoom({
        responsive: true,
        zoomType: 'inner',
        cursor: 'pointer',
        gallery:'gallery_01',
        galleryActiveClass: 'active',
        imageCrossfade: true,
        scrollZoom : true,
        easing: true, 
        zoomWindowFadeIn: 100,
        zoomWindowFadeOut: 100,       
        loadingIcon: '../loader.gif'
    });
    //pass the images to Fancybox
    $("#zoom_03").bind("click", function(e){
        var ez =   $('#zoom_03').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });
    /*Chi tiet san pham*/
});

$(window).scroll(function(){
    if ($(this).scrollTop() > 90){
        $('.menu-navigation').addClass('fixed');
    }else{
        $('.menu-navigation').removeClass('fixed');
    }
});


$(document).on('keyup', '#faq_search_input', function(){
    var faq_search_input = $(this).val();
    if(faq_search_input=='')
    {
        if ($('.find').hasClass("hien")) {   
                $(".find").removeClass("hien");  
                $('.cac').show();      
            } 
    }
    var dataString = 'keyword='+ faq_search_input;  
    $.ajax({
        type: "GET",                         
        url: "../ajaxsearch.php",    
        data: dataString,                     
        beforeSend:  function() {             
            $('.find').addClass('hien');      
            $('.andi').hide();
        },
        success: function(server_response)    
        {
            $('#showresurt').html(server_response).show();  
            if ($('.find').hasClass("hien")) {      
                $(".find").removeClass("hien");  
                 $('.andi').show();      
            } 
        }
    });
    return false;      
});
$(document).click(function(){
    $("#showresurt").hide();
});
$("#showresurt").click(function(e){
    e.stopPropagation();
});


(function($){
'use strict';
$(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e){
    var $target = $(e.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $parent = $current.closest('li.dropdown');
    $current = $parent.length > 0 ? $parent : $current;
    var $next = $current.next();
    var $prev = $current.prev();
    var updateDropdownMenu = function($el, position){
        $el
        .find('.dropdown-menu')
        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
        .addClass('pull-xs-' + position);
    };
    $tabs.find('>li').removeClass('next prev');
    $prev.addClass('prev');
    $next.addClass('next'); 
    updateDropdownMenu($prev, 'left');
    updateDropdownMenu($current, 'center');
    updateDropdownMenu($next, 'right');
});
})(jQuery);
//tab;