<?php
defined('_JEXEC') or die('Restricted access');

$idmodule    	= $module->id;
$insaddress  	= $params->get('insaddress');
$instid 			= $params->get('instid');
$insttoken 		= $params->get('insttoken');
$insttag 		= $params->get('insttag');
$numofphotos 	= $params->get('numofphotos');
?>
<div id="instafeed-gallery-feed" class="gallery row no-gutter">
  
</div>
<div class='inst-buttons'>
	<button id="btn-instafeed-load" class="btn"><span class='inst_icon'></span><span class='inst_text'><?php echo JText::_('MOD_MAIL_FRONT_LOAD_MORE')?></span></button>
	<button id='btn-follow-inst' class="btn" onclick="location.href='https://www.instagram.com/<?php echo $insaddress ?>/';"><span class='inst_icon'></span><span class='inst_text'><?php echo JText::_('MOD_MAIL_FRONT_FOLLOW_US')?></span></button>
</div>

<script type="text/javascript">

jQuery(document).ready(function () {

var insaddress 	= '<?php echo $insaddress ?>';
var instid 			= '<?php echo $instid ?>';
var insttoken 		= '<?php echo $insttoken ?>';
var insttag 		= '<?php echo $insttag ?>';
var numofphotos 	= '<?php echo $numofphotos ?>';

if ((insttag === 'noTag') || (insttag === '')){
var btnInstafeedLoad = document.getElementById("btn-instafeed-load");
var galleryFeed = new Instafeed({
	get: "user",
	userId: "<?php echo $instid ?>",
	accessToken: "<?php echo $insttoken ?>",
	resolution: "standard_resolution",
	
//	useHttp: "true",
	limit: '<?php echo $numofphotos ?>',
	template: '<div class="col-xs-12 col-sm-6 col-md-4"><a href="{{image}}"><div class="img-featured-container"><div class="img-backdrop"></div><div class="description-container"><p class="caption">{{caption}}</p><span class="likes"><i class="icon ion-heart"></i> {{likes}}</span><span class="comments"><i class="icon ion-chatbubble"></i> {{comments}}</span></div><img src="{{image}}" class="img-responsive"></div></a></div>',
	target: "instafeed-gallery-feed",
	after: function() {
    // disable button if no more results to load
		if (!this.hasNext()) {
      jQuery("#btn-instafeed-load").hide();
      }
      else {
      	jQuery("#btn-instafeed-load").show();
      }
  },
});
galleryFeed.run();
	btnInstafeedLoad.addEventListener("click", function() {
	galleryFeed.next();
});
galleryFeed.run();
}
else if (insttag != 'noTag'){
var btnInstafeedLoad = document.getElementById("btn-instafeed-load");
var galleryFeed = new Instafeed({
	get: "user",
	userId: "<?php echo $instid ?>",
	accessToken: "<?php echo $insttoken ?>",
	resolution: "standard_resolution",
	filter: function(image) { 
	return image.tags.indexOf('<?php echo $insttag ?>') >= 0; 
	},
//	useHttp: "true",
	limit: '<?php echo $numofphotos ?>',
	template: '<div class="col-xs-12 col-sm-6 col-md-4"><a href="{{image}}"><div class="img-featured-container"><div class="img-backdrop"></div><div class="description-container"><p class="caption">{{caption}}</p><span class="likes"><i class="icon ion-heart"></i> {{likes}}</span><span class="comments"><i class="icon ion-chatbubble"></i> {{comments}}</span></div><img src="{{image}}" class="img-responsive"></div></a></div>',
	target: "instafeed-gallery-feed",
	after: function() {
    // disable button if no more results to load
		if (!this.hasNext()) {
      jQuery("#btn-instafeed-load").hide();
      }
      else {
      	jQuery("#btn-instafeed-load").show();
      }
  },
});
galleryFeed.run();
	btnInstafeedLoad.addEventListener("click", function() {
	galleryFeed.next();
});
galleryFeed.run();	
}

})

</script>
<!--<script src="modules/mod_mailva_social_feed/js/mailvafeed.js"></script>-->
