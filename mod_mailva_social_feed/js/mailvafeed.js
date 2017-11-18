var insaddress = jQuery('<?php echo $insaddress ?>');
var instid = jQuery('<?php echo $instid ?>');
var insttoken = jQuery('<?php echo $insttoken ?>');

var btnInstafeedLoad = document.getElementById("btn-instafeed-load");
var galleryFeed = new Instafeed({
	get: "user",
	userId: 1259058974,
	accessToken: "1259058974.ba4c844.cdb43d999e46451986f6c4a127a50f81",
	resolution: "standard_resolution",
	filter: function(image) { 
	return image.tags.indexOf('serrescircuit') >= 0; 
	},
//	useHttp: "true",
	limit: 4,
	template: '<div class="col-xs-12 col-sm-6 col-md-4"><a href="{{image}}"><div class="img-featured-container"><div class="img-backdrop"></div><div class="description-container"><p class="caption">{{caption}}</p><span class="likes"><i class="icon ion-heart"></i> {{likes}}</span><span class="comments"><i class="icon ion-chatbubble"></i> {{comments}}</span></div><img src="{{image}}" class="img-responsive"></div></a></div>',
	target: "instafeed-gallery-feed",
//	after: function() {
    // disable button if no more results to load
//		if (!this.hasNext()) {
//      btnInstafeedLoad.setAttribute('disabled', 'disabled');
//    }
//  },
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
 
/* 
 (function() {
  new GetShare({
    root: $(".instagram"),
    network: "instagram",
    share: {
      id: "dribbble"
    }
  });

}).call(this);
*/