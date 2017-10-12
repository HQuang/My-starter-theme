<?php  
    /* Template Name: contact */
?>
<?php get_header(); ?>
<section class="content">
    <!--page-->
    
<!-- CONTENT -->

<div id="container">
   	<div class="container">
      	<ul class="breadcrumb-page">
         	<li><a href="<?php echo get_template_directory_uri(); ?>../../../../">Trang chủ</a> »</li>   	
         	<li><a href="" title="Liên hệ" >Liên hệ </a></li>
      	</ul>
      	<div class="row">
	      	<div class="col-lg-5 col-md-5 col-sm-5 margintb10">
				<h2 class="title_contact">Thông tin Liên hệ</h2>
				<div>
					<?php get_sidebar('addresscontact' ); ?>
				</div>
	      	</div>
	      	<div class="col-lg-7 col-md-7 col-sm-7 margintb10">
	      		<div class="box_form_lienhe">				
					<?php get_sidebar('formcontact'); ?>                
	            </div>
	      	</div>
      	</div><!-- END ROW-->

      	<div class="margintb10 map_contact">
			<div  id="div_id" style="height:280px; width:100%;"></div>
    	</div>

    </div>
</div>


<script type="text/javascript">
	var map;
    function initMap() {
        var myLatlng = new google.maps.LatLng(16.0359, 108.25126);
        var myOptions = {
	        zoom: 15,
	        center: myLatlng,
	        draggable: true,
	        scrollwheel: false,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    map = new google.maps.Map(document.getElementById("div_id"), myOptions); 
	      // Biến text chứa nội dung sẽ được hiển thị
	    var text;
	    text= "<b><strong>Đá sa thạch</strong></b><br /><span>Đc: Lô 19 Võ Nguyên Giáp - Khuê Mỹ - Ngũ Hành Sơn - Đà Nẵng<br />Tel: 01629111234</span>";
	       var infowindow = new google.maps.InfoWindow(
	        { content: text,
	            size: new google.maps.Size(100,50),
	            position: myLatlng
	        });
	           infowindow.open(map);
	        // Biến text chứa nội dung sẽ được hiển thị
	        var image = '';    
	        var marker = new google.maps.Marker({
	          position: myLatlng, 
	          map: map,
	          title:"",
	          icon: image,
	      });
	      
	    google.maps.event.addListener(map, 'click', function(event){
	    	this.setOptions({scrollwheel:true});
	    });
	    google.maps.event.addListener(map, 'mouseover', function(event){
	    	this.setOptions({scrollwheel:false});
	    });      
      
    }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHnNC04F9_o08K9ImoQivLJua1rv94IWY&callback=initMap&sensor=false&language=vi" type="text/javascript"></script>


</section><!--./content-->   

<?php get_footer(); ?>